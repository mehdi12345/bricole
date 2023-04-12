<main class="w-full" x-data="window.AoyAvhrbNoSMGMS" x-init="init">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                {{-- Sidebar --}}
                <aside class="lg:col-span-3 py-6" wire:ignore>
                    <x-main.account.sidebar />
                </aside>

                {{-- Section content --}}
                <div class="divide-y divide-gray-200 lg:col-span-9">

                    {{-- Form --}}
                    <div class="py-6 px-4 sm:p-6 lg:pb-8 h-[calc(100%-80px)]">

                        {{-- Section header --}}
                        <div class="mb-14">
                            <h2 class="text-base leading-6 font-bold text-gray-900">{{ __('messages.t_edit_review') }}</h2>
                            <p class="mt-1 text-sm text-gray-500">{{ __('messages.t_update_ur_review_for_this_gig') }}</p>
                        </div>
                        
                        {{-- Section content --}}
                        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                            {{-- Review form --}}
                            <div class="col-span-12 md:col-span-6">

                                {{-- Rating --}}
                                <div class="mb-4 w-full">
                                    <span class="block text-xs font-medium text-gray-700 mb-2">{{ __('messages.t_rating') }}</span>
                                    <div id="rating-set-container" wire:ignore></div>
                                </div>

                                {{-- Message --}}
                                <div class="w-full mb-6">
                                    <x-forms.textarea
                                        :label="__('messages.t_message')"
                                        :placeholder="__('messages.t_enter_your_review_message')"
                                        model="message"
                                        rows="8"
                                        icon="calendar-text" />
                                </div>

                                {{-- Update --}}
                                <div class="w-full">
                                    <x-forms.button action="update" :text="__('messages.t_update')" :block="true" />
                                </div>

                            </div>

                            {{-- Gig preview --}}
                            <div class="col-span-12 md:col-span-6">
                                @livewire('main.cards.gig', ['gig' => $review->gig])
                            </div>

                        </div>

                    </div>               

                </div>

            </div>
        </div>
    </div>
</main>

@push('scripts')

    {{-- Slick Plugin --}}
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    {{-- Splide Plugin --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/js/splide-extension-video.min.js">
    </script>

    {{-- AlpineJs --}}
    <script>
        function AoyAvhrbNoSMGMS() {
            return {

                // Init
                init() {

                    // Rating
                    $(function () {
 
                        $("#rating-set-container").rateYo({
                            rating    : @js($rating),
                            starWidth : "24px",
                            ratedFill : "#ffc136",
                            normalFill: "#dadada",
                            fullStar  : true,
                            rtl       : __var_rtl,
                            starSvg   : '<svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>'
                        }).on("rateyo.set", function (e, data) {
 
                            var rating = data.rating;
                            @this.set('rating', rating);

                        });

                    });

                    var _this = this;

                    // Wait until page loaded
                    document.addEventListener('DOMContentLoaded', function() {

                        // Splide Plugin
                        _this.splides();

                        // Slick Plugin
                        _this.slicks();

                    });

                },

                // Splide Sliders
                splides() {
                    var splides = document.getElementsByClassName('splide');

                    for (var i = 0, len = splides.length; i < len; i++) {
                        new Splide(splides[i], {
                            type: 'loop',
                            cover: true,
                            autoplay: false,
                            pauseOnHover: true,
                            heightRatio: 0.3,
                            height: 200,
                            rewind: true,
                            pagination: false,
                            arrows: true,
                            video: {
                                loop: true,
                                mute: true
                            },
                        }).mount(window.splide.Extensions);
                    }
                },

                // Slick sliders
                slicks() {
                    $('.your-class').slick({
                        dots: true,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                            // You can unslick at a given breakpoint now by adding:
                            // settings: "unslick"
                            // instead of a settings object
                        ]
                    });
                }

            }
        }
        window.AoyAvhrbNoSMGMS = AoyAvhrbNoSMGMS();
    </script>
@endpush

@push('styles')

    {{-- Slick Plugin --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    {{-- Splide Plugin --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide-core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/themes/splide-default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/css/splide-extension-video.min.css">
        
@endpush
