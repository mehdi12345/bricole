<div class="w-full">

    {{-- Section title --}}
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                {{ __('messages.t_articles') }}
            </p>
            <div>
                <a href="{{ admin_url('blog/create') }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-indigo-600 hover:bg-indigo-700 focus:outline-none rounded-sm">
                    <p class="text-xs font-normal tracking-wide leading-none text-white">{{ __('messages.t_create') }}</p>
                </a>
            </div>
        </div>
    </div>

    {{-- Section content --}}
    <div class="bg-white dark:bg-gray-800 overflow-y-auto border !border-t-0 !border-b-0">
        <table class="w-full whitespace-nowrap">
            <thead class="bg-gray-200">
                <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800">
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">{{ __('messages.t_article') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center">{{ __('messages.t_comments') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center">{{ __('messages.t_reading_time') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center">{{ __('messages.t_options') }}</th>
                </tr>
            </thead>
            <tbody class="w-full">

                @foreach ($articles as $article)
                    <tr class="focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100" wire:key="articles-{{ $article->id }}">

                        {{-- Article --}}
                        <td class="ltr:pl-4 ltr:pr-10 rtl:pr-4 rtl:pl-10 w-[40%]">
                            <div class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover" src="{{ src($article->image) }}" alt="{{ $article->title }}" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <a href="{{ url('blog', $article->slug) }}" target="_blank" class="font-medium text-xs hover:text-indigo-600 truncate pb-1.5 block max-w-xs">{{ $article->title }}</a>
                                    <div class="flex items-center text-[11px] font-normal text-gray-400">
                                        <span class="hover:text-gray-600">{{ $article->slug }}</span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        {{-- Comments --}}
                        <td class="text-center">
                            <p class="font-black font-[Lato] text-xs">{{ number_format($article->comments_count) }}</p>
                        </td>

                        {{-- Reading time --}}
                        <td class="text-center">
                            <p class="font-black font-[Lato] text-xs">{{ __('messages.t_reading_time_x_minute', ['time' => number_format($article->reading_time)]) }}</p>
                        </td>

                        {{-- Options --}}
                        <td class="text-center">
                            <div class="relative inline-block text-left">
                                <div>
                                    <button data-dropdown-toggle="table-options-dropdown-{{ $article->id }}" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                    </button>
                                </div>
                                <div id="table-options-dropdown-{{ $article->id }}" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="py-1" role="none">

                                        {{-- Edit --}}
                                        <a href="{{ admin_url('blog/edit/' . $article->slug) }}" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                            <span class="text-xs font-medium">{{ __('messages.t_edit_article') }}</span>
                                        </a>

                                        {{-- Delete --}}
                                        <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_delete_this') }}') ? $wire.delete('{{ $article->id }}') : ''" wire:loading.attr="disabled" wire:target="delete('{{ $article->id }}')" type="button" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >

                                            {{-- Loading indicator --}}
                                            <div wire:loading wire:target="delete('{{ $article->id }}')">
                                                <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                </svg>
                                            </div>

                                            {{-- Icon --}}
                                            <div wire:loading.remove wire:target="delete('{{ $article->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </div>

                                            <span class="text-xs font-medium">{{ __('messages.t_delete_article') }}</span>

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

    {{-- Pagination --}}
    @if ($articles->hasPages())
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            {!! $articles->links('pagination::tailwind') !!}
        </div>
    @endif

</div>
