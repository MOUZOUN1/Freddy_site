<?php

namespace App\Orchid\Screens\TypeMedia;

use App\Models\TypeMedia;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Sight;

class TypeMediaShowScreen extends Screen
{
    public $name = 'Détails du type de média';
    public $description = '';

    public function query(TypeMedia $typeMedia): iterable
    {
        return [
            'typeMedia' => $typeMedia
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::rows([
                Sight::make('typeMedia.nom', 'Nom'),
                Sight::make('typeMedia.description', 'Description'),
                Sight::make('typeMedia.created_at', 'Créé le'),
                Sight::make('typeMedia.updated_at', 'Modifié le'),
            ])
        ];
    }
}
