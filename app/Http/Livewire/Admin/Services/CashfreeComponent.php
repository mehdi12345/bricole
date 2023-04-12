<?php

namespace App\Http\Livewire\Admin\Services;

use App\Http\Validators\Admin\Services\CashfreeValidator;
use App\Models\CashfreeSettings;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Artisan;
use Config;

class CashfreeComponent extends Component
{
    use SEOToolsTrait;
    
    public $is_enabled;
    public $name;
    public $description;
    public $app_id;
    public $secret_key;
    public $is_live;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get cashfree settings
        $settings = settings('cashfree');

        // Fill default settings
        $this->fill([
            'is_enabled'  => $settings->is_enabled,
            'name'        => $settings->name,
            'description' => $settings->description,
            'app_id'      => config('cashfree.PG.appID'),
            'secret_key'  => config('cashfree.PG.secretKey'),
            'is_live'     => config('cashfree.PG.isLive') ? 1 : 0,
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_cashfree_payment_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.cashfree')->extends('livewire.admin.layout.app')->section('content');
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
            CashfreeValidator::validate($this);

            // Save settings
            CashfreeSettings::where('id', 1)->update([
                'is_enabled'  => $this->is_enabled,
                'name'        => $this->name,
                'description' => $this->description
            ]);

            // Set keys
            Config::write('cashfree.PG.appID', $this->app_id);
            Config::write('cashfree.PG.secretKey', $this->secret_key);
            Config::write('cashfree.PG.isLive', $this->is_live ? true : false);

            // Clear config cache
            Artisan::call('config:clear');

            // Update cache
            settings('cashfree', true);

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
