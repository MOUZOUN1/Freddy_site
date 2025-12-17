@extends('layouts.app')

@section('title', 'Accueil - Culture Bénin')

@section('content')
<div class="bg-gradient-to-r from-green-600 to-green-700 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-4">
                <i class="fas fa-landmark mr-3"></i>
                Découvrez la Culture Béninoise
            </h1>
            <p class="text-xl mb-8">
                Explorez l'histoire, les traditions et le patrimoine du Berceau du Vodoun
            </p>
            
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                    <i class="fas fa-book-open text-4xl mb-2"></i>
                    <p class="text-3xl font-bold">{{ $stats['total_contenus'] }}</p>
                    <p class="text-sm">Contenus Culturels</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                    <i class="fas fa-map-marked-alt text-4xl mb-2"></i>
                    <p class="text-3xl font-bold">{{ $stats['total_regions'] }}</p>
                    <p class="text-sm">Régions</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                    <i class="fas fa-language text-4xl mb-2"></i>
                    <p class="text-3xl font-bold">{{ $stats['total_langues'] }}</p>
                    <p class="text-sm">Langues Locales</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Contenus en Vedette -->
    @if($contenusVedette->count() > 0)
    <section class="mb-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">
            <i class="fas fa-star text-yellow-500 mr-2"></i>
            En Vedette
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($contenusVedette as $contenu)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                <!-- Image dynamique basée sur le type -->
                @php
                    $imageKeywords = match($contenu->typecontenu->libelle ?? 'Article') {
                        'Article' => 'benin,culture',
                        'Vidéo' => 'benin,documentary',
                        'Podcast' => 'africa,music',
                        'Image' => 'benin,heritage',
                        default => 'benin,culture'
                    };
                @endphp
       <img src="{{ asset('Images/' . $contenu->image) }}" 
     alt="{{ $contenu->titre }}" 
     class="w-full h-48 object-cover">



                   
                
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">
                            <i class="fas fa-tag mr-1"></i>{{ $contenu->typecontenu->libelle }}
                        </span>
                        <span class="text-gray-500 text-sm">
                            <i class="fas fa-map-marker-alt mr-1"></i>{{ $contenu->region->nom }}
                        </span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                        {{ $contenu->titre }}
                    </h3>
                    
                    <p class="text-gray-600 mb-4">
                        {{ Str::limit($contenu->texte, 120) }}
                    </p>
                    
                    <a href="{{ route('content.show', $contenu->id) }}" 
                       class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
                        Voir plus
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Filtres -->
    <section class="mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form method="GET" action="{{ route('home') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Recherche -->
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Rechercher..."
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                >
                
                <!-- Filtre Type -->
                <select 
                    name="type" 
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                >
                    <option value="">Tous les types</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                            {{ $type->libelle }}
                        </option>
                    @endforeach
                </select>
                
                <!-- Filtre Région -->
                <select 
                    name="region" 
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                >
                    <option value="">Toutes les régions</option>
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}" {{ request('region') == $region->id ? 'selected' : '' }}>
                            {{ $region->nom }}
                        </option>
                    @endforeach
                </select>
                
                <!-- Bouton Rechercher -->
                <button 
                    type="submit" 
                    class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition"
                >
                    <i class="fas fa-search mr-2"></i>Filtrer
                </button>
            </form>
        </div>
    </section>

    <!-- Liste des Contenus -->
    <section>
        <h2 class="text-3xl font-bold text-gray-800 mb-8">
            <i class="fas fa-book mr-2 text-green-600"></i>
            Tous les Contenus
        </h2>
        
        @if($contenus->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($contenus as $contenu)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                @php
                    $imageKeywords = match($contenu->typecontenu->libelle ?? 'Article') {
                        'Article' => 'benin,culture',
                        'Vidéo' => 'africa,documentary',
                        'Podcast' => 'africa,tradition',
                        'Image' => 'benin,monument',
                        default => 'benin,heritage'
                    };
                @endphp
                
        <img src="{{ asset('Images/' . $contenu->image) }}" 
     alt="{{ $contenu->titre }}" 
     class="w-full h-48 object-cover">

                
                <div class="p-5">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                            {{ $contenu->typecontenu->libelle }}
                        </span>
                        <span class="text-gray-500 text-xs">
                            <i class="fas fa-calendar-alt mr-1"></i>
                            {{ $contenu->created_at->format('d/m/Y') }}
                        </span>
                    </div>
                    
                    <h3 class="text-lg font-bold text-gray-800 mb-2 hover:text-green-600">
                        {{ $contenu->titre }}
                    </h3>
                    
                    <p class="text-gray-600 text-sm mb-3">
                        {{ Str::limit($contenu->texte, 100) }}
                    </p>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            {{ $contenu->region->nom }}
                        </span>
                        
                        <a href="{{ route('content.show', $contenu->id) }}" 
                           class="inline-flex items-center bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm transition">
                            Lire
                            <i class="fas fa-chevron-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $contenus->links() }}
        </div>
        @else
        <div class="text-center py-12">
            <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-xl">Aucun contenu trouvé</p>
        </div>
        @endif
    </section>

    <!-- Call to Action pour l'abonnement -->
    @guest
    <section class="mt-16 bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-2xl p-12 text-center text-white">
        <h2 class="text-4xl font-bold mb-4">
            <i class="fas fa-crown mr-2"></i>
            Accédez à tous les contenus premium
        </h2>
        <p class="text-xl mb-8">
            Découvrez l'intégralité de notre collection culturelle sans limitation
        </p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('register') }}" 
               class="bg-white text-yellow-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition">
                <i class="fas fa-user-plus mr-2"></i>S'inscrire Gratuitement
            </a>
            <a href="{{ route('login') }}" 
               class="bg-yellow-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-yellow-700 transition border-2 border-white">
                <i class="fas fa-sign-in-alt mr-2"></i>Se Connecter
            </a>
        </div>
    </section>
    @else
        @if(!auth()->user()->hasActiveSubscription())
        <section class="mt-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-12 text-center text-white">
            <h2 class="text-4xl font-bold mb-4">
                <i class="fas fa-star mr-2"></i>
                Passez à Premium !
            </h2>
            <p class="text-xl mb-8">
                Débloquez tous les contenus et profitez d'une expérience complète
            </p>
            <a href="{{ route('subscription.plans') }}" 
               class="inline-block bg-white text-purple-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition">
                <i class="fas fa-crown mr-2"></i>Voir les Plans d'Abonnement
            </a>
        </section>
        @endif
    @endguest
</div>
@endsection