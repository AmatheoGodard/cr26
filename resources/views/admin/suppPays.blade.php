{{-- resources/views/admin/suppPays.blade.php --}}

<x-app-layout>
    <div class="container mt-4">

        <h1 class="mb-4">Suppression des pays</h1>

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

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pays as $item)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->nom }}</td>
                        <td>
                            <form action="{{ route('pays.destroy', $item->code) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            Aucun pays disponible.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</x-app-layout>