<?php $attributes??=new \Illuminate\View\ComponentAttributeBag;?>
<?php foreach ($attributes->onlyProps(['label', 'placeholder', 'model', 'old' => null]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}?>
<?php $attributes = $attributes->exceptProps(['label', 'placeholder', 'model', 'old' => null]);?>
<?php foreach (array_filter((['label', 'placeholder', 'model', 'old' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}?>
<?php $__defined_vars = get_defined_vars();?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) {
        unset($$__key);
    }

}?>
<?php unset($__defined_vars);?>

<div class="<?php echo e($errors->first($model) ? 'ckeditor-has-error' : ''); ?>">


    <label for="text-input-component-id-<?php echo e($model); ?>" class="block text-xs font-medium <?php echo e($errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-gray-700'); ?>"><?php echo e($label); ?></label>


    <div class="mt-2 relative" wire:ignore>
        <div id="ckeditor-container"></div>
    </div>


    <?php $__errorArgs = [$model];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])):
    if (isset($message)) {$__messageOriginal = $message;}
    $message = $__bag->first($__errorArgs[0]);?>
	        <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first($model)); ?></p>
	    <?php unset($message);
    if (isset($__messageOriginal)) {$message = $__messageOriginal;}
endif;
unset($__errorArgs, $__bag);?>

</div>

<?php if (!$__env->hasRenderedOnce('5da543db-a686-4ba4-9f32-003c7d0ba862')): $__env->markAsRenderedOnce('5da543db-a686-4ba4-9f32-003c7d0ba862');
    $__env->startPush('scripts');?>


	    <script src="<?php echo e(url('js/plugins/ckeditor/ckeditor.js')); ?>"></script>
	    <script>ClassicEditor
	            .create( document.querySelector( '#ckeditor-container' ), {
	                placeholder: '<?php echo e($placeholder); ?>'
	            } )
	            .then( editor => {

	                <?php if ($old): ?>
	                    editor.setData('<?php echo str_replace("'", '', $old); ?>');
	                <?php endif;?>

                editor.ui.focusTracker.on( 'change:isFocused', ( evt, name, isFocused ) => {
                    if ( !isFocused ) {
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('<?php echo e($model); ?>', editor.getData());
                    }
                } );

            } )
            .catch( error => {

            } );
    </script>

<?php $__env->stopPush();endif;?><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/components/forms/ckeditor.blade.php ENDPATH**/?>