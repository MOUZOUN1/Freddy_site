@extends('layout')

@section('content')
<div class="content-wrapper p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold"><i class="fa fa-comment text-primary"></i> Détails du commentaire</h3>
        <a href="{{ route('commentaires.index') }}" class="btn btn-outline-primary d-flex align-items-center gap-2">
            <i class="fa fa-arrow-left"></i> Retour à la liste
        </a>
    </div>

    <div class="card shadow-lg border-0" style="border-radius:18px;">
        <div class="card-body p-4">
            <div class="row g-4">

                {{-- ID --}}
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary text-white me-3 d-flex justify-content-center align-items-center"
                             style="width:48px; height:48px; border-radius:50%;">
                            <i class="fa fa-id-card"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">ID</h6>
                            <p class="fw-bold mb-0">{{ $commentaire->id }}</p>
                        </div>
                    </div>
                </div>

                {{-- Utilisateur --}}
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <div class="bg-dark text-white me-3 d-flex justify-content-center align-items-center"
                             style="width:48px; height:48px; border-radius:50%;">
                            <i class="fa fa-user"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Utilisateur</h6>
                            <p class="fw-bold mb-0">{{ $commentaire->utilisateur ? $commentaire->utilisateur->nom : '—' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Contenu lié --}}
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning text-white me-3 d-flex justify-content-center align-items-center"
                             style="width:48px; height:48px; border-radius:50%;">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Contenu associé</h6>
                            <p class="fw-bold mb-0">{{ $commentaire->contenu ? $commentaire->contenu->titre : '—' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Texte du commentaire --}}
                <div class="col-md-12">
                    <div class="d-flex align-items-start">
                        <div class="bg-info text-white me-3 d-flex justify-content-center align-items-center"
                             style="width:48px; height:48px; border-radius:50%;">
                            <i class="fa fa-comment-dots"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Commentaire</h6>
                            <p class="fw-bold">{{ $commentaire->text }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-4 d-flex gap-3">
                <a href="{{ route('commentaires.index') }}" class="btn btn-secondary px-4">
                    <i class="fa fa-arrow-left"></i> Retour
                </a>
                <a href="{{ route('commentaires.edit', $commentaire->id) }}" class="btn btn-warning px-4">
                    <i class="fa fa-edit"></i> Modifier
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
