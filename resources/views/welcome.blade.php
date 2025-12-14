<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - Culture Bénin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-600 via-yellow-500 to-red-600 min-h-screen flex items-center justify-center">
    <div class="text-center text-white px-4">
        <!-- Logo/Icon -->
        <div class="mb-8">
            <i class="fas fa-landmark text-8xl mb-4 animate-pulse"></i>
        </div>
        
        <!-- Titre Principal -->
        <h1 class="text-6xl md:text-8xl font-bold mb-6 drop-shadow-lg">
            Culture Bénin
        </h1>
        
        <!-- Sous-titre -->
        <p class="text-2xl md:text-3xl mb-12 font-light">
            Découvrez la richesse culturelle du Berceau du Vaudou
        </p>
        
        <!-- Description -->
        <div class="max-w-2xl mx-auto mb-12 bg-white/10 backdrop-blur-sm rounded-lg p-6">
            <p class="text-lg leading-relaxed">
                Explorez l'histoire fascinante, les traditions ancestrales, 
                les arts vivants et le patrimoine unique du Bénin. 
                Des Amazones du Dahomey à la Porte du Non-Retour, 
                plongez dans un voyage culturel inoubliable.
            </p>
        </div>
        
        <!-- Bouton Call-to-Action -->
        <a href="{{ route('home') }}" 
           class="inline-block bg-white text-green-600 px-12 py-4 rounded-full text-xl font-bold hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-2xl">
            <i class="fas fa-arrow-right mr-3"></i>
            Découvrir la Culture Béninoise
        </a>
        
        <!-- Features -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16 max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                <i class="fas fa-book-open text-4xl mb-3"></i>
                <h3 class="text-xl font-bold mb-2">Contes & Légendes</h3>
                <p class="text-sm">Histoires ancestrales transmises de génération en génération</p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                <i class="fas fa-image text-4xl mb-3"></i>
                <h3 class="text-xl font-bold mb-2">Galerie Visuelle</h3>
                <p class="text-sm">Photos authentiques de monuments et sites culturels</p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                <i class="fas fa-play-circle text-4xl mb-3"></i>
                <h3 class="text-xl font-bold mb-2">Médias Enrichis</h3>
                <p class="text-sm">Vidéos, podcasts et contenus multimédias</p>
            </div>
        </div>
    </div>
</body>
</html>