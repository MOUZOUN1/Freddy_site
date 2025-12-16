@extends('backend.layouts.admin')

@section('title', 'Créer un Utilisateur')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        <i class="fas fa-user-plus mr-2 text-green-600"></i>
        Créer un Utilisateur
    </h1>

    <div class="bg-white rounded-lg shadow-md p-8">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Nom complet</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full px-4 py-2 border rounded-lg @error('name') border-red-500 @enderror" required>
                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full px-4 py-2 border rounded-lg @error('email') border-red-500 @enderror" required>
                @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Mot de passe</label>
                <input type="password" name="password"
                       class="w-full px-4 py-2 border rounded-lg @error('password') border-red-500 @enderror" required>
                @error('password')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Confirmer mot de passe</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_admin" value="1" class="mr-2">
                    <span class="text-gray-700">Administrateur</span>
                </label>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.users.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg">Annuler</a>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection