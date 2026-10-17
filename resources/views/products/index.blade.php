<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produits - Noya-boutik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
    <main class="mx-auto max-w-6xl p-6">
        <h1 class="mb-6 text-3xl font-bold">Nos produits</h1>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($products as $product)
                <article class="rounded-lg bg-white p-4 shadow">
                    <p class="text-sm text-gray-500">{{ $product->category->name }}</p>
                        <h2 class="text-lg font-semibold">
                          <a href="{{ route('products.show', $product->slug) }}" class="hover:underline">
                            {{ $product->name }}
                          </a>
                        </h2>
                    <p class="mt-1 text-sm text-gray-600">{{ $product->description }}</p>
                    <p class="mt-3 text-xl font-bold">
                        {{ number_format($product->price, 0, ',', ' ') }} FCFA
                    </p>
                </article>
            @empty
                <p>Aucun produit disponible pour le moment.</p>
            @endforelse
        </div>
    </main>
</body>
</html>