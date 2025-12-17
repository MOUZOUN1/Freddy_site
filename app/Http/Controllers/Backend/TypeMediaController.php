<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\TypeMedia;
use Illuminate\Http\Request;

class TypeMediaController extends Controller
{
    public function index()
    {
        $types = TypeMedia::latest()->paginate(10);;
        return view('backend.typemedias.index', compact('types'));
    }

    public function create()
    {
        return view('backend.typemedias.create');
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255|unique:type_media,libelle',
        ]);

        TypeMedia::create($request->all());

        return redirect()->route('admin.type_media.index')->with('success', 'Type de média créé avec succès.');
    }

  public function edit(TypeMedia $typemedia)
{
    return view('backend.typemedias.edit', compact('typemedia'));
}


    public function update(Request $request, TypeMedia $typemedia)
    {
        $request->validate([
            'libelle' => 'required|string|max:255|unique:type_media,libelle,' . $typemedia->id,
        ]);

        $typemedia->update($request->all());

        return redirect()->route('admin.typemedias.index')->with('success', 'Type de média mis à jour avec succès.');
    }

    public function show(TypeMedia $typemedia)
    {
        return view('backend.typemedias.show', compact('typemedia'));
    }

    public function destroy(TypeMedia $typeMedia)
    {
        $typeMedia->delete();
        return redirect()->route('admin.typemedias.index')->with('success', 'Type de média supprimé avec succès.');
    }
}
