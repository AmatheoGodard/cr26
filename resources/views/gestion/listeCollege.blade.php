<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Collège</title>
    
    <!-- Pico CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">

    <style>
        /* Personnalisation légère */
        body {
            padding: 2rem;
        }

        header {
            text-align: center;
            margin-bottom: 2rem;
        }

        table {
            margin-top: 1rem;
        }

        h2 {
            margin-top: 2rem;
        }

        /* Pour rendre le commentaire plus lisible */
        td {
            vertical-align: top;
        }

        /* Responsive table scroll */
        .table-wrapper {
            overflow-x: auto;
        }
    </style>
</head>
<header>
@yield('content')
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Accueil</a></li>
                <li><a href="{{ route('colleges.list') }}">Liste des collèges</a></li>
                <li><a href="{{ route('colleges.deletePage') }}">Supprimer un collège</a></li>
            </ul>
        </nav>
</header>
<body>
    <header role="banner">
        Ajouter un Collège
    </header>

    <main>
        <h2>Liste des Collèges</h2>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Adresse 1</th>
                        <th>Adresse 2</th>
                        <th>Lieu</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                        <th>Région</th>
                        <th>Commentaire</th>
                        <th>Pays</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colleges as $college)
                        <tr>
                            <td>{{ $college->code }}</td>
                            <td>{{ $college->nom }}</td>
                            <td>{{ $college->adr_ligne_1 }}</td>
                            <td>{{ $college->adr_ligne_2 }}</td>
                            <td>{{ $college->adr_lieu }}</td>
                            <td>{{ $college->adr_code_postal }}</td>
                            <td>{{ $college->adr_ville }}</td>
                            <td>{{ $college->adr_region }}</td>
                            <td>{{ $college->commentaire }}</td>
                            <td>{{ $college->code_pays }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
