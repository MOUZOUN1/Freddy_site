<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail du patrimoine</title>

    <style>

        /* ===== GRILLE DES ÉLÉMENTS ===== */
.heritage-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 35px;
    padding: 0 50px;
    margin-bottom: 80px;
}

.heritage-card {
    background: white;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 4px 18px rgba(0,0,0,0.12);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    cursor: pointer;
}

.heritage-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.18);
}

.heritage-card img {
    width: 100%;
    height: 260px;
    object-fit: cover;
}

.heritage-card h3 {
    font-size: 20px;
    font-weight: 700;
    padding: 15px 18px 0;
    color: #00363a;
}

.heritage-card p {
    font-size: 16px;
    padding: 5px 18px 18px;
    color: #0c7074;
}

.loc-icon {
    color: #0c7074;
}

        .top-header {
            position: relative;
            background: #fff;
            padding-bottom: 25px;
            border-bottom: 2px solid #dfdfdf;
        }

        .header-left-bg {
            position: absolute;
            width: 0;
            height: 0;
            border-top: 150px solid #007c7f;
            border-right: 150px solid transparent;
            left: 0;
            top: 0;
        }

        .header-right-bg {
            position: absolute;
            width: 0;
            height: 0;
            border-top: 150px solid #f7ca00;
            border-left: 150px solid transparent;
            right: 0;
            top: 0;
        }

        .header-content {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 40px;
            position: relative;
        }

        .logo {
            height: 95px;
            position: absolute;
            top: 22px;
            left: 40px;
        }

        .title {
            font-size: 38px;
            font-weight: 700;
            color: #007c7f;
            text-align: center;
            margin: 0;
        }

        /* HAMBURGER */
        .menu-toggle {
            position: absolute;
            right: 40px;
            top: 35px;
            font-size: 28px;
            cursor: pointer;
            user-select: none;
        }

        /* MENU DÉROULANT */
        .dropdown-menu {
            position: absolute;
            right: 40px;
            top: 75px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 8px 0;
            width: 180px;
            display: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 1000;
        }

        .dropdown-menu a, .dropdown-menu button {
            display: block;
            width: 100%;
            text-align: left;
            padding: 10px 16px;
            background: none;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 15px;
            color: #333;
            text-decoration: none;
        }

        .dropdown-menu a:hover,
        .dropdown-menu button:hover {
            background: #f2f2f2;
        }

        /* NAVIGATION */
        .main-nav {
            margin-top: 15px;
            text-align: center;
            z-index: 20;
            position: relative;
        }

        .main-nav ul {
            list-style: none;
            display: flex;
            padding: 0;
            justify-content: center;
            gap: 55px;
        }

        .main-nav a {
            color: #333;
            font-size: 18px;
            font-weight: 600;
            text-decoration: none;
        }

        .main-nav span {
            font-size: 14px;
            font-weight: 400;
        }

        .search-icon {
            font-size: 22px;
        }

        /* ===== SLIDER ===== */
.slider-container {
    position: relative;
    width: 100%;
    height: 590px;
    overflow: hidden;
    border-radius: 15px;
}

.slider {
    display: flex;
    width: calc(100% * 3); /* Nombre de slides */
    transition: transform 0.9s ease;
}


.slide {
    width: 100%;
    height: 590px;
    position: relative;
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.slide-caption {
    position: absolute;
    bottom: 80px;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    width: 80%;
    color: white;
    text-shadow: 0 0 15px black;
}

.slide-caption h2 {
    font-size: 48px;
    font-weight: 700;
}

.slide-caption p {
    font-size: 22px;
    margin-top: 10px;
}

/* BUTTONS */
.slider-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255,255,255,0.8);
    border: none;
    font-size: 28px;
    padding: 10px 16px;
    cursor: pointer;
    border-radius: 50%;
}

.prev { left: 25px; }
.next { right: 25px; }

.slider-btn:hover {
    background: white;
}

.slide::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.35); /* intensité de la noirceur */
    z-index: 1;
}

/* ===== SECTION TITLE ===== */
.section-title {
    margin: 45px 0 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 18px;
}

.section-title h2 {
    font-size: 34px;
    font-weight: 700;
    color: #00363a;
    text-align: center;
}

.section-title .line {
    width: 60px;
    height: 4px;
    background: #00363a;
    border-radius: 3px;
}


/* ===== BIG ARROWS ===== */
.arrow-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 60px;
    margin-bottom: 40px;
}

.arrow-btn {
    width: 80px;
    height: 80px;
    border: 2px solid #0c7074;
    border-radius: 20px;
    background: none;
    font-size: 34px;
    cursor: pointer;
    transition: 0.25s ease;
}

.arrow-btn:hover {
    background: #0c7074;
    color: white;
}

/* ===== OVERLAY RECHERCHE ===== */
.search-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.55);
    display: none;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(3px);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 5000;
}

.search-overlay.show {
    opacity: 1;
}

.search-box {
    animation: pop 0.3s ease;
}

.search-box input {
    width: 480px;
    padding: 18px;
    border-radius: 10px;
    border: none;
    font-size: 20px;
    outline: none;
}

@keyframes pop {
    from { transform: scale(0.6); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}


/* ===== SECTION LISTE INDICATIVE ===== */
.indicative-section {
    position: relative;
    width: 100%;
    height: 500px;
    background: url('{{ asset("images/dia.webp") }}') center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 80px;
    border-radius: 12px;
    overflow: hidden;
}

.indicative-overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.55);
}

.indicative-content {
    position: relative;
    max-width: 1000px;
    text-align: center;
    color: white;
    padding: 20px;
    z-index: 2;
}

.indicative-description {
    font-size: 38px;
    line-height: 1.4;
    margin-bottom: 40px;
    font-weight: 300;
}

.indicative-btn {
    background: #F9C425;
    padding: 18px 30px;
    border-radius: 10px;
    font-size: 22px;
    font-weight: 600;
    color: #000;
    display: inline-block;
    text-decoration: none;
    transition: background 0.3s ease;
}

.indicative-btn:hover {
    background: #e8b71f;
}

.indicative-tag {
    position: absolute;
    left: 20px;
    bottom: 20px;
    font-size: 48px;
    font-weight: 300;
    color: rgba(255, 255, 255, 0.4);
    transform: rotate(-90deg);
    transform-origin: left bottom;
    z-index: 2;
    letter-spacing: 2px;
}

.indicative-section {
    margin-bottom: 80px !important;
}

.anpt-footer {
    background: #003B3F;
    color: white;
    padding-top: 50px;
    font-family: "Montserrat", sans-serif;
}

.footer-stats-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 20px 0 40px;
    gap: 30px;
}

.footer-stat-item {
    text-align: center;
    width: 180px;
}

.footer-stat-item h3 {
    font-size: 42px;
    margin: 10px 0;
    font-weight: 800;
}

.footer-stat-item p {
    font-size: 17px;
    color: #A9E0E3;
}

.footer-stat-icon i {
    font-size: 55px;
    color: #FFD500;
}

.footer-bottom {
    background: #00666B;
    padding: 40px 20px;
    text-align: center;
}

.footer-bottom p {
    margin: 5px 0;
    font-size: 15px;
}

.footer-logo {
    width: 120px;
    margin-top: 20px;
}

.see-more-btn {
    background: #F9C425;
    color: #00363a;
    font-weight: 700;
    padding: 10px 22px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 16px;
    margin-top: 10px;
    display: inline-block;
}

.see-more-btn:hover {
    background: #e8b71f;
    transform: translateY(-2px);
}

.pay-btn {
    background: #F9C425;
    color: #00363a;
    font-weight: 700;
    padding: 10px 22px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 16px;
    margin-top: 10px;
    display: inline-block;
}

.pay-btn:hover {
    background: #e8b71f;
    transform: translateY(-2px);
}



    </style>



</head>

<body>

<!-- Modal paiement -->



<header class="top-header">

    <div class="header-left-bg"></div>
    <div class="header-right-bg"></div>

    <div class="header-content">

        <img src="{{ asset('images/logo_beninrevele.jpg') }}" class="logo" alt="Logo">

        <h1 class="title">Portail du patrimoine culturel du Bénin</h1>

        <!-- HAMBURGER + MENU -->
        <div id="menuToggle" class="menu-toggle" onclick="toggleMenu()">
            ☰
        </div>

        <div id="dropdownMenu" class="dropdown-menu">

            @if(Auth::check())

                <!-- PROFIL -->
                <a href="#">Profil</a>

                <!-- ADMIN ORCHID -->
                @if(Auth::user()->hasAccess('platform.index'))
                    <a href="{{ route('platform.main') }}">Tableau de bord</a>
                @endif

                <!-- DÉCONNEXION -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Se déconnecter</button>
                </form>

            @else
                <a href="{{ route('login') }}">Se connecter</a>
                <a href="{{ route('register') }}">S'inscrire</a>
            @endif

        </div>
    </div>

    <nav class="main-nav">
        <ul>
            <li><a href="#">🏠</a></li>
            <li><a href="#">A PROPOS ▾</a></li>
            <li><a href="#">IMMATERIEL<br><span>(PCI)</span></a></li>
            <li><a href="#">IMMOBILIER<br><span>(PMI)</span></a></li>
            <li><a href="#">MOBILIER<br><span>(PMO)</span></a></li>
            <li><a href="#">CONTACT</a></li>
            <li><a href="#" class="search-icon">🔍</a></li>
        </ul>
    </nav>

</header>
<!-- ===== DIAPORAMA ===== -->
<div class="slider-container">
    <div class="slider">
        <div class="slide">
            <img src="{{ asset('images/diaspo1.webp') }}" alt="Slider 1">
            <div class="slide-caption">
                <h2>LA PORTE DU NON RETOUR</h2>
                <p>Arc mémorial commémorant la déportation des millions de captifs mis en esclavage</p>
            </div>
        </div>

        <div class="slide">
            <img src="{{ asset('images/diaspo2.webp') }}" alt="Slider 2">
            <div class="slide-caption">
                <h2>Musée de Ouidah</h2>
                <p>Un voyage dans l'histoire et la mémoire du Bénin</p>
            </div>
        </div>

        <div class="slide">
            <img src="{{ asset('images/diaspo3.webp') }}" alt="Slider 3">
            <div class="slide-caption">
                <h2>Richesse du patrimoine</h2>
                <p>Découvrez la culture immatérielle et les traditions vivantes</p>
            </div>
        </div>
    </div>

    <!-- Contrôles -->
    <button class="slider-btn prev" onclick="prevSlide()">❮</button>
    <button class="slider-btn next" onclick="nextSlide()">❯</button>
</div>
<div class="section-title">
    <div class="line"></div>
    <h2>ZOOM SUR LA LISTE INDICATIVE NATIONALE</h2>
    <div class="line"></div>
</div>

<div class="arrow-controls">
    <button class="arrow-btn">&#8592;</button>
    <button class="arrow-btn">&#8594;</button>
</div>
<!-- ===== CARTES DU PATRIMOINE ===== -->
<div class="heritage-grid">

    <div class="heritage-card">
        <img src="{{ asset('images/im1.webp') }}" alt="">
        <h3>KANKANGUI</h3>
        <p><span class="loc-icon">📍</span> NIKKI</p>
        <p class="heritage-description">
            Kankangui est un site historique important à Nikki qui refl...
        </p>
        <button class="pay-btn" data-id="1" data-title="KANKANGUI" data-amount="1000"
        onclick="location.href='{{ route('payment.form', ['heritage_id' => 1]) }}'">
    Lire plus
</button>

    </div>

    <div class="heritage-card">
        <img src="{{ asset('images/im2.webp') }}" alt="">
        <h3>PANÉGYRIQUE DU ZOUNON ROI DE LA NUIT</h3>
        <p><span class="loc-icon">📍</span> PORTO-NOVO</p>
        <p class="heritage-description">
            Panégyrique du Zounon Roi de la Nuit est un événement cultu...
        </p>
      <button class="pay-btn" data-id="1" data-title="KANKANGUI" data-amount="1000"
        onclick="location.href='{{ route('payment.form', ['heritage_id' => 1]) }}'">
    Lire plus
</button>

    </div>

    <div class="heritage-card">
        <img src="{{ asset('images/im3.webp') }}" alt="">
        <h3>LE CULTE DES BOURIAN</h3>
        <p><span class="loc-icon">📍</span> PORTO-NOVO</p>
        <p class="heritage-description">
            Le culte des Bourian est une tradition ancestrale préservée...
        </p>
       <button class="pay-btn" data-id="1" data-title="KANKANGUI" data-amount="1000"
        onclick="location.href='{{ route('payment.form', ['heritage_id' => 1]) }}'">
    Lire plus
</button>

    </div>

    <div class="heritage-card">
        <img src="{{ asset('images/im4.webp') }}" alt="">
        <h3>BASILIQUE IMMACULÉE CONCEPTION</h3>
        <p><span class="loc-icon">📍</span> OUIDAH</p>
        <p class="heritage-description">
            La Basilique Immaculée Conception à Ouidah est un monument r...
        </p>
        <button class="pay-btn" data-id="1" data-title="KANKANGUI" data-amount="1000"
        onclick="location.href='{{ route('payment.form', ['heritage_id' => 1]) }}'">
    Lire plus
</button>

    </div>

</div>

    <!-- ===== SECTION LISTE INDICATIVE ===== -->


</div>

<section class="indicative-section">
    <div class="indicative-overlay"></div>

    <div class="indicative-content">
        <p class="indicative-description">
            Une liste indicative est un inventaire des biens que chaque État partie a 
            l'intention de proposer pour inscription sur la liste mondiale.
        </p>

        <a href="https://www.patrimoine.bj/liste_indicative" class="indicative-btn">
            Explorer la liste indicative du Bénin
        </a>
    </div>

    <div class="indicative-tag">
        ANPT-2024
    </div>

</section>






<!-- ======================= FOOTER ======================= -->
<footer class="anpt-footer">

    <div class="footer-stats-container">

        <div class="footer-stat-item">
            <div class="footer-stat-icon">
                <i class="fas fa-calculator"></i>
            </div>
            <h3>Culture Benin</h3>
            <p></p>
        </div>

        <div class="footer-stat-item">
            <div class="footer-stat-icon">
                <i class="fas fa-music"></i>
            </div>
            <h3>825</h3>
            <p>Contenus</p>
        </div>

        <div class="footer-stat-item">
            <div class="footer-stat-icon">
                <i class="fas fa-landmark"></i>
            </div>
            <h3>1404</h3>
            <p>Region</p>
        </div>

        <div class="footer-stat-item">
            <div class="footer-stat-icon">
                <i class="fas fa-drum"></i>
            </div>
            <h3>435</h3>
            <p>Langues</p>
        </div>

        <div class="footer-stat-item">
            <div class="footer-stat-icon">
                <i class="fas fa-tags"></i>
            </div>
            <h3>22</h3>
            <p>Medias</p>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© 2021-2025 ANPT - PORTAIL DU PATRIMOINE CULTUREL DU BÉNIN</p>
        <p>RÉALISÉ PAR : ECOLE DU PATRIMOINE AFRICAIN (EPA) — CONCEPTION WEB : DIGIWEB SARL</p>

        <img src="/images/beninrevele_blanc.png" class="footer-logo">
    </div>

</footer>

<!-- ===================== END FOOTER ===================== -->



<script>
    let index = 0;
    const slider = document.querySelector(".slider");
    const totalSlides = document.querySelectorAll(".slide").length;

    function updateSlide() {
        slider.style.transform = `translateX(-${index * 100}%)`;
    }

    function nextSlide() {
        index = (index + 1) % totalSlides;
        updateSlide();
    }

    function prevSlide() {
        index = (index - 1 + totalSlides) % totalSlides;
        updateSlide();
    }

    // Défilement automatique
   // setInterval(nextSlide, 6000);

</script>


<!-- ===== OVERLAY RECHERCHE ===== -->
<div id="searchOverlay" class="search-overlay">
    <div class="search-box">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="q" placeholder="Rechercher..." required>
        </form>
    </div>
</div>

<script>
    const overlay = document.getElementById("searchOverlay");
    const searchIcon = document.querySelector(".search-icon");

    searchIcon.addEventListener("click", () => {
        overlay.style.display = "flex";
        setTimeout(() => overlay.classList.add("show"), 20);
    });

    overlay.addEventListener("click", (e) => {
        if (e.target === overlay) {
            overlay.classList.remove("show");
            setTimeout(() => overlay.style.display = "none", 300);
        }
    });
</script>



    <script>
        function toggleMenu() {
            const menu = document.getElementById("dropdownMenu");
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        }

        // fermer si on clique ailleurs
        document.addEventListener("click", function(e) {
            const menu = document.getElementById("dropdownMenu");
            const toggle = document.getElementById("menuToggle");

            if (!menu.contains(e.target) && !toggle.contains(e.target)) {
                menu.style.display = "none";
            }
        });
    </script>
</body>
</html>
