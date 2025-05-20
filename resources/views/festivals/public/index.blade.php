<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Alle Festivals
        </h2>
        <nav class="space-x-4">
            <a href="{{ route('home') }}" class="text-blue-500 hover:underline">Home</a>
            <a href="{{ route('festivals.public.index') }}" class="text-blue-500 hover:underline">Festivals</a>
        </nav>
        </div>
    </x-slot>


    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- GRID WRAPPER -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($festivals as $festival)
        <div class="festival-card bg-white p-6 rounded shadow hover:scale-105 transform transition-transform duration-200">
        <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-bold">{{ $festival->name }}</h3>
                    <p class="mt-2">{{ $festival->description }}</p>
                    <p class="mt-2 text-sm text-gray-600">{{ $festival->location }}</p>
                    <p class="mt-2 text-sm text-gray-600">{{ $festival->scheduled_at->format('d-m-Y') }}</p>
                    <p class="mt-2 text-sm text-gray-600">Prijs: 10 punten (je krijgt 2 punten terug)</p>

    <form method="POST" action="{{ route('cart.add', $festival['id']) }}">
        @csrf
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Voeg toe aan winkelmandje
        </button>
    </form>
        </div>
    </div>
    @endforeach




</x-app-layout>
