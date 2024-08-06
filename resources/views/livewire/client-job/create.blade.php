<div class="w-full min-h-screen mx-auto">
    <div class="bg-white min-h-screen dark:bg-gray-800 overflow-hidden shadow-xl p-12 text-2xl">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Create New Job</h2>
            
            <form action="" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="service" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-briefcase mr-2"></i>
                        Service Type
                    </label>
                    <input type="text" id="service" name="service" value="{{ old('service') }}" 
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('service') border-red-500 @enderror"
                        required>
                    @error('service')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="client" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-user mr-2"></i>
                        Client Name
                    </label>
                    <input type="text" id="client" name="client" value="{{ old('client') }}"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('client') border-red-500 @enderror"
                        required>
                    @error('client')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Job Address
                    </label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('address') border-red-500 @enderror"
                        required>
                    @error('address')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 flex space-x-4">
                    <div class="w-1/2">
                        <label for="scheduled_date" class="block text-gray-700 text-sm font-bold mb-2">
                            <i class="fas fa-calendar mr-2"></i>
                            Date
                        </label>
                        <input type="date" id="scheduled_date" name="scheduled_date" value="{{ old('scheduled_date') }}"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('scheduled_date') border-red-500 @enderror"
                            required>
                        @error('scheduled_date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="scheduled_time" class="block text-gray-700 text-sm font-bold mb-2">
                            <i class="fas fa-clock mr-2"></i>
                            Time
                        </label>
                        <input type="time" id="scheduled_time" name="scheduled_time" value="{{ old('scheduled_time') }}"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('scheduled_time') border-red-500 @enderror"
                            required>
                        @error('scheduled_time')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="estimated_duration" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-hourglass-half mr-2"></i>
                        Estimated Duration (hours)
                    </label>
                    <input type="number" id="estimated_duration" name="estimated_duration" value="{{ old('estimated_duration') }}"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('estimated_duration') border-red-500 @enderror"
                        min="0.5" step="0.5" required>
                    @error('estimated_duration')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-dollar-sign mr-2"></i>
                        Price
                    </label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('price') border-red-500 @enderror"
                        min="0" step="0.01" required>
                    @error('price')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="staff_member" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-users mr-2"></i>
                        Assign Staff Member
                    </label>
                    <select id="staff_member" name="staff_member"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('staff_member') border-red-500 @enderror"
                            required>
                        <option value="">Select a staff member</option>
                    </select>
                    @error('staff_member')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-tag mr-2"></i>
                        Job Status
                    </label>
                    <select id="status" name="status"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('status') border-red-500 @enderror"
                            required>
                        @foreach (['Scheduled', 'Pending', 'In Progress', 'Completed', 'Cancelled'] as $status)
                            <option value="{{ $status }}" {{ old('status', 'Scheduled') == $status ? 'selected' : '' }}>
                                {{ $status }}
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
                    <textarea id="notes" name="notes" rows="3"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('notes') border-red-500 @enderror"
                    >{{ old('notes') }}</textarea>
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
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>