<div class="container mx-auto" x-data="window.sxXCqbSjPWcHTfe">
    {{-- Please wait dialog --}}
    <div class="fixed top-0 left-0 z-50 bg-black w-full h-full opacity-80" wire:loading wire:target="progress">
        <div class="w-full h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="mx-auto w-12 h-12 text-gray-500 animate-spin dark:text-gray-600 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="text-xs font-medium tracking-wider text-white mt-4 block">{{ __('messages.t_please_wait_dots') }}</span>
            </div>
        </div>
    </div>

    {{-- Session messages --}}
    @if (session()->has('message'))
        <div class="bg-yellow-100 ltr:border-l-4 rtl:border-r-4 border-yellow-400 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div class="ltr:ml-3 rtl:mr-3">
                    <p class="text-sm text-yellow-700 font-medium">
                        {{ session()->get('message') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <div class="min-h-full bg-white shadow rounded-md">
<!--
    ['href' => "seller/portfolio", 'text' => __('messages.t_portfolio'), 'active' => false],
                ['href' => "seller/earnings", 'text' => __('messages.t_earnings'), 'active' => false],
                ['href' => "seller/withdrawals", 'text' => __('messages.t_withdrawals'), 'active' => false],
                ['href' => "seller/refunds", 'text' => __('messages.t_refunds'), 'active' => false], -->

        @php

            // Set links
            $links = [
                ['href' => "seller/home", 'text' => __('messages.t_home'), 'active' => false],
                ['href' => "seller/orders", 'text' => __('messages.t_orders_history'), 'active' => false],
                ['href' => "seller/gigs", 'text' => __('messages.t_my_gigs'), 'active' => false],
                ['href' => "seller/reviews", 'text' => __('messages.t_reviews'), 'active' => false],
                ['href' => "seller/demande", 'text' => __('messages.t_demande'), 'active' => true],

            ]

        @endphp



        {{-- Section Navbar --}}
        <nav class="" x-data="{ open:false }">
            <div class="mx-auto border-b border-gray-200 px-4 sm:px-6 lg:px-8">
                <div class="relative h-16 flex items-center justify-between">

                    {{-- Header links (Desktop) --}}
                    <div class="flex items-center">
                        <div class="hidden lg:block lg:ml-10">
                            <div class="flex space-x-4 rtl:space-x-reverse">

                                @foreach ($links as $link)
                                    <a href="{{ url($link['href']) }}" class="{{ $link['active'] ? 'bg-gray-100' : 'hover:text-gray-700 hover:bg-gray-50' }} px-3 py-2 rounded-md text-sm font-medium text-gray-900" aria-current="page">{{ $link['text'] }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    {{-- Header links mobile --}}
                    <div class="flex lg:hidden">

                        {{-- Burger menu button --}}
                        <button type="button" class="bg-gray-50 p-2 inline-flex items-center justify-center rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                            <span class="sr-only">Open main menu</span>
                            <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 hidden" :class="{'hidden': open, 'block': !(open)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path> </svg> <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 block" :class="{'block': open, 'hidden': !(open)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> </svg>
                        </button>


                    </div>

                    {{-- Pending orders --}}
                    @if (auth()->user()->sales->where('status', 'pending')->count())
                        <div class="hidden lg:block">
                            <span class="relative inline-flex">
                                <span class="inline-flex items-center px-4 py-2 font-medium leading-6 text-xs transition ease-in-out duration-150 text-amber-600">
                                    {{ __('messages.t_number_pending_orders', ['number' => number_format(auth()->user()->sales->where('status', 'pending')->count())]) }}
                                </span>
                                <span class="flex absolute h-3 w-3 top-[13px] ltr:-left-1 rtl:-right-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-500 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-600"></span>
                                </span>
                            </span>
                        </div>
                    @endif

                </div>
            </div>

            {{-- Mobile menu --}}
            <div class="bg-gray-100 border-b border-gray-200 lg:hidden" x-show="open">
                <div class="px-2 pt-2 pb-3 space-y-1">

                    @foreach ($links as $link)
                        <a href="{{ url($link['href']) }}" class="{{ $link['active'] ? 'bg-gray-200' : 'hover:bg-gray-200' }} block px-3 py-2 rounded-md font-bold tracking-wide text-gray-900 text-xs">
                            {{ $link['text'] }}
                        </a>
                    @endforeach

                </div>
            </div>

        </nav>

        {{-- Section heading --}}
        <header class="bg-gray-50 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-between">
                <div class="flex-1 min-w-0">

                    {{-- Breadcrumb --}}
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol role="list" class="flex items-center space-x-4 rtl:space-x-reverse">

                            {{-- Main homepage --}}
                            <li>
                                <div>
                                    <a href="{{ url('/') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('messages.t_home') }}</a>
                                </div>
                            </li>

                            {{-- Seller dashboard --}}
                            <li>
                                <div class="flex items-center">

                                    {{-- LTR --}}
                                    <svg class="hidden ltr:block flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>

                                    {{-- RTL --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-5 w-5 text-gray-400 viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                    <a href="{{ url('seller/home') }}" class="ltr:ml-4 rtl:mr-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('messages.t_dashboard') }}</a>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    {{-- Title --}}
                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate">{{ __('messages.t_orders_history') }}</h1>

                    {{-- Quick stats --}}
                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-8 rtl:space-x-reverse">

                        {{-- User level --}}
                        <div class="mt-2 flex items-center text-xs font-medium" style="color: {{ auth()->user()->level->level_color }}">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4" style="color: {{ auth()->user()->level->level_color }};margin-top: -3px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/> <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/> </svg>
                            {{ auth()->user()->level->title }}
                        </div>

                        {{-- Succeeded sales --}}
                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>
                            {{ __('messages.t_total_sales_number', ['number' => number_format(auth()->user()->sales->where('status', 'delivered')->where('is_finished', true)->count())]) }}
                        </div>

                        {{-- Country --}}
                        @if (auth()->user()->country)
                            <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                                <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/> </svg>
                                {{ auth()->user()->country->name }}
                            </div>
                        @endif

                        {{-- Sign up date --}}
                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/> </svg>
                            {{ __('messages.t_signed_up_on_date', ['date' => format_date(auth()->user()->created_at, 'F j, Y')]) }}
                        </div>

                    </div>

                </div>
                <div class="mt-5 flex xl:mt-0 xl:ltr:ml-4 xl:rtl:mr-4">

                    <!-- {{-- Withdrawal earnings --}}
                    <span class="hidden sm:block ltr:mr-3 rtl:ml-4">
                        <a href="{{ url('seller/withdrawals/create') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500">
                            {{ __('messages.t_withdrawal_earnings') }}
                        </a>
                    </span> -->

                    {{-- Publish new gig --}}
                    <span class="hidden sm:block ltr:mr-3 rtl:ml-4">
                        <a href="{{ url('create') }}" class="inline-flex items-center px-4 py-2 border border-purple-500 rounded-sm shadow-sm text-[13px] font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-purple-50 focus:ring-purple-700">
                            {{ __('messages.t_publish_new_gig') }}
                        </a>
                    </span>

                </div>
            </div>
        </header>

        <main class="pb-12">

        {{-- Table --}}
            <div class="w-full">
                <div class="flex flex-col">
                    <div class="-my-2">
                        <div class="inline-block w-full py-2 align-middle overflow-y-auto">
                            <table class="w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr class="divide-x divide-gray-50">
                                        <th scope="col" class="px-10 py-3 ltr:text-left rtl:text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('messages.t_gig') }}</th>
                                        <th scope="col" class="px-10 py-3 ltr:text-left rtl:text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('messages.t_buyer') }}</th>
                                        <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('messages.t_status') }}</th>
                                        <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('messages.t_date') }}</th>
                                        <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('messages.t_options') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @forelse ($demandes as $review)
                                        <tr wire:key="seller-reviews-id-{{ $review->id }}">

                                            {{-- Gig --}}
                                            <td class="whitespace-nowrap py-4 ltr:pl-10 rtl:pr-10 ltr:pr-3 rtl:pl-3 text-sm font-medium text-gray-900 sm:ltr:pl-10 sm:rtl:pr-10">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ src($review->gig->thumbnail) }}" alt="{{ $review->gig->title }}">
                                                    </div>
                                                    <div class="ltr:ml-4 rtl:mr-4">
                                                        <a href="{{ url('service', $review->gig->slug) }}" target="_blank" class="font-medium text-gray-900 pb-1 hover:text-indigo-600 block">{{ $review->gig->title }}</a>
                                                        <div class="text-gray-500 font-normal">
                                                            <nav class="flex" aria-label="Breadcrumb">
                                                                <ol role="list" class="flex items-center space-x-4 rtl:space-x-reverse">

                                                                    {{-- Parent category --}}
                                                                    <li>
                                                                        <div class="flex items-center">
                                                                            <a href="{{ url('categories', $review->gig->category->slug) }}" target="_blank" class="text-xs font-normal text-gray-500 hover:text-gray-700">{{ $review->gig->category->name }}</a>
                                                                        </div>
                                                                    </li>

                                                                    {{-- Subcategory --}}
                                                                    <li>
                                                                        <div class="flex items-center">

                                                                            {{-- LTR --}}
                                                                            <svg class="hidden ltr:block flex-shrink-0 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/> </svg>

                                                                            {{-- RTL --}}
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                                                            <a href="{{ url('categories/' . $review->gig->category->slug . '/' . $review->gig->subcategory->slug) }}" target="_blank" class="ltr:ml-4 rtl:mr-4 text-xs font-normal text-gray-500 hover:text-gray-700" aria-current="page">{{ $review->gig->subcategory->name }}</a>
                                                                        </div>
                                                                    </li>
                                                                </ol>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- Buyer --}}
                                            <td class="whitespace-nowrap py-4 ltr:pl-10 rtl:pr-10 ltr:pr-3 rtl:pl-3 text-sm font-medium text-gray-900 sm:ltr:pl-10 sm:rtl:pr-10">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ src($review->user->avatar) }}" alt="{{ $review->user->username }}">
                                                    </div>
                                                    <div class="ltr:ml-4 rtl:mr-4">
                                                        <a href="{{ url('profile', $review->user->username) }}" target="_blank" class="font-medium text-gray-900 pb-1 hover:text-indigo-600 block">{{ $review->user->username }}</a>
                                                        <div class="text-gray-500 font-normal">
                                                            @if ($review->user->fullname)
                                                                {{ $review->user->fullname }}
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- Rating --}}
                                            <td class="text-center font-medium text-sm text-gray-800">
                                                {{ $review->status }}
                                            </td>

                                            {{-- Clicks --}}
                                            <td class="text-center font-medium text-sm text-gray-800">
                                                {{ format_date($review->created_at, 'ago') }}
                                            </td>

                                            {{-- Options --}}
                                            <td class="text-center">
                                                <div class="relative inline-block text-left">
                                                    <div class="z-0">
                                                        <button data-dropdown-toggle="seller-gigs-options-{{ $review->id }}" data-dropdown-placement="left-start" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0 z-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                                        </button>
                                                    </div>
                                                    <div id="seller-gigs-options-{{ $review->id }}" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">

                                                    {{-- accepter --}}
                                                    @if ( $review->status != "active")
                                                        <div class="py-1" role="none">
                                                                <button x-on:click="confirm('Are you sure you want to accepter this gig?') ? $wire.accepter('{{ $review->id }}') : ''" wire:loading.attr="disabled" wire:target="delete('{{ $review->id }}')" type="button" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >
                                                                    {{-- Loading indicator --}}
                                                                    <div wire:loading wire:target="accepter('{{ $review->id }}')">
                                                                    <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                    </svg>
                                                                    </div>

                                                                    {{-- Icon --}}
                                                                    <div wire:loading.remove wire:target="accepter('{{ $review->id }}')">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                                                    </div>
                                                                    <span class="text-xs font-medium"> Accepter </span>
                                                                </button>
                                                        </div>
                                                        @endif

                                                        <!-- {{-- Send requirements --}}
                                                                        @if (($review->status === 'active'))
                                                                        <div class="py-1" role="none">
                                                                            <li>
                                                                                <a href="{{ url('account/orders/requirements') }}"  class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-b">
                                                                                    <i class="mdi mdi-send text-[20px] ltr:mr-3 rtl:ml-3 text-gray-500"></i>
                                                                                    <span class="text-xs font-medium text-gray-700">{{ __('messages.t_send_requirements') }}</span>
                                                                                </a>
                                                                            </li>
                                                                        </div>
                                                                        @endif -->


                                                        {{-- requirement --}}
                                                        <div class="py-1" role="none">
                                                        <a href="{{ url('account/orders/requirements',$review->id) }}" class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-b">
                                                                    {{-- Loading indicator --}}
                                                                    {{-- Icon --}}
                                                                    <div>
                                                                    <i class="mdi mdi-send text-[20px] ltr:mr-3 rtl:ml-3 text-gray-500"></i>
                                                                        <!-- <svg class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg> -->
                                                                    </div>

                                                                    <span class="text-xs font-medium">{{ __('messages.t_send_requirements') }}</span>

                                                         </a>
                                                        </div>

                                                        {{-- dawland requirement --}}
                                                            @if ($review->id_requirment > 0)
                                                                <div class="py-1" role="none">
                                                                    <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_remove_from_favorite_list') }}') ? $wire.dawland('{{ $review->id_requirment  }}','{{ $review->id }}') : ''"   class="flex items-center px-4 py-2 hover:bg-gray-100">
                                                                        <i class="mdi mdi-tray-arrow-down text-[20px] ltr:mr-3 rtl:ml-3 text-gray-500"></i>
                                                                        <span class="text-xs font-medium text-gray-700">{{ __('messages.t_delivered_work') }}</span>
                                                                    </button>
                                                                </div>
                                                            @endif



                                                        {{-- Delete --}}
                                                        <div class="py-1" role="none">
                                                                <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_delete_gig') }}') ? $wire.delete('{{ $review->id }}') : ''" wire:loading.attr="disabled" wire:target="delete('{{ $review->id }}')" type="button" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >

                                                                    {{-- Loading indicator --}}
                                                                    <div wire:loading wire:target="delete('{{ $review->id }}')">
                                                                        <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                        </svg>
                                                                    </div>

                                                                    {{-- Icon --}}
                                                                    <div wire:loading.remove wire:target="delete('{{ $review->id }}')">
                                                                        <svg class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                                                                    </div>

                                                                    <span class="text-xs font-medium">{{ __('messages.t_delete_gig') }}</span>

                                                                </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>


                                        </tr>
                                    @empty

                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
</div>

@push('scripts')

    {{-- SweetAlert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- AlpineJs --}}
    <script>
        function sxXCqbSjPWcHTfe() {
            return {

                // Get started
                progress(id) {
                    Swal.fire({
                        title            : '<span class="text-sm font-bold tracking-wider text-gray-700 leading-3 py-8">{{ __("messages.t_buyer_didnt_send_requirements_yet_continue") }}</span>',
                        showCancelButton : true,
                        confirmButtonText: '{{ __("messages.t_i_have_all_info_needed") }}',
                        customClass      : {
                            actions      : '!justify-between !w-full !px-12 !mt-14',
                            cancelButton : '!bg-gray-50 !text-gray-800 !text-xs !font-bold !tracking-wider !py-3',
                            confirmButton: '!bg-indigo-600 !text-white !text-xs !font-bold !tracking-wider !py-3',
                        }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                @this.progress(id);
                                Swal.close();
                            }
                    });
                }

            }
        }
        window.sxXCqbSjPWcHTfe = sxXCqbSjPWcHTfe();
    </script>

@endpush
