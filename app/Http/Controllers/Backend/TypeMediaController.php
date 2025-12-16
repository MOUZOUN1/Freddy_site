<?php

namespace App\Http\Controllers;

use App\Models\TypeMedia;
use Illuminate\Http\Request;

class TypeMediaController extends Controller
{
    public function index()
    {
        $types = TypeMedia::latest()->get();
        return view('backend.type_media.index', compact('types'));
    }

    public function create()
    {
        return view('backend.type_media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255|unique:type_media,libelle',
        ]);

        TypeMedia::create($request->all());

        return redirect()->route('admin.type_media.index')->with('success', 'Type de média créé avec succès.');
    }

    public function edit(TypeMedia $typeMedia)
    {
        return view('backend.type_media.edit', compact('typeMedia'));
    }

    public function update(Request $request, TypeMedia $typeMedia)
    {
        $request->validate([
            'libelle' => 'required|string|max:255|unique:type_media,libelle,' . $typeMedia->id,
        ]);

        $typeMedia->update($request->all());

        return redirect()->route('admin.type_media.index')->with('success', 'Type de média mis à jour avec succès.');
    }

    public function show(TypeMedia $typeMedia)
    {
        return view('backend.type_media.show', compact('typeMedia'));
    }

    public function destroy(TypeMedia $typeMedia)
    {
        $typeMedia->delete();
        return redirect()->route('admin.type_media.index')->with('success', 'Type de média supprimé avec succès.');
    }
}
