<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);
        // Ajoute ici toute configuration spécifique si nécessaire
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make('Accueil')
                ->icon('bs.house')
                ->route('platform.main'),

            Menu::make('Langues')
                ->icon('bs.globe')
                ->route('platform.langues'),

            Menu::make('Régions')
                ->icon('bs.geo-alt')
                ->route('platform.regions'),

            Menu::make('Contenus')
                ->icon('bs.book')
                ->route('platform.contenus'),

            Menu::make('Médias')
                ->icon('bs.images')
                ->route('platform.medias'),

          



            Menu::make('Utilisateurs')
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title('Contrôle d’accès'),

            Menu::make('Rôles')
                ->icon('bs.shield')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->divider(),
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group('Système')
                ->addPermission('platform.systems.roles', 'Rôles')
                ->addPermission('platform.systems.users', 'Utilisateurs'),
        ];
    }
}
