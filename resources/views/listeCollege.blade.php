<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Collèges</title>

    {{-- Intégration de Pico.css pour le style minimaliste --}}
    <link rel="stylesheet" href="{{ asset('css/pico.css') }}">
    {{-- CSS personnalisé pour surcharger ou compléter Pico.css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Styles supplémentaires pour rendre le tableau responsive --}}
    <style>
        main {
            overflow-x: auto;
            /* Scroll horizontal si tableau trop large */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>

<body>

    {{-- En-tête de la page avec titre et navigation --}}
    <header class="container">
        <h1>Liste des Collèges</h1>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Accueil</a></li>
                <li><a href="{{ route('colleges.form') }}">Ajouter un collège</a></li>
                <li><a href="{{ route('colleges.deletePage') }}">Supprimer un collège</a></li>
            </ul>
        </nav>
    </header>

    {{-- Contenu principal --}}
    <main class="container">

        {{-- Affichage des messages de succès ou d'erreur --}}
        @if(session('success'))
        <article class="alert success">{{ session('success') }}</article>
        @endif

        @if(session('error'))
        <article class="alert error">{{ session('error') }}</article>
        @endif

        {{-- Vérifie si la liste des collèges est vide --}}
        @if($colleges->isEmpty())
        <article class="alert warning">
            Aucun collège trouvé.
        </article>
        @else
        {{-- Définition d’un tableau des colonnes pour faciliter la maintenance --}}
        @php
        $columns = [
        'code', 'nom', 'adr_ligne_1', 'adr_ligne_2',
        'adr_lieu', 'adr_code_postal', 'adr_ville',
        'adr_region', 'commentaire', 'code_pays'
        ];
        @endphp

        {{-- Tableau affichant tous les collèges --}}
        <table>
            <thead>
                <tr>
                    {{-- Boucle pour générer les en-têtes dynamiquement --}}
                    @foreach ($columns as $col)
                    <th scope="col">{{ ucfirst(str_replace('_', ' ', $col)) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{-- Boucle pour chaque collège --}}
                @foreach ($colleges as $college)
                <tr>
                    {{-- Boucle pour afficher chaque champ du collège --}}
                    @foreach ($columns as $col)
                    <td>{{ $college->$col }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

    </main>

    {{-- Pied de page avec copyright --}}
    <footer class="container">
        <p>&copy; {{ date('Y') }} Concours Robot</p>
    </footer>

</body>

</html>