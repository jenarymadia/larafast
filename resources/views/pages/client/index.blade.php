<x-app-layout>
    <div class="w-full h-screen mx-auto">
        <div class="bg-white h-screen dark:bg-gray-800 overflow-hidden shadow-xl p-12 text-2xl">
            <div class="md:flex md:items-center md:justify-between mb-5">
                <div class="min-w-0 flex-1">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Clients</h2>
                </div>
                <div class="mt-4 flex md:ml-4 md:mt-0">
                    <a wire:navigate href="{{ route('clients.create') }}" class="ml-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Add Client
                    </a>
                </div>
            </div>
            <livewire:Client.client-table />
        </div>
    </div>
</x-app-layout>
