@extends('backend.layouts.admin')

@section('title', 'Créer un Type de Contenu')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        <i class="fas fa-file-alt mr-2 text-green-600"></i>
        Créer un Type de Contenu
    </h1>

    <div class="bg-white rounded-lg shadow-md p-8">
        <form method="POST" action="{{ route('admin.type_contenus.store') }}">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Libellé</label>
                <input type="text" name="libelle" value="{{ old('libelle') }}"
                       class="w-full px-4 py-2 border rounded-lg @error('libelle') border-red-500 @enderror"
                       placeholder="Article, Vidéo, Podcast..." required>
                @error('libelle')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.type_contenus.index') }}"
                   class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg">Annuler</a>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
