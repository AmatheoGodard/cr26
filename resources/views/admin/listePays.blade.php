{{-- resources/views/admin/listePays.blade.php --}}

<x-app-layout>
    <div class="container mt-4">

        <h1 class="mb-4">Liste des pays</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Commentaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pays as $item)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->nom }}</td>
                        <td>{{ $item->commentaire }}</td>
                        <td>
                            <a href="{{ route('pays.edit', $item->code) }}" class="btn btn-warning btn-sm">
                                Modifier
                            </a>

                            <form action="{{ route('pays.destroy', $item->code) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce pays ?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Aucun pays trouvé.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</x-app-layout>