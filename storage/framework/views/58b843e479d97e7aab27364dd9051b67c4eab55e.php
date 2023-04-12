<div class="container mx-auto" x-data="window.xXYTvEuUwBxUJgG">
    <div class="min-h-full bg-white shadow rounded-md">

    <!-- ['href' => "seller/portfolio", 'text' => __('messages.t_portfolio'), 'active' => false],
                ['href' => "seller/earnings", 'text' => __('messages.t_earnings'), 'active' => false],
                ['href' => "seller/withdrawals", 'text' => __('messages.t_withdrawals'), 'active' => false],
                ['href' => "seller/refunds", 'text' => __('messages.t_refunds'), 'active' => false], -->


        <?php
            // Set links
            $links = [
                ['href' => "seller/home", 'text' => __('messages.t_home'), 'active' => true],
                ['href' => "seller/orders", 'text' => __('messages.t_orders_history'), 'active' => false],
                ['href' => "seller/gigs", 'text' => __('messages.t_my_gigs'), 'active' => false],
                ['href' => "seller/reviews", 'text' => __('messages.t_reviews'), 'active' => false],
                ['href' => "seller/demande", 'text' => __('messages.t_demande'), 'active' => false],

            ]

        ?>

        
        <nav class="" x-data="{ open:false }">
            <div class="mx-auto border-b border-gray-200 px-4 sm:px-6 lg:px-8">
                <div class="relative h-16 flex items-center justify-between">

                    
                    <div class="flex items-center">
                        <div class="hidden lg:block lg:ml-10">
                            <div class="flex space-x-4 rtl:space-x-reverse">

                                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(url($link['href'])); ?>" class="<?php echo e($link['active'] ? 'bg-gray-100' : 'hover:text-gray-700 hover:bg-gray-50'); ?> px-3 py-2 rounded-md text-sm font-medium text-gray-900" aria-current="page"><?php echo e($link['text']); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>

                    
                    <div class="flex lg:hidden">

                        
                        <button type="button" class="bg-gray-50 p-2 inline-flex items-center justify-center rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                            <span class="sr-only">Open main menu</span>
                            <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 hidden" :class="{'hidden': open, 'block': !(open)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path> </svg> <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 block" :class="{'block': open, 'hidden': !(open)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> </svg>
                        </button>


                    </div>

                    
                    <?php if(auth()->user()->sales->where('status', 'pending')->count()): ?>
                        <div class="hidden lg:block">
                            <span class="relative inline-flex">
                                <span class="inline-flex items-center px-4 py-2 font-medium leading-6 text-xs transition ease-in-out duration-150 text-amber-600">
                                    <?php echo e(__('messages.t_number_pending_orders', ['number' => number_format(auth()->user()->sales->where('status', 'pending')->count())])); ?>

                                </span>
                                <span class="flex absolute h-3 w-3 top-[13px] ltr:-left-1 rtl:-right-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-500 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-600"></span>
                                </span>
                            </span>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            
            <div class="bg-gray-100 border-b border-gray-200 lg:hidden" x-show="open">
                <div class="px-2 pt-2 pb-3 space-y-1">

                    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(url($link['href'])); ?>" class="<?php echo e($link['active'] ? 'bg-gray-200' : 'hover:bg-gray-200'); ?> block px-3 py-2 rounded-md font-bold tracking-wide text-gray-900 text-xs">
                            <?php echo e($link['text']); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>

        </nav>

        
        <header class="bg-gray-50 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-between">
                <div class="flex-1 min-w-0">

                    
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol role="list" class="flex items-center space-x-4 rtl:space-x-reverse">

                            
                            <li>
                                <div>
                                    <a href="<?php echo e(url('/')); ?>" class="text-sm font-medium text-gray-500 hover:text-gray-700"><?php echo e(__('messages.t_home')); ?></a>
                                </div>
                            </li>

                            
                            <li>
                                <div class="flex items-center">

                                    
                                    <svg class="hidden ltr:block flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>

                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-5 w-5 text-gray-400 viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                    <a href="<?php echo e(url('seller/home')); ?>" class="ltr:ml-4 rtl:mr-4 text-sm font-medium text-gray-500 hover:text-gray-700"><?php echo e(__('messages.t_dashboard')); ?></a>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    
                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate"><?php echo e(__('messages.t_seller_dashboard')); ?></h1>

                    
                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-8 rtl:space-x-reverse">

                        
                        <div class="mt-2 flex items-center text-xs font-medium" style="color: <?php echo e(auth()->user()->level->level_color); ?>">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4" style="color: <?php echo e(auth()->user()->level->level_color); ?>;margin-top: -3px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/> <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/> </svg>
                            <?php echo e(auth()->user()->level->title); ?>

                        </div>

                        
                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>
                            <?php echo e(__('messages.t_total_sales_number', ['number' => number_format(auth()->user()->sales->where('status', 'delivered')->where('is_finished', true)->count())])); ?>

                        </div>

                        
                        <?php if(auth()->user()->country): ?>
                            <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                                <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/> </svg>
                                <?php echo e(auth()->user()->country->name); ?>

                            </div>
                        <?php endif; ?>

                        
                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/> </svg>
                            <?php echo e(__('messages.t_signed_up_on_date', ['date' => format_date(auth()->user()->created_at, 'F j, Y')])); ?>

                        </div>

                    </div>

                </div>
                <div class="mt-5 flex xl:mt-0 xl:ltr:ml-4 xl:rtl:mr-4">

                    <!-- 
                    <span class="hidden sm:block ltr:mr-3 rtl:ml-4">
                        <a href="<?php echo e(url('seller/withdrawals/create')); ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500">
                            <?php echo e(__('messages.t_withdrawal_earnings')); ?>

                        </a>
                    </span> -->

                    
                    <span class="hidden sm:block ltr:mr-3 rtl:ml-4">
                        <a href="<?php echo e(url('create')); ?>" class="inline-flex items-center px-4 py-2 border border-purple-500 rounded-sm shadow-sm text-[13px] font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-purple-50 focus:ring-purple-700">
                            <?php echo e(__('messages.t_publish_new_gig')); ?>

                        </a>
                    </span>

                </div>
            </div>
        </header>

        <!-- <main class="pb-12">
            <div class="bg-blue-gray-50">

                <div class="bg-white">
                    <div class="max-w-2xl mx-auto py-16 px-4 text-center sm:py-20 sm:px-6 lg:px-8">
                        <h2 class="text-3xl font-extrabold text-white sm:text-3xl">
                            <span class="block text-gray-900"><?php echo e(__('messages.t_boost_ur_productivity')); ?></span>
                        </h2>
                        <p class="mt-3 text-sm leading-6 text-gray-500"><?php echo e(__('messages.t_boost_ur_productivity_subtitle')); ?></p>
                    </div>
                </div>

                
                <section class="mt-16 max-w-md mx-auto relative z-10 px-4 sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8" aria-labelledby="contact-heading">
                    <div class="grid grid-cols-1 gap-y-20 lg:grid-cols-3 lg:gap-y-0 lg:gap-x-8">

                        
                        <div class="flex flex-col rounded-2xl bg-gray-50">
                            <div class="flex-1 grid items-center relative pt-16 px-6 pb-8 md:px-8">
                                <div class="absolute top-0 left-[calc(50%-33px)] p-5 inline-block bg-purple-600 rounded-xl transform -translate-y-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor"> <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/></svg>
                                </div>
                                <h3 class="text-base font-bold text-gray-900 text-center"><?php echo e(__('messages.t_share_ur_gigs')); ?></h3>
                                <p class="mt-8 text-sm text-gray-500 text-center"><?php echo e(__('messages.t_tap_into_the_power_of_social_media_text')); ?></p>
                            </div>
                            <div class="p-6 bg-blue-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                                <a href="<?php echo e(url('seller/gigs')); ?>" class="text-base font-medium text-blue-700 hover:text-blue-600"><?php echo e(__('messages.t_my_gigs')); ?><span aria-hidden="true" class="hidden ltr:inline-block"> →</span> <span aria-hidden="true" class="hidden rtl:inline-block"> ←</span></a>
                            </div>
                        </div>

                        
                        <div class="flex flex-col rounded-2xl bg-gray-50">
                            <div class="flex-1 grid items-center relative pt-16 px-6 pb-8 md:px-8">
                                <div class="absolute top-0 left-[calc(50%-33px)] p-5 inline-block bg-purple-600 rounded-xl transform -translate-y-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"/></svg>
                                </div>
                                <h3 class="text-base font-bold text-gray-900 text-center"><?php echo e(__('messages.t_get_more_skills')); ?></h3>
                                <p class="mt-8 text-sm text-gray-500 text-center"><?php echo e(__('messages.t_hone_ur_skills_and_expand_knowledge')); ?></p>
                            </div>
                            <div class="p-6 bg-blue-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                                <a href="<?php echo e(url('help/contact')); ?>" class="text-base font-medium text-blue-700 hover:text-blue-600"><?php echo e(__('messages.t_contact_us')); ?><span aria-hidden="true" class="hidden ltr:inline-block"> →</span> <span aria-hidden="true" class="hidden rtl:inline-block"> ←</span></a>
                            </div>
                        </div>

                        
                        <div class="flex flex-col rounded-2xl bg-gray-50">
                            <div class="flex-1 grid items-center relative pt-16 px-6 pb-8 md:px-8">
                                <div class="absolute top-0 left-[calc(50%-33px)] p-5 inline-block bg-purple-600 rounded-xl transform -translate-y-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor"> <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/></svg>
                                </div>
                                <h3 class="text-base font-bold text-gray-900 text-center"><?php echo e(__('messages.t_become_a_successful_seller')); ?></h3>
                                <p class="mt-8 text-sm text-gray-500 text-center"><?php echo e(__('messages.t_learn_how_to_create_an_outstanding_service_experience')); ?></p>
                            </div>
                            <div class="p-6 bg-blue-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                                <a href="<?php echo e(url('help/contact')); ?>" class="text-base font-medium text-blue-700 hover:text-blue-600"><?php echo e(__('messages.t_contact_us')); ?><span aria-hidden="true" class="hidden ltr:inline-block"> →</span> <span aria-hidden="true" class="hidden rtl:inline-block"> ←</span></a>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </main> -->

    </div>
</div>

<?php $__env->startPush('scripts'); ?>

    
    <script>
        function xXYTvEuUwBxUJgG() {
            return {

            }
        }
        window.xXYTvEuUwBxUJgG = xXYTvEuUwBxUJgG();
    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/main/seller/home/home.blade.php ENDPATH**/ ?>