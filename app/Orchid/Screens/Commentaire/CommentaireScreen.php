<?php

namespace App\Orchid\Screens\Commentaire;

use App\Models\Commentaire;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;

class CommentaireScreen extends Screen
{
    public $name = 'Commentaires';
    public $description = 'Gestion des commentaires';

    public function query(): array
    {
        return [
            'commentaires' => Commentaire::with(['utilisateur', 'contenu'])->paginate(10),
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Créer')
                ->icon('plus')
                ->route('platform.commentaire.create'), // route pour création
        ];
    }

    public function layout(): array
    {
        return [
            Layout::table('commentaires', [
                TD::make('id', 'ID')
                    ->sort()
                    ->render(fn(Commentaire $commentaire) => $commentaire->id),

                TD::make('contenu', 'Contenu')
                    ->render(fn(Commentaire $commentaire) => $commentaire->contenu),

                TD::make('note', 'Note')
                    ->sort()
                    ->render(fn(Commentaire $commentaire) => $commentaire->note),

                TD::make('utilisateur', 'Utilisateur')
                    ->render(fn(Commentaires $commentaire) => $commentaire->utilisateur?->name),

                TD::make('contenu_id', 'Contenu associé')
                    ->render(fn(Commentaire $commentaire) => $commentaire->contenu?->titre),

                TD::make('created_at', 'Créé le')
                    ->sort()
                    ->render(fn(Commentaire $commentaire) => $commentaire->created_at->format('d/m/Y H:i')),

                TD::make('updated_at', 'Modifié le')
                    ->sort()
                    ->render(fn(Commentaire $commentaire) => $commentaire->updated_at->format('d/m/Y H:i')),

                TD::make('Actions')
                    ->align(TD::ALIGN_CENTER)
                    ->render(function (Commentaire $commentaire) {
                        return
                            Link::make('Éditer')
                                ->icon('pencil')
                                ->route('platform.commentaire.edit', $commentaire)
                                ->class('btn btn-sm btn-primary')
                            . ' ' .
                            Button::make('Supprimer')
                                ->icon('trash')
                                ->confirm('Voulez-vous vraiment supprimer ce commentaire ?')
                                ->method('remove', ['id' => $commentaire->id]);
                    }),
            ]),
        ];
    }

    /**
     * Supprime un commentaire.
     */
    public function remove($id)
    {
        Commentaires::findOrFail($id)->delete();
        Toast::info('Commentaire supprimé avec succès');
    }
}
