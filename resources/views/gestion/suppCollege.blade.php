<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un collège</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ route('colleges.list') }}">Liste des collèges</a></li>
        </ul>
    </nav>
</header>

<main class="container">
    <h1>Supprimer un collège</h1>

    @if(session('success'))
        <article class="alert success">{{ session('success') }}</article>
    @endif

    @if(session('error'))
        <article class="alert error">{{ session('error') }}</article>
    @endif

    <form id="deleteForm" method="POST" action="">
        @csrf
        @method('DELETE')

        <label for="college_id">Choisir un collège</label>
        <select id="college_id" required>
            <option value="" disabled selected>-- Sélectionner un collège --</option>
            @foreach($colleges as $college)
                <option value="{{ $college->id }}">{{ $college->nom }}</option>
            @endforeach
        </select>

        <button type="submit">Supprimer</button>
    </form>
</main>

<script>
document.getElementById('deleteForm').addEventListener('submit', function(e) {
    const id = document.getElementById('college_id').value;
    if (!id) {
        alert("Veuillez sélectionner un collège.");
        e.preventDefault();
        return;
    }

    // Met à jour dynamiquement l'action du formulaire avec l'ID sélectionné
    this.action = '/colleges/' + id + '/supprimer';
});
</script>

</body>
</html>
