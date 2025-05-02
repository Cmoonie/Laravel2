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
            Festival Bewerken
        </h2>
    </x-slot>
<!---Formulier wijzigen-->
    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('festivals.update', $festival) }}" method="POST">
                @csrf
                @method('PUT')
                <!---Naam wijzigen-->
                <div class="mb-4">
                    <label class="block text-gray-700">Naam</label>
                    <input type="text" name="name" value="{{ old('name', $festival->name) }}" class="w-full border rounded px-3 py-2">
                </div>
                <!---Slug wijzigen naam van de festival zal te zien zijn in de url-->
                <div class="mb-4">
                    <label class="block text-gray-700">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $festival->slug) }}" class="w-full border rounded px-3 py-2">
                </div>
                <!---beschrijving wijzigen-->
                <div class="mb-4">
                    <label class="block text-gray-700">Beschrijving</label>
                    <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $festival->description) }}</textarea>
                </div>
                <!---locatie wijzigen-->
                <div class="mb-4">
                    <label class="block text-gray-700">Locatie</label>
                    <input type="text" name="location" value="{{ old('location', $festival->location) }}" class="w-full border rounded px-3 py-2">
                </div>
                <!---datum wijzigen-->
                <div class="mb-6">
                    <label class="block text-gray-700">Datum</label>
                    <input type="datetime-local" name="scheduled_at" value="{{ old('scheduled_at', $festival->scheduled_at->format('Y-m-d\TH:i')) }}" class="w-full border rounded px-3 py-2">
                </div>
                <!---knop wijzigen-->
                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Festival bijwerken
                    </button>
                    <a href="{{ route('festivals.index') }}" class="text-blue-600 hover:underline">Terug</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

