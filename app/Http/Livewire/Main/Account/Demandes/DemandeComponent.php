<?php

namespace App\Http\Livewire\Main\Account\Demandes;

use App\Models\Demande;
use App\Models\OrderItem;
use App\Models\RequirementDemande;
use App\Notifications\User\Seller\OrderItemCanceled;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Livewire\Component;
use Livewire\WithPagination;

class DemandeComponent extends Component
{

    use WithPagination, SEOToolsTrait;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator = settings('general')->separator;
        $title = __('messages.t_my_orders') . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage = src(settings('seo')->ogimage);

        $this->seo()->setTitle($title);
        $this->seo()->setDescription($description);
        $this->seo()->setCanonical(url()->current());
        $this->seo()->opengraph()->setTitle($title);
        $this->seo()->opengraph()->setDescription($description);
        $this->seo()->opengraph()->setUrl(url()->current());
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage($ogimage);
        $this->seo()->twitter()->setImage($ogimage);
        $this->seo()->twitter()->setUrl(url()->current());
        $this->seo()->twitter()->setSite("@" . settings('seo')->twitter_username);
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle($title);
        $this->seo()->jsonLd()->setDescription($description);
        $this->seo()->jsonLd()->setUrl(url()->current());
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.account.demande.demande', [
            'orders' => $this->orders,
        ])->extends('livewire.main.layout.app')->section('content');
    }

    /**
     * Get list of orders
     *
     * @return object
     */
    public function getOrdersProperty()
    {

        $demand = Demande::where('user_id', auth()->id())->get();
        return $demand;
    }

    /**
     * Cancel order
     *
     * @param string $id
     * @return void
     */
    public function cancel($id)
    {}

    /**
     * Delete from favorite list
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Delete from list
        Demande::where('id', $id)->where('user_id', auth()->id())->delete();

        $this->dispatchBrowserEvent('alert', [
            "message" => __('messages.t_gig_removed_from_ur_favorite_list'),
        ]);
    }

    /**
     * Delete from favorite list
     *
     * @param integer $id
     * @return void
     */
    public function dawland($id, $idD)
    {
        // Delete from list
        $demm = RequirementDemande::where('id', $id)->firstOrFail();
        redirect("https://localhost/main/bricole/pdf/" . $idD . "/" . $demm->descreption . "/" . $demm->dateTo . "/" . $demm->dateForm . "/" . $demm->price);

    }
}
