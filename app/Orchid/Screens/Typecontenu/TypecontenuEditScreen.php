<?php

namespace App\Orchid\Screens\TypeContenu;

use App\Models\TypeContenu;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;

class TypeContenuEditScreen extends Screen
{
    public $name = 'Type de contenu';
    public $description = 'Créer ou modifier un type de contenu';
    public $typeContenu;

    public function query(TypeContenu $typeContenu): iterable
    {
        return [
            'typeContenu' => $typeContenu
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
                Input::make('typeContenu.nom')
                    ->title('Nom du type de contenu')
                    ->required(),
                Input::make('typeContenu.description')
                    ->title('Description')
            ])
        ];
    }

    public function save(TypeContenu $typeContenu, Request $request)
    {
        $typeContenu->fill($request->get('typeContenu'));
        $typeContenu->save();

        return redirect()->route('platform.type_contenu');
    }
}
