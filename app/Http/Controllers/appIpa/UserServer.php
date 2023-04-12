<?php

namespace App\Http\Controllers\appIpa;

use App\Http\Controllers\Controller;
use App\Http\Validators\Main\Auth\RegisterValidator;
use App\Models\Admin;
use App\Models\EmailVerification;
use App\Models\FileManager;
use App\Models\User;
use App\Notifications\Admin\PendingUser;
use App\Notifications\User\Everyone\VerifyEmail;
use App\Notifications\User\Everyone\Welcome;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class UserServer extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function register(Request $request)
    {
        try {

            // Validate form
            // RegisterValidator::validate($request);

            // Get auth settings
            $settings = settings('auth');

            // Create new user
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
                'phon' => 'required',
                'address' => 'required',
                'cin_or_passport' => 'required',
                'username' => 'required',

            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'error in login the User' => $errors,
                ], 401);
            }

            $user = new User();
            $user->uid = uid();
            $user->email = $request->email;
            $user->username = $request->username;
            $user->address = $request->address;
            $user->cin_or_passport = $request->cin_or_passport;
            $user->phon = $request->phon;

            $user->password = Hash::make($request->password);
            $user->status = $settings->verification_required ? 'pending' : 'active';
            $user->level_id = 1;
            $user->save();

            // // Check if user requires verification
            // if ($settings->verification_required) {

            //     // Check if verification using email
            //     if ($settings->verification_type === 'email') {

            //         // Generate token
            //         $token = uid(64);

            //         // Generate verification
            //         $verification = new EmailVerification();
            //         $verification->token = $token;
            //         $verification->email = $request->email;
            //         $verification->expires_at = now()->addMinutes($settings->verification_expiry_period);
            //         $verification->save();

            //         // Send notification to user
            //         $user->notify((new VerifyEmail($verification))->locale(config('app.locale')));

            //         // Redirect to same page with success message
            //         //  return redirect('auth/register')->with('success', __('messages.t_register_verification_email_sent', ['email' => $this->email, 'minutes' => $settings->verification_expiry_period]));

            //     } else if ($settings->verification_type === 'admin') {

            //         // Send notification to admin
            //         Admin::first()->notify((new PendingUser($user))->locale(config('app.locale')));

            //         // Redirect to same page with success
            //         // return redirect('auth/register')->with('success', __('messages.t_register_verification_admin_pending'));

            //     }

            // }

            // // Send welcome message
            // $user->notify(new Welcome);

            // // Now login
            // auth()->login($user, true);

            // Redirect to home
            return response([
                'user' => [
                    "id" => $user->id,
                    "fcmToken" => $user->fcmToken,
                    "uid" => $user->uid,
                    "username" => $user->username,
                    "email" => $user->email,
                    "email_verified_at" => $user->email_verified_at,
                    "phon" => $user->phon,
                    "address" => $user->address,
                    "cin_or_passport" => $user->cin_or_passport,
                    "account_type" => $user->account_type,
                    "avatar" => "",
                    "level_id" => $user->level_id,
                    "provider_name" => $user->provider_name,
                    "provider_id" => $user->provider_id,
                    "country_id" => $user->country_id,
                    "fullname" => $user->fullname,
                    "headline" => $user->headline,
                    "description" => $user->description,
                    "status" => $user->status,
                    "balance_net" => $user->balance_net,
                    "balance_withdrawn" => $user->balance_withdrawn,
                    "balance_purchases" => $user->balance_purchases,
                    "balance_pending" => $user->balance_pending,
                    "balance_available" => $user->balance_available,
                    "deleted_at" => $user->deleted_at,
                    "last_activity" => $user->last_activity,
                    "created_at" => $user->created_at,
                    "updated_at" => $user->updated_at,
                ],
                'token' => $user->createToken('secret')->plainTextToken,
            ], 200);

        } catch (\Throwable$th) {
            throw $th;
        }
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error in login the User' => $errors,
            ], 401);
        }

        // Set login credentials
        $credentials = ['email' => $request->email, 'password' => $request->password];

        // Attempt login
        if (Auth::attempt($credentials, $request->remember_me)) {

            // Check if user active
            if (in_array(auth()->user()->status, ['active', 'verified'])) {

                // Go to home
                $user = auth()->user();
                return response([
                    'user' => [
                        "id" => $user->id,
                        "fcmToken" => $user->fcmToken,
                        "uid" => $user->uid,
                        "username" => $user->username,
                        "email" => $user->email,
                        "email_verified_at" => $user->email_verified_at,
                        "phon" => $user->phon,
                        "address" => $user->address,
                        "cin_or_passport" => $user->cin_or_passport,
                        "account_type" => $user->account_type,
                        "avatar" => $user->avatar_id ? $user->avatar->file_folder . "/" . $user->avatar->uid . "." . $user->avatar->file_extension : null,
                        "level_id" => $user->level_id,
                        "provider_name" => $user->provider_name,
                        "provider_id" => $user->provider_id,
                        "country_id" => $user->country_id,
                        "fullname" => $user->fullname,
                        "headline" => $user->headline,
                        "description" => $user->description,
                        "status" => $user->status,
                        "balance_net" => $user->balance_net,
                        "balance_withdrawn" => $user->balance_withdrawn,
                        "balance_purchases" => $user->balance_purchases,
                        "balance_pending" => $user->balance_pending,
                        "balance_available" => $user->balance_available,
                        "deleted_at" => $user->deleted_at,
                        "last_activity" => $user->last_activity,
                        "created_at" => $user->created_at,
                        "updated_at" => $user->updated_at,
                    ],
                    'token' => auth()->user()->createToken('secret')->plainTextToken,

                ], 200);

            } else {

                return response([
                    'user' => null,
                    'token' => null,

                ], 200);
            }

        }

        // Failed

    }

    // update user

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required',
            //'password' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error in update the User' => $errors,
            ], 400);
        }

        return $user = User::query()->find(auth()->user()->id)
            ->update([
                'username' => $request->username,
                'email' => $request->email,
                'phon' => $request->phon,
                'address' => $request->address,
                'fullname' => $request->fullname ? $request->fullname : null,

            ]);

        return response([
            'message' => 'User updated.',
        ], 200);

    }

    public function updateFcm(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fcmToken' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error in update fcmToken the User' => $errors,
            ], 400);
        }

        return $user = User::query()->find(auth()->user()->id)
            ->update([
                'fcmToken' => $request->fcmToken,
            ]);

        return response([
            'message' => 'User updated.',
        ], 200);

    }

    public function logout()
    {
        $user = User::query()->find(auth()->user()->id);
        $user->tokens()->delete();
        return response([
            'message' => 'Logout success.',
        ], 200);
    }

    public function user()
    {
        $user = auth()->user();
        return response([
            'user' => [
                "id" => $user->id,
                "fcmToken" => $user->fcmToken,
                "uid" => $user->uid,
                "username" => $user->username,
                "email" => $user->email,
                "email_verified_at" => $user->email_verified_at,
                "phon" => $user->phon,
                "address" => $user->address,
                "cin_or_passport" => $user->cin_or_passport,
                "account_type" => $user->account_type,
                "avatar" => $user->avatar_id ? $user->avatar->file_folder . "/" . $user->avatar->uid . "." . $user->avatar->file_extension : null,
                "level_id" => $user->level_id,
                "provider_name" => $user->provider_name,
                "provider_id" => $user->provider_id,
                "country_id" => $user->country_id,
                "fullname" => $user->fullname,
                "headline" => $user->headline,
                "description" => $user->description,
                "status" => $user->status,
                "balance_net" => $user->balance_net,
                "balance_withdrawn" => $user->balance_withdrawn,
                "balance_purchases" => $user->balance_purchases,
                "balance_pending" => $user->balance_pending,
                "balance_available" => $user->balance_available,
                "deleted_at" => $user->deleted_at,
                "last_activity" => $user->last_activity,
                "created_at" => $user->created_at,
                "updated_at" => $user->updated_at,
            ],
        ], 200);
    }

    public function updatedAvatar(Request $request)
    {

        if (auth()->user()->avatar_id) {
            $file = FileManager::query()->find(auth()->user()->avatar_id);
            Storage::disk('gigs')->put("avatars/" . $file->uid . "." . $file->file_extension, base64_decode($request->image));
            return response([
                'message' => 'updated Avatar success.',
            ], 200);
        } else {
            $avatar_id = $this->imageUp("avatars", $request->image);

            $user = User::query()->find(auth()->user()->id)->update([
                'avatar_id' => $avatar_id,
            ]);
            return response([
                'id' => $avatar_id,
                'message' => 'create Avatar success.',
                'user' => $user,
            ], 200);
        }

        return response([
            'message' => 'err.',
        ], 401);

    }

    public function changeToSeller(Request $request)
    {
        // Update user account type
        User::where('id', auth()->id())->update([
            'account_type' => 'seller',
        ]);
        return response([
            'message' => 'Change To Seller success.',
        ], 200);
    }
    public function imageUp($pathFolder, $image)
    {

        // Generate unique file id
        $uid = uid();

        // Generate file name
        $name = $uid . ".png";

        $mime = "image/png";

        // Set path
        $path = $pathFolder . "/";

        $size = "2000";

        //Storage::disk("gigs")->put("gigs/previews/small/osdfsdfsd.png", base64_decode($request->thumbnail));

        $imageName = $name;
        Storage::disk('gigs')->put($path . $imageName, base64_decode($image));

        // Save file
        $file = new FileManager();
        $file->uid = $uid;
        $file->file_folder = $pathFolder;
        $file->file_size = $size;
        $file->file_mimetype = $mime;
        $file->file_extension = "png";
        $file->save();

        // // // Return file id
        return $file->id;

    }

}
