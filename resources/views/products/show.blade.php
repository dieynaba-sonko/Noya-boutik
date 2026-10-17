@extends('layouts.app')

@section('title', $product->name . ' - Noya-boutik')

@section('content')
    <div class="mx-auto max-w-3xl">
        <a href="{{ route('products.index') }}" class="text-sm text-gold-dark hover:underline">
            &larr; Retour aux produits
        </a>

        <article class="mt-4 rounded-lg border border-gold/20 bg-white p-6 shadow">
            <p class="text-sm text-gold-dark">{{ $product->category->name }}</p>
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
    </div>
@endsection