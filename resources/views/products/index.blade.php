@extends('layouts.app')

@section('title', 'Produits - Noya-boutik')

@section('content')
    <h1 class="mb-6 text-3xl font-bold">Nos produits</h1>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($products as $product)
            <article class="rounded-lg border border-gold/20 bg-white p-4 shadow">
                <p class="text-sm text-gold-dark">{{ $product->category->name }}</p>
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
@endsection