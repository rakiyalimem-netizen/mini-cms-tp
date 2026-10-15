<x-layout>
    <x-slot:title>Accueil - Mini-CMS</x-slot:title>

    <section class="py-10">
        <h1 class="text-4xl font-bold mb-4">
            Bienvenue sur Mini-CMS
        </h1>

        <p class="text-lg text-gray-600 mb-6 max-w-2xl">
            Une petite plateforme de publication construite pas à pas
            pendant l'Atelier Framework Côté Serveur.
        </p>

        <a href="{{ route('posts.index') }}"
           class="inline-block rounded-md bg-indigo-600 px-5 py-2.5 font-medium text-white hover:bg-indigo-700">
            Lire les articles
        </a>
    </section>

    <section class="mt-8">
        <x-page-header title="Derniers articles publiés" />

        <div class="grid gap-6 md:grid-cols-2">
            @forelse ($latestPosts as $post)
                <x-post-card :post="$post" />
            @empty
                <x-alert type="warning" title="Aucun article publié">
                    Il n'y a pas encore d'article publié.
                </x-alert>
            @endforelse
        </div>

        <div class="mt-6">
            <a href="{{ route('posts.index') }}"
               class="text-sm font-medium text-indigo-600 hover:underline">
                Voir tous les articles
            </a>
        </div>
    </section>
</x-layout>