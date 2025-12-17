<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::with(['user', 'contenu'])->latest()->get();
        return view('backend.commentaires.index', compact('commentaires'));
    }

    public function show(Commentaire $commentaire)
    {
        return view('backend.commentaires.show', compact('commentaire'));
    }

public function approveView(Commentaire $commentaire)
{
    return view('backend.commentaires.approve', compact('commentaire'));
}

public function approveAction(Request $request, Commentaire $commentaire)
{
    $commentaire->is_approved = true;
    $commentaire->save();

    return redirect()->route('admin.commentaires.index')
                     ->with('success', 'Commentaire approuvé avec succès !');
}


    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('admin.commentaires.index')->with('success', 'Commentaire supprimé.');
    }
}
