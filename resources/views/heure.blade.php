<x-layout>
    <x-slot:title>Heure actuelle - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold">Date et heure actuelles</h1>

    <p class="mt-4 text-gray-700">
        Heure : {{ $heure }}
    </p>

    <p class="mt-2 text-gray-700">
        Date : {{ $date }}
    </p>

    <p class="mt-6">
        <a href="{{ route('home') }}" class="text-red-600 underline">
            Retour à l'accueil
        </a>
    </p>
</x-layout>
