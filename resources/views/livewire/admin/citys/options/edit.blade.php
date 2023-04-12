<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_edit_city') }}</h2>
            </div>

            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Category name --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        label="{{ __('messages.t_city_name') }}"
                        placeholder="{{ __('messages.t_enter_city_name') }}"
                        model="name"
                        icon="format-title" />
                </div>

                {{-- Category slug --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        label="{{ __('messages.t_city_slug') }}"
                        placeholder="{{ __('messages.t_enter_city_slug') }}"
                        model="slug"
                        icon="link-variant" />
                </div>


            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>

    </div>

</div>
