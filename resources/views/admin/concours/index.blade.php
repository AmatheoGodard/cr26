{{-- resources/views/admin/concours/index.blade.php --}}

<x-app-layout>
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Liste des concours</h1>
            <a href="{{ route('concours.create') }}" class="btn btn-primary">
                Créer un concours
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Membres / Équipe</th>
                    <th>Statut (Actif)</th>
                    <th>En cours</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($concours as $item)
                    <tr>
                        <td class="fw-bold">{{ $item->nom }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->date_debut)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->date_fin)->format('d/m/Y') }}</td>
                        <td>
                            Min: <span class="badge bg-secondary">{{ $item->equipe_min }}</span> 
                            / Max: <span class="badge bg-secondary">{{ $item->equipe_max }}</span>
                        </td>
                        <td>
                            @if($item->actif)
                                <span class="badge bg-success">Oui</span>
                            @else
                                <span class="badge bg-danger">Non</span>
                            @endif
                        </td>
                        <td>
                            @if($item->en_cours)
                                <span class="badge bg-info text-dark">Oui</span>
                            @else
                                <span class="badge bg-light text-muted">Non</span>
                            @endif
                        </td>
                        <td>
                            {{-- On prépare les boutons pour la suite (Modification / Suppression) --}}
                            <a href="#" class="btn btn-warning btn-sm">
                                Modifier
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="alert('Bientôt disponible !')">
                                Supprimer
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            Aucun concours programmé pour le moment.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</x-app-layout>