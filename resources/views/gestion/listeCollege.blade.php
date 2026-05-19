{{-- resources/views/admin/listeColleges.blade.php --}}

<x-app-layout>
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Liste des Collèges</h1>
            <a href="{{ route('colleges.create') }}" class="btn btn-primary">
                Ajouter un collège
            </a>
        </div>

        {{-- Affichage du message de succès après suppression ou modification --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
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
                        <th style="min-width: 180px;">Actions</th> {{-- Colonne élargie pour deux boutons --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colleges as $college)
                        <tr>
                            <td class="fw-bold">{{ $college->code }}</td>
                            <td>{{ $college->nom }}</td>
                            <td>{{ $college->adr_ligne_1 }}</td>
                            <td>{{ $college->adr_ligne_2 }}</td>
                            <td>{{ $college->adr_lieu }}</td>
                            <td>{{ $college->adr_code_postal }}</td>
                            <td>{{ $college->adr_ville }}</td>
                            <td>{{ $college->adr_region }}</td>
                            <td>{{ $college->commentaire }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $college->code_pays }}</span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    {{-- Bouton Modifier --}}
                                    <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-warning btn-sm">
                                        Modifier
                                    </a>

                                    {{-- Formulaire de Suppression Sécurisé --}}
                                    <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce collège ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>