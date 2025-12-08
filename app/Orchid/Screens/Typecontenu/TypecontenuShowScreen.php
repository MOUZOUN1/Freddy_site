<?php

namespace App\Orchid\Screens\TypeContenu;

use App\Models\TypeContenu;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Sight;

class TypeContenuShowScreen extends Screen
{
    public $name = 'Détails du type de contenu';
    public $description = '';

    public function query(TypeContenu $typeContenu): iterable
    {
        return [
            'typeContenu' => $typeContenu
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::rows([
                Sight::make('typeContenu.nom', 'Nom'),
                Sight::make('typeContenu.description', 'Description'),
                Sight::make('typeContenu.created_at', 'Créé le'),
                Sight::make('typeContenu.updated_at', 'Modifié le'),
            ])
        ];
    }
}
