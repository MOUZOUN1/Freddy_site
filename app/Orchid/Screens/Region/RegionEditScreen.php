<?php

namespace App\Orchid\Screens\Region;

use App\Models\Region;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;

class RegionEditScreen extends Screen
{
    public $name = 'Région';
    public $description = 'Créer ou modifier une région';
    public $region;

    public function query(Region $region): iterable
    {
        return [
            'region' => $region
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
                Input::make('region.nom')
                    ->title('Nom de la région')
                    ->required(),
                Input::make('region.description')
                    ->title('Description')
            ])
        ];
    }

    public function save(Region $region, Request $request)
    {
        $region->fill($request->get('region'));
        $region->save();

        return redirect()->route('platform.region');
    }
}
