<?php

namespace App\Http\Livewire\Main\Search;

use App\Models\Gig;
use App\Models\Subville;
use App\Models\Ville;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

class SearchComponent extends Component
{

    use WithPagination, SEOToolsTrait;

    public $q;
    protected $queryString = ['q', 'min_price', 'max_price', 'delivery_time', 'rating', 'sort_by', 'ville', 'subville'];

    public $delivery_times;

    // filters
    public $ville;
    public $subville;
    public $subville2;
    public $sort_by;
    public $min_price;
    public $max_price;
    public $delivery_time;
    public $rating;

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Check if there is a keyword
        if (!$this->q) {
            return redirect('/');
        }

        // Set delivery times
        $this->delivery_times = [
            ['value' => 1, 'text' => __('messages.t_1_day')],
            ['value' => 2, 'text' => __('messages.t_2_days')],
            ['value' => 3, 'text' => __('messages.t_3_days')],
            ['value' => 4, 'text' => __('messages.t_4_days')],
            ['value' => 5, 'text' => __('messages.t_5_days')],
            ['value' => 6, 'text' => __('messages.t_6_days')],
            ['value' => 7, 'text' => __('messages.t_1_week')],
            ['value' => 14, 'text' => __('messages.t_2_weeks')],
            ['value' => 21, 'text' => __('messages.t_3_weeks')],
            ['value' => 30, 'text' => __('messages.t_1_month')],
        ];
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator = settings('general')->separator;
        $title = __('messages.t_search_results_for_q', ['q' => $this->q]) . " $separator " . settings('general')->title;
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

        return view('livewire.main.search.search', [
            'gigs' => $this->gigs,
            'villes' => $this->villes,
            "subvilles" => $this->subvilles,
        ])->extends('livewire.main.layout.app')->section('content');
    }

    /**
     * Get gigs
     *
     * @return void
     */
    public function getSubvillesProperty()
    {

        // Get all subcategories in this parent category
        return Subville::query()->where('parent_id', $this->ville)->get();
    }

    public function getVillesProperty()
    {
        return Ville::orderBy('name')->get();
    }
    /**
     * Get gigs
     *
     * @return object
     */
    public function getGigsProperty()
    {
        // start a new query
        $query = Gig::query()->active();

        // Check price
        if ($this->min_price) {
            $query->whereBetween('price', [$this->min_price, 999999]);
        }

        // Set max price
        if ($this->max_price) {
            $query->whereBetween('price', [0, $this->max_price]);
        }

        // Check delivery time
        if ($this->delivery_time) {
            $query->where('delivery_time', $this->delivery_time);
        }

        // Check rating
        if ($this->rating) {
            $query->whereBetween('rating', [$this->rating, $this->rating + 1]);
        }

        // Check rating
        if ($this->ville) {
            $query->where('ville_id', $this->ville);
        }

        // Check rating
        if ($this->subville) {
            $query->where('subville_id', $this->subville);

        }

        // Check sort by
        if ($this->sort_by) {
            switch ($this->sort_by) {

                // Most popular
                case 'popular':
                    $query->orderByDesc('counter_visits');
                    break;

                // Best rating
                case 'rating':
                    $query->orderByDesc('rating');
                    break;

                // Most sales
                case 'sales':
                    $query->orderByDesc('counter_sales');
                    break;

                // Newest
                case 'newest':
                    $query->orderByDesc('id');
                    break;

                // Price low to high
                case 'price_low_high':
                    $query->orderBy('price', 'desc');
                    break;

                case 'ville':
                    $query->orderBy('ville_id', 'asc');
                    break;
                case 'subville':
                    $query->orderBy('subville_id', 'asc');
                    break;

                // Price high to low
                case 'price_high_low':
                    $query->orderBy('price', 'asc');
                    break;

                default:
                    $query->orderByRaw('RAND()');
                    break;
            }
        }

        // Set results
        return $query->where(function ($builder) {
            return $builder->where('title', 'LIKE', "%{$this->q}%")
                ->orWhere('description', 'LIKE', "%{$this->q}%")
                ->orWhereHas('tagged', function ($query) {
                    return $query->where('tag_name', 'LIKE', "%{$this->q}%");
                });
        })
            ->paginate(42);
    }

    /**
     * Filter data
     *
     * @return mixed
     */
    public function filter()
    {
        $this->subville = $this->subville2;

        // Set empty array
        $queries = [];

        // Check if rating
        if ($this->rating && in_array($this->rating, [1, 2, 3, 4, 5])) {
            $queries['rating'] = $this->rating;
        }

        // Check if has min price
        if ($this->min_price) {
            $queries['min_price'] = $this->min_price;
        }

        // Check if has max price
        if ($this->max_price) {
            $queries['max_price'] = $this->max_price;
        }
        // Check if rating
        if ($this->ville) {
            $queries['ville'] = $this->ville;
        }
        // Check if rating
        if ($this->subville) {
            $queries['subville'] = $this->subville;
        }

        // Check if has delivery time
        if ($this->delivery_time) {
            $queries['delivery_time'] = $this->delivery_time;
        }

        // Change this to query string
        $string = Arr::query($queries);

        // Generate url
        $url = url("search?q=" . $this->q . '&' . $string);

        return redirect($url);
    }

    /**
     * Reset filter
     *
     * @return void
     */
    public function resetFilter()
    {
        // Reset filter
        return redirect('search?q=' . $this->q);
    }

}
