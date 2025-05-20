<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mijn Winkelmandje
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cart) > 0)
            <table class="w-full table-auto">
                <thead>
                <tr>
                    <th class="text-left">Naam</th>
                    <th class="text-left">Locatie</th>
                    <th class="text-left">Datum</th>
                    <th class="text-left">Acties</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $festival)
                    <tr class="border-t">
                        <td>{{ $festival['name'] }}</td>
                        <td>{{ $festival['location'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($festival['date'])->format('d-m-Y H:i') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $loop->index) }}" method="POST" class="inline">
                                @csrf
                                @method('POST')
                                <button type="submit" class="text-red-500 hover:text-red-700">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                <div class="mt-6">
                    <form method="POST" action="{{ route('cart.checkout') }}">
                        @csrf
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Afronden en betalen met punten
                        </button>
                    </form>
                </div>

            <div class="mt-6">
                <a href="{{ route('festivals.public.index') }}" class="text-blue-500 hover:text-blue-700">
                    ← Verder festivals bekijken
                </a>
            </div>
        @else
            <p class="text-gray-600">Je winkelmandje is nog leeg.</p>
            <div class="mt-4">
                <a href="{{ route('festivals.public.index') }}" class="text-blue-500 hover:text-blue-700">
                    ← Festivals bekijken
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
