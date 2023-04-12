<div class="w-full">
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">


        <div class="col-span-12 xl:col-span-7">
            <div class="bg-white border-gray-200 shadow-sm rounded-lg border">
                <ul role="list" class="divide-y divide-gray-200">

                    <?php $__currentLoopData = $order->items;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $item): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                        <li class="p-4 sm:p-6">
	                            <div class="flex items-center sm:items-start">
	                                <div
	                                    class="flex-shrink-0 w-20 h-20 bg-gray-200 rounded-lg overflow-hidden sm:w-20 sm:h-20">
	                                    <img src="<?php echo e(src($item->gig->thumbnail)); ?>" alt="<?php echo e($item->gig->title); ?>"class="w-full h-full object-center object-cover">
	                                </div>
	                                <div class="flex-1 ltr:ml-6 rtl:mr-6 text-sm">
	                                    <div class="font-bold text-gray-900 sm:flex sm:justify-between">
	                                        <a href="<?php echo e(url('service', $item->gig->slug)); ?>" target="_blank" class="hover:text-indigo-600"><?php echo e($item->gig->title); ?></a>
	                                    </div>
	                                    <div class="text-gray-500 mt-6 sm:mt-2">


	                                        <div class="grid sm:!flex text-gray-500 text-xs sm:space-x-12 sm:rtl:space-x-reverse space-y-6 sm:space-y-0">


	                                            <span class="flex ltr:sm:mr-12 rtl:sm:ml-12">
	                                                <div class="ltr:text-left rtl:text-right sm:!text-center">
	                                                    <p class="text-[10px] tracking-widest text-gray-400 uppercase"><?php echo e(__('messages.t_total')); ?></p>
	                                                    <p class="mt-2 text-[11px] text-gray-600 font-medium">
	                                                        <?php echo money($item->total_value, settings('currency')->code, true); ?>
	                                                    </p>
	                                                </div>
	                                            </span>


	                                            <span class="flex">
	                                                <div class="ltr:text-left rtl:text-right sm:!text-center">
	                                                    <p class="text-[10px] tracking-widest text-gray-400 uppercase"><?php echo e(__('messages.t_quantity')); ?></p>
	                                                    <p class="mt-2 text-[11px] text-gray-600 font-medium">
	                                                        <?php echo e($item->quantity); ?>

	                                                    </p>
	                                                </div>
	                                            </span>


	                                            <span class="flex">
	                                                <div class="ltr:text-left rtl:text-right sm:!text-center">
	                                                    <p class="text-[10px] tracking-widest text-gray-400 uppercase"><?php echo e(__('messages.t_expected_delivery_date')); ?></p>
	                                                    <p class="mt-2 text-[11px] text-gray-600 font-medium">
	                                                        <?php if ($item->expected_delivery_date): ?>
	                                                            <?php echo e(format_date($item->expected_delivery_date, 'F j, Y h:i A')); ?>

	                                                        <?php else: ?>
                                                            —
                                                        <?php endif;?>
                                                    </p>
                                                </div>
                                            </span>


                                            <span class="flex">
                                                <div class="ltr:text-left rtl:text-right sm:!text-center">
                                                    <p class="text-[10px] tracking-widest text-gray-400 uppercase"><?php echo e(__('messages.t_status')); ?></p>

                                                    <?php if ($item->order->invoice->status === 'pending'): ?>
                                                        <p class="mt-2 text-[11px] text-amber-500 font-medium">
                                                            <?php echo e(__('messages.t_pending_payment')); ?>

                                                        </p>
                                                    <?php else: ?>
                                                        <?php switch ($item->status):

case ('pending'): ?>
                                                                <p class="mt-2 text-[11px] text-amber-500 font-medium">
                                                                    <?php echo e(__('messages.t_pending')); ?>

                                                                </p>
                                                                <?php break;?>


                                                            <?php case ('proceeded'): ?>
                                                                <p data-tooltip-target="orders-<?php echo e($order->uid); ?>-item-<?php echo e($item->id); ?>-status-proceeded" class="mt-2 text-[11px] text-blue-500 font-medium cursor-pointer">
                                                                    <?php echo e(__('messages.t_in_the_process')); ?>

                                                                </p>
                                                                <div id="orders-<?php echo e($order->uid); ?>-item-<?php echo e($item->id); ?>-status-proceeded" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                    <?php echo e(format_date($item->proceeded_at, 'F j, Y h:i A')); ?>

                                                                </div>
                                                                <?php break;?>


                                                            <?php case ('finished'): ?>
                                                                <p data-tooltip-target="orders-<?php echo e($order->uid); ?>-item-<?php echo e($item->id); ?>-status-finished" class="mt-2 text-[11px] text-green-500 font-medium cursor-pointer">
                                                                    finished
                                                                </p>
                                                                <div id="orders-<?php echo e($order->uid); ?>-item-<?php echo e($item->id); ?>-status-finished" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                    <?php echo e(format_date($item->finished_at, 'F j, Y h:i A')); ?>

                                                                </div>
                                                                <?php break;?>


                                                            <?php case ('canceled'): ?>
                                                                <p data-tooltip-target="orders-<?php echo e($order->uid); ?>-item-<?php echo e($item->id); ?>-status-canceled" class="mt-2 text-[11px] text-gray-500 font-medium cursor-pointer">
                                                                    <?php echo e(__('messages.t_canceled')); ?>

                                                                </p>
                                                                <div id="orders-<?php echo e($order->uid); ?>-item-<?php echo e($item->id); ?>-status-canceled" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                    <?php echo e(format_date($item->canceled_at, 'F j, Y h:i A')); ?>

                                                                </div>
                                                                <?php break;?>


                                                            <?php case ('refunded'): ?>
                                                                <p data-tooltip-target="orders-<?php echo e($order->uid); ?>-item-<?php echo e($item->id); ?>-status-refunded" class="mt-2 text-[11px] text-red-500 font-medium cursor-pointer">
                                                                    <?php echo e(__('messages.t_refunded')); ?>

                                                                </p>
                                                                <div id="orders-<?php echo e($order->uid); ?>-item-<?php echo e($item->id); ?>-status-refunded" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                    <?php echo e(format_date($item->refunded_at, 'F j, Y h:i A')); ?>

                                                                </div>
                                                                <?php break;?>

                                                            <?php default: ?>

                                                        <?php endswitch;?>
                                                    <?php endif;?>

                                                </div>
                                            </span>


                                            <!--
                                            <span class="flex">
                                                <div class="ltr:text-left rtl:text-right sm:!text-center">
                                                    <p class="text-[10px] tracking-widest text-gray-400 uppercase">active </p>
                                                        <button    wire:click="publish"  type="button" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >

                                                        <div wire:loading wire:target="publish">
                                                            <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                            </svg>
                                                        </div>


                                                        <div wire:loading.remove wire:target="publish">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                                        </div>
                                                        <span class="text-xs font-medium">active</span>
                                                        </button>
                                                </div>
                                            </span> -->

                                        </div>

                                        <?php if ($item->has('upgrades')): ?>
                                            <div class="mt-4">
                                                <fieldset class="space-y-5">

                                                    <?php $__currentLoopData = $item->upgrades;
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
	                                                                            <p class="ltr:ml-4 rtl:mr-4 ltr:pl-4 rtl:pr-4 ltr:border-l rtl:border-r border-gray-200 text-gray-400 text-xs">
	                                                                                <?php echo e(__('messages.t_extra_days_delivery_time_short', ['time' => delivery_time_trans($upgrade->extra_days)])); ?>

	                                                                            </p>
	                                                                        <?php else: ?>
                                                                            <p class="ltr:ml-4 rtl:mr-4 ltr:pl-4 rtl:pr-4 ltr:border-l rtl:border-r border-gray-200 text-gray-400 text-xs">
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
                                            </div>
                                        <?php endif;?>

                                    </div>
                                </div>
                            </div>

                        </li>
                    <?php endforeach;
    $__env->popLoop();
    $loop = $__env->getLastLoop();?>

                </ul>
            </div>
        </div>


        <div class="col-span-12 xl:col-span-5">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-sm leading-6 font-bold tracking-wide text-gray-900">
                        <?php echo e(__('messages.t_invoice')); ?>

                    </h3>
                    <p class="mt-1 max-w-2xl text-xs text-gray-500">
                        <?php echo e(__('messages.t_invoice_details')); ?>

                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>


                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                <?php echo e(__('messages.t_payment_method')); ?>

                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                               <?php switch ($order->invoice->payment_method):
case ('balance'): ?>
                                       <span><?php echo e(__('messages.t_user_credit')); ?></span>
                                       <?php break;?>
                                   <?php case ('paypal'): ?>
                                       <span class="text-[#3b7bbf]"><?php echo e(__('messages.t_paypal')); ?></span>
                                       <?php break;?>
                                    <?php case ('stripe'): ?>
                                       <span class="text-[#008cdd]"><?php echo e(__('messages.t_stripe')); ?></span>
                                       <?php break;?>
                                    <?php case ('offline'): ?>
                                       <span class="text-gray-500"><?php echo e(settings('offline_payment')->name); ?></span>
                                       <?php break;?>
                                    <?php case ('paystack'): ?>
                                       <span class="text-gray-500"><?php echo e(settings('paystack')->name); ?></span>
                                       <?php break;?>
                                    <?php case ('cashfree'): ?>
                                       <span class="text-gray-500"><?php echo e(settings('cashfree')->name); ?></span>
                                       <?php break;?>
                                    <?php case ('xendit'): ?>
                                       <span class="text-gray-500"><?php echo e(settings('xendit')->name); ?></span>
                                       <?php break;?>
                                   <?php default: ?>

                               <?php endswitch;?>
                            </dd>
                        </div>


                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                <?php echo e(__('messages.t_payment_id')); ?>

                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                               <?php echo e($order->invoice->payment_id); ?>

                            </dd>
                        </div>


                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                <?php echo e(__('messages.t_firstname')); ?>

                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                               <?php echo e($order->invoice->firstname); ?>

                            </dd>
                        </div>


                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                <?php echo e(__('messages.t_lastname')); ?>

                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                               <?php echo e($order->invoice->lastname); ?>

                            </dd>
                        </div>


                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                <?php echo e(__('messages.t_email_address')); ?>

                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                               <?php echo e($order->invoice->email); ?>

                            </dd>
                        </div>


                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                <?php echo e(__('messages.t_company')); ?>

                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                                <?php if ($order->invoice->company): ?>
                                    <?php echo e($order->invoice->company); ?>

                                <?php else: ?>
                                    -
                                <?php endif;?>
                            </dd>
                        </div>


                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                            <dt class="text-xs font-medium text-gray-500">
                                <?php echo e(__('messages.t_address')); ?>

                            </dt>
                            <dd class="mt-1 text-xs font-bold text-gray-900 sm:mt-0">
                                <?php if ($order->invoice->address): ?>
                                    <?php echo e($order->invoice->address); ?>

                                <?php else: ?>
                                    -
                                <?php endif;?>
                            </dd>
                        </div>

                    </dl>
                </div>
            </div>
        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/admin/orders/options/details.blade.php ENDPATH**/?>