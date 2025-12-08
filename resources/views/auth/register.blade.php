<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-xl rounded-lg p-10 w-full max-w-md">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo_beninrevele.jpg') }}" class="h-20" alt="Logo">
    </div>

    <h2 class="text-2xl font-bold text-center text-[#014E82] mb-6">
        Créer un compte
    </h2>

    @if (session('status'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4 text-center">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-2 rounded mb-4 text-center">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nom -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nom</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                   class="w-full px-4 py-2 rounded border border-gray-300 focus:ring-2 focus:ring-[#014E82] focus:outline-none"
                   placeholder="Votre nom">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                   class="w-full px-4 py-2 rounded border border-gray-300 focus:ring-2 focus:ring-[#014E82] focus:outline-none"
                   placeholder="votre.email@example.com">
        </div>

        <!-- Mot de passe -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Mot de passe</label>
            <input type="password" id="password" name="password" required
                   class="w-full px-4 py-2 rounded border border-gray-300 focus:ring-2 focus:ring-[#014E82] focus:outline-none"
                   placeholder="••••••••">
        </div>

        <!-- Confirmation -->
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Confirmer le mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                   class="w-full px-4 py-2 rounded border border-gray-300 focus:ring-2 focus:ring-[#014E82] focus:outline-none"
                   placeholder="••••••••">
        </div>

        <!-- Boutons -->
        <div class="flex items-center justify-between">
            <a href="{{ route('login') }}"
               class="text-sm text-gray-600 hover:text-[#014E82] underline">
                Déjà inscrit ?
            </a>

            <button type="submit"
                    class="py-2 px-6 bg-[#014E82] hover:bg-[#023d66] text-white rounded-lg font-semibold transition">
                S'inscrire
            </button>
        </div>

    </form>

</div>

</body>
</html>
