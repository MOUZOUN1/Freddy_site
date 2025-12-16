@extends('backend.layouts.admin')

@section('title', 'Créer un Contenu')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        <i class="fas fa-plus-circle mr-2 text-green-600"></i>
        Créer un Contenu
    </h1>

    <div class="bg-white rounded-lg shadow-md p-8">
        <form method="POST" action="{{ route('admin.contenus.store') }}">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Titre</label>
                <input type="text" name="titre" value="{{ old('titre') }}"
                       class="w-full px-4 py-2 border rounded-lg @error('titre') border-red-500 @enderror"
                       placeholder="Titre du contenu" required>
                @error('titre')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Texte</label>
                <textarea name="texte" rows="6"
                          class="w-full px-4 py-2 border rounded-lg @error('texte') border-red-500 @enderror"
                          placeholder="Contenu du texte...">{{ old('texte') }}</textarea>
                @error('texte')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Statut</label>
                <select name="statut"
                        class="w-full px-4 py-2 border rounded-lg @error('statut') border-red-500 @enderror">
                    <option value="">-- Sélectionner le statut --</option>
                    <option value="publie" {{ old('statut') === 'publie' ? 'selected' : '' }}>Publié</option>
                    <option value="brouillon" {{ old('statut') === 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                </select>
                @error('statut')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-3 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Type de contenu</label>
                    <select name="typecontenu_id"
                            class="w-full px-4 py-2 border rounded-lg @error('typecontenu_id') border-red-500 @enderror">
                        <option value="">-- Sélectionner --</option>
                        @foreach($typesContenus as $type)
                            <option value="{{ $type->id }}"
                                {{ old('typecontenu_id') == $type->id ? 'selected' : '' }}>
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
                        <option value="">-- Sélectionner --</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}"
                                {{ old('region_id') == $region->id ? 'selected' : '' }}>
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
                        <option value="">-- Sélectionner --</option>
                        @foreach($langues as $langue)
                            <option value="{{ $langue->id }}"
                                {{ old('langue_id') == $langue->id ? 'selected' : '' }}>
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
                        class="bg-green-600 text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
