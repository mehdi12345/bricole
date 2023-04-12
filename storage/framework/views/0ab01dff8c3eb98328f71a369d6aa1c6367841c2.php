<div x-data="window.fQFJfPBWUodMvpD">
    
    
    <div @click="open = !open" class="flex items-center cursor-pointer">
        <img src="<?php echo e(asset('img/flags/'. strtolower($default_country_code) .'.svg')); ?>" alt="" class="w-4 h-4 ltr:sm:mr-3 rtl:sm:ml-3">
        <span class="text-[13px] font-normal text-gray-400 hover:text-gray-700 hidden sm:inline"><?php echo e($default_language_name); ?></span>
    </div>

    
    <div @keydown.window.escape="open = false" x-show="open" class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-languages" aria-modal="true" x-cloak>
        <div class="flex md:items-end justify-center md:min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="open = false" aria-hidden="true" x-cloak></div>
  
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
          
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative inline-block align-bottom bg-white rounded-sm text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-full sm:max-w-lg" x-cloak>
              
                <div class="grid grid-cols-2 gap-2 sm:p-6">

                    <?php $__currentLoopData = supported_languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div <?php if($default_language_code !== $lang->language_code): ?> wire:click="setLocale('<?php echo e($lang->language_code); ?>')" <?php endif; ?> class="py-2 px-4 rounded-sm inline-flex items-center cursor-pointer justify-between <?php echo e($default_language_code === $lang->language_code ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50'); ?> focus:outline-none">
                            <div class="inline-flex items-center">
                                <img src="<?php echo e(asset('img/flags/rounded/' . $lang->country_code . '.svg')); ?>" alt="<?php echo e($lang->name); ?>" class="w-5 ltr:mr-3 rtl:ml-3">
                                <span class="font-normal text-xs"><?php echo e($lang->name); ?></span>
                            </div>
                            <?php if($default_language_code === $lang->language_code): ?>
                                <div class="block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                </div>
                            <?php else: ?>
                                <div wire:loading wire:target="setLocale('<?php echo e($lang->language_code); ?>')">
                                    <svg role="status" class="block w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/> <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/> </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                
                <div class="bg-gray-50 px-4 py-3 flex justify-center items-center">
                    <button type="button" class="w-full inline-flex justify-center px-4 py-2 bg-transparent text-xs font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto" @click="open = false">
                        <?php echo e(__('messages.t_close')); ?>

                    </button>
                </div>
                

            </div>
            
          
        </div>
    </div>

</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function fQFJfPBWUodMvpD() {
            return {
                open: false
            }
        }
        window.fQFJfPBWUodMvpD = fQFJfPBWUodMvpD();
    </script>
<?php $__env->stopPush(); ?><?php /**PATH D:\bricole-latest\bricole\resources\views/livewire/main/partials/languages.blade.php ENDPATH**/ ?>