@extends('backend.layouts.admin')

@section('title', 'Commentaires')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        <i class="fas fa-comments mr-2 text-purple-600"></i>
        Commentaires
    </h1>

    <div class="bg-white rounded-lg shadow-md overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3">Auteur</th>
                    <th class="px-6 py-3">Contenu</th>
                    <th class="px-6 py-3">Message</th>
                    <th class="px-6 py-3">Statut</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($commentaires as $commentaire)
                    <tr class="border-b">
                        <td class="px-6 py-4">
                            {{ $commentaire->user->name ?? 'Anonyme' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $commentaire->contenu->titre ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-gray-700">
                            {{ Str::limit($commentaire->message, 50) }}
                        </td>
                        <td class="px-6 py-4">
                            @if($commentaire->is_approved)
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                                    Approuvé
                                </span>
                            @else
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">
                                    En attente
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.commentaires.show', $commentaire) }}"
                               class="bg-blue-600 text-white px-3 py-1 rounded">
                                <i class="fas fa-eye"></i>
                            </a>

                            @if(!$commentaire->is_approved)
                                <form method="POST"
                                      action="{{ route('admin.commentaires.approve', $commentaire) }}"
                                      class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button class="bg-green-600 text-white px-3 py-1 rounded">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                            @endif

                            <form method="POST"
                                  action="{{ route('admin.commentaires.destroy', $commentaire) }}"
                                  class="inline"
                                  onsubmit="return confirm('Supprimer ce commentaire ?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                            Aucun commentaire trouvé
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
