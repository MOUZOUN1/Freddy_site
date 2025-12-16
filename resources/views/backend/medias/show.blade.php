@extends('backend.layouts.admin')

@section('title', 'Détails du Média')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            <i class="fas fa-photo-video mr-2 text-purple-600"></i>
            Détails du Média
        </h1>

        <div class="flex space-x-2">
            <a href="{{ route('admin.medias.edit', $media) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <a href="{{ route('admin.medias.index') }}"
               class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <p class="text-gray-600 mb-1">Titre</p>
                <p class="font-medium text-gray-800">{{ $media->titre }}</p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Type</p>
                <p class="font-medium text-gray-800">
                    {{ $media->typeMedia->libelle ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Statut</p>
                <span class="px-3 py-1 rounded-full text-sm
                    {{ $media->statut === 'actif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ ucfirst($media->statut) }}
                </span>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Contenu associé</p>
                <p class="font-medium text-gray-800">
                    {{ $media->contenu->titre ?? 'Aucun' }}
                </p>
            </div>
        </div>

        <div class="mb-6">
            <p class="text-gray-600 mb-2">Fichier</p>
            @if($media->chemin)
                <a href="{{ asset('storage/'.$media->chemin) }}"
                   target="_blank"
                   class="text-blue-600 underline">
                    Ouvrir le fichier
                </a>
            @else
                <p class="text-gray-500">Aucun fichier</p>
            @endif
        </div>

        <div>
            <p class="text-gray-600 mb-1">Ajouté le</p>
            <p class="text-gray-800">{{ $media->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection
