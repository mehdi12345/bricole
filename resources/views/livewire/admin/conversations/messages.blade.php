<div class="w-full">

    {{-- Section title --}}
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                {{ __('messages.t_messages') }}
            </p>
        </div>
    </div>

    {{-- Section content --}}
    <div class="bg-white dark:bg-gray-800 overflow-y-auto border !border-t-0 !border-b-0">
        <table class="w-full whitespace-nowrap">
            <thead class="bg-gray-200">
                <tr tabindex="0"
                    class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">{{ __('messages.t_sender') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">{{ __('messages.t_message') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 uppercase tracking-wider text-center">{{ __('messages.t_status') }}</th>
                </tr>
            </thead>
            <tbody class="w-full">

                @foreach ($messages as $msg)
                    <tr class="focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100" wire:key="messages-{{ $msg->id }}">

                        {{-- From --}}
                        <td class="ltr:pl-4 rtl:pr-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10">
                                    <img class="w-full h-full rounded-sm object-cover" src="{{ src($msg->sender->avatar) }}" alt="{{ $msg->sender->username }}" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium">{{ $msg->sender->username }}</p>
                                    <p class="text-xs leading-3 text-gray-600 pt-2">{{ $msg->sender->email }}</p>
                                </div>
                            </div>
                        </td>

                        {{-- To --}}
                        <td class="ltr:pl-4 rtl:pr-4">
                            <p class="text-xs font-medium">{{ $msg->message }}</p>
                        </td>

                        {{-- Status --}}
                        <td class="text-center">

                            @if ($msg->is_seen)
                                <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                    {{ __('messages.t_seen') }}
                                </span>
                            @else
                                <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-blue-500 bg-blue-50">
                                    {{ __('messages.t_new') }}
                                </span>
                            @endif

                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if ($messages->hasPages())
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            {!! $messages->links('pagination::tailwind') !!}
        </div>
    @endif

</div>
