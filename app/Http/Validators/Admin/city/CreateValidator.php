<?php

namespace App\Http\Validators\Admin\city;

use Illuminate\Support\Facades\Validator;

class CreateValidator
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
                'name' => 'required|max:60|unique:categories,name',
                'slug' => 'required|max:60|unique:categories,slug',

            ];

            // Set errors messages
            $messages = [
                'name.required' => __('messages.t_validator_required'),
                'name.max' => __('messages.t_validator_max', ['max' => 60]),
                'name.unique' => __('messages.t_validator_unique'),
                'slug.required' => __('messages.t_validator_required'),
                'slug.max' => __('messages.t_validator_max', ['max' => 60]),
                'slug.unique' => __('messages.t_validator_unique'),
            ];

            // Set data to validate
            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
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
