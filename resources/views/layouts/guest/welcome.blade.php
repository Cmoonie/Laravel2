<!-- resources/views/admin/welcome.blade.php-->
@extends('layouts.admin.app')

@section('content')
    <!-- Hero Section -->
    <div class="relative h-screen bg-white">
        <div class="absolute inset-0 bg-white bg-opacity-90 flex flex-col items-center justify-center text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-[#9932CC] mb-4" style="font-size: 16px;">Festibusje</h1>
            <h2 class="text-2xl md:text-2xl text-[#9932CC] mb-2" style="font-size: 16px;">Je ideale busreisplanner</h2>
        </div>
    </div>

    <!-- Footer Section -->
    <footer role="contentinfo" class="bg-white text-[#9932CC] py-4">
        <p class="text-center" style="font-size: 16px;">&copy; {{ date('Y') }} Festibusje. Alle rechten voorbehouden.</p>
    </footer>
@endsection

@section('navigation')
    <header role="banner">
        <nav aria-label="Main Navigation">
            <ul>
                <li><a href="{{ route('home') }}" aria-label="Home">Home</a></li>
            </ul>

            <div class="flex justify-end">
                <a href="{{ route('login') }}" aria-label="Login">Login</a>
                <a href="{{ route('register') }}" aria-label="Register">Register</a>
            </div>
        </nav>
    </header>
@endsection

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Styles / Scripts -->
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@else
    <style>
    </style>
@endif
