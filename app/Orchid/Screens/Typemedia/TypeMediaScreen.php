<?php

namespace App\Orchid\Screens\TypeMedia;

use App\Models\TypeMedia;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;

class TypeMediaScreen extends Screen
{
    public $name = 'Types de média';
    public $description = 'Gestion des types de média';

    public function query(): iterable
    {
        return [
            'typemedias' => TypeMedia::paginate(10), // nom de la collection
        ];
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Ajouter')
                ->icon('plus')
                ->route('platform.typemedia.create'), // route pour création
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::table('typemedias', [
                TD::make('id', 'ID')
                    ->sort()
                    ->filter(TD::FILTER_NUMERIC)
                    ->render(fn(TypeMedia $typeMedia) => $typeMedia->id),

                TD::make('nom', 'Libelle')
                    ->sort()
                    ->filter(TD::FILTER_TEXT)
                    ->render(fn(TypeMedia $typeMedia) => $typeMedia->libelle),

              
                TD::make('created_at', 'Créé le')
                    ->sort()
                    ->render(fn(TypeMedia $typeMedia) => $typeMedia->created_at->format('d/m/Y H:i')),

                TD::make('updated_at', 'Modifié le')
                    ->sort()
                    ->render(fn(TypeMedia $typeMedia) => $typeMedia->updated_at->format('d/m/Y H:i')),

                TD::make('Actions')
                    ->align(TD::ALIGN_CENTER)
                    ->render(function (TypeMedia $typeMedia) {
                        return
                            Link::make('Éditer')
                                ->icon('pencil')
                                ->route('platform.typemedia.edit', $typeMedia)
                                ->class('btn btn-sm btn-primary')
                            . ' ' .
                            Button::make('Supprimer')
                                ->icon('trash')
                                ->confirm('Voulez-vous vraiment supprimer ce type de média ?')
                                ->method('remove', ['id' => $typeMedia->id]);
                    }),
            ]),
        ];
    }

    /**
     * Supprime un type de média.
     */
    public function remove($id)
    {
        TypeMedia::findOrFail($id)->delete();
        Toast::info('Type de média supprimé avec succès');
    }
}
