@extends('layouts.app')

@section('title', 'Inscription - Culture Bénin')

@section('content')
<div class="max-w-md mx-auto px-4">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <div class="text-center mb-8">
            <i class="fas fa-user-plus text-6xl text-green-600 mb-4"></i>
            <h2 class="text-3xl font-bold text-gray-800">Inscription</h2>
            <p class="text-gray-600 mt-2">Créez votre compte gratuitement</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-medium mb-2">
                    <i class="fas fa-user mr-2"></i>Nom complet
                </label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('name') border-red-500 @enderror"
                    placeholder="Jean Dupont"
                    required
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-medium mb-2">
                    <i class="fas fa-envelope mr-2"></i>Email
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('email') border-red-500 @enderror"
                    placeholder="votre@email.com"
                    required
                >
                @error('email')
                    <p class="text-red-500 text-sm mt-1">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium mb-2">
                    <i class="fas fa-lock mr-2"></i>Mot de passe
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('password') border-red-500 @enderror"
                    placeholder="••••••••"
                    required
                >
                @error('password')
                    <p class="text-red-500 text-sm mt-1">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Password Confirmation -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">
                    <i class="fas fa-lock mr-2"></i>Confirmer le mot de passe
                </label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="••••••••"
                    required
                >
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-green-600 text-white py-3 rounded-lg font-medium hover:bg-green-700 transition duration-300"
            >
                <i class="fas fa-user-plus mr-2"></i>S'inscrire
            </button>
        </form>

        <!-- Divider -->
        <div class="my-6 text-center text-gray-500">
            <span>ou</span>
        </div>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-gray-600">
                Vous avez déjà un compte ?
                <a href="{{ route('login') }}" class="text-green-600 font-medium hover:text-green-700">
                    Connectez-vous
                </a>
            </p>
        </div>
    </div>
</div>
@endsection