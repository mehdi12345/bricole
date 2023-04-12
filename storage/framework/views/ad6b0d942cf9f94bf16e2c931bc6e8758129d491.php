<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['placement', 'id', 'target', 'size', 'uid']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['placement', 'id', 'target', 'size', 'uid']); ?>
<?php foreach (array_filter((['placement', 'id', 'target', 'size', 'uid']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div id="<?php echo e($id); ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full" wire:ignore.self x-data="window.<?php echo e($uid); ?>" x-init="initialize">
    <div class="relative p-4 w-full <?php echo e($size); ?> h-full md:h-auto">
        
        
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-auto max-h-[calc(100vh-100px)]">
            
            
            <div class="flex justify-between items-center py-4 px-6 rounded-t border-b dark:border-gray-600">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                    <?php echo e($title); ?>

                </h3>
                <button x-on:click="close" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ltr:ml-auto rtl:mr-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>

            
            <div class="p-6 space-y-6">
                <?php echo e($content); ?>

            </div>
            
            
            <?php if($footer ?? null): ?>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse rounded-b-md">
                    <?php echo e($footer); ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function <?php echo e($uid); ?>() {
            return {

                modal: null,

                initialize() {

                    // set the modal menu element
                    const targetEl = document.getElementById('<?php echo e($id); ?>');

                    if (targetEl) {
                        
                        // options with default values
                        const options  = {
                            placement      : '<?php echo e($placement); ?>',
                            backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40 overflow-x-hidden',
                            onHide         : () => {},
                            onShow         : () => {},
                            onToggle       : () => {}
                        };
    
                        // Generate modal
                        const modal    = new Modal(targetEl, options);
    
                        // Set modal
                        this.modal     = modal;
    
                        // When click on button open modal
                        if (document.getElementById('<?php echo e($target); ?>')) {
                            document.getElementById('<?php echo e($target); ?>').addEventListener("click", function(event) {
                                modal.show();
                            });
                        }
    
                        // Listent when want to close modal
                        window.addEventListener('close-modal', event => {
    
                            // Get requested modal id
                            const id = event.detail;
    
                            // Check if id same as this modal
                            if (id === <?php echo \Illuminate\Support\Js::from($id)->toHtml() ?>) {
                                modal.hide();
                            }
                            
                        });
    
                        // Listent when want to open modal
                        window.addEventListener('open-modal', event => {
    
                            // Get requested modal id
                            const id = event.detail;
    
                            // Check if id same as this modal
                            if (id === <?php echo \Illuminate\Support\Js::from($id)->toHtml() ?>) {
                                modal.show();
                            }
                            
                        });

                    }


                },

                // Close modal
                close() {
                    this.modal.hide();
                }
            }
        }
        window.<?php echo e($uid); ?> = <?php echo e($uid); ?>();
    </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/components/forms/modal.blade.php ENDPATH**/ ?>