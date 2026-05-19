{{-- resources/views/admin/addPays.blade.php --}}

<x-app-layout>
    <div class="container mt-4">

        <h1 class="mb-4">Ajouter un pays</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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

        <form action="{{ route('pays.create') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Code pays</label>
                <input type="text"
                       name="code"
                       class="form-control"
                       maxlength="5"
                       value="{{ old('code') }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nom du pays</label>
                <input type="text"
                       name="nom"
                       class="form-control"
                       maxlength="100"
                       value="{{ old('nom') }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Commentaire</label>
                <textarea name="commentaire"
                          class="form-control"
                          rows="4">{{ old('commentaire') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Ajouter
            </button>

        </form>

    </div>
</x-app-layout>