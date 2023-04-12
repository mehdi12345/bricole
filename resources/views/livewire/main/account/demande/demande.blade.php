<main class="w-full" x-data>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                {{-- Sidebar --}}
                <aside class="lg:col-span-3 py-6" wire:ignore>
                    <x-main.account.sidebar />
                </aside>

                {{-- Section content --}}
                <div class="divide-y divide-gray-200 lg:col-span-9">

                    {{-- Form --}}
                    <div class="py-6 px-4 sm:p-6 lg:pb-8 h-[calc(100%-80px)]">

                        {{-- Section header --}}
                        <div class="mb-14">
                            <h2 class="text-base leading-6 font-bold text-gray-900">{{ __('messages.t_orders_history') }}</h2>
                            <p class="mt-1 text-sm text-gray-500">{{ __('messages.t_orders_history_subtitle') }}</p>
                        </div>

                        {{-- Session flash message --}}
                        @if (session()->has('message'))
                            <div class="bg-yellow-100 ltr:border-l-4 rtl:border-r-4 border-yellow-400 p-4 mb-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                                    </div>
                                    <div class="ltr:ml-3 rtl:mr-3">
                                        <p class="text-sm text-yellow-700 font-medium">
                                            {{ session()->get('message') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="bg-white dark:bg-gray-800 overflow-y-auto border !border-t-0 !border-b-0">
                            <table class="w-full whitespace-nowrap">
                                <thead class="bg-gray-100">
                                    <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white">
                                        <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">{{ __('messages.t_gig') }}</th>
                                        <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center">{{ __('messages.t_date') }}</th>
                                        <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center">{{ __('messages.t_status') }}</th>
                                        <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center">{{ __('messages.t_options') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="w-full">

                                    @foreach ($orders as $l)
                                        <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100" wire:key="list-{{ $l->id }}">

                                            {{-- Gig --}}
                                            <td class="ltr:pl-4 rtl:pr-4">
                                                <a href="{{ url('service', $l->gig->slug) }}" target="_blank" class="flex items-center">
                                                    <div class="w-8 h-8">
                                                        <img class="w-full h-full rounded object-cover" src="{{ src($l->gig->thumbnail) }}" alt="{{ $l->gig->title }}" />
                                                    </div>
                                                    <div class="ltr:pl-4 rtl:pr-4">
                                                        <p class="font-medium text-xs truncate max-w-lg block overflow-hidden">{{ $l->gig->title }}</p>
                                                        <p class="text-[11px] leading-3 text-gray-600 pt-2">{{$l->gig->price}} DH</p>
                                                    </div>
                                                </a>
                                            </td>

                                            {{-- Date --}}
                                            <td class="text-center">
                                                <span class="text-[11px] font-normal text-gray-400">{{ format_date($l->created_at, 'ago') }}</span>
                                            </td>


                                            {{-- status --}}
                                            <td class="text-center">
                                                <span class="text-[11px] font-normal text-gray-400">{{ $l->status }}</span>
                                            </td>
                                            {{-- Options --}}
                                            <td class="text-center">
                                                <div class="relative inline-block text-left">
                                                    <div>
                                                        <button data-dropdown-toggle="table-options-dropdown-{{ $l->id }}" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                                        </button>
                                                    </div>
                                                    <div id="table-options-dropdown-{{ $l->id }}" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                                        <div class="py-1" role="none">


                                                            {{-- Edit --}}
                                                            @if ($l->status === 'active')
                                                            <a href="{{ url('payment', $l->gig->id) }}" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"/></svg>
                                                                <span class="text-xs font-medium">payment platform</span>
                                                            </a>
                                                            @endif
                                                            {{-- requirement --}}
                                                                <div class="py-1" role="none">
                                                                    <a href="{{ url('account/orders/requirements',$l->id) }}" class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-b">
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
                                                            @if ($l->id_requirment > 0)
                                                                <div class="py-1" role="none">
                                                                    <button x-on:click="confirm('{{ __('messages.t_requirements') }}') ? $wire.dawland('{{ $l->id_requirment  }}','{{ $l->id }}') : ''"   class="flex items-center px-4 py-2 hover:bg-gray-100">
                                                                        <i class="mdi mdi-tray-arrow-down text-[20px] ltr:mr-3 rtl:ml-3 text-gray-500"></i>
                                                                        <span class="text-xs font-medium text-gray-700">{{ __('messages.t_delivered_work') }}</span>
                                                                    </button>
                                                                </div>
                                                            @endif

                                                        {{-- Delete --}}
                                                            <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_remove_from_favorite_list') }}') ? $wire.delete('{{ $l->id }}') : ''" wire:loading.attr="disabled" wire:target="delete('{{ $l->id }}')" type="button" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >

                                                                {{-- Loading indicator --}}
                                                                <div wire:loading wire:target="delete('{{ $l->id }}')">
                                                                    <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                    </svg>
                                                                </div>

                                                                {{-- Icon --}}
                                                                <div wire:loading.remove wire:target="delete('{{ $l->id }}')">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                                </div>

                                                                <span class="text-xs font-medium"> Delete from demande </span>

                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</main>
