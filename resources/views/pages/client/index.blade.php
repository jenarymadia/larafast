<x-app-layout>
    <div class="w-full h-screen mx-auto">
        <div class="bg-white h-screen dark:bg-gray-800 overflow-hidden shadow-xl p-12 text-2xl">
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
                        <input type="text" name="mobile-search-candidate" id="mobile-search-candidate" class="block w-full rounded-none rounded-l-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:hidden" placeholder="Search">
                        <input type="text" name="desktop-search-candidate" id="desktop-search-candidate" class="hidden w-full rounded-none rounded-l-md border-0 py-1.5 pl-10 text-sm leading-6 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:block" placeholder="Search clients">
                    </div>
                    <button type="button" class="relative -ml-px inline-flex items-center gap-x-1.5 rounded-r-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        <svg class="-ml-0.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 3.75A.75.75 0 012.75 3h11.5a.75.75 0 010 1.5H2.75A.75.75 0 012 3.75zM2 7.5a.75.75 0 01.75-.75h6.365a.75.75 0 010 1.5H2.75A.75.75 0 012 7.5zM14 7a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02l-1.95-2.1v6.59a.75.75 0 01-1.5 0V9.66l-1.95 2.1a.75.75 0 11-1.1-1.02l3.25-3.5A.75.75 0 0114 7zM2 11.25a.75.75 0 01.75-.75H7A.75.75 0 017 12H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                        </svg>
                        Sort
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="flex justify-end">
                        <a href="{{ route('clients.create') }}" class="ml-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Add Client
                        </a>
                    </div>
                    </div>
                </div>
            </div>
            <table class="w-full divide-y divide-gray-300">
                <thead>
                    <tr>
                        <th scope="col" class="relative px-7 sm:w-12 sm:px-6">
                        <input id="all-client-checkbox" type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </th>
                        <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                            <div id="bulk-actions" class="hidden">
                                <button type="button" class="inline-flex items-center rounded bg-white px-2 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-white">Bulk edit</button>
                                <button type="button" class="inline-flex items-center rounded bg-white px-2 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-white">Delete all</button>
                            </div>
                            <span id="name_head">Name</span>
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Mobile Number</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Address</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($clients as $client)
                        <tr class="bg-gray-50">
                            <td class="relative px-7 sm:w-12 sm:px-6">
                                <input type="checkbox" class="client-checkbox absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </td>
                            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">{{ $client->first_name.' '.$client->last_name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $client->email }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $client->mobile_no }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $client->street_address.' '.$client->city.' '.$client->region.' '.$client->postal_code }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                    Active
                                </span>
                            </td>
                            <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-3">
                                <a href="{{ route('clients.edit', $client->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $client->first_name }}</span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6" aria-label="Pagination">
                <div class="hidden sm:block">
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">{{ $clients->firstItem() }}</span>
                        to
                        <span class="font-medium">{{ $clients->lastItem() }}</span>
                        of
                        <span class="font-medium">{{ $clients->total() }}</span>
                        results
                    </p>
                </div>
                <div class="flex flex-1 justify-between sm:justify-end">
                    @if ($clients->onFirstPage())
                        <span class="relative inline-flex items-center rounded-md px-3 py-2 text-sm font-semibold text-gray-500">Previous</span>
                    @else
                        <a href="{{ $clients->previousPageUrl() }}" class="relative inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline-offset-0">Previous</a>
                    @endif

                    @if ($clients->hasMorePages())
                        <a href="{{ $clients->nextPageUrl() }}" class="relative ml-3 inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline-offset-0">Next</a>
                    @else
                        <span class="relative ml-3 inline-flex items-center rounded-md px-3 py-2 text-sm font-semibold text-gray-500">Next</span>
                    @endif
                </div>
            </nav>
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
                }else{
                    bulkActions.style.display = 'none';
                    nameHead.style.display = 'block';
                }
            }

            function addIndicator(checkbox) {
                const indicator = document.createElement('div');
                indicator.className = 'absolute inset-y-0 left-0 w-0.5 bg-indigo-600';
                checkbox.parentElement.insertBefore(indicator, checkbox);
            }

            function removeIndicator(checkbox) {
                const indicator = checkbox.parentElement.querySelector('.absolute');
                if (indicator) {
                    indicator.remove();
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
                updateBulkActionsVisibility();
            });

            clientCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    if (checkbox.checked) {
                        addIndicator(checkbox);
                    } else {
                        removeIndicator(checkbox);
                    }
                    updateBulkActionsVisibility();

                    // Update allClientCheckbox state
                    allClientCheckbox.checked = document.querySelectorAll('.client-checkbox:checked').length === clientCheckboxes.length;
                });
            });
        });
    </script>
</x-app-layout>
