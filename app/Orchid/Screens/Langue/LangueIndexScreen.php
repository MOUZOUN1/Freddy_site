<?php

namespace App\Orchid\Screens\Langue;

use App\Models\Langue;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class LangueScreen extends Screen
{
    public $name = 'Langues';
    public $description = 'Gestion des langues';

    public function query(): iterable
    {
        return [
            'langues' => Langue::paginate(10),
        ];
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Ajouter')
                ->icon('plus')
                ->route('platform.langue.edit')
        ];
    }

    public function layout(): iterable
    {
        return [
            Table::make('langues')
                ->columns([
                    TD::make('id', 'ID')->sort()->filter(TD::FILTER_NUMERIC),
                    TD::make('nomlangue', 'Nom')->sort()->filter(TD::FILTER_TEXT),
                    TD::make('codelangue', 'Code')->sort()->filter(TD::FILTER_TEXT),
                    TD::make('description', 'Description')->sort()->filter(TD::FILTER_TEXT),
                    TD::make('created_at', 'Créé le')->sort(),
                    TD::make('updated_at', 'Modifié le')->sort(),
                    TD::make('Actions')
                        ->align(TD::ALIGN_CENTER)
                        ->render(function (Langue $langue) {
                            return view('platform::partials.actions', [
                                'editRoute' => route('platform.langue.edit', $langue->id),
                                'deleteRoute' => route('platform.langue.destroy', $langue->id)
                            ]);
                        }),
                ]),
        ];
    }
}
