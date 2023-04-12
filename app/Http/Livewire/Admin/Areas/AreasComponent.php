<?php

namespace App\Http\Livewire\Admin\Areas;

use App\Models\Gig;
use App\Models\Subville;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Livewire\Component;
use Livewire\WithPagination;

class AreasComponent extends Component
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
        $this->seo()->setTitle(setSeoTitle(__('messages.t_subcategories'), true));
        $this->seo()->setDescription(settings('seo')->description);

        return view('livewire.admin.areas.areas', [
            'subcategories' => $this->subcategories,
        ])->extends('livewire.admin.layout.app')->section('content');
    }

    /**
     * Get list of subcategories
     *
     * @return object
     */
    public function getSubcategoriesProperty()
    {
        return Subville::orderByDesc('id')->paginate(42);
    }

    /**
     * Delete subville
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get subville
        $subville = Subville::where('id', $id)->firstOrFail();

        // Count gigs in this ville
        $gigs = Gig::where('subville_id', $subville->id)->count();

        // Check if ville has any gig
        if ($gigs) {

            // Error
            $this->dispatchBrowserEvent('alert', [
                "message" => __('messages.t_this_subville_has_some_gigs_please_edit_it'),
                "type" => "error",
            ]);

            return;

        }

        // Check if subville has icon
        if ($subville->icon) {
            deleteModelFile($subville->icon);
        }

        // Check if subville has image
        if ($subville->image) {
            deleteModelFile($subville->image);
        }

        // Delete subville
        $subville->delete();

        // Success
        $this->dispatchBrowserEvent('alert', [
            "message" => __('messages.t_toast_operation_success'),
        ]);
    }

}
