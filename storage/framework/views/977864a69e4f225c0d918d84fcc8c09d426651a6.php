<div class="w-full" x-data="window.CQjwMygsGRWknEn" x-init="initialize">

    
    <div class="mb-6 bg-white shadow-sm rounded-md border border-b-0 border-gray-200">

        
        <div class="bg-gray-50 px-8 py-4 rounded-t-md">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-4">
                <h3 class="text-base leading-6 font-black tracking-widest text-gray-600"><?php echo e(__('messages.t_overview')); ?></h3>
                <p class="text-xs font-normal text-gray-400"><?php echo e(__('messages.t_create_gig_overview_subtitle')); ?></p>
                </div>
                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                    <a href="<?php echo e(url('/')); ?>" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500 hover:text-indigo-600 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                        <span class="text-xs font-medium text-indigo-500 hover:text-indigo-600">
                            <?php echo e(__('messages.t_back_to_homepage')); ?>

                        </span>
                    </a>
                </div>
            </div>
        </div>

        
        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 px-8 py-6">

            
            <div class="col-span-12">
                <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_i_will')).'','placeholder' => ''.e(__('messages.t_do_something_im_really_good_at')).'','model' => 'title','icon' => 'format-title']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
            </div>

            
            <div class="col-span-12 md:col-span-6">
                <label class="mb-3 block text-xs font-medium <?php echo e($errors->first('category') ? 'text-red-600 dark:text-red-500' : 'text-gray-700'); ?>"><?php echo e(__('messages.t_choose_parent_category')); ?></label>
                <div class="min-w-0">
                    <ul class="max-h-52 flex-auto space-y-1 overflow-y-auto border-2 rounded <?php echo e($errors->first('category') ? 'border-red-500' : 'border-gray-100'); ?>">

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li wire:click="$set('category', <?php echo e($cat->id); ?>)" class="group flex cursor-pointer items-center rounded-0 p-2 hover:bg-gray-50 text-gray-900 <?php echo e($category === $cat->id ? 'bg-gray-50' : ''); ?>">
                                <img src="<?php echo e(src($cat->icon)); ?>" alt="<?php echo e($cat->name); ?>" class="h-6 w-6 flex-none rounded-full">
                                <span class="ltr:ml-3 rtl:mr-3 flex-auto truncate text-xs font-medium"><?php echo e($cat->name); ?></span>
                                <div wire:loading.remove wire:target="$set('category', <?php echo e($cat->id); ?>)">
                                    <?php if($category === $cat->id): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:ml-3 rtl:mr-3 h-4 w-4 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    <?php else: ?>
                                        <svg class="ltr:ml-3 rtl:mr-3 h-4 w-4 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path> </svg>
                                    <?php endif; ?>
                                </div>

                                
                                <div wire:loading wire:target="$set('category', <?php echo e($cat->id); ?>)">
                                    <svg class="animate-spin ltr:-ml-3 rtl:-mr-3 h-4 w-4 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path> </svg>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>
                
                <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('category')); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="col-span-12 md:col-span-6">

                <label class="mb-3 block text-xs font-medium <?php echo e($errors->first('subcategory') ? 'text-red-600 dark:text-red-500' : 'text-gray-700'); ?>"><?php echo e(__('messages.t_choose_subcategory')); ?></label>
                <div class="min-w-0">
                    <ul class="max-h-52 flex-auto space-y-1 overflow-y-auto <?php echo e(count($subcategories) ? 'border-2 rounded' : ''); ?> <?php echo e($errors->first('subcategory') ? 'border-red-500' : 'border-gray-100'); ?>">

                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li wire:click="$set('subcategory', <?php echo e($subcat->id); ?>)" class="group flex cursor-pointer items-center rounded-0 p-2 hover:bg-gray-50 text-gray-900 <?php echo e($subcategory === $subcat->id ? 'bg-gray-50' : ''); ?>">
                                <img src="<?php echo e(src($subcat->icon)); ?>" alt="<?php echo e($subcat->name); ?>" class="h-6 w-6 flex-none rounded-full">
                                <span class="ltr:ml-3 rtl:mr-3 flex-auto truncate text-xs font-medium"><?php echo e($subcat->name); ?></span>
                                <div wire:loading.remove wire:target="$set('subcategory', <?php echo e($subcat->id); ?>)">
                                    <?php if($subcategory === $subcat->id): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:ml-3 rtl:mr-3 h-4 w-4 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    <?php endif; ?>
                                </div>

                                
                                <div wire:loading wire:target="$set('subcategory', <?php echo e($subcat->id); ?>)">
                                    <svg class="animate-spin ltr:-ml-3 rtl:-mr-3 h-4 w-4 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path> </svg>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>
                
                <?php $__errorArgs = ['subcategory'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('subcategory')); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>



                
                <div class="col-span-6">
                    <div class="w-full" wire:ignore>
                        <?php if (isset($component)) { $__componentOriginal5ab62038822522ce7127abea441d442e654dc54a = $component; } ?>
<?php $component = App\View\Components\Forms\Select2::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Select2::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'city','placeholder' => 'city','model' => 'ville','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($villes),'isDefer' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'isAssociative' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'componentId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->id),'value' => 'id','text' => 'name']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5ab62038822522ce7127abea441d442e654dc54a)): ?>
<?php $component = $__componentOriginal5ab62038822522ce7127abea441d442e654dc54a; ?>
<?php unset($__componentOriginal5ab62038822522ce7127abea441d442e654dc54a); ?>
<?php endif; ?>
                    </div>
                </div>


                <!--
                
                <div class="col-span-6">
                    <div  class="w-full" >
                        <?php if (isset($component)) { $__componentOriginal5ab62038822522ce7127abea441d442e654dc54a = $component; } ?>
<?php $component = App\View\Components\Forms\Select2::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Select2::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_level')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_choose_level')),'model' => 'subville','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($subvilles),'isDefer' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'isAssociative' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'componentId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->id),'value' => 'id','text' => 'name']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5ab62038822522ce7127abea441d442e654dc54a)): ?>
<?php $component = $__componentOriginal5ab62038822522ce7127abea441d442e654dc54a; ?>
<?php unset($__componentOriginal5ab62038822522ce7127abea441d442e654dc54a); ?>
<?php endif; ?>
                    </div>
                </div> -->

                <div class="relative col-span-6 <?php echo e($errors->first($subville) ? 'select2-custom-has-error' : ''); ?>">
                    <label class="text-xs font-medium block mb-2 <?php echo e($errors->first($subville) ? 'text-red-600 dark:text-red-500' : 'text-gray-700'); ?>">area</label>
                        <select data-pharaonic="select2"  wire:model="subville"
                        data-search-off
                        data-dir="<?php echo e(config()->get('direction')); ?>"
                        style="padding: 8px 12px; background-color : #fff;
                        cursor: pointer;
                        border-radius:4px;
                        border-color:#ddd;
                        border-width:2px;
                        height: 44px;
                        width :100%;
                        "
                        >
                        <option value=""  ></option>

                            <?php $__currentLoopData = $subvilles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($option->id); ?>"  ><?php echo e($option->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                </div>





            
            <div class="col-span-12">
                <?php if (isset($component)) { $__componentOriginal7ee88f02626e20054c4176b73b6e91edd1dbd7f1 = $component; } ?>
<?php $component = App\View\Components\Forms\Ckeditor::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.ckeditor'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Ckeditor::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_description')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_briefly_describe_ur_gig')),'model' => 'description']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7ee88f02626e20054c4176b73b6e91edd1dbd7f1)): ?>
<?php $component = $__componentOriginal7ee88f02626e20054c4176b73b6e91edd1dbd7f1; ?>
<?php unset($__componentOriginal7ee88f02626e20054c4176b73b6e91edd1dbd7f1); ?>
<?php endif; ?>
            </div>

            <!-- 
            <div class="col-span-12">
                <?php if (isset($component)) { $__componentOriginal39da43f5830badd91100c9e95088a9208fbc01db = $component; } ?>
<?php $component = App\View\Components\Forms\TagsInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tags-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TagsInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_search_tags')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_press_enter_to_add_tags')),'model' => 'tags','tags' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tags)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39da43f5830badd91100c9e95088a9208fbc01db)): ?>
<?php $component = $__componentOriginal39da43f5830badd91100c9e95088a9208fbc01db; ?>
<?php unset($__componentOriginal39da43f5830badd91100c9e95088a9208fbc01db); ?>
<?php endif; ?>
            </div> -->

        </div>

    </div>

    <!-- 
    <div class="mb-6 bg-white shadow-sm rounded-md border border-b-0 border-gray-200">

        
        <div class="bg-gray-50 px-8 py-4" :class="seo.is_enabled ? 'rounded-t-md' : 'rounded-md'">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-4">
                <h3 class="text-base leading-6 font-black tracking-widest text-gray-600"><?php echo e(__('messages.t_seo')); ?></h3>
                <p class="text-xs font-normal text-gray-400"><?php echo e(__('messages.t_search_engine_gig_preview')); ?></p>
                </div>
                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                    <button x-on:click="seo.is_enabled = !seo.is_enabled" type="button" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500 hover:text-indigo-600 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
                        <span class="text-xs font-medium text-indigo-500 hover:text-indigo-600">
                            <?php echo e(__('messages.t_upgrade_seo')); ?>

                        </span>
                    </button>
                </div>
            </div>
        </div>

        
        <div class="px-8 py-6" x-show="seo.is_enabled">
            <div class="w-full flex flex-col justify-center">
                <div class="relative">
                    <div class="grid sm:grid-cols-2 gap-4">

                        
                        <div class="border-b sm:border-b-0 sm:border-r sm:pr-12 relative pb-12 sm:mb-0">
                            <div class="w-full space-y-6">

                                
                                <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_seo_title')).'','placeholder' => ''.e(__('messages.t_enter_seo_title')).'','model' => 'seo_title','icon' => 'google','x-model' => 'seo.title','maxlength' => '100']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>

                                
                                <?php if (isset($component)) { $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11 = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_seo_description')).'','placeholder' => ''.e(__('messages.t_enter_seo_description')).'','model' => 'seo_description','icon' => 'folder-text','rows' => '6','x-model' => 'seo.description','maxlength' => '150']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11; ?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11); ?>
<?php endif; ?>

                            </div>

                            
                            <div class="hidden sm:block absolute right-0 transform translate-x-7 top-1/2 -translate-y-7">
                                <p class="font-bold text-gray-500 rounded-full bg-gray-50 flex items-center justify-center text-xs" style="height: 50px; width: 50px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                </p>
                            </div>
                            <div class="sm:hidden absolute transform bottom-0 left-1/2 translate-y-6 -translate-x-7">
                                <p class="font-bold text-gray-500 rounded-full bg-gray-50 flex items-center justify-center text-xs" style="height: 50px; width: 50px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                </p>
                            </div>
                        </div>

                        
                        <div class="pt-6 sm:pt-8 sm:px-8 sm:pb-8 flex items-center justify-start sm:!justify-center">

                            <template x-if="seo.title && seo.description">
                                <div class="relative max-w-full">
                                    <span class="text-xs font-normal truncate block text-green-700" x-text="seoUrlPreview"></span>
                                    <h2 class="text-sm text-indigo-700 font-medium truncate block" x-text="seo.title"></h2>
                                    <div class="text-xs text-gray-600 font-normal pt-1">
                                        <span class="text-gray-400" x-text="today"></span> — <span x-text="seo.description"></span>
                                    </div>
                                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                                        <div class="mt-2 flex items-center text-sm text-gray-500">

                                            
                                            <div class="flex items-center flex-shrink-0">
                                                <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                                <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                                <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                                <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                                <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                            </div>

                                            <div class="text-xs font-normal text-gray-400 ml-2">
                                                4.8 <span class="px-1">•</span> 702 <?php echo e(strtolower(__('messages.t_reviews'))); ?> <span class="px-1">•</span> $5.00
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </template>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
    <div class="mb-6 bg-white shadow-sm rounded-md border border-b-0 border-gray-200">

        
        <div class="bg-gray-50 px-8 py-4 <?php echo e(count($faqs) ? 'rounded-t-md' : 'rounded-md'); ?>">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-4">
                    <h3 class="text-base leading-6 font-black tracking-widest text-gray-600"><?php echo e(__('messages.t_faq')); ?></h3>
                    <p class="text-xs font-normal text-gray-400"><?php echo e(__('messages.t_create_gig_faq_subtitle')); ?></p>
                </div>
                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                    <button id="modal-add-service-faq-button" type="button" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500 hover:text-indigo-600 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        <span class="text-xs font-medium text-indigo-500 hover:text-indigo-600">
                            <?php echo e(__('messages.t_add_faq')); ?>

                        </span>
                    </button>
                </div>
            </div>
        </div>

        
        <?php if(count($faqs)): ?>
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 p-8">
                <div class="col-span-12">
                    <div class="space-y-4">

                        
                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <details class="px-6 py-4 rounded-lg bg-gray-50 group relative" wire:key="faq-list-id-<?php echo e($key); ?>">
                                <summary class="flex items-center justify-between cursor-pointer focus:outline-none">

                                    
                                    <h5 class="text-sm font-medium text-gray-900 focus:outline-none flex items-center">
                                        <?php echo e($faq['question']); ?>

                                        <button wire:click="removeFaq(<?php echo e($key); ?>)" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                            <span class="text-xs font-medium text-red-500 hover:text-red-600">
                                                <?php echo e(__('messages.t_remove')); ?>

                                            </span>
                                        </button>
                                    </h5>

                                    <span class="relative flex-shrink-0 ml-1.5 w-5 h-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-5 h-5 opacity-100 group-open:opacity-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" > <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/> </svg>

                                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-5 h-5 opacity-0 group-open:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" > <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/> </svg>
                                    </span>
                                </summary>

                                <p class="mt-4 leading-relaxed text-gray-700 text-xs">
                                    <?php echo e($faq['answer']); ?>

                                </p>
                            </details>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div> -->

    
    <div class="flex justify-end">
        <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'save','text' => ''.e(__('messages.t_save_and_continue')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-add-service-faq-container','target' => 'modal-add-service-faq-button','uid' => 'modal_'.e(uid()).'','placement' => 'center-center','size' => 'max-w-md']); ?>

        
         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_add_faq')); ?> <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('content', null, []); ?> 
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                
                <div class="col-span-12">
                    <div class="mt-2 relative">
                        <input type="text" placeholder="<?php echo e(__('messages.t_faq_question_example')); ?>" wire:model.defer="question" class="block w-full text-xs rounded border-2 pr-10 py-3 pl-3 font-normal <?php echo e($errors->first('question') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500'); ?>" maxlength="100">
                        
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="mdi mdi-file-question <?php echo e($errors->first('question') ? 'text-red-400' : 'text-gray-400'); ?>"></i>
                        </div>
                    </div>

                    
                    <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('question')); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="col-span-12">
                    <div>
                        <div class="relative">
                            <textarea placeholder="<?php echo e(__('messages.t_faq_answer_example')); ?>" wire:model.defer="answer" rows="8" class="block w-full text-xs rounded border-2 pr-10 py-3 pl-3 font-normal resize-none <?php echo e($errors->first('answer') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500'); ?>" maxlength="300"></textarea>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="mdi mdi-receipt-text-check <?php echo e($errors->first('answer') ? 'text-red-400' : 'text-gray-400'); ?>"></i>
                            </div>
                        </div>

                        
                        <?php $__errorArgs = ['answer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('answer')); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

            </div>
         <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('footer', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'addFaq','text' => ''.e(__('messages.t_add')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
         <?php $__env->endSlot(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f)): ?>
<?php $component = $__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f; ?>
<?php unset($__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f); ?>
<?php endif; ?>

</div>

<?php $__env->startPush('scripts'); ?>

    
    <script src="https://cdn.jsdelivr.net/npm/slugify@1.6.5/slugify.min.js"></script>

    
    <script>
        function CQjwMygsGRWknEn() {
            return {
                seo: {
                    is_enabled : false,
                    title      : null,
                    description: null
                },

                // Initialize
                initialize() {

                },

                // Get seo today date
                today() {
                    const date     = new Date();
                    const strArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    const d        = date.getDate();
                    const m        = strArray[date.getMonth()];
                    const y        = date.getFullYear();
                    return '' + m + ' ' + (d <= 9 ? '0' + d : d) + ', ' + y;
                },

                // Set seo url preview
                seoUrlPreview() {
                    if (this.seo.title) {
                        return "<?php echo e(url('service')); ?>/" + slugify(this.seo.title)
                    }
                }
            }
        }
        window.CQjwMygsGRWknEn = CQjwMygsGRWknEn();
    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH D:\bricole-latest\bricole\resources\views/livewire/main/create/steps/overview.blade.php ENDPATH**/ ?>