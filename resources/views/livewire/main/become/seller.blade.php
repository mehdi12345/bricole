<div class="bg-transparent">
	<div class="max-w-7xl mx-auto pb-16 px-4 sm:px-6 lg:pb-16 lg:px-8">
		<div class="max-w-3xl mx-auto text-center">
			<h2 class="text-3xl font-extrabold text-gray-900">{{ __('messages.t_become_a_seller') }}</h2>
			<p class="mt-4 text-lg text-gray-500">{{ __('messages.t_become_a_seller_subtitle') }}</p>
		</div>
		<dl class="mt-24 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 lg:grid-cols-4 lg:gap-x-8">

            @foreach ($features as $feature)
                <div class="relative">
                    <dt>
                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/> </svg>
                        <p class="ltr:ml-9 rtl:mr-9 text-lg leading-6 font-medium text-gray-900">{{ $feature['title'] }}</p>
                    </dt>
                    <dd class="mt-2 ltr:ml-9 rtl:mr-9 text-base text-gray-500">{{ $feature['description'] }}</dd>
                </div>
            @endforeach
            
		</dl>

        {{-- Get started now --}}
        <div class="max-w-xs justify-center flex items-center mx-auto mt-16">
            <button 
                wire:click="start"
                wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray cursor-not-allowed "
                wire:loading.class.remove="bg-indigo-500 hover:bg-indigo-600 text-white cursor-pointer"
                wire:loading.attr="disabled"
                class="w-full text-sm font-medium flex justify-center bg-indigo-500 hover:bg-indigo-600 text-white py-6 px-12 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer"
                >

                {{-- Loading indicator --}}
                <div wire:loading wire:target="start">
                    <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                    </svg>
                </div>

                {{-- Button text --}}
                <div wire:loading.remove wire:target="start">
                    {{ __('messages.t_get_started_now') }}
                </div>
            </button>
        </div>

	</div>
</div>