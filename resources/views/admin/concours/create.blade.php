{{-- resources/views/admin/concours/create.blade.php --}}

<x-app-layout>
    <div class="container mt-4 mb-5">

        <div class="mb-4">
            <a href="{{ route('concours.index') }}" class="btn btn-outline-secondary btn-sm">
                ← Retour à la liste
            </a>
            <h1 class="mt-2">Créer un nouveau concours</h1>
        </div>

        {{-- Affichage des erreurs de validation --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('concours.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom du concours</label>
                        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required placeholder="Ex: Concours National 2026">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Date de début</label>
                            <input type="date" name="date_debut" class="form-control" value="{{ old('date_debut') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Date de fin</label>
                            <input type="date" name="date_fin" class="form-control" value="{{ old('date_fin') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nombre minimum d'élèves par équipe</label>
                            <input type="number" name="equipe_min" class="form-control" min="1" value="{{ old('equipe_min', 1) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nombre maximum d'élèves par équipe</label>
                            <input type="number" name="equipe_max" class="form-control" min="1" value="{{ old('equipe_max', 5) }}" required>
                        </div>
                    </div>

                    <div class="mb-3 p-3 bg-light rounded border">
                        <label class="form-label fw-bold d-block mb-2">Options du statut</label>
                        
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" name="actif" id="actif" value="1" {{ old('actif') ? 'checked' : 'checked' }}>
                            <label class="form-check-label" for="actif">
                                Concours visible / actif (Permettre aux collèges d'y participer)
                            </label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="en_cours" id="en_cours" value="1" {{ old('en_cours') ? 'checked' : '' }}>
                            <label class="form-check-label" for="en_cours">
                                Marquer comme l'édition "En Cours" actuellement
                            </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Commentaires / Description</label>
                        <textarea name="commentaire" class="form-control" rows="4" placeholder="Informations complémentaires sur le règlement, le lieu... (Optionnel)">{{ old('commentaire') }}</textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success px-4">
                            Enregistrer le concours
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</x-app-layout>