<?php

namespace App\Http\Livewire\Admin\Citys\Options;

use App\Http\Validators\Admin\City\CreateValidator;
use App\Models\Ville;
use App\Utils\Uploader\ImageUploader;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateComponent extends Component
{

    use WithFileUploads, SEOToolsTrait;

    public $name;
    public $slug;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle(setSeoTitle(__('messages.t_create_category'), true));
        $this->seo()->setDescription(settings('seo')->description);

        return view('livewire.admin.citys.options.create')->extends('livewire.admin.layout.app')->section('content');
    }

    /**
     * Create new category
     *
     * @return void
     */
    public function create()
    {
        try {

            CreateValidator::validate($this);
            // Save category
            $category = new Ville();
            $category->uid = uid();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();

            // Reset form
            $this->reset();

            // Success
            $this->dispatchBrowserEvent('alert', [
                "message" => __('messages.t_toast_operation_success'),
            ]);

        } catch (\Illuminate\Validation\ValidationException$e) {

            // Validation error
            $this->dispatchBrowserEvent('alert', [
                "message" => __('messages.t_toast_form_validation_error'),
                "type" => "error",
            ]);

            throw $e;

        } catch (\Throwable$th) {

            // Error
            $this->dispatchBrowserEvent('alert', [
                "message" => __('messages.t_toast_something_went_wrong'),
                "type" => "error",
            ]);

            throw $th;

        }
    }

}
