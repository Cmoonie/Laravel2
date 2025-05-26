<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Festibusje - Busreisplanner</title>

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
</head>
<body class="font-sans antialiased bg-white text-black">
<div class="bg-gray-50 text-black dark:bg-white dark:text-black">
    <header role="banner" class="bg-white shadow p-4">
        <nav aria-label="Main Navigation" class="max-w-7xl mx-auto flex justify-between items-center">
            <ul class="flex space-x-6">
                <li><a href="{{ route('home') }}" class="text-gray-700 hover:underline" aria-label="Home">Home</a></li>
            </ul>

            <div class="flex space-x-8">
                <a href="{{ route('login') }}" class="text-gray-700 hover:underline" aria-label="Login">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:underline" aria-label="Register">Register</a>
            </div>
        </nav>
    </header>

    <main role="main" class="relative min-h-screen flex flex-col items-center justify-center">
        <section aria-labelledby="hero-heading" class="text-center my-10">
            <h1 id="hero-heading" class="text-4xl font-bold text-blue-600 dark:text-blue-600">
                Welkom bij Festibusje - Je ideale busreisplanner</h1>
            <p class="text-lg text-gray-700 mt-2">
                Plan eenvoudig je busreis naar festivals met onze gebruiksvriendelijke planner.</p>
        </section>

        <img src="{{ asset('images/busje1.jpg') }}" alt="Welkomsafbeelding" class="w-40 md:w-48 lg:w-64 h-auto mx-auto">


{{--        <section aria-labelledby="features-heading">--}}
{{--            <h2 id="features-heading">Waarom kiezen voor Festibusje?</h2>--}}
{{--            <ul>--}}
{{--                <li>Gemakkelijke boekingen</li>--}}
{{--                <li>Betaalbare prijzen</li>--}}
{{--                <li>Toegankelijk voor iedereen</li>--}}
{{--            </ul>--}}
{{--        </section>--}}
    </main>
@include ('admin.partials.footer')

</div>
</body>
</html>
