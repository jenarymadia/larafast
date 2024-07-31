
<div>
    <div class="pb-5 sm:flex sm:items-center sm:justify-between">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Clients</h3>
        <div class="mt-3 sm:ml-4 sm:mt-0">
            <label for="mobile-search-candidate" class="sr-only">Search</label>
            <label for="desktop-search-candidate" class="sr-only">Search</label>
            <div class="flex rounded-md shadow-sm">
                <div class="relative flex-grow focus-within:z-10">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                    </div>
                    <form wire:submit.prevent="performSearch">
                        <button type="submit" class="hidden">Search</button>
                        <input type="text" name="mobile-search-candidate" id="mobile-search-candidate" class="block w-full rounded-none rounded-l-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:hidden" placeholder="Search">
                        <input type="text" id="search" wire:model.defer="search" @keyup.enter="$wire.performSearch(search)"  name="desktop-search-candidate" id="desktop-search-candidate" class="hidden w-full rounded border-0 py-1.5 pl-10 text-sm leading-6 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:block" placeholder="Search clients">
                    </form>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('clients.create') }}" class="ml-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Add Client
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="relative p-4">
        <!-- Search Input -->
        <div class="relative overflow-x-auto">
            <!-- Bulk Actions -->
            @if(count($selected))
                <div class="mb-4">
                    <button wire:click="deleteSelected"
                            class="bg-red-500 text-white px-4 py-2 text-sm rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                        Delete Selected
                    </button>
                </div>
            @endif

            <!-- Loading Spinner -->
            <div wire:loading wire:target="search,sortBy,toggleSelectAll,deleteSelected">
                <div class="absolute inset-0 flex items-center justify-center bg-gray-50 bg-opacity-75 z-10">
                    <div class="flex items-center space-x-2">
                        <svg class="animate-spin h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0116 0H4z"></path>
                        </svg>
                        <span class="text-gray-600">Loading...</span>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <table class="min-w-full divide-y divide-gray-200 bg-white shadow-md rounded-lg text-sm relative">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" id="all-client-checkbox" class="-mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                            <button wire:click="sortBy('first_name')" class="flex items-center">
                                First Name
                                @if($sortField === 'first_name')
                                    <svg class="ml-1 w-4 h-4 {{ $sortDirection === 'desc' ? 'rotate-180' : '' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                            <button wire:click="sortBy('last_name')" class="flex items-center">
                                Last Name
                                @if($sortField === 'last_name')
                                    <svg class="ml-1 w-4 h-4 {{ $sortDirection === 'desc' ? 'rotate-180' : '' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                            <button wire:click="sortBy('email')" class="flex items-center">
                                Email
                                @if($sortField === 'email')
                                    <svg class="ml-1 w-4 h-4 {{ $sortDirection === 'desc' ? 'rotate-180' : '' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                            <button wire:click="sortBy('mobile_no')" class="flex items-center">
                                Mobile No
                                @if($sortField === 'mobile_no')
                                    <svg class="ml-1 w-4 h-4 {{ $sortDirection === 'desc' ? 'rotate-180' : '' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                            <button wire:click="sortBy('address')" class="flex items-center">
                                Address
                                @if($sortField === 'address')
                                    <svg class="ml-1 w-4 h-4 {{ $sortDirection === 'desc' ? 'rotate-180' : '' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                            <button class="flex items-center">
                                Status
                            </button>
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($clients as $client)
                        <tr>
                            <td class="relative px-7 sm:w-12 sm:px-6">
                                <input type="checkbox" value="{{ $client->id }}" type="checkbox" class="client-checkbox absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">{{ $client->first_name }}</td>
                            <td class="px-4 py-4 whitespace-nowrap">{{ $client->last_name }}</td>
                            <td class="px-4 py-4 whitespace-nowrap">{{ $client->email }}</td>
                            <td class="px-4 py-4 whitespace-nowrap">{{ $client->mobile_no }}</td>
                            <td class="px-4 py-4 whitespace-nowrap"></td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <a href="{{ route('clients.edit', $client) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <a href="#" wire:click.prevent="confirmDelete({{ $client->id }})" class="text-red-600 hover:text-red-900 ml-4">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-center text-gray-500">No clients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="mt-4">
                {{ $clients->links() }}
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const allClientCheckbox = document.getElementById('all-client-checkbox');
        const clientCheckboxes = document.querySelectorAll('.client-checkbox');
        const bulkActions = document.getElementById('bulk-actions');
        const nameHead = document.getElementById('name_head');

        function updateBulkActionsVisibility() {
            const anyChecked = document.querySelectorAll('.client-checkbox:checked').length > 0;
            if(anyChecked) {
                bulkActions.style.display = 'block';
                nameHead.style.display = 'none';
            } else {
                bulkActions.style.display = 'none';
                nameHead.style.display = 'block';
            }
        }

        function addIndicator(checkbox) {
            // const indicator = checkbox.parentElement.querySelector('.absolute').remove();
            const indicator2 = document.createElement('div');
            indicator2.className = 'indicator absolute inset-y-0 left-0 w-0.5 bg-indigo-600';
            checkbox.parentElement.insertBefore(indicator2, checkbox);
        }

        function removeIndicator(checkbox) {
            const indicators = checkbox.parentElement.querySelectorAll('.indicator');
            if(indicators.length > 0) {
                indicators.forEach(indicator => {
                    indicator.remove();
                });
            }
        }

        allClientCheckbox.addEventListener('change', function () {
            clientCheckboxes.forEach(checkbox => {
                checkbox.checked = allClientCheckbox.checked;
                if (allClientCheckbox.checked) {
                    addIndicator(checkbox);
                } else {
                    removeIndicator(checkbox);
                }
            });
            // updateBulkActionsVisibility();
        });

        clientCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (checkbox.checked) {
                    addIndicator(checkbox);
                } else {
                    removeIndicator(checkbox);
                }
                // updateBulkActionsVisibility();

                // Update allClientCheckbox state
                allClientCheckbox.checked = document.querySelectorAll('.client-checkbox:checked').length === clientCheckboxes.length;
            });
        });

        // Deletion function
        bulkActions.querySelector('button').addEventListener('click', function () {
            const selectedClientIds = Array.from(document.querySelectorAll('.client-checkbox:checked'))
                .map(checkbox => checkbox.closest('tr').dataset.clientId);

            if (selectedClientIds.length > 0) {
                // Confirm deletion
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post('{{ route("clients.bulk_delete") }}', {
                            ids: selectedClientIds
                        }, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        })
                        .then(response => {
                            Swal.fire(
                                'Deleted!',
                                'The selected clients have been deleted.',
                                'success'
                            ).then(() => {
                                location.reload(); // Reload the page to reflect changes
                            });
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error!',
                                'There was an error deleting the clients. Please try again.',
                                'error'
                            );
                        });
                    }
                });
            }
        });
    });
</script>

