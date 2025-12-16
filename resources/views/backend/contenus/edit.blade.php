@extends('backend.layouts.admin')

@section('title', 'Modifier un Contenu')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        <i class="fas fa-edit mr-2 text-blue-600"></i>
        Modifier le Contenu
    </h1>

    <div class="bg-white rounded-lg shadow-md p-8">
        <form method="POST" action="{{ route('admin.contenus.update', $contenu) }}">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Titre</label>
                <input type="text" name="titre" value="{{ old('titre', $contenu->titre) }}"
                       class="w-full px-4 py-2 border rounded-lg @error('titre') border-red-500 @enderror" required>
                @error('titre')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Texte</label>
                <textarea name="texte" rows="6"
                          class="w-full px-4 py-2 border rounded-lg @error('texte') border-red-500 @enderror">{{ old('texte', $contenu->texte) }}</textarea>
                @error('texte')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Statut</label>
                <select name="statut"
                        class="w-full px-4 py-2 border rounded-lg @error('statut') border-red-500 @enderror">
                    <option value="publie" {{ old('statut', $contenu->statut) === 'publie' ? 'selected' : '' }}>
                        Publié
                    </option>
                    <option value="brouillon" {{ old('statut', $contenu->statut) === 'brouillon' ? 'selected' : '' }}>
                        Brouillon
                    </option>
                </select>
                @error('statut')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-3 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Type de contenu</label>
                    <select name="typecontenu_id"
                            class="w-full px-4 py-2 border rounded-lg @error('typecontenu_id') border-red-500 @enderror">
                        @foreach($typesContenus as $type)
                            <option value="{{ $type->id }}"
                                {{ old('typecontenu_id', $contenu->typecontenu_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->libelle }}
                            </option>
                        @endforeach
                    </select>
                    @error('typecontenu_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Région</label>
                    <select name="region_id"
                            class="w-full px-4 py-2 border rounded-lg @error('region_id') border-red-500 @enderror">
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}"
                                {{ old('region_id', $contenu->region_id) == $region->id ? 'selected' : '' }}>
                                {{ $region->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('region_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Langue</label>
                    <select name="langue_id"
                            class="w-full px-4 py-2 border rounded-lg @error('langue_id') border-red-500 @enderror">
                        @foreach($langues as $langue)
                            <option value="{{ $langue->id }}"
                                {{ old('langue_id', $contenu->langue_id) == $langue->id ? 'selected' : '' }}>
                                {{ $langue->nomlangue }}
                            </option>
                        @endforeach
                    </select>
                    @error('langue_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.contenus.index') }}"
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
