<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - Noya-boutik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
    <main class="mx-auto max-w-3xl p-6">
        <a href="{{ route('products.index') }}" class="text-sm text-blue-600 hover:underline">
            &larr; Retour aux produits
        </a>

        <article class="mt-4 rounded-lg bg-white p-6 shadow">
            <p class="text-sm text-gray-500">{{ $product->category->name }}</p>
            <h1 class="mt-1 text-3xl font-bold">{{ $product->name }}</h1>

            <p class="mt-4 text-gray-700">{{ $product->description }}</p>

            <p class="mt-6 text-3xl font-bold">
                {{ number_format($product->price, 0, ',', ' ') }} FCFA
            </p>

            @if ($product->stock_quantity > 0)
                <p class="mt-2 text-sm text-green-600">En stock</p>
            @else
                <p class="mt-2 text-sm text-red-600">Rupture de stock</p>
            @endif
        </article>
    </main>
</body>
</html>