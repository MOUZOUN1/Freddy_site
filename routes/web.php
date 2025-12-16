<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContentController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Auth\TwoFactorController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ContenuController;
use App\Http\Controllers\Backend\LangueController;
use App\Http\Controllers\Backend\MediaController;
use App\Http\Controllers\Backend\RegionController;
use App\Http\Controllers\Backend\CommentaireController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\TypeMediaController;
use App\Http\Controllers\Backend\TypeContenuController;
use App\Http\Controllers\SubscriptionController;

// Page de bienvenue
Route::get('/', fn() => view('welcome'))->name('welcome');

// Frontend public
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/content/{id}', [ContentController::class, 'show'])->name('content.show');
Route::post('/content/{id}/comment', [ContentController::class, 'storeComment'])
    ->name('content.comment')
    ->middleware('auth');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [CustomAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [CustomAuthController::class, 'login']);
    Route::get('/register', [CustomAuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [CustomAuthController::class, 'register']);
});

// Email verification
Route::get('/verify-email/{token}', [EmailVerificationController::class, 'verify'])->name('email.verify');

// Two-Factor Authentication
Route::middleware('auth')->group(function () {
    Route::get('/two-factor', [TwoFactorController::class, 'show'])->name('two-factor.verify');
    Route::post('/two-factor', [TwoFactorController::class, 'verify']);
    Route::post('/two-factor/resend', [TwoFactorController::class, 'resend'])->name('two-factor.resend');
});

// Protected frontend routes
Route::middleware(['auth', 'two-factor'])->group(function () {
    Route::get('/profile', [CustomAuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [CustomAuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');

    // Premium content
    Route::middleware('subscribed')->group(function () {
        Route::get('/content/premium/{id}', [ContentController::class, 'showPremium'])->name('content.premium');
    });

    // Subscription
    Route::get('/subscription/plans', [SubscriptionController::class, 'plans'])->name('subscription.plans');
    Route::post('/subscription/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscription.subscribe');
    Route::get('/subscription/callback', [SubscriptionController::class, 'callback'])->name('subscription.callback');
    Route::get('/subscription/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
});

// Backend/Admin routes
Route::middleware(['auth', 'two-factor', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Resource routes
    Route::resources([
        'users' => UserController::class,
        'contenus' => ContenuController::class,
        'langues' => LangueController::class,
        'media' => MediaController::class,
        'regions' => RegionController::class,
        'commentaires' => CommentaireController::class,
        'roles' => RoleController::class,
        'typemedia' => TypeMediaController::class,
        'typecontenus' => TypeContenuController::class,
    ]);
});
