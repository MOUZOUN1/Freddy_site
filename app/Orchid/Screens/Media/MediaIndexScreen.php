<?php

namespace App\Orchid\Screens\Media;

use App\Models\Media;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class MediaScreen extends Screen
{
    public $name = 'Médias';
    public $description = 'Gestion des médias';

    public function query(): iterable
    {
        return [
            'medias' => Media::paginate(10),
        ];
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Ajouter')
                ->icon('plus')
                ->route('platform.media.edit')
        ];
    }

    public function layout(): iterable
    {
        return [
            Table::make('medias')
                ->columns([
                    TD::make('id', 'ID')->sort()->filter(TD::FILTER_NUMERIC),
                    TD::make('nom', 'Nom')->sort()->filter(TD::FILTER_TEXT),
                    TD::make('type', 'Type')->sort()->filter(TD::FILTER_TEXT),
                    TD::make('chemin', 'Chemin')->sort()->filter(TD::FILTER_TEXT),
                    TD::make('description', 'Description')->sort()->filter(TD::FILTER_TEXT),
                    TD::make('created_at', 'Créé le')->sort(),
                    TD::make('updated_at', 'Modifié le')->sort(),
                    TD::make('Actions')
                        ->align(TD::ALIGN_CENTER)
                        ->render(function (Media $media) {
                            return view('platform::partials.actions', [
                                'editRoute' => route('platform.media.edit', $media->id),
                                'deleteRoute' => route('platform.media.destroy', $media->id)
                            ]);
                        }),
                ]),
        ];
    }
}
