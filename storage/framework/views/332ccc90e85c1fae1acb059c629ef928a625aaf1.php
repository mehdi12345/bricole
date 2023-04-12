<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['label', 'placeholder', 'model', 'tags' => []]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['label', 'placeholder', 'model', 'tags' => []]); ?>
<?php foreach (array_filter((['label', 'placeholder', 'model', 'tags' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="window.XsPKiJSnOYqVlZD" @click.away="clear()" @keydown.escape="clear()">

    
    <label for="tags-input-component-id-<?php echo e($model); ?>" class="block text-xs font-medium tracking-wide <?php echo e($errors->first($model) ? 'text-red-600' : 'text-gray-700'); ?>"><?php echo e(htmlspecialchars_decode($label)); ?></label>
    
    
    <div class="mt-2 relative">

        
        <input type="text" :disabled="tags.length === maximum ? true : false" maxlength="20" x-model="value" x-ref="value" @keyup.enter="addTag(value)" id="tags-input-component-id-<?php echo e($model); ?>" placeholder="<?php echo e(htmlspecialchars_decode($placeholder)); ?>" class="block w-full text-xs rounded border-2 ltr:pr-10 ltr:pl-3 rtl:pl-10 rtl:pr-3 py-3  font-normal <?php echo e($errors->first($model) ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500'); ?>" <?php echo e($attributes); ?>>

    </div>

    
    <?php $__errorArgs = [$model];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="mt-1 text-xs text-red-600"><?php echo e($errors->first($model)); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    
    <template x-for="(tag, index) in tags">
        <div class="bg-gray-200 inline-flex items-center text-sm rounded mt-2 mr-1">
            <span class="ltr:ml-2 ltr:mr-1 rtl:mr-2 rtl:ml-1 leading-relaxed truncate max-w-xs text-xs" x-text="tag"></span>
            <button @click.prevent="removeTag(index, tag)" class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
                <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/></svg>
            </button>
        </div>
    </template>

    
    <p class="mt-1 text-xs text-gray-300"><?php echo e(__('messages.t_max_tags_letters_numbers_only', ['max' => settings("publish")->max_tags])); ?></p>

</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function XsPKiJSnOYqVlZD() {
            return {
                maximum: Number("<?php echo e(settings('publish')->max_tags); ?>"),
                value  : '',
                tags   : <?php echo \Illuminate\Support\Js::from($tags)->toHtml() ?>,
                
                addTag() {
                    if (this.value != "" && !this.hasTag(this.value) && this.isValid(this.value)) {
                        if (this.tags.length < this.maximum) {
                            window.livewire.find('<?php echo e($_instance->id); ?>').addTag(this.value)
                            this.tags.push( this.value )
                        }
                    }
                    this.clear()
                    this.$refs.value.focus()
                },
                
                hasTag(tag) {
                    var tag = this.tags.find(e => {
                        return e.toLowerCase() === tag.toLowerCase()
                    })
                    return tag != undefined
                },

                isValid(tag) {

                    const r = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

                    const regex = new RegExp(r);

                    return regex.test(tag) ? false : true;

                },

                removeTag(index, tag) {
                    window.livewire.find('<?php echo e($_instance->id); ?>').removeTag(tag)
                    this.tags.splice(index, 1)
                },
                
                clear() {
                    this.value = ''
                }
            }
        }
        window.XsPKiJSnOYqVlZD = XsPKiJSnOYqVlZD();
    </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/components/forms/tags-input.blade.php ENDPATH**/ ?>