@extends('backend.layouts.admin')

@section('title', 'Modifier le Média')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        <i class="fas fa-edit mr-2 text-blue-600"></i>
        Modifier le Média
    </h1>

    <div class="bg-white rounded-lg shadow-md p-8">
        <form method="POST"
              action="{{ route('admin.medias.update', $media) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Titre</label>
                <input type="text" name="titre"
                       value="{{ old('titre', $media->titre) }}"
                       class="w-full px-4 py-2 border rounded-lg @error('titre') border-red-500 @enderror"
                       required>
                @error('titre')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Fichier (optionnel)</label>
                <input type="file" name="fichier"
                       class="w-full px-4 py-2 border rounded-lg @error('fichier') border-red-500 @enderror">
                @error('fichier')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror

                @if($media->chemin)
                    <p class="text-sm text-gray-600 mt-2">
                        Fichier actuel :
                        <a href="{{ asset('storage/'.$media->chemin) }}"
                           target="_blank"
                           class="text-blue-600 underline">
                            Voir
                        </a>
                    </p>
                @endif
            </div>

            <div class="grid grid-cols-3 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Type de média</label>
                    <select name="typemedia_id"
                            class="w-full px-4 py-2 border rounded-lg @error('typemedia_id') border-red-500 @enderror">
                        @foreach($typesMedias as $type)
                            <option value="{{ $type->id }}"
                                {{ old('typemedia_id', $media->typemedia_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->libelle }}
                            </option>
                        @endforeach
                    </select>
                    @error('typemedia_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Contenu associé</label>
                    <select name="contenu_id"
                            class="w-full px-4 py-2 border rounded-lg @error('contenu_id') border-red-500 @enderror">
                        <option value="">-- Aucun --</option>
                        @foreach($contenus as $contenu)
                            <option value="{{ $contenu->id }}"
                                {{ old('contenu_id', $media->contenu_id) == $contenu->id ? 'selected' : '' }}>
                                {{ $contenu->titre }}
                            </option>
                        @endforeach
                    </select>
                    @error('contenu_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Statut</label>
                    <select name="statut"
                            class="w-full px-4 py-2 border rounded-lg @error('statut') border-red-500 @enderror">
                        <option value="actif" {{ old('statut', $media->statut) === 'actif' ? 'selected' : '' }}>Actif</option>
                        <option value="inactif" {{ old('statut', $media->statut) === 'inactif' ? 'selected' : '' }}>Inactif</option>
                    </select>
                    @error('statut')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.medias.index') }}"
                   class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg">
                    Annuler
                </a>
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
