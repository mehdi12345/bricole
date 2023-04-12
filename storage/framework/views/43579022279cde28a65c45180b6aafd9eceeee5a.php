<div class="relative w-full mx-auto" x-data="window.LjqGJmYrwJSjIHT">


    <?php if($gig->owner->availability): ?>
        <div class="rounded-md bg-amber-100 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                </div>
                <div class="ltr:ml-3 rtl:mr-3">
                    <h3 class="text-sm font-bold text-amber-800"><?php echo e(__('messages.t_attention_needed')); ?></h3>
                    <div class="mt-2 text-xs font-normal text-amber-700">
                        <p>
                            <?php echo __('messages.t_seller_wont_be_able_to_receive_orders_date', ['date' => format_date($gig->owner->availability->expected_available_date, 'F j, Y')]); ?>

                        </p>
                        <p class="border-l-4 pl-2 border-amber-500 mt-4">
                            <?php echo e($gig->owner->availability->message); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
    <?php if($gig->status === 'pending'): ?>
        <div class="bg-yellow-100 ltr:border-l-4 rtl:border-r-4 border-yellow-400 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                </div>
                <div class="ltr:ml-3 rtl:mr-3">
                    <p class="text-sm text-yellow-700 font-medium">
                        <?php echo e(__('messages.t_this_gig_not_activated_yet')); ?>

                    </p>
                </div>
            </div>
        </div>
    <?php endif; ?>


    
    <div class="bg-white shadow-sm ring-1 ring-gray-100 border border-gray-50 rounded-xl px-4 py-4 lg:px-12 lg:py-12">

        
        <div class="w-full mb-0 md:mb-12">

            
            <div class="md:flex items-center justify-between mb-0 md:mb-6">

                
                <nav class="hidden md:flex" aria-label="Breadcrumb">
                    <ol role="list" class="md:flex items-center space-x-2 rtl:space-x-reverse">

                        
                        <li>
                            <div>
                                <a href="<?php echo e(url('/')); ?>" class="text-gray-400 hover:text-gray-600">
                                    <svg class="flex-shrink-0 h-5 w-5 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/> </svg>
                                    <span class="sr-only">Home</span>
                                </a>
                            </div>
                        </li>

                        
                        <li>
                            <div class="flex items-center">

                                <svg class="hidden ltr:block flex-shrink-0 h-4 w-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/> </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-4 w-4 text-gray-300" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                <a href="<?php echo e(url('categories', $gig->category->slug)); ?>" class="ltr:ml-2 rtl:mr-2 text-sm font-medium text-gray-400 hover:text-gray-600"><?php echo e($gig->category->name); ?></a>
                            </div>
                        </li>

                        
                        <li>
                            <div class="flex items-center">

                                <svg class="hidden ltr:block flex-shrink-0 h-4 w-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/> </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-4 w-4 text-gray-300" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                <a href="<?php echo e(url('categories/' . utf8_decode(urldecode($gig->category->slug . '/' . $gig->subcategory->slug)))); ?>" class="ltr:ml-2 rtl:mr-2 text-sm font-medium text-gray-400 hover:text-gray-600" aria-current="page"><?php echo e($gig->subcategory->name); ?></a>
                            </div>
                        </li>

                    </ol>
                </nav>

                
                <div class="hidden items-center md:!grid">
                    <span class="uppercase text-[10px] text-gray-400 mb-1 tracking-widest"><?php echo e(__('messages.t_starting_at')); ?></span>
                    <span class="text-black !font-['Lato'] text-2xl tracking-wide font-black"><?php echo e($this->total() + $this->taxes()); ?> DH </span>

                </div>

            </div>

        </div>
    </div>
    <br />


<!--
    
    <?php if($related_gigs): ?>
        <div class="mt-12 sm:mt-24" wire:ignore>

            
            <div class="flex justify-between mb-6">

                <div class="ltr:border-l-8 rtl:border-r-8 border-indigo-600 ltr:pl-4 rtl:pr-4">
                    <span class="font-extrabold text-base text-gray-900 pb-1 tracking-wide block"><?php echo e(__('messages.t_you_may_also_like')); ?></span>
                    <p class="text-sm text-gray-500"><?php echo e(__('messages.t_u_may_also_like_the_following_gigs')); ?></p>
                </div>

                <div class="hidden md:block">

                    
                    <?php if(config()->get('direction') === 'ltr'): ?>

                        
                        <button id="related-gigs-prev-btn" class="h-8 w-8 rounded-tl-md rounded-bl-md bg-indigo-600 hover:bg-indigo-500 text-white">
                            <i class="mdi mdi-chevron-left"></i>
                        </button>

                        
                        <button id="related-gigs-next-btn" class="h-8 w-8 rounded-tr-md rounded-br-md bg-indigo-600 hover:bg-indigo-500 text-white">
                            <i class="mdi mdi-chevron-right"></i>
                        </button>

                    <?php else: ?>

                        
                        <button id="related-gigs-prev-btn" class="h-8 w-8 rounded-tr-md rounded-br-md bg-indigo-600 hover:bg-indigo-500 text-white">
                            <i class="mdi mdi-chevron-right"></i>
                        </button>

                        
                        <button id="related-gigs-next-btn" class="h-8 w-8 rounded-tl-md rounded-bl-md bg-indigo-600 hover:bg-indigo-500 text-white">
                            <i class="mdi mdi-chevron-left"></i>
                        </button>

                    <?php endif; ?>

                </div>

            </div>

            
            <div id="slick-related-gigs" class="-mx-3" wire:ignore>
                <?php $__currentLoopData = $related_gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    
                    <div class="mx-3">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered("related-gigs-item-" . $gig->uid)) {
    $componentId = $_instance->getRenderedChildComponentId("related-gigs-item-" . $gig->uid);
    $componentTag = $_instance->getRenderedChildComponentTagName("related-gigs-item-" . $gig->uid);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild("related-gigs-item-" . $gig->uid);
} else {
    $response = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild("related-gigs-item-" . $gig->uid, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    <?php endif; ?>

    
    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->id() !== $gig->user_id): ?>
            <?php if (isset($component)) { $__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modals-report-container','target' => 'modals-report-btn','uid' => 'modal_'.e(uid()).'','placement' => 'center-center','size' => 'max-w-md']); ?>

                
                 <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_report_this_gig')); ?> <?php $__env->endSlot(); ?>

                
                 <?php $__env->slot('content', null, []); ?> 
                    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                        
                        <div class="col-span-12">
                            <?php if (isset($component)) { $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11 = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_reason')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_let_us_know_why_u_report_this_gig')),'model' => 'reason','icon' => 'folder-question','maxlength' => '500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11; ?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11); ?>
<?php endif; ?>
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
<?php $component->withAttributes(['action' => 'report','text' => ''.e(__('messages.t_report')).'']); ?>
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
        <?php endif; ?>
    <?php endif; ?> -->
<!--
    
    <?php if (isset($component)) { $__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modals-share-container','target' => 'modals-share-btn','uid' => 'modal_'.e(uid()).'','placement' => 'center-center','size' => 'max-w-2xl']); ?>

        
         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_share_this_gig')); ?> <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('content', null, []); ?> 
            <div class="flex items-center justify-center">

                
                <div class="grid items-center justify-center mx-4">
                    <a href="https://www.facebook.com/share.php?u=<?php echo e(url('service', $gig->slug)); ?>&t=<?php echo e($gig->title); ?>" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#3b5998] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M374.244,285.825l14.105,-91.961l-88.233,0l0,-59.677c0,-25.159 12.325,-49.682 51.845,-49.682l40.116,0l0,-78.291c0,0 -36.407,-6.214 -71.213,-6.214c-72.67,0 -120.165,44.042 -120.165,123.775l0,70.089l-80.777,0l0,91.961l80.777,0l0,222.31c16.197,2.541 32.798,3.865 49.709,3.865c16.911,0 33.511,-1.324 49.708,-3.865l0,-222.31l74.128,0Z"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_facebook')); ?></span>
                </div>

                
                <div class="grid items-center justify-center mx-4">
                    <a href="https://twitter.com/intent/tweet?text=<?php echo e($gig->title); ?>%20-%20<?php echo e(url('service', $gig->slug)); ?>%20" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#1da1f2] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M161.014,464.013c193.208,0 298.885,-160.071 298.885,-298.885c0,-4.546 0,-9.072 -0.307,-13.578c20.558,-14.871 38.305,-33.282 52.408,-54.374c-19.171,8.495 -39.51,14.065 -60.334,16.527c21.924,-13.124 38.343,-33.782 46.182,-58.102c-20.619,12.235 -43.18,20.859 -66.703,25.498c-19.862,-21.121 -47.602,-33.112 -76.593,-33.112c-57.682,0 -105.145,47.464 -105.145,105.144c0,8.002 0.914,15.979 2.722,23.773c-84.418,-4.231 -163.18,-44.161 -216.494,-109.752c-27.724,47.726 -13.379,109.576 32.522,140.226c-16.715,-0.495 -33.071,-5.005 -47.677,-13.148l0,1.331c0.014,49.814 35.447,93.111 84.275,102.974c-15.464,4.217 -31.693,4.833 -47.431,1.802c13.727,42.685 53.311,72.108 98.14,72.95c-37.19,29.227 -83.157,45.103 -130.458,45.056c-8.358,-0.016 -16.708,-0.522 -25.006,-1.516c48.034,30.825 103.94,47.18 161.014,47.104" style="fill-rule:nonzero;"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_twitter')); ?></span>
                </div>

                
                <div class="grid items-center justify-center mx-4">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(url('service', $gig->slug)); ?>&title=<?php echo e($gig->title); ?>&summary=<?php echo e($gig->title); ?>" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#0a66c2] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M473.305,-1.353c20.88,0 37.885,16.533 37.885,36.926l0,438.251c0,20.393 -17.005,36.954 -37.885,36.954l-436.459,0c-20.839,0 -37.773,-16.561 -37.773,-36.954l0,-438.251c0,-20.393 16.934,-36.926 37.773,-36.926l436.459,0Zm-37.829,436.389l0,-134.034c0,-65.822 -14.212,-116.427 -91.12,-116.427c-36.955,0 -61.739,20.263 -71.867,39.476l-1.04,0l0,-33.411l-72.811,0l0,244.396l75.866,0l0,-120.878c0,-31.883 6.031,-62.773 45.554,-62.773c38.981,0 39.468,36.461 39.468,64.802l0,118.849l75.95,0Zm-284.489,-244.396l-76.034,0l0,244.396l76.034,0l0,-244.396Zm-37.997,-121.489c-24.395,0 -44.066,19.735 -44.066,44.047c0,24.318 19.671,44.052 44.066,44.052c24.299,0 44.026,-19.734 44.026,-44.052c0,-24.312 -19.727,-44.047 -44.026,-44.047Z" style="fill-rule:nonzero;"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_linkedin')); ?></span>
                </div>

                
                <div class="grid items-center justify-center mx-4">
                    <a href="https://api.whatsapp.com/send?text=<?php echo e($gig->title); ?>%20<?php echo e(url('service', $gig->slug)); ?>" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#25d366] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M373.295,307.064c-6.37,-3.188 -37.687,-18.596 -43.526,-20.724c-5.838,-2.126 -10.084,-3.187 -14.331,3.188c-4.246,6.376 -16.454,20.725 -20.17,24.976c-3.715,4.251 -7.431,4.785 -13.8,1.594c-6.37,-3.187 -26.895,-9.913 -51.225,-31.616c-18.935,-16.89 -31.72,-37.749 -35.435,-44.126c-3.716,-6.377 -0.397,-9.824 2.792,-13c2.867,-2.854 6.371,-7.44 9.555,-11.16c3.186,-3.718 4.247,-6.377 6.37,-10.626c2.123,-4.252 1.062,-7.971 -0.532,-11.159c-1.591,-3.188 -14.33,-34.542 -19.638,-47.298c-5.171,-12.419 -10.422,-10.737 -14.332,-10.934c-3.711,-0.184 -7.963,-0.223 -12.208,-0.223c-4.246,0 -11.148,1.594 -16.987,7.969c-5.838,6.377 -22.293,21.789 -22.293,53.14c0,31.355 22.824,61.642 26.009,65.894c3.185,4.252 44.916,68.59 108.816,96.181c15.196,6.564 27.062,10.483 36.312,13.418c15.259,4.849 29.145,4.165 40.121,2.524c12.238,-1.827 37.686,-15.408 42.995,-30.286c5.307,-14.882 5.307,-27.635 3.715,-30.292c-1.592,-2.657 -5.838,-4.251 -12.208,-7.44m-116.224,158.693l-0.086,0c-38.022,-0.015 -75.313,-10.23 -107.845,-29.535l-7.738,-4.592l-80.194,21.037l21.405,-78.19l-5.037,-8.017c-21.211,-33.735 -32.414,-72.726 -32.397,-112.763c0.047,-116.825 95.1,-211.87 211.976,-211.87c56.595,0.019 109.795,22.088 149.801,62.139c40.005,40.05 62.023,93.286 62.001,149.902c-0.048,116.834 -95.1,211.889 -211.886,211.889m180.332,-392.224c-48.131,-48.186 -112.138,-74.735 -180.335,-74.763c-140.514,0 -254.875,114.354 -254.932,254.911c-0.018,44.932 11.72,88.786 34.03,127.448l-36.166,132.102l135.141,-35.45c37.236,20.31 79.159,31.015 121.826,31.029l0.105,0c140.499,0 254.87,-114.366 254.928,-254.925c0.026,-68.117 -26.467,-132.166 -74.597,-180.352" id="WhatsApp-Logo"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_whatsapp')); ?></span>
                </div>

                
                <div class="grid items-center justify-center mx-4">
                    <button type="button" x-on:click="copy" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-gray-400 focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title/><path d="M17.3,13.35a1,1,0,0,1-.7-.29,1,1,0,0,1,0-1.41l2.12-2.12a2,2,0,0,0,0-2.83L17.3,5.28a2.06,2.06,0,0,0-2.83,0L12.35,7.4A1,1,0,0,1,10.94,6l2.12-2.12a4.1,4.1,0,0,1,5.66,0l1.41,1.41a4,4,0,0,1,0,5.66L18,13.06A1,1,0,0,1,17.3,13.35Z" /><path d="M8.11,21.3a4,4,0,0,1-2.83-1.17L3.87,18.72a4,4,0,0,1,0-5.66L6,10.94A1,1,0,0,1,7.4,12.35L5.28,14.47a2,2,0,0,0,0,2.83L6.7,18.72a2.06,2.06,0,0,0,2.83,0l2.12-2.12A1,1,0,1,1,13.06,18l-2.12,2.12A4,4,0,0,1,8.11,21.3Z" /><path d="M8.82,16.18a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42l6.37-6.36a1,1,0,0,1,1.41,0,1,1,0,0,1,0,1.42L9.52,15.89A1,1,0,0,1,8.82,16.18Z" /></svg>
                    </button>
                    <template x-if="!isCopied">
                        <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_copy_link')); ?></span>
                    </template>
                    <template x-if="isCopied">
                        <span class="uppercase font-normal text-xs text-green-500 mt-4 tracking-widest"><?php echo e(__('messages.t_copied')); ?></span>
                    </template>
                </div>

            </div>
         <?php $__env->endSlot(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f)): ?>
<?php $component = $__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f; ?>
<?php unset($__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f); ?>
<?php endif; ?> -->

    <div class="grid grid-cols-12 md:gap-x-10 gap-y-10">

        <!-- 
        <?php if(session()->has('error')): ?>
            <div class="col-span-12">
                <div class="rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/> </svg>
                        </div>
                        <div class="ltr:ml-3 rtl:mr-3">
                            <h3 class="text-sm font-medium text-red-800">
                                <?php echo e(session()->get('error')); ?>

                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
 -->





        
        <div class="col-span-12 lg:col-span-7">
            <div class="mb-6 bg-white shadow-sm rounded-lg border border-gray-200">

                
                <div class="bg-gray-50 px-8 py-4 rounded-t-lg">
                    <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-sm leading-6 font-black tracking-wide text-gray-800"><?php echo e(__('messages.t_invoice')); ?></h3>
                            <p class="text-sm font-normal text-gray-400"><?php echo e(__('messages.t_enter_ur_billing_infor_below')); ?></p>
                        </div>

                    </div>
                </div>

                
                <div class="grid grid-cols-12 md:gap-x-6 gap-y-6 px-8 pt-6 pb-10">

                    
                    <div class="col-span-12 md:col-span-6">
                        <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_firstname')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_firstname')),'model' => 'firstname','icon' => 'account']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="col-span-12 md:col-span-6">
                        <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_lastname')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_lastname')),'model' => 'lastname','icon' => 'account']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_email_address')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_email_address')),'model' => 'email','type' => 'email','icon' => 'at']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_company')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_company_optional')),'model' => 'company','icon' => 'domain']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_address')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_address')),'model' => 'address','icon' => 'map-marker']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                    </div>

                </div>

            </div>
        </div>

        
        <div class="col-span-12 lg:col-span-5">

            
            <div class="mb-6 bg-white shadow-sm rounded-lg border border-gray-200">
                <div class="px-8 py-6">

                    <div class="flex items-center justify-between">
                        <h2 class="text-sm font-medium text-gray-900"><?php echo e(__('messages.t_select_payment_method')); ?></h2>
                        <span class="text-sm font-black text-indigo-600 hover:text-indigo-500 font-[Lato]">
                         <?php echo e($this->total() + $this->taxes()); ?> DH
                        </span>
                    </div>

                    <fieldset class="mt-8">
                        <legend class="sr-only"><?php echo e(__('messages.t_payment_method')); ?></legend>
                        <div class="space-y-4">

                            <!-- 
                            <?php if(settings('gateways')->is_stripe): ?>
                                <label class="relative block bg-white border rounded-md shadow-sm cursor-pointer focus:outline-none border-gray-300 items-center" :class="payment_method === 'stripe' ? 'border-gray-300' : 'border-transparent'">

                                    
                                    <input type="radio" x-model="payment_method" name="payment_method" value="stripe" class="sr-only">

                                    
                                    <div class="flex justify-between px-6 py-5 items-center rounded-t-md" :class="payment_method === 'stripe' ? 'bg-slate-50' : 'bg-transparent'">

                                        
                                        <div class="flex items-center">
                                            <div class="text-sm">
                                                <p class="font-medium text-gray-900">
                                                    <?php echo e(__('messages.t_stripe')); ?>

                                                </p>
                                            </div>
                                        </div>

                                        
                                        <?php if($payment_method === 'stripe'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif; ?>

                                    </div>

                                    
                                    <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true" :class="payment_method === 'stripe' ? 'border-slate-100 border-2' : 'border border-transparent'"></div>

                                    
                                    <div class="w-full py-5 px-6" style="display: none;" x-show="payment_method == 'stripe'">
                                        <div class="grid grid-cols-12 gap-y-5 md:gap-x-6">

                                            
                                            <div class="col-span-12">
                                                <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_name_on_card')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_name_credit_card')),'model' => 'stripe.card_name','icon' => 'account','data-cc' => 'name']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                                            </div>

                                            
                                            <div class="col-span-12">
                                                <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_card_number')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_card_number_placeholder')),'model' => 'stripe.card_number','icon' => 'numeric','x-mask' => '9999 9999 9999 9999','data-cc' => 'number']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                                            </div>

                                            
                                            <div class="col-span-12 md:col-span-8">
                                                <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_expiration_date')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_mm_yyyy')),'model' => 'stripe.card_expiry','icon' => 'calendar-clock','x-mask' => '99 / 9999','data-cc' => 'expiry']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                                            </div>

                                            
                                            <div class="col-span-12 md:col-span-4">
                                                <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_cc_cvc')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_cc_cvc_placeholder')),'model' => 'stripe.card_cvc','icon' => 'key','x-mask' => '9999','data-cc' => 'cvc']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                                            </div>

                                            
                                            <div class="col-span-12 mt-6">
                                                <button
                                                    wire:click="place"
                                                    wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray cursor-not-allowed"
                                                    wire:loading.class.remove="bg-indigo-600 hover:bg-indigo-700 text-white cursor-pointer"
                                                    wire:loading.attr="disabled"
                                                    class="w-full text-sm font-medium flex justify-center bg-indigo-600 hover:bg-indigo-700 text-white py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer"
                                                    >

                                                    
                                                    <div wire:loading wire:target="place">
                                                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>

                                                    
                                                    <div wire:loading.remove wire:target="place">
                                                        <?php echo e(__('messages.t_place_order')); ?>

                                                    </div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>

                                </label>
                            <?php endif; ?> -->

                            <!-- 
                            <?php if(settings('gateways')->is_paypal): ?>
                                <label class="relative block bg-white border rounded-md shadow-sm cursor-pointer focus:outline-none border-gray-300 items-center" :class="payment_method === 'paypal' ? 'border-gray-300' : 'border-transparent'">

                                    
                                    <input type="radio" x-model="payment_method" name="payment_method" value="paypal" class="sr-only">

                                    
                                    <div class="flex justify-between px-6 py-5 items-center rounded-t-md" :class="payment_method === 'paypal' ? 'bg-slate-50' : 'bg-transparent'">

                                        
                                        <div class="flex items-center">
                                            <div class="text-sm">
                                                <p class="font-medium text-gray-900">
                                                    <?php echo e(__('messages.t_paypal')); ?>

                                                </p>
                                            </div>
                                        </div>

                                        
                                        <?php if($payment_method === 'paypal'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif; ?>

                                    </div>

                                    
                                    <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true" :class="payment_method === 'paypal' ? 'border-slate-100 border-2' : 'border border-transparent'"></div>

                                    
                                    <div class="w-full py-5 px-6" style="display: none;" x-show="payment_method == 'paypal'" wire:ignore>

                                        
                                        <div id="paypal-button-container"></div>

                                        
                                        <div class="mt-8">
                                            <button
                                                wire:click="place"
                                                wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray cursor-not-allowed"
                                                wire:loading.class.remove="bg-indigo-600 hover:bg-indigo-700 text-white cursor-pointer"
                                                wire:loading.attr="disabled"
                                                class="w-full text-sm font-medium flex justify-center bg-indigo-600 hover:bg-indigo-700 text-white py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer"
                                                >

                                                
                                                <div wire:loading wire:target="place">
                                                    <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="place">
                                                    <?php echo e(__('messages.t_place_order')); ?>

                                                </div>
                                            </button>
                                        </div>

                                    </div>

                                </label>
                            <?php endif; ?> -->

                            <!-- 
                            <?php if(auth()->user()->balance_available >= $this->total() + $this->taxes()): ?>
                                <label class="relative block bg-white border rounded-md shadow-sm cursor-pointer focus:outline-none border-gray-300 items-center" :class="payment_method === 'balance' ? 'border-gray-300' : 'border-transparent'">

                                    
                                    <input type="radio" x-model="payment_method" name="payment_method" value="balance" class="sr-only">

                                    
                                    <div class="flex justify-between px-6 py-5 items-center rounded-t-md" :class="payment_method === 'balance' ? 'bg-slate-50' : 'bg-transparent'">

                                        
                                        <div class="flex items-center">
                                            <div class="text-sm">
                                                <p class="font-medium text-gray-900">
                                                    <?php echo e(__('messages.t_available_balance')); ?>

                                                </p>
                                            </div>
                                        </div>

                                        
                                        <?php if($payment_method === 'balance'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif; ?>

                                    </div>

                                    
                                    <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true" :class="payment_method === 'balance' ? 'border-slate-100 border-2' : 'border border-transparent'"></div>

                                    
                                    <div class="w-full py-5 px-6" style="display: none;" x-show="payment_method == 'balance'">

                                        <div class="flex items-center justify-center text-4xl text-gray-900 font-black font-[Lato]">
                                            <?php echo money(auth()->user()->balance_available, settings('currency')->code, true); ?>
                                        </div>
                                        <div class="text-center text-xs mt-2 tracking-wide text-gray-500">
                                            <?php echo e(__('messages.t_available_balance')); ?>

                                        </div>

                                        
                                        <div class="mt-8">
                                            <button
                                                wire:click="place"
                                                wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray cursor-not-allowed"
                                                wire:loading.class.remove="bg-indigo-600 hover:bg-indigo-700 text-white cursor-pointer"
                                                wire:loading.attr="disabled"
                                                class="w-full text-sm font-medium flex justify-center bg-indigo-600 hover:bg-indigo-700 text-white py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer"
                                                >

                                                
                                                <div wire:loading wire:target="place">
                                                    <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="place">
                                                    <?php echo e(__('messages.t_place_order')); ?>

                                                </div>
                                            </button>
                                        </div>

                                    </div>

                                </label>
                            <?php endif; ?> -->

                            
                            <?php if(settings('offline_payment')->is_enabled): ?>
                                <label class="relative block bg-white border rounded-md shadow-sm cursor-pointer focus:outline-none border-gray-300 items-center" :class="payment_method === 'offline' ? 'border-gray-300' : 'border-transparent'">

                                    
                                    <input type="radio" x-model="payment_method" name="payment_method" value="offline" class="sr-only">

                                    
                                    <div class="flex justify-between px-6 py-5 items-center rounded-t-md" :class="payment_method === 'offline' ? 'bg-slate-50' : 'bg-transparent'">

                                        
                                        <div class="flex items-center">
                                            <div class="text-sm">
                                                <p class="font-medium text-gray-900">
                                                    <?php echo e(settings('offline_payment')->name); ?>

                                                </p>
                                            </div>
                                        </div>

                                        
                                        <?php if($payment_method === 'offline'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif; ?>

                                    </div>

                                    
                                    <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true" :class="payment_method === 'offline' ? 'border-slate-100 border-2' : 'border border-transparent'"></div>

                                    
                                    <div class="w-full py-5 px-6" style="display: none;" x-show="payment_method == 'offline'">

                                        <div class="text-sm font-normal mt-2 tracking-wide text-gray-500">
                                            <?php echo nl2br(settings('offline_payment')->details); ?>

                                        </div>

                                        
                                        <div class="mt-8">
                                            <button
                                                wire:click="place"
                                                wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray cursor-not-allowed"
                                                wire:loading.class.remove="bg-indigo-600 hover:bg-indigo-700 text-white cursor-pointer"
                                                wire:loading.attr="disabled"
                                                class="w-full text-sm font-medium flex justify-center bg-indigo-600 hover:bg-indigo-700 text-white py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer"
                                                >

                                                
                                                <div wire:loading wire:target="place">
                                                    <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="place">
                                                    <?php echo e(__('messages.t_place_order')); ?>

                                                </div>
                                            </button>
                                        </div>

                                    </div>

                                </label>
                            <?php endif; ?>

                            <!-- 
                            <?php if(settings('paystack')->is_enabled): ?>
                                <label class="relative block bg-white border rounded-md shadow-sm cursor-pointer focus:outline-none border-gray-300 items-center" :class="payment_method === 'paystack' ? 'border-gray-300' : 'border-transparent'">

                                    
                                    <input type="radio" x-model="payment_method" name="payment_method" value="paystack" class="sr-only">

                                    
                                    <div class="flex justify-between px-6 py-5 items-center rounded-t-md" :class="payment_method === 'paystack' ? 'bg-slate-50' : 'bg-transparent'">

                                        
                                        <div class="flex items-center">
                                            <div class="text-sm">
                                                <p class="font-medium text-gray-900">
                                                    <?php echo e(settings('paystack')->name); ?>

                                                </p>
                                            </div>
                                        </div>

                                        
                                        <?php if($payment_method === 'paystack'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif; ?>

                                    </div>

                                    
                                    <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true" :class="payment_method === 'paystack' ? 'border-slate-100 border-2' : 'border border-transparent'"></div>

                                    
                                    <div class="w-full py-5 px-6" style="display: none;" x-show="payment_method == 'paystack'">

                                        <div class="text-sm font-normal mt-2 tracking-wide text-gray-500">
                                            <?php echo nl2br(settings('paystack')->description); ?>

                                        </div>

                                        
                                        <div class="mt-8">
                                            <button
                                                wire:click="place"
                                                wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray cursor-not-allowed"
                                                wire:loading.class.remove="bg-indigo-600 hover:bg-indigo-700 text-white cursor-pointer"
                                                wire:loading.attr="disabled"
                                                class="w-full text-sm font-medium flex justify-center bg-indigo-600 hover:bg-indigo-700 text-white py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer"
                                                >

                                                
                                                <div wire:loading wire:target="place">
                                                    <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="place">
                                                    <?php echo e(__('messages.t_place_order')); ?>

                                                </div>
                                            </button>
                                        </div>

                                    </div>

                                </label>
                            <?php endif; ?>

                            
                            <?php if(settings('cashfree')->is_enabled): ?>
                                <label class="relative block bg-white border rounded-md shadow-sm cursor-pointer focus:outline-none border-gray-300 items-center" :class="payment_method === 'cashfree' ? 'border-gray-300' : 'border-transparent'">

                                    
                                    <input type="radio" x-model="payment_method" name="payment_method" value="cashfree" class="sr-only">

                                    
                                    <div class="flex justify-between px-6 py-5 items-center rounded-t-md" :class="payment_method === 'cashfree' ? 'bg-slate-50' : 'bg-transparent'">

                                        
                                        <div class="flex items-center">
                                            <div class="text-sm">
                                                <p class="font-medium text-gray-900">
                                                    <?php echo e(settings('cashfree')->name); ?>

                                                </p>
                                            </div>
                                        </div>

                                        
                                        <?php if($payment_method === 'cashfree'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif; ?>

                                    </div>

                                    
                                    <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true" :class="payment_method === 'cashfree' ? 'border-slate-100 border-2' : 'border border-transparent'"></div>

                                    
                                    <div class="w-full py-5 px-6" style="display: none;" x-show="payment_method == 'cashfree'">

                                        <div class="text-sm font-normal mt-2 tracking-wide text-gray-500">
                                            <?php echo nl2br(settings('cashfree')->description); ?>

                                        </div>

                                        
                                        <div class="w-full mt-8">
                                            <?php if (isset($component)) { $__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_phone_number')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_ur_phone_number')),'model' => 'cashfree_phone','icon' => 'phone','x-mask' => '9999999999']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                                        </div>

                                        
                                        <div class="mt-4">
                                            <button
                                                wire:click="place"
                                                wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray cursor-not-allowed"
                                                wire:loading.class.remove="bg-indigo-600 hover:bg-indigo-700 text-white cursor-pointer"
                                                wire:loading.attr="disabled"
                                                class="w-full text-sm font-medium flex justify-center bg-indigo-600 hover:bg-indigo-700 text-white py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer"
                                                >

                                                
                                                <div wire:loading wire:target="place">
                                                    <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="place">
                                                    <?php echo e(__('messages.t_place_order')); ?>

                                                </div>
                                            </button>
                                        </div>

                                    </div>

                                </label>
                            <?php endif; ?>

                            
                            <?php if(settings('xendit')->is_enabled): ?>
                                <label class="relative block bg-white border rounded-md shadow-sm cursor-pointer focus:outline-none border-gray-300 items-center" :class="payment_method === 'xendit' ? 'border-gray-300' : 'border-transparent'">

                                    
                                    <input type="radio" x-model="payment_method" name="payment_method" value="xendit" class="sr-only">

                                    
                                    <div class="flex justify-between px-6 py-5 items-center rounded-t-md" :class="payment_method === 'xendit' ? 'bg-slate-50' : 'bg-transparent'">

                                        
                                        <div class="flex items-center">
                                            <div class="text-sm">
                                                <p class="font-medium text-gray-900">
                                                    <?php echo e(settings('xendit')->name); ?>

                                                </p>
                                            </div>
                                        </div>

                                        
                                        <?php if($payment_method === 'xendit'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif; ?>

                                    </div>

                                    
                                    <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true" :class="payment_method === 'xendit' ? 'border-slate-100 border-2' : 'border border-transparent'"></div>

                                    
                                    <div class="w-full h-full relative py-5 px-6" style="display: none;" x-show="payment_method == 'xendit'">
                                        <div class="grid grid-cols-12 gap-y-5 md:gap-x-6">

                                            
                                            <div class="col-span-12">
                                                <label for="text-input-component-id-xendit-number" class="block text-xs font-medium tracking-wide text-gray-700">
                                                    <?php echo e(__('messages.t_card_number')); ?>

                                                </label>
                                                <div class="mt-2 relative">
                                                    <input
                                                    type="text"
                                                    placeholder="<?php echo e(__('messages.t_card_number_placeholder')); ?>" id="text-input-component-id-xendit-number"
                                                    class="block w-full text-xs rounded border-2 ltr:pr-10 ltr:pl-3 rtl:pl-10 rtl:pr-3 py-3  font-normal border-gray-200 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500" x-model="xendit.number"
                                                    x-mask="9999 9999 9999 9999">
                                                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                                        <i class="mdi mdi-numeric text-gray-400"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="col-span-12 md:col-span-8">
                                                <label for="text-input-component-id-xendit-exp-date" class="block text-xs font-medium tracking-wide text-gray-700">
                                                    <?php echo e(__('messages.t_expiration_date')); ?>

                                                </label>
                                                <div class="mt-2 relative">
                                                    <input
                                                    type="text"
                                                    placeholder="<?php echo e(__('messages.t_mm_yyyy')); ?>" id="text-input-component-id-xendit-exp-date"
                                                    class="block w-full text-xs rounded border-2 ltr:pr-10 ltr:pl-3 rtl:pl-10 rtl:pr-3 py-3  font-normal border-gray-200 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500" x-model="xendit.exp_date"
                                                    x-mask="99 / 9999">
                                                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                                        <i class="mdi mdi-calendar-clock text-gray-400"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="col-span-12 md:col-span-4">
                                                <label for="text-input-component-id-xendit-cvc" class="block text-xs font-medium tracking-wide text-gray-700">
                                                    <?php echo e(__('messages.t_cc_cvc')); ?>

                                                </label>
                                                <div class="mt-2 relative">
                                                    <input
                                                    id="xendit_cvn"
                                                    type="text"
                                                    placeholder="<?php echo e(__('messages.t_cc_cvc_placeholder')); ?>" id="text-input-component-id-xendit-cvc"
                                                    class="block w-full text-xs rounded border-2 ltr:pr-10 ltr:pl-3 rtl:pl-10 rtl:pr-3 py-3  font-normal border-gray-200 placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500"
                                                    x-model="xendit.cnv"
                                                    x-mask="9999">
                                                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                                        <i class="mdi mdi-key text-gray-400"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="col-span-12 mt-6">
                                                <button
                                                    @click="getXenditToken()"
                                                    wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray-500 cursor-not-allowed "
                                                    wire:loading.class.remove="bg-indigo-500 hover:bg-indigo-600 text-white cursor-pointer"
                                                    wire:loading.attr="disabled"
                                                    class="w-full text-xs font-medium flex justify-center bg-indigo-500 hover:bg-indigo-600 text-white py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer" >

                                                    
                                                    <div wire:loading wire:target="place">
                                                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>

                                                    
                                                    <div wire:loading.remove wire:target="place">
                                                        <?php echo e(__('messages.t_place_order')); ?>

                                                    </div>

                                                </button>
                                            </div>

                                        </div>
                                    </div>

                                </label>
                            <?php endif; ?> -->

                        </div>
                      </fieldset>

                </div>
            </div>

            <!-- 
            <div class="mt-4 flex text-sm justify-center">
                <div class="group inline-flex items-center text-gray-500 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span class="ltr:ml-2 rtl:mr-2"> <?php echo e(__('messages.t_ur_transaction_is_secure')); ?> </span>
                </div>
            </div> -->

        </div>

    </div>
</div>

<?php $__env->startPush('scripts'); ?>

    
    <?php
        $client_id = config('paypal.mode') === 'sandbox' ? config('paypal.sandbox.client_id') : config('paypal.live.client_id')
    ?>

    
    <?php if(settings('gateways')->is_paypal && $client_id): ?>

        
        <script src="https://www.paypal.com/sdk/js?client-id=<?php echo e($client_id); ?>&currency=<?php echo e(settings('currency')->code); ?>"></script>

    <?php endif; ?>

    
    <?php if(settings('xendit')->is_enabled): ?>

        <script type="text/javascript" src="https://js.xendit.co/v1/xendit.min.js"></script>
        <script>
            Xendit.setPublishableKey('<?php echo e(config("xendit.public_key")); ?>');
        </script>

    <?php endif; ?>

    
    <script>
        function LjqGJmYrwJSjIHT() {
            return {

                payment_method     : <?php if ((object) ('payment_method') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('payment_method'->value()); ?>')<?php echo e('payment_method'->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('payment_method'); ?>')<?php endif; ?>,

                <?php if(settings('xendit')->is_enabled): ?>

                xendit: {
                    number  : null,
                    exp_date: null,
                    cnv     : null
                },

                // Place xendit order
                getXenditToken() {

                    var _this           = this;

                    // Check if card valid
                    if (!_this.isXenditCardValid()) {

                        // Error
                        alert("<?php echo e(__('messages.t_pls_insert_a_valid_cc_info')); ?>");

                        // Disable loading
                        _this.xendit.loading = false;

                        return;

                    }

                    // Get expiry date
                    const expiry_date = _this.xendit.exp_date.split(' / ');

                    // Request a token from Xendit:
                    Xendit.card.createToken({
                        amount             : "<?php echo e(intval(($this->total() + $this->taxes()) *  settings('xendit')->exchange_rate)); ?>",
                        card_number        : _this.xendit.number.replace(/ /g,''),
                        card_exp_month     : expiry_date[0],
                        card_exp_year      : expiry_date[1],
                        card_cvn           : _this.xendit.cnv,
                        is_multiple_use    : false,
                        should_authenticate: true
                    }, _this.xenditResponseHandler);


                },

                // Validate Xendit card
                isXenditCardValid() {
                    try {

                        // Split expiry date
                        const expiry_date = this.xendit.exp_date.split(' / ');

                        // Check if card number valid
                        is_number_valid   = Xendit.card.validateCardNumber(this.xendit.number.replace(/ /g,''));

                        // Check if expiry date is valid
                        is_expiry_valid   = Xendit.card.validateExpiry(expiry_date[0], expiry_date[1]);

                        // Check if cvn is valid
                        is_cvn_valid      = Xendit.card.validateCvn(this.xendit.cnv);

                        // Verify
                        if (!is_number_valid || !is_expiry_valid || !is_cvn_valid) {
                            return false
                        }

                        // Success
                        return true;

                    } catch (error) {
                        return false;
                    }
                },

                // Handle xendit request
                xenditResponseHandler (err, creditCardToken) {

                    if (err) {
                        // Show the errors on the form
                        alert(err.message);
                        return;
                    }

                    if (creditCardToken.status === 'VERIFIED') {

                        // Get the token ID:
                        var token            = creditCardToken.id;

                        // Place order
                        window.livewire.find('<?php echo e($_instance->id); ?>').place({
                            'xendit_token'  : token,
                            'xendit_auth_id': creditCardToken.authentication_id,
                            'xendit_cvn'    : document.getElementById('xendit_cvn').value,
                        });

                    } else if (creditCardToken.status === 'IN_REVIEW') {
                        window.open(creditCardToken.payer_authentication_url, 'sample-inline-frame');
                    } else if (creditCardToken.status === 'FAILED') {
                        alert(creditCardToken.failure_reason);
                    }

                },

                <?php endif; ?>

                init() {

                    
                    <?php if(settings('gateways')->is_paypal && $client_id): ?>

                        // Render the PayPal button into #paypal-button-container
                        paypal.Buttons({

                            // Set up the transaction
                            createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '<?php echo e($this->total() + $this->taxes()); ?>'
                                        }
                                    }]
                                });
                            },

                            // Finalize the transaction
                            onApprove: function(data, actions) {

                                // Set order id
                                window.livewire.find('<?php echo e($_instance->id); ?>').set('paypal_order_id', data.orderID);

                                // Show success message
                                window.toast("<?php echo e(__('messages.t_paypal_payment_success_click_place')); ?>", 'success');
                            }

                        }).render('#paypal-button-container');

                    <?php endif; ?>

                    window.addEventListener('cart-updated', () => {
                        Livewire.emit('cart-updated')
                    });

                }

            }
        }
        window.LjqGJmYrwJSjIHT = LjqGJmYrwJSjIHT();
    </script>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>

    
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/js/splide-extension-video.min.js"></script>

    
    <script>
        function oZcfXWmBuWfxbIo() {
            return {

                cart: [],
                isCopied: false,

                // Initialize main carousel
                initMainCarousel() {
                    var main = new Splide( '#main-carousel', {
                        type        : 'loop',
                        cover       : false,
                        autoplay    : true,
                        pauseOnHover: true,
                        heightRatio : 0.3,
                        height      : this.$width < 600 ? 250 : 530,
                        rewind      : true,
                        pagination  : true,
                        arrows      : true,
                        video       : {
                            loop         : true,
                            mute         : true
                        },
                    } );

                    var thumbnails = new Splide( '#thumbnail-carousel', {
                        fixedWidth  : 100,
                        fixedHeight : 60,
                        gap         : 10,
                        rewind      : true,
                        pagination  : false,
                        isNavigation: true,
                        breakpoints : {
                        600: {
                            fixedWidth : 60,
                            fixedHeight: 44,
                        },
                        },
                    } );

                    main.sync( thumbnails );
                    main.mount(window.splide.Extensions);
                    thumbnails.mount();
                },

                initRelatedCarousel() {
                    $('#slick-related-gigs').slick({
                        dots          : false,
                        infinite      : true,
                        speed         : 300,
                        slidesToShow  : 4,
                        slidesToScroll: 1,
                        prevArrow     : $('#related-gigs-prev-btn'),
                        nextArrow     : $('#related-gigs-next-btn'),
                        responsive    : [
                            {
                            breakpoint: 1024,
                                settings: {
                                    slidesToShow  : 3,
                                    slidesToScroll: 3
                                }
                            },
                            {
                            breakpoint: 600,
                                settings: {
                                    slidesToShow  : 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                            breakpoint: 480,
                                settings: {
                                    slidesToShow  : 1,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                    });
                },

                // Initialize rating plugin
                initRating() {
                    window.rating({ target: "rating-item-container", fill: "#5b5b5b", background: "#cdcdcd" });
                    window.rating({ target: "gig-rating-elem", fill: "#ffba00", background: "#cdcdcd", size: "18px" });
                },

                // Copy link
                copy() {

                    // Set gig link
                    const url = "<?php echo e(url('service', $gig->slug)); ?>";

                    var _this = this;
                    navigator.clipboard.writeText(url).then(function() {
                        _this.isCopied = true;
                        setTimeout(() => {
                            _this.isCopied = false
                        }, 2000);
                    }, function(err) {
                    });

                },

                // Splide Sliders
                splides() {
                    var splides = document.getElementsByClassName( 'splide' );

                    for ( var i = 0, len = splides.length; i < len; i++ ) {
                        if (splides[i].id !== 'main-carousel' && splides[i].id !== 'thumbnail-carousel') {
                            new Splide( splides[ i ], {
                                type        : 'loop',
                                cover       : true,
                                autoplay    : false,
                                pauseOnHover: true,
                                heightRatio : 0.3,
                                height      : 200,
                                rewind      : true,
                                pagination  : false,
                                arrows      : true,
                                video       : {
                                    loop         : true,
                                    mute         : true
                                },
                            } ).mount(window.splide.Extensions);
                        }
                    }
                },

                // Slick sliders
                slicks() {
                    $('.your-class').slick({
                            dots: true,
                            infinite: false,
                            speed: 300,
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            rtl: true,
                            responsive: [
                                {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: true
                                }
                                },
                                {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                                },
                                {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                                }
                                // You can unslick at a given breakpoint now by adding:
                                // settings: "unslick"
                                // instead of a settings object
                            ]
                        });
                },

                // Init alpinejs
                initialize() {
                    var _this = this;

                    // Wait until page loaded
                    document.addEventListener( 'DOMContentLoaded', function () {

                        // Initialize carousel
                        _this.initMainCarousel();

                        // Initialize related gigs carousel
                        _this.initRelatedCarousel();

                        // initialize rating plugin
                        _this.initRating();

                        // Splide Plugin
                        _this.splides();

                        // Slick Plugin
                        _this.slicks();

                    });
                },

                youCantReport() {
                    window.toast("<?php echo e(__('messages.t_u_cant_report_this_gig')); ?>", "warning");
                },

                loginToReport() {
                    window.toast("<?php echo e(__('messages.t_pls_login_or_register_to_report_this_gig')); ?>", "info");
                },

                scrollToReviews() {
                    document.querySelector('#reviews-container').scrollIntoView({
                        behavior: 'smooth'
                    });
                }

            }
        }
        window.oZcfXWmBuWfxbIo = oZcfXWmBuWfxbIo();
    </script>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide-core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/themes/splide-default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/css/splide-extension-video.min.css">

    
    <link rel="stylesheet" href="<?php echo e(url('css/ckeditor-inline.css')); ?>">

    
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/main/payment/payment.blade.php ENDPATH**/ ?>