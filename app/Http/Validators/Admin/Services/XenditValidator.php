<?php

namespace App\Http\Validators\Admin\Services;

use Illuminate\Support\Facades\Validator;

class XenditValidator
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
                'is_enabled'    => 'boolean',
                'name'          => 'required|max:100',
                'currency'      => 'required|in:IDR,PHP',
                'exchange_rate' => 'required|integer',
                'public_key'    => 'nullable|max:160',
                'secret_key'    => 'nullable|max:160',
            ];

            // Set errors messages
            $messages = [
                'is_enabled.boolean'     => __('messages.t_validator_boolean'),
                'name.required'          => __('messages.t_validator_required'),
                'name.max'               => __('messages.t_validator_max', ['max' => 100]),
                'currency.required'      => __('messages.t_validator_required'),
                'currency.in'            => __('messages.t_validator_in'),
                'exchange_rate.required' => __('messages.t_validator_required'),
                'exchange_rate.integer'  => __('messages.t_validator_integer'),
                'public_key.max'         => __('messages.t_validator_max', ['max' => 160]),
                'secret_key.max'         => __('messages.t_validator_max', ['max' => 160]),
            ];

            // Set data to validate
            $data     = [
                'is_enabled'    => $request->is_enabled,
                'name'          => $request->name,
                'currency'      => $request->currency,
                'exchange_rate' => $request->exchange_rate,
                'public_key'    => $request->public_key,
                'secret_key'    => $request->secret_key,
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
