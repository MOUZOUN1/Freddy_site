<?php

namespace App\Orchid\Screens\Region;

use App\Models\Region;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;

class RegionScreen extends Screen
{
    public $name = 'Régions';
    public $description = 'Gestion des régions';

    public function query(): iterable
    {
        return [
            'regions' => Region::paginate(10),
        ];
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Ajouter')
                ->icon('plus')
                ->route('platform.region.create'), // route pour création
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::table('regions', [
                TD::make('id', 'ID')
                    ->sort()
                    ->filter(TD::FILTER_NUMERIC)
                    ->render(fn(Region $region) => $region->id),

                TD::make('nom', 'Nom')
                    ->sort()
                    ->filter(TD::FILTER_TEXT)
                    ->render(fn(Region $region) => $region->nom),

                TD::make('description', 'Description')
                    ->sort()
                    ->filter(TD::FILTER_TEXT)
                    ->render(fn(Region $region) => $region->description),

                TD::make('created_at', 'Créé le')
                    ->sort()
                    ->render(fn(Region $region) => $region->created_at->format('d/m/Y H:i')),

                TD::make('updated_at', 'Modifié le')
                    ->sort()
                    ->render(fn(Region $region) => $region->updated_at->format('d/m/Y H:i')),

                TD::make('Actions')
                    ->align(TD::ALIGN_CENTER)
                    ->render(function (Region $region) {
                        return
                            Link::make('Éditer')
                                ->icon('pencil')
                                ->route('platform.region.edit', $region)
                                ->class('btn btn-sm btn-primary')
                            . ' ' .
                            Button::make('Supprimer')
                                ->icon('trash')
                                ->confirm('Voulez-vous vraiment supprimer cette région ?')
                                ->method('remove', ['id' => $region->id]);
                    }),
            ]),
        ];
    }

    /**
     * Supprime une région.
     */
    public function remove($id)
    {
        Region::findOrFail($id)->delete();
        Toast::info('Région supprimée avec succès');
    }
}
