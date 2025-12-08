<?php

namespace App\Orchid\Screens\Langue;

use App\Models\Langue;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;

class LangueEditScreen extends Screen
{
    public $name = 'Langue';
    public $description = 'Créer ou modifier une langue';
    public $langue;

    public function query(Langue $langue): iterable
    {
        return [
            'langue' => $langue
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
                Input::make('langue.nomlangue')
                    ->title('Nom de la langue')
                    ->required(),
                Input::make('langue.codelangue')
                    ->title('Code de la langue')
                    ->required(),
                Input::make('langue.description')
                    ->title('Description')
            ])
        ];
    }

    public function save(Langue $langue, Request $request)
    {
        $langue->fill($request->get('langue'));
        $langue->save();

        return redirect()->route('platform.langue');
    }
}
