<?php

namespace App\Orchid\Screens\Commentaire;

use App\Models\Commentaires;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Layout;

class CommentaireScreen extends Screen
{
    public $name = 'Commentaires';
    public $description = 'Gestion des commentaires';

    public function query(): array
    {
        return [
            'commentaires' => Commentaires::with(['utilisateur', 'contenu'])->paginate(10),
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Créer')
                ->icon('plus')
                ->route('platform.commentaire.edit') // route vers EditScreen
        ];
    }

    public function layout(): array
    {
        return [
            Layout::table('commentaires', [
                \Orchid\Screen\TD::make('id', 'ID')->sort(),
                \Orchid\Screen\TD::make('contenu', 'Contenu')->filter(TextFilter::class),
                \Orchid\Screen\TD::make('note', 'Note')->sort(),
                \Orchid\Screen\TD::make('utilisateur.name', 'Utilisateur'),
                \Orchid\Screen\TD::make('contenu_id', 'Contenu associé'),
                \Orchid\Screen\TD::make('created_at', 'Créé le')->sort(),
                \Orchid\Screen\TD::make('updated_at', 'Modifié le')->sort(),
                \Orchid\Screen\TD::make('Actions')->alignRight()->render(function (Commentaires $commentaire) {
                    return view('platform::partials.actions', [
                        'edit' => route('platform.commentaire.edit', $commentaire->id),
                        'delete' => route('platform.commentaire.destroy', $commentaire->id),
                    ]);
                }),
            ]),
        ];
    }
}
