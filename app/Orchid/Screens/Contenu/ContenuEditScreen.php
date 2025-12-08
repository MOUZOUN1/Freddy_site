<?php

namespace App\Orchid\Screens\Contenu;

use App\Models\Contenu;
use App\Models\Langue;
use App\Models\Region;
use App\Models\TypeContenu;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;

class ContenuEditScreen extends Screen
{
    public $name = 'Créer / Modifier un contenu';
    public $description = 'Gestion des contenus';

    public $contenu;

    public function query(Contenu $contenu): array
    {
        return [
            'contenu' => $contenu
        ];
    }

    public function commandBar(): array
    {
        return [
            Button::make('Enregistrer')
                ->icon('check')
                ->method('save'),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('contenu.titre')->title('Titre')->required(),
                Input::make('contenu.description')->title('Description')->type('textarea'),
                
                Select::make('contenu.langue_id')
                    ->fromModel(Langue::class, 'nom')
                    ->title('Langue')
                    ->required(),

                Select::make('contenu.region_id')
                    ->fromModel(Region::class, 'nom')
                    ->title('Région')
                    ->required(),

                Select::make('contenu.type_contenu_id')
                    ->fromModel(TypeContenu::class, 'nom')
                    ->title('Type de contenu')
                    ->required(),
            ])
        ];
    }

    public function save(Contenu $contenu, \Illuminate\Http\Request $request)
    {
        $contenu->fill($request->get('contenu'));
        $contenu->save();

        \Alert::success('Contenu enregistré avec succès.');

        return redirect()->route('platform.contenu');
    }
}
