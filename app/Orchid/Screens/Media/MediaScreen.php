<?php

namespace App\Orchid\Screens\Media;

use App\Models\Media;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;

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
                ->route('platform.media.create'), // route pour création
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::table('medias', [
                TD::make('id', 'ID')
                    ->sort()
                    ->filter(TD::FILTER_NUMERIC)
                    ->render(fn(Media $media) => $media->id),

                
                TD::make('description', 'Description')
                    ->sort()
                    ->filter(TD::FILTER_TEXT)
                    ->render(fn(Media $media) => $media->description),

                TD::make('created_at', 'Créé le')
                    ->sort()
                    ->render(fn(Media $media) => $media->created_at->format('d/m/Y H:i')),

                TD::make('updated_at', 'Modifié le')
                    ->sort()
                    ->render(fn(Media $media) => $media->updated_at->format('d/m/Y H:i')),

                TD::make('Actions')
                    ->align(TD::ALIGN_CENTER)
                    ->render(function (Media $media) {
                        return
                            Link::make('Éditer')
                                ->icon('pencil')
                                ->route('platform.media.edit', $media)
                                ->class('btn btn-sm btn-primary')
                            . ' ' .
                            Button::make('Supprimer')
                                ->icon('trash')
                                ->confirm('Voulez-vous vraiment supprimer ce média ?')
                                ->method('remove', ['id' => $media->id]);
                    }),
            ]),
        ];
    }

    /**
     * Supprime un média.
     */
    public function remove($id)
    {
        Media::findOrFail($id)->delete();
        Toast::info('Média supprimé avec succès');
    }
}
