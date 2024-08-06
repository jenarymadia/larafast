<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        @include('components.sidebar')
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('components.navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="w-full h-screen mx-auto">
                    <div class="bg-white h-screen dark:bg-gray-800 overflow-hidden shadow-xl p-12 text-2xl">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const toggleButton = document.getElementById('sidebar-toggle');
                const sidebar = document.getElementById('sidebar');

                // Toggle sidebar
                toggleButton.addEventListener('click', function () {
                    sidebar.classList.remove('hidden');
                });
            });
        </script>

    </body>
</html>
