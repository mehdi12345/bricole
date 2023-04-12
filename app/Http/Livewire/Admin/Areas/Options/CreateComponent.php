<?php

namespace App\Http\Livewire\Admin\Areas\Options;

use App\Http\Validators\Admin\Areas\CreateValidator;
use App\Models\Subville;
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
    public $parent_id;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle(setSeoTitle(__('messages.t_create_subcategory'), true));
        $this->seo()->setDescription(settings('seo')->description);

        return view('livewire.admin.areas.options.create', [
            'categories' => $this->categories,
        ])->extends('livewire.admin.layout.app')->section('content');
    }

    /**
     * Get all parent categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return Ville::orderBy('name')->get();
    }

    /**
     * Create new subcategory
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Save subcategory
            $subcategory = new Subville();
            $subcategory->uid = uid();
            $subcategory->name = $this->name;
            $subcategory->slug = $this->slug;
            $subcategory->parent_id = $this->parent_id;
            $subcategory->save();

            // Reset form
            $this->resetExcept('parent_id');

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
