@extends('backend.layouts.admin')

@section('title', 'Approuver le Commentaire')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        Approuver le commentaire
    </h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <p class="mb-4 text-gray-700">
            Voulez-vous approuver ce commentaire ?
        </p>

        <div class="bg-gray-100 p-4 rounded mb-6">
            {{ $commentaire->message }}
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.commentaires.index') }}"
               class="bg-gray-300 px-4 py-2 rounded">
                Annuler
            </a>

            <form method="POST"
                  action="{{ route('admin.commentaires.approveAction', $commentaire->id) }}">
                @csrf
                <button class="bg-green-600 text-white px-4 py-2 rounded">
                    Approuver
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
