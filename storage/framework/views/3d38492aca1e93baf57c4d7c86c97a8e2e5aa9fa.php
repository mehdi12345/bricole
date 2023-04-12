<div class="w-full">


    <?php if (session()->has('success')): ?>
        <div class="w-full mb-8">
            <div class="rounded-md bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ltr:ml-3 rtl:mr-3">
                        <p class="text-sm font-medium text-green-800"><?php echo e(session()->get('success')); ?></p>
                    </div>
                </div>
            </div>

        </div>
    <?php endif;?>


    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                <?php echo e(__('messages.t_gigs')); ?>

            </p>
        </div>
    </div>


    <div class="bg-white dark:bg-gray-800 overflow-y-auto border !border-t-0 !border-b-0">
        <table class="w-full whitespace-nowrap">
            <thead class="bg-gray-200">
                <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_gig')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_price')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_visits')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_sales')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_in_queue')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_rating')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_status')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_created_at')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_options')); ?></th>
                </tr>
            </thead>
            <tbody class="w-full">

                <?php $__currentLoopData = $gigs;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $gig): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100" wire:key="reports-<?php echo e($gig->id); ?>">


	                        <td class="ltr:pl-4 ltr:pr-10 rtl:pr-4 rtl:pl-10 w-[40%]">
	                            <div class="flex items-center">
	                                <div class="w-8 h-8">
	                                    <img class="w-full h-full rounded object-cover" src="<?php echo e(src($gig->thumbnail)); ?>" alt="<?php echo e($gig->title); ?>" />
	                                </div>
	                                <div class="ltr:pl-4 rtl:pr-4">
	                                    <a href="<?php echo e(url('service', $gig->slug)); ?>" target="_blank" class="font-medium text-xs hover:text-indigo-600 truncate pb-1.5 block max-w-xs"><?php echo e($gig->title); ?></a>
	                                    <div class="flex items-center text-[11px] font-normal text-gray-400">
	                                        <a href="<?php echo e(url('categories', $gig->category->slug)); ?>" class="hover:text-gray-600"><?php echo e($gig->category->name); ?></a>
	                                        <i class="mdi mdi-chevron-right text-[10px] mx-2"></i>
	                                        <a href="<?php echo e(url('categories/' . $gig->category->slug . '/' . $gig->subcategory->name)); ?>" class="hover:text-gray-600"><?php echo e($gig->subcategory->name); ?></a>
	                                    </div>
	                                </div>
	                            </div>
	                        </td>


	                        <td class="text-center">
	                            <p class="text-xs font-black text-black font-[Lato]"><?php echo money($gig->price, settings('currency')->code, true); ?></p>
	                        </td>


	                        <td class="text-center">
	                            <p class="text-xs font-black text-black font-[Lato]"><?php echo e($gig->counter_visits); ?></p>
	                        </td>


	                        <td class="text-center">
	                            <p class="text-xs font-black text-black font-[Lato]"><?php echo e($gig->counter_sales); ?></p>
	                        </td>


	                        <td class="text-center">
	                            <p class="text-xs font-black text-black font-[Lato]"><?php echo e($gig->orders_in_queue); ?></p>
	                        </td>


	                        <td class="text-center">
	                            <div class="gig-card-rating-container mx-auto mb-1 z-0" data-rating-value="<?php echo e($gig->rating); ?>"></div>
	                            <div class="text-xs text-gray-400"><?php echo e(__('messages.t_number_reviews', ['number' => number_format($gig->counter_reviews)])); ?></div>
	                        </td>


	                        <td class="text-center">
	                            <?php switch ($gig->status):

    case ('pending'): ?>
	                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
	                                        <?php echo e(__('messages.t_pending')); ?>

	                                    </span>
	                                    <?php break;?>


	                                <?php case ('active'): ?>
	                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
	                                        <?php echo e(__('messages.t_active')); ?>

	                                    </span>
	                                    <?php break;?>


	                                <?php case ('deleted'): ?>
	                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
	                                        <?php echo e(__('messages.t_deleted')); ?>

	                                    </span>
	                                    <?php break;?>


	                                <?php case ('featured'): ?>
	                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
	                                        <?php echo e(__('messages.t_featured')); ?>

	                                    </span>
	                                    <?php break;?>


	                                <?php case ('trending'): ?>
	                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
	                                        <?php echo e(__('messages.t_trending')); ?>

	                                    </span>
	                                    <?php break;?>


	                                <?php case ('boosted'): ?>
	                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
	                                        <?php echo e(__('messages.t_boosted')); ?>

	                                    </span>
	                                    <?php break;?>

	                                <?php default: ?>

	                            <?php endswitch;?>
	                        </td>


	                        <td class="text-center">
	                            <span class="text-xs text-gray-500 font-medium"><?php echo e(format_date($gig->created_at, 'ago')); ?></span>
	                        </td>


	                        <td class="text-center">
	                            <div class="relative inline-block text-left">
	                                <div>
	                                    <button data-dropdown-toggle="table-options-dropdown-<?php echo e($gig->id); ?>" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
	                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
	                                    </button>
	                                </div>
	                                <div id="table-options-dropdown-<?php echo e($gig->id); ?>" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
	                                    <div class="py-1" role="none">


	                                        <?php if ($gig->status === 'pending'): ?>
	                                            <button wire:key="option-publish-<?php echo e($gig->id); ?>" x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_u_want_publish_this_gig')); ?>') ? $wire.publish('<?php echo e($gig->id); ?>') : ''" wire:loading.attr="disabled" wire:target="publish('<?php echo e($gig->id); ?>')" type="button" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >


	                                                <div wire:loading wire:target="publish('<?php echo e($gig->id); ?>')">
	                                                    <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
	                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
	                                                    </svg>
	                                                </div>


	                                                <div wire:loading.remove wire:target="publish('<?php echo e($gig->id); ?>')">
	                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
	                                                </div>

	                                                <span class="text-xs font-medium"><?php echo e(__('messages.t_publish_gig')); ?></span>

	                                            </button>
	                                        <?php endif;?>


                                        <a href="<?php echo e(admin_url('gigs/edit/' . $gig->uid . '?step=overview')); ?>" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                                            <svg class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/> <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"/> </svg>
                                            <span class="text-xs font-medium"><?php echo e(__('messages.t_edit_gig')); ?></span>
                                        </a>


                                        <a href="<?php echo e(admin_url('gigs/analytics/' . $gig->uid)); ?>" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/></svg>
                                            <span class="text-xs font-medium"><?php echo e(__('messages.t_gig_analytics')); ?></span>
                                        </a>


                                        <button wire:key="option-delete-<?php echo e($gig->id); ?>" x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_u_want_to_delete_this')); ?>') ? $wire.delete('<?php echo e($gig->id); ?>') : ''" wire:loading.attr="disabled" wire:target="delete('<?php echo e($gig->id); ?>')" type="button" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >


                                            <div wire:loading wire:target="delete('<?php echo e($gig->id); ?>')">
                                                <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                </svg>
                                            </div>


                                            <div wire:loading.remove wire:target="delete('<?php echo e($gig->id); ?>')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                            </div>

                                            <span class="text-xs font-medium"><?php echo e(__('messages.t_delete_gig')); ?></span>

                                        </button>

                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                <?php endforeach;
    $__env->popLoop();
    $loop = $__env->getLastLoop();?>

            </tbody>
        </table>
    </div>


    <?php if ($gigs->hasPages()): ?>
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            <?php echo $gigs->links('pagination::tailwind'); ?>

        </div>
    <?php endif;?>

</div>
<?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/admin/gigs/gigs.blade.php ENDPATH**/?>