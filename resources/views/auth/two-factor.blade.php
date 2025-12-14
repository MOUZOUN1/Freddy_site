@extends('layouts.app')

@section('title', 'Vérification - Culture Bénin')

@section('content')
<div class="max-w-md mx-auto px-4">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <div class="text-center mb-8">
            <i class="fas fa-shield-alt text-6xl text-green-600 mb-4"></i>
            <h2 class="text-3xl font-bold text-gray-800">Vérification en deux étapes</h2>
            <p class="text-gray-600 mt-2">
                Un code de vérification a été envoyé à votre email
            </p>
            <p class="text-sm text-gray-500 mt-1">
                {{ auth()->user()->email }}
            </p>
        </div>

        <form method="POST" action="{{ route('two-factor.verify') }}">
            @csrf

            <!-- Code -->
            <div class="mb-6">
                <label for="code" class="block text-gray-700 font-medium mb-2 text-center">
                    <i class="fas fa-key mr-2"></i>Entrez le code à 6 chiffres
                </label>
                <input 
                    type="text" 
                    id="code" 
                    name="code" 
                    maxlength="6"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 text-center text-2xl tracking-widest @error('code') border-red-500 @enderror"
                    placeholder="000000"
                    required
                    autofocus
                >
                @error('code')
                    <p class="text-red-500 text-sm mt-1 text-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-green-600 text-white py-3 rounded-lg font-medium hover:bg-green-700 transition duration-300"
            >
                <i class="fas fa-check-circle mr-2"></i>Vérifier
            </button>
        </form>

        <!-- Resend Code -->
        <div class="mt-6 text-center">
            <form method="POST" action="{{ route('two-factor.resend') }}" class="inline">
                @csrf
                <p class="text-gray-600 mb-2">
                    Vous n'avez pas reçu le code ?
                </p>
                <button 
                    type="submit" 
                    class="text-green-600 font-medium hover:text-green-700"
                >
                    <i class="fas fa-redo mr-1"></i>Renvoyer le code
                </button>
            </form>
        </div>

        <!-- Info Box -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex items-start">
                <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                <div class="text-sm text-gray-700">
                    <p class="font-medium mb-1">Pourquoi cette étape ?</p>
                    <p class="text-gray-600">
                        Cette vérification en deux étapes protège votre compte contre les accès non autorisés. 
                        Le code expire après 10 minutes.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-focus et validation numérique
    document.getElementById('code').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
        if (this.value.length === 6) {
            this.form.submit();
        }
    });
</script>
@endsection