<?php

namespace App\Orchid\Screens\Commentaire;

use App\Models\Commentaires;
use App\Models\Contenus;
use App\Models\User;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;

class CommentaireEditScreen extends Screen
{
    public $name = 'Créer / Modifier un commentaire';
    public $description = 'Gérer les commentaires';

    public $commentaire;

    public function query(Commentaires $commentaire): array
    {
        return [
            'commentaire' => $commentaire
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
                Input::make('commentaire.contenu')
                    ->title('Contenu')
                    ->required(),

                Input::make('commentaire.note')
                    ->type('number')
                    ->title('Note')
                    ->required(),

                Select::make('commentaire.utilisateur_id')
                    ->fromModel(User::class, 'name')
                    ->title('Utilisateur')
                    ->required(),

                Select::make('commentaire.contenu_id')
                    ->fromModel(Contenus::class, 'titre')
                    ->title('Contenu associé')
                    ->required(),
            ])
        ];
    }

    public function save(Commentaires $commentaire, \Illuminate\Http\Request $request)
    {
        $commentaire->fill($request->get('commentaire'));
        $commentaire->save();

        \Alert::success('Commentaire enregistré avec succès.');

        return redirect()->route('platform.commentaire');
    }
}
