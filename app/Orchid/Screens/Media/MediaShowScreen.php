<?php

namespace App\Orchid\Screens\Media;

use App\Models\Media;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Sight;

class MediaShowScreen extends Screen
{
    public $name = 'Détails du média';
    public $description = '';

    public function query(Media $media): iterable
    {
        return [
            'media' => $media
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::rows([
                Sight::make('media.nom', 'Nom'),
                Sight::make('media.type', 'Type'),
                Sight::make('media.chemin', 'Chemin'),
                Sight::make('media.description', 'Description'),
                Sight::make('media.created_at', 'Créé le'),
                Sight::make('media.updated_at', 'Modifié le'),
            ])
        ];
    }
}
