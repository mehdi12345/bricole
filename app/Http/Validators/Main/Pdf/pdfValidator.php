<?php

namespace App\Http\Validators\Main\Pdf;

use Illuminate\Support\Facades\Validator;

class PdfValidator
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
                'message' => 'required|max:750',
                'dateTo' => 'required|max:255',
                'dateForm' => 'required|max:255',
                'price' => 'required|max:255',
            ];

            // Set errors messages
            $messages = [
                'message.required' => __('messages.t_validator_required'),
                'message.max' => __('messages.t_validator_max', ['max' => 750]),
                'dateTo.required' => __('messages.t_validator_required'),
                'dateTo.max' => __('messages.t_validator_max', ['max' => 60]),
                'dateForm.required' => __('messages.t_validator_required'),
                'dateForm.max' => __('messages.t_validator_max', ['max' => 60]),
                'price.required' => __('messages.t_validator_required'),
                'price.max' => __('messages.t_validator_max', ['max' => 10]),

            ];

            // Set data to validate
            $data = [
                'message' => $request->message,
                'dateTo' => $request->dateTo,
                'dateForm' => $request->dateForm,
                'price' => $request->price,
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
