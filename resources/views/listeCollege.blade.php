<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Collège</title>
</head>

<body>
    <div class="website">
        <header class="header" role="banner">
            Ajouter un Collège
        </header>

        <main class="main-content">
            <!-- LISTE DES COLLEGES-->
            <h2>Liste des Collèges</h2>
            <?php
            // Exemple de données de collèges
            foreach ($colleges as $college): ?>
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
            <?php endforeach; ?>
        </main>
    </div>
</body>

</html>