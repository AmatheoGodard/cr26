<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Collège</title>

    {{-- Pico.css --}}
    <link rel="stylesheet" href="{{ asset('css/pico.css') }}">
    {{-- CSS personnalisé --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header class="container">
        <h1>Ajouter un Collège</h1>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Accueil</a></li>
                <li><a href="{{ route('colleges.list') }}">Liste des collèges</a></li>
                <li><a href="{{ route('colleges.deletePage') }}">Supprimer un collège</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">

        {{-- Message de succès --}}
        @if(session('success'))
        <article class="alert success">
            {{ session('success') }}
        </article>
        @endif

        {{-- Message d'erreur --}}
        @if($errors->any())
        <article class="alert error">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </article>
        @endif

        <form action="{{ route('colleges.create') }}" method="POST">
            @csrf

            <label for="code">Code :</label>
            <input type="text" name="code" id="code" value="{{ old('code') }}">

            <label for="nom">Nom <span style="color:red">*</span> :</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required>

            <label for="adr_ligne_1">Adresse ligne 1 :</label>
            <input type="text" name="adr_ligne_1" id="adr_ligne_1" value="{{ old('adr_ligne_1') }}">

            <label for="adr_ligne_2">Adresse ligne 2 :</label>
            <input type="text" name="adr_ligne_2" id="adr_ligne_2" value="{{ old('adr_ligne_2') }}">

            <label for="adr_lieu">Lieu :</label>
            <input type="text" name="adr_lieu" id="adr_lieu" value="{{ old('adr_lieu') }}">

            <label for="adr_code_postal">Code postal :</label>
            <input type="text" name="adr_code_postal" id="adr_code_postal" value="{{ old('adr_code_postal') }}">

            <label for="adr_ville">Ville :</label>
            <input type="text" name="adr_ville" id="adr_ville" value="{{ old('adr_ville') }}">

            <label for="adr_region">Région :</label>
            <input type="text" name="adr_region" id="adr_region" value="{{ old('adr_region') }}">

            <label for="commentaire">Commentaire :</label>
            <textarea name="commentaire" id="commentaire">{{ old('commentaire') }}</textarea>

            <label for="code_pays">Code pays :</label>
            <input type="text" name="code_pays" id="code_pays" value="{{ old('code_pays') }}">

            <button type="submit">Ajouter</button>
        </form>

    </main>

    <footer class="container">
        <p>&copy; {{ date('Y') }} Concours Robot</p>
    </footer>

</body>

</html>