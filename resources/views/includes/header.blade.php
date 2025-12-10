<nav class="navbar">
    <div class="navbar-brand">
        <a href="{{ route('home') }}">Projet concours-robots</a>

        <button class="burger" id="burger">
            <span></span><span></span><span></span>
        </button>
    </div>

    <ul class="nav-links" id="nav-links">

        <!-- Toujours visible -->
        <li><a href="{{ route('home') }}">Accueil</a></li>

        <!-- Menu invité -->
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


        <!-- Menu connecté -->
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
                    <li><a href="">Pays</a></li>
                </ul>
            </li>

            <!-- Déconnexion (Livewire Breeze)  -->
            <li>
                @livewire('layout.navigation')
            </li>
        @endauth
    </ul>
</nav>

<script>
    const burger = document.getElementById('burger');
    const navLinks = document.getElementById('nav-links');

    burger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
</script>
