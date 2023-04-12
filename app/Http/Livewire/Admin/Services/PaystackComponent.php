<?php

namespace App\Http\Livewire\Admin\Services;

use App\Http\Validators\Admin\Services\PaystackValidator;
use App\Models\PaystackSettings;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Artisan;
use Config;

class PaystackComponent extends Component
{
    use SEOToolsTrait;
    
    public $is_enabled;
    public $name;
    public $description;
    public $public_key;
    public $secret_key;
    public $merchant_email;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get paystack settings
        $settings = settings('paystack');

        // Fill default settings
        $this->fill([
            'is_enabled'     => $settings->is_enabled,
            'name'           => $settings->name,
            'description'    => $settings->description,
            'public_key'     => config('paystack.publicKey'),
            'secret_key'     => config('paystack.secretKey'),
            'merchant_email' => config('paystack.merchantEmail'),
        ]);
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_paystack_payment_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.paystack')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update settings
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            PaystackValidator::validate($this);

            // Save settings
            PaystackSettings::where('id', 1)->update([
                'is_enabled'  => $this->is_enabled,
                'name'        => $this->name,
                'description' => $this->description
            ]);

            // Set keys
            Config::write('paystack.publicKey', $this->public_key);
            Config::write('paystack.secretKey', $this->secret_key);
            Config::write('paystack.merchantEmail', $this->merchant_email);

            // Clear config cache
            Artisan::call('config:clear');

            // Update cache
            settings('paystack', true);

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_operation_success'),
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_form_validation_error'),
                "type"    => "error"
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_something_went_wrong'),
                "type"    => "error"
            ]);

            throw $th;

        }
    }
    
}
