<?php

namespace App\Orchid\Screens\Contenu;

use App\Models\Contenu;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;

class ContenuScreen extends Screen
{
    public $name = 'Contenus';
    public $description = 'Gestion des contenus';

    public function query(): array
    {
        return [
            'contenus' => Contenu::with(['langue', 'typeContenu', 'region'])->paginate(10),
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Créer')
                ->icon('plus')
                ->route('platform.contenu.create'), // route pour création
        ];
    }

    public function layout(): array
    {
        return [
            Layout::table('contenus', [
                TD::make('id', 'ID')
                    ->sort()
                    ->render(fn(Contenu $contenu) => $contenu->id),

                TD::make('titre', 'Titre')
                    ->filter(TD::FILTER_TEXT)
                    ->render(fn(Contenu $contenu) => $contenu->titre),

                TD::make('texte', 'Texte')
                    ->render(fn(Contenu $contenu) => $contenu->texte),

                TD::make('statut', 'Statut')
                    ->render(fn(Contenu $contenu) => $contenu->statut),

               

                TD::make('created_at', 'Créé le')
                    ->sort()
                    ->render(fn(Contenu $contenu) => $contenu->created_at->format('d/m/Y H:i')),

                TD::make('updated_at', 'Modifié le')
                    ->sort()
                    ->render(fn(Contenu $contenu) => $contenu->updated_at->format('d/m/Y H:i')),

                TD::make('Actions')
                    ->align(TD::ALIGN_CENTER)
                    ->render(function (Contenu $contenu) {
                        return
                            Link::make('Éditer')
                                ->icon('pencil')
                                ->route('platform.contenu.edit', $contenu)
                                ->class('btn btn-sm btn-primary')
                            . ' ' .
                            Button::make('Supprimer')
                                ->icon('trash')
                                ->confirm('Voulez-vous vraiment supprimer ce contenu ?')
                                ->method('remove', ['id' => $contenu->id]);
                    }),
            ]),
        ];
    }

    /**
     * Supprime un contenu.
     */
    public function remove($id)
    {
        Contenu::findOrFail($id)->delete();
        Toast::info('Contenu supprimé avec succès');
    }
}
