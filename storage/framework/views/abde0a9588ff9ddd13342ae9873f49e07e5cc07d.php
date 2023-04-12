<div class="w-full">

    
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                <?php echo e(__('messages.t_verification_center')); ?>

            </p>
        </div>
    </div>

    
    <div class="bg-white dark:bg-gray-800 overflow-y-auto border !border-t-0 !border-b-0">
        <table class="w-full whitespace-nowrap">
            <thead class="bg-gray-200">
                <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_user')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_document_type')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_front_side')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_back_side')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_selfie_photo')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_status')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_options')); ?></th>
                </tr>
            </thead>
            <tbody class="w-full">

                <?php $__currentLoopData = $verifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100" wire:key="verifications-<?php echo e($v->id); ?>">

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <a href="<?php echo e(url('profile', $v->user->username)); ?>" target="_blank" class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover" src="<?php echo e(src($v->user->avatar)); ?>" alt="<?php echo e($v->user->username); ?>" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium text-xs"><?php echo e($v->user->username); ?></p>
                                    <p class="text-[11px] leading-3 text-gray-600 pt-1.5"><?php echo e($v->user->email); ?></p>
                                </div>
                            </a>
                        </td>

                        
                        <td class="text-center">
                            <?php if($v->document_type === 'id'): ?>
                                <span class="text-xs font-bold tracking-wide text-gray-700"><?php echo e(__('messages.t_government_issued_id')); ?></span>
                            <?php elseif($v->document_type === 'driver_license'): ?>
                                <span class="text-xs font-bold tracking-wide text-gray-700"><?php echo e(__('messages.t_driver_license')); ?></span>
                            <?php else: ?>
                                <span class="text-xs font-bold tracking-wide text-gray-700"><?php echo e(__('messages.t_passport')); ?></span>
                            <?php endif; ?>
                        </td>

                        
                        <td class="text-center">
                            <a href="<?php echo e(url( 'uploads/verifications/' . $v->uid . '/front/' . $v->file_front_side )); ?>" target="_blank">
                                <img class="w-8 h-8 rounded object-cover mx-auto" src="<?php echo e(src($v->frontside)); ?>" />
                            </a>
                        </td>

                        
                        <td class="text-center">
                            <?php if($v->backside): ?>
                                <a href="<?php echo e(url( 'uploads/verifications/' . $v->uid . '/back/' . $v->file_back_side )); ?>" target="_blank">
                                    <img class="w-8 h-8 rounded object-cover mx-auto" src="<?php echo e(src($v->backside)); ?>" />
                                </a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>

                        
                        <td class="text-center">
                            <a href="<?php echo e(url( 'uploads/verifications/' . $v->uid . '/selfie/' . $v->file_selfie )); ?>" target="_blank">
                                <img class="w-8 h-8 rounded object-cover mx-auto" src="<?php echo e(src($v->selfie)); ?>" />
                            </a>
                        </td>

                        
                        <td class="text-center">
                            <?php switch($v->status):
                                case ('pending'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-amber-500 bg-amber-50">
                                        <?php echo e(__('messages.t_pending')); ?>

                                    </span>
                                    <?php break; ?>
                                <?php case ('verified'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-blue-500 bg-blue-50">
                                        <?php echo e(__('messages.t_verified')); ?>

                                    </span>
                                    <?php break; ?>
                                <?php case ('declined'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-red-500 bg-red-50">
                                        <?php echo e(__('messages.t_declined')); ?>

                                    </span>
                                    <?php break; ?>
                                <?php default: ?>
                                    
                            <?php endswitch; ?>
                        </td>

                        
                        <td class="text-center">
                            <?php if($v->status === 'pending'): ?>
                                <div class="relative inline-block text-left">
                                    <div>
                                        <button data-dropdown-toggle="table-options-dropdown-<?php echo e($v->id); ?>" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                        </button>
                                    </div>
                                    <div id="table-options-dropdown-<?php echo e($v->id); ?>" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                        <div class="py-1" role="none">

                                            
                                            <button wire:key="option-approve-<?php echo e($v->id); ?>" x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_u_want_to_approve_this_verification')); ?>') ? $wire.approve('<?php echo e($v->id); ?>') : ''" wire:loading.attr="disabled" wire:target="approve('<?php echo e($v->id); ?>')" type="button" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >

                                                
                                                <div wire:loading wire:target="approve('<?php echo e($v->id); ?>')">
                                                    <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="approve('<?php echo e($v->id); ?>')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                                </div>

                                                <span class="text-xs font-medium"><?php echo e(__('messages.t_approve_files')); ?></span>

                                            </button>

                                            
                                            <button wire:key="option-decline-<?php echo e($v->id); ?>" x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_u_want_to_decline_this_verification')); ?>') ? $wire.decline('<?php echo e($v->id); ?>') : ''" wire:loading.attr="disabled" wire:target="decline('<?php echo e($v->id); ?>')" type="button" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >

                                                
                                                <div wire:loading wire:target="decline('<?php echo e($v->id); ?>')">
                                                    <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="decline('<?php echo e($v->id); ?>')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"/></svg>
                                                </div>

                                                <span class="text-xs font-medium"><?php echo e(__('messages.t_decline_files')); ?></span>

                                            </button>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>

    
    <?php if($verifications->hasPages()): ?>
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            <?php echo $verifications->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>
<?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/admin/verifications/verifications.blade.php ENDPATH**/ ?>