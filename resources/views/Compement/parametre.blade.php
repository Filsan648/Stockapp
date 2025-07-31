<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paramètres</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">
    <div class="bg-white shadow-md rounded-xl p-6 w-full max-w-md">
        <h1 class="text-xl font-bold text-gray-800 mb-4">Paramètres du compte</h1>

        <div class="mb-4">
            <p class="text-gray-700"><strong>Nom :</strong> {{ $user->name }}</p>
            <p class="text-gray-700"><strong>Email :</strong> {{ $user->email }}</p>

        </div>

        <hr class="my-4">

        <form method="POST" action="{{ route('Setting.update') }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-600 mb-1">Nouvel Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded p-2" placeholder="Nouveau mail">
            </div>

            <div>
                <label class="block text-gray-600 mb-1">Nouveau mot de passe</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded p-2" placeholder="********">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
