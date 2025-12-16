@extends('backend.layouts.admin')

@section('title', 'Détails Utilisateur')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            <i class="fas fa-user mr-2 text-blue-600"></i>
            Détails Utilisateur
        </h1>
        <div class="flex space-x-2">
            <a href="{{ route('admin.users.edit', $user) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <p class="text-gray-600 mb-1">Nom</p>
                <p class="font-medium text-gray-800">{{ $user->name }}</p>
            </div>
            <div>
                <p class="text-gray-600 mb-1">Email</p>
                <p class="font-medium text-gray-800">{{ $user->email }}</p>
            </div>
            <div>
                <p class="text-gray-600 mb-1">Statut</p>
                <p class="font-medium text-gray-800">
                    @if($user->is_admin)
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded">Administrateur</span>
                    @else
                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">Utilisateur</span>
                    @endif
                </p>
            </div>
            <div>
                <p class="text-gray-600 mb-1">Email vérifié</p>
                <p class="font-medium text-gray-800">
                    @if($user->email_verified)
                        <span class="text-green-600"><i class="fas fa-check-circle mr-1"></i>Oui</span>
                    @else
                        <span class="text-red-600"><i class="fas fa-times-circle mr-1"></i>Non</span>
                    @endif
                </p>
            </div>
            <div>
                <p class="text-gray-600 mb-1">Abonnement</p>
                <p class="font-medium text-gray-800">
                    @if($user->is_subscribed)
                        <span class="text-purple-600"><i class="fas fa-star mr-1"></i>Actif jusqu'au {{ $user->subscription_ends_at?->format('d/m/Y') }}</span>
                    @else
                        <span class="text-gray-600">Aucun</span>
                    @endif
                </p>
            </div>
            <div>
                <p class="text-gray-600 mb-1">Inscrit le</p>
                <p class="font-medium text-gray-800">{{ $user->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="border-t pt-6">
            <h3 class="text-xl font-bold mb-4">Statistiques</h3>
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-blue-50 p-4 rounded-lg">
                    <p class="text-gray-600 text-sm">Contenus créés</p>
                    <p class="text-2xl font-bold text-blue-600">{{ $user->contenus->count() }}</p>
                </div>
                <div class="bg-green-50 p-4 rounded-lg">
                    <p class="text-gray-600 text-sm">Commentaires</p>
                    <p class="text-2xl font-bold text-green-600">{{ $user->commentaires->count() }}</p>
                </div>
                <div class="bg-purple-50 p-4 rounded-lg">
                    <p class="text-gray-600 text-sm">Paiements</p>
                    <p class="text-2xl font-bold text-purple-600">{{ $user->payments->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection