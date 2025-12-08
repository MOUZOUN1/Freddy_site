<?php

namespace App\Orchid\Screens\Langue;

use App\Models\Langue;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;

class LangueScreen extends Screen
{
    public $name = 'Langues';
    public $description = 'Gestion des langues';

    public function query(): iterable
    {
        return [
            'langues' => Langue::paginate(10),
        ];
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Ajouter')
                ->icon('plus')
                ->route('platform.langue.create'), // route pour création
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::table('langues', [
                TD::make('id', 'ID')
                    ->sort()
                    ->filter(TD::FILTER_NUMERIC)
                    ->render(fn(Langue $langue) => $langue->id),

                TD::make('nomlangue', 'Nom')
                    ->sort()
                    ->filter(TD::FILTER_TEXT)
                    ->render(fn(Langue $langue) => $langue->nomlangue),

                TD::make('codelangue', 'Code')
                    ->sort()
                    ->filter(TD::FILTER_TEXT)
                    ->render(fn(Langue $langue) => $langue->codelangue),

                TD::make('description', 'Description')
                    ->sort()
                    ->filter(TD::FILTER_TEXT)
                    ->render(fn(Langue $langue) => $langue->description),

                TD::make('created_at', 'Créé le')
                    ->sort()
                    ->render(fn(Langue $langue) => $langue->created_at->format('d/m/Y H:i')),

                TD::make('updated_at', 'Modifié le')
                    ->sort()
                    ->render(fn(Langue $langue) => $langue->updated_at->format('d/m/Y H:i')),

                TD::make('Actions')
                    ->align(TD::ALIGN_CENTER)
                    ->render(function (Langue $langue) {
                        return
                            Link::make('Éditer')
                                ->icon('pencil')
                                ->route('platform.langue.edit', $langue)
                                ->class('btn btn-sm btn-primary')
                            . ' ' .
                            Button::make('Supprimer')
                                ->icon('trash')
                                ->confirm('Voulez-vous vraiment supprimer cette langue ?')
                                ->method('remove', ['id' => $langue->id]);
                    }),
            ]),
        ];
    }

    /**
     * Supprime une langue.
     */
    public function remove($id)
    {
        Langue::findOrFail($id)->delete();
        Toast::info('Langue supprimée avec succès');
    }
}
