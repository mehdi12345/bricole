<?php

namespace App\Http\Livewire\Main\Create\Steps;

use App\Http\Validators\Main\Create\OverviewValidator;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subville;
use App\Models\Ville;
use Livewire\Component;

class Overview extends Component
{

    public $title;
    public $category;
    public $ville;
    public $subcategory;
    public $subville;
    public $description;
    public $seo_title;
    public $seo_description;
    public $question;
    public $answer;
    public $tags = [];
    public $faqs = [];
    public $subvilles = [];
    public $subcategories = [];

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.create.steps.overview', [
            'categories' => $this->categories,
            'villes' => $this->villes,
        ]);
    }

    /**
     * Get all parent categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return Category::orderBy('name')->get();
    }

    public function getVillesProperty()
    {
        return Ville::orderBy('name')->get();
    }

    /**
     * Get subcategories
     *
     * @param integer $id
     * @return void
     */
    public function updatedCategory($id)
    {
        // Get all subcategories in this parent category
        $this->subcategories = Subcategory::where('parent_id', $id)->orderBy('name')->get();
    }

    public function updatedVille($id)
    {
        // Get all subcategories in this parent category
        $this->subvilles = Subville::where('parent_id', $id)->orderBy('name')->get();
    }

    /**
     * Add a FAQ to list
     *
     * @return void
     */
    public function addFaq()
    {
        // Validate form
        try {

            // Validate form
            OverviewValidator::faq($this);

            // Set faq
            $faq = [
                'question' => $this->question,
                'answer' => $this->answer,
            ];

            // Add this faq to list
            array_push($this->faqs, $faq);

            // Reset form
            $this->reset(['answer', 'question']);

            // Success
            $this->dispatchBrowserEvent('alert', [
                "message" => __('messages.t_faq_added_successfully'),
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

    /**
     * Remove item from list
     *
     * @param integer $key
     * @return void
     */
    public function removeFaq($key)
    {
        // Check if item set in array
        if (isset($this->faqs[$key])) {

            // Remove it
            unset($this->faqs[$key]);

        }
    }

    /**
     * Add tag to list
     *
     * @param string $tag
     * @return void
     */
    public function addTag(string $tag)
    {
        // Validate form
        try {

            // Validate form
            OverviewValidator::tag($tag);

            // Clear tag
            $clean = str_replace(['"', "'", ";", ":", "/", ",", ".", "-", "_", "&", "!"], "", $tag);

            // Add add tag to list
            array_push($this->tags, $clean);

            // Refresh tags list
            array_values($this->tags);

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

    /**
     * Remove tag from list
     *
     * @param string $tag
     * @return void
     */
    public function removeTag($tag)
    {
        // Get tag key
        $key = array_search($tag, $this->tags);

        // Check if tag exists
        if (isset($this->tags[$key])) {

            // Delete this tag
            unset($this->tags[$key]);

            // Refresh tags list
            array_values($this->tags);

        }
    }

    /**
     * Save overview data section
     *
     * @return void
     */
    public function save()
    {
        try {

            // Validate form
            OverviewValidator::all($this);

            // Set data
            $data['title'] = $this->title;
            $data['category'] = $this->category;
            $data['subcategory'] = $this->subcategory;
            $data['ville'] = $this->ville;
            $data['subville'] = $this->subville;
            $data['description'] = $this->description;
            $data['seo_title'] = $this->seo_title ? $this->seo_title : null;
            $data['seo_description'] = $this->seo_description ? $this->seo_description : null;
            $data['tags'] = $this->tags;
            $data['faqs'] = $this->faqs ? $this->faqs : null;

            // Send this data to parent component
            $this->emit('data-saved-overview', $data);

            // Success
            $this->dispatchBrowserEvent('alert', [
                "message" => __('messages.t_data_has_been_saved'),
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
