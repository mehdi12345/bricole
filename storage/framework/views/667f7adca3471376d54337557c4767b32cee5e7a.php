<div class="w-full">

    <div class="mb-12 bg-white shadow shadow-gray-100 rounded-md border border-gray-200 max-w-xl mx-auto">


        <div class="bg-gray-50 px-8 py-4 rounded-t-md border-b-2 border-gray-100">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-4">
                <h3 class="text-base leading-6 font-black text-gray-900 mb-2"><?php echo e(__('messages.t_contact_us')); ?></h3>
                <p class="text-sm font-medium text-gray-500"><?php echo e(__('messages.t_contact_us_subtitle')); ?></p>
                </div>
            </div>
        </div>


        <div class="px-8 py-6">
            <div class="grid grid-cols-12 gap-5">


                <div class="col-span-12">
                    <?php if (isset($component)) {$__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component;}?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.text-input');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_name')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_your_fullname')), 'icon' => 'account', 'model' => 'name']);?>
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_email_address')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_email_address')), 'icon' => 'at', 'model' => 'email', 'type' => 'email']);?>
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_subject')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_message_subject')), 'icon' => 'format-text', 'model' => 'subject']);?>
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_message')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_descibe_ur_message_in_details')), 'icon' => 'file', 'model' => 'message']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11;?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11);?>
<?php endif;?>
                </div>


                <?php if (settings('security')->is_recaptcha): ?>
                    <div class="col-span-12">
                        <?php if (isset($component)) {$__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7 = $component;}?>
<?php $component = Lukeraymonddowning\Honey\Views\Honey::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('honey');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Lukeraymonddowning\Honey\Views\Honey::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['recaptcha' => true]);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7)): ?>
<?php $component = $__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7;?>
<?php unset($__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7);?>
<?php endif;?>
                    </div>
                <?php endif;?>


                <div class="col-span-12 mt-6">
                    <?php if (isset($component)) {$__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component;}?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.button');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['action' => 'contact', 'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_lets_talk')), 'block' => true]);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c;?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c);?>
<?php endif;?>
                </div>

            </div>
        </div>


        <div class="px-4 py-6 bg-gray-50 border-t border-gray-200 sm:px-10 text-center">
            <p class="text-xs leading-5 text-gray-500">
                <?php echo __('messages.t_by_continue_agree_terms_privacy', [
    'privacy_link' => settings('footer')->privacy ? url('page', settings('footer')->privacy->slug) : "#",
    'privacy_text' => settings('footer')->privacy ? settings('footer')->privacy->title : __('messages.t_privacy_policy'),
    'terms_link' => settings('footer')->terms ? url('page', settings('footer')->terms->slug) : "#",
    'terms_text' => settings('footer')->terms ? settings('footer')->terms->title : __('messages.t_terms_of_service'),
]); ?>

            </p>
        </div>

    </div>
</div><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/main/help/contact/contact.blade.php ENDPATH**/?>