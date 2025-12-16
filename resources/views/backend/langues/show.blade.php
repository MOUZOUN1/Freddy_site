@extends('backend.layouts.admin')

@section('title', 'Détails de la Langue')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            <i class="fas fa-language mr-2 text-purple-600"></i>
            Détails de la Langue
        </h1>

        <div class="flex space-x-2">
            <a href="{{ route('admin.langues.edit', $langue) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-edit mr-2"></i>Modifier
            </a>
            <a href="{{ route('admin.langues.index') }}"
               class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <p class="text-gray-600 mb-1">Nom</p>
                <p class="font-medium text-gray-800">{{ $langue->nomlangue }}</p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Code</p>
                <p class="font-medium text-gray-800">{{ $langue->codelangue }}</p>
            </div>
        </div>

        <div class="mt-6">
            <p class="text-gray-600 mb-1">Description</p>
            <p class="text-gray-800">
                {{ $langue->description ?? 'Aucune description' }}
            </p>
        </div>

        <div class="mt-6">
            <p class="text-gray-600 mb-1">Créée le</p>
            <p class="text-gray-800">{{ $langue->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection
