@extends('backend.layouts.admin')

@section('title', 'Gestion des Rôles')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            <i class="fas fa-user-shield mr-2 text-purple-600"></i>
            Gestion des Rôles
        </h1>
        <a href="{{ route('admin.roles.create') }}"
           class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition">
            <i class="fas fa-plus mr-2"></i>Ajouter
        </a>
    </div>

    <!-- Search Bar -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form method="GET" action="{{ route('admin.roles.index') }}" class="flex gap-4">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Rechercher par nom ou slug..."
                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
            >
            <button type="submit"
                class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700">
                <i class="fas fa-search mr-2"></i>Rechercher
            </button>
            @if(request('search'))
                <a href="{{ route('admin.roles.index') }}"
                   class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400">
                    <i class="fas fa-times mr-2"></i>Réinitialiser
                </a>
            @endif
        </form>
    </div>

    <!-- Roles Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Permissions</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Créé le</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($roles as $role)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $role->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 font-semibold">{{ $role->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $role->slug }}</td>

                            <td class="px-6 py-4 text-sm text-gray-900">
                                @if($role->permissions)
                                    <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded text-xs">
                                        {{ is_array($role->permissions) ? implode(', ', $role->permissions) : $role->permissions }}
                                    </span>
                                @else
                                    <span class="text-gray-400 italic">Aucune</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $role->created_at?->format('d/m/Y') }}
                            </td>

                            <td class="px-6 py-4 text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('admin.roles.show', $role) }}"
                                       class="text-blue-600 hover:text-blue-900" title="Voir">
                                        <i class="fas fa-eye text-lg"></i>
                                    </a>
                                    <a href="{{ route('admin.roles.edit', $role) }}"
                                       class="text-green-600 hover:text-green-900" title="Modifier">
                                        <i class="fas fa-edit text-lg"></i>
                                    </a>
                                    <form method="POST"
                                          action="{{ route('admin.roles.destroy', $role) }}"
                                          class="inline"
                                          onsubmit="return confirm('Supprimer ce rôle ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-900" title="Supprimer">
                                            <i class="fas fa-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                                <i class="fas fa-inbox text-4xl mb-2 text-gray-300"></i>
                                <p>Aucun rôle trouvé</p>
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
