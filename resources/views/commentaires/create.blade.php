@extends('layout')

@section('content')
<div class="content-wrapper p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold"><i class="fa fa-plus text-success"></i> Ajouter un commentaire</h3>
        <a href="{{ route('commentaires.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
            <i class="fa fa-arrow-left"></i> Retour
        </a>
    </div>

    <div class="card shadow-lg border-0 p-4" style="border-radius:18px;">
        <form action="{{ route('commentaires.store') }}" method="POST">
            @csrf
            <div class="row g-4">
                {{-- Commentaire --}}
                <div class="col-12">
                    <label class="form-label">Commentaire</label>
                    <textarea name="contenu" class="form-control @error('contenu') is-invalid @enderror" rows="3">{{ old('contenu') }}</textarea>
                    @error('contenu') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Utilisateur --}}
                <div class="col-md-6">
                    <label class="form-label">Utilisateur</label>
                    <select name="utilisateur_id" class="form-control" required>
                        <option value="">-- Choisir --</option>
                        @foreach($utilisateurs as $utilisateur)
                        <option value="{{ $utilisateur->id }}" {{ old('utilisateur_id') == $utilisateur->id ? 'selected' : '' }}>
                            {{ $utilisateur->nom }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- Contenu --}}
                <div class="col-md-6">
                    <label class="form-label">Contenu</label>
                    <select name="contenu_id" class="form-control" required>
                        <option value="">-- Choisir --</option>
                        @foreach($contenus as $contenu)
                        <option value="{{ $contenu->id }}" {{ old('contenu_id') == $contenu->id ? 'selected' : '' }}>
                            {{ $contenu->titre }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-4 d-flex gap-3">
                <button type="submit" class="btn btn-success px-4">
                    <i class="fa fa-save"></i> Enregistrer
                </button>
                <a href="{{ route('commentaires.index') }}" class="btn btn-secondary px-4">
                    <i class="fa fa-arrow-left"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
