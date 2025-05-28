<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gebruikersdashboard
        </h2>
    </x-slot>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 border border-green-400 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-900 mb-4">Welkom terug, {{ Auth::user()->name }}!</p>

                <p class="mb-2">Je huidige puntensaldo: <strong>{{ Auth::user()->points }}</strong></p>

                <a href="{{ route('festivals.public.index') }}" class="text-blue-600 hover:underline">
                    → Bekijk beschikbare festivals
                </a>

                <br>

                <a href="{{ route('cart.index') }}" class="text-blue-600 hover:underline">
                    → Ga naar je winkelmandje
                </a>
                <br>

                <a href="{{ route('coins.buy') }}" class="text-white bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded mt-4 inline-block">
                    💰 Muntjes kopen
                </a>
            </div>
            @if($orders->count() > 0)
                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-2">Jouw geboekte festivals</h3>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($orders as $order)
                            <li>
                                <strong>{{ $order->festival->name }}</strong> –
                                {{ \Carbon\Carbon::parse($order->festival->scheduled_at)->format('d-m-Y H:i') }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <p class="mt-6 text-gray-600">Je hebt nog geen festivals geboekt.</p>
            @endif
        </div>
    </div>

</x-app-layout>


