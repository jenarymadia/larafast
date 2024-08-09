<div class="w-full min-h-screen mx-auto">
    <div class="bg-white min-h-screen dark:bg-gray-800 overflow-hidden shadow-xl p-12 text-2xl">
        <form wire:submit.prevent="update">
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
                                        >@foreach ($transaction_statuses as $status)
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
                                <textarea wire:model="notes" rows="4" name="comment" id="comment" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 bg-gray-50 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('note') border-red-500 @enderror"></textarea>
                                </div>
                            </div>
                            @error('notes') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>

                        <div class="sm:col-span-full">
                            <div class="relative">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-filefile" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">JPG, PNG, PDF, MP4, TIFF, MOV, H264</p>
                                        </div>
                                        <input id="dropzone-filefile" type="file" class="hidden" wire:model="files" multiple/>
                                    </label>
                                </div> 

                            </div>
                            @error('files.*') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror 
                        </div>
                        @if ($files)
                        <div class="sm:col-span-3">
                            <label for="notes" class="block text-sm font-bold leading-6 text-gray-900">For Upload : </label>
                            <div class="space-y-8 mt-2">
                                @foreach ($files as $file)
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <p class="text-sm text-gray-500 font-semibold flex-1">{{ $file->getClientOriginalName() }} <span class="ml-2">({{ number_format($file->getSize() / 1024, 2) }} KB)</span></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @if ($attachments->count() > 0)
                        <div class="sm:col-span-3 sm:col-end-7">
                            <label for="notes" class="block text-sm font-bold leading-6 text-gray-900">Attachments : </label>
                            <div class="space-y-8 mt-2">
                                @foreach ($attachments as $file)
                                    <div class="flex flex-col">
                                        <div class="flex">
                                            <p class="text-sm text-gray-500 font-semibold flex-1">{{ $file->file_name }} <span class="ml-2"></span></p>
                                            
                                            <svg wire:click="deleteAttachment({{ $file->id }})" xmlns="http://www.w3.org/2000/svg" class="w-3 cursor-pointer shrink-0 fill-black hover:fill-red-500"
                                            viewBox="0 0 320.591 320.591">
                                            <path
                                                d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                                                data-original="#000000"></path>
                                            <path
                                                d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                                                data-original="#000000"></path>
                                            </svg>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
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