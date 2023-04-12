<?php
namespace App\Http\Controllers\appIpa;

use App\Http\Controllers\Controller;
use App\Http\Validators\Main\Auth\RegisterValidator;
use App\Models\Admin;
use App\Models\Conversation;
use App\Models\ConversationMessage;
use App\Models\EmailVerification;
use App\Models\User;
use App\Notifications\Admin\PendingUser;
use App\Notifications\User\Everyone\VerifyEmail;
use App\Notifications\User\Everyone\Welcome;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class ConversationController extends Controller
{

    // get Conversations
    public function getConversations()
    {
        $users = [];
        $conversation = Conversation::where('from_id', auth()->id())
            ->orWhere('to_id', auth()->id())
            ->latest('last_message_at')
            ->get();

        foreach ($conversation as $user) {
            if (auth()->id() != $user->to_id) {
                $users[] = [
                    "user" => $user->to,
                    "idConversation" => $user->id,
                ];

            } else {
                $users[] =
                    [
                    "user" => [
                        "id" => $user->from->id,
                        "fcmToken" => $user->from->fcmToken,
                        "uid" => $user->from->uid,
                        "username" => $user->from->username,
                        "email" => $user->from->email,
                        "email_verified_at" => $user->from->email_verified_at,
                        "phon" => $user->from->phon,
                        "address" => $user->from->address,
                        "cin_or_passport" => $user->from->cin_or_passport,
                        "account_type" => $user->from->account_type,
                        "avatar" => $user->from->avatar_id ? $user->from->avatar->file_folder . "/" . $user->from->avatar->uid . "." . $user->from->avatar->file_extension : null,
                        "level_id" => $user->from->level_id,
                        "provider_name" => $user->from->provider_name,
                        "provider_id" => $user->from->provider_id,
                        "country_id" => $user->from->country_id,
                        "fullname" => $user->from->fullname,
                        "headline" => $user->from->headline,
                        "description" => $user->from->description,
                        "status" => $user->from->status,
                        "balance_net" => $user->from->balance_net,
                        "balance_withdrawn" => $user->from->balance_withdrawn,
                        "balance_purchases" => $user->from->balance_purchases,
                        "balance_pending" => $user->from->balance_pending,
                        "balance_available" => $user->from->balance_available,
                        "deleted_at" => $user->from->deleted_at,
                        "last_activity" => $user->from->last_activity,
                        "created_at" => $user->from->created_at,
                        "updated_at" => $user->from->updated_at,
                    ],
                    "idConversation" => $user->id,
                    "last_message_at" => $user->last_message_at,
                    "uid" => $user->uid,
                ];
            }
        };
        return $users;

    }

    //get Messages
    public function getMessages($id)
    {
        return ConversationMessage::where('conversation_id', $id)->orderByRaw('created_at DESC')->get(); //->latest()->paginate(100);
    }

    public function send(Request $request)
    {

        // SendValidator::validate($this);
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|email',

        // ]);

        // Get conversation
        $conversation = Conversation::where('id', $request->conversation_id)
        // $conversation = Conversation::where('uid', $request->conversation_uid)
            ->where(function ($query) {
                return $query->where('from_id', auth()->id())->orWhere('to_id', auth()->id());
            })
            ->first();

        // Check if conversation exists
        if (!$conversation) {

            // Conversation not exists
            return response('alert', [
                "message" => __('messages.t_conversation_not_exists'),
                "type" => "error",
            ], 401);

        }

        // Check if conversation blocked
        if ($conversation->status === 'blocked') {

            // Conversation not exists
            return response([
                "message" => __('messages.t_u_cant_reply_this_conversation'),
                "type" => "error",
            ], 400);

            return;

        }

        // Save message
        $message = new ConversationMessage();
        $message->uid = uid();
        $message->conversation_id = $conversation->id;
        $message->message_from = auth()->id();
        $message->message_to = $conversation->from_id === auth()->id() ? $conversation->to_id : $conversation->from_id;
        $message->message = $request->message;
        $message->save();

        // Update last message
        $conversation->last_message_at = now();
        $conversation->save();

        return $message;

        // // Refresh conversation
        // $this->conversation = $conversation;

        // // Check if user who will receive this message is offline
        // if (!$conversation->sender->isOnline()) {

        //     // Set cache key
        //     $cache_key = "messages-notification-email-conversation-" . $conversation->uid;

        //     // User right now is offline
        //     // We have to get last message
        //     // Because we can't send notification on every new message
        //     // So we will make sure that at least 1 hour past since last message
        //     if (!Cache::has($cache_key)) {

        //         // Send a notification to him via email
        //         $conversation->sender->notify((new NewMessage($conversation, $message))->locale(config('app.locale')));

        //         // Send notification
        //         notification([
        //             'text' => 't_u_have_new_message_from_username',
        //             'action' => url('messages', $conversation->uid),
        //             'user_id' => $conversation->sender->id,
        //             'params' => ['username' => auth()->user()->username],
        //         ]);

        //         // Set cache key, to prevent multiple notification at short time
        //         Cache::set($cache_key, true, now()->addHour());

        //     }

        // }

        // // Reset form
        // $this->reset('message');

    }

    public function createConversation(Request $request)
    {
        $conversation = Conversation::create([
            'uid' => uid(),
            'from_id' => auth()->id(),
            'to_id' => $request->id,
        ]);
        if ($conversation) {
            $conversation = Conversation::query()->where('to_id', $request->id)->where('from_id', auth()->id())->first();
            return response([
                "convrsation" => [
                    "user" => [
                        "id" => $conversation->from->id,
                        "fcmToken" => $conversation->from->fcmToken,
                        "uid" => $conversation->from->uid,
                        "username" => $conversation->from->username,
                        "email" => $conversation->from->email,
                        "email_verified_at" => $conversation->from->email_verified_at,
                        "phon" => $conversation->from->phon,
                        "address" => $conversation->from->address,
                        "cin_or_passport" => $conversation->from->cin_or_passport,
                        "account_type" => $conversation->from->account_type,
                        "avatar" => $conversation->from->avatar_id ? $conversation->from->avatar->file_folder . "/" . $conversation->from->avatar->uid . "." . $conversation->from->avatar->file_extension : null,
                        "level_id" => $conversation->from->level_id,
                        "provider_name" => $conversation->from->provider_name,
                        "provider_id" => $conversation->from->provider_id,
                        "country_id" => $conversation->from->country_id,
                        "fullname" => $conversation->from->fullname,
                        "headline" => $conversation->from->headline,
                        "description" => $conversation->from->description,
                        "status" => $conversation->from->status,
                        "balance_net" => $conversation->from->balance_net,
                        "balance_withdrawn" => $conversation->from->balance_withdrawn,
                        "balance_purchases" => $conversation->from->balance_purchases,
                        "balance_pending" => $conversation->from->balance_pending,
                        "balance_available" => $conversation->from->balance_available,
                        "deleted_at" => $conversation->from->deleted_at,
                        "last_activity" => $conversation->from->last_activity,
                        "created_at" => $conversation->from->created_at,
                        "updated_at" => $conversation->from->updated_at,
                    ], // done
                    "idConversation" => $conversation->id,
                    "last_message_at" => $conversation->last_message_at,
                    "uid" => $conversation->uid,
                ],
            ], 200);
        } else {
            return response([
                "message" => "err",
            ], 401);
        }

    }

    public function sendDetail(Request $request)
    {
//         // Check if there a conversation between these users before
//         $conversation = Conversation::where(function ($builder) use ($user) {
//             return $builder->where(function ($query) use ($user) {
//                 return $query->where('from_id', auth()->id())->orWhere('from_id', $user->id);
//             })->where(function ($query) use ($user) {
//                 return $query->where('to_id', auth()->id())->orWhere('to_id', $user->id);
//             });
//         })->first();

// // Check if exists
//         if (!$conversation) {

// // Create new conversation
//             $conversation = Conversation::create([
//                 'uid' => uid(),
//                 'from_id' => auth()->id(),
//                 'to_id' => $user->id,
//             ]);

//         }

        $conversation = Conversation::query()->where('from_id', $request->id)->where('to_id', auth()->id())->first();
        if (!$conversation) {
            $conversation = Conversation::query()->where('to_id', $request->id)->where('from_id', auth()->id())->first();
        }
        $users = [];
        if ($conversation) {
            if (auth()->id() != $conversation->to_id) {
                $users[] = [
                    "user" => $conversation->to,
                    "idConversation" => $conversation->id,
                    "last_message_at" => $conversation->last_message_at,
                    "uid" => $conversation->uid,
                ];

            } else {
                $users[] =
                    [
                    "user" => $conversation->from,
                    "idConversation" => $conversation->id,
                    "last_message_at" => $conversation->last_message_at,
                    "uid" => $conversation->uid,
                ];
            }
        }
        return $users;

        /////////////////////////////////////////////

        if (!$conversation) {
            $conversation = Conversation::create([
                'uid' => uid(),
                'from_id' => auth()->id(),
                'to_id' => $request->id,
            ]);
            $conversation = Conversation::query()->where('to_id', $request->id)->where('from_id', auth()->id())->first();
        }
        // Check if conversation exists
        if (!$conversation) {

            // Conversation not exists
            return response('alert', [
                "message" => __('messages.t_conversation_not_exists'),
                "type" => "error",
            ], 401);

        }

        // Check if conversation blocked
        if ($conversation->status === 'blocked') {

            // Conversation not exists
            return response([
                "message" => __('messages.t_u_cant_reply_this_conversation'),
                "type" => "error",
            ], 400);

            return;

        }

        // Save message
        $message = new ConversationMessage();
        $message->uid = uid();
        $message->conversation_id = $conversation->id;
        $message->message_from = auth()->id();
        $message->message_to = $conversation->from_id === auth()->id() ? $conversation->to_id : $conversation->from_id;
        $message->message = $request->message;
        $message->save();

        // Update last message
        $conversation->last_message_at = now();
        $conversation->save();

        return $message;

    }

    /**
     * Block this conversation
     *
     * @return void
     */
    public function block()
    {
        // Get conversation
        // We have to load conversation to prevent user from block another one
        $conversation = Conversation::where('uid', $this->conversation->uid)->where(function ($query) {
            return $query->where('from_id', auth()->id())->orWhere('to_id', auth()->id());
        })->where('status', 'active')->firstOrFail();

        // Block conversation
        $conversation->status = 'blocked';
        $conversation->blocked_by = auth()->id();
        $conversation->save();

        // Update conversation
        $this->conversation = $conversation;

        // Success
        $this->dispatchBrowserEvent('alert', [
            "message" => __('messages.t_conversation_blocked_successfully'),
        ]);
    }

    /**
     * Mark message as read
     *
     * @return void
     */
    public function markAsRead()
    {
        // Mark all messages as read
        ConversationMessage::where('conversation_id', $this->conversation->id)
            ->where('message_from', '!=', auth()->id())
            ->update([
                'is_seen' => true,
            ]);
    }

    /**
     * Get latest conversations
     *
     * @return object
     */
    public function getConversationsProperty()
    {
        return Conversation::where(function ($query) {
            return $query->where('from_id', auth()->id())->orWhere('to_id', auth()->id());
        })
            ->latest('last_message_at')
            ->get();
    }
}
