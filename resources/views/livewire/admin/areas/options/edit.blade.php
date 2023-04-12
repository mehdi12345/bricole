<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_edit_area') }}</h2>
            </div>

            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Subcategory name --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        label="{{ __('messages.t_area_name') }}"
                        placeholder="{{ __('messages.t_entre_area_name') }}"
                        model="name"
                        icon="format-title" />
                </div>

                {{-- Subcategory slug --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        label="{{ __('messages.t_area_slug') }}"
                        placeholder="{{ __('messages.t_entre_area_slug') }}"
                        model="slug"
                        icon="link-variant" />
                </div>

                {{-- Parent category --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_parent_ville')"
                            :placeholder="__('messages.t_choix_printer_ville')"
                            model="parent_id"
                            :options="$categories"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="id"
                            text="name" />
                    </div>
                </div>


            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>

    </div>

</div>
