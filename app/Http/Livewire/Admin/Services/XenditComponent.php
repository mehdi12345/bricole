<?php

namespace App\Http\Livewire\Admin\Services;

use App\Http\Validators\Admin\Services\XenditValidator;
use App\Models\XenditSettings;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Artisan;
use Config;

class XenditComponent extends Component
{
    use SEOToolsTrait;
    
    public $is_enabled;
    public $name;
    public $currency;
    public $exchange_rate;
    public $public_key;
    public $secret_key;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get xendit settings
        $settings = settings('xendit');

        // Fill default settings
        $this->fill([
            'is_enabled'    => $settings->is_enabled,
            'name'          => $settings->name,
            'currency'      => $settings->currency,
            'exchange_rate' => $settings->exchange_rate,
            'public_key'    => config('xendit.public_key'),
            'secret_key'    => config('xendit.secret_key')
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_xendit_payment_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.xendit')->extends('livewire.admin.layout.app')->section('content');
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
            XenditValidator::validate($this);

            // Save settings
            XenditSettings::where('id', 1)->update([
                'is_enabled'    => $this->is_enabled,
                'name'          => $this->name,
                'currency'      => $this->currency,
                'exchange_rate' => $this->exchange_rate,
            ]);

            // Set keys
            Config::write('xendit.public_key', $this->public_key);
            Config::write('xendit.secret_key', $this->secret_key);

            // Clear config cache
            Artisan::call('config:clear');

            // Update cache
            settings('xendit', true);

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
