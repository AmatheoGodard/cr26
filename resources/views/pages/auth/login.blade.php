<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="w-full max-w-sm bg-white rounded-lg shadow p-6">

    <h1 class="text-2xl font-bold text-center mb-6">Connexion</h1>

    @if(session('error'))
        <div class="mb-4 text-red-600">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-sm font-medium" for="email">Email</label>
            <input type="email" name="email" id="email" class="mt-1 w-full border rounded px-3 py-2"
                   required autofocus>
            @error('email')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block text-sm font-medium" for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="mt-1 w-full border rounded px-3 py-2"
                   required>
            @error('password')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember -->
        <div class="flex items-center mb-4">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            <label for="remember" class="text-sm">Se souvenir de moi</label>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            Se connecter
        </button>
    </form>

</div>

</body>
</html>
