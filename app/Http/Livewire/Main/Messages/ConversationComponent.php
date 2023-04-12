<?php

namespace App\Http\Livewire\Main\Messages;

use App\Http\Validators\Main\Messages\SendValidator;
use App\Models\Conversation;
use App\Models\ConversationMessage;
use App\Notifications\User\Everyone\NewMessage;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Cache;
use Livewire\Component;

class ConversationComponent extends Component
{
    use SEOToolsTrait;

    public $conversation;
    public $message;

    /**
     * Init component
     *
     * @param string $conversationId
     * @return void
     */
    public function mount($conversationId)
    {
        // Get conversation
        $conversation = Conversation::where('uid', $conversationId)->first();

        // Check if conversation eists
        if (!$conversation) {
            return redirect('messages');
        }

        // Check if user has permissions to see this conversation
        if ($conversation->from_id == auth()->id() || $conversation->to_id == auth()->id()) {

            // Set conversation
            $this->conversation = $conversation;

        } else {

            // User has no permission
            return redirect('messages');

        }

        // Mark messages as read
        $this->markAsRead();

    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator = settings('general')->separator;
        $title = __('messages.t_messages') . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage = src(settings('seo')->ogimage);

        $this->seo()->setTitle($title);
        $this->seo()->setDescription($description);
        $this->seo()->setCanonical(url()->current());
        $this->seo()->opengraph()->setTitle($title);
        $this->seo()->opengraph()->setDescription($description);
        $this->seo()->opengraph()->setUrl(url()->current());
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage($ogimage);
        $this->seo()->twitter()->setImage($ogimage);
        $this->seo()->twitter()->setUrl(url()->current());
        $this->seo()->twitter()->setSite("@" . settings('seo')->twitter_username);
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle($title);
        $this->seo()->jsonLd()->setDescription($description);
        $this->seo()->jsonLd()->setUrl(url()->current());
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.messages.conversation', [
            'messages' => $this->messages,
            'conversations' => $this->conversations,
        ])->extends('livewire.main.layout.app')->section('content');
    }

    /**
     * Get messages
     *
     * @return object
     */
    public function getMessagesProperty()
    {
        return ConversationMessage::where('conversation_id', $this->conversation->id)->latest()->paginate(100);
    }

    /**
     * Get latest conversations
     *
     * @return object
     */
    public function getConversationsProperty()
    {
        return Conversation::where('from_id', auth()->id())
            ->orWhere('to_id', auth()->id())
            ->latest('last_message_at')
            ->get();
    }

    /**
     * Send a message
     *
     * @return void
     */
    public function send()
    {
        try {

            // Validate form
            SendValidator::validate($this);

            // Get conversation
            $conversation = Conversation::where('uid', $this->conversation->uid)
                ->where(function ($query) {
                    return $query->where('from_id', auth()->id())->orWhere('to_id', auth()->id());
                })
                ->first();

            // Check if conversation exists
            if (!$conversation) {

                // Conversation not exists
                $this->dispatchBrowserEvent('alert', [
                    "message" => __('messages.t_conversation_not_exists'),
                    "type" => "error",
                ]);

                return;

            }

            // Check if conversation blocked
            if ($conversation->status === 'blocked') {

                // Conversation not exists
                $this->dispatchBrowserEvent('alert', [
                    "message" => __('messages.t_u_cant_reply_this_conversation'),
                    "type" => "error",
                ]);

                return;

            }

            // Save message
            $message = new ConversationMessage();
            $message->uid = uid();
            $message->conversation_id = $this->conversation->id;
            $message->message_from = auth()->id();
            $message->message_to = $conversation->from_id === auth()->id() ? $conversation->to_id : $conversation->from_id;
            $message->message = clean($this->message);
            $message->save();

            // Update last message
            $conversation->last_message_at = now();
            $conversation->save();

            // Refresh conversation
            $this->conversation = $conversation;
            $this->sendNotificationFirbase($conversation->Nosender->fcmToken, $conversation->sender->username . " : " . $this->message, "new message");

            // Check if user who will receive this message is offline
            if (!$conversation->sender->isOnline()) {

                // Set cache key
                $cache_key = "messages-notification-email-conversation-" . $conversation->uid;

                // User right now is offline
                // We have to get last message
                // Because we can't send notification on every new message
                // So we will make sure that at least 1 hour past since last message
                if (!Cache::has($cache_key)) {

                    // Send a notification to him via email
                    $conversation->sender->notify((new NewMessage($conversation, $message))->locale(config('app.locale')));

                    // Send notification
                    notification([
                        'text' => 't_u_have_new_message_from_username',
                        'action' => url('messages', $conversation->uid),
                        'user_id' => $conversation->sender->id,
                        'params' => ['username' => auth()->user()->username],
                    ]);

                    // Set cache key, to prevent multiple notification at short time
                    Cache::set($cache_key, true, now()->addHour());

                }

            }

            // Reset form
            $this->reset('message');

        } catch (\Illuminate\Validation\ValidationException$e) {

            // Validation error
            $this->dispatchBrowserEvent('alert', [
                "message" => __('messages.t_toast_form_validation_error'),
                "type" => "error",
            ]);

            throw $e;

        } catch (\Throwable$th) {

            // Error
            $this->dispatchBrowserEvent('alert', [
                "message" => __('messages.t_toast_something_went_wrong'),
                "type" => "error",
            ]);

            throw $th;

        }
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

    public function sendNotificationFirbase($tken, $body, $title)
    {

        $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = $tken;
        $serverKey = 'AAAAzkDjTMk:APA91bEOXwmDHiAXcKMPBQoX2YyBNAmjG2tBuNDof6ZtoqtN7Bk8nW7Q-HPNpu_u0Pua6fE9mrSGcF5JfXEn7yABamEDOugM8YJCsocPxSh0RJiz_8W02Qgx94OZRvoDUzYwyG_RL00l'; // ADD SERVER KEY HERE PROVIDED BY FCM

        $data = [
            "registration_ids" => [
                $FcmToken,
            ],
            "notification" => [
                "title" => $title,
                "body" => $body,
                "android_channel_id" => "notification",
                "sound" => true,
            ],
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === false) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response

    }

}
