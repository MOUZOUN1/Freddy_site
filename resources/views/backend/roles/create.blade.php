@extends('backend.layouts.admin')

@section('title', 'Créer un Rôle')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        <i class="fas fa-user-shield mr-2 text-green-600"></i>
        Créer un Rôle
    </h1>

    <div class="bg-white rounded-lg shadow-md p-8">
        <form method="POST" action="{{ route('admin.roles.store') }}">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Slug</label>
                <input type="text" name="slug" value="{{ old('slug') }}"
                       class="w-full px-4 py-2 border rounded-lg @error('slug') border-red-500 @enderror"
                       placeholder="administrateur" required>
                @error('slug')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Nom du rôle</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full px-4 py-2 border rounded-lg @error('name') border-red-500 @enderror"
                       placeholder="Administrateur" required>
                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Permissions (JSON)</label>
                <textarea name="permissions" rows="6"
                          class="w-full px-4 py-2 border rounded-lg font-mono text-sm @error('permissions') border-red-500 @enderror"
                          placeholder='["users.create","users.edit","contenus.delete"]'>{{ old('permissions') }}</textarea>
                @error('permissions')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.roles.index') }}"
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
