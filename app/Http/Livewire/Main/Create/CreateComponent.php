<?php

namespace App\Http\Livewire\Main\Create;

use App\Models\Admin;
use App\Models\Gig;
use App\Models\GigDocument;
use App\Models\GigFaq;
use App\Models\GigImage;
use App\Models\GigRequirement;
use App\Models\GigRequirementOption;
use App\Models\GigSeo;
use App\Models\GigUpgrade;
use App\Notifications\Admin\PendingGig;
use App\Utils\Uploader\ImageUploader;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class CreateComponent extends Component
{

    use WithFileUploads, SEOToolsTrait;

    // Overview section
    public $title;
    public $category;
    public $subcategory;
    public $ville;
    public $subville;
    public $description;
    public $seo_title;
    public $seo_description;
    public $tags = [];
    public $faqs = [];

    // Pricing
    public $price;
    public $delivery_time;
    public $upgrades;

    // Requirements
    public $requirements;

    // Gallery
    public $images;
    public $documents;
    public $video_link;
    public $video_id;
    public $thumbnail;

    public $isFinished = false;

    public $current_step = 'overview';

    protected $listeners = [
        'data-saved-overview' => 'overview',
        'data-saved-pricing' => 'pricing',
        // 'data-saved-requirements' => 'requirements',
        'data-saved-gallery' => 'gallery',
        'back',
    ];

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator = settings('general')->separator;
        $title = __('messages.t_publish_new_gig') . " $separator " . settings('general')->title;
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

        return view('livewire.main.create.create')->extends('livewire.main.layout.app')->section('content');
    }

    /**
     * Go back to preview step
     *
     * @return void
     */
    public function back()
    {
        // Check current step
        switch ($this->current_step) {
            case 'pricing':
                $this->current_step = 'overview';
                break;

            // case 'requirements':
            //     $this->current_step = 'pricing';
            //     break;

            case 'gallery':
                $this->current_step = 'pricing';
                break;
        }
    }

    /**
     * Save overview section
     *
     * @param array $data
     * @return void
     */
    public function overview($data)
    {
        try {

            // Set data
            $this->title = $data['title'];
            $this->category = $data['category'];
            $this->subcategory = $data['subcategory'];
            $this->ville = $data['ville'];
            $this->subville = $data['subville'];
            $this->description = $data['description'];
            $this->seo_title = $data['seo_title'];
            $this->seo_description = $data['seo_description'];
            $this->tags = $data['tags'];
            $this->faqs = $data['faqs'];

            // Form valid, now go to next step
            $this->current_step = "pricing";

            // Scroll up
            $this->dispatchBrowserEvent('scrollUp');

        } catch (\Throwable$th) {
            throw $th;
        }
    }

    /**
     * Save pricing section
     *
     * @param array $data
     * @return void
     */
    public function pricing($data)
    {
        try {

            // Set data
            $this->price = $data['price'];
            $this->delivery_time = $data['delivery_time'];
            $this->upgrades = $data['upgrades'];

            // Form valid, now go to next step
            $this->current_step = "gallery";

            // Scroll up
            $this->dispatchBrowserEvent('scrollUp');

        } catch (\Throwable$th) {
            throw $th;
        }
    }

    /**
     * Save requirements section
     *
     * @param array $data
     * @return void
     */
    public function requirements($data)
    {
        try {

            // Set requirements
            $this->requirements = $data['requirements'];

            // Form valid, now go to next step
            $this->current_step = "gallery";

            // Scroll up
            $this->dispatchBrowserEvent('scrollUp');

        } catch (\Throwable$th) {
            throw $th;
        }
    }

    /**
     * Save gallery section
     *
     * @param array $data
     * @return void
     */
    public function gallery($data)
    {

        try {

            // Loop through images
            foreach ($data['images'] as $key => $image) {
                $this->images[$key] = new TemporaryUploadedFile($image, config('filesystems.default'));
            }

            // Loop through documents
            if (isset($data['documents'])) {
                foreach ($data['documents'] as $key => $document) {
                    $this->documents[$key] = new TemporaryUploadedFile($document, config('filesystems.default'));
                }
            }

            // Set gallery data
            $this->thumbnail = new TemporaryUploadedFile($data['thumbnail'], config('filesystems.default'));
            $this->video_link = $data['video_link'];
            $this->video_id = $data['video_id'];

            //Post gig
            $this->finish();

            // Scroll up
            $this->dispatchBrowserEvent('scrollUp');

        } catch (\Throwable$th) {
            throw $th;
        }
    }

    /**
     * Now let's post this gig
     *
     * @return void
     */
    public function finish()
    {
        try {

            // Generate unique id for this gig
            $uid = uid();

            // Get title
            $title = clean($this->title);

            // Generate unique slug for this gig
            $slug = substr(Str::slug($title), 0, 138) . '-' . $uid;

            // Get description
            $description = clean($this->description);

            // Get price
            $price = clean($this->price);

            // Get delivery time
            $delivery_time = $this->delivery_time;

            // Get parent category
            $category_id = $this->category;

            // Get subcategory
            $subcategory_id = $this->subcategory;

            // Get parent ville
            $ville_id = $this->ville;

            // Get subville
            $subville_id = $this->subville;

            // Get gig status
            $status = settings('publish')->auto_approve_gigs ? 'active' : 'pending';

            // Check if gig has upgrades
            $has_upgrades = is_array($this->upgrades) && count($this->upgrades) ? true : false;

            // Check if gig has faqs
            $has_faqs = is_array($this->faqs) && count($this->faqs) ? true : false;

            // Get video link
            $video_link = $this->video_link ? clean($this->video_link) : null;

            // Get video id
            $video_id = $this->video_id ? clean($this->video_id) : null;

            // Get gig preview image
            $preview = $this->thumbnail;

            // Upload thumbnail image
            $image_thumb_id = ImageUploader::make($preview)->resize(400)->folder('gigs/previews/small')->handle();

            // Upload medium image
            $image_medium_id = ImageUploader::make($preview)->resize(800)->folder('gigs/previews/medium')->handle();

            // Upload large image
            $image_large_id = ImageUploader::make($preview)->resize(1200)->folder('gigs/previews/large')->handle();

            // Save gig
            $gig = new Gig();
            $gig->uid = $uid;
            $gig->user_id = auth()->id();
            $gig->title = $title;
            $gig->slug = $slug;
            $gig->description = $description;
            $gig->price = $price;
            $gig->delivery_time = $delivery_time;
            $gig->category_id = $category_id;
            $gig->subcategory_id = $subcategory_id;
            $gig->ville_id = $ville_id;
            $gig->subville_id = $subville_id;
            $gig->image_thumb_id = $image_thumb_id;
            $gig->image_medium_id = $image_medium_id;
            $gig->image_large_id = $image_large_id;
            $gig->status = $status;
            $gig->has_upgrades = $has_upgrades;
            $gig->has_faqs = $has_faqs;
            $gig->video_link = $video_link;
            $gig->video_id = $video_id;
            $gig->save();

            // Save gig images
            foreach ($this->images as $image) {

                // Upload small image
                $img_thumb_id = ImageUploader::make($image)->resize(400)->folder('gigs/gallery/small')->handle();

                // Upload medium image
                $img_medium_id = ImageUploader::make($image)->resize(800)->folder('gigs/gallery/medium')->handle();

                // Upload large image
                $img_large_id = ImageUploader::make($image)->resize(1200)->folder('gigs/gallery/large')->handle();

                // Save images
                GigImage::create([
                    'gig_id' => $gig->id,
                    'img_thumb_id' => $img_thumb_id,
                    'img_medium_id' => $img_medium_id,
                    'img_large_id' => $img_large_id,
                ]);

            }

            // Check if documents exists in request
            if (settings('publish')->is_documents_enabled && is_array($this->documents) && count($this->documents)) {

                // Loop through documents
                foreach ($this->documents as $doc) {

                    // Generate document unique id
                    $doc_uid = uid();

                    // Get original name
                    $name = $doc->getClientOriginalName();

                    // Get file size
                    $size = $doc->getSize();

                    // Move document to local storage
                    $doc->storeAs('gigs/documents', $doc_uid . '.pdf', 'custom');

                    // Save document in database
                    GigDocument::create([
                        'uid' => $doc_uid,
                        'gig_id' => $gig->id,
                        'name' => $name,
                        'size' => $size,
                    ]);

                }

            }

            // Success message
            $this->dispatchBrowserEvent('alert', [
                "message" => __('messages.t_gig_created_successfully'),
            ]);

            // Gig has been posted successfully
            $this->isFinished = url('service', $slug);

            // Send notification to admin
            if ($status === 'pending') {

                Admin::first()->notify((new PendingGig($gig))->locale(config('app.locale')));

            }

        } catch (\Throwable$th) {
            throw $th;
        }
    }

}
