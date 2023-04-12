<?php $attributes??=new \Illuminate\View\ComponentAttributeBag;?>
<?php foreach ($attributes->onlyProps(['label', 'placeholder', 'model', 'icon', 'rows' => 8]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}?>
<?php $attributes = $attributes->exceptProps(['label', 'placeholder', 'model', 'icon', 'rows' => 8]);?>
<?php foreach (array_filter((['label', 'placeholder', 'model', 'icon', 'rows' => 8]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}?>
<?php $__defined_vars = get_defined_vars();?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) {
        unset($$__key);
    }

}?>
<?php unset($__defined_vars);?>

<div>


    <label for="textarea-input-component-id-<?php echo e($model); ?>" class="block text-xs font-medium <?php echo e($errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-gray-700'); ?>"><?php echo e(htmlspecialchars_decode($label)); ?></label>


    <div class="mt-2 relative">


        <textarea placeholder="<?php echo e(htmlspecialchars_decode($placeholder)); ?>" wire:model.defer="<?php echo e($model); ?>" rows="<?php echo e($rows); ?>" id="textarea-input-component-id-<?php echo e($model); ?>" class="block w-full text-xs rounded border-2 ltr:pr-10 ltr:pl-3 rtl:pl-10 rtl:pr-3 py-3  font-normal resize-none <?php echo e($errors->first($model) ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500'); ?>" <?php echo e($attributes); ?>></textarea>


        <div class="absolute inset-y-0 ltr:right-0 ltr:pr-3 rtl:left-0 rtl:pl-3 flex items-center pointer-events-none">
            <i class="mdi mdi-<?php echo e($icon); ?> <?php echo e($errors->first($model) ? 'text-red-400' : 'text-gray-400'); ?>"></i>
        </div>

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

</div><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/components/forms/textarea.blade.php ENDPATH**/?>