<?php

namespace App\Orchid\Screens\TypeMedia;

use App\Models\TypeMedia;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;

class TypeMediaEditScreen extends Screen
{
    public $name = 'Type de média';
    public $description = 'Créer ou modifier un type de média';
    public $typeMedia;

    public function query(TypeMedia $typeMedia): iterable
    {
        return [
            'typeMedia' => $typeMedia
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
                Input::make('typeMedia.nom')
                    ->title('Nom du type de média')
                    ->required(),
                Input::make('typeMedia.description')
                    ->title('Description')
            ])
        ];
    }

    public function save(TypeMedia $typeMedia, Request $request)
    {
        $typeMedia->fill($request->get('typeMedia'));
        $typeMedia->save();

        return redirect()->route('platform.type_media');
    }
}
