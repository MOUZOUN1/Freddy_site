<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\ProfileController;

// CONTROLEURS BACKEND
use App\Http\Controllers\LanguesController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ContenusController;
use App\Http\Controllers\MediasController;
use App\Http\Controllers\CommentairesController;
use App\Http\Controllers\TypeContenusController;
use App\Http\Controllers\TypemediasController;
use App\Http\Controllers\ParlerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PaymentController;


Route::get('/payment/{heritage_id}', [PaymentController::class, 'showForm'])->name('payment.form');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::post('/payment/callback', [PaymentController::class, 'callback'])
    ->name('payment.callback.fedapay');





Route::get('/recherche', [SearchController::class, 'search'])->name('search');



// === PAGE D’ACCUEIL FRONTEND ===
 Route::get('/', function () {
        return view('frontend.home');
    })->name('dashboard');



// == AUTHENTIFICATION ==
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// === ROUTES 2FA ===
Route::middleware('auth')->group(function () {

    Route::get('/two-factor', [TwoFactorController::class, 'index'])
        ->name('verify.code');

    Route::post('/two-factor', [TwoFactorController::class, 'store'])
        ->name('verify.code.store');
});


// === TABLEAU DE BORD (après login, pas besoin twofactor encore) ===
Route::middleware('auth')->group(function () {

   

    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// === ROUTES FRONTEND ===








 Route::resource('contenus', App\Http\Controllers\ContenusController::class);


// Commentaires
Route::resource('commentaires', App\Http\Controllers\CommentairesController::class);


// Langues
Route::resource('langues', App\Http\Controllers\LanguesController::class);


// Roles
Route::resource('roles', App\Http\Controllers\RolesController::class);

Route::resource('utilisateurs', App\Http\Controllers\UtilisateursController::class);

Route::get('/pay', [PaymentController::class, 'pay'])->name('payment.pay');
Route::get('/callback', [PaymentController::class, 'callback'])->name('payment.callback');



require __DIR__.'/auth.php';
