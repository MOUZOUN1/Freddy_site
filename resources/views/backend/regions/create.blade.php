@extends('backend.layouts.admin')

@section('title', 'Créer une Région')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        <i class="fas fa-map-marker-alt mr-2 text-green-600"></i>
        Créer une Région
    </h1>

    <div class="bg-white rounded-lg shadow-md p-8">
        <form method="POST" action="{{ route('admin.regions.store') }}">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Nom de la région</label>
                <input type="text" name="nom" value="{{ old('nom') }}"
                       class="w-full px-4 py-2 border rounded-lg @error('nom') border-red-500 @enderror" required>
                @error('nom')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" rows="4"
                          class="w-full px-4 py-2 border rounded-lg @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Localisation</label>
                <input type="text" name="localisation" value="{{ old('localisation') }}"
                       class="w-full px-4 py-2 border rounded-lg @error('localisation') border-red-500 @enderror">
                @error('localisation')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Superficie (km²)</label>
                    <input type="number" name="superficie" value="{{ old('superficie') }}"
                           class="w-full px-4 py-2 border rounded-lg @error('superficie') border-red-500 @enderror">
                    @error('superficie')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Population</label>
                    <input type="number" name="population" value="{{ old('population') }}"
                           class="w-full px-4 py-2 border rounded-lg @error('population') border-red-500 @enderror">
                    @error('population')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.regions.index') }}"
                   class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg">Annuler</a>
                <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
