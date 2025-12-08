<?php

namespace App\Orchid\Screens\Contenu;

use App\Models\Contenu;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\TD;

class ContenuScreen extends Screen
{
    public $name = 'Contenus';
    public $description = 'Gestion des contenus';

    public function query(): array
    {
        return [
            'contenus' => Contenu::with(['langue', 'typeContenu', 'region'])->paginate(10),
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Créer')
                ->icon('plus')
                ->route('platform.contenu.edit')
        ];
    }

    public function layout(): array
    {
        return [
            Layout::table('contenus', [
                TD::make('id', 'ID')->sort(),
                TD::make('titre', 'Titre')->filter(TD::FILTER_TEXT),
                TD::make('typeContenu.nom', 'Type de contenu'),
                TD::make('langue.nom', 'Langue'),
                TD::make('region.nom', 'Région'),
                TD::make('created_at', 'Créé le')->sort(),
                TD::make('updated_at', 'Modifié le')->sort(),
                TD::make('Actions')->alignRight()->render(function (Contenu $contenu) {
                    return view('platform::partials.actions', [
                        'edit' => route('platform.contenu.edit', $contenu->id),
                        'delete' => route('platform.contenu.destroy', $contenu->id),
                    ]);
                }),
            ]),
        ];
    }
}
