<?php

namespace App\Http\Validators\Main\Auth;

use Illuminate\Support\Facades\Validator;

class RegisterValidator
{

    /**
     * Validate form
     *
     * @param object $request
     * @return void
     */
    public static function validate($request)
    {
        try {

            // Set rules
            $rules = [
                'username' => 'required|max:60|min:3|unique:users',
                'email' => 'required|max:60|email|unique:users',
                'password' => 'required|max:60',
                'phon' => 'required|max:10',
                'cin_or_passport' => 'required|max:20',
                'address' => 'required|max:20',
            ];

            // Set errors messages
            $messages = [
                'username.required' => __('messages.t_validator_required'),
                'username.max' => __('messages.t_validator_max', ['max' => 60]),
                'username.min' => __('messages.t_validator_min', ['min' => 60]),
                'username.unique' => __('messages.t_validator_unique'),
                'email.required' => __('messages.t_validator_required'),
                'email.max' => __('messages.t_validator_max', ['max' => 60]),
                'email.email' => __('messages.t_validator_email'),
                'email.unique' => __('messages.t_validator_unique'),
                'password.required' => __('messages.t_validator_required'),
                'password.max' => __('messages.t_validator_max', ['max' => 60]),
                'phon.required' => __('messages.t_validator_required'),
                'phon.max' => __('messages.t_validator_max', ['max' => 10]),
                'cin_or_passport.required' => __('messages.t_validator_required'),
                'cin_or_passport.max' => __('messages.t_validator_max', ['max' => 20]),
                'address.required' => __('messages.t_validator_required'),
                'address.max' => __('messages.t_validator_max', ['max' => 20]),
            ];

            // Set data to validate
            $data = [
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password,
                'phon' => $request->phon,
                'cin_or_passport' => $request->cin_or_passport,
                'address' => $request->address,
            ];

            // Validate data
            Validator::make($data, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable$th) {
            throw $th;
        }
    }

}
