@extends('backend.layouts.admin')

@section('title', 'Détails du Rôle')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            <i class="fas fa-user-shield mr-2 text-purple-600"></i>
            Détails du Rôle
        </h1>

        <div class="flex space-x-2">
            <a href="{{ route('admin.roles.edit', $role) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <a href="{{ route('admin.roles.index') }}"
               class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <p class="text-gray-600 mb-1">Slug</p>
                <p class="font-medium text-gray-800">{{ $role->slug }}</p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Nom</p>
                <p class="font-medium text-gray-800">{{ $role->name }}</p>
            </div>
        </div>

        <div>
            <p class="text-gray-600 mb-2">Permissions</p>
            <pre class="bg-gray-100 p-4 rounded-lg text-sm overflow-x-auto">
{{ json_encode($role->permissions, JSON_PRETTY_PRINT) }}
            </pre>
        </div>
    </div>
</div>
@endsection
