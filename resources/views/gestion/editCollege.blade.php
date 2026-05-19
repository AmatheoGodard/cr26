{{-- resources/views/admin/editCollege.blade.php (ou le nom actuel de ta vue de modification) --}}

<x-app-layout>
    <div class="container mt-4">

        <h1 class="mb-4">Modifier le Collège</h1>

        {{-- Message de succès --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        {{-- Message d'erreur --}}
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('colleges.update', $college->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $college->code) }}">
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $college->nom) }}" required>
            </div>

            <div class="mb-3">
                <label for="adr_ligne_1" class="form-label">Adresse ligne 1</label>
                <input type="text" name="adr_ligne_1" id="adr_ligne_1" class="form-control" value="{{ old('adr_ligne_1', $college->adr_ligne_1) }}">
            </div>

            <div class="mb-3">
                <label for="adr_ligne_2" class="form-label">Adresse ligne 2</label>
                <input type="text" name="adr_ligne_2" id="adr_ligne_2" class="form-control" value="{{ old('adr_ligne_2', $college->adr_ligne_2) }}">
            </div>

            <div class="mb-3">
                <label for="adr_lieu" class="form-label">Lieu</label>
                <input type="text" name="adr_lieu" id="adr_lieu" class="form-control" value="{{ old('adr_lieu', $college->adr_lieu) }}">
            </div>

            <div class="mb-3">
                <label for="adr_code_postal" class="form-label">Code Postal</label>
                <input type="text" name="adr_code_postal" id="adr_code_postal" class="form-control" value="{{ old('adr_code_postal', $college->adr_code_postal) }}">
            </div>

            <div class="mb-3">
                <label for="adr_ville" class="form-label">Ville</label>
                <input type="text" name="adr_ville" id="adr_ville" class="form-control" value="{{ old('adr_ville', $college->adr_ville) }}">
            </div>

            <div class="mb-3">
                <label for="adr_region" class="form-label">Région</label>
                <input type="text" name="adr_region" id="adr_region" class="form-control" value="{{ old('adr_region', $college->adr_region) }}">
            </div>

            <div class="mb-3">
                <label for="commentaire" class="form-label">Commentaire</label>
                <textarea name="commentaire" id="commentaire" class="form-control" rows="4">{{ old('commentaire', $college->commentaire) }}</textarea>
            </div>

            {{-- Remplacer le bloc "code_pays" dans editCollege.blade.php --}}
            <div class="mb-3">
                <label for="code_pays" class="form-label">Pays <span class="text-danger">*</span></label>
                <select name="code_pays" id="code_pays" class="form-control" required>
                    <option value="">-- Sélectionner un pays --</option>
                    @foreach(\App\Models\Pays::all() as $pays)
                    <option value="{{ $pays->code }}" {{ old('code_pays', $college->code_pays) == $pays->code ? 'selected' : '' }}>
                        {{ $pays->nom }} ({{ $pays->code }})
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
    </div>
</x-app-layout>