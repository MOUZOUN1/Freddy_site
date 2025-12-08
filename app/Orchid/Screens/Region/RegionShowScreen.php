<?php

namespace App\Orchid\Screens\Region;

use App\Models\Region;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Sight;

class RegionShowScreen extends Screen
{
    public $name = 'Détails de la région';
    public $description = '';

    public function query(Region $region): iterable
    {
        return [
            'region' => $region
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::rows([
                Sight::make('region.nom', 'Nom'),
                Sight::make('region.description', 'Description'),
                Sight::make('region.created_at', 'Créé le'),
                Sight::make('region.updated_at', 'Modifié le'),
            ])
        ];
    }
}
