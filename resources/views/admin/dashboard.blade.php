<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-900 mb-4">Welkom, {{ Auth::user()->name }} (Admin)!</p>

                <a href="{{ route('admin.festivals.index') }}" class="text-blue-600 hover:underline">
                    → Beheer festivals
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

