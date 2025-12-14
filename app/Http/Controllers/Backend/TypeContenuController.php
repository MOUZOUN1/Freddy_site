<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TypeContenu;
use Illuminate\Http\Request;

class TypeContenuController extends Controller
{
    public function index(Request $request)
    {
        $query = TypeContenu::withCount('contenus');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('libelle', 'like', "%{$search}%");
        }

        $typecontenus = $query->latest()->paginate(10);
        return view('backend.typecontenus.index', compact('typecontenus'));
    }

    public function create()
    {
        return view('backend.typecontenus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255|unique:typecontenus',
        ]);

        TypeContenu::create($validated);

        return redirect()->route('admin.typecontenus.index')
                        ->with('success', 'Type de contenu créé avec succès.');
    }

    public function show(TypeContenu $typecontenu)
    {
        $typecontenu->load('contenus');
        return view('backend.typecontenus.show', compact('typecontenu'));
    }

    public function edit(TypeContenu $typecontenu)
    {
        return view('backend.typecontenus.edit', compact('typecontenu'));
    }

    public function update(Request $request, TypeContenu $typecontenu)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255|unique:typecontenus,libelle,' . $typecontenu->id,
        ]);

        $typecontenu->update($validated);

        return redirect()->route('admin.typecontenus.index')
                        ->with('success', 'Type de contenu mis à jour avec succès.');
    }

    public function destroy(TypeContenu $typecontenu)
    {
        $typecontenu->delete();
        return redirect()->route('admin.typecontenus.index')
                        ->with('success', 'Type de contenu supprimé avec succès.');
    }
}