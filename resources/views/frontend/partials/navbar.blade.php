<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('frontend.home') }}">Culture Bénin</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav"> <span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('frontend.langues.index') }}">Langues</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('frontend.regions.index') }}">Régions</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('frontend.contenus.index') }}">Contenus</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('frontend.media.index') }}">Médias</a></li>
      </ul>

      <form class="d-flex" action="{{ route('frontend.contenus.index') }}" method="get">
        <input name="q" value="{{ request('q') }}" class="form-control me-2" placeholder="Recherche...">
        <button class="btn btn-outline-primary">Recherche</button>
      </form>
    </div>
  </div>
</nav>
