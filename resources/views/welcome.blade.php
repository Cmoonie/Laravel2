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
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <header role="banner">
        <nav aria-label="Main Navigation">
            <ul>
                <li><a href="{{ route('home') }}" aria-label="Home">Home</a></li>
                <li><a href="{{ route('login') }}" aria-label="Login">Login</a></li>
                <li><a href="{{ route('register') }}" aria-label="Register">Register</a></li>
            </ul>
        </nav>
    </header>

    <main role="main" class="relative min-h-screen flex flex-col items-center justify-center">
        <section aria-labelledby="hero-heading">
            <h1 id="hero-heading">Welkom bij Festibusje - Je ideale busreisplanner</h1>
            <p>Plan eenvoudig je busreis naar festivals met onze gebruiksvriendelijke planner.</p>
        </section>

        <section aria-labelledby="features-heading">
            <h2 id="features-heading">Waarom kiezen voor Festibusje?</h2>
            <ul>
                <li>Gemakkelijke boekingen</li>
                <li>Betaalbare prijzen</li>
                <li>Toegankelijk voor iedereen</li>
            </ul>
        </section>
    </main>

    <footer role="contentinfo">
        <p>&copy; {{ date('Y') }} Festibusje. Alle rechten voorbehouden.</p>
    </footer>
</div>
</body>
</html>
