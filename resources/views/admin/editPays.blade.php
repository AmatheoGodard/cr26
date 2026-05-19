{{-- resources/views/admin/editPays.blade.php --}}

<x-app-layout>
    <div class="container mt-4">

        <h1 class="mb-4">Modifier un pays</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pays.update', $pays->code) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Code pays</label>
                <input type="text"
                       name="code"
                       class="form-control"
                       maxlength="5"
                       value="{{ old('code', $pays->code) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nom du pays</label>
                <input type="text"
                       name="nom"
                       class="form-control"
                       maxlength="100"
                       value="{{ old('nom', $pays->nom) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Commentaire</label>
                <textarea name="commentaire"
                          class="form-control"
                          rows="4">{{ old('commentaire', $pays->commentaire) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">
                Enregistrer
            </button>

        </form>

    </div>
</x-app-layout>