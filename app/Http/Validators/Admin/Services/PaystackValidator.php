<?php

namespace App\Http\Validators\Admin\Services;

use Illuminate\Support\Facades\Validator;

class PaystackValidator
{
    
    /**
     * Validate form
     *
     * @param object $request
     * @return void
     */
    static function validate($request)
    {
        try {

            // Set rules
            $rules    = [
                'is_enabled'     => 'boolean',
                'name'           => 'required|max:100',
                'description'    => 'nullable|max:500',
                'public_key'     => 'nullable|max:160',
                'secret_key'     => 'nullable|max:160',
                'merchant_email' => 'nullable|max:60',
            ];

            // Set errors messages
            $messages = [
                'is_enabled.boolean' => __('messages.t_validator_boolean'),
                'name.required'      => __('messages.t_validator_required'),
                'name.max'           => __('messages.t_validator_max', ['max' => 100]),
                'description.max'    => __('messages.t_validator_max', ['max' => 500]),
                'public_key.max'     => __('messages.t_validator_max', ['max' => 160]),
                'secret_key.max'     => __('messages.t_validator_max', ['max' => 160]),
                'merchant_email.max' => __('messages.t_validator_max', ['max' => 160])
            ];

            // Set data to validate
            $data     = [
                'is_enabled'     => $request->is_enabled,
                'name'           => $request->name,
                'description'    => $request->description,
                'public_key'     => $request->public_key,
                'secret_key'     => $request->secret_key,
                'merchant_email' => $request->merchant_email
            ];

            // Validate data
            Validator::make($data, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
