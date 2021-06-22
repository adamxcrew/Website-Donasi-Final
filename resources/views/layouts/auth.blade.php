<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

		@livewireStyles
		@stack('styles')
    </head>
    <body class="hide-scrollbar">
        <div class="font-sans text-gray-900 antialiased">
            <div class="bg-cover bg-scroll bg-top bg-blueGray-800 bg-no-repeat" style="background-image: url({{ asset('bg_auth.png') }})">
                {{ $slot }}
            </div>
        </div>
        @livewireScripts
		@yield('scripts')
		@stack('scripts')
        <style>
            .hide-scrollbar {
            overflow-y: scroll;
            }

            .hide-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
            }
        </style>
    </body>
</html>
