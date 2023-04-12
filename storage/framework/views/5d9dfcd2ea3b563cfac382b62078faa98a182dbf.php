<main class="w-full" x-data="window.lRtoYGzyUMsMBKk" x-init="init">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                
                <aside class="lg:col-span-3 py-6" wire:ignore>
                    <?php if (isset($component)) { $__componentOriginal6685289ee861d3ee4557d29ddf6c801887849aa3 = $component; } ?>
<?php $component = App\View\Components\Main\Account\Sidebar::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main.account.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Main\Account\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6685289ee861d3ee4557d29ddf6c801887849aa3)): ?>
<?php $component = $__componentOriginal6685289ee861d3ee4557d29ddf6c801887849aa3; ?>
<?php unset($__componentOriginal6685289ee861d3ee4557d29ddf6c801887849aa3); ?>
<?php endif; ?>
                </aside>

                
                <div class="divide-y divide-gray-200 lg:col-span-9">

                    
                    <div class="py-6 px-4 sm:p-6 lg:pb-8 h-[calc(100%-80px)]">

                        
                        <div class="mb-14">
                            <h2 class="text-base leading-6 font-bold text-gray-900"><?php echo e(__('messages.t_preview_review')); ?>

                            </h2>
                            <p class="mt-1 text-sm text-gray-500"><?php echo e(__('messages.t_here_is_how_ur_review_looks_like')); ?>

                            </p>
                        </div>

                        
                        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                            
                            <div class="col-span-12 md:col-span-6">
                                <div class="bg-white relative block p-8 overflow-hidden border border-gray-100 rounded-lg mb-6">

                                    <span
                                        class="absolute inset-x-0 bottom-0 h-2  bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"
                                    ></span>

                                    <div class="flex items-center">
                                        <img src="<?php echo e(src($review->user->avatar)); ?>" alt="<?php echo e($review->user->username); ?>" class="h-8 w-8 rounded-full">
                                        <div class="ml-4 group">
                                            <a href="<?php echo e(url('profile', $review->user->username)); ?>" target="_blank" class="text-sm font-bold text-gray-900 flex items-center group-hover:text-indigo-600">
                                                <?php echo e($review->user->username); ?>

                                                <?php if($review->user->status === 'verified'): ?>
                                                    <svg data-tooltip-target="account-verified-badge" class="ltr:ml-0.5 rtl:mr-0.5 -mt-px" width="16px" height="16px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
                                                    <div id="account-verified-badge" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                        <?php echo e(__('messages.t_account_verified')); ?>

                                                    </div>
                                                <?php endif; ?>

                                                
                                                <?php if($review->user->country): ?>
                                                    <div class="ml-2">
                                                        <img src="<?php echo e(asset('img/flags/'. $review->user->country?->code .'.svg')); ?>" alt="<?php echo e($review->user->country?->name); ?>" class="h-3 -mt-px rounded-sm">
                                                    </div>
                                                <?php endif; ?>

                                            </a>
                                            <div class="mt-1 flex items-start">
                                                <div wire:ignore class="rating-item-container" data-rating-value="<?php echo e($review->rating); ?>"></div>
                                                <span class="ltr:ml-2 rtl:mr-2 text-[11px] font-normal text-gray-400"><span class="pr-2 text-gray-300">•</span> <?php echo e(format_date($review->created_at, 'ago')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                        
                                    
                                    <?php if($review->message): ?>
                                        <div class="mt-4 space-y-6 text-sm italic text-gray-600">
                                            <p><?php echo e($review->message); ?></p>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>

                            
                            <div class="col-span-12 md:col-span-6">
                                <div class="bg-white relative block p-8 overflow-hidden border border-gray-100 rounded-lg mb-6">
                                    <span
                                        class="absolute inset-x-0 bottom-0 h-2  bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"
                                    ></span>

                                    <div class="justify-between sm:flex">
                                        <div>
                                            <a href="<?php echo e(url('service', $review->gig->slug)); ?>" target="_blank" class="text-sm font-bold text-gray-900 hover:text-purple-700">
                                                <?php echo e($review->gig->title); ?>

                                            </a>
                                        </div>

                                        <div class="flex-shrink-0 hidden ltr:ml-3 rtl:mr-3 sm:block">
                                            <img
                                                class="object-cover w-16 h-16 rounded-lg shadow-sm"
                                                src="<?php echo e(src($review->gig->thumbnail)); ?>"
                                                alt="<?php echo e($review->gig->title); ?>"
                                            />
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</main>

<?php $__env->startPush('scripts'); ?>
    <script>
        function lRtoYGzyUMsMBKk() {
            return {

                init() {
                    window.rating({ target: "rating-item-container", fill: "#5b5b5b", background: "#cdcdcd" });
                }

            }
        }
        window.lRtoYGzyUMsMBKk = lRtoYGzyUMsMBKk();
    </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/main/account/reviews/options/preview.blade.php ENDPATH**/ ?>