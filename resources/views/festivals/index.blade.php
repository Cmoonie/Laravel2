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
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Alle Festivals
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">
        @if ($festivals->isEmpty())
            <p class="text-gray-600">Er zijn momenteel geen festivals beschikbaar.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($festivals as $festival)
                    <div class="bg-white rounded shadow p-4">
                        <h3 class="text-lg font-bold">{{ $festival->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $festival->location }}</p>
                        <p class="text-sm">{{ \Carbon\Carbon::parse($festival->scheduled_at)->format('d-m-Y H:i') }}</p>
                        <p class="mt-2">{{ Str::limit($festival->description, 100) }}</p>

                        <a href="#" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded text-sm">Meer info</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    @foreach($festivals as $festival)
        <div class="p-4 mb-4 bg-white shadow rounded">
            <h3 class="text-xl font-bold">{{ $festival->name }}</h3>
            <p>{{ $festival->description }}</p>
            <a href="{{ route('festivals.show', $festival) }}" class="text-blue-500 hover:text-blue-700">Bekijk details</a>
        </div>
    @endforeach

</x-app-layout>
