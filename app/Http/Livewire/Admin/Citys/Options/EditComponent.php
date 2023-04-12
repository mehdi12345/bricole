<?php

namespace App\Http\Livewire\Admin\Citys\Options;

use App\Http\Validators\Admin\City\EditValidator;
use App\Models\Ville;
use App\Utils\Uploader\ImageUploader;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditComponent extends Component
{

    use WithFileUploads, SEOToolsTrait;

    public $name;
    public $slug;

    public $category;

    public function mount($id)
    {
        // Get category
        $category = Ville::where('uid', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'name' => $category->name,
            'slug' => $category->slug,

        ]);

        // Set category
        $this->category = $category;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle(setSeoTitle(__('messages.t_edit_category'), true));
        $this->seo()->setDescription(settings('seo')->description);

        return view('livewire.admin.citys.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }

    /**
     * Update category
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this);

            // Update category
            $this->category->name = $this->name;
            $this->category->slug = $this->slug;
            $this->category->save();

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
