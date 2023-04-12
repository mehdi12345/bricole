<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 lg:col-span-9">
        <div class="py-10 px-12">


            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900"><?php echo e(__('messages.t_advertisements')); ?></h2>
            </div>


            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">


                <div class="col-span-12">
                    <?php if (isset($component)) {$__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11 = $component;}?>
<?php $component = App\View\Components\Forms\Textarea::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.textarea');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_header_code')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_ads_header_code')), 'model' => 'header_code', 'icon' => 'xml', 'rows' => 12]);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11;?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11);?>
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_service_360_ad')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_ad_code')), 'model' => 'ad_service_360', 'icon' => 'advertisements', 'rows' => 12]);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11;?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11);?>
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_service_720_ad')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_ad_code')), 'model' => 'ad_service_720', 'icon' => 'advertisements', 'rows' => 12]);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11;?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11);?>
<?php endif;?>
                </div>

            </div>

        </div>


        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <?php if (isset($component)) {$__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component;}?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.button');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['action' => 'update', 'text' => '' . e(__('messages.t_update')) . '', 'block' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c;?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c);?>
<?php endif;?>
        </div>

    </div>

</div>    <?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/admin/advertisements/advertisements.blade.php ENDPATH**/?>