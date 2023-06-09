<div class="container mx-auto" x-data="window.CPsUjHhHQUOwxqs">


    <div class="fixed top-0 left-0 z-50 bg-black w-full h-full opacity-80" wire:loading>
        <div class="w-full h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="mx-auto w-12 h-12 text-gray-500 animate-spin dark:text-gray-600 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="text-xs font-medium tracking-wider text-white mt-4 block"><?php echo e(__('messages.t_please_wait_dots')); ?></span>
            </div>
        </div>
    </div>

    <div class="min-h-full bg-white shadow rounded-md">

        <?php

// Set links
$links = [
    ['href' => "seller/home", 'text' => __('messages.t_home'), 'active' => false],
    ['href' => "seller/orders", 'text' => __('messages.t_orders_history'), 'active' => false],
    ['href' => "seller/gigs", 'text' => __('messages.t_my_gigs'), 'active' => false],
    ['href' => "seller/reviews", 'text' => __('messages.t_reviews'), 'active' => false],
    ['href' => "seller/portfolio", 'text' => __('messages.t_portfolio'), 'active' => true],
    ['href' => "seller/earnings", 'text' => __('messages.t_earnings'), 'active' => false],
    ['href' => "seller/withdrawals", 'text' => __('messages.t_withdrawals'), 'active' => false],
    ['href' => "seller/refunds", 'text' => __('messages.t_refunds'), 'active' => false],
]

?>


        <nav class="" x-data="{ open:false }">
            <div class="mx-auto border-b border-gray-200 px-4 sm:px-6 lg:px-8">
                <div class="relative h-16 flex items-center justify-between">


                    <div class="flex items-center">
                        <div class="hidden lg:block lg:ml-10">
                            <div class="flex space-x-4 rtl:space-x-reverse">

                                <?php $__currentLoopData = $links;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $link): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                                    <a href="<?php echo e(url($link['href'])); ?>" class="<?php echo e($link['active'] ? 'bg-gray-100' : 'hover:text-gray-700 hover:bg-gray-50'); ?> px-3 py-2 rounded-md text-sm font-medium text-gray-900" aria-current="page"><?php echo e($link['text']); ?></a>
	                                <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>

                            </div>
                        </div>
                    </div>


                    <div class="flex lg:hidden">


                        <button type="button" class="bg-gray-50 p-2 inline-flex items-center justify-center rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                            <span class="sr-only">Open main menu</span>
                            <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 hidden" :class="{'hidden': open, 'block': !(open)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path> </svg> <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 block" :class="{'block': open, 'hidden': !(open)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> </svg>
                        </button>


                    </div>


                    <?php if (auth()->user()->sales->where('status', 'pending')->count()): ?>
                        <div class="hidden lg:block">
                            <span class="relative inline-flex">
                                <span class="inline-flex items-center px-4 py-2 font-medium leading-6 text-xs transition ease-in-out duration-150 text-amber-600">
                                    <?php echo e(__('messages.t_number_pending_orders', ['number' => number_format(auth()->user()->sales->where('status', 'pending')->count())])); ?>

                                </span>
                                <span class="flex absolute h-3 w-3 top-[13px] ltr:-left-1 rtl:-right-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-500 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-600"></span>
                                </span>
                            </span>
                        </div>
                    <?php endif;?>

                </div>
            </div>


            <div class="bg-gray-100 border-b border-gray-200 lg:hidden" x-show="open">
                <div class="px-2 pt-2 pb-3 space-y-1">

                    <?php $__currentLoopData = $links;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $link): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                        <a href="<?php echo e(url($link['href'])); ?>" class="<?php echo e($link['active'] ? 'bg-gray-200' : 'hover:bg-gray-200'); ?> block px-3 py-2 rounded-md font-bold tracking-wide text-gray-900 text-xs">
	                            <?php echo e($link['text']); ?>

	                        </a>
	                    <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>

                </div>
            </div>

        </nav>


        <header class="bg-gray-50 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-between">
                <div class="flex-1 min-w-0">


                    <nav class="flex" aria-label="Breadcrumb">
                        <ol role="list" class="flex items-center space-x-4 rtl:space-x-reverse">


                            <li>
                                <div>
                                    <a href="<?php echo e(url('/')); ?>" class="text-sm font-medium text-gray-500 hover:text-gray-700"><?php echo e(__('messages.t_home')); ?></a>
                                </div>
                            </li>


                            <li>
                                <div class="flex items-center">


                                    <svg class="hidden ltr:block flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-5 w-5 text-gray-400 viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                    <a href="<?php echo e(url('seller/home')); ?>" class="ltr:ml-4 rtl:mr-4 text-sm font-medium text-gray-500 hover:text-gray-700"><?php echo e(__('messages.t_dashboard')); ?></a>
                                </div>
                            </li>
                        </ol>
                    </nav>


                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate"><?php echo e(__('messages.t_create_project')); ?></h1>


                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-8 rtl:space-x-reverse">


                        <div class="mt-2 flex items-center text-xs font-medium" style="color: <?php echo e(auth()->user()->level->level_color); ?>">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4" style="color: <?php echo e(auth()->user()->level->level_color); ?>;margin-top: -3px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/> <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/> </svg>
                            <?php echo e(auth()->user()->level->title); ?>

                        </div>


                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>
                            <?php echo e(__('messages.t_total_sales_number', ['number' => number_format(auth()->user()->sales->where('status', 'delivered')->where('is_finished', true)->count())])); ?>

                        </div>


                        <?php if (auth()->user()->country): ?>
                            <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                                <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/> </svg>
                                <?php echo e(auth()->user()->country->name); ?>

                            </div>
                        <?php endif;?>


                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/> </svg>
                            <?php echo e(__('messages.t_signed_up_on_date', ['date' => format_date(auth()->user()->created_at, 'F j, Y')])); ?>

                        </div>

                    </div>

                </div>
                <div class="mt-5 flex xl:mt-0 xl:ltr:ml-4 xl:rtl:mr-4">


                    <span class="hidden sm:block ltr:ml-3 rtl:mr-3">
                        <a href="<?php echo e(url('profile/' . auth()->user()->username . '/portfolio')); ?>" target="_blank" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500">
                            <?php echo e(__('messages.t_view_my_porfolio')); ?>

                        </a>
                    </span>

                </div>
            </div>
        </header>


        <main class="pb-16">
            <div class="max-w-xl m-auto px-6 lg:px-0 py-8">
                <div class="grid col-span-12 md:gap-x-6 gap-y-6">


                    <div class="col-span-12">
                        <?php if (isset($component)) {$__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component;}?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.text-input');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_project_title')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_project_title')), 'model' => 'title', 'icon' => 'format-title', 'maxlength' => '100']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db;?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db);?>
<?php endif;?>
                    </div>


                    <div class="col-span-12">
                        <?php if (isset($component)) {$__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11 = $component;}?>
<?php $component = App\View\Components\Forms\Textarea::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.textarea');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_project_description')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_project_description')), 'model' => 'description', 'icon' => 'card-text-outline', 'rows' => 26, 'maxlength' => '5000']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11;?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11);?>
<?php endif;?>
                    </div>


                    <div class="col-span-12">
                        <?php if (isset($component)) {$__componentOriginal67b391f64c2f9b357e08926622ed3b8c3e15e254 = $component;}?>
<?php $component = App\View\Components\Forms\FileInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.file-input');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\FileInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_project_thumbnail')), 'model' => 'thumbnail']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal67b391f64c2f9b357e08926622ed3b8c3e15e254)): ?>
<?php $component = $__componentOriginal67b391f64c2f9b357e08926622ed3b8c3e15e254;?>
<?php unset($__componentOriginal67b391f64c2f9b357e08926622ed3b8c3e15e254);?>
<?php endif;?>
                    </div>


                    <div class="col-span-12">
                        <div wire:ignore>
                            <label class="mb-2 text-xs font-medium tracking-wide flex items-center <?php echo e($errors->first('images') ? 'text-red-600' : 'text-gray-700'); ?>"><?php echo e(__('messages.t_project_images')); ?></label>

                            <?php if (isset($component)) {$__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59 = $component;}?>
<?php $component = App\View\Components\Forms\Uploader::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.uploader');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Uploader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['model' => 'images', 'id' => 'uploader_images', 'extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['jpg', 'jpeg', 'png']), 'accept' => 'image/jpg, image/jpeg, image/png', 'size' => '' . e(settings('media')->portfolio_max_images) . '', 'max' => '' . e(settings('media')->portfolio_max_size) . '']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59)): ?>
<?php $component = $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59;?>
<?php unset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59);?>
<?php endif;?>

                            <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])):
    if (isset($message)) {$__messageOriginal = $message;}
    $message = $__bag->first($__errorArgs[0]);?>
	                                <p class="mt-1 text-xs text-red-600"><?php echo e($errors->first('images')); ?></p>
	                            <?php unset($message);
    if (isset($__messageOriginal)) {$message = $__messageOriginal;}
endif;
unset($__errorArgs, $__bag);?>
                        </div>
                    </div>


                    <div class="col-span-12">
                        <?php if (isset($component)) {$__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component;}?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.text-input');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_project_link_optional')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_https_example_com')), 'model' => 'link', 'icon' => 'link-variant', 'maxlength' => '120']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db;?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db);?>
<?php endif;?>
                    </div>


                    <div class="col-span-12">
                        <?php if (isset($component)) {$__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component;}?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.text-input');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_project_video_optional')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_youtube_placeholder')), 'model' => 'video', 'icon' => 'youtube', 'maxlength' => '120']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db;?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db);?>
<?php endif;?>
                    </div>


                    <div class="col-span-12 mt-6">
                        <?php if (isset($component)) {$__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component;}?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.button');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_create_project')), 'action' => 'create', 'block' => true]);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c;?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c);?>
<?php endif;?>
                    </div>

                </div>
            </div>
        </main>

    </div>
</div>

<?php $__env->startPush('scripts');?>


    <script>
        function CPsUjHhHQUOwxqs() {
            return {

            }
        }
        window.CPsUjHhHQUOwxqs = CPsUjHhHQUOwxqs();
    </script>

<?php $__env->stopPush();?><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/main/seller/portfolio/options/create.blade.php ENDPATH**/?>