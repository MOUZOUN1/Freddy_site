@extends('layouts.app')

@section('title', $region->nom ?? 'Région')

@section('content')
<div class="container py-5">
  <div class="row align-items-center">
    <div class="col-lg-6">
      <img src="{{ asset($region->image_path ?? 'images/region-default.jpg') }}" class="img-fluid rounded shadow" alt="{{ $region->nom }}">
    </div>

    <div class="col-lg-6">
      <h1 class="fw-bold" style="color:var(--green-800)">{{ $region->nom }}</h1>
      <p class="lead text-muted">{!! nl2br(e($region->description ?? '')) !!}</p>
      <div class="mt-4 d-flex gap-3">
        <div class="accent-box">
          <div class="fw-bold">{{ $region->superficie ?? '—' }}</div>
          <small class="text-muted">Superficie</small>
        </div>
        <div class="accent-box">
          <div class="fw-bold">{{ $region->population ?? '—' }}</div>
          <small class="text-muted">Population</small>
        </div>
      </div>
      <div class="mt-4">
        <a class="btn btn-primary-custom" href="{{ route('frontend.contenus.index') }}">Voir les contenus de la région</a>
      </div>
    </div>
  </div>

  {{-- list of contenus --}}
  <div class="mt-5">
    <h3 class="mb-3">Contenus liés</h3>
    <div class="row g-3">
      @foreach($contenus ?? [] as $c)
      <div class="col-md-4">
        <div class="card h-100">
          <img src="{{ asset($c->thumbnail ?? 'images/contenu-default.jpg') }}" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">{{ $c->titre }}</h5>
            <p class="card-text text-muted">{{ Str::limit($c->texte, 120) }}</p>
            <a href="{{ route('frontend.contenus.show', $c) }}" class="btn btn-sm btn-outline-success">Lire</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
