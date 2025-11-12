<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Collèges</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f3f3f3;
        }
        header {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="website">

        <main class="main-content">
            <h2>Liste des Collèges</h2>

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
        </main>
    </div>
</body>
</html>
