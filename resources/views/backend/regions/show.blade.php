@extends('backend.layouts.admin')

@section('title', 'Détails de la Région')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            <i class="fas fa-map mr-2 text-purple-600"></i>
            Détails de la Région
        </h1>

        <div class="flex space-x-2">
            <a href="{{ route('admin.regions.edit', $region) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <a href="{{ route('admin.regions.index') }}"
               class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <p class="text-gray-600 mb-1">Nom</p>
                <p class="font-medium text-gray-800">{{ $region->nom }}</p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Localisation</p>
                <p class="font-medium text-gray-800">{{ $region->localisation ?? '—' }}</p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Superficie</p>
                <p class="font-medium text-gray-800">{{ $region->superficie ? number_format($region->superficie) . ' km²' : '—' }}</p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Population</p>
                <p class="font-medium text-gray-800">{{ $region->population ? number_format($region->population) : '—' }}</p>
            </div>
        </div>

        <div class="mt-6">
            <p class="text-gray-600 mb-1">Description</p>
            <p class="text-gray-800">{{ $region->description ?? 'Aucune description' }}</p>
        </div>
    </div>
</div>
@endsection
