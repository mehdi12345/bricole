<?php

namespace App\Http\Livewire\Admin\Areas\Options;

use App\Http\Validators\Admin\Areas\EditValidator;
use App\Models\Subville;
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
    public $parent_id;
    public $subcategory;

    /**
     * Initialize component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get subcategory
        $subcategory = Subville::where('uid', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'name' => $subcategory->name,
            'slug' => $subcategory->slug,
            'parent_id' => $subcategory->parent_id,
        ]);

        // Set subcategory
        $this->subcategory = $subcategory;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle(setSeoTitle(__('messages.t_edit_subcategory'), true));
        $this->seo()->setDescription(settings('seo')->description);

        return view('livewire.admin.areas.options.edit', [
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
     * Update subcategory
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this);

            // Update subcategory
            $this->subcategory->name = $this->name;
            $this->subcategory->slug = $this->slug;
            $this->subcategory->parent_id = $this->parent_id;
            $this->subcategory->save();

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
