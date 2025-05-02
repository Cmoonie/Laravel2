<!DOCTYPE html>
<!--Waarschijnlijk al verwerkt. Ik moet het nog testen-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Navigation Links -->
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Home') }}
        </x-nav-link>

        <x-nav-link :href="route('festivals.public.index')" :active="request()->routeIs('festivals.public.index')">
            {{ __('Festivals') }}
        </x-nav-link>

        @auth
            @if (!auth()->user()->is_admin)
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('festivals.public.index')" :active="request()->routeIs('festivals.public.index')">
                        {{ __('Festivals') }}
                    </x-nav-link>

                    <x-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')">
                        {{ __('Winkelmand') }}
                    </x-nav-link>
                </div>
            @endif
        @endauth



        <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('admin.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>

