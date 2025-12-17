@extends('backend.layouts.admin')

@section('title', 'Détails du Type de Média')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            <i class="fas fa-photo-video mr-2 text-purple-600"></i>
            Détails du Type de Média
        </h1>

        <div class="flex space-x-2">
            <a href="{{ route('admin.typemedias.edit', $typemedia) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <a href="{{ route('admin.typemedias.index') }}"
               class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="grid grid-cols-1 gap-6 mb-6">
            <div>
                <p class="text-gray-600 mb-1">Libellé</p>
                <p class="font-medium text-gray-800">{{ $typemedia->libelle }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
