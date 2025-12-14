<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Culture Bénin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('backend.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-6 py-4">
                    <h1 class="text-2xl font-bold text-gray-800">
                        <i class="fas fa-tachometer-alt mr-2 text-green-600"></i>
                        Tableau de Bord
                    </h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="text-red-600 hover:text-red-700">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <!-- Users -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Utilisateurs</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['total_users'] }}</p>
                            </div>
                            <div class="bg-blue-100 rounded-full p-4">
                                <i class="fas fa-users text-3xl text-blue-600"></i>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">
                            <i class="fas fa-arrow-up text-green-500"></i>
                            +{{ $newUsersThisMonth }} ce mois
                        </p>
                    </div>

                    <!-- Contenus -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Contenus</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['total_contenus'] }}</p>
                            </div>
                            <div class="bg-green-100 rounded-full p-4">
                                <i class="fas fa-file-alt text-3xl text-green-600"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Abonnements -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Abonnements</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['active_subscriptions'] }}</p>
                            </div>
                            <div class="bg-yellow-100 rounded-full p-4">
                                <i class="fas fa-star text-3xl text-yellow-600"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Revenus -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Revenus</p>
                                <p class="text-3xl font-bold text-gray-800">{{ number_format($stats['total_revenue']) }}</p>
                                <p class="text-xs text-gray-500">FCFA</p>
                            </div>
                            <div class="bg-purple-100 rounded-full p-4">
                                <i class="fas fa-coins text-3xl text-purple-600"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Contenus par Type -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">
                            <i class="fas fa-chart-pie mr-2 text-green-600"></i>
                            Contenus par Type
                        </h3>
                        <canvas id="contenusTypeChart"></canvas>
                    </div>

                    <!-- Revenus par Mois -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">
                            <i class="fas fa-chart-line mr-2 text-blue-600"></i>
                            Revenus (6 derniers mois)
                        </h3>
                        <canvas id="revenusChart"></canvas>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Derniers Utilisateurs -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">
                            <i class="fas fa-user-plus mr-2 text-blue-600"></i>
                            Derniers Utilisateurs
                        </h3>
                        <div class="space-y-3">
                            @foreach($derniersUtilisateurs as $user)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $user->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    <span class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Derniers Contenus -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">
                            <i class="fas fa-file-alt mr-2 text-green-600"></i>
                            Derniers Contenus
                        </h3>
                        <div class="space-y-3">
                            @foreach($derniersContenus as $contenu)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-book text-green-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $contenu->titre }}</p>
                                            <p class="text-sm text-gray-500">{{ Str::limit($contenu->texte, 50) }}</p>
                                        </div>
                                    </div>
                                    <span class="text-xs text-gray-500">{{ $contenu->created_at->diffForHumans() }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Contenus par Type Chart
        const ctxType = document.getElementById('contenusTypeChart').getContext('2d');
        new Chart(ctxType, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($contenusParType->pluck('libelle')) !!},
                datasets: [{
                    data: {!! json_encode($contenusParType->pluck('total')) !!},
                    backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true
            }
        });

        // Revenus Chart
        const ctxRevenus = document.getElementById('revenusChart').getContext('2d');
        new Chart(ctxRevenus, {
            type: 'line',
            data: {
                labels: {!! json_encode($revenusParMois->pluck('mois')) !!},
                datasets: [{
                    label: 'Revenus (FCFA)',
                    data: {!! json_encode($revenusParMois->pluck('total')) !!},
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>