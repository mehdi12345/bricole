<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_cashfree_payment_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_cashfree_payment_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Enable --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_status')"
                            :placeholder="__('messages.t_enable_this_payment_gateway')"
                            model="is_enabled"
                            :options="[
                                ['text' => __('messages.t_enabled'), 'value' => 1],
                                ['text' => __('messages.t_disabled'), 'value' => 0],
                            ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Env --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_environment')"
                            :placeholder="__('messages.t_choose_environment')"
                            model="is_live"
                            :options="[
                                ['text' => __('messages.t_live'), 'value' => 1],
                                ['text' => __('messages.t_sandbox'), 'value' => 0],
                            ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Name --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_payment_method_name')"
                        :placeholder="__('messages.t_enter_payment_method_name')"
                        model="name"
                        icon="form-textbox" />
                </div>

                {{-- Description --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        :label="__('messages.t_description')"
                        :placeholder="__('messages.t_enter_payment_gateway_description')"
                        model="description"
                        icon="text-box-edit-outline"
                        :rows="8" />
                </div>

                {{-- App id --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_app_id')"
                        :placeholder="__('messages.t_enter_app_id')"
                        model="app_id"
                        icon="key" />
                </div>

                {{-- Secret key --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_secret_key')"
                        :placeholder="__('messages.t_enter_secret_key')"
                        model="secret_key"
                        icon="lock" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    