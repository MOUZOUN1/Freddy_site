<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenus – Culture Bénin</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --green-900: #0b3d2e;
            --gold-500: #C8961A;
            --gold-light: #f4d38b;
        }

        @keyframes fadeInUp { 
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeUp { animation: fadeInUp 1s ease forwards; opacity: 0; }

        @keyframes scaleIn {
            0% { transform: scale(0.85); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .animate-scaleIn { animation: scaleIn 0.8s ease forwards; }
    </style>
</head>

<body class="bg-gray-100 pt-24">

<!-- ===================== NAVBAR IDENTIQUE À L’ACCUEIL ===================== -->
<header class="fixed top-0 left-0 w-full z-50 
        bg-[rgba(11,61,46,0.85)] backdrop-blur-xl
        border-b border-white/20 
        shadow-[0_4px_20px_rgba(0,0,0,0.15)]
        transition-all duration-300 ease-out">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- LOGO -->
        <a href="/" class="flex items-center gap-4">
            <svg width="58" height="58" viewBox="0 0 200 200">
                <defs>
                    <linearGradient id="goldGrad" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0%" stop-color="#f7e6b8"/>
                        <stop offset="100%" stop-color="#C8961A"/>
                    </linearGradient>
                </defs>
                <circle cx="100" cy="100" r="80"
                        fill="rgba(255,255,255,0.25)"
                        stroke="url(#goldGrad)"
                        stroke-width="12" />
                <path d="M60 75 Q100 30 140 75 Q170 110 140 140 Q100 175 60 140 Z"
                      stroke="url(#goldGrad)"
                      stroke-width="10"
                      fill="none" stroke-linecap="round"/>
            </svg>

            <div class="leading-tight">
                <h1 class="text-3xl font-black text-white tracking-wide">
                    Culture <span class="text-[var(--gold-500)]">Bénin</span>
                </h1>
                <p class="text-sm text-gray-100/90 -mt-1">
                    Patrimoine & Diversité
                </p>
            </div>
        </a>

        <!-- BOUTON HAMBURGER -->
        <button id="menuBtn" class="text-white text-4xl">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <!-- MENU -->
    <div id="mobileMenu" class="hidden bg-[rgba(11,61,46,0.8)] backdrop-blur-xl
                                border-t border-white/25 text-white absolute right-6
                                top-full rounded-b-lg w-48 shadow-lg">
        <nav class="flex flex-col p-4 space-y-2 text-lg font-semibold">
            @auth
                <a href="{{ route('profile.edit') }}" class="hover:text-[var(--gold-500)] transition">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:text-[var(--gold-500)]">Se déconnecter</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-[var(--gold-500)]">Se connecter</a>
            @endauth
        </nav>
    </div>
</header>

<script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
</script>





<!-- ====================== GRAND MESSAGE AVANT LE BLOC ====================== -->
<section class="max-w-6xl mx-auto px-6 mt-28 text-center animate-scaleIn">
    <h1 class="text-4xl md:text-5xl font-black text-[var(--green-900)] leading-tight">
        Découvrez la richesse culturelle du Bénin à travers nos contenus authentiques
    </h1>
    <p class="mt-4 text-lg text-gray-700 max-w-3xl mx-auto">
        Une immersion unique au cœur des traditions, savoirs, langues, récits et pratiques qui font 
        l’identité profonde du Bénin. Explorez, apprenez et vivez la culture autrement.
    </p>
</section>





<!-- ====================== VIDÉO + DESCRIPTION ====================== -->
<section class="max-w-7xl mx-auto px-6 mt-12">
    <div class="bg-white rounded-2xl shadow-xl p-6 grid grid-cols-1 md:grid-cols-4 gap-6 animate-fadeUp">

        <!-- VIDÉO -->
        <div class="md:col-span-1 flex justify-center items-start">
            <video 
                src="/videos/illustration.mp4"
                controls
                class="rounded-xl w-full h-40 object-cover shadow-md"
            ></video>
        </div>

        <!-- DESCRIPTION -->
        <div class="md:col-span-3">
            <h2 class="text-3xl font-bold text-[var(--green-900)] mb-4">
                Bienvenue dans l'univers des Contenus Culturels du Bénin
            </h2>

            <p class="text-lg text-gray-700 leading-relaxed">
                Découvrez ici une immersion profonde dans la richesse culturelle et patrimoniale du Bénin. 
                À travers différents récits, légendes, traditions, expressions artistiques, langues, 
                savoir-faire et histoires transmises de génération en génération, vous serez plongé au cœur 
                d’un héritage aussi ancien que fascinant.
                <br><br>
                Cette collection rassemble des éléments culturels authentiques provenant de diverses régions 
                du pays, mettant en valeur la diversité unique des peuples, leurs modes de vie, leurs valeurs 
                essentielles ainsi que leurs pratiques spirituelles et sociales. Chaque contenu vise à préserver 
                et partager des trésors culturels souvent méconnus mais d’une importance inestimable pour la 
                mémoire collective.
            </p>
        </div>
    </div>
</section>






<!-- ======================= LISTE DES CONTENUS ======================= -->
<section class="max-w-7xl mx-auto px-6 mb-20 mt-16">
    <h3 class="text-3xl font-bold text-[var(--green-900)] mb-8">Tous les contenus</h3>

    <div class="space-y-6">

        @foreach($contenus as $c)
            <div class="bg-white shadow-md p-6 rounded-xl hover:shadow-xl transition">
                <h4 class="text-2xl font-semibold text-[var(--green-900)]">
                    {{ $c->titre }}
                </h4>

                <p class="mt-3 text-gray-800 leading-relaxed">
                    {{ $c->texte }}
                </p>

                <p class="mt-3 text-sm text-gray-500">
                    <strong>Langue :</strong> {{ optional($c->langue)->nomlangue }} — 
                    <strong>Région :</strong> {{ optional($c->region)->nom }}
                </p>
            </div>
        @endforeach

    </div>

    <div class="mt-8">
        {{ $contenus->links() }}
    </div>
</section>

</body>
</html>
