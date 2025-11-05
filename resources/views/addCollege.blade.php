<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Collège</title>
    <link rel="stylesheet" href="{{ asset('css/addCollege.css') }}">
</head>

<body>
    <div class="website">
        <header class="header" role="banner">
            Ajouter un Collège
        </header>

        <main class="main-content">
            
            <!-- Formulaire d'ajout -->
            <form action="{{ route('colleges.create') }}" method="POST">
                @csrf

                <label for="code">Code :</label>
                <input type="text" name="code" id="code" value="{{ old('code') }}">
                <br>
                <label for="nom">Nom <span style="color:red">*</span> :</label>
                <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
                <br>
                <label for="adr_ligne_1">Adresse ligne 1 :</label>
                <input type="text" name="adr_ligne_1" id="adr_ligne_1" value="{{ old('adr_ligne_1') }}">
                <br>

                <label for="adr_ligne_2">Adresse ligne 2 :</label>
                <input type="text" name="adr_ligne_2" id="adr_ligne_2" value="{{ old('adr_ligne_2') }}">
                <br>
                <label for="adr_lieu">Lieu :</label>
                <input type="text" name="adr_lieu" id="adr_lieu" value="{{ old('adr_lieu') }}">
                <br>
                <label for="adr_code_postal">Code postal :</label>
                <input type="text" name="adr_code_postal" id="adr_code_postal" value="{{ old('adr_code_postal') }}">
                <br>
                <label for="adr_ville">Ville :</label>
                <input type="text" name="adr_ville" id="adr_ville" value="{{ old('adr_ville') }}">
                <br>
                <label for="adr_region">Région :</label>
                <input type="text" name="adr_region" id="adr_region" value="{{ old('adr_region') }}">
                <br>
                <label for="commentaire">Commentaire :</label>
                <textarea name="commentaire" id="commentaire">{{ old('commentaire') }}</textarea>
                <br>
                <label for="code_pays">Code pays :</label>
                <input type="text" name="code_pays" id="code_pays" value="{{ old('code_pays') }}">  

                <button type="submit">Ajouter</button>
            </form>
            <p>{{ session('success') }}</p>
        </main>
    </div>
</body>

</html>
