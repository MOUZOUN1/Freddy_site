@extends('frontend.layout')
@section('title',$contenu->titre)
@section('content')
  <div class="row">
    <div class="col-md-8">
      <h1>{{ $contenu->titre }}</h1>
      <p class="text-muted">{{ $contenu->created_at->format('d M Y') }} — {{ optional($contenu->langue)->nomlangue }}</p>
      <div class="mb-4">{!! nl2br(e($contenu->texte)) !!}</div>

      <h4>Médias</h4>
      <div class="row">
        @foreach($medias as $m)
          <div class="col-md-4 mb-3">
            <div class="card card-media">
              @if(str_contains($m->description, '.jpg') || str_contains($m->description,'.png') || str_contains($m->description,'.jpeg'))
                <img src="{{ asset('storage/'.$m->description) }}" class="card-img-top" alt="">
              @else
                <div class="card-body">{{ $m->description }}</div>
              @endif
            </div>
          </div>
        @endforeach
      </div>

      <h4 class="mt-4">Commentaires</h4>
      @foreach($commentaires as $com)
        <div class="border rounded p-3 mb-2">
          <small class="text-muted">@if($com->utilisateur) {{ $com->utilisateur->nom ?? $com->utilisateur->name ?? 'Anonyme' }} @endif — {{ $com->created_at->diffForHumans() }}</small>
          <p>{{ $com->contenu }}</p>
        </div>
      @endforeach

      <h5 class="mt-3">Ajouter un commentaire</h5>
      <form action="{{ route('frontend.commentaires.store', $contenu) }}" method="post">
        @csrf
        <div class="mb-2">
          <textarea name="contenu" rows="3" class="form-control" required>{{ old('contenu') }}</textarea>
        </div>
        <div class="mb-2">
          <input type="number" name="note" min="1" max="5" class="form-control w-25" placeholder="Note (1-5)">
        </div>
        <button class="btn btn-primary">Envoyer</button>
      </form>

    </div>

    <div class="col-md-4">
      <div class="card p-3 mb-3">
        <h6>Informations</h6>
        <p><strong>Type :</strong> {{ optional($contenu->typecontenu)->libelle }}</p>
        <p><strong>Région :</strong> {{ optional($contenu->region)->nom }}</p>
        <p><strong>Langue :</strong> {{ optional($contenu->langue)->nomlangue }}</p>
      </div>
    </div>
  </div>
@endsection
