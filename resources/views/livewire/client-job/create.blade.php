<div class="w-full min-h-screen mx-auto">
    <div class="bg-white min-h-screen dark:bg-gray-800 overflow-hidden shadow-xl p-12 text-2xl">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Create New Job</h2>
            
            <form wire:submit.prevent="store">
                <div class="mb-4">
                    <label for="service" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-briefcase mr-2"></i>
                        Service Type
                    </label>
                    <input wire:model="title" type="text" id="service" name="service" 
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('title') border-red-500 @enderror"
                        >
                    @error('title')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="client" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-user mr-2"></i>
                        Client Name
                    </label>
                    <input wire:model="client_name" type="text" id="client" name="client"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('client_name') border-red-500 @enderror"
                        >
                    @error('client_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Job Address
                    </label>
                    <input wire:model="address" type="text" id="address" name="address"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('address') border-red-500 @enderror"
                        >
                    @error('address')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 flex space-x-4">
                    <div class="w-1/2">
                        <label for="schedule_date" class="block text-gray-700 text-sm font-bold mb-2">
                            <i class="fas fa-calendar mr-2"></i>
                            Date
                        </label>
                        <input wire:model="schedule_date" type="date" id="schedule_date" name="schedule_date"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('schedule_date') border-red-500 @enderror"
                            >
                        @error('schedule_date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="schedule_time" class="block text-gray-700 text-sm font-bold mb-2">
                            <i class="fas fa-clock mr-2"></i>
                            Time
                        </label>
                        <input wire:model="schedule_time" type="time" id="schedule_time" name="schedule_time"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('schedule_time') border-red-500 @enderror"
                            >
                        @error('schedule_time')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="estimated_duration" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-hourglass-half mr-2"></i>
                        Estimated Duration (hours)
                    </label>
                    <input wire:model="duration" type="number" id="estimated_duration" name="estimated_duration"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('duration') border-red-500 @enderror"
                        min="0.5" step="0.5" >
                    @error('duration')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-dollar-sign mr-2"></i>
                        Price
                    </label>
                    <input wire:model="price" type="number" id="price" name="price"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('price') border-red-500 @enderror"
                        min="0" step="0.01" >
                    @error('price')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="staff_member" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-users mr-2"></i>
                        Assign Staff Member
                    </label>
                    <select wire:model="staff_id" id="staff_member" name="staff_member"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('staff_id') border-red-500 @enderror"
                            >
                        <option>Select a staff member</option>
                    </select>
                    @error('staff_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-tag mr-2"></i>
                        Job Status
                    </label>
                    <select wire:model="status" id="status" name="status"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('status') border-red-500 @enderror"
                            >
                        @foreach ($transaction_statuses as $status)
                            <option value="{{ $status->value }}">
                                {{ $status->key }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">
                        Notes
                    </label>
                    <textarea wire:model="notes" id="notes" name="notes" rows="3"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('notes') border-red-500 @enderror"
                    ></textarea>
                    @error('notes')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-center">
                    <button 
                        type="submit" 
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        wire:loading.attr="disabled"
                    >
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />