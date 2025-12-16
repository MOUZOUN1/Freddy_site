<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contenu;
use App\Models\Region;
use App\Models\Langue;
use App\Models\TypeContenu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $stats = [
            'total_contenus' => Contenu::count(),
            'total_regions'  => Region::count(),
            'total_langues'  => Langue::count(),
        ];

        $contenus = Contenu::with(['typecontenu', 'region'])
            ->when($request->search, fn($q) => $q->where('titre', 'like', "%{$request->search}%"))
            ->when($request->type, fn($q) => $q->where('typecontenu_id', $request->type))
            ->when($request->region, fn($q) => $q->where('region_id', $request->region))
            ->paginate(9);

        $contenusVedette = Contenu::with(['typecontenu', 'region'])
            ->where('statut', 'Publié')
            ->latest()
            ->take(3)
            ->get();

        $types = TypeContenu::all();
        $regions = Region::all();

        return view('home', compact('stats', 'contenus', 'contenusVedette', 'types', 'regions'));
    }
}
