<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/journalism.png') }}" type="image/x-icon">
    <title>{{ $title ?? 'Basic News Platform' }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-900 font-sans antialiased">
    <nav class="bg-white border-b border-gray-200 px-4 py-3 flex items-center justify-between">
        <!-- Left section: Logo & Links -->
        <div class="flex items-center gap-8">
            <div class="flex items-center text-indigo-600 text-2xl font-bold">
                <img src="{{ asset('assets/img/journalism.png') }}" alt="Logo" class="w-8 h-8 mr-2">
                <span class="font-semibold text-lg text-gray-800">Basic News Platform</span>
            </div>
            <!-- Navigation Links -->
            <a href="{{ route('welcome') }}" wire:navigate
                class="relative px-3 py-2 rounded-md text-gray-700 font-medium transition-colors duration-200 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 group flex items-center gap-2">
                <!-- Home Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h3m10-11v10a1 1 0 01-1 1h-3m-6 0h6" />
                </svg>
                Home
                <span
                    class="absolute left-0 bottom-0 w-0 h-0.5 bg-indigo-500 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="{{ route('news.personal') }}" wire:navigate
                class="relative px-3 py-2 rounded-md text-gray-700 font-medium transition-colors duration-200 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 group flex items-center gap-2">
                <!-- User Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Personal News
                <span
                    class="absolute left-0 bottom-0 w-0 h-0.5 bg-indigo-500 transition-all duration-300 group-hover:w-full"></span>
            </a>
        </div>

        <!-- Right section: Search & Icons -->
        <div class="flex items-center gap-8">
            <!-- Search -->
            <div class="relative">
                <input type="text" placeholder="Search"
                      oninput="Livewire.dispatch('search-news', { value: this.value })"
                    class="pl-10 pr-4 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400 text-sm" />
                <div class="absolute inset-y-0 left-0 pl-2 flex items-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M17 11A6 6 0 1 0 5 11a6 6 0 0 0 12 0z" />
                    </svg>
                </div>
            </div>

        </div>
    </nav>
    <div class="container mx-auto px-4 py-6">
        {{ $slot }}
    </div>


    @livewireScripts
    @stack('scripts')
    @vite('resources/js/app.js')


</body>

</html>