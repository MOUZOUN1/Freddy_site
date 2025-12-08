<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>{{ config('app.name') }} - Culture du Bénin</title>
    @vite('resources/css/app.css')
      <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true,
  });


  
</script>
</body>

</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ route('frontend.home') }}" class="text-2xl font-bold text-red-700">
            Culture Bénin
        </a>

        <ul class="flex space-x-6 font-medium">
            <li><a href="{{ route('frontend.langues.index') }}">Langues</a></li>
            <li><a href="{{ route('frontend.regions.index') }}">Régions</a></li>
            <li><a href="{{ route('frontend.contenus.index') }}">Contenus</a></li>
            <li><a href="{{ route('frontend.media.index') }}">Médias</a></li>
        </ul>
    </div>
</nav>

<!-- PAGE CONTENT -->
@yield('content')

<!-- FOOTER -->
<footer class="bg-gray-900 text-white mt-16 py-12">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-6">

        <div>
            <h3 class="text-xl font-bold mb-4">À propos</h3>
            <p>Plateforme dédiée à la valorisation du patrimoine culturel du Bénin.</p>
        </div>

        <div>
            <h3 class="text-xl font-bold mb-4">Navigation</h3>
            <ul class="space-y-2">
                <li><a href="/" class="hover:underline">Accueil</a></li>
                <li><a href="/langues" class="hover:underline">Langues</a></li>
                <li><a href="/regions" class="hover:underline">Régions</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-xl font-bold mb-4">Contact</h3>
            <p>Email : contact@culturebenin.bj</p>
        </div>

    </div>
</footer>

</body>
</html>
