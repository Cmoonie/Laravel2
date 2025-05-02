<x-app-layout>
    <!--Laat een groen succesbericht zien nadat een actie geslaagd is-->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <!--Laat een rood foutmelding zien als een validatie faalt-->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Er is iets misgegaan:</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Festival: {{ $festival->name }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h3 class="text-2xl mb-4">{{ $festival->name }}</h3>
            <p><strong>Beschrijving:</strong> {{ $festival->description }}</p>
            <p><strong>Locatie:</strong> {{ $festival->location }}</p>
            <p><strong>Datum:</strong> {{ $festival->scheduled_at->format('d-m-Y H:i') }}</p>

            <div class="mt-6">
                <a href="{{ route('festivals.index') }}" class="text-blue-500 hover:text-blue-700">← Terug naar festivals</a>
            </div>
        </div>
    </div>
</x-app-layout>
