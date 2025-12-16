@extends('backend.layouts.admin')

@section('title', 'Détails du Contenu')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            <i class="fas fa-file-alt mr-2 text-purple-600"></i>
            Détails du Contenu
        </h1>

        <div class="flex space-x-2">
            <a href="{{ route('admin.contenus.edit', $contenu) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <a href="{{ route('admin.contenus.index') }}"
               class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <p class="text-gray-600 mb-1">Titre</p>
                <p class="font-medium text-gray-800">{{ $contenu->titre }}</p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Statut</p>
                <p class="font-medium">
                    @if($contenu->statut === 'publie')
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Publié</span>
                    @else
                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Brouillon</span>
                    @endif
                </p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Type de contenu</p>
                <p class="font-medium text-gray-800">{{ $contenu->typecontenu->libelle ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Région</p>
                <p class="font-medium text-gray-800">{{ $contenu->region->nom ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Langue</p>
                <p class="font-medium text-gray-800">{{ $contenu->langue->nomlangue ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Auteur</p>
                <p class="font-medium text-gray-800">{{ $contenu->user->name ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Créé le</p>
                <p class="font-medium text-gray-800">{{ $contenu->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Dernière mise à jour</p>
                <p class="font-medium text-gray-800">{{ $contenu->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="border-t pt-6">
            <p class="text-gray-600 mb-2">Contenu</p>
            <div class="prose max-w-none text-gray-800">
                {!! nl2br(e($contenu->texte)) !!}
            </div>
        </div>
    </div>
</div>
@endsection
