<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gebruikersdashboard
        </h2>
    </x-slot>

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
            </div>
        </div>
    </div>
</x-app-layout>


