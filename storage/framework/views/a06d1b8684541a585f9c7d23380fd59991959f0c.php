<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['id', 'extensions', 'accept', 'size', 'max', 'model']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['id', 'extensions', 'accept', 'size', 'max', 'model']); ?>
<?php foreach (array_filter((['id', 'extensions', 'accept', 'size', 'max', 'model']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="window.uploader_<?php echo e($id); ?>" x-init="initialize" x-cloak>
    <input type="file" name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" accept="<?php echo e($accept); ?>" multiple>
</div>

<?php if (! $__env->hasRenderedOnce('e2b1e824-3f1f-4a2b-bf7f-7486853600af')): $__env->markAsRenderedOnce('e2b1e824-3f1f-4a2b-bf7f-7486853600af');
$__env->startPush('scripts'); ?>
    
    <script src="<?php echo e(url('js/plugins/uploader/js/jquery.fileuploader.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('48929a73-9bf7-432d-9f52-b6ef0e15c2bb')): $__env->markAsRenderedOnce('48929a73-9bf7-432d-9f52-b6ef0e15c2bb');
$__env->startPush('styles'); ?>
    
    <link href="<?php echo e(url('js/plugins/uploader/font/font-fileuploader.css')); ?>" rel="stylesheet">

    
    <link href="<?php echo e(url('js/plugins/uploader/css/jquery.fileuploader.min.css')); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(url('js/plugins/uploader/css/jquery.fileuploader-theme-thumbnails.css')); ?>" media="all" rel="stylesheet">
<?php $__env->stopPush(); endif; ?>

<?php $__env->startPush('scripts'); ?>

    
    <script>
        function uploader_<?php echo e($id); ?>() {
            return {

                files: [],

                // Initialize
                initialize() {

                    const _this = this;

                    $('#<?php echo e($id); ?>').fileuploader({
                        extensions : <?php echo \Illuminate\Support\Js::from($extensions)->toHtml() ?>,
                        fileMaxSize: <?php echo \Illuminate\Support\Js::from($size)->toHtml() ?>,
                        limit      : <?php echo \Illuminate\Support\Js::from($max)->toHtml() ?>,
                        changeInput: ' ',
                        theme      : 'thumbnails',
                        enableApi  : true,
                        addMore    : true,
                        thumbnails : {
                            box: '<div class="fileuploader-items">' +
                                    '<ul class="fileuploader-items-list">' +
                                        '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><i>+</i></div></li>' +
                                    '</ul>' +
                                '</div>',
                            item: '<li class="fileuploader-item">' +
                                    '<div class="fileuploader-item-inner">' +
                                        '<div class="type-holder">${extension}</div>' +
                                        '<div class="actions-holder">' +
                                            '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                                        '</div>' +
                                        '<div class="thumbnail-holder">' +
                                            '${image}' +
                                            '<span class="fileuploader-action-popup"></span>' +
                                        '</div>' +
                                        '<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
                                        '<div class="progress-holder">${progressBar}</div>' +
                                    '</div>' +
                                '</li>',
                            item2: '<li class="fileuploader-item">' +
                                    '<div class="fileuploader-item-inner">' +
                                        '<div class="type-holder">${extension}</div>' +
                                        '<div class="actions-holder">' +
                                            '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i class="fileuploader-icon-download"></i></a>' +
                                            '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                                        '</div>' +
                                        '<div class="thumbnail-holder">' +
                                            '${image}' +
                                            '<span class="fileuploader-action-popup"></span>' +
                                        '</div>' +
                                        '<div class="content-holder"><h5 title="${name}">${name}</h5><span>${size2}</span></div>' +
                                        '<div class="progress-holder">${progressBar}</div>' +
                                    '</div>' +
                                '</li>',
                            startImageRenderer: true,
                            canvasImage: false,
                            _selectors: {
                                list: '.fileuploader-items-list',
                                item: '.fileuploader-item',
                                start: '.fileuploader-action-start',
                                retry: '.fileuploader-action-retry',
                                remove: '.fileuploader-action-remove'
                            },
                            onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
                                var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                                    api = $.fileuploader.getInstance(inputEl.get(0));
                                
                                plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();
                                
                                if(item.format == 'image') {
                                    item.html.find('.fileuploader-item-icon').hide();
                                }
                            },
                            onItemRemove: function(html, listEl, parentEl, newInputEl, inputEl) {
                                var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                                    api = $.fileuploader.getInstance(inputEl.get(0));
                            
                                html.children().animate({'opacity': 0}, 200, function() {
                                    html.remove();
                                    
                                    if (api.getOptions().limit && api.getChoosedFiles().length - 1 < api.getOptions().limit)
                                        plusInput.show();
                                });
                            }
                        },
                        dragDrop   : {
                            container: '.fileuploader-thumbnails-input'
                        },
                        afterRender: function(listEl, parentEl, newInputEl, inputEl) {
                            var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                                api = $.fileuploader.getInstance(inputEl.get(0));
                        
                            plusInput.on('click', function() {
                                api.open();
                            });
                            
                            api.getOptions().dragDrop.container = plusInput;
                        },

                        onSelect: function(item, listEl, parentEl, newInputEl, inputEl) {

                            // Get file
                            const file = item.file;

                            window.livewire.find('<?php echo e($_instance->id); ?>').upload('<?php echo e($model); ?>', file, (uploadedFilename) => {

                                // Set file details
                                const details = {
                                    local : item.name,
                                    server: uploadedFilename
                                }

                                // Add to files
                                _this.files.push(details);
                                
                            }, () => {

                                // Get api
                                api = $.fileuploader.getInstance(inputEl.get(0));

                                // Remove item
                                api.remove(item);

                                // Error
                                window.toast("<?php echo e(__('messages.t_error_while_uploading_your_file')); ?>", 'error');
                            });
                            
                        },

                        // Remove file
                        onRemove: function(item) {

                            // Get file name from server
                            const data = _this.files.find(file => file.local === item.name);

                            // Remove file
                            window.livewire.find('<?php echo e($_instance->id); ?>').removeUpload('<?php echo e($model); ?>', data.server, () => {
                                // Success
                                window.toast("<?php echo e(__('messages.t_file_has_been_successfully_deleted')); ?>", 'success');
                            });

                        }

                    });
                }

            }
        }
        window.uploader_<?php echo e($id); ?> = uploader_<?php echo e($id); ?>();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/components/forms/uploader.blade.php ENDPATH**/ ?>