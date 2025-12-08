<?php

namespace App\Orchid\Screens\TypeContenu;

use App\Models\TypeContenu;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;

class TypeContenuScreen extends Screen
{
    public $name = 'Types de contenu';
    public $description = 'Gestion des types de contenu';

    public function query(): iterable
    {
        return [
            'typecontenus' => TypeContenu::paginate(10), // nom de la collection
        ];
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Ajouter')
                ->icon('plus')
                ->route('platform.typecontenu.create'), // route pour création
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::table('typecontenus', [
                TD::make('id', 'ID')
                    ->sort()
                    ->filter(TD::FILTER_NUMERIC)
                    ->render(fn(TypeContenu $typeContenu) => $typeContenu->id),

                TD::make('nom', 'Libellé')
                    ->sort()
                    ->filter(TD::FILTER_TEXT)
                    ->render(fn(TypeContenu $typeContenu) => $typeContenu->libelle),


                TD::make('created_at', 'Créé le')
                    ->sort()
                    ->render(fn(TypeContenu $typeContenu) => $typeContenu->created_at->format('d/m/Y H:i')),

                TD::make('updated_at', 'Modifié le')
                    ->sort()
                    ->render(fn(TypeContenu $typeContenu) => $typeContenu->updated_at->format('d/m/Y H:i')),

                TD::make('Actions')
                    ->align(TD::ALIGN_CENTER)
                    ->render(function (TypeContenu $typeContenu) {
                        return
                            Link::make('Éditer')
                                ->icon('pencil')
                                ->route('platform.typecontenu.edit', $typeContenu)
                                ->class('btn btn-sm btn-primary')
                            . ' ' .
                            Button::make('Supprimer')
                                ->icon('trash')
                                ->confirm('Voulez-vous vraiment supprimer ce type de contenu ?')
                                ->method('remove', ['id' => $typeContenu->id]);
                    }),
            ]),
        ];
    }

    /**
     * Supprime un type de contenu.
     */
    public function remove($id)
    {
        TypeContenu::findOrFail($id)->delete();
        Toast::info('Type de contenu supprimé avec succès');
    }
}
