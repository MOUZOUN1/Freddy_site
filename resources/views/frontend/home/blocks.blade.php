<section class="max-w-7xl mx-auto px-6 py-16 space-y-12">

    <!-- LANGUES -->
    <div class="flex flex-col md:flex-row items-center gap-6 bg-white p-6 rounded-xl shadow-lg animate-fadeUp">
        <img src="{{ asset('images/illus.jpg') }}" alt="Langues" class="w-full md:w-1/2 rounded-lg shadow-lg">
        <div class="md:w-1/2">
            <h3 class="text-2xl font-bold mb-2 text-[var(--green-900)]">Langues</h3>
            <p class="text-gray-700 mb-4">
                Découvrez la richesse des langues béninoises, chacune avec son histoire et ses traditions uniques. Explorez comment elles façonnent la culture et la communication au Bénin.
            </p>
            <a href="{{ route('frontend.langues.index') }}" 
               class="inline-block px-4 py-2 bg-[var(--gold-500)] text-white rounded-lg shadow hover:bg-[var(--gold-light)] transition">
               Voir plus
            </a>
        </div>
    </div>

    <!-- RÉGIONS -->
    <div class="flex flex-col md:flex-row-reverse items-center gap-6 bg-white p-6 rounded-xl shadow-lg animate-fadeUp">
        <img src="{{ asset('images/amazone.jpg') }}" alt="Régions" class="w-full md:w-1/2 rounded-lg shadow-lg">
        <div class="md:w-1/2">
            <h3 class="text-2xl font-bold mb-2 text-[var(--green-900)]">Régions</h3>
            <p class="text-gray-700 mb-4">
                Explorez les différentes régions du Bénin, chacune offrant ses paysages, coutumes et particularités culturelles. Un voyage à travers la diversité géographique et humaine.
            </p>
            <a href="{{ route('frontend.regions.index') }}" 
               class="inline-block px-4 py-2 bg-[var(--gold-500)] text-white rounded-lg shadow hover:bg-[var(--gold-light)] transition">
               Voir plus
            </a>
        </div>
    </div>

    <!-- CONTENUS -->
    <div class="flex flex-col md:flex-row items-center gap-6 bg-white p-6 rounded-xl shadow-lg animate-fadeUp">
        <img src="{{ asset('images/illustration.jpg') }}" alt="Contenus" class="w-full md:w-1/2 rounded-lg shadow-lg">
        <div class="md:w-1/2">
            <h3 class="text-2xl font-bold mb-2 text-[var(--green-900)]">Contenus</h3>
            <p class="text-gray-700 mb-4">
                Parcourez les contenus culturels : articles, histoires, légendes et traditions du Bénin. Chaque contenu vous plonge au cœur de notre patrimoine.
            </p>
            <a href="{{ route('frontend.contenus.index') }}" 
               class="inline-block px-4 py-2 bg-[var(--gold-500)] text-white rounded-lg shadow hover:bg-[var(--gold-light)] transition">
               Voir plus
            </a>
        </div>
    </div>

    <!-- MÉDIAS -->
    <div class="flex flex-col md:flex-row-reverse items-center gap-6 bg-white p-6 rounded-xl shadow-lg animate-fadeUp">
        <img src="{{ asset('images/illustr.jpg') }}" alt="Médias" class="w-full md:w-1/2 rounded-lg shadow-lg">
        <div class="md:w-1/2">
            <h3 class="text-2xl font-bold mb-2 text-[var(--green-900)]">Médias</h3>
            <p class="text-gray-700 mb-4">
                Découvrez la galerie de photos et vidéos illustrant le patrimoine béninois. Une collection de médias pour mieux comprendre et apprécier la culture locale.
            </p>
            <a href="{{ route('frontend.media.index') }}" 
               class="inline-block px-4 py-2 bg-[var(--gold-500)] text-white rounded-lg shadow hover:bg-[var(--gold-light)] transition">
               Voir plus
            </a>
        </div>
    </div>

</section>
