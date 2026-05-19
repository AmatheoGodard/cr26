{{-- resources/views/admin/addCollege.blade.php (ou le nom actuel de ta vue de création) --}}

<x-app-layout>
    <div class="container mt-4">

        <h1 class="mb-4">Ajouter un Collège</h1>

        {{-- Message de succès --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        {{-- Message d'erreur --}}
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('colleges.create') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}">
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
            </div>

            <div class="mb-3">
                <label for="adr_ligne_1" class="form-label">Adresse ligne 1</label>
                <input type="text" name="adr_ligne_1" id="adr_ligne_1" class="form-control" value="{{ old('adr_ligne_1') }}">
            </div>

            <div class="mb-3">
                <label for="adr_ligne_2" class="form-label">Adresse ligne 2</label>
                <input type="text" name="adr_ligne_2" id="adr_ligne_2" class="form-control" value="{{ old('adr_ligne_2') }}">
            </div>

            <div class="mb-3">
                <label for="adr_lieu" class="form-label">Lieu</label>
                <input type="text" name="adr_lieu" id="adr_lieu" class="form-control" value="{{ old('adr_lieu') }}">
            </div>

            <div class="mb-3">
                <label for="adr_code_postal" class="form-label">Code postal</label>
                <input type="text" name="adr_code_postal" id="adr_code_postal" class="form-control" value="{{ old('adr_code_postal') }}">
            </div>

            <div class="mb-3">
                <label for="adr_ville" class="form-label">Ville</label>
                <input type="text" name="adr_ville" id="adr_ville" class="form-control" value="{{ old('adr_ville') }}">
            </div>

            <div class="mb-3">
                <label for="adr_region" class="form-label">Région</label>
                <input type="text" name="adr_region" id="adr_region" class="form-control" value="{{ old('adr_region') }}">
            </div>

            <div class="mb-3">
                <label for="commentaire" class="form-label">Commentaire</label>
                <textarea name="commentaire" id="commentaire" class="form-control" rows="4">{{ old('commentaire') }}</textarea>
            </div>

            <select name="code_pays" id="code_pays" class="form-control">
                <option value="">-- Sélectionner un pays --</option>
                @foreach(\App\Models\Pays::all() as $p)
                <option value="{{ $p->code }}" {{ old('code_pays') == $p->code ? 'selected' : '' }}>
                    {{ $p->nom }} ({{ $p->code }})
                </option>
                @endforeach
            </select><br>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

    </div>
</x-app-layout>