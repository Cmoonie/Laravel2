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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($festivals as $festival)
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-bold">{{ $festival->name }}</h3>
                    <p class="mt-2">{{ $festival->description }}</p>
                    <p class="mt-2 text-sm text-gray-600">{{ $festival->location }}</p>
                    <p class="mt-2 text-sm text-gray-600">{{ $festival->scheduled_at->format('d-m-Y') }}</p>

                    <a href="#" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Boek dit festival
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
