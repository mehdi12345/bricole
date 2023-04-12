<div class="relative w-full mx-auto" x-data="window.LjqGJmYrwJSjIHT">
    <div class="grid grid-cols-12 md:gap-x-10 gap-y-10">


        <?php if (session()->has('error')): ?>
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
        <?php endif;?>


        <div class="col-span-12 lg:col-span-7">
            <div class="mb-6 bg-white shadow-sm rounded-lg border border-gray-200">


                <div class="bg-gray-50 px-8 py-4 rounded-t-lg">
                    <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-sm leading-6 font-black tracking-wide text-gray-800"><?php echo e(__('messages.t_invoice')); ?></h3>
                            <p class="text-sm font-normal text-gray-400"><?php echo e(__('messages.t_enter_ur_billing_infor_below')); ?></p>
                        </div>
                        <div class="ltr:ml-4 rtl:mr-4 mt-4 flex-shrink-0">
                            <a href="<?php echo e(url('cart')); ?>" target="_blank" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500 hover:text-indigo-600 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                                <span class="text-xs font-medium text-indigo-500 hover:text-indigo-600">
                                    <?php echo e(__('messages.t_back_to_shopping_cart')); ?>

                                </span>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="grid grid-cols-12 md:gap-x-6 gap-y-6 px-8 pt-6 pb-10">


                    <div class="col-span-12 md:col-span-6">
                        <?php if (isset($component)) {$__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component;}?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.text-input');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_firstname')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_firstname')), 'model' => 'firstname', 'icon' => 'account']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db;?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db);?>
<?php endif;?>
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_lastname')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_lastname')), 'model' => 'lastname', 'icon' => 'account']);?>
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_email_address')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_email_address')), 'model' => 'email', 'type' => 'email', 'icon' => 'at']);?>
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_company')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_company_optional')), 'model' => 'company', 'icon' => 'domain']);?>
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_address')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_address')), 'model' => 'address', 'icon' => 'map-marker']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db;?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db);?>
<?php endif;?>
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
                            <?php echo money($this->total() + $this->taxes(), settings('currency')->code, true); ?>
                        </span>
                    </div>

                    <fieldset class="mt-8">
                        <legend class="sr-only"><?php echo e(__('messages.t_payment_method')); ?></legend>
                        <div class="space-y-4">


                            <?php if (settings('gateways')->is_stripe): ?>
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


                                        <?php if ($payment_method === 'stripe'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif;?>

                                    </div>


                                    <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true" :class="payment_method === 'stripe' ? 'border-slate-100 border-2' : 'border border-transparent'"></div>


                                    <div class="w-full py-5 px-6" style="display: none;" x-show="payment_method == 'stripe'">
                                        <div class="grid grid-cols-12 gap-y-5 md:gap-x-6">


                                            <div class="col-span-12">
                                                <?php if (isset($component)) {$__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component;}?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.text-input');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_name_on_card')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_name_credit_card')), 'model' => 'stripe.card_name', 'icon' => 'account', 'data-cc' => 'name']);?>
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_card_number')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_card_number_placeholder')), 'model' => 'stripe.card_number', 'icon' => 'numeric', 'x-mask' => '9999 9999 9999 9999', 'data-cc' => 'number']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db;?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db);?>
<?php endif;?>
                                            </div>


                                            <div class="col-span-12 md:col-span-8">
                                                <?php if (isset($component)) {$__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component;}?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.text-input');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_expiration_date')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_mm_yyyy')), 'model' => 'stripe.card_expiry', 'icon' => 'calendar-clock', 'x-mask' => '99 / 9999', 'data-cc' => 'expiry']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db;?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db);?>
<?php endif;?>
                                            </div>


                                            <div class="col-span-12 md:col-span-4">
                                                <?php if (isset($component)) {$__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component;}?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.text-input');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_cc_cvc')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_cc_cvc_placeholder')), 'model' => 'stripe.card_cvc', 'icon' => 'key', 'x-mask' => '9999', 'data-cc' => 'cvc']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db;?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db);?>
<?php endif;?>
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
                            <?php endif;?>


                            <?php if (settings('gateways')->is_paypal): ?>
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


                                        <?php if ($payment_method === 'paypal'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif;?>

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
                            <?php endif;?>


                            <?php if (auth()->user()->balance_available >= $this->total() + $this->taxes()): ?>
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


                                        <?php if ($payment_method === 'balance'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif;?>

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
                            <?php endif;?>


                            <?php if (settings('offline_payment')->is_enabled): ?>
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


                                        <?php if ($payment_method === 'offline'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif;?>

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
                            <?php endif;?>


                            <?php if (settings('paystack')->is_enabled): ?>
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


                                        <?php if ($payment_method === 'paystack'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif;?>

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
                            <?php endif;?>


                            <?php if (settings('cashfree')->is_enabled): ?>
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


                                        <?php if ($payment_method === 'cashfree'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif;?>

                                    </div>


                                    <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true" :class="payment_method === 'cashfree' ? 'border-slate-100 border-2' : 'border border-transparent'"></div>


                                    <div class="w-full py-5 px-6" style="display: none;" x-show="payment_method == 'cashfree'">

                                        <div class="text-sm font-normal mt-2 tracking-wide text-gray-500">
                                            <?php echo nl2br(settings('cashfree')->description); ?>

                                        </div>


                                        <div class="w-full mt-8">
                                            <?php if (isset($component)) {$__componentOriginala0274761f86638d78e36787c771a294b67c238db = $component;}?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : []));?>
<?php $component->withName('forms.text-input');?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data());?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all());?>
<?php endif;?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_phone_number')), 'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_ur_phone_number')), 'model' => 'cashfree_phone', 'icon' => 'phone', 'x-mask' => '9999999999']);?>
<?php echo $__env->renderComponent(); ?>
<?php endif;?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db;?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db);?>
<?php endif;?>
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
                            <?php endif;?>


                            <?php if (settings('xendit')->is_enabled): ?>
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


                                        <?php if ($payment_method === 'xendit'): ?>
                                            <div class="flex items-center text-xs uppercase tracking-widest text-indigo-600 font-bold sm:block sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-right sm:rtl:text-left">
                                                <?php echo e(__('messages.t_selected')); ?>

                                            </div>
                                        <?php endif;?>

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
                            <?php endif;?>

                        </div>
                      </fieldset>

                </div>
            </div>


            <div class="mt-4 flex text-sm justify-center">
                <div class="group inline-flex items-center text-gray-500 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span class="ltr:ml-2 rtl:mr-2"> <?php echo e(__('messages.t_ur_transaction_is_secure')); ?> </span>
                </div>
            </div>

        </div>

    </div>
</div>

<?php $__env->startPush('scripts');?>


    <?php
$client_id = config('paypal.mode') === 'sandbox' ? config('paypal.sandbox.client_id') : config('paypal.live.client_id')
?>


    <?php if (settings('gateways')->is_paypal && $client_id): ?>


        <script src="https://www.paypal.com/sdk/js?client-id=<?php echo e($client_id); ?>&currency=<?php echo e(settings('currency')->code); ?>"></script>

    <?php endif;?>


    <?php if (settings('xendit')->is_enabled): ?>

        <script type="text/javascript" src="https://js.xendit.co/v1/xendit.min.js"></script>
        <script>
            Xendit.setPublishableKey('<?php echo e(config("xendit.public_key")); ?>');
        </script>

    <?php endif;?>


    <script>
        function LjqGJmYrwJSjIHT() {
            return {

                payment_method     : <?php if ((object) ('payment_method') instanceof \Livewire\WireDirective): ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('payment_method'->value()); ?>')<?php echo e('payment_method'->hasModifier('defer') ? '.defer' : ''); ?><?php else: ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('payment_method'); ?>')<?php endif;?>,

                <?php if (settings('xendit')->is_enabled): ?>

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
                        amount             : "<?php echo e(intval(($this->total() + $this->taxes()) * settings('xendit')->exchange_rate)); ?>",
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

                <?php endif;?>

                init() {


                    <?php if (settings('gateways')->is_paypal && $client_id): ?>

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

                    <?php endif;?>

                    window.addEventListener('cart-updated', () => {
                        Livewire.emit('cart-updated')
                    });

                }

            }
        }
        window.LjqGJmYrwJSjIHT = LjqGJmYrwJSjIHT();
    </script>

<?php $__env->stopPush();?><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/main/checkout/checkout.blade.php ENDPATH**/?>