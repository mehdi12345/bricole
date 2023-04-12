<?php

namespace App\Http\Validators\Admin\Services;

use Illuminate\Support\Facades\Validator;

class CashfreeValidator
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
                'is_enabled'  => 'boolean',
                'name'        => 'required|max:100',
                'description' => 'nullable|max:500',
                'app_id'      => 'nullable|max:160',
                'secret_key'  => 'nullable|max:160',
                'is_live'     => 'boolean',
            ];

            // Set errors messages
            $messages = [
                'is_enabled.boolean' => __('messages.t_validator_boolean'),
                'name.required'      => __('messages.t_validator_required'),
                'name.max'           => __('messages.t_validator_max', ['max' => 100]),
                'description.max'    => __('messages.t_validator_max', ['max' => 500]),
                'app_id.max'         => __('messages.t_validator_max', ['max' => 160]),
                'secret_key.max'     => __('messages.t_validator_max', ['max' => 160]),
                'is_live.boolean'    => __('messages.t_validator_boolean')
            ];

            // Set data to validate
            $data     = [
                'is_enabled'  => $request->is_enabled,
                'name'        => $request->name,
                'description' => $request->description,
                'app_id'      => $request->app_id,
                'secret_key'  => $request->secret_key,
                'is_live'     => $request->is_live
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
