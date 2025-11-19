<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Collèges</title>
    <link rel="stylesheet" href="{{ asset('css/pico.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        main { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        /* Styles pour les modals */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0; top: 0; width: 100%; height: 100%; 
            overflow: auto; background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: #fff; margin: 10% auto; padding: 20px; border-radius: 5px;
            width: 90%; max-width: 600px; position: relative;
        }
        .close { position: absolute; top: 10px; right: 15px; font-size: 24px; cursor: pointer; }
    </style>
</head>
<body>

<header class="container">
    <h1>Gestion des Collèges</h1>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Accueil</a></li>
        </ul>
    </nav>
</header>

<main class="container">

    {{-- Bouton pour ouvrir le modal d'ajout --}}
    <button id="openAddModal">Ajouter un collège</button>

    {{-- Message de succès ou d'erreur --}}
    @if(session('success'))
        <article class="alert success">{{ session('success') }}</article>
    @endif
    @if(session('error'))
        <article class="alert error">{{ session('error') }}</article>
    @endif

    {{-- Champ de recherche --}}
    <label for="search">Rechercher :</label>
    <input type="text" id="search" placeholder="Rechercher dans le tableau...">

    @php
    $columns = [
        'code', 'nom', 'adr_ligne_1', 'adr_ligne_2',
        'adr_lieu', 'adr_code_postal', 'adr_ville',
        'adr_region', 'commentaire', 'code_pays'
    ];
    @endphp

    @if($colleges->isEmpty())
        <article class="alert warning">Aucun collège trouvé.</article>
    @else
        <table id="collegeTable">
            <thead>
                <tr>
                    @foreach ($columns as $col)
                        <th>{{ ucfirst(str_replace('_', ' ', $col)) }}</th>
                    @endforeach
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colleges as $college)
                <tr data-id="{{ $college->id }}">
                    @foreach ($columns as $col)
                        <td>{{ $college->$col }}</td>
                    @endforeach
                    <td>
                        <button class="editBtn" 
                                data-id="{{ $college->id }}"
                                data-code="{{ $college->code }}"
                                data-nom="{{ $college->nom }}"
                                data-adr_ligne_1="{{ $college->adr_ligne_1 }}"
                                data-adr_ligne_2="{{ $college->adr_ligne_2 }}"
                                data-adr_lieu="{{ $college->adr_lieu }}"
                                data-adr_code_postal="{{ $college->adr_code_postal }}"
                                data-adr_ville="{{ $college->adr_ville }}"
                                data-adr_region="{{ $college->adr_region }}"
                                data-commentaire="{{ $college->commentaire }}"
                                data-code_pays="{{ $college->code_pays }}">Modifier</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</main>

{{-- Modal Ajouter --}}
<div id="addModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeAdd">&times;</span>
        <h2>Ajouter un collège</h2>
        <form action="{{ route('colleges.create') }}" method="POST">
            @csrf
            <label for="code">Code :</label>
            <input type="text" name="code" id="codeAdd" value="{{ old('code') }}">
            <label for="nom">Nom <span style="color:red">*</span> :</label>
            <input type="text" name="nom" id="nomAdd" value="{{ old('nom') }}" required>
            <label for="adr_ligne_1">Adresse ligne 1 :</label>
            <input type="text" name="adr_ligne_1" id="adr_ligne_1Add" value="{{ old('adr_ligne_1') }}">
            <label for="adr_ligne_2">Adresse ligne 2 :</label>
            <input type="text" name="adr_ligne_2" id="adr_ligne_2Add" value="{{ old('adr_ligne_2') }}">
            <label for="adr_lieu">Lieu :</label>
            <input type="text" name="adr_lieu" id="adr_lieuAdd" value="{{ old('adr_lieu') }}">
            <label for="adr_code_postal">Code postal :</label>
            <input type="text" name="adr_code_postal" id="adr_code_postalAdd" value="{{ old('adr_code_postal') }}">
            <label for="adr_ville">Ville :</label>
            <input type="text" name="adr_ville" id="adr_villeAdd" value="{{ old('adr_ville') }}">
            <label for="adr_region">Région :</label>
            <input type="text" name="adr_region" id="adr_regionAdd" value="{{ old('adr_region') }}">
            <label for="commentaire">Commentaire :</label>
            <textarea name="commentaire" id="commentaireAdd">{{ old('commentaire') }}</textarea>
            <label for="code_pays">Code pays :</label>
            <input type="text" name="code_pays" id="code_paysAdd" value="{{ old('code_pays') }}">
            <button type="submit">Ajouter</button>
        </form>
    </div>
</div>

{{-- Modal Modifier --}}
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeEdit">&times;</span>
        <h2>Modifier le collège</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="editId">
            <label for="code">Code :</label>
            <input type="text" name="code" id="codeEdit">
            <label for="nom">Nom <span style="color:red">*</span> :</label>
            <input type="text" name="nom" id="nomEdit" required>
            <label for="adr_ligne_1">Adresse ligne 1 :</label>
            <input type="text" name="adr_ligne_1" id="adr_ligne_1Edit">
            <label for="adr_ligne_2">Adresse ligne 2 :</label>
            <input type="text" name="adr_ligne_2" id="adr_ligne_2Edit">
            <label for="adr_lieu">Lieu :</label>
            <input type="text" name="adr_lieu" id="adr_lieuEdit">
            <label for="adr_code_postal">Code postal :</label>
            <input type="text" name="adr_code_postal" id="adr_code_postalEdit">
            <label for="adr_ville">Ville :</label>
            <input type="text" name="adr_ville" id="adr_villeEdit">
            <label for="adr_region">Région :</label>
            <input type="text" name="adr_region" id="adr_regionEdit">
            <label for="commentaire">Commentaire :</label>
            <textarea name="commentaire" id="commentaireEdit"></textarea>
            <label for="code_pays">Code pays :</label>
            <input type="text" name="code_pays" id="code_paysEdit">
            <button type="submit">Modifier</button>
        </form>
    </div>
</div>

<script>
    // Ouverture/Fermeture modals
    const addModal = document.getElementById('addModal');
    const editModal = document.getElementById('editModal');
    document.getElementById('openAddModal').onclick = () => addModal.style.display = 'block';
    document.getElementById('closeAdd').onclick = () => addModal.style.display = 'none';
    document.getElementById('closeEdit').onclick = () => editModal.style.display = 'none';
    window.onclick = e => { if(e.target == addModal) addModal.style.display='none'; if(e.target == editModal) editModal.style.display='none'; }

    // Pré-remplissage du formulaire de modification
    const editButtons = document.querySelectorAll('.editBtn');
    editButtons.forEach(btn => {
        btn.onclick = () => {
            document.getElementById('editId').value = btn.dataset.id;
            document.getElementById('codeEdit').value = btn.dataset.code;
            document.getElementById('nomEdit').value = btn.dataset.nom;
            document.getElementById('adr_ligne_1Edit').value = btn.dataset.adr_ligne_1;
            document.getElementById('adr_ligne_2Edit').value = btn.dataset.adr_ligne_2;
            document.getElementById('adr_lieuEdit').value = btn.dataset.adr_lieu;
            document.getElementById('adr_code_postalEdit').value = btn.dataset.adr_code_postal;
            document.getElementById('adr_villeEdit').value = btn.dataset.adr_ville;
            document.getElementById('adr_regionEdit').value = btn.dataset.adr_region;
            document.getElementById('commentaireEdit').value = btn.dataset.commentaire;
            document.getElementById('code_paysEdit').value = btn.dataset.code_pays;
            document.getElementById('editForm').action = `/colleges/${btn.dataset.id}`;
            editModal.style.display = 'block';
        }
    });

    // Filtrage instantané
    document.getElementById('search').addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#collegeTable tbody tr');
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>

</body>
</html>
