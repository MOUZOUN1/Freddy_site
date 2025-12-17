@extends('backend.layouts.admin')

@section('title', 'Gestion des Types de Médias')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            <i class="fas fa-photo-video mr-2 text-blue-600"></i>
            Gestion des Types de Médias
        </h1>
        <a href="{{ route('admin.typemedias.create') }}"
           class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Ajouter
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Libellé</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Créé le</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($types as $typemedia)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $typemedia->libelle }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $typemedia->created_at->format('d/m/Y') }}
                            </td>
                           <td class="px-6 py-4 text-right text-sm font-medium">
    <div class="flex justify-end space-x-3">

        <!-- Voir -->
        <a href="{{ route('admin.typemedias.show', $typemedia) }}"
           class="text-blue-600 hover:text-blue-900" title="Voir">
            <i class="fas fa-eye"></i>
        </a>

        <!-- Modifier -->
        <a href="{{ route('admin.typemedias.edit', $typemedia) }}"
           class="text-green-600 hover:text-green-900" title="Modifier">
            <i class="fas fa-edit"></i>
        </a>

        <!-- Supprimer -->
        <form method="POST"
              action="{{ route('admin.typemedias.destroy', $typemedia) }}"
              onsubmit="return confirm('Supprimer ce type de média ?')">
            @csrf
            @method('DELETE')
            <button class="text-red-600 hover:text-red-900" title="Supprimer">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </div>
</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                                Aucun type de média trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        
    </div>
</div>
@endsection
