<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <nav class="navbar">
            <div class="navbar-brand">
                <a href="{{ route('home') }}">Projet concours-robots</a>

                <button class="burger" id="burger">
                    <span></span><span></span><span></span>
                </button>
            </div>

            <ul class="nav-links" id="nav-links">

                <li><a href="{{ route('home') }}">Accueil</a></li>

                @guest
                <li class="dropdown">
                    <a href="#">Collèges ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="">Élèves</a></li>
                        <li><a href="">Équipe</a></li>
                    </ul>
                </li>

                <li><a href="">Épreuves</a></li>
                <li><a href="">Classement</a></li>

                <li class="dropdown">
                    <a href="#">Édition ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="">2024</a></li>
                        <li><a href="">2025</a></li>
                    </ul>
                </li>

                @if (Route::has('login'))
                <li><a href="{{ route('login') }}">Connexion</a></li>
                @endif

                @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Inscription</a></li>
                @endif
                @endguest


                @auth
                <li class="dropdown">
                    <a href="#">Collèges ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="">Élèves</a></li>
                        <li><a href="">Équipe</a></li>
                    </ul>
                </li>

                <li><a href="">Épreuves</a></li>
                <li><a href="">Classement</a></li>

                <li class="dropdown">
                    <a href="#">Édition ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="">2024</a></li>
                        <li><a href="">2025</a></li>
                    </ul>
                </li>

                <li><a href="">Saisie Note</a></li>

                <li class="dropdown">
                    <a href="#">Page Gestion ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="">Épreuves</a></li>
                        <li><a href="{{ route('colleges.list') }}">Collèges</a></li>

                        {{-- SOUS-MENU CONCOURS --}}
                        <li class="dropdown">
                            <a href="#">Concours ▾</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('concours.index') }}">Liste des concours</a></li>
                                <li><a href="{{ route('concours.create') }}">Créer un concours</a></li>
                            </ul>
                        </li>

                        <li><a href="">Abonnement</a></li>
                        <li><a href="">Rôle</a></li>

                        <li class="dropdown">
                            <a href="#">Résultat ▾</a>
                            <ul class="dropdown-menu">
                                <li><a href="">Édition</a></li>
                                <li><a href="">Exportation</a></li>
                                <li><a href="">Modification</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">Page Admin ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="">Genre</a></li>
                        <li><a href="">Utilisateurs</a></li>

                        {{-- SOUS-MENU PAYS NETTOYÉ ET SÉCURISÉ --}}
                        <li class="dropdown">
                            <a href="#">Pays ▾</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('pays.list') }}">Liste des pays</a>
                                </li>
                                <li>
                                    <a href="{{ route('pays.form') }}">Ajouter un pays</a>
                                </li>
                                <li>
                                    <a href="{{ route('pays.deletePage') }}">Supprimer un pays</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn" style="background: none; border: none; color: inherit; font: inherit; cursor: pointer; padding: 0.5rem 0.8rem;">
                            Déconnexion
                        </button>
                    </form>
                </li>
                @endauth
            </ul>
        </nav>

        <main>
            {{ $slot }}
        </main>
    </div>

    <script>
        const burger = document.getElementById('burger');
        const navLinks = document.getElementById('nav-links');
        if (burger && navLinks) {
            burger.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
        }
    </script>
</body>

</html>