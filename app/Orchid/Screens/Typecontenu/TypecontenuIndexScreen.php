<?php

namespace App\Orchid\Screens\TypeContenu;

use App\Models\TypeContenu;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TypeContenuScreen extends Screen
{
    public $name = 'Types de contenu';
    public $description = 'Gestion des types de contenu';

    public function query(): iterable
    {
        return [
            'type_contenus' => TypeContenu::paginate(10),
        ];
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Ajouter')
                ->icon('plus')
                ->route('platform.type_contenu.edit')
        ];
    }

    public function layout(): iterable
    {
        return [
            Table::make('type_contenus')
                ->columns([
                    TD::make('id', 'ID')->sort()->filter(TD::FILTER_NUMERIC),
                    TD::make('nom', 'Nom')->sort()->filter(TD::FILTER_TEXT),
                    TD::make('description', 'Description')->sort()->filter(TD::FILTER_TEXT),
                    TD::make('created_at', 'Créé le')->sort(),
                    TD::make('updated_at', 'Modifié le')->sort(),
                    TD::make('Actions')
                        ->align(TD::ALIGN_CENTER)
                        ->render(function (TypeContenu $typeContenu) {
                            return view('platform::partials.actions', [
                                'editRoute' => route('platform.type_contenu.edit', $typeContenu->id),
                                'deleteRoute' => route('platform.type_contenu.destroy', $typeContenu->id)
                            ]);
                        }),
                ]),
        ];
    }
}
