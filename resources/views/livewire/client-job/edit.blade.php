<div class="w-full min-h-screen mx-auto">
    <div class="bg-white min-h-screen dark:bg-gray-800 overflow-hidden shadow-xl p-12 text-2xl">
        <form wire:submit.prevent="store">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Job Information</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="" class="block text-sm font-medium leading-6 text-gray-900">Service Type</label>
                            <div class="relative">
                                <input type="text"  wire:model="title" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('title') border-red-500 @enderror"/>
                            </div>
                            @error('title') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Client name</label>
                            <div class="relative">
                                <input type="text" wire:model="client_name" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('client_name') border-red-500 @enderror"/>
                            </div>
                            @error('client_name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="col-span-full">
                            <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                            <div class="relative">
                                <input type="text"  wire:model="address" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('address') border-red-500 @enderror"/>
                            </div>
                            @error('address') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="schedule_date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                            <div class="relative">
                                <input wire:model="schedule_date" type="date" id="schedule_date" name="schedule_date"
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('schedule_date') border-red-500 @enderror"
                                >   
                            </div>
                            @error('schedule_date') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-2">
                            <label for="schedule_time" class="block text-sm font-medium leading-6 text-gray-900">Time</label>
                            <div class="relative">
                                <input wire:model="schedule_time" type="time" id="schedule_time" name="schedule_time"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('schedule_time') border-red-500 @enderror"
                                >  
                            </div>
                            @error('schedule_time') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-2">
                            <label for="duration" class="block text-sm font-medium leading-6 text-gray-900">Estimated Duration (hours)</label>
                            <div class="relative">
                                <input wire:model="duration" type="number" id="estimated_duration" name="estimated_duration"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('duration') border-red-500 @enderror"
                            min="0.5" step="0.5" >
                            </div>
                            @error('duration') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Job Status</label>
                            <div class="relative">
                                <select wire:model="status" id="staff_member" name="staff_member"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('staff_id') border-red-500 @enderror"
                                        @foreach ($transaction_statuses as $status)
                                        <option value="{{ $status->value }}">{{ $status->key }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            @error('status') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-2">
                            <label for="staff_id" class="block text-sm font-medium leading-6 text-gray-900">Assign Staff Member</label>
                            <div class="relative">
                                <select wire:model="staff_id" id="staff_member" name="staff_member"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('staff_id') border-red-500 @enderror"
                                        >
                                    <option>Select a staff member</option>
                                </select>
                            </div>
                            @error('staff_id') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-2">
                            <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                            <div class="relative">
                                <input wire:model="price" type="number" id="estimated_price" name="estimated_price"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('price') border-red-500 @enderror"
                            min="0.5" step="0.5" >
                            </div>
                            @error('price') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-full">
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
                <a wire:navigate href="{{ route('jobs.index') }}" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
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