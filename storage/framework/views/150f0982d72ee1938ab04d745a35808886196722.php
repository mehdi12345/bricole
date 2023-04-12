<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['label', 'model', 'hidelabel' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['label', 'model', 'hidelabel' => false]); ?>
<?php foreach (array_filter((['label', 'model', 'hidelabel' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if(!$hidelabel): ?>
    <label for="" class="opacity-0"><?php echo e($label); ?></label>
<?php endif; ?>
<div class="relative flex items-center border-2 rounded p-3 h-11 <?php echo e($errors->first($model) ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 focus:ring-indigo-500 focus:border-indigo-500'); ?>">
    
    <div class="flex items-center h-5">
        <input id="checkbox-input-component-id-<?php echo e($model); ?>" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" wire:model.defer="<?php echo e($model); ?>">
    </div>

    
    <div class="ltr:ml-3 rtl:mr-3 text-xs">
        <label for="checkbox-input-component-id-<?php echo e($model); ?>" class="font-medium text-xs cursor-pointer <?php echo e($errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-gray-500'); ?>"><?php echo e($label); ?></label>
    </div>

    
    <?php $__errorArgs = [$model];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first($model)); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/components/forms/checkbox.blade.php ENDPATH**/ ?>