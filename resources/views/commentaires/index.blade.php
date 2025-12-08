@extends('layout')

@section('content')
<style>
/* Style étoiles */
.star-rating {
    color: #ffb400;
    font-size: 1.2rem;
}
.star-off {
    color: #dcdcdc;
}
</style>

<div class="content-wrapper p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">
            <i class="fa fa-comments text-primary"></i> Commentaires
        </h3>

        <a href="{{ route('commentaires.create') }}" class="btn btn-success d-flex align-items-center gap-2">
            <i class="fa fa-comment-medical"></i> Ajouter 
        </a>
    </div>

    <div class="card shadow-lg border-0" style="border-radius:18px;">
        <div class="card-body p-4">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Commentaire</th>
                        <th>Utilisateur</th>
                        <th>Contenu</th>
                        <th>Note</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($commentaires as $commentaire)
                    <tr>
                        <td>{{ $commentaire->id }}</td>

                        <td>{{ $commentaire->contenu }}</td>

                        <td>
                            {{ $commentaire->utilisateur ? $commentaire->utilisateur->nom : '—' }}
                        </td>

                        <td>
                           {{ $commentaire->contenu?->titre ?? '—' }}

                        </td>

                        <td>
                            {{-- Affichage étoiles --}}
                            <div class="star-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if($i <= $commentaire->note)
                                        <i class="fa fa-star"></i>
                                    @else
                                        <i class="fa fa-star star-off"></i>
                                    @endif
                                @endfor
                            </div>
                        </td>

                        <td>
                            <a href="{{ route('commentaires.show', $commentaire->id) }}" 
                               class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="{{ route('commentaires.edit', $commentaire->id) }}" 
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('commentaires.destroy', $commentaire->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Supprimer ce commentaire ?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $commentaires->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
