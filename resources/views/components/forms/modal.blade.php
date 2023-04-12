@props(['placement', 'id', 'target', 'size', 'uid'])

<div id="{{ $id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full" wire:ignore.self x-data="window.{{ $uid }}" x-init="initialize">
    <div class="relative p-4 w-full {{ $size }} h-full md:h-auto">
        
        {{-- Modal content --}}
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-auto max-h-[calc(100vh-100px)]">
            
            {{-- Modal header --}}
            <div class="flex justify-between items-center py-4 px-6 rounded-t border-b dark:border-gray-600">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                    {{ $title }}
                </h3>
                <button x-on:click="close" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ltr:ml-auto rtl:mr-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>

            {{-- Modal body --}}
            <div class="p-6 space-y-6">
                {{ $content }}
            </div>
            
            {{-- Modal footer --}}
            @if ($footer ?? null)
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse rounded-b-md">
                    {{ $footer }}
                </div>
            @endif

        </div>
    </div>
</div>

@push('scripts')
    <script>
        function {{ $uid }}() {
            return {

                modal: null,

                initialize() {

                    // set the modal menu element
                    const targetEl = document.getElementById('{{ $id }}');

                    if (targetEl) {
                        
                        // options with default values
                        const options  = {
                            placement      : '{{ $placement }}',
                            backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40 overflow-x-hidden',
                            onHide         : () => {},
                            onShow         : () => {},
                            onToggle       : () => {}
                        };
    
                        // Generate modal
                        const modal    = new Modal(targetEl, options);
    
                        // Set modal
                        this.modal     = modal;
    
                        // When click on button open modal
                        if (document.getElementById('{{ $target }}')) {
                            document.getElementById('{{ $target }}').addEventListener("click", function(event) {
                                modal.show();
                            });
                        }
    
                        // Listent when want to close modal
                        window.addEventListener('close-modal', event => {
    
                            // Get requested modal id
                            const id = event.detail;
    
                            // Check if id same as this modal
                            if (id === @js($id)) {
                                modal.hide();
                            }
                            
                        });
    
                        // Listent when want to open modal
                        window.addEventListener('open-modal', event => {
    
                            // Get requested modal id
                            const id = event.detail;
    
                            // Check if id same as this modal
                            if (id === @js($id)) {
                                modal.show();
                            }
                            
                        });

                    }


                },

                // Close modal
                close() {
                    this.modal.hide();
                }
            }
        }
        window.{{ $uid }} = {{ $uid }}();
    </script>
@endpush