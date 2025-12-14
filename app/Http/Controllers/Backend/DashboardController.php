<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Contenu;
use App\Models\Commentaire;
use App\Models\Media;
use App\Models\Subscription;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques générales
        $stats = [
            'total_users' => User::count(),
            'total_contenus' => Contenu::count(),
            'total_commentaires' => Commentaire::count(),
            'total_media' => Media::count(),
            'active_subscriptions' => Subscription::active()->count(),
            'total_revenue' => Payment::completed()->sum('amount'),
        ];

        // Nouveaux utilisateurs ce mois
        $newUsersThisMonth = User::whereMonth('created_at', Carbon::now()->month)
                                 ->whereYear('created_at', Carbon::now()->year)
                                 ->count();

        // Contenus par type
        $contenusParType = DB::table('contenus')
            ->join('typecontenus', 'contenus.typecontenu_id', '=', 'typecontenus.id')
            ->select('typecontenus.libelle', DB::raw('count(*) as total'))
            ->groupBy('typecontenus.libelle')
            ->get();

        // Contenus par région
        $contenusParRegion = DB::table('contenus')
            ->join('regions', 'contenus.region_id', '=', 'regions.id')
            ->select('regions.nom', DB::raw('count(*) as total'))
            ->groupBy('regions.nom')
            ->get();

        // Revenus par mois (6 derniers mois)
        $revenusParMois = Payment::completed()
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->selectRaw('MONTH(created_at) as mois, YEAR(created_at) as annee, SUM(amount) as total')
            ->groupBy('annee', 'mois')
            ->orderBy('annee', 'desc')
            ->orderBy('mois', 'desc')
            ->get();

        // Abonnements par type
        $abonnementsParType = Subscription::active()
            ->selectRaw('type, COUNT(*) as total')
            ->groupBy('type')
            ->get();

        // Derniers utilisateurs inscrits
        $derniersUtilisateurs = User::latest()->take(5)->get();

        // Derniers contenus publiés
        $derniersContenus = Contenu::where('statut', 'Publié')
                                   ->latest()
                                   ->take(5)
                                   ->get();

        return view('backend.dashboard', compact(
            'stats',
            'newUsersThisMonth',
            'contenusParType',
            'contenusParRegion',
            'revenusParMois',
            'abonnementsParType',
            'derniersUtilisateurs',
            'derniersContenus'
        ));
    }
}