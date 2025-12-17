@extends('backend.layouts.admin')

@section('title', 'Détail du Commentaire')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            <i class="fas fa-comment mr-2 text-blue-600"></i>
            Détail du Commentaire
        </h1>

        <a href="{{ route('admin.commentaires.index') }}"
           class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">
            <i class="fas fa-arrow-left mr-2"></i>Retour
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <p class="text-gray-600 mb-1">Auteur</p>
                <p class="font-medium text-gray-800">
                    {{ $commentaire->user->name ?? 'Anonyme' }}
                </p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">Email</p>
                <p class="font-medium text-gray-800">
                    {{ $commentaire->user->email ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-gray-600 mb-1">  Note</p>
             <p class="flex space-x-1">
    @php
        $note = $commentaire->note ?? 0; // valeur par défaut si la note est null
        $max = 5; // nombre maximum d'étoiles
    @endphp

    @for ($i = 1; $i <= $max; $i++)
        @if ($i <= $note)
            <i class="fas fa-star text-yellow-400"></i> {{-- étoile pleine --}}
        @else
            <i class="far fa-star text-yellow-400"></i> {{-- étoile vide --}}
        @endif
    @endfor
</p>

            </div>

            <div>
                <p class="text-gray-600 mb-1">Statut</p>
                @if($commentaire->is_approved)
                    <span class="text-green-600 font-semibold">
                        <i class="fas fa-check-circle mr-1"></i>Approuvé
                    </span>
                @else
                    <span class="text-yellow-600 font-semibold">
                        <i class="fas fa-clock mr-1"></i>En attente
                    </span>
                @endif
            </div>
        </div>

        <div class="mb-6">
            <p class="text-gray-600 mb-2">Message</p>
            <div class="bg-gray-50 p-4 rounded-lg text-gray-800">
              
                 {{ $commentaire->contenu ?? '-' }}
            </div>
        </div>

        <div class="flex justify-between items-center">
            <p class="text-gray-500 text-sm">
                Posté le {{ $commentaire->created_at->format('d/m/Y H:i') }}
            </p>

            @if(!$commentaire->is_approved)
                <form method="POST"
                      action="{{ route('admin.commentaires.approve', $commentaire) }}">
                    @csrf
                    @method('PUT')
                    <button class="bg-green-600 text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-check mr-2"></i>Approuver
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
