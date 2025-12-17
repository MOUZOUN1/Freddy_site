<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contenu;
use App\Models\TypeContenu;
use App\Models\Region;
use App\Models\Langue;
use Illuminate\Http\Request;

class ContenuController extends Controller
{
    public function index(Request $request)
    {
        $query = Contenu::with(['typecontenu', 'region', 'langue', 'user']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('texte', 'like', "%{$search}%");
            });
        }

        $contenus = $query->latest()->paginate(10);
        return view('backend.contenus.index', compact('contenus'));
    }

    public function create()
    {
        $types = TypeContenu::all();
        $regions = Region::all();
        $langues = Langue::all();
        return view('backend.contenus.create', compact('types', 'regions', 'langues'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'statut' => 'required|in:Publié,Brouillon',
            'typecontenu_id' => 'required|exists:typecontenus,id',
            'region_id' => 'required|exists:regions,id',
            'langue_id' => 'required|exists:langues,id',
        ]);

        $validated['user_id'] = auth()->id();

        Contenu::create($validated);

        return redirect()->route('admin.contenus.index')
                        ->with('success', 'Contenu créé avec succès.');
    }

    public function show(Contenu $contenu)
    {
        $contenu->load(['typecontenu', 'region', 'langue', 'user', 'media', 'commentaires']);
        return view('backend.contenus.show', compact('contenu'));
    }

    public function edit(Contenu $contenu)
    {
        $types = TypeContenu::all();
        $regions = Region::all();
        $langues = Langue::all();
        return view('backend.contenus.edit', compact('contenu', 'types', 'regions', 'langues'));
    }

    public function update(Request $request, Contenu $contenu)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'statut' => 'required|in:Publié,Brouillon',
            'typecontenu_id' => 'required|exists:typecontenus,id',
            'region_id' => 'required|exists:regions,id',
            'langue_id' => 'required|exists:langues,id',
        ]);

        $contenu->update($validated);

        return redirect()->route('admin.contenus.index')
                        ->with('success', 'Contenu mis à jour avec succès.');
    }

    public function destroy(Contenu $contenu)
    {
        $contenu->delete();
        return redirect()->route('admin.contenus.index')
                        ->with('success', 'Contenu supprimé avec succès.');
    }
}