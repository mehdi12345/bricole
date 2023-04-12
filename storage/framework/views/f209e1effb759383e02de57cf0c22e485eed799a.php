<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-3">
        <div class="grid grid-cols-12 md:gap-x-6 gap-y-6 mt-16">

            
            <?php if($message): ?>
                <div class="col-span-12">
                    <div class="bg-red-50 border-l-4 border-red-400 p-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/></svg>
                            </div>
                            <div class="ltr:ml-3 rtl:mr-3">
                                <p class="text-sm text-red-500 font-medium"><?php echo e($message); ?></p>
                            </div>
                        </div>
                    </div>  
                </div>
            <?php endif; ?>
    
            
            <?php if($attemptsLeft > 0): ?>

                
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_password')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_password')),'model' => 'password','type' => 'password','icon' => 'lock']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0274761f86638d78e36787c771a294b67c238db)): ?>
<?php $component = $__componentOriginala0274761f86638d78e36787c771a294b67c238db; ?>
<?php unset($__componentOriginala0274761f86638d78e36787c771a294b67c238db); ?>
<?php endif; ?>
                </div>

                
                <div class="col-span-12 mt-2">
                    <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'login','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_login')),'block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
                </div>

                
                <?php if(settings('security')->is_recaptcha): ?>
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7 = $component; } ?>
<?php $component = Lukeraymonddowning\Honey\Views\Honey::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('honey'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Lukeraymonddowning\Honey\Views\Honey::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['recaptcha' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7)): ?>
<?php $component = $__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7; ?>
<?php unset($__componentOriginal4bbc73356588fb92e23dd2eee41cd748d85698a7); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?>
                
            <?php else: ?>
            
                
                <div class="col-span-12">
                    <div class="bg-red-50 border-l-4 border-red-400 p-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/></svg>
                            </div>
                            <div class="ltr:ml-3 rtl:mr-3">
                                <p class="text-sm text-red-500 font-medium"><?php echo __('messages.t_too_many_login_attempts_pls_try_after_seconds', ['seconds' => $retryAfter]); ?></p>
                            </div>
                        </div>
                    </div>  
                </div>

            <?php endif; ?>

        </div>
    </div>
</div>  

<?php if($attemptsLeft < 0): ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
                var timeleft = <?php echo e($retryAfter); ?>;
                var timer    = setInterval(function(){
                    if(timeleft === 0){
                        clearInterval(timer);
                        // Refresh the page
                        window.location.reload();
                    } else {
                        document.getElementById("countdown-seconds").innerHTML = timeleft;
                    }
                    timeleft -= 1;
                }, 1000);
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\bricole\resources\views/livewire/admin/auth/login.blade.php ENDPATH**/ ?>