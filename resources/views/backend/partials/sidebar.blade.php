<aside class="w-64 bg-gray-800 text-white flex flex-col">
    <!-- Logo -->
    <div class="p-6 border-b border-gray-700">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
            <i class="fas fa-landmark text-3xl text-green-500"></i>
            <div>
                <h2 class="text-xl font-bold">Culture Bénin</h2>
                <p class="text-xs text-gray-400">Admin Panel</p>
            </div>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4">
        <ul class="space-y-1 px-3">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Utilisateurs -->
            <li>
                <a href="{{ route('admin.users.index') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.users.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>Utilisateurs</span>
                </a>
            </li>

            <!-- Contenus -->
            <li>
                <a href="{{ route('admin.contenus.index') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.contenus.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-file-alt w-5"></i>
                    <span>Contenus</span>
                </a>
            </li>

            <!-- Media -->
            <li>
                <a href="{{ route('admin.medias.index') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.medias.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-photo-video w-5"></i>
                    <span>Médias</span>
                </a>
            </li>

            <!-- Régions -->
            <li>
                <a href="{{ route('admin.regions.index') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.regions.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-map-marked-alt w-5"></i>
                    <span>Régions</span>
                </a>
            </li>

            <!-- Langues -->
            <li>
                <a href="{{ route('admin.langues.index') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.langues.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-language w-5"></i>
                    <span>Langues</span>
                </a>
            </li>

            <!-- Commentaires -->
            <li>
                <a href="{{ route('admin.commentaires.index') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.commentaires.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-comments w-5"></i>
                    <span>Commentaires</span>
                </a>
            </li>

            <!-- Roles -->
            <li>
                <a href="{{ route('admin.roles.index') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.roles.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-user-shield w-5"></i>
                    <span>Rôles</span>
                </a>
            </li>

            <!-- Type Contenus -->
            <li>
                <a href="{{ route('admin.typecontenus.index') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.typecontenus.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-th-list w-5"></i>
                    <span>Types Contenus</span>
                </a>
            </li>

            <!-- Type Media -->
            <li>
                <a href="{{ route('admin.typemedias.index') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.typemedia.*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-icons w-5"></i>
                    <span>Types Médias</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Footer -->
    <div class="p-4 border-t border-gray-700">
        <a href="{{ route('home') }}" class="flex items-center space-x-2 text-gray-400 hover:text-white">
            <i class="fas fa-home"></i>
            <span>Retour au site</span>
        </a>
    </div>
</aside>