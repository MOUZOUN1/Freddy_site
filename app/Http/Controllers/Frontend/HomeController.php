<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contenu;
use App\Models\Region;
use App\Models\TypeContenu;
use App\Models\Langue;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer tous les contenus publiés
        $query = Contenu::where('statut', 'Publié')
                        ->with(['typecontenu', 'region', 'langue', 'user']);

        // Filtrer par type si présent
        if ($request->has('type') && $request->type != '') {
            $query->where('typecontenu_id', $request->type);
        }

        // Filtrer par région si présent
        if ($request->has('region') && $request->region != '') {
            $query->where('region_id', $request->region);
        }

        // Recherche par mot-clé
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('texte', 'like', "%{$search}%");
            });
        }

        // Paginer les résultats
        $contenus = $query->latest()->paginate(12);

        // Récupérer les données pour les filtres
        $types = TypeContenu::all();
        $regions = Region::all();
        $langues = Langue::all();

        // Statistiques rapides
        $stats = [
            'total_contenus' => Contenu::where('statut', 'Publié')->count(),
            'total_regions' => Region::count(),
            'total_langues' => Langue::count(),
        ];

        // Contenus en vedette (les 3 plus récents)
        $contenusVedette = Contenu::where('statut', 'Publié')
                                  ->latest()
                                  ->take(3)
                                  ->get();

        return view('frontend.home', compact(
            'contenus', 
            'types', 
            'regions', 
            'langues', 
            'stats',
            'contenusVedette'
        ));
    }
}