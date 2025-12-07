<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un collège</title>
    <!-- Intégration de Pico.css pour le style minimaliste -->
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>

<header>
    <!-- Menu de navigation principal -->
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ route('colleges.list') }}">Liste des collèges</a></li>
        </ul>
    </nav>
</header>

<main class="container">
    <h1>Supprimer un collège</h1>

    <!-- Affichage d'un message de succès si présent dans la session -->
    @if(session('success'))
        <article class="alert success">{{ session('success') }}</article>
    @endif

    <!-- Affichage des erreurs de validation ou autres -->
    @if($errors->any())
        <article class="alert error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </article>
    @endif

    <!-- Formulaire de suppression de collège -->
    <!-- On utilise une action générique avec un ID fictif (0) pour ne pas provoquer d'erreur de route -->
    <form id="deleteForm" method="POST" action="{{ route('colleges.destroy', ['id' => 0]) }}" 
          onsubmit="return confirm('Voulez-vous vraiment supprimer ce collège ?');">
        @csrf
        @method('DELETE')

        <!-- Champ caché pour transmettre l'ID réel du collège sélectionné au contrôleur -->
        <input type="hidden" name="college_id" id="college_id_hidden" value="">

        <!-- Sélecteur pour choisir le collège à supprimer -->
        <label for="college_id">Choisir un collège</label>
        <select id="college_id" required>
            <option value="" disabled selected>-- Sélectionner un collège --</option>
            @foreach($colleges as $college)
                <option value="{{ $college->id }}">{{ $college->nom }}</option>
            @endforeach
        </select>

        <!-- Bouton de soumission -->
        <button type="submit">Supprimer</button>
    </form>
</main>

<!-- Script JavaScript pour gérer l'injection de l'ID sélectionné -->
<script>
document.getElementById('deleteForm').addEventListener('submit', function(e) {
    const sel = document.getElementById('college_id');
    
    // Vérifie qu'un collège est bien sélectionné
    if (!sel.value) {
        alert("Veuillez sélectionner un collège.");
        e.preventDefault(); // Empêche l'envoi du formulaire
        return;
    }

    // Injecte l'ID sélectionné dans le champ caché pour POST
    document.getElementById('college_id_hidden').value = sel.value;

    // On ne modifie plus l'action du formulaire : plus d'erreur de route
});
</script>

</body>
</html>
