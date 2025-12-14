@extends('layouts.app')

@section('title', 'Mon Profil - Culture Bénin')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">
        <i class="fas fa-user-circle mr-2 text-green-600"></i>
        Mon Profil
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Sidebar -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="text-center mb-6">
                    <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user text-4xl text-green-600"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">{{ auth()->user()->name }}</h2>
                    <p class="text-gray-600 text-sm">{{ auth()->user()->email }}</p>
                </div>

                <!-- Status Badges -->
                <div class="space-y-3">
                    @if(auth()->user()->email_verified)
                    <div class="bg-green-50 border border-green-200 rounded-lg p-3 text-center">
                        <i class="fas fa-check-circle text-green-600 mr-2"></i>
                        <span class="text-green-700 text-sm font-medium">Email Vérifié</span>
                    </div>
                    @endif

                    @if(auth()->user()->isAdmin())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-3 text-center">
                        <i class="fas fa-crown text-red-600 mr-2"></i>
                        <span class="text-red-700 text-sm font-medium">Administrateur</span>
                    </div>
                    @endif

                    @if(auth()->user()->hasActiveSubscription())
                    <div class="bg-purple-50 border border-purple-200 rounded-lg p-3">
                        <div class="text-center mb-2">
                            <i class="fas fa-star text-purple-600 mr-2"></i>
                            <span class="text-purple-700 text-sm font-medium">Membre Premium</span>
                        </div>
                        <p class="text-xs text-gray-600 text-center">
                            Expire le {{ auth()->user()->subscription_ends_at->format('d/m/Y') }}
                        </p>
                    </div>
                    @else
                    <a href="{{ route('subscription.plans') }}" 
                       class="block bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg p-3 text-center transition">
                        <i class="fas fa-star mr-2"></i>
                        <span class="text-sm font-medium">Devenir Premium</span>
                    </a>
                    @endif
                </div>

                <!-- Quick Stats -->
                <div class="mt-6 pt-6 border-t">
                    <h3 class="text-sm font-bold text-gray-700 mb-3">Statistiques</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Contenus créés</span>
                            <span class="font-medium text-gray-800">{{ auth()->user()->contenus->count() }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Commentaires</span>
                            <span class="font-medium text-gray-800">{{ auth()->user()->commentaires->count() }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Membre depuis</span>
                            <span class="font-medium text-gray-800">{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="md:col-span-2">
            <!-- Update Profile Form -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">
                    <i class="fas fa-edit mr-2 text-blue-600"></i>
                    Modifier mes informations
                </h2>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-user mr-2"></i>Nom complet
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name', auth()->user()->name) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('name') border-red-500 @enderror"
                            required
                        >
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
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
                            value="{{ old('email', auth()->user()->email) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('email') border-red-500 @enderror"
                            required
                        >
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Divider -->
                    <div class="border-t my-6"></div>

                    <h3 class="text-lg font-bold text-gray-800 mb-4">
                        <i class="fas fa-key mr-2 text-yellow-600"></i>
                        Changer le mot de passe
                    </h3>

                    <!-- New Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-lock mr-2"></i>Nouveau mot de passe
                        </label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('password') border-red-500 @enderror"
                            placeholder="Laisser vide pour ne pas changer"
                        >
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-lock mr-2"></i>Confirmer le mot de passe
                        </label>
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="Confirmer le nouveau mot de passe"
                        >
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button 
                            type="submit" 
                            class="bg-green-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-green-700 transition"
                        >
                            <i class="fas fa-save mr-2"></i>Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>

            <!-- Subscription Management -->
            @if(auth()->user()->hasActiveSubscription())
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">
                    <i class="fas fa-star mr-2 text-purple-600"></i>
                    Gestion de l'abonnement
                </h2>

                <div class="bg-purple-50 border border-purple-200 rounded-lg p-4 mb-4">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="font-medium text-gray-800">Plan {{ ucfirst(auth()->user()->subscription_type) }}</p>
                            <p class="text-sm text-gray-600">Actif jusqu'au {{ auth()->user()->subscription_ends_at->format('d/m/Y') }}</p>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">
                            <i class="fas fa-check-circle mr-1"></i>Actif
                        </span>
                    </div>
                    
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-clock mr-2"></i>
                        <span>{{ auth()->user()->subscription_ends_at->diffForHumans() }}</span>
                    </div>
                </div>

                <form method="POST" action="{{ route('subscription.cancel') }}" 
                      onsubmit="return confirm('Êtes-vous sûr de vouloir annuler votre abonnement ?');">
                    @csrf
                    <button 
                        type="submit" 
                        class="text-red-600 hover:text-red-700 font-medium text-sm"
                    >
                        <i class="fas fa-times-circle mr-1"></i>Annuler l'abonnement
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection