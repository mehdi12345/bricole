<div class="w-full" x-data="window.XlzFAqVnjAycOvK" x-init="init">
    <div class="grid grid-cols-12 gap-6">

        
        <?php if(settings('appearance')->show_featured_categories): ?>
            <div class="col-span-12 mt-6 xl:mt-6 mb-16">
                <span class="font-semibold text-gray-400 uppercase tracking-wider text-center block"><?php echo e(__('messages.t_featured_categories')); ?></span>
                <div class="flex-wrap justify-center items-center mt-8 -mx-5" id="featured-categories-slick" wire:ignore>

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(url('categories', $category->slug)); ?>" class="relative !h-44 rounded-lg !p-6 !flex !flex-col overflow-hidden group mx-5">
                        <span aria-hidden="true" class="absolute inset-0">
                            <img src="<?php echo e(src($category->image)); ?>" alt="<?php echo e($category->name); ?>" class="w-full h-full object-center object-cover opacity-70 group-hover:opacity-100">
                        </span>
                        <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-90"></span>
                        <span class="relative mt-auto text-center text-xl font-bold text-white"><?php echo e($category->name); ?></span>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        <?php endif; ?>

        
        <?php if(settings('appearance')->show_bestsellers && is_array($sellers) && count($sellers)): ?>
            <div class="col-span-12 mt-6 xl:mt-6 mb-16">
                <span class="font-semibold text-gray-400 uppercase tracking-wider text-center block"><?php echo e(__('messages.t_top_sellers')); ?></span>
                <a href="<?php echo e(url('sellers')); ?>" class="mt-1 text-indigo-600 hover:text-indigo-700 text-xs font-medium uppercase tracking-widest text-center block"><?php echo e(__('messages.t_view_more')); ?></a>

                <ul class="flex-wrap justify-center items-center mt-8 -mx-5" id="top-sellers-slick" wire:ignore>
                    <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="col-span-1 flex flex-col text-center bg-white rounded-md shadow divide-y divide-gray-200 mx-5">
                        <div class="px-4 py-8">

                            
                            <a href="<?php echo e(url('profile', $seller->username)); ?>" target="_blank" class="inline-block relative">
                                <img class="h-16 w-16 rounded-full" src="<?php echo e(src($seller->avatar)); ?>" alt="<?php echo e($seller->username); ?>">
                                <?php if($seller->isOnline() && !$seller->availability): ?>
                                    <span class="absolute top-0.5 ltr:right-0.5 rtl:left-0.5 block h-3 w-3 rounded-full ring-2 ring-white bg-green-400"></span>
                                <?php elseif($seller->availability): ?>
                                    <span class="absolute top-0.5 ltr:right-0.5 rtl:left-0.5 block h-3 w-3 rounded-full ring-2 ring-white bg-gray-400"></span>
                                <?php else: ?>
                                    <span class="absolute top-0.5 ltr:right-0.5 rtl:left-0.5 block h-3 w-3 rounded-full ring-2 ring-white bg-red-400"></span>
                                <?php endif; ?>
                            </a>

                            
                            <a href="<?php echo e(url('profile', $seller->username)); ?>" target="_blank" class="mt-4 text-gray-900 text-sm font-bold tracking-wider flex items-center justify-center">
                                <?php echo e($seller->username); ?>

                                <?php if($seller->status === 'verified'): ?>
                                    <svg data-tooltip-target="account-verified-badge" class="ltr:ml-0.5 rtl:mr-0.5" width="17px" height="17px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
                                    <div id="account-verified-badge" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        <?php echo e(__('messages.t_account_verified')); ?>

                                    </div>
                                <?php endif; ?>
                            </a>

                            <dl class="mt-1 flex-grow flex flex-col justify-between">
                                <dt class="sr-only">Level</dt>
                                <dd class="text-[11px] font-medium uppercase tracking-widest" style="color:<?php echo e($seller->level->level_color); ?>"><?php echo e($seller->level->title); ?></dd>
                                <dt class="sr-only">Skills</dt>
                                <dd class="mt-5 space-x-1 rtl:space-x-reverse">

                                    
                                    <div class="flex items-center justify-center mb-5" wire:ignore>

                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>

                                        
                                        <?php if($seller->rating() == 0): ?>
                                            <div class="font-[Lato] text-[13px] tracking-widest text-amber-500 ltr:ml-1 rtl:mr-1 font-black"><?php echo e(__('messages.t_n_a')); ?></div>
                                        <?php else: ?>
                                            <div class="font-[Lato] text-sm tracking-widest text-amber-500 ltr:ml-1 rtl:mr-1 font-black"><?php echo e($seller->rating()); ?></div>
                                        <?php endif; ?>

                                        
                                        <div class="ltr:ml-2 rtl:mr-2 text-[13px] font-normal text-gray-400">
                                            ( <?php echo e(number_format($seller->reviews()->count())); ?> )
                                        </div>

                                    </div>

                                    <?php $__currentLoopData = $seller->skills()->InRandomOrder()->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="inline-flex mb-2 px-3 py-1.5 items-center text-gray-800 text-xs font-medium bg-gray-100 rounded-full">
                                            <?php echo e($skill->name); ?>

                                        </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </dd>
                            </dl>

                        </div>

                        
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200 rtl:divide-x-reverse bg-gray-100">

                                <?php if(auth()->guard()->check()): ?>
                                    
                                    <div class="w-0 flex-1 flex">
                                        <a href="<?php echo e(url('messages/new', $seller->username)); ?>" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-xs text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/> <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/> </svg>
                                            <span class="ltr:ml-2 rtl:mr-2"><?php echo e(__('messages.t_contact_me')); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <?php if(auth()->guard()->guest()): ?>
                                    
                                    <div class="w-0 flex-1 flex">
                                        <a href="<?php echo e(url('profile', $seller->username)); ?>" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-xs text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/></svg>
                                            <span class="ltr:ml-2 rtl:mr-2"><?php echo e(__('messages.t_view_profile')); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>

                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($category->gigs()->count()): ?>

                
                <div class="col-span-12">
                    <div class="flex justify-between items-center bg-transparent py-2">

                        <div>
                            <span class="font-extrabold text-xl text-gray-800 pb-1 block tracking-wider"><?php echo e($category->name); ?></span>
                        </div>

                        <div>
                            <a href="<?php echo e(url('categories', $category->slug)); ?>" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
                                <?php echo e(__('messages.t_view_more')); ?>


                                
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden ltr:inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>

                                
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden rtl:inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                            </a>
                        </div>

                    </div>
                </div>

                
                <div class="col-span-12 mb-16">
                    <div class="grid grid-cols-12 sm:gap-x-9 gap-y-6">
                        <?php $__currentLoopData = $category->gigs()->active()->inRandomOrder()->take(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('gig-item-' . $category->id . '-' . $gig->uid)) {
    $componentId = $_instance->getRenderedChildComponentId('gig-item-' . $category->id . '-' . $gig->uid);
    $componentTag = $_instance->getRenderedChildComponentTagName('gig-item-' . $category->id . '-' . $gig->uid);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gig-item-' . $category->id . '-' . $gig->uid);
} else {
    $response = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('gig-item-' . $category->id . '-' . $gig->uid, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- 
        <?php if(settings('newsletter')->is_enabled): ?>
            <div class="col-span-12">
                <div class="bg-gray-100 rounded-md p-6 flex items-center sm:p-10">
                    <div class="max-w-lg mx-auto">
                        <h3 class="font-semibold text-gray-900"><?php echo e(__('messages.t_sign_up_for_newsletter')); ?></h3>
                        <p class="mt-2 text-sm text-gray-500"><?php echo e(__('messages.t_sign_up_for_newsletter_subtitle')); ?></p>
                        <div class="mt-4 sm:mt-6 sm:flex">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input wire:model.defer="email" id="email-address" type="text" autocomplete="email" required="" placeholder="<?php echo e(__('messages.t_enter_email_address')); ?>"
                                class="h-14 appearance-none min-w-0 w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 text-sm text-gray-900 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                            <div class="mt-3 sm:flex-shrink-0 sm:mt-0 ltr:sm:ml-4 rtl:sm:mr-4">
                                <button wire:click="newsletter" wire:loading.attr="disabled" wire:target="newsletter" type="button" class="h-14 w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 flex items-center justify-center text-sm font-bold tracking-wider text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-indigo-500">
                                    <?php echo e(__('messages.t_signup')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?> -->

    </div>
</div>

<?php $__env->startPush('scripts'); ?>

    
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/js/splide-extension-video.min.js">
    </script>

    
    <?php if(settings('appearance')->show_featured_categories): ?>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script>
            // Init featured categories slick
            $('#featured-categories-slick').slick({
                dots          : false,
                autoplay      : true,
                infinite      : true,
                speed         : 300,
                slidesToShow  : 6,
                slidesToScroll: 1,
                arrows        : false,
                responsive    : [
                    {
                    breakpoint: 1024,
                        settings: {
                            slidesToShow  : 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                    breakpoint: 800,
                        settings: {
                            slidesToShow  : 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                    breakpoint: 600,
                        settings: {
                            slidesToShow  : 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                    breakpoint: 480,
                        settings: {
                            slidesToShow  : 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        </script>
    <?php endif; ?>

    
    <?php if(settings('appearance')->show_bestsellers && is_array($sellers) && count($sellers)): ?>
        <script>
            // Init featured categories slick
            $('#top-sellers-slick').slick({
                dots          : false,
                autoplay      : true,
                infinite      : true,
                speed         : 300,
                slidesToShow  : 5,
                slidesToScroll: 1,
                arrows        : false,
                responsive    : [
                    {
                    breakpoint: 1024,
                        settings: {
                            slidesToShow  : 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                    breakpoint: 800,
                        settings: {
                            slidesToShow  : 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                    breakpoint: 600,
                        settings: {
                            slidesToShow  : 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                    breakpoint: 480,
                        settings: {
                            slidesToShow  : 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        </script>
    <?php endif; ?>

    
    <script>
        function XlzFAqVnjAycOvK() {
            return {

                // Init component
                init() {

                    // Init splidejs
                    window.splidejs();

                }

            }
        }
        window.XlzFAqVnjAycOvK = XlzFAqVnjAycOvK();
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide-core.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/themes/splide-default.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/css/splide-extension-video.min.css">

    
    <?php if(settings('appearance')->show_featured_categories): ?>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <?php endif; ?>

<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\bricole\resources\views/livewire/main/home/home.blade.php ENDPATH**/ ?>