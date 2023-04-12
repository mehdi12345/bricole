<div class="w-full">

    
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                <?php echo e(__('messages.t_messages')); ?>

            </p>
        </div>
    </div>

    
    <div class="bg-white dark:bg-gray-800 overflow-y-auto border !border-t-0 !border-b-0">
        <table class="w-full whitespace-nowrap">
            <thead class="bg-gray-200">
                <tr tabindex="0"
                    class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_sender')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_message')); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center"><?php echo e(__('messages.t_status')); ?></th>
                </tr>
            </thead>
            <tbody class="w-full">

                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100" wire:key="messages-<?php echo e($msg->id); ?>">

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10">
                                    <img class="w-full h-full rounded-sm object-cover" src="<?php echo e(src($msg->sender->avatar)); ?>" alt="<?php echo e($msg->sender->username); ?>" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium"><?php echo e($msg->sender->username); ?></p>
                                    <p class="text-xs leading-3 text-gray-600 pt-2"><?php echo e($msg->sender->email); ?></p>
                                </div>
                            </div>
                        </td>

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <p class="text-xs font-medium"><?php echo e($msg->message); ?></p>
                        </td>

                        
                        <td class="text-center">

                            <?php if($msg->is_seen): ?>
                                <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                    <?php echo e(__('messages.t_seen')); ?>

                                </span>
                            <?php else: ?>
                                <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-blue-500 bg-blue-50">
                                    <?php echo e(__('messages.t_new')); ?>

                                </span>
                            <?php endif; ?>

                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>

    
    <?php if($messages->hasPages()): ?>
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            <?php echo $messages->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>
<?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/admin/conversations/messages.blade.php ENDPATH**/ ?>