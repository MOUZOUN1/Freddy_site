@extends('layouts.app')

@section('title', 'Plans d\'abonnement - Culture Bénin')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    <!-- Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
            <i class="fas fa-star text-yellow-500 mr-3"></i>
            Choisissez votre abonnement
        </h1>
        <p class="text-xl text-gray-600">
            Accédez à l'ensemble du patrimoine culturel béninois
        </p>
    </div>

    <!-- Pricing Cards -->
    <div class="grid md:grid-cols-2 gap-8 mb-12">
        <!-- Plan Mensuel -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition duration-300">
            <div class="bg-gradient-to-r from-green-500 to-green-600 p-6 text-white">
                <h3 class="text-2xl font-bold mb-2">
                    <i class="fas fa-calendar-alt mr-2"></i>Mensuel
                </h3>
                <div class="flex items-baseline">
                    <span class="text-5xl font-bold">2000</span>
                    <span class="text-2xl ml-2">FCFA</span>
                    <span class="text-lg ml-2">/mois</span>
                </div>
            </div>
            
            <div class="p-8">
                <ul class="space-y-4 mb-8">
                    @foreach($plans['mensuel']['features'] as $feature)
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                            <span class="text-gray-700">{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>
                
                <form method="POST" action="{{ route('subscription.subscribe') }}">
                    @csrf
                    <input type="hidden" name="plan" value="mensuel">
                    <button 
                        type="submit" 
                        class="w-full bg-green-600 text-white py-3 rounded-lg font-medium hover:bg-green-700 transition duration-300"
                    >
                        <i class="fas fa-credit-card mr-2"></i>
                        Souscrire au plan mensuel
                    </button>
                </form>
            </div>
        </div>

        <!-- Plan Annuel (Recommandé) -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition duration-300 relative border-4 border-yellow-400">
            <!-- Badge Recommandé -->
            <div class="absolute top-0 right-0 bg-yellow-500 text-white px-4 py-1 rounded-bl-lg font-bold">
                <i class="fas fa-star mr-1"></i>RECOMMANDÉ
            </div>
            
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 p-6 text-white">
                <h3 class="text-2xl font-bold mb-2">
                    <i class="fas fa-calendar-check mr-2"></i>Annuel
                </h3>
                <div class="flex items-baseline">
                    <span class="text-5xl font-bold">20000</span>
                    <span class="text-2xl ml-2">FCFA</span>
                    <span class="text-lg ml-2">/an</span>
                </div>
                <p class="text-sm mt-2 opacity-90">
                    <i class="fas fa-tag mr-1"></i>Économisez 4000 FCFA (2 mois gratuits)
                </p>
            </div>
            
            <div class="p-8">
                <ul class="space-y-4 mb-8">
                    @foreach($plans['annuel']['features'] as $feature)
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-yellow-500 mr-3 mt-1"></i>
                            <span class="text-gray-700">{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>
                
                <form method="POST" action="{{ route('subscription.subscribe') }}">
                    @csrf
                    <input type="hidden" name="plan" value="annuel">
                    <button 
                        type="submit" 
                        class="w-full bg-yellow-500 text-white py-3 rounded-lg font-medium hover:bg-yellow-600 transition duration-300"
                    >
                        <i class="fas fa-credit-card mr-2"></i>
                        Souscrire au plan annuel
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="bg-white rounded-2xl shadow-lg p-8 mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">
            <i class="fas fa-question-circle text-blue-500 mr-2"></i>
            Questions Fréquentes
        </h2>
        
        <div class="space-y-6">
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">
                    <i class="fas fa-credit-card text-green-500 mr-2"></i>
                    Quels moyens de paiement acceptez-vous ?
                </h3>
                <p class="text-gray-600 ml-8">
                    Nous acceptons les paiements par Mobile Money (MTN, Moov, Celtiis) et carte bancaire via FedaPay.
                </p>
            </div>
            
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">
                    <i class="fas fa-redo text-green-500 mr-2"></i>
                    Puis-je annuler mon abonnement ?
                </h3>
                <p class="text-gray-600 ml-8">
                    Oui, vous pouvez annuler votre abonnement à tout moment depuis votre profil. Vous conserverez l'accès jusqu'à la fin de la période payée.
                </p>
            </div>
            
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">
                    <i class="fas fa-lock text-green-500 mr-2"></i>
                    Mes paiements sont-ils sécurisés ?
                </h3>
                <p class="text-gray-600 ml-8">
                    Absolument ! Tous les paiements sont sécurisés et traités par FedaPay, une plateforme de paiement certifiée.
                </p>
            </div>
            
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">
                    <i class="fas fa-gift text-green-500 mr-2"></i>
                    Y a-t-il un essai gratuit ?
                </h3>
                <p class="text-gray-600 ml-8">
                    Vous pouvez explorer une partie de notre contenu gratuitement. L'abonnement donne accès à l'intégralité de nos contenus premium.
                </p>
            </div>
        </div>
    </div>

    <!-- Trust Badges -->
    <div class="text-center">
        <div class="inline-flex items-center space-x-8 bg-gray-100 rounded-lg px-8 py-4">
            <div class="text-center">
                <i class="fas fa-shield-alt text-3xl text-green-600 mb-2"></i>
                <p class="text-sm text-gray-600">Paiement<br>Sécurisé</p>
            </div>
            <div class="text-center">
                <i class="fas fa-mobile-alt text-3xl text-blue-600 mb-2"></i>
                <p class="text-sm text-gray-600">Mobile<br>Money</p>
            </div>
            <div class="text-center">
                <i class="fas fa-headset text-3xl text-purple-600 mb-2"></i>
                <p class="text-sm text-gray-600">Support<br>24/7</p>
            </div>
        </div>
    </div>
</div>
@endsection