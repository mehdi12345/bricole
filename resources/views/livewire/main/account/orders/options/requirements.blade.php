<main class="w-full"
    x-data="window.aelkGHWmZHjwNJZ"
    x-init="init()"
    x-on:livewire-upload-start="uploadStart()"
    x-on:livewire-upload-finish="uploadFinish()"
    x-on:livewire-upload-error="uploadError()"
    x-on:livewire-upload-progress="uploadingProgress = $event.detail.progress" >
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">
                {{-- Sidebar --}}
                <aside class="lg:col-span-6 py-6" wire:ignore>
                <div class="mb-12 bg-white shadow shadow-gray-100 rounded-md  border-gray-200 max-w-2xl mx-auto " style="margin: 20px;">
                    {{-- Section content --}}
                    <div class="px-8 py-6 border-2 border-dashed">
                        <div class="grid grid-cols-12 gap-5">
                            {{-- date --}}
                            <div class="col-span-12">
                                <x-forms.text-input
                                    :label="__('messages.t_date')"
                                    :placeholder="__('messages.t_select_a_date')"
                                    type="date"
                                    model="dateTo" />
                            </div>

                            {{-- date --}}
                            <div class="col-span-12">
                                <x-forms.text-input
                                    label="Date form"
                                    :placeholder="__('messages.t_select_a_date')"
                                    type="date"
                                    model="dateForm" />
                            </div>

                            {{-- price --}}
                            <div class="col-span-12">
                                <x-forms.text-input
                                    :label="__('messages.t_price')"
                                    :placeholder="__('messages.t_enter_upgrade_price')"
                                    type="number"
                                    model="price" />
                            </div>

                            {{-- Message --}}
                            <div class="col-span-12">
                                <x-forms.textarea
                                    :label="__('messages.t_create')"
                                    :placeholder="__('messages.t_descibe_ur_message_in_details')"
                                    icon="file"
                                    model="message" />
                            </div>
                            {{-- Submit --}}

                            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">
                                <div class="lg:col-span-8 col-span-8  ">
                                    <x-forms.button action="createPdf" :text="__('messages.t_send_files_again')" :block="true" />
                                </div>
                            </div>


                        </div>
                    </div>
                    </div>
                </aside>
                <!-- <div class="divide-y divide-gray-200 lg:col-span-6">
                    {{-- Form --}}
                    <div class="py-6 px-4 sm:p-6 lg:pb-10">
                        {{-- Section header --}}
                        <div class="mb-14">
                            <h2 class="text-base leading-6 font-bold text-gray-900">{{ __('messages.t_send_requirements') }}</h2>
                            <p class="mt-1 text-sm text-gray-500">{{ __('messages.t_send_requirements_subtitle') }}</p>
                        </div>
                        <div class="py-6 px-4 sm:p-6 lg:pb-8">
                            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">
                            {{-- Submit files form --}}
                                <div class="col-span-12 xl:col-span-10 grid items-end border-2 border-dashed rounded-md {{ $item->exists()  ? 'relative' : '' }}">
                                    {{-- Form --}}
                                        <div class="grid grid-cols-12 md:gap-x-6 gap-y-6 px-6 py-8">
                                            {{-- Messages from owner --}}
                                            <div class="col-span-12 mb-6">
                                                <div class="flex flex-col space-y-4 overflow-y-auto">
                                                    <div class="flex items-center">
                                                        <div class="flex flex-col space-y-2 text-sm ltr:ml-2 rtl:mr-2 order-2 items-center">
                                                          <div><span class="px-4 py-2 rounded-lg italic inline-block bg-gray-100 text-gray-900 w-full">{{ __('messages.t_hey_before_i_start_working_on_order_msg') }}</span></div>
                                                        </div>
                                                        <img src="{{ src($item->gig->owner->avatar) }}" alt="{{ $item->gig->owner->username }}" class="w-10 h-10 rounded-full order-1 object-cover">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-12">
                                                <label for="requirements-file" class="block text-sm font-medium text-gray-900"> </label>
                                                <div class="mt-2 relative">
                                                    <input type="file" id="requirements-file" class="block w-full text-xs text-gray-700 font-medium bg-gray-100 rounded-md cursor-pointer focus:ring-0 focus:outline-none" model="document" />
                                                </div>
                                                <span class="text-xs text-gray-400 font-normal">Only <span class="text-gray-600">{{ settings('media')->requirements_file_allowed_extensions }}</span> file extensions are allowed. Max file size is: <span class="text-gray-600">{{ settings('media')->requirements_file_max_size }} MB</span></span>
                                            </div>
                                        </div>
                                        {{-- Footer actions --}}
                                        <div class="px-4 py-3 bg-gray-50 ltr:text-right rtl:text-left sm:px-6 rounded-bl-md flex justify-end">
                                            <div :class="isUploading ? 'hidden' : 'block'">
                                                <x-forms.button action="submit" :text="__('messages.t_submit')" />
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>



               </div> -->
            </div>
        </div>
    </div>


</main>

@push('scripts')

    {{-- AlpineJS --}}
    <script>
        function aelkGHWmZHjwNJZ() {
            return {

                isUploading      : false,
                uploadingProgress: 0,
                uploadingModal   : null,

                init() {

                    // set the modal menu element
                    const targetEl      = document.getElementById('uploading-modal');

                    // options with default values
                    const options       = {
                        placement      : 'center-center',
                        backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40 overflow-x-hidden',
                        onHide         : () => {},
                        onShow         : () => {},
                        onToggle       : () => {}
                    };

                    // Generate modal
                    const modal         = new Modal(targetEl, options);

                    // Set modal
                    this.uploadingModal = modal;

                },

                // Upload start
                uploadStart() {
                    this.isUploading = true;
                    this.uploadingModal.show();
                },

                // Upload finish
                uploadFinish() {
                    this.isUploading       = false;
                    this.uploadingProgress = 0;
                    this.uploadingModal.hide();
                },

                // Upload error
                uploadError() {
                    this.isUploading       = false;
                    this.uploadingProgress = 0;
                    this.uploadingModal.hide();
                    window.toast("{{ __('messages.t_error_while_uploading_your_file') }}", 'error');
                },

                // Upload text
                uploadText() {
                    return this.uploadingProgress + " %";
                },

                // Listen when file changed
                fileInputChanged(e, key) {

                    // Get maximum file size
                    const max_size  = Number('{{ settings("media")->requirements_file_max_size }}');

                    // Get file name
                    const file_name = e.target.files[0].name;

                    // Get selected file size
                    const file_size = e.target.files[0].size / 1024 / 1024;

                    // Check if extension is valid
                    if (!this.isValidExtension(file_name)) {

                        // Show error
                        window.toast("{{ __('messages.t_selected_file_extension_is_not_allowed') }}", 'error');

                        e.preventDefault();
                        e.stopPropagation();
                        return;

                    }

                    // Validate file size
                    if (file_size > max_size) {

                        // Show error
                        window.toast("{{ __('messages.t_selected_file_size_big') }}", 'error');

                        e.preventDefault();
                        e.stopPropagation();
                        return;

                    }

                    // File is good upload it
                    @this.upload(key, e.target.files[0], (uploadedFilename) => {

                        this.uploadFinish();

                    }, () => {

                        this.uploadError();

                    }, (event) => {
                        this.uploadStart();
                        this.uploadingProgress = event.detail.progress;
                    });

                },

                // Validate extension
                isValidExtension(filename) {

                    // Check file name
                    if (filename.length > 0) {

                        // Get allowed extensions
                        const allowed_extensions = @js( explode(',', settings('media')->requirements_file_allowed_extensions) );

                        // Set is valid variable
                        var is_valid             = false;

                        // Loop through extensions
                        for (let index = 0; index < allowed_extensions.length; index++) {

                            // Get extension
                            const extension = "." + allowed_extensions[index];

                            // Check extension
                            if (filename.substr(filename.length - extension.length, extension.length).toLowerCase() == extension.toLowerCase()) {
                                is_valid = true;
                                break;
                            }

                        }

                        // Return response
                        return is_valid;

                    } else {

                        // Invalid file name
                        return false;

                    }

                }

            }
        }
        window.aelkGHWmZHjwNJZ = aelkGHWmZHjwNJZ();
    </script>

@endpush
