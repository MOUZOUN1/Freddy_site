@extends('backend.layouts.admin')

@section('title', 'Gestion des Langues')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            <i class="fas fa-language mr-2 text-blue-600"></i>
            Gestion des Langues
        </h1>
        <a href="{{ route('admin.langues.create') }}" 
           class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Ajouter 
        </a>
    </div>

    <!-- Search Bar -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form method="GET" action="{{ route('admin.langues.index') }}" class="flex gap-4">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}"
                placeholder="Rechercher par nom ou code..."
                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                <i class="fas fa-search mr-2"></i>Rechercher
            </button>
            @if(request('search'))
                <a href="{{ route('admin.langues.index') }}" 
                   class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400">
                    <i class="fas fa-times mr-2"></i>Réinitialiser
                </a>
            @endif
        </form>
    </div>

    <!-- Langues Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($langues as $langue)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $langue->nomlangue }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $langue->codelangue }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $langue->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('admin.langues.show', $langue) }}" class="text-blue-600 hover:text-blue-900" title="Voir">
                                        <i class="fas fa-eye text-lg"></i>
                                    </a>
                                    <a href="{{ route('admin.langues.edit', $langue) }}" class="text-green-600 hover:text-green-900" title="Modifier">
                                        <i class="fas fa-edit text-lg"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.langues.destroy', $langue) }}" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette langue ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" title="Supprimer">
                                            <i class="fas fa-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                <i class="fas fa-inbox text-4xl mb-2 text-gray-300"></i>
                                <p>Aucune langue trouvée</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
       
    </div>
</div>
@endsection
