@extends('backend.layouts.admin')

@section('title', 'Créer une Langue')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        <i class="fas fa-language mr-2 text-green-600"></i>
        Créer une Langue
    </h1>

    <div class="bg-white rounded-lg shadow-md p-8">
        <form method="POST" action="{{ route('admin.langues.store') }}">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Nom de la langue</label>
                <input type="text" name="nomlangue" value="{{ old('nomlangue') }}"
                       class="w-full px-4 py-2 border rounded-lg @error('nomlangue') border-red-500 @enderror"
                       placeholder="Ex : Français" required>
                @error('nomlangue')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Code langue</label>
                <input type="text" name="codelangue" value="{{ old('codelangue') }}"
                       class="w-full px-4 py-2 border rounded-lg @error('codelangue') border-red-500 @enderror"
                       placeholder="Ex : fr" required>
                @error('codelangue')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" rows="4"
                          class="w-full px-4 py-2 border rounded-lg @error('description') border-red-500 @enderror"
                          placeholder="Description de la langue">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.langues.index') }}"
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
