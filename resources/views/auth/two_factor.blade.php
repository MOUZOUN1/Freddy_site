<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification du code</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-xl rounded-lg p-10 w-full max-w-md">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo_beninrevele.jpg') }}" class="h-20" alt="Logo">
    </div>

    <h2 class="text-2xl font-bold text-center text-[#014E82] mb-6">
        Vérification du code
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

    <form method="POST" action="{{ route('verify.code.store') }}">
        @csrf

        <!-- Two Factor Code -->
        <div class="mb-4">
            <label for="two_factor_code" class="block text-gray-700 font-medium mb-2">Code à 6 chiffres</label>
            <input type="text" name="two_factor_code" id="two_factor_code" maxlength="6"
                   class="w-full px-4 py-2 rounded border border-gray-300 focus:ring-2 focus:ring-[#014E82] focus:outline-none"
                   placeholder="123456" required autofocus>
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full py-3 bg-[#014E82] hover:bg-[#023d66] text-white rounded-lg font-semibold transition">
            Confirmer
        </button>
    </form>

    <div class="mt-6 text-center text-gray-600 text-sm">
        Vous n'avez pas reçu le code ?
        <form method="POST" action="{{ route('verify.code') }}" class="inline">
            @csrf
            <button type="submit" class="text-[#014E82] hover:underline font-semibold">
                Renvoyer le code
            </button>
        </form>
    </div>

</div>

</body>
</html>
