<?php

namespace App\Http\Livewire\Admin\Citys;

use App\Models\Gig;
use App\Models\Ville;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Livewire\Component;
use Livewire\WithPagination;

class CitysComponent extends Component
{
    use WithPagination, SEOToolsTrait;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle(setSeoTitle(__('messages.t_categories'), true));
        $this->seo()->setDescription(settings('seo')->description);

        return view('livewire.admin.citys.citys', [
            'categories' => $this->categories,
        ])->extends('livewire.admin.layout.app')->section('content');
    }

    /**
     * Get list of categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return Ville::orderByDesc('id')->paginate(42);
    }

    /**
     * Delete category
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get category
        $category = Ville::where('id', $id)->firstOrFail();

        // Count gigs in this category
        $gigs = Gig::where('ville_id', $category->id)->count();

        // Check if category has any gig
        if ($gigs) {

            // Error
            $this->dispatchBrowserEvent('alert', [
                "message" => __('messages.t_this_ville_has_some_gigs_please_edit_it'),
                "type" => "error",
            ]);

            return;

        }

        // Delete category
        $category->delete();

        // Success
        $this->dispatchBrowserEvent('alert', [
            "message" => __('messages.t_toast_operation_success'),
        ]);
    }

}
