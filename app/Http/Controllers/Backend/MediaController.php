<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\TypeMedia;
use App\Models\Contenu;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::with(['typeMedia', 'contenu'])->latest()->get();
        return view('backend.medias.index', compact('medias'));
    }

    public function create()
    {
        $types = TypeMedia::all();
        $contenus = Contenu::all();
        return view('backend.medias.create', compact('types', 'contenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'typemedia_id' => 'required|exists:type_media,id',
            'contenu_id' => 'required|exists:contenus,id',
        ]);

        Media::create($request->all());

        return redirect()->route('admin.medias.index')->with('success', 'Media créé avec succès.');
    }

    public function edit(Media $media)
    {
        $types = TypeMedia::all();
        $contenus = Contenu::all();
        return view('backend.medias.edit', compact('media', 'types', 'contenus'));
    }

    public function update(Request $request, Media $media)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'typemedia_id' => 'required|exists:type_media,id',
            'contenu_id' => 'required|exists:contenus,id',
        ]);

        $media->update($request->all());

        return redirect()->route('admin.medias.index')->with('success', 'Media mis à jour avec succès.');
    }

    public function show(Media $media)
    {
        return view('backend.medias.show', compact('media'));
    }

    public function destroy(Media $media)
    {
        $media->delete();
        return redirect()->route('admin.medias.index')->with('success', 'Media supprimé avec succès.');
    }
}
