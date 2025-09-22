<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RésaImmo')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-light font-sans text-dark">

    <!-- NAVBAR -->
    <nav class="bg-primary shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="/" class="text-white text-xl font-bold">🏡 RésaImmo</a>
            <div class="space-x-4">
                @auth
                    <span class="text-white">👋 {{ auth()->user()->name }}</span>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="text-white hover:underline">Déconnexion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:underline">Connexion</a>
                    <a href="{{ route('register') }}" class="text-white hover:underline">Inscription</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- CONTENU -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>
