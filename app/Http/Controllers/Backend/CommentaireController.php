<?php

namespace App\Http\Controllers;

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

    public function approve(Commentaire $commentaire)
    {
        $commentaire->update(['is_approved' => true]);
        return redirect()->route('admin.commentaires.index')->with('success', 'Commentaire approuvé.');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('admin.commentaires.index')->with('success', 'Commentaire supprimé.');
    }
}
