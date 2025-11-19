<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CONCOURS ROBOT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Pico.css CDN --}}
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    {{-- Si tu as ton CSS perso, tu peux le garder --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Accueil</a></li>
                <li><a href="{{ route('colleges.list') }}">Liste des collèges</a></li>
                <li><a href="{{ route('colleges.deletePage') }}">Supprimer un collège</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Concours Robot</p>
    </footer>

</body>

</html>