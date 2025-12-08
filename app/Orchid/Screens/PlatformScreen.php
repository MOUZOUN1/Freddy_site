<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;



class PlatformScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'users' => 12,     // chiffres illustratifs
            'posts' => 34,
            'comments' => 45,
        ];
    }

    public function name(): ?string
    {
        return 'Tableau de bord';
    }

    public function description(): ?string
    {
        return 'Bienvenue sur votre tableau de bord illustratif.';
    }

    public function commandBar(): iterable
    {
        return [];
    }





    
    public function layout(): iterable
    {
        return [
            // Cartes en haut
            Layout::columns([
                Layout::view('dashboard.card', [
                    'title' => 'Utilisateurs',
                    'value' => 12,
                    'icon'  => 'user'
                ]),
                Layout::view('dashboard.card', [
                    'title' => 'Contenus',
                    'value' => 34,
                    'icon'  => 'docs'
                ]),
                Layout::view('dashboard.card', [
                    'title' => 'Commentaires',
                    'value' => 45,
                    'icon'  => 'bubble'
                ]),
            ]),

            // Graphiques factices
            Layout::view('dashboard.graph', [
                'title' => 'Statistiques hebdomadaires',
                'data'  => [5, 8, 12, 20, 15, 18, 22] // chiffres factices
            ]),

            Layout::view('dashboard.graph', [
                'title' => 'Activité par type de contenu',
                'data'  => [10, 15, 5, 8] // factices
            ]),
        ];
    }
}
