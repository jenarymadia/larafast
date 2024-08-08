<div class="w-full min-h-screen mx-auto">
    <div class="bg-white min-h-screen dark:bg-gray-800 overflow-hidden shadow-xl p-12 text-2xl">
        <form wire:submit.prevent="store">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Staff Information</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                            <div class="relative">
                                <input type="text"  wire:model="first_name" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('first_name') border-red-500 @enderror"/>
                            </div>
                            @error('first_name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                            <div class="relative">
                                <input type="text"  wire:model="last_name" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('last_name') border-red-500 @enderror"/>
                            </div>
                            @error('last_name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-3">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address</label>
                            <div class="relative">
                                <input type="text"  wire:model="email" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-500 @enderror"/>
                            </div>
                            @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-3">
                            <label for="mobile_no" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                    </svg>
                                </div>
                                <input type="text" wire:model="mobile_no" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('mobile_no') border-red-500 @enderror"/>
                            </div>
                            @error('mobile_no') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>
                        

                        <div class="col-span-full">
                            <label for="street_address" class="block text-sm font-medium leading-6 text-gray-900">Street Address</label>
                            <div class="relative">
                                <input type="text"  wire:model="street_address" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('street_address') border-red-500 @enderror"/>
                            </div>
                            @error('street_address') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                            <div class="relative">
                                <input type="text"  wire:model="city" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('city') border-red-500 @enderror"/>
                            </div>
                            @error('city') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Region</label>
                            <div class="relative">
                                <input type="text"  wire:model="region" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('region') border-red-500 @enderror"/>
                            </div>
                            @error('region') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-2">
                            <label for="postal_code" class="block text-sm font-medium leading-6 text-gray-900">Postal Code</label>
                            <div class="relative">
                                <input type="text"  wire:model="postal_code" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('postal_code') border-red-500 @enderror"/>
                            </div>
                            @error('postal_code') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                            <div class="relative">
                                <select wire:model="status" class="select select-bordered block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('status') border-red-500 @enderror">
                                    @foreach ($transaction_statuses as $status)
                                        <option value="{{ $status->value }}">{{ $status->key }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('status') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-3" wire:ignore>
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Tags (Optional)</label>
                            <div class="relative">
                                <div class="relative">
                                    <input id="testing-input" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('tags') border-red-500 @enderror"/>
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="notes" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
                            <div class="relative">
                                <div class="relative">
                                <textarea wire:model="note" rows="4" name="comment" id="comment" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 bg-gray-50 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('note') border-red-500 @enderror"></textarea>
                                </div>
                            </div>
                            @error('note') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('clients.index') }}" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button 
                    type="submit" 
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    wire:loading.attr="disabled"
                >
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var inputElem = document.getElementById('testing-input');
        var tagify = new Tagify(inputElem, {
            whitelist: []
        });
        tagify.addTags(['asdasd']);

        // Additional Tagify or Livewire setup if needed
        tagify.on('change', function(e) {
            @this.set('tags', tagify.value.map(tag => tag.value));
        });

        Livewire.on('tagsUpdated', (tags) => {
            tagify.removeAllTags();
            tagify.addTags(tags);
        });
    });
</script>