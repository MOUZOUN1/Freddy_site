<?php

namespace App\Orchid\Screens\Media;

use App\Models\Media;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;

class MediaEditScreen extends Screen
{
    public $name = 'Média';
    public $description = 'Créer ou modifier un média';
    public $media;

    public function query(Media $media): iterable
    {
        return [
            'media' => $media
        ];
    }

    public function commandBar(): iterable
    {
        return [
            Button::make('Enregistrer')
                ->icon('check')
                ->method('save'),
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('media.nom')
                    ->title('Nom du média')
                    ->required(),
                Input::make('media.type')
                    ->title('Type du média')
                    ->required(),
                Input::make('media.chemin')
                    ->title('Chemin du fichier')
                    ->required(),
                Input::make('media.description')
                    ->title('Description')
            ])
        ];
    }

    public function save(Media $media, Request $request)
    {
        $media->fill($request->get('media'));
        $media->save();

        return redirect()->route('platform.medias');
    }
}
