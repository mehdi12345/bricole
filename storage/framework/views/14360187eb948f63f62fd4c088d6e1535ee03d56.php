<div class="relative md:mx-auto " x-data="window.oZcfXWmBuWfxbIo" x-init="initialize()">


    <?php if ($gig->owner->availability): ?>
        <div class="rounded-md bg-amber-100 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                </div>
                <div class="ltr:ml-3 rtl:mr-3">
                    <h3 class="text-sm font-bold text-amber-800"><?php echo e(__('messages.t_attention_needed')); ?></h3>
                    <div class="mt-2 text-xs font-normal text-amber-700">
                        <p>
                            <?php echo __('messages.t_seller_wont_be_able_to_receive_orders_date', ['date' => format_date($gig->owner->availability->expected_available_date, 'F j, Y')]); ?>

                        </p>
                        <p class="border-l-4 pl-2 border-amber-500 mt-4">
                            <?php echo e($gig->owner->availability->message); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>


    <?php if ($gig->status === 'pending'): ?>
        <div class="bg-yellow-100 ltr:border-l-4 rtl:border-r-4 border-yellow-400 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                </div>
                <div class="ltr:ml-3 rtl:mr-3">
                    <p class="text-sm text-yellow-700 font-medium">
                        <?php echo e(__('messages.t_this_gig_not_activated_yet')); ?>

                    </p>
                </div>
            </div>
        </div>
    <?php endif;?>


    <div class="bg-white shadow-sm ring-1 ring-gray-100 border border-gray-50 rounded-xl px-4 py-4 lg:px-12 lg:py-12">


        <div class="w-full mb-0 md:mb-12">


            <div class="md:flex items-center justify-between mb-0 md:mb-6">


                <nav class="hidden md:flex" aria-label="Breadcrumb">
                    <ol role="list" class="md:flex items-center space-x-2 rtl:space-x-reverse">


                        <li>
                            <div>
                                <a href="<?php echo e(url('/')); ?>" class="text-gray-400 hover:text-gray-600">
                                    <svg class="flex-shrink-0 h-5 w-5 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/> </svg>
                                    <span class="sr-only">Home</span>
                                </a>
                            </div>
                        </li>


                        <li>
                            <div class="flex items-center">

                                <svg class="hidden ltr:block flex-shrink-0 h-4 w-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/> </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-4 w-4 text-gray-300" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                <a href="<?php echo e(url('categories', $gig->category->slug)); ?>" class="ltr:ml-2 rtl:mr-2 text-sm font-medium text-gray-400 hover:text-gray-600"><?php echo e($gig->category->name); ?></a>
                            </div>
                        </li>

                        <!--
                        <li>
                            <div class="flex items-center">

                                <svg class="hidden ltr:block flex-shrink-0 h-4 w-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/> </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-4 w-4 text-gray-300" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                <a href="<?php echo e(url('categories/' . utf8_decode(urldecode($gig->category->slug . '/' . $gig->subcategory->slug)))); ?>" class="ltr:ml-2 rtl:mr-2 text-sm font-medium text-gray-400 hover:text-gray-600" aria-current="page"><?php echo e($gig->subcategory->name); ?></a>
                            </div>
                        </li> -->

                    </ol>
                </nav>


                <div class="hidden items-center md:!grid">
                    <span class="uppercase text-[10px] text-gray-400 mb-1 tracking-widest"><?php echo e(__('messages.t_starting_at')); ?></span>
                    <span class="text-black !font-['Lato'] text-2xl tracking-wide font-black"><?php echo e($gig->price); ?> DH</span>
                </div>

            </div>

        </div>


        <div class="lg:grid lg:grid-rows-1 lg:grid-cols-7 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">


            <div class="lg:row-end-1 lg:col-span-4">
                <div class="rounded-xl overflow-hidden">
                    <div wire:ignore>

                        <section id="main-carousel" class="splide rounded-xl">
                            <div class="splide__track">
                                    <ul class="splide__list">


                                        <?php if ($gig->video_link): ?>
                                            <li class="splide__slide" data-splide-youtube="<?php echo e($gig->video_link); ?>">
                                                <img src="<?php echo e(src($gig->imageLarge)); ?>" alt="<?php echo e($gig->title); ?>">
                                            </li>
                                        <?php endif;?>


                                        <?php $__currentLoopData = $gig->images;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $image): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                                            <li class="splide__slide">
	                                                <img src="<?php echo e(src($image->large)); ?>" alt="<?php echo e($gig->title); ?>">
	                                            </li>
	                                        <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>

                                    </ul>
                            </div>
                        </section>


                        <section id="thumbnail-carousel" class="splide">
                            <div class="splide__track">
                                    <ul class="splide__list">


                                        <?php if ($gig->video_link): ?>
                                            <li class="splide__slide !sr-only" data-splide-youtube="<?php echo e($gig->video_link); ?>">
                                                <img src="<?php echo e(src($gig->thumbnail)); ?>" alt="<?php echo e($gig->title); ?>" class="object-cover">
                                            </li>
                                        <?php endif;?>


                                        <?php $__currentLoopData = $gig->images;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $image): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                                            <li class="splide__slide">
	                                                <img src="<?php echo e(src($image->small)); ?>" alt="<?php echo e($gig->title); ?>" class="object-cover shadow">
	                                            </li>
	                                        <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>
                                    </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>


            <div class="max-w-2xl mx-auto mt-6 md:mt-14 sm:mt-16 lg:max-w-none lg:mt-0 lg:row-end-2 lg:row-span-2 lg:col-span-3">


                <div class="grid items-center md:!hidden md:mb-0 mb-4">
                    <span class="uppercase text-[10px] text-gray-400 mb-1 tracking-widest"><?php echo e(__('messages.t_starting_at')); ?></span>
                    <span class="text-black !font-['Lato'] text-2xl tracking-wide font-black"><?php echo money($gig->price, settings('currency')->code, true); ?></span>
                </div>


                <div class="flex flex-col-reverse">

                    <div class="mt-4">


                        <div class="w-full mt-4 grid md:!flex justify-between items-center border-b border-gray-50 pb-9 space-y-3 md:space-y-0">

                            <div class="">

                        <h1 class="text-xl font-extrabold tracking-wide leading-8 text-black sm:text-2xl">
                            <?php echo e($gig->title); ?>

                        </h1>
                            </div>
                            <span class="h-4 w-px bg-gray-300 hidden md:!inline" aria-hidden="true"></span>

                            <div class="">
                                <?php echo e($gig->ville->name); ?>

                            </div>
                            <span class="h-4 w-px bg-gray-300 hidden md:!inline" aria-hidden="true"></span>


                            <div class="">
                            <?php echo e($gig->subville->name); ?>

                            </div>


                        </div>


                        <div class="w-full mt-4 grid md:!flex justify-between items-center border-b border-gray-50 pb-9 space-y-3 md:space-y-0">


                            <a href="<?php echo e(url('profile', $gig->owner->username)); ?>" target="_blank" class="flex-shrink-0 group block">
                                <div class="flex items-center">
                                    <span class="inline-block relative">
                                        <img class="h-6 w-6 rounded-full object-cover" src="<?php echo e(src($gig->owner->avatar)); ?>" alt="<?php echo e($gig->owner->username); ?>">
                                    </span>
                                    <div class="ltr:ml-3 rtl:mr-3">
                                        <div class="text-gray-500 hover:text-gray-900 flex items-center">
                                            <span class="font-extrabold tracking-wide text-[13px]"><?php echo e($gig->owner->username); ?></span>
                                            <?php if ($gig->owner->status === 'verified'): ?>
                                                <svg data-tooltip-target="tooltip-account-verified-<?php echo e($gig->uid); ?>" class="ltr:ml-0.5 rtl:mr-0.5" width="14px" height="14px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
                                                <div id="tooltip-account-verified-<?php echo e($gig->uid); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    <?php echo e(__('messages.t_account_verified')); ?>

                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </a>
<!--
                            <span class="h-4 w-px bg-gray-300 hidden md:!inline" aria-hidden="true"></span>


                            <div class="text-sm font-normal text-gray-500">
                                <?php echo e(__('messages.t_number_orders_in_queue', ['number' => $gig->orders_in_queue])); ?>

                            </div>

                            <span class="h-4 w-px bg-gray-300 hidden md:!inline" aria-hidden="true"></span>


                            <p class="text-sm text-gray-500">
                                <?php switch ($gig->delivery_time):
case (1): ?>
                                        <?php echo __('messages.t_expected_delivery_date_time', ['date' => __('messages.t_1_day')]); ?>

                                        <?php break;?>
                                    <?php case (2): ?>
                                        <?php echo __('messages.t_expected_delivery_date_time', ['date' => __('messages.t_2_days')]); ?>

                                        <?php break;?>
                                    <?php case (3): ?>
                                        <?php echo __('messages.t_expected_delivery_date_time', ['date' => __('messages.t_3_days')]); ?>

                                        <?php break;?>
                                    <?php case (4): ?>
                                        <?php echo __('messages.t_expected_delivery_date_time', ['date' => __('messages.t_4_days')]); ?>

                                        <?php break;?>
                                    <?php case (5): ?>
                                        <?php echo __('messages.t_expected_delivery_date_time', ['date' => __('messages.t_5_days')]); ?>

                                        <?php break;?>
                                    <?php case (6): ?>
                                        <?php echo __('messages.t_expected_delivery_date_time', ['date' => __('messages.t_6_days')]); ?>

                                        <?php break;?>
                                    <?php case (7): ?>
                                        <?php echo __('messages.t_expected_delivery_date_time', ['date' => __('messages.t_1_week')]); ?>

                                        <?php break;?>
                                    <?php case (14): ?>
                                        <?php echo __('messages.t_expected_delivery_date_time', ['date' => __('messages.t_2_weeks')]); ?>

                                        <?php break;?>
                                    <?php case (21): ?>
                                        <?php echo __('messages.t_expected_delivery_date_time', ['date' => __('messages.t_3_weeks')]); ?>

                                        <?php break;?>
                                    <?php case (30): ?>
                                        <?php echo __('messages.t_expected_delivery_date_time', ['date' => __('messages.t_1_month')]); ?>

                                        <?php break;?>
                                    <?php default: ?>

                                <?php endswitch;?>
                            </p> -->

                        </div>



                        <div class="w-full mt-4 grid md:!flex justify-between items-center border-b border-gray-50 pb-9 space-y-3 md:space-y-0">

                            <div class="">
                                <?php echo e($gig->owner->email); ?>

                            </div>
                            <span class="h-4 w-px bg-gray-300 hidden md:!inline" aria-hidden="true"></span>

                            <div class="">
                                <?php echo e($gig->owner->phon); ?>

                            </div>
                            <span class="h-4 w-px bg-gray-300 hidden md:!inline" aria-hidden="true"></span>


                            <div class="">
                            <?php echo e($gig->owner->address); ?>

                            </div>


                        </div>

                    </div>


                    <div class="flex items-center">
                        <div class="flex items-center" wire:ignore>
                            <div class="gig-rating-elem" data-rating-value="<?php echo e($gig->rating); ?>"></div>
                            <?php if ($gig->rating == 0): ?>
                                <div class="text-[13px] font-black font-[Lato] text-gray-500 ltr:ml-2 rtl:mr-2"><?php echo e(__('messages.t_n_a')); ?></div>
                            <?php else: ?>
                                <div class="text-[13px] font-black font-[Lato] text-amber-500 ltr:ml-2 rtl:mr-2"><?php echo e($gig->rating); ?></div>
                            <?php endif;?>
                            <div class="text-[13px] text-gray-400 font-normal ltr:ml-2 rtl:mr-2">( <?php echo e(__('messages.t_number_reviews', ['number' => $gig->counter_reviews])); ?> )</div>
                        </div>
                    </div>

                </div>


                <?php if ($gig->upgrades()->count()): ?>
                    <div class="mt-6">
                        <?php $__currentLoopData = $gig->upgrades;
    $__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $key => $upgrade): $__env->incrementLoopIndices();
        $loop = $__env->getLastLoop();?>
	                            <label class="relative block py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none bg-white" wire:key="add-to-cart-upgrades-<?php echo e($key); ?>">
	                                <div class="flex items-center">
	                                    <input type="checkbox" value="<?php echo e($upgrade->uid); ?>" wire:model.defer="upgrades" class="w-4 h-4 text-indigo-500 bg-transparent cursor-pointer rounded-sm ltr:mr-4 rtl:ml-4 border-2 border-gray-300 focus:ring-indigo-600">
	                                    <div class="text-sm">
	                                        <p id="server-size-0-label" class="font-medium text-gray-600 text-sm"><?php echo e($upgrade->title); ?></p>
	                                        <div class="text-gray-400">
	                                        <?php if ($upgrade->extra_days): ?>
	                                            <p class="sm:inline text-xs"><?php echo e(__('messages.t_delivery_time_will_be_increased_by_extra', ['time' => delivery_time_trans($upgrade->extra_days)])); ?></p>
	                                        <?php else: ?>
                                            <p class="sm:inline text-xs"><?php echo e(__('messages.t_no_changes_delivery_time')); ?></p>
                                        <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 flex text-sm sm:mt-0 ltr:sm:ml-4 rtl:sm:mr-4 sm:text-right items-center justify-center">
                                    <div class="font-bold text-xs text-black"><span class="pr-1 font-normal text-gray-500">+</span><?php echo money($upgrade->price, settings('currency')->code, true); ?></div>
                                </div>
                                <div class="absolute -inset-px rounded-lg pointer-events-none" aria-hidden="true"></div>
                            </label>
                        <?php endforeach;
    $__env->popLoop();
    $loop = $__env->getLastLoop();?>
                    </div>
                <?php endif;?>


                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">


                    <button
                        wire:click="addToCart"
                        wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray cursor-not-allowed"
                        wire:loading.class.remove="bg-indigo-500 hover:bg-indigo-600 text-white cursor-pointer"
                        wire:loading.attr="disabled"
                        class="w-full text-[13px] font-medium flex justify-center bg-indigo-600 hover:bg-indigo-700 text-white py-4 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer"
                        >


                        <div wire:loading wire:target="addToCart">
                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                            </svg>
                        </div>


                        <div wire:loading.remove wire:target="addToCart">
                        Demande job
                        </div>
                    </button>


                    <a href="<?php echo e(url('messages/new', $gig->owner->username)); ?>" target="_blank" class="w-full bg-indigo-50 border border-transparent rounded-md py-4 px-8 flex items-center justify-center text-[13px] font-medium text-indigo-700 hover:bg-indigo-100 focus:outline-none"><?php echo e(__('messages.t_contact_seller')); ?></a>

                </div>





                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">

                    <a href="<?php echo e(url('payment', $gig->id)); ?>" target="_blank" class="w-full bg-indigo-50 border border-transparent rounded-md py-4 px-8 flex items-center justify-center text-[13px] font-medium text-indigo-700 hover:bg-indigo-100 focus:outline-none">payment platform</a>

                </div>




                <?php if ($gig->documents()->count()): ?>
                    <div class="border-t border-gray-200 mt-10 pt-10">
                        <h3 class="text-sm font-medium text-gray-900"><?php echo e(__('messages.t_documents')); ?></h3>
                        <div class="mt-4 text-gray-500">
                            <ul role="list">
                                <?php $__currentLoopData = $gig->documents;
    $__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $document): $__env->incrementLoopIndices();
        $loop = $__env->getLastLoop();?>
	                                    <li class="py-2 flex items-center justify-between text-sm">
	                                        <div class="w-0 flex-1 flex items-center">
	                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"/> </svg>
	                                            <span class="ltr:ml-2 rtl:mr-2 flex-1 w-0 truncate"> <?php echo e($document->name); ?> </span>
	                                        </div>
	                                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
	                                            <a href="<?php echo e(url('uploads/documents', $document->uid)); ?>" target="_blank" class="font-medium text-blue-600 hover:text-blue-500 text-xs hover:underline"> <?php echo e(__('messages.t_download')); ?> </a>
	                                        </div>
	                                    </li>
	                                <?php endforeach;
    $__env->popLoop();
    $loop = $__env->getLastLoop();?>
                            </ul>
                        </div>
                    </div>
                <?php endif;?>


                <div class="border-t border-gray-200 mt-10 pt-10">
                    <h3 class="text-sm font-medium text-gray-900"><?php echo e(__('messages.t_actions')); ?></h3>
                    <div class="mt-4 text-gray-500">
                        <ul role="list" class="flex items-center space-x-6 mt-4 rtl:space-x-reverse">


                            <div class="flex items-center group cursor-pointer" id="modals-share-btn">
                                <div class="w-6 h-6 bg-white border drop-shadow-sm border-gray-100 rounded-full md:ltr:mr-2 md:rtl:ml-2 flex items-center justify-center group-hover:bg-gray-800 group-hover:border-transparent">
                                    <i class="mdi mdi-share text-gray-600 text-sm group-hover:text-gray-50"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-600 group-hover:text-gray-900 hidden md:block"><?php echo e(__('messages.t_share')); ?></span>
                            </div>


                            <?php if (auth()->guard()->check()): ?>
                                <?php if (auth()->id() === $gig->user_id): ?>
                                    <div class="flex items-center group cursor-pointer" @click="youCantReport">
                                <?php else: ?>
                                    <div class="flex items-center group cursor-pointer" id="modals-report-btn">
                                <?php endif;?>
                            <?php endif;?>

                            <?php if (auth()->guard()->guest()): ?>
                                <div class="flex items-center group cursor-pointer" @click="loginToReport">
                            <?php endif;?>
                                <div class="w-6 h-6 bg-white border drop-shadow-sm border-gray-100 rounded-full md:ltr:mr-2 md:rtl:ml-2 flex items-center justify-center group-hover:bg-red-500 group-hover:border-transparent">
                                    <i class="mdi mdi-flag text-gray-600 text-[13px] pt-[1px] group-hover:text-white"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-600 group-hover:text-red-600 hidden md:block"><?php echo e(__('messages.t_report')); ?></span>
                            </div>


                            <?php if (auth()->guard()->check()): ?>
                                <?php if (auth()->id() !== $gig->user_id): ?>


                                    <?php if ($inFavorite): ?>
                                        <div class="flex items-center group cursor-pointer" wire:click="removeFromFavorite">
                                            <div class="w-6 h-6 border drop-shadow-sm rounded-full md:ltr:mr-2 md:rtl:ml-2 flex items-center justify-center bg-indigo-500 border-transparent">


                                                <div wire:loading wire:target="removeFromFavorite">
                                                    <svg role="status" class="inline w-3 h-3 animate-spin text-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>


                                                <i wire:loading.remove wire:target="removeFromFavorite" class="mdi mdi-heart text-[13px] pt-[3px] text-white"></i>

                                            </div>
                                            <span class="text-sm font-medium text-indigo-600 hidden md:block"><?php echo e(__('messages.t_remove_from_favorite')); ?></span>
                                        </div>
                                    <?php else: ?>
                                        <div class="flex items-center group cursor-pointer" wire:click="addToFavorite">
                                            <div class="w-6 h-6 bg-white border drop-shadow-sm border-gray-100 rounded-full md:ltr:mr-2 md:rtl:ml-2 flex items-center justify-center group-hover:bg-indigo-500 group-hover:border-transparent">


                                                <div wire:loading wire:target="addToFavorite">
                                                    <svg role="status" class="inline w-3 h-3 text-gray-700 animate-spin group-hover:text-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>


                                                <i wire:loading.remove wire:target="addToFavorite" class="mdi mdi-heart-outline text-gray-600 text-[13px] pt-[3px] group-hover:text-white"></i>

                                            </div>
                                            <span class="text-sm font-medium text-gray-600 group-hover:text-indigo-600 hidden md:block"><?php echo e(__('messages.t_add_to_favorite')); ?></span>
                                        </div>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php endif;?>

                        </ul>
                    </div>
                </div>

            </div>


            <div class="w-full max-w-2xl mx-auto mt-16 lg:max-w-none lg:mt-0 lg:col-span-4">
                <div x-data="Components.tabs()" @tab-click.window="onTabClick" @tab-keydown.window="onTabKeydown">


                    <div class="border-b border-gray-200">
                        <div class="-mb-px flex space-x-8 rtl:space-x-reverse" aria-orientation="horizontal" role="tablist">


                            <button id="tab-reviews" class="whitespace-nowrap py-6 border-b-2 font-medium text-sm border-indigo-600 text-indigo-600" x-state:on="Selected" x-state:off="Not Selected" :class="{ 'border-indigo-600 text-indigo-600': selected, 'border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300': !(selected) }" x-data="Components.tab(0)" aria-controls="tab-panel-reviews" role="tab" x-init="init()" @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect" :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button" tabindex="0" aria-selected="true">
                                <?php echo e(__('messages.t_description')); ?>

                            </button>


                            <button id="tab-faq" class="border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300 whitespace-nowrap py-6 border-b-2 font-medium text-sm" :class="{ 'border-indigo-600 text-indigo-600': selected, 'border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300': !(selected) }" x-data="Components.tab(0)" aria-controls="tab-panel-faq" role="tab" x-init="init()" @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect" :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button" tabindex="-1" aria-selected="false">
                                <?php echo e(__('messages.t_faq')); ?>

                            </button>


                            <button id="tab-license" class="border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300 whitespace-nowrap py-6 border-b-2 font-medium text-sm" :class="{ 'border-indigo-600 text-indigo-600': selected, 'border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300': !(selected) }" x-data="Components.tab(0)" aria-controls="tab-panel-license" role="tab" x-init="init()" @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect" :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button" tabindex="-1" aria-selected="false">
                                <?php echo e(__('messages.t_reviews')); ?>

                            </button>

                        </div>
                    </div>


                    <div id="tab-panel-reviews" class="-mb-10" x-data="Components.tabPanel(0)" aria-labelledby="tab-reviews" x-init="init()" x-show="selected" @tab-select.window="onTabSelect" role="tabpanel" tabindex="0">


                        <div class="pt-6">
                            <?php echo $gig->description; ?>

                        </div>


                        <div class="py-6">
                            <?php $__currentLoopData = $gig->tags;
    $__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $tag): $__env->incrementLoopIndices();
        $loop = $__env->getLastLoop();?>
	                                <a href="<?php echo e(url('search?q=' . $tag->slug)); ?>" class="mb-3 text-xs font-semibold inline-block py-2 px-4 rounded text-slate-600 bg-gray-100 hover:bg-gray-200 last:mr-0 ltr:mr-1 rtl:ml-1">
	                                    <?php echo e($tag->name); ?>

	                                </a>
	                            <?php endforeach;
    $__env->popLoop();
    $loop = $__env->getLastLoop();?>
                        </div>

                    </div>


                    <div id="tab-panel-faq" class="text-sm text-gray-500" x-data="Components.tabPanel(0)" aria-labelledby="tab-faq" x-init="init()" x-show="selected" @tab-select.window="onTabSelect" role="tabpanel" tabindex="0" style="display: none;">
                        <div class="pt-6">
                            <?php $__currentLoopData = $gig->faqs;
    $__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $faq): $__env->incrementLoopIndices();
        $loop = $__env->getLastLoop();?>
	                                <details class="rounded-lg group relative mb-3 last:mb-0 bg-gray-50">
	                                    <summary class="flex items-center justify-between cursor-pointer focus:outline-none">


	                                        <h5 class="text-sm font-medium text-gray-900 focus:outline-none flex items-center px-6 py-4">
	                                            <?php echo e($faq->question); ?>

	                                        </h5>

	                                        <span class="relative flex-shrink-0 ltr:ml-1.5 rtl:mr-1.5 w-5 h-5 ltr:mr-6 rtl:ml-6">
	                                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-5 h-5 opacity-100 group-open:opacity-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" > <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/> </svg>

	                                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-5 h-5 opacity-0 group-open:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" > <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/> </svg>
	                                        </span>
	                                    </summary>

	                                    <p class="mt-4 leading-relaxed text-gray-600 text-sm px-6 pb-4">
	                                        <?php echo e($faq->answer); ?>

	                                    </p>
	                                </details>
	                            <?php endforeach;
    $__env->popLoop();
    $loop = $__env->getLastLoop();?>
                        </div>
                    </div>


                    <div id="tab-panel-license" class="pt-10" x-data="Components.tabPanel(0)" aria-labelledby="tab-license" x-init="init()" x-show="selected" @tab-select.window="onTabSelect" role="tabpanel" tabindex="0" style="display: none;">


                        <?php if ($gig->counter_reviews): ?>
                            <div class="flow-root pt-6">
                                <div class="-my-6 divide-y divide-gray-100">

                                    <?php $__currentLoopData = $gig->reviews()->orderByRaw('RAND()')->take(10)->get();
    $__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $review): $__env->incrementLoopIndices();
        $loop = $__env->getLastLoop();?>
	                                        <div class="py-6">
	                                            <div class="flex items-center">
	                                                <a href="<?php echo e(url('profile', $review->user->username)); ?>" target="_blank">
	                                                    <img src="<?php echo e(src($review->user->avatar)); ?>" alt="<?php echo e($review->user->username); ?>" class="h-8 w-8 rounded-full">
	                                                </a>
	                                                <div class="ltr:ml-4 rtl:mr-4 group">
	                                                    <a href="<?php echo e(url('profile', $review->user->username)); ?>" target="_blank" class="text-sm font-bold text-gray-900 flex items-center group-hover:text-indigo-600">
	                                                        <?php echo e($review->user->username); ?>

	                                                        <?php if ($review->user->status === 'verified'): ?>
	                                                            <svg data-tooltip-target="account-verified-badge" class="ltr:ml-0.5 rtl:mr-0.5 -mt-px" width="16px" height="16px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
	                                                            <div id="account-verified-badge" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
	                                                                <?php echo e(__('messages.t_account_verified')); ?>

	                                                            </div>
	                                                        <?php endif;?>


                                                        <?php if ($review->user->country): ?>
                                                            <div class="ltr:ml-2 rtl:mr-2">
                                                                <img src="<?php echo e(asset('img/flags/' . strtolower($review->user->country?->code) . '.svg')); ?>" alt="<?php echo e($review->user->country?->name); ?>" class="h-3 -mt-px rounded-sm">
                                                            </div>
                                                        <?php endif;?>

                                                    </a>
                                                    <div class="mt-1 flex items-start">
                                                        <div wire:ignore class="rating-item-container" data-rating-value="<?php echo e($review->rating); ?>"></div>
                                                        <span class="ltr:ml-2 rtl:mr-2 text-[11px] font-normal text-gray-400"><span class="ltr:pr-2 rtl:pl-2 text-gray-300">•</span> <?php echo e(format_date($review->created_at, 'ago')); ?></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <?php if ($review->message): ?>
                                                <div class="mt-4 space-y-6 text-sm italic text-gray-600">
                                                    <p><?php echo e($review->message); ?></p>
                                                </div>
                                            <?php endif;?>

                                        </div>
                                    <?php endforeach;
    $__env->popLoop();
    $loop = $__env->getLastLoop();?>

                                </div>
                            </div>
                        <?php else: ?>

                            <div class="text-center block text-sm font-normal text-gray-500"><?php echo e(__('messages.t_no_data_to_show_now')); ?></div>

                        <?php endif;?>
                    </div>
                </div>
            </div>

        </div>



    </div>


    <?php if ($related_gigs): ?>
        <div class="mt-12 sm:mt-24" wire:ignore>


            <div class="flex justify-between mb-6">

                <div class="ltr:border-l-8 rtl:border-r-8 border-indigo-600 ltr:pl-4 rtl:pr-4">
                    <span class="font-extrabold text-base text-gray-900 pb-1 tracking-wide block"><?php echo e(__('messages.t_you_may_also_like')); ?></span>
                    <p class="text-sm text-gray-500"><?php echo e(__('messages.t_u_may_also_like_the_following_gigs')); ?></p>
                </div>

                <div class="hidden md:block">


                    <?php if (config()->get('direction') === 'ltr'): ?>


                        <button id="related-gigs-prev-btn" class="h-8 w-8 rounded-tl-md rounded-bl-md bg-indigo-600 hover:bg-indigo-500 text-white">
                            <i class="mdi mdi-chevron-left"></i>
                        </button>


                        <button id="related-gigs-next-btn" class="h-8 w-8 rounded-tr-md rounded-br-md bg-indigo-600 hover:bg-indigo-500 text-white">
                            <i class="mdi mdi-chevron-right"></i>
                        </button>

                    <?php else: ?>


                        <button id="related-gigs-prev-btn" class="h-8 w-8 rounded-tr-md rounded-br-md bg-indigo-600 hover:bg-indigo-500 text-white">
                            <i class="mdi mdi-chevron-right"></i>
                        </button>


                        <button id="related-gigs-next-btn" class="h-8 w-8 rounded-tl-md rounded-bl-md bg-indigo-600 hover:bg-indigo-500 text-white">
                            <i class="mdi mdi-chevron-left"></i>
                        </button>

                    <?php endif;?>

                </div>

            </div>


            <div id="slick-related-gigs" class="-mx-3" wire:ignore>
                <?php $__currentLoopData = $related_gigs;
    $__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $gig): $__env->incrementLoopIndices();
        $loop = $__env->getLastLoop();?>


	                    <div class="mx-3">
	                        <?php
    if (!isset($_instance)) {
                $html = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig])->html();
        } elseif ($_instance->childHasBeenRendered("related-gigs-item-" . $gig->uid)) {
        $componentId = $_instance->getRenderedChildComponentId("related-gigs-item-" . $gig->uid);
        $componentTag = $_instance->getRenderedChildComponentTagName("related-gigs-item-" . $gig->uid);
        $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
        $_instance->preserveRenderedChild("related-gigs-item-" . $gig->uid);
    } else {
        $response = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig]);
        $html = $response->html();
        $_instance->logRenderedChild("related-gigs-item-" . $gig->uid, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
    }
    echo $html;
    ?>
                    </div>

                <?php endforeach;
    $__env->popLoop();
    $loop = $__env->getLastLoop();?>
            </div>

        </div>
    <?php endif;?>


    <?php if (auth()->guard()->check()): ?>
        <?php if (auth()->id() !== $gig->user_id): ?>
            <?php if (isset($component)) {$__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f = $component;}?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.modal');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['id' => 'modals-report-container', 'target' => 'modals-report-btn', 'uid' => 'modal_' . e(uid()) . '', 'placement' => 'center-center', 'size' => 'max-w-md']);?>


                 <?php $__env->slot('title', null, []);?> <?php echo e(__('messages.t_report_this_gig')); ?> <?php $__env->endSlot();?>


                 <?php $__env->slot('content', null, []);?>
                    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">


                        <div class="col-span-12">
                            <?php if (isset($component)) {$__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11 = $component;}?>
<?php $component = App\View\Components\Forms\Textarea::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.textarea');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_reason')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_let_us_know_why_u_report_this_gig')), 'model' => 'reason', 'icon' => 'folder-question', 'maxlength' => '500']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11;?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11);?>
<?php endif;?>
                        </div>

                    </div>
                 <?php $__env->endSlot();?>


                 <?php $__env->slot('footer', null, []);?>
                    <?php if (isset($component)) {$__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component;}?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.button');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['action' => 'report', 'text' => '' . e(__('messages.t_report')) . '']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c;?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c);?>
<?php endif;?>
                 <?php $__env->endSlot();?>

             <?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f)): ?>
<?php $component = $__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f;?>
<?php unset($__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f);?>
<?php endif;?>
        <?php endif;?>
    <?php endif;?>


    <?php if (isset($component)) {$__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f = $component;}?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.modal');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['id' => 'modals-share-container', 'target' => 'modals-share-btn', 'uid' => 'modal_' . e(uid()) . '', 'placement' => 'center-center', 'size' => 'max-w-2xl']);?>


         <?php $__env->slot('title', null, []);?> <?php echo e(__('messages.t_share_this_gig')); ?> <?php $__env->endSlot();?>


         <?php $__env->slot('content', null, []);?>
            <div class="flex items-center justify-center">


                <div class="grid items-center justify-center mx-4">
                    <a href="https://www.facebook.com/share.php?u=<?php echo e(url('service', $gig->slug)); ?>&t=<?php echo e($gig->title); ?>" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#3b5998] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M374.244,285.825l14.105,-91.961l-88.233,0l0,-59.677c0,-25.159 12.325,-49.682 51.845,-49.682l40.116,0l0,-78.291c0,0 -36.407,-6.214 -71.213,-6.214c-72.67,0 -120.165,44.042 -120.165,123.775l0,70.089l-80.777,0l0,91.961l80.777,0l0,222.31c16.197,2.541 32.798,3.865 49.709,3.865c16.911,0 33.511,-1.324 49.708,-3.865l0,-222.31l74.128,0Z"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_facebook')); ?></span>
                </div>


                <div class="grid items-center justify-center mx-4">
                    <a href="https://twitter.com/intent/tweet?text=<?php echo e($gig->title); ?>%20-%20<?php echo e(url('service', $gig->slug)); ?>%20" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#1da1f2] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M161.014,464.013c193.208,0 298.885,-160.071 298.885,-298.885c0,-4.546 0,-9.072 -0.307,-13.578c20.558,-14.871 38.305,-33.282 52.408,-54.374c-19.171,8.495 -39.51,14.065 -60.334,16.527c21.924,-13.124 38.343,-33.782 46.182,-58.102c-20.619,12.235 -43.18,20.859 -66.703,25.498c-19.862,-21.121 -47.602,-33.112 -76.593,-33.112c-57.682,0 -105.145,47.464 -105.145,105.144c0,8.002 0.914,15.979 2.722,23.773c-84.418,-4.231 -163.18,-44.161 -216.494,-109.752c-27.724,47.726 -13.379,109.576 32.522,140.226c-16.715,-0.495 -33.071,-5.005 -47.677,-13.148l0,1.331c0.014,49.814 35.447,93.111 84.275,102.974c-15.464,4.217 -31.693,4.833 -47.431,1.802c13.727,42.685 53.311,72.108 98.14,72.95c-37.19,29.227 -83.157,45.103 -130.458,45.056c-8.358,-0.016 -16.708,-0.522 -25.006,-1.516c48.034,30.825 103.94,47.18 161.014,47.104" style="fill-rule:nonzero;"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_twitter')); ?></span>
                </div>


                <div class="grid items-center justify-center mx-4">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(url('service', $gig->slug)); ?>&title=<?php echo e($gig->title); ?>&summary=<?php echo e($gig->title); ?>" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#0a66c2] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M473.305,-1.353c20.88,0 37.885,16.533 37.885,36.926l0,438.251c0,20.393 -17.005,36.954 -37.885,36.954l-436.459,0c-20.839,0 -37.773,-16.561 -37.773,-36.954l0,-438.251c0,-20.393 16.934,-36.926 37.773,-36.926l436.459,0Zm-37.829,436.389l0,-134.034c0,-65.822 -14.212,-116.427 -91.12,-116.427c-36.955,0 -61.739,20.263 -71.867,39.476l-1.04,0l0,-33.411l-72.811,0l0,244.396l75.866,0l0,-120.878c0,-31.883 6.031,-62.773 45.554,-62.773c38.981,0 39.468,36.461 39.468,64.802l0,118.849l75.95,0Zm-284.489,-244.396l-76.034,0l0,244.396l76.034,0l0,-244.396Zm-37.997,-121.489c-24.395,0 -44.066,19.735 -44.066,44.047c0,24.318 19.671,44.052 44.066,44.052c24.299,0 44.026,-19.734 44.026,-44.052c0,-24.312 -19.727,-44.047 -44.026,-44.047Z" style="fill-rule:nonzero;"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_linkedin')); ?></span>
                </div>


                <div class="grid items-center justify-center mx-4">
                    <a href="https://api.whatsapp.com/send?text=<?php echo e($gig->title); ?>%20<?php echo e(url('service', $gig->slug)); ?>" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#25d366] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M373.295,307.064c-6.37,-3.188 -37.687,-18.596 -43.526,-20.724c-5.838,-2.126 -10.084,-3.187 -14.331,3.188c-4.246,6.376 -16.454,20.725 -20.17,24.976c-3.715,4.251 -7.431,4.785 -13.8,1.594c-6.37,-3.187 -26.895,-9.913 -51.225,-31.616c-18.935,-16.89 -31.72,-37.749 -35.435,-44.126c-3.716,-6.377 -0.397,-9.824 2.792,-13c2.867,-2.854 6.371,-7.44 9.555,-11.16c3.186,-3.718 4.247,-6.377 6.37,-10.626c2.123,-4.252 1.062,-7.971 -0.532,-11.159c-1.591,-3.188 -14.33,-34.542 -19.638,-47.298c-5.171,-12.419 -10.422,-10.737 -14.332,-10.934c-3.711,-0.184 -7.963,-0.223 -12.208,-0.223c-4.246,0 -11.148,1.594 -16.987,7.969c-5.838,6.377 -22.293,21.789 -22.293,53.14c0,31.355 22.824,61.642 26.009,65.894c3.185,4.252 44.916,68.59 108.816,96.181c15.196,6.564 27.062,10.483 36.312,13.418c15.259,4.849 29.145,4.165 40.121,2.524c12.238,-1.827 37.686,-15.408 42.995,-30.286c5.307,-14.882 5.307,-27.635 3.715,-30.292c-1.592,-2.657 -5.838,-4.251 -12.208,-7.44m-116.224,158.693l-0.086,0c-38.022,-0.015 -75.313,-10.23 -107.845,-29.535l-7.738,-4.592l-80.194,21.037l21.405,-78.19l-5.037,-8.017c-21.211,-33.735 -32.414,-72.726 -32.397,-112.763c0.047,-116.825 95.1,-211.87 211.976,-211.87c56.595,0.019 109.795,22.088 149.801,62.139c40.005,40.05 62.023,93.286 62.001,149.902c-0.048,116.834 -95.1,211.889 -211.886,211.889m180.332,-392.224c-48.131,-48.186 -112.138,-74.735 -180.335,-74.763c-140.514,0 -254.875,114.354 -254.932,254.911c-0.018,44.932 11.72,88.786 34.03,127.448l-36.166,132.102l135.141,-35.45c37.236,20.31 79.159,31.015 121.826,31.029l0.105,0c140.499,0 254.87,-114.366 254.928,-254.925c0.026,-68.117 -26.467,-132.166 -74.597,-180.352" id="WhatsApp-Logo"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_whatsapp')); ?></span>
                </div>


                <div class="grid items-center justify-center mx-4">
                    <button type="button" x-on:click="copy" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-gray-400 focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title/><path d="M17.3,13.35a1,1,0,0,1-.7-.29,1,1,0,0,1,0-1.41l2.12-2.12a2,2,0,0,0,0-2.83L17.3,5.28a2.06,2.06,0,0,0-2.83,0L12.35,7.4A1,1,0,0,1,10.94,6l2.12-2.12a4.1,4.1,0,0,1,5.66,0l1.41,1.41a4,4,0,0,1,0,5.66L18,13.06A1,1,0,0,1,17.3,13.35Z" /><path d="M8.11,21.3a4,4,0,0,1-2.83-1.17L3.87,18.72a4,4,0,0,1,0-5.66L6,10.94A1,1,0,0,1,7.4,12.35L5.28,14.47a2,2,0,0,0,0,2.83L6.7,18.72a2.06,2.06,0,0,0,2.83,0l2.12-2.12A1,1,0,1,1,13.06,18l-2.12,2.12A4,4,0,0,1,8.11,21.3Z" /><path d="M8.82,16.18a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42l6.37-6.36a1,1,0,0,1,1.41,0,1,1,0,0,1,0,1.42L9.52,15.89A1,1,0,0,1,8.82,16.18Z" /></svg>
                    </button>
                    <template x-if="!isCopied">
                        <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_copy_link')); ?></span>
                    </template>
                    <template x-if="isCopied">
                        <span class="uppercase font-normal text-xs text-green-500 mt-4 tracking-widest"><?php echo e(__('messages.t_copied')); ?></span>
                    </template>
                </div>

            </div>
         <?php $__env->endSlot();?>

     <?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f)): ?>
<?php $component = $__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f;?>
<?php unset($__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f);?>
<?php endif;?>

</div>

<?php $__env->startPush('scripts');?>


    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/js/splide-extension-video.min.js"></script>


    <script>
        function oZcfXWmBuWfxbIo() {
            return {

                cart: [],
                isCopied: false,

                // Initialize main carousel
                initMainCarousel() {
                    var main = new Splide( '#main-carousel', {
                        type        : 'loop',
                        cover       : false,
                        autoplay    : true,
                        pauseOnHover: true,
                        heightRatio : 0.3,
                        height      : this.$width < 600 ? 250 : 530,
                        rewind      : true,
                        pagination  : true,
                        arrows      : true,
                        video       : {
                            loop         : true,
                            mute         : true
                        },
                    } );

                    var thumbnails = new Splide( '#thumbnail-carousel', {
                        fixedWidth  : 100,
                        fixedHeight : 60,
                        gap         : 10,
                        rewind      : true,
                        pagination  : false,
                        isNavigation: true,
                        breakpoints : {
                        600: {
                            fixedWidth : 60,
                            fixedHeight: 44,
                        },
                        },
                    } );

                    main.sync( thumbnails );
                    main.mount(window.splide.Extensions);
                    thumbnails.mount();
                },

                initRelatedCarousel() {
                    $('#slick-related-gigs').slick({
                        dots          : false,
                        infinite      : true,
                        speed         : 300,
                        slidesToShow  : 4,
                        slidesToScroll: 1,
                        prevArrow     : $('#related-gigs-prev-btn'),
                        nextArrow     : $('#related-gigs-next-btn'),
                        responsive    : [
                            {
                            breakpoint: 1024,
                                settings: {
                                    slidesToShow  : 3,
                                    slidesToScroll: 3
                                }
                            },
                            {
                            breakpoint: 600,
                                settings: {
                                    slidesToShow  : 2,
                                    slidesToScroll: 2
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
                },

                // Initialize rating plugin
                initRating() {
                    window.rating({ target: "rating-item-container", fill: "#5b5b5b", background: "#cdcdcd" });
                    window.rating({ target: "gig-rating-elem", fill: "#ffba00", background: "#cdcdcd", size: "18px" });
                },

                // Copy link
                copy() {

                    // Set gig link
                    const url = "<?php echo e(url('service', $gig->slug)); ?>";

                    var _this = this;
                    navigator.clipboard.writeText(url).then(function() {
                        _this.isCopied = true;
                        setTimeout(() => {
                            _this.isCopied = false
                        }, 2000);
                    }, function(err) {
                    });

                },

                // Splide Sliders
                splides() {
                    var splides = document.getElementsByClassName( 'splide' );

                    for ( var i = 0, len = splides.length; i < len; i++ ) {
                        if (splides[i].id !== 'main-carousel' && splides[i].id !== 'thumbnail-carousel') {
                            new Splide( splides[ i ], {
                                type        : 'loop',
                                cover       : true,
                                autoplay    : false,
                                pauseOnHover: true,
                                heightRatio : 0.3,
                                height      : 200,
                                rewind      : true,
                                pagination  : false,
                                arrows      : true,
                                video       : {
                                    loop         : true,
                                    mute         : true
                                },
                            } ).mount(window.splide.Extensions);
                        }
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
                            rtl: true,
                            responsive: [
                                {
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
                },

                // Init alpinejs
                initialize() {
                    var _this = this;

                    // Wait until page loaded
                    document.addEventListener( 'DOMContentLoaded', function () {

                        // Initialize carousel
                        _this.initMainCarousel();

                        // Initialize related gigs carousel
                        _this.initRelatedCarousel();

                        // initialize rating plugin
                        _this.initRating();

                        // Splide Plugin
                        _this.splides();

                        // Slick Plugin
                        _this.slicks();

                    });
                },

                youCantReport() {
                    window.toast("<?php echo e(__('messages.t_u_cant_report_this_gig')); ?>", "warning");
                },

                loginToReport() {
                    window.toast("<?php echo e(__('messages.t_pls_login_or_register_to_report_this_gig')); ?>", "info");
                },

                scrollToReviews() {
                    document.querySelector('#reviews-container').scrollIntoView({
                        behavior: 'smooth'
                    });
                }

            }
        }
        window.oZcfXWmBuWfxbIo = oZcfXWmBuWfxbIo();
    </script>

<?php $__env->stopPush();?>

<?php $__env->startPush('styles');?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide-core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/themes/splide-default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/css/splide-extension-video.min.css">


    <link rel="stylesheet" href="<?php echo e(url('css/ckeditor-inline.css')); ?>">


    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<?php $__env->stopPush();?>
<?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/main/service/service.blade.php ENDPATH**/?>