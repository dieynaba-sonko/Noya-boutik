<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Noya-boutik')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cream text-ink">

    <header class="border-b border-gold/30 bg-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between p-4">
            <a href="/">
                <img src="{{ asset('images/logo.jpg') }}" alt="Noya-boutik" class="h-14 w-14 rounded-full">
            </a>

            <nav class="flex gap-6 text-sm font-medium">
                <a href="{{ route('products.index') }}" class="hover:text-gold-dark">Produits</a>
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-6xl p-6">
        @yield('content')
    </main>

    <footer class="mt-12 border-t border-gold/30 py-6 text-center text-sm text-gold-dark">
        Noya-boutik : plus qu'une boutique, un style de vie
    </footer>

</body>
</html>