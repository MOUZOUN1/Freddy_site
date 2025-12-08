@extends('frontend.layout')
@section('title',$langue->nomlangue)
@section('content')
  <h1>{{ $langue->nomlangue }}</h1>
  <p>{{ $langue->description }}</p>

  <h4 class="mt-4">Contenus en {{ $langue->nomlangue }}</h4>
  <div class="row">
    @foreach($contenus as $c)
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-body">
            <h5>{{ $c->titre }}</h5>
            <p>{{ Str::limit($c->texte,150) }}</p>
            <a href="{{ route('frontend.contenus.show',$c) }}" class="btn btn-sm btn-outline-primary">Lire</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{ $contenus->links() }}
@endsection
