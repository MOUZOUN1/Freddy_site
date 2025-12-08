<?php

namespace App\Orchid\Screens\Langue;

use App\Models\Langue;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Sight;

class LangueShowScreen extends Screen
{
    public $name = 'Détails de la langue';
    public $description = '';

    public function query(Langue $langue): iterable
    {
        return [
            'langue' => $langue
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::rows([
                Sight::make('langue.nomlangue', 'Nom'),
                Sight::make('langue.codelangue', 'Code'),
                Sight::make('langue.description', 'Description'),
                Sight::make('langue.created_at', 'Créé le'),
                Sight::make('langue.updated_at', 'Modifié le'),
            ])
        ];
    }
}
