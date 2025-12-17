<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contenu;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Afficher un contenu public (aperçu limité)
     */
    public function show($id)
    {
        $contenu = Contenu::with(['typecontenu', 'region', 'langue', 'user', 'media'])
                         ->findOrFail($id);

        // Vérifier si le contenu est publié
        if ($contenu->statut !== 'Publié') {
            abort(404);
        }

        // Récupérer les commentaires
        $commentaires = Commentaire::where('contenu_id', $id)
                                   ->with('user')
                                   ->latest()
                                   ->take(5)
                                   ->get();

        // Contenus similaires (même région ou même type)
        $contenusSimilaires = Contenu::where('statut', 'Publié')
                                     ->where('id', '!=', $id)
                                     ->where(function($query) use ($contenu) {
                                         $query->where('region_id', $contenu->region_id)
                                               ->orWhere('typecontenu_id', $contenu->typecontenu_id);
                                     })
                                     ->take(3)
                                     ->get();

        // Si l'utilisateur n'est pas connecté ou n'a pas d'abonnement,
        // limiter le texte à 200 caractères
        $texteComplet = $contenu->texte;
        $isLimited = false;

        if (!auth()->check() || !auth()->user()->hasActiveSubscription()) {
            if (strlen($contenu->texte) > 200) {
                $contenu->texte = substr($contenu->texte, 0, 200) . '...';
                $isLimited = true;
            }
        }

        return view('frontend.content-show', compact(
            'contenu', 
            'commentaires', 
            'contenusSimilaires',
            'isLimited'
        ));
    }

    /**
     * Afficher le contenu premium complet (nécessite abonnement)
     */
    public function showPremium($id)
    {
        // Ce middleware est déjà appliqué dans les routes
        // L'utilisateur est forcément connecté ET abonné pour arriver ici

        $contenu = Contenu::with(['typecontenu', 'region', 'langue', 'user', 'media'])
                         ->findOrFail($id);

        if ($contenu->statut !== 'Publié') {
            abort(404);
        }

        // Récupérer tous les commentaires
        $commentaires = Commentaire::where('contenu_id', $id)
                                   ->with('user')
                                   ->latest()
                                   ->paginate(10);

        // Contenus similaires
        $contenusSimilaires = Contenu::where('statut', 'Publié')
                                     ->where('id', '!=', $id)
                                     ->where(function($query) use ($contenu) {
                                         $query->where('region_id', $contenu->region_id)
                                               ->orWhere('typecontenu_id', $contenu->typecontenu_id);
                                     })
                                     ->take(4)
                                     ->get();

        return view('frontend.content-premium', compact(
            'contenu', 
            'commentaires', 
            'contenusSimilaires'
        ));
    }

    /**
     * Ajouter un commentaire (nécessite connexion)
     */
    public function storeComment(Request $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                           ->with('error', 'Vous devez être connecté pour commenter.');
        }

        $validated = $request->validate([
            'contenu' => 'required|string|max:1000',
            'note' => 'required|integer|min:1|max:5',
        ]);

        Commentaire::create([
            'contenu' => $validated['contenu'],
            'note' => $validated['note'],
            'user_id' => auth()->id(),
            'contenu_id' => $id,
        ]);

        return back()->with('success', 'Commentaire ajouté avec succès !');
    }
}