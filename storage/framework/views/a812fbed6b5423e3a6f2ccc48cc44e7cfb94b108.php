<div class="w-full">

    
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                <?php echo e(__('messages.t_orders')); ?>

            </p>
        </div>
    </div>

    
    <div class="bg-white dark:bg-gray-800 overflow-y-auto border !border-t-0 !border-b-0">
        <table class="w-full whitespace-nowrap">
            <thead class="bg-gray-200">
                <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_id')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_buyer')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_status')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_total')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_subtotal')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_taxes')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_placed_at')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_options')); ?></th>
                </tr>
            </thead>
            <tbody class="w-full">

                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100" wire:key="orders-<?php echo e($order->id); ?>">

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <span class="text-xs font-bold text-gray-900"><?php echo e($order->uid); ?></span>
                        </td>

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <a href="<?php echo e(url('profile', $order->buyer->username)); ?>" target="_blank" class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover" src="<?php echo e(src($order->buyer->avatar)); ?>" alt="<?php echo e($order->buyer->username); ?>" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium text-xs flex items-center">
                                        <?php echo e($order->buyer->username); ?>

                                        <?php if($order->buyer->status === 'verified'): ?>
                                            <svg data-tooltip-target="account-verified-badge" class="ltr:ml-0.5 rtl:mr-0.5" width="14px" height="14px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
                                            <div id="account-verified-badge" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                <?php echo e(__('messages.t_account_verified')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </p>
                                    <p class="text-[11px] leading-3 text-gray-600 pt-2"><?php echo e($order->buyer->email); ?></p>
                                </div>
                            </a>
                        </td>
                       
                        <td class="text-center">
                            <?php switch($order->is_finished):

                                case (0): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-amber-500 bg-amber-50">
                                    Pending payment
                                    </span>
                                <?php break; ?>
                                <?php case (1): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                    proceeded
                                    </span>
                                <?php break; ?>
                                <?php case (2): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                    is finished
                                    </span>
                                <?php break; ?>

                                <?php default: ?>

                            <?php endswitch; ?>
                        </td>

                        
                        <td class="text-center">
                            <span class="text-xs font-bold font-[Lato]"><?php echo money($order->total_value, settings('currency')->code, true); ?></span>
                        </td>

                        
                        <td class="text-center">
                            <span class="text-xs font-bold font-[Lato]"><?php echo money($order->subtotal_value, settings('currency')->code, true); ?></span>
                        </td>

                        
                        <td class="text-center">
                            <span class="text-xs font-bold font-[Lato]"><?php echo money($order->taxes_value, settings('currency')->code, true); ?></span>
                        </td>

                        
                        <td class="text-center">
                            <span class="text-xs font-medium text-gray-500"><?php echo e(format_date($order->placed_at, 'ago')); ?></span>
                        </td>

                        
                        <td class="text-center">
                            <div class="relative inline-block text-left">
                                <div>
                                    <button data-dropdown-toggle="table-options-dropdown-<?php echo e($order->id); ?>" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                    </button>
                                </div>
                                <div id="table-options-dropdown-<?php echo e($order->id); ?>" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="py-1" role="none">

                                        
                                        <a href="<?php echo e(admin_url('orders/details/' . $order->uid)); ?>" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/> <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>
                                            <span class="text-xs font-medium"><?php echo e(__('messages.t_order_details')); ?></span>
                                        </a>

                                    </div>
                                    <button    wire:click="publish('<?php echo e($order->id); ?>')"  type="button" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >
                                    
                                    <div wire:loading wire:target="publish('<?php echo e($order->id); ?>')">
                                        <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                    
                                    <div wire:loading.remove wire:target="publish('<?php echo e($order->id); ?>')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    </div>
                                    <span class="text-xs font-medium">activer for working</span>
                                    </button>

                                    <button    wire:click="finished('<?php echo e($order->id); ?>')"  type="button" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >
                                    
                                    <div wire:loading wire:target="finished('<?php echo e($order->id); ?>')">
                                        <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                    
                                    <div wire:loading.remove wire:target="finished('<?php echo e($order->id); ?>')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    </div>
                                    <span class="text-xs font-medium">is finished</span>
                                    </button>
                                </div>
                            </div>


                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>

    
    <?php if($orders->hasPages()): ?>
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            <?php echo $orders->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>
<?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/admin/orders/orders.blade.php ENDPATH**/ ?>