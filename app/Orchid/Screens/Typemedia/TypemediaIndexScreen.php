<?php

namespace App\Orchid\Screens\TypeMedia;

use App\Models\TypeMedia;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TypeMediaScreen extends Screen
{
    public $name = 'Types de média';
    public $description = 'Gestion des types de média';

    public function query(): iterable
    {
        return [
            'type_medias' => TypeMedia::paginate(10),
        ];
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Ajouter')
                ->icon('plus')
                ->route('platform.type_media.edit')
        ];
    }

    public function layout(): iterable
    {
        return [
            Table::make('type_medias')
                ->columns([
                    TD::make('id', 'ID')->sort()->filter(TD::FILTER_NUMERIC),
                    TD::make('nom', 'Nom')->sort()->filter(TD::FILTER_TEXT),
                    TD::make('description', 'Description')->sort()->filter(TD::FILTER_TEXT),
                    TD::make('created_at', 'Créé le')->sort(),
                    TD::make('updated_at', 'Modifié le')->sort(),
                    TD::make('Actions')
                        ->align(TD::ALIGN_CENTER)
                        ->render(function (TypeMedia $typeMedia) {
                            return view('platform::partials.actions', [
                                'editRoute' => route('platform.type_media.edit', $typeMedia->id),
                                'deleteRoute' => route('platform.type_media.destroy', $typeMedia->id)
                            ]);
                        }),
                ]),
        ];
    }
}
