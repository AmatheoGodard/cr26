<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Collège</title>
    
    <!-- Pico.css -->
    <link rel="stylesheet" href="{{ asset('css/pico.css') }}">
    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
                <li><a href="{{ route('colleges.create') }}">Ajouter un collège</a></li>
                <li><a href="{{ route('colleges.deletePage') }}">Supprimer un collège</a></li>
            </ul>
        </nav>
</header>
<body>
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
                        <th>Action</th>
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
                            <td>
                <a href="{{ route('colleges.edit', $college->id) }}" class="button">Modifier</a>
            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
