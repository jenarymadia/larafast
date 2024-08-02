<x-app-layout>
    <div class="w-full h-screen mx-auto">
        <div class="bg-white h-screen dark:bg-gray-800 overflow-hidden shadow-xl p-12 text-2xl">
            <div class="flex justify-end mb-5">
                <a href="{{ route('clients.create') }}" class="ml-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add Client
                </a>
            </div>
            <livewire:client-table />
        </div>
    </div>
</x-app-layout>
