<div class="w-full" x-data="window.vjOXhkLsunWIxQy" x-init="init()" x-cloak>
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        
        <?php if($user->availability): ?>
            <div class="col-span-12">
                <div class="rounded-md bg-amber-100 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                        </div>
                        <div class="ltr:ml-3 rtl:mr-3">
                            <h3 class="text-sm font-medium text-amber-800"><?php echo e(__('messages.t_attention_needed')); ?></h3>
                            <div class="mt-2 text-sm text-amber-700">
                                <span class="text-xs font-medium mb-3 block"><?php echo e(__('messages.t_this_user_is_not_available_right_now_msg', ['date' => format_date($user->availability->expected_available_date, 'F j, Y')])); ?></span>
                                <div class="italic text-xs border-l-4 border-amber-500 pl-2">
                                    <?php echo e($user->availability->message); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        
        <div class="col-span-12 lg:col-span-4">

            
            <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden mb-6">
                <div class="md:flex">
                    <div class="w-full p-2 py-10">

                        <div class="flex justify-center">
                            <div class="relative">

                                
                                <img src="<?php echo e(src($user->avatar)); ?>" alt="<?php echo e($user->username); ?>" class="rounded-full w-20 h-20 object-cover">

                                
                                <?php if($user->isOnline() && !$user->availability): ?>
                                    
                                    <span class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-green-400 rounded-full"></span>
                                <?php elseif($user->availability): ?>
                                    
                                    <span class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-gray-600 rounded-full"></span>
                                <?php else: ?>
                                    
                                    <span class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-red-600 rounded-full"></span>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="flex flex-col text-center mt-3 mb-4">
                            <span class="text-md font-extrabold text-gray-800 flex items-center justify-center">
                                <?php echo e($user->username); ?>

                                <?php if($user->status === 'verified'): ?>
                                    <svg data-tooltip-target="account-verified-badge" class="ltr:ml-0.5 rtl:mr-0.5" width="17px" height="17px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
                                    <div id="account-verified-badge" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        <?php echo e(__('messages.t_account_verified')); ?>

                                    </div>
                                <?php endif; ?>
                            </span>
                            <span class="text-sm text-gray-400"><?php echo e($user->headline); ?></span>
                        </div>

                        <p class="px-16 text-center text-sm text-gray-500 italic">
                            <?php echo e($user->description); ?>

                        </p>

                        
                        <!-- <div class="px-14 mt-8">

                            
                            <a href="<?php echo e(url('messages/new', $user->username)); ?>" class="flex items-center justify-center h-12 bg-indigo-600 w-full text-white text-sm font-medium rounded hover:shadow hover:bg-indigo-700 <?php echo e(auth()->check() && auth()->id() !== $user->id ? 'mb-4' : ''); ?>"><?php echo e(__('messages.t_contact_me')); ?></a>

                            
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(auth()->id() !== $user->id): ?>
                                    <button id="modal-report-button" type="button" class="h-12 bg-gray-200 w-full text-black text-sm font-medium rounded hover:shadow hover:bg-gray-300 mb-2"><?php echo e(__('messages.t_report')); ?></button>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div> -->

                    </div>

                </div>
            </div>

            
            <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden mb-6">
                <div class="px-4 py-5 sm:px-6 bg-gray-50">
                    <h3 class="text-base leading-6 font-bold text-gray-900">
                        <?php echo e(__('messages.t_details')); ?>

                    </h3>
                    <p class="mt-1 max-w-2xl text-sm font-normal text-gray-500">
                        <?php echo e(__('messages.t_more_details_about_this_user')); ?>

                    </p>
                </div>
                <div class="border-t-2 border-gray-100 px-4 py-5 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-100">

                        
                        <?php if($user->fullname): ?>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <?php echo e(__('messages.t_fullname')); ?>

                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo e($user->fullname); ?>

                                </dd>
                            </div>
                        <?php endif; ?>


                        
                        <?php if($user->phon): ?>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <?php echo e(__('messages.t_phone_number')); ?>

                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo e($user->phon); ?>

                                </dd>
                            </div>
                        <?php endif; ?>


                        
                        <?php if($user->email): ?>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <?php echo e(__('messages.t_email_address')); ?>

                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo e($user->email); ?>

                                </dd>
                            </div>
                        <?php endif; ?>

                        
                        <?php if($user->country): ?>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <?php echo e(__('messages.t_country')); ?>

                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 flex items-center">
                                    <img src="<?php echo e(asset('img/flags/rounded/'. $user->country?->code .'.svg')); ?>" alt="<?php echo e($user->country?->name); ?>" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                                    <span><?php echo e($user->country?->name); ?></span>
                                </dd>
                            </div>
                        <?php endif; ?>

                        
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <?php echo e(__('messages.t_level')); ?>

                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <?php echo e($user->level?->title); ?>

                            </dd>
                        </div>

                        
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <?php echo e(__('messages.t_member_since')); ?>

                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <?php echo e(format_date($user->created_at, 'F j, Y')); ?>

                            </dd>
                        </div>

                        
                        <?php if($user->account_type === 'seller' && $last_delivery): ?>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <?php echo e(__('messages.t_last_delivery')); ?>

                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo e(format_date($last_delivery, 'ago')); ?>

                                </dd>
                            </div>
                        <?php endif; ?>

                    </dl>
                </div>
            </div>

            
            <?php if($user->account_type === 'seller' && count($user->projects)): ?>
                <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden mb-6">
                    <div class="px-4 py-5 sm:px-6 bg-gray-50">
                        <h3 class="text-base leading-6 font-bold text-gray-900">
                            <?php echo e(__('messages.t_portfolio')); ?>

                        </h3>
                        <p class="mt-1 max-w-2xl text-sm font-normal text-gray-500">
                            <?php echo e(__('messages.t_see_my_latest_works')); ?>

                        </p>
                    </div>
                    <div class="border-t-2 border-gray-100 px-4 py-5 sm:p-0">
                        <div class="px-6 py-5">
                            <div class="container-mansory mb-4">

                                <?php $__currentLoopData = $user->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($project->status === 'active'): ?>
                                        <figure>
                                            <a href="<?php echo e(url('projects', $project->slug)); ?>" target="_blank">
                                                <img src="<?php echo e(src($project->thumbnail)); ?>" alt="<?php echo e($project->title); ?>" class="rounded-md hover:opacity-75 object-cover" />
                                            </a>
                                        </figure>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                            <a href="<?php echo e(url('profile/' . $user->username . '/portfolio')); ?>" target="_blank" class="block mt-8 text-center text-xs font-bold text-indigo-600 hover:underline"><?php echo e(__('messages.t_view_my_porfolio')); ?></a>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

            
            <?php if(count($user->skills)): ?>
                <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden mb-6">
                    <div class="px-4 py-5 sm:px-6 bg-gray-50">
                        <h3 class="text-base leading-6 font-bold text-gray-900">
                            <?php echo e(__('messages.t_skills')); ?>

                        </h3>
                        <p class="mt-1 max-w-2xl text-sm font-normal text-gray-500">
                            <?php echo e(__('messages.t_user_skills_and_hobbies')); ?>

                        </p>
                    </div>
                    <div class="border-t-2 border-gray-100 px-4 py-5 sm:p-0">

                        
                        <?php $__currentLoopData = $user->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(url('hire', $skill->slug)); ?>" class="block mb-1 px-6 py-5">
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700"><?php echo e($skill->name); ?></span>
                                    <span class="text-xs font-normal text-gray-600"><?php echo e(__('messages.t_' . $skill->experience)); ?></span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <?php switch($skill->experience):
                                        case ('beginner'): ?>
                                            <div class="bg-gray-500 h-2 rounded-full" style="width: 33%"></div>
                                            <?php break; ?>
                                        <?php case ('intermediate'): ?>
                                            <div class="bg-indigo-600 h-2 rounded-full" style="width: 67%"></div>
                                            <?php break; ?>
                                        <?php case ('pro'): ?>
                                            <div class="bg-green-400 h-2 rounded-full" style="width: 100%"></div>
                                            <?php break; ?>
                                    <?php endswitch; ?>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            <?php endif; ?>

            
            <?php if($user->accounts): ?>
                <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden mb-6">
                    <div class="px-4 py-5 sm:px-6 bg-gray-50">
                        <h3 class="text-base leading-6 font-bold text-gray-900">
                            <?php echo e(__('messages.t_linked_accounts')); ?>

                        </h3>
                        <p class="mt-1 max-w-2xl text-sm font-normal text-gray-500">
                            <?php echo e(__('messages.t_follow_me_on_other_social_networks')); ?>

                        </p>
                    </div>
                    <div class="border-t-2 border-gray-100 px-4 py-5 sm:p-0">
                        <div class="px-6 py-5 space-x-2 space-y-4 text-center rtl:space-x-reverse">

                            
                            <?php if($user->accounts->facebook_profile): ?>
                                <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user->accounts->facebook_profile))); ?>" target="_blank" class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:outline-none rounded-full text-center inline-flex items-center h-10 w-10 justify-center">
                                    <i class="si si-facebook"></i>
                                </a>
                            <?php endif; ?>

                            
                            <?php if($user->accounts->twitter_profile): ?>
                                <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user->accounts->twitter_profile))); ?>" target="_blank" class="text-white bg-[#00acee] hover:bg-[#00acee]/90 focus:outline-none rounded-full text-center inline-flex items-center h-10 w-10 justify-center">
                                    <i class="si si-twitter"></i>
                                </a>
                            <?php endif; ?>

                            
                            <?php if($user->accounts->dribbble_profile): ?>
                                <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user->accounts->dribbble_profile))); ?>" target="_blank" class="text-white bg-[#ea4c89] hover:bg-[#ea4c89]/90 focus:outline-none rounded-full text-center inline-flex items-center h-10 w-10 justify-center">
                                    <i class="si si-dribbble"></i>
                                </a>
                            <?php endif; ?>

                            
                            <?php if($user->accounts->stackoverflow_profile): ?>
                                <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user->accounts->stackoverflow_profile))); ?>" target="_blank" class="text-white bg-[#ef8236] hover:bg-[#ef8236]/90 focus:outline-none rounded-full text-center inline-flex items-center h-10 w-10 justify-center">
                                    <i class="si si-stackoverflow"></i>
                                </a>
                            <?php endif; ?>

                            
                            <?php if($user->accounts->github_profile): ?>
                                <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user->accounts->github_profile))); ?>" target="_blank" class="text-white bg-[#171515] hover:bg-[#171515]/90 focus:outline-none rounded-full text-center inline-flex items-center h-10 w-10 justify-center">
                                    <i class="si si-github"></i>
                                </a>
                            <?php endif; ?>

                            
                            <?php if($user->accounts->youtube_profile): ?>
                                <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user->accounts->youtube_profile))); ?>" target="_blank" class="text-white bg-[#FF0000] hover:bg-[#FF0000]/90 focus:outline-none rounded-full text-center inline-flex items-center h-10 w-10 justify-center">
                                    <i class="si si-youtube"></i>
                                </a>
                            <?php endif; ?>

                            
                            <?php if($user->accounts->vimeo_profile): ?>
                                <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user->accounts->vimeo_profile))); ?>" target="_blank" class="text-white bg-[#86c9ef] hover:bg-[#86c9ef]/90 focus:outline-none rounded-full text-center inline-flex items-center h-10 w-10 justify-center">
                                    <i class="si si-vimeo"></i>
                                </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

            
            <?php if(count($user->languages)): ?>
                <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden mb-6">
                    <div class="px-4 py-5 sm:px-6 bg-gray-50">
                        <h3 class="text-base leading-6 font-bold text-gray-900">
                            <?php echo e(__('messages.t_languages')); ?>

                        </h3>
                        <p class="mt-1 max-w-2xl text-sm font-normal text-gray-500">
                            <?php echo e(__('messages.t_list_of_languages_i_speak')); ?>

                        </p>
                    </div>
                    <div class="border-t-2 border-gray-100 px-4 py-5 sm:p-0">
                        <div class="py-5 grid items-center">

                            
                            <ul class="-my-5 divide-y divide-gray-100">
                                <?php $__currentLoopData = $user->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="py-4 px-6">
                                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                            <div class="flex-shrink-0 h-8 w-8 rounded-full flex justify-center items-center bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/></svg>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-xs font-bold text-gray-900 truncate">
                                                    <?php echo e($lang->name); ?>

                                                </p>
                                            </div>
                                            <div>
                                                <span class="text-xs text-gray-400 font-medium"><?php echo e(__('messages.t_' . $lang->level)); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        
        <div class="col-span-12 lg:col-span-8">
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                
                <?php $__empty_1 = true; $__currentLoopData = $gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    
                    <div class="col-span-12 lg:col-span-6 xl:col-span-4 md:col-span-6 sm:col-span-6">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig, 'profile_visible' => false])->html();
} elseif ($_instance->childHasBeenRendered("gig-item-" . $gig->uid)) {
    $componentId = $_instance->getRenderedChildComponentId("gig-item-" . $gig->uid);
    $componentTag = $_instance->getRenderedChildComponentTagName("gig-item-" . $gig->uid);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild("gig-item-" . $gig->uid);
} else {
    $response = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig, 'profile_visible' => false]);
    $html = $response->html();
    $_instance->logRenderedChild("gig-item-" . $gig->uid, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <div class="col-span-12">
                        <div class="py-14 px-6 text-center text-sm sm:px-14 border-dashed border-2">
                            <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/> </svg>
                            <p class="mt-4 font-semibold text-gray-900"><?php echo e(__('messages.no_results_found')); ?></p>
                            <p class="mt-2 text-gray-500"><?php echo e(__('messages.t_we_couldnt_find_anthing_search_term')); ?></p>
                        </div>
                    </div>

                <?php endif; ?>

                
                <?php if($gigs->hasPages()): ?>
                    <div class="col-span-12 flex justify-center pt-12">
                        <?php echo $gigs->links('pagination::tailwind'); ?>

                    </div>
                <?php endif; ?>

            </div>
        </div>

    </div>

    
    <?php if(auth()->check() && auth()->id() !== $user->id): ?>
        <?php if (isset($component)) { $__componentOriginal7f2ffadb3529b0da5f15e93a160bb50fa776283f = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-report-container','target' => 'modal-report-button','uid' => 'modal_'.e(uid()).'','placement' => 'center-center','size' => 'max-w-md']); ?>

            
             <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_report_user')); ?> <?php $__env->endSlot(); ?>

            
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_reason')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_report_user_reason_placeholder')),'model' => 'reason','icon' => 'message-question']); ?>
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
<?php $component->withAttributes(['action' => 'report','text' => ''.e(__('messages.t_report')).'','block' => 0]); ?>
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

</div>

<?php $__env->startPush('scripts'); ?>

    
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/js/splide-extension-video.min.js"></script>

    
    <script>
        function vjOXhkLsunWIxQy() {
            return {

                open: false,

                // Init component
                init() {

                    // Init splidejs
                    window.splidejs();

                }

            }
        }
        window.vjOXhkLsunWIxQy = vjOXhkLsunWIxQy();
    </script>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide-core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/themes/splide-default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/css/splide-extension-video.min.css">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-icons-font@v5/font/simple-icons.min.css" type="text/css">

<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\main\bricole\resources\views/livewire/main/profile/profile.blade.php ENDPATH**/ ?>