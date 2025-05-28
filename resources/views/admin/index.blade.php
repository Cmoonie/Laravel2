{{--Basislayout als beheerder--}}

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
Admin Festivals beheer
</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <a href="{{ route('festivals.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">+ Festival toevoegen</a>

            <table class="w-full table-auto mt-4">
                <thead>
                    <tr>
                        <th class="text-left">Naam</th>
                        <th class="text-left">Locatie</th>
                        <th class="text-left">Datum</th>
                        <th class="text-left">Acties</th>
                    </tr>
                </thead>
                <tbody>
@foreach($festivals as $festival)
    <tr class="border-t">
        <td>{{ $festival->name }}</td>
        <td>{{ $festival->location }}</td>
        <td>{{ $festival->scheduled_at->format('d-m-Y') }}</td>
        <td>
            <a href="{{ route('festivals.edit', $festival->id) }}" class="text-blue-500">Bewerken</a> |
            <form action="{{ route('festivals.destroy', $festival->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button class="text-red-500" type="submit">Verwijderen</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
            <div class="mb-6">
                <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-700">
                    ← Terug naar Dashboard
                </a>
            </div>
    </div>
    </div>
    </x-app-layout>
