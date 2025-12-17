@extends('layouts.app')

@section('title', $contenu->titre . ' - Culture Bénin')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Breadcrumb -->
    <nav class="mb-8 text-sm">
        <a href="{{ route('home') }}" class="text-green-600 hover:text-green-700">
            <i class="fas fa-home mr-1"></i>Accueil
        </a>
        <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
        <span class="text-gray-600">{{ $contenu->titre }}</span>
    </nav>

    <!-- Article Header -->
    <article class="bg-white rounded-lg shadow-lg overflow-hidden">
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
        
        <div class="p-8">
            <!-- Meta Info -->
            <div class="flex flex-wrap items-center gap-3 mb-6">
                <span class="bg-green-100 text-green-800 text-sm font-semibold px-3 py-1 rounded-full">
                    <i class="fas fa-tag mr-1"></i>{{ $contenu->typecontenu->libelle }}
                </span>
                <span class="text-gray-500 text-sm">
                    <i class="fas fa-map-marker-alt mr-1"></i>{{ $contenu->region->nom }}
                </span>
                <span class="text-gray-500 text-sm">
                    <i class="fas fa-language mr-1"></i>{{ $contenu->langue->nomlangue }}
                </span>
                <span class="text-gray-500 text-sm">
                    <i class="fas fa-calendar-alt mr-1"></i>{{ $contenu->created_at->format('d/m/Y') }}
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl font-bold text-gray-800 mb-6">
                {{ $contenu->titre }}
            </h1>

            <!-- Author -->
            <div class="flex items-center mb-8 pb-6 border-b">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-user text-green-600 text-xl"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-800">{{ $contenu->user->name }}</p>
                    <p class="text-sm text-gray-500">Auteur</p>
                </div>
            </div>

            <!-- Content -->
            <div class="prose prose-lg max-w-none mb-8">
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $contenu->texte }}
                </p>
            </div>

            <!-- Limited Content Warning -->
            @if($isLimited)
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 my-8">
                <div class="flex items-start">
                    <i class="fas fa-lock text-yellow-600 text-2xl mr-4 mt-1"></i>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            Contenu Premium
                        </h3>
                        <p class="text-gray-700 mb-4">
                            Vous lisez un aperçu limité. Pour accéder à l'intégralité de ce contenu et débloquer tous nos articles, podcasts, vidéos et images :
                        </p>
                        <div class="flex flex-wrap gap-3">
                            @guest
                                <a href="{{ route('register') }}" 
                                   class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                                    <i class="fas fa-user-plus mr-2"></i>S'inscrire Gratuitement
                                </a>
                                <a href="{{ route('login') }}" 
                                   class="bg-white text-green-600 px-6 py-2 rounded-lg border-2 border-green-600 hover:bg-green-50 transition">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Se Connecter
                                </a>
                            @else
                                <a href="{{ route('subscription.plans') }}" 
                                   class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition">
                                    <i class="fas fa-crown mr-2"></i>S'Abonner Maintenant
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Media Gallery -->
            @if($contenu->media->count() > 0)
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">
                    <i class="fas fa-images mr-2 text-green-600"></i>
                    Galerie Média
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($contenu->media as $media)
                    <div class="bg-gray-100 rounded-lg p-4">
                        <i class="fas fa-file text-4xl text-gray-400 mb-2"></i>
                        <p class="text-sm text-gray-700 font-medium">{{ $media->description }}</p>
                        <p class="text-xs text-gray-500">{{ $media->typemedia->libelle }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Share Buttons -->
            <div class="flex items-center gap-4 py-6 border-t border-b">
                <span class="text-gray-600 font-medium">Partager :</span>
                <a href="#" class="text-blue-600 hover:text-blue-700">
                    <i class="fab fa-facebook-f text-xl"></i>
                </a>
                <a href="#" class="text-blue-400 hover:text-blue-500">
                    <i class="fab fa-twitter text-xl"></i>
                </a>
                <a href="#" class="text-green-600 hover:text-green-700">
                    <i class="fab fa-whatsapp text-xl"></i>
                </a>
                <a href="#" class="text-blue-700 hover:text-blue-800">
                    <i class="fab fa-linkedin-in text-xl"></i>
                </a>
            </div>
        </div>
    </article>

    <!-- Comments Section -->
    <div class="mt-12 bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            <i class="fas fa-comments mr-2 text-green-600"></i>
            Commentaires ({{ $commentaires->count() }})
        </h2>

        @auth
        <!-- Add Comment Form -->
        <form method="POST" action="{{ route('content.comment', $contenu->id) }}" class="mb-8">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">
                    Votre avis
                </label>
                <textarea 
                    name="contenu" 
                    rows="4" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Partagez votre opinion..."
                    required
                ></textarea>
            </div>
            
            <div class="flex items-center justify-between">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Note</label>
                    <div class="flex gap-2">
                        @for($i = 1; $i <= 5; $i++)
                        <label class="cursor-pointer">
                            <input type="radio" name="note" value="{{ $i }}" class="hidden peer" required>
                            <i class="fas fa-star text-2xl text-gray-300 peer-checked:text-yellow-500"></i>
                        </label>
                        @endfor
                    </div>
                </div>
                
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                    <i class="fas fa-paper-plane mr-2"></i>Publier
                </button>
            </div>
        </form>
        @else
        <div class="bg-gray-50 rounded-lg p-6 mb-8 text-center">
            <i class="fas fa-user-lock text-4xl text-gray-400 mb-3"></i>
            <p class="text-gray-700 mb-4">Connectez-vous pour laisser un commentaire</p>
            <a href="{{ route('login') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                Se Connecter
            </a>
        </div>
        @endauth

        <!-- Comments List -->
        <div class="space-y-6">
            @forelse($commentaires as $commentaire)
            <div class="border-b pb-6">
                <div class="flex items-start">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-user text-blue-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <p class="font-medium text-gray-800">{{ $commentaire->user->name }}</p>
                                <p class="text-sm text-gray-500">{{ $commentaire->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star text-sm {{ $i <= $commentaire->note ? 'text-yellow-500' : 'text-gray-300' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-700">{{ $commentaire->contenu }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-8">
                <i class="fas fa-comment-slash text-4xl text-gray-300 mb-3"></i>
                <p class="text-gray-500">Aucun commentaire pour le moment. Soyez le premier à commenter !</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Similar Content -->
    @if($contenusSimilaires->count() > 0)
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            <i class="fas fa-book-open mr-2 text-green-600"></i>
            Contenus Similaires
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($contenusSimilaires as $similaire)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                @php
                    $simImageKeywords = match($similaire->typecontenu->libelle ?? 'Article') {
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
                
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 mb-2">{{ $similaire->titre }}</h3>
                    <p class="text-sm text-gray-600 mb-3">{{ Str::limit($similaire->texte, 80) }}</p>
                    <a href="{{ route('content.show', $similaire->id) }}" 
                       class="text-green-600 hover:text-green-700 text-sm font-medium">
                        Lire la suite <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection