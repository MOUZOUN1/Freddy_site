<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-xl rounded-lg p-10 w-full max-w-md">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo_beninrevele.jpg') }}" class="h-20" alt="Logo">
    </div>

    <h2 class="text-2xl font-bold text-center text-[#014E82] mb-6">
        Connexion
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

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="w-full px-4 py-2 rounded border border-gray-300 focus:ring-2 focus:ring-[#014E82] focus:outline-none"
                   placeholder="email@example.com">
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Mot de passe</label>
            <input type="password" name="password" required
                   class="w-full px-4 py-2 rounded border border-gray-300 focus:ring-2 focus:ring-[#014E82] focus:outline-none"
                   placeholder="••••••••">
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mb-4">
            <input type="checkbox" name="remember" class="rounded border-gray-300 text-[#014E82] focus:ring-[#014E82]">
            <span class="ml-2 text-gray-600 text-sm">Se souvenir de moi</span>
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full py-3 bg-[#014E82] hover:bg-[#023d66] text-white rounded-lg font-semibold transition">
            Se connecter
        </button>

       <!-- Mot de passe oublié + S'inscrire -->
@if (Route::has('password.request'))
<div class="text-center mt-4 flex flex-col gap-2">
    
    <a href="{{ route('password.request') }}"
       class="text-sm text-gray-600 hover:text-[#014E82] underline">
        Mot de passe oublié ?
    </a>

    <a href="{{ route('register') }}"
       class="text-sm text-gray-600 hover:text-[#014E82] underline">
        S'inscrire
    </a>

</div>
@endif

    </form>

</div>

</body>
</html>
