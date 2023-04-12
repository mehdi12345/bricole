<div class="container mx-auto" x-data="window.TBhqVNUmCYEnOEj">
    <div class="min-h-full bg-white shadow rounded-md">

        <?php

// Set links
$links = [
    ['href' => "seller/home", 'text' => __('messages.t_home'), 'active' => false],
    ['href' => "seller/orders", 'text' => __('messages.t_orders_history'), 'active' => true],
    ['href' => "seller/gigs", 'text' => __('messages.t_my_gigs'), 'active' => false],
    ['href' => "seller/reviews", 'text' => __('messages.t_reviews'), 'active' => false],
    ['href' => "seller/portfolio", 'text' => __('messages.t_portfolio'), 'active' => false],
    ['href' => "seller/earnings", 'text' => __('messages.t_earnings'), 'active' => false],
    ['href' => "seller/withdrawals", 'text' => __('messages.t_withdrawals'), 'active' => false],
    ['href' => "seller/refunds", 'text' => __('messages.t_refunds'), 'active' => false],
]

?>


        <nav class="" x-data="{ open:false }">
            <div class="mx-auto border-b border-gray-200 px-4 sm:px-6 lg:px-8">
                <div class="relative h-16 flex items-center justify-between">


                    <div class="flex items-center">
                        <div class="hidden lg:block lg:ml-10">
                            <div class="flex space-x-4 rtl:space-x-reverse">

                                <?php $__currentLoopData = $links;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $link): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                                    <a href="<?php echo e(url($link['href'])); ?>" class="<?php echo e($link['active'] ? 'bg-gray-100' : 'hover:text-gray-700 hover:bg-gray-50'); ?> px-3 py-2 rounded-md text-sm font-medium text-gray-900" aria-current="page"><?php echo e($link['text']); ?></a>
	                                <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>

                            </div>
                        </div>
                    </div>


                    <div class="flex lg:hidden">


                        <button type="button" class="bg-gray-50 p-2 inline-flex items-center justify-center rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                            <span class="sr-only">Open main menu</span>
                            <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 hidden" :class="{'hidden': open, 'block': !(open)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path> </svg> <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 block" :class="{'block': open, 'hidden': !(open)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> </svg>
                        </button>


                    </div>


                    <?php if (auth()->user()->sales->where('status', 'pending')->count()): ?>
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
                    <?php endif;?>

                </div>
            </div>


            <div class="bg-gray-100 border-b border-gray-200 lg:hidden" x-show="open">
                <div class="px-2 pt-2 pb-3 space-y-1">

                    <?php $__currentLoopData = $links;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $link): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                        <a href="<?php echo e(url($link['href'])); ?>" class="<?php echo e($link['active'] ? 'bg-gray-200' : 'hover:bg-gray-200'); ?> block px-3 py-2 rounded-md font-bold tracking-wide text-gray-900 text-xs">
	                            <?php echo e($link['text']); ?>

	                        </a>
	                    <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>

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


                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate"><?php echo e(__('messages.t_order_details')); ?></h1>


                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-8 rtl:space-x-reverse">


                        <div class="mt-2 flex items-center text-xs font-medium" style="color: <?php echo e(auth()->user()->level->level_color); ?>">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4" style="color: <?php echo e(auth()->user()->level->level_color); ?>;margin-top: -3px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/> <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/> </svg>
                            <?php echo e(auth()->user()->level->title); ?>

                        </div>


                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>
                            <?php echo e(__('messages.t_total_sales_number', ['number' => number_format(auth()->user()->sales->where('status', 'delivered')->where('is_finished', true)->count())])); ?>

                        </div>


                        <?php if (auth()->user()->country): ?>
                            <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                                <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/> </svg>
                                <?php echo e(auth()->user()->country->name); ?>

                            </div>
                        <?php endif;?>


                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/> </svg>
                            <?php echo e(__('messages.t_signed_up_on_date', ['date' => format_date(auth()->user()->created_at, 'F j, Y')])); ?>

                        </div>

                    </div>

                </div>

                <?php if (!$order->is_finished && $order->order->invoice->status !== 'pending'): ?>
                    <div class="mt-5 flex xl:mt-0 xl:ltr:ml-4 xl:rtl:mr-4">


                        <?php if ($order->status === 'pending'): ?>
                            <span class="hidden sm:block ltr:mr-3 rtl:ml-4">
                                <button x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_u_want_to_cancel_order')); ?>') ? $wire.cancel() : ''" wire:loading.attr="disabled" wire:target="cancel()" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500">
                                    <?php echo e(__('messages.t_cancel_order')); ?>

                                </button>
                            </span>
                        <?php endif;?>


                        <?php if ($order->status === 'pending'): ?>
                            <span class="hidden sm:block ltr:mr-3 rtl:ml-4">
                                <button x-on:click="start" type="button" class="inline-flex items-center px-4 py-2 border border-purple-500 rounded-sm shadow-sm text-[13px] font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-purple-50 focus:ring-purple-700">
                                    <?php echo e(__('messages.t_start_the_order')); ?>

                                </button>
                            </span>
                        <?php endif;?>


                        <?php if ($order->status === 'proceeded' || ($order->status === 'delivered' && !$order->is_finished)): ?>
                            <span class="hidden sm:block ltr:mr-3 rtl:ml-4">
                                <a href="<?php echo e(url('seller/orders/deliver', $order->uid)); ?>" type="button" class="inline-flex items-center px-4 py-2 border border-purple-500 rounded-sm shadow-sm text-[13px] font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-purple-50 focus:ring-purple-700">
                                    <?php echo e(__('messages.t_deliver_work')); ?>

                                </a>
                            </span>
                        <?php endif;?>

                    </div>
                <?php endif;?>

            </div>
        </header>


        <div class="bg-white rounded-b-md">


            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-10">
                <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div class="ltr:ml-4 rtl:mr-4 mt-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="<?php echo e(src($order->gig->thumbnail)); ?>" alt="">
                            </div>
                            <div class="ltr:ml-4 rtl:mr-4">
                                <h3 class="text-sm leading-6 font-medium text-gray-700">
                                    <?php echo e($order->gig->title); ?>

                                </h3>
                                <div class="mt-1 text-xs space-x-2 rtl:space-x-reverse">


                                    <a href="<?php echo e(url('service', $order->gig->slug)); ?>" target="_blank" class="text-indigo-600 font-medium">
                                        <?php echo e(__('messages.t_view_gig')); ?>

                                    </a>

                                    <span class="text-gray-500 font-black">·</span>


                                    <a href="<?php echo e(url('seller/gigs/edit', $order->gig->uid)); ?>" target="_blank" class="text-indigo-600 font-medium">
                                        <?php echo e(__('messages.t_edit_gig')); ?>

                                    </a>

                                </div>
                            </div>
                    </div>
                  </div>


                    <div class="ltr:ml-4 rtl:mr-4 mt-4 flex-shrink-0 flex">
                        <div class="flex text-gray-500 text-xs space-x-4 lg:space-x-12 rtl:space-x-reverse">


                            <span class="flex">
                                <div class="text-center">
                                    <p class="text-[10px] tracking-widest text-gray-400 uppercase"><?php echo e(__('messages.t_total')); ?></p>
                                    <p class="mt-2 text-[11px] text-gray-600 font-medium">
                                        <?php echo money($order->profit_value, settings('currency')->code, true); ?>
                                    </p>
                                </div>
                            </span>


                            <span class="flex">
                                <div class="text-center">
                                    <p class="text-[10px] tracking-widest text-gray-400 uppercase"><?php echo e(__('messages.t_quantity')); ?></p>
                                    <p class="mt-2 text-[11px] text-gray-600 font-medium">
                                        <?php echo e($order->quantity); ?>

                                    </p>
                                </div>
                            </span>


                            <span class="flex">
                                <div class="text-center">
                                    <p class="text-[10px] tracking-widest text-gray-400 uppercase"><?php echo e(__('messages.t_expected_delivery_date')); ?></p>
                                    <p class="mt-2 text-[11px] text-gray-600 font-medium">
                                        <?php if ($order->expected_delivery_date): ?>
                                            <?php echo e(format_date($order->expected_delivery_date, 'F j, Y h:i A')); ?>

                                        <?php else: ?>
                                            —
                                        <?php endif;?>
                                    </p>
                                </div>
                            </span>

                        </div>
                    </div>

                </div>
            </div>

            <div class="w-full rounded-b-md">
                <dl>


                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-10">
                        <dt class="text-sm font-medium text-black"><?php echo e(__('messages.t_date_placed')); ?></dt>
                        <dd class="mt-1 text-sm text-gray-500 sm:mt-0 sm:col-span-2">
                            <?php echo e(format_date($order->placed_at, 'F j, Y h:i A')); ?>

                        </dd>
                    </div>


                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-10">
                        <dt class="text-sm font-medium text-black"><?php echo e(__('messages.t_status')); ?></dt>
                        <dd class="mt-1 sm:mt-0 sm:col-span-2">
                            <?php if ($order->order->invoice->status === 'pending'): ?>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                    <?php echo e(__('messages.t_pending_payment')); ?>

                                </span>
                            <?php else: ?>
                                <?php switch ($order->status):

case ('pending'): ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <?php echo e(__('messages.t_pending')); ?>

                                        </span>
                                        <?php break;?>


                                    <?php case ('delivered'): ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <?php echo e(__('messages.t_delivered')); ?>

                                        </span>
                                        <span class="text-sm text-gray-400 ltr:ml-4 rtl:mr-4"><?php echo e(format_date($order->delivered_at, 'F j, Y')); ?></span>
                                        <?php break;?>


                                    <?php case ('refunded'): ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <?php echo e(__('messages.t_refunded')); ?>

                                        </span>
                                        <span class="text-sm text-gray-400 ltr:ml-4 rtl:mr-4"><?php echo e(format_date($order->refunded_at, 'F j, Y')); ?></span>
                                        <?php break;?>


                                    <?php case ('proceeded'): ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            <?php echo e(__('messages.t_in_the_process')); ?>

                                        </span>
                                        <span class="text-sm text-gray-400 ltr:ml-4 rtl:mr-4"><?php echo e(format_date($order->proceeded_at, 'F j, Y')); ?></span>
                                        <?php break;?>


                                    <?php case ('canceled'): ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            <?php echo e(__('messages.t_canceled')); ?>

                                        </span>
                                        <span class="text-sm text-gray-400 ltr:ml-4 rtl:mr-4"><?php echo e(format_date($order->canceled_at, 'F j, Y')); ?></span>
                                        <?php break;?>

                                    <?php default: ?>

                                <?php endswitch;?>
                            <?php endif;?>
                        </dd>
                    </div>


                    <?php if ($order->has('upgrades')): ?>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-10 rounded-b-md">
                            <dt class="text-sm font-medium text-black"><?php echo e(__('messages.t_upgrades')); ?></dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <fieldset class="space-y-5">
                                    <?php $__currentLoopData = $order->upgrades;
    $__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $upgrade): $__env->incrementLoopIndices();
        $loop = $__env->getLastLoop();?>
	                                        <div class="relative flex items-start">
	                                            <div class="flex items-center h-5">
	                                                <input type="checkbox" class="h-4 w-4 text-gray-300 border-gray-200 border-2 rounded-sm cursor-not-allowed pointer-events-none" checked disabled>
	                                            </div>
	                                            <div class="ltr:ml-3 rtl:mr-3 text-sm mt-[-3px]">
	                                                <label class="font-medium text-gray-500 text-xs"><?php echo e($upgrade->title); ?></label>
	                                                <p class="font-normal text-gray-400">
	                                                    <div class="mt-1 flex text-sm">
	                                                        <p class="text-gray-400 text-xs">+ <?php echo money($upgrade->price, settings('currency')->code, true); ?></p>

	                                                        <?php if ($upgrade->extra_days): ?>
	                                                            <p class="ltr:ml-4 ltr:pl-4 ltr:border-l rtl:mr-4 rtl:pr-4 rtl:border-r border-gray-200 text-gray-400 text-xs">
	                                                                <?php echo e(__('messages.t_extra_days_delivery_time_short', ['time' => delivery_time_trans($upgrade->extra_days)])); ?>

	                                                            </p>
	                                                        <?php else: ?>
                                                            <p class="ltr:ml-4 ltr:pl-4 ltr:border-l rtl:mr-4 rtl:pr-4 rtl:border-r border-gray-200 text-gray-400 text-xs">
                                                                <?php echo e(__('messages.t_no_changes_delivery_time')); ?>

                                                            </p>
                                                        <?php endif;?>
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endforeach;
    $__env->popLoop();
    $loop = $__env->getLastLoop();?>
                                </fieldset>
                            </dd>
                        </div>
                    <?php endif;?>

                </dl>
            </div>
        </div>

    </div>
</div>

<?php $__env->startPush('scripts');?>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function TBhqVNUmCYEnOEj() {
            return {

                // Start the order
                start() {
                    const is_requirements_sent = <?php echo \Illuminate\Support\Js::from($order->is_requirements_sent)->toHtml() ?>;

                    if (!is_requirements_sent) {
                        Swal.fire({
                            title             : "<span class='text-lg font-bold text-black'><?php echo e(__('messages.t_attention_needed')); ?></span>",
                            html              : "<p class='text-sm text-gray-500 font-normal overflow-hidden px-12'><?php echo e(__('messages.t_buyer_didnt_send_requirements_yet_continue')); ?></p>",
                            showCancelButton  : true,
                            cancelButtonText  : "<?php echo e(__('messages.t_cancel')); ?>",
                            confirmButtonText : "<?php echo e(__('messages.t_i_have_all_info_needed')); ?>",
                            confirmButtonColor: '',
                            focusConfirm      : false,
                            allowOutsideClick : false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.livewire.find('<?php echo e($_instance->id); ?>').start();
                            }
                        });
                    } else {

                        window.livewire.find('<?php echo e($_instance->id); ?>').start();

                    }
                }

            }
        }
        window.TBhqVNUmCYEnOEj = TBhqVNUmCYEnOEj();
    </script>

<?php $__env->stopPush();?>

<?php $__env->startPush('styles');?>
    <style>
        .application .swal2-styled.swal2-cancel {
            background-color: transparent !important;
            color: #8f8f8f;
        }
        .application .swal2-actions button {
            font-size: 13px;
            font-weight: 400;
            letter-spacing: .2px;
        }
    </style>
<?php $__env->stopPush();?><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/main/seller/orders/options/details.blade.php ENDPATH**/?>