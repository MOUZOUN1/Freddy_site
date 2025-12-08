<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleGridScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;

use App\Orchid\Screens\Langue\LangueIndexScreen;
use App\Orchid\Screens\Langue\LangueScreen;
use App\Orchid\Screens\Langue\LangueEditScreen;
use App\Orchid\Screens\Langue\LangueShowScreen;

use App\Orchid\Screens\Region\RegionIndexScreen;
use App\Orchid\Screens\Region\RegionEditScreen;
use App\Orchid\Screens\Region\RegionScreen;
use App\Orchid\Screens\Region\RegionShowScreen;

use App\Orchid\Screens\Contenu\ContenuIndexScreen;
use App\Orchid\Screens\Contenu\ContenuEditScreen;
use App\Orchid\Screens\Contenu\ContenuShowScreen;
use App\Orchid\Screens\Contenu\ContenuScreen;

use App\Orchid\Screens\Media\MediaIndexScreen;
use App\Orchid\Screens\Media\MediaEditScreen;
use App\Orchid\Screens\Media\MediaScreen;
use App\Orchid\Screens\Media\MediaShowScreen;

use App\Orchid\Screens\Commentaire\CommentaireIndexScreen;
use App\Orchid\Screens\Commentaire\CommentaireEditScreen;
use App\Orchid\Screens\Commentaire\CommentaireScreen;
use App\Orchid\Screens\Commentaire\CommentaireShowScreen;

use App\Orchid\Screens\Typecontenu\TypecontenuIndexScreen;
use App\Orchid\Screens\Typecontenu\TypecontenuEditScreen;
use App\Orchid\Screens\Typecontenu\TypecontenuScreen;
use App\Orchid\Screens\Typecontenu\TypecontenuShowScreen;

use App\Orchid\Screens\Typemedia\TypemediaIndexScreen;
use App\Orchid\Screens\Typemedia\TypemediaScreen;
use App\Orchid\Screens\Typemedia\TypemediaEditScreen;
use App\Orchid\Screens\Typemedia\TypemediaShowScreen;

use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

// Main dashboard
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Langues
Route::screen('langues/create', LangueEditScreen::class)
    ->name('platform.langue.create');
    Route::screen('regions/create', RegionEditScreen::class)
    ->name('platform.region.create');

     Route::screen('contenus/create', ContenuEditScreen::class)
    ->name('platform.contenu.create');

    
     Route::screen('typecontenus/create', TypecontenuEditScreen::class)
    ->name('platform.typecontenu.create');

     Route::screen('typemedias/create', TypemediaEditScreen::class)
    ->name('platform.typemedia.create');

       Route::screen('medias/create', MediaEditScreen::class)
    ->name('platform.media.create');

         Route::screen('commentaires/create', CommentaireEditScreen::class)
    ->name('platform.commentaire.create');

// Langues
Route::screen('langues', LangueScreen::class)
    ->name('platform.langues')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Langues'), route('platform.langues')));

Route::screen('langues/{langue}/edit', LangueEditScreen::class)
    ->name('platform.langue.edit')
    ->breadcrumbs(fn (Trail $trail, $langue) => $trail
        ->parent('platform.langues')
        ->push($langue->nomlangue ?? 'Edit', route('platform.langue.edit', $langue)));

Route::screen('langues/{langue}/show', LangueShowScreen::class)
    ->name('platform.langue.show')
    ->breadcrumbs(fn (Trail $trail, $langue) => $trail
        ->parent('platform.langues')
        ->push($langue->nomlangue ?? 'Show', route('platform.langue.show', $langue)));


// Régions
Route::screen('regions', RegionScreen::class)
    ->name('platform.regions')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Regions'), route('platform.regions')));

Route::screen('regions/{region}/edit', RegionEditScreen::class)
    ->name('platform.region.edit')
    ->breadcrumbs(fn (Trail $trail, $region) => $trail
        ->parent('platform.regions')
        ->push($region->name ?? 'Edit', route('platform.region.edit', $region)));

Route::screen('regions/{region}/show', RegionShowScreen::class)
    ->name('platform.region.show')
    ->breadcrumbs(fn (Trail $trail, $region) => $trail
        ->parent('platform.regions')
        ->push($region->name ?? 'Show', route('platform.region.show', $region)));

// Contenus
Route::screen('contenus', ContenuScreen::class)
    ->name('platform.contenus')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Contenus'), route('platform.contenus')));

Route::screen('contenus/{contenu}/edit', ContenuEditScreen::class)
    ->name('platform.contenu.edit')
    ->breadcrumbs(fn (Trail $trail, $contenu) => $trail
        ->parent('platform.contenus')
        ->push($contenu->title ?? 'Edit', route('platform.contenu.edit', $contenu)));

Route::screen('contenus/{contenu}/show', ContenuShowScreen::class)
    ->name('platform.contenu.show')
    ->breadcrumbs(fn (Trail $trail, $contenu) => $trail
        ->parent('platform.contenus')
        ->push($contenu->title ?? 'Show', route('platform.contenu.show', $contenu)));

// Médias
Route::screen('medias', MediaScreen::class)
    ->name('platform.medias')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Medias'), route('platform.medias')));

Route::screen('medias/{media}/edit', MediaEditScreen::class)
    ->name('platform.media.edit')
    ->breadcrumbs(fn (Trail $trail, $media) => $trail
        ->parent('platform.medias')
        ->push($media->name ?? 'Edit', route('platform.media.edit', $media)));

Route::screen('medias/{media}/show', MediaShowScreen::class)
    ->name('platform.media.show')
    ->breadcrumbs(fn (Trail $trail, $media) => $trail
        ->parent('platform.medias')
        ->push($media->name ?? 'Show', route('platform.media.show', $media)));

// Commentaires
Route::screen('commentaires', CommentaireScreen::class)
    ->name('platform.commentaires')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Commentaires'), route('platform.commentaires')));

Route::screen('commentaires/{commentaire}/edit', CommentaireEditScreen::class)
    ->name('platform.commentaire.edit')
    ->breadcrumbs(fn (Trail $trail, $commentaire) => $trail
        ->parent('platform.commentaires')
        ->push('Edit', route('platform.commentaire.edit', $commentaire)));

Route::screen('commentaires/{commentaire}/show', CommentaireShowScreen::class)
    ->name('platform.commentaire.show')
    ->breadcrumbs(fn (Trail $trail, $commentaire) => $trail
        ->parent('platform.commentaires')
        ->push('Show', route('platform.commentaire.show', $commentaire)));

// TypeContenu
Route::screen('typecontenus', TypecontenuScreen::class)
    ->name('platform.typecontenus')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Type Contenus'), route('platform.typecontenus')));

Route::screen('typecontenus/{typecontenu}/edit', TypecontenuEditScreen::class)
    ->name('platform.typecontenu.edit')
    ->breadcrumbs(fn (Trail $trail, $typecontenu) => $trail
        ->parent('platform.typecontenus')
        ->push('Edit', route('platform.typecontenu.edit', $typecontenu)));

Route::screen('typecontenus/{typecontenu}/show', TypecontenuShowScreen::class)
    ->name('platform.typecontenu.show')
    ->breadcrumbs(fn (Trail $trail, $typecontenu) => $trail
        ->parent('platform.typecontenus')
        ->push('Show', route('platform.typecontenu.show', $typecontenu)));

// TypeMedias
Route::screen('typemedias', TypemediaScreen::class)
    ->name('platform.typemedias')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Type Medias'), route('platform.typemedias')));

Route::screen('typemedias/{typemedia}/edit', TypemediaEditScreen::class)
    ->name('platform.typemedia.edit')
    ->breadcrumbs(fn (Trail $trail, $typemedia) => $trail
        ->parent('platform.typemedias')
        ->push('Edit', route('platform.typemedia.edit', $typemedia)));

Route::screen('typemedias/{typemedia}/show', TypemediaShowScreen::class)
    ->name('platform.typemedia.show')
    ->breadcrumbs(fn (Trail $trail, $typemedia) => $trail
        ->parent('platform.typemedias')
        ->push('Show', route('platform.typemedias.show', $typemedia)));

// Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Example screens
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example Screen'));

Route::screen('/examples/form/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/examples/form/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/examples/form/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/examples/form/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/examples/grid', ExampleGridScreen::class)->name('platform.example.grid');
Route::screen('/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');
