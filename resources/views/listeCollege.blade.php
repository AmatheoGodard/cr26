<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Collèges</title>

    {{-- Intégration de Pico.css --}}
    <link rel="stylesheet" href="{{ asset('css/pico.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        main {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Optionnel : style pour le champ de recherche */
        #searchInput {
            margin-bottom: 1rem;
            padding: 0.5rem;
            width: 100%;
            max-width: 400px;
            font-size: 1rem;
        }
    </style>
</head>

<body>

    <header class="container">
        <h1>Liste des Collèges</h1>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Accueil</a></li>
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

        {{-- Champ de recherche --}}
        <input type="text" id="searchInput" placeholder="Rechercher dans le tableau...">

        @if($colleges->isEmpty())
        <article class="alert warning">
            Aucun collège trouvé.
        </article>
        @else
        @php
        $columns = [
            'code', 'nom', 'adr_ligne_1', 'adr_ligne_2',
            'adr_lieu', 'adr_code_postal', 'adr_ville',
            'adr_region', 'commentaire', 'code_pays'
        ];
        @endphp

        <table id="collegesTable">
            <thead>
                <tr>
                    @foreach ($columns as $col)
                    <th scope="col">{{ ucfirst(str_replace('_', ' ', $col)) }}</th>
                    @endforeach
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colleges as $college)
                <tr>
                    @foreach ($columns as $col)
                    <td>{{ $college->$col }}</td>
                    @endforeach
                    <td>
                        {{-- Bouton Modifier uniquement --}}
                        <a href="{{ route('colleges.edit', $college->id) }}" class="secondary">Modifier</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

    </main>

    <footer class="container">
        <p>&copy; {{ date('Y') }} Concours Robot</p>
    </footer>

    {{-- Script de recherche côté client --}}
    <script>
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('collegesTable');
        const rows = table ? table.getElementsByTagName('tr') : [];

        searchInput.addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();

            for (let i = 1; i < rows.length; i++) { // commencer à 1 pour ignorer l'en-tête
                let row = rows[i];
                let cells = row.getElementsByTagName('td');
                let found = false;

                for (let j = 0; j < cells.length - 1; j++) { // ignorer la dernière colonne Actions
                    if (cells[j].textContent.toLowerCase().includes(filter)) {
                        found = true;
                        break;
                    }
                }

                row.style.display = found ? '' : 'none';
            }
        });
    </script>

</body>

</html>
