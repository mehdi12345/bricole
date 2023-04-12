<div x-data="window.XnbzELJbXoSEFED" x-init="init()" x-cloak>


    <div class="group -m-2 p-2 flex items-center cursor-pointer" @click="open = !open">
        <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500" x-description="Heroicon name: outline/shopping-cart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path> </svg>
        <span class="ltr:ml-2 rtl:mr-2 text-sm font-medium text-gray-700 group-hover:text-gray-800"><?php echo e(count($cart)); ?></span>
    </div>


    <div @keydown.window.escape="open = false" x-show="open" class="fixed inset-0 overflow-hidden z-50" x-ref="dialog" aria-modal="true" x-cloak>
        <div class="absolute inset-0 overflow-hidden">


            <div
                x-show="open"
                x-transition:enter="ease-in-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in-out duration-500"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="open = false" aria-hidden="true">
            </div>


            <div class="pointer-events-none fixed inset-y-0 ltr:right-0 rtl:left-0 flex max-w-full ltr:pl-10 rtl:pr-10">
                <div
                    x-show="open"
                    x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" x-transition:enter-start="ltr:translate-x-full rtl:-translate-x-full"
                    x-transition:enter-end="ltr:translate-x-0 rtl:-translate-x-0"
                    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" x-transition:leave-start="ltr:translate-x-0 rtl:-translate-x-0"
                    x-transition:leave-end="ltr:translate-x-full rtl:-translate-x-full"
                    class="pointer-events-auto w-screen max-w-xs lg:max-w-md">
                    <div class="flex h-full flex-col bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between rtl:flex-row-reverse">
                                <h2 class="text-base tracking-wide font-extrabold text-gray-900"> <?php echo e(__('messages.t_my_shopping_cart')); ?> </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500" @click="open = false">
                                        <span class="sr-only">Close panel</span>
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <?php if (count($cart)): ?>
                                <div class="mt-12">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200">

                                            <?php $__currentLoopData = $cart;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $key => $item): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                                                <li class="flex py-6" wire:key="shopping-cart-nav-item-<?php echo e($key); ?>">
	                                                    <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md">
	                                                        <img src="<?php echo e($item['gig']['thumbnail']); ?>" alt="<?php echo e($item['gig']['title']); ?>" class="h-full w-full object-cover object-center">
	                                                    </div>
	                                                    <div class="ltr:ml-4 rtl:mr-4 flex flex-1 flex-col">
	                                                        <div>
	                                                            <div class="flex justify-between text-sm font-medium text-gray-900">
	                                                                <h3 class="ltr:pr-2 rtl:pl-2 truncate w-32 lg:w-auto">
	                                                                    <a href="<?php echo e(url('service', $item['gig']['slug'])); ?>" target="_blank" class="hover:text-indigo-600 font-bold truncate w-52 block"> <?php echo e($item['gig']['title']); ?> </a>
	                                                                </h3>
	                                                                <p class="ltr:ml-5 rtl:mr-5 font-[Lato] font-black text-gray-500 pt-0.5"><?php echo money($this->itemTotalPrice($item['id']), settings('currency')->code, true); ?></p>
	                                                            </div>
	                                                        </div>
	                                                        <div class="flex flex-1 items-end justify-between text-xs">
	                                                            <p class="text-gray-500"><?php echo e(__('messages.t_quantity_number', ['number' => $item['quantity']])); ?></p>
	                                                            <div class="flex">
	                                                                <button type="button" wire:click="remove('<?php echo e($item["id"]); ?>')" wire:loading.attr="disabled" wire:target="remove('<?php echo e($item["id"]); ?>')" class="font-medium text-red-600 hover:text-red-500">


	                                                                    <div wire:loading wire:target="remove('<?php echo e($item["id"]); ?>')">
	                                                                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
	                                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
	                                                                        </svg>
	                                                                    </div>


	                                                                    <div wire:loading.remove wire:target="remove('<?php echo e($item["id"]); ?>')">
	                                                                        <?php echo e(__('messages.t_remove')); ?>

	                                                                    </div>
	                                                                </button>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                </li>
	                                            <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>

                                        </ul>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="py-14 px-6 text-center sm:px-14 border-2 border-dashed mt-24">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-7 w-7 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>
                                    <p class="mt-4 font-semibold text-gray-900 text-base"><?php echo e(__('messages.t_ur_cart_is_empty')); ?></p>
                                    <p class="mt-2 text-gray-500 text-sm font-normal"><?php echo e(__('messages.t_ur_cart_is_empty_subtitle')); ?></p>
                                </div>
                            <?php endif;?>

                        </div>
                        <?php if (count($cart)): ?>
                            <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p><?php echo e(__('messages.t_subtotal')); ?></p>
                                    <p class="font-black font-[Lato]"><?php echo money($this->total(), settings('currency')->code, true); ?></p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500"><?php echo e(__('messages.t_tax_fees_calculated_at_checkout')); ?></p>
                                <div class="mt-6">
                                    <a href="<?php echo e(url('cart')); ?>" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700"><?php echo e(__('messages.t_view_cart')); ?></a>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        <?php echo e(__('messages.t_or')); ?> <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500" @click="open = false"><?php echo e(__('messages.t_continue_shopping')); ?><span aria-hidden="true"> →</span></button>
                                    </p>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->startPush('scripts');?>
    <script>
        function XnbzELJbXoSEFED() {
            return {
                open: false,

                init() {
                    window.addEventListener('cart-updated', () => {
                        Livewire.emit('cart-updated')
                    });
                }
            }
        }
        window.XnbzELJbXoSEFED = XnbzELJbXoSEFED();
    </script>
<?php $__env->stopPush();?><?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/main/partials/cart.blade.php ENDPATH**/?>