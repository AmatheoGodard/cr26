<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Collège</title>
    <link rel="stylesheet" href="{{ asset('css/pico.css') }}">
</head>
<body>

<header class="container">
    <h1>Modifier Collège</h1>
    <nav>
        <ul>
            <li><a href="{{ route('colleges.list') }}">Liste des collèges</a></li>
            <li><a href="{{ route('colleges.form') }}">Ajouter un collège</a></li>
        </ul>
    </nav>
</header>

<main class="container">
    @if(session('success'))
        <article class="alert success">{{ session('success') }}</article>
    @endif

    @if(session('error'))
        <article class="alert error">{{ session('error') }}</article>
    @endif

    <form method="POST" action="{{ route('colleges.update', $college->id) }}">
        @csrf
        @method('PUT')

        <label for="code">Code</label>
        <input type="text" name="code" id="code" value="{{ old('code', $college->code) }}">

        <label for="nom">Nom *</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom', $college->nom) }}" required>

        <label for="adr_ligne_1">Adresse ligne 1</label>
        <input type="text" name="adr_ligne_1" id="adr_ligne_1" value="{{ old('adr_ligne_1', $college->adr_ligne_1) }}">

        <label for="adr_ligne_2">Adresse ligne 2</label>
        <input type="text" name="adr_ligne_2" id="adr_ligne_2" value="{{ old('adr_ligne_2', $college->adr_ligne_2) }}">

        <label for="adr_lieu">Lieu</label>
        <input type="text" name="adr_lieu" id="adr_lieu" value="{{ old('adr_lieu', $college->adr_lieu) }}">

        <label for="adr_code_postal">Code Postal</label>
        <input type="text" name="adr_code_postal" id="adr_code_postal" value="{{ old('adr_code_postal', $college->adr_code_postal) }}">

        <label for="adr_ville">Ville</label>
        <input type="text" name="adr_ville" id="adr_ville" value="{{ old('adr_ville', $college->adr_ville) }}">

        <label for="adr_region">Région</label>
        <input type="text" name="adr_region" id="adr_region" value="{{ old('adr_region', $college->adr_region) }}">

        <label for="commentaire">Commentaire</label>
        <textarea name="commentaire" id="commentaire">{{ old('commentaire', $college->commentaire) }}</textarea>

        <label for="code_pays">Code Pays *</label>
        <input type="text" name="code_pays" id="code_pays" value="{{ old('code_pays', $college->code_pays) }}" required>

        <button type="submit">Mettre à jour</button>
    </form>
</main>

<footer class="container">
    <p>&copy; {{ date('Y') }} Concours Robot</p>
</footer>

</body>
</html>
