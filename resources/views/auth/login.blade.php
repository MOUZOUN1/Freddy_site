@extends('layouts.app')

@section('title', 'Connexion - Culture Bénin')

@section('content')
<div class="max-w-md mx-auto px-4">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <div class="text-center mb-8">
            <i class="fas fa-user-circle text-6xl text-green-600 mb-4"></i>
            <h2 class="text-3xl font-bold text-gray-800">Connexion</h2>
            <p class="text-gray-600 mt-2">Connectez-vous à votre compte</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

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

            <!-- Remember Me -->
            <div class="flex items-center mb-6">
                <input 
                    type="checkbox" 
                    id="remember" 
                    name="remember" 
                    class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500"
                >
                <label for="remember" class="ml-2 text-gray-700">
                    Se souvenir de moi
                </label>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-green-600 text-white py-3 rounded-lg font-medium hover:bg-green-700 transition duration-300"
            >
                <i class="fas fa-sign-in-alt mr-2"></i>Se connecter
            </button>
        </form>

        <!-- Divider -->
        <div class="my-6 text-center text-gray-500">
            <span>ou</span>
        </div>

        <!-- Register Link -->
        <div class="text-center">
            <p class="text-gray-600">
                Vous n'avez pas de compte ?
                <a href="{{ route('register') }}" class="text-green-600 font-medium hover:text-green-700">
                    Inscrivez-vous
                </a>
            </p>
        </div>
    </div>
</div>
@endsection