<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 lg:col-span-9">
        <div class="py-10 px-12">


            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900"><?php echo e(__('messages.t_commission_settings')); ?></h2>
                <p class="mt-1 text-xs text-gray-500"><?php echo e(__('messages.t_commission_settings_subtitle')); ?></p>
            </div>


            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">


                <div class="col-span-12">
                    <?php if (isset($component)) {$__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e = $component;}?>
<?php $component = App\View\Components\Forms\Checkbox::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.checkbox');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enable_taxes')), 'model' => 'enable_taxes']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e)): ?>
<?php $component = $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e;?>
<?php unset($__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e);?>
<?php endif;?>
                </div>


                <div class="col-span-12 md:col-span-6">
                    <div class="w-full" wire:ignore>
                        <?php if (isset($component)) {$__componentOriginal5ab62038822522ce7127abea441d442e654dc54a = $component;}?>
<?php $component = App\View\Components\Forms\Select2::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.select2');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Select2::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_tax_type')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_choose_tax_type')), 'model' => 'tax_type', 'options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['text' => __('messages.t_fixed_amount'), 'value' => 'fixed'], ['text' => __('messages.t_percentage_amount'), 'value' => 'percentage']]), 'isDefer' => true, 'isAssociative' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false), 'componentId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->id), 'value' => 'value', 'text' => 'text']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal5ab62038822522ce7127abea441d442e654dc54a)): ?>
<?php $component = $__componentOriginal5ab62038822522ce7127abea441d442e654dc54a;?>
<?php unset($__componentOriginal5ab62038822522ce7127abea441d442e654dc54a);?>
<?php endif;?>
                    </div>
                </div>


                <div class="col-span-12 md:col-span-6">
                    <?php if (isset($component)) {$__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component;}?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.text-input');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_tax_value')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_tax_value')), 'model' => 'tax_value', 'icon' => 'ticket-percent']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db;?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db);?>
<?php endif;?>
                </div>


                <div class="col-span-12 lg:col-span-4">
                    <div class="w-full" wire:ignore>
                        <?php if (isset($component)) {$__componentOriginal5ab62038822522ce7127abea441d442e654dc54a = $component;}?>
<?php $component = App\View\Components\Forms\Select2::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.select2');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Select2::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_commission')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_take_commission_from')), 'model' => 'commission_from', 'options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['text' => __('messages.t_orders'), 'value' => 'orders'], ['text' => __('messages.t_withdrawal'), 'value' => 'withdrawals']]), 'isDefer' => true, 'isAssociative' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false), 'componentId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->id), 'value' => 'value', 'text' => 'text']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal5ab62038822522ce7127abea441d442e654dc54a)): ?>
<?php $component = $__componentOriginal5ab62038822522ce7127abea441d442e654dc54a;?>
<?php unset($__componentOriginal5ab62038822522ce7127abea441d442e654dc54a);?>
<?php endif;?>
                    </div>
                </div>


                <div class="col-span-12 lg:col-span-4">
                    <div class="w-full" wire:ignore>
                        <?php if (isset($component)) {$__componentOriginal5ab62038822522ce7127abea441d442e654dc54a = $component;}?>
<?php $component = App\View\Components\Forms\Select2::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.select2');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Select2::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_commission_type')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_choose_commission_type')), 'model' => 'commission_type', 'options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['text' => __('messages.t_fixed_amount'), 'value' => 'fixed'], ['text' => __('messages.t_percentage_amount'), 'value' => 'percentage']]), 'isDefer' => true, 'isAssociative' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false), 'componentId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->id), 'value' => 'value', 'text' => 'text']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginal5ab62038822522ce7127abea441d442e654dc54a)): ?>
<?php $component = $__componentOriginal5ab62038822522ce7127abea441d442e654dc54a;?>
<?php unset($__componentOriginal5ab62038822522ce7127abea441d442e654dc54a);?>
<?php endif;?>
                    </div>
                </div>


                <div class="col-span-12 lg:col-span-4">
                    <?php if (isset($component)) {$__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component;}?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.text-input');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_commission_value')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_commission_value')), 'model' => 'commission_value', 'icon' => 'cash-fast']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db;?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db);?>
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

</div>    <?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/admin/settings/commission.blade.php ENDPATH**/?>