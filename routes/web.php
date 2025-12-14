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
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Frontend public
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/content/{id}', [ContentController::class, 'show'])->name('content.show');
Route::post('/content/{id}/comment', [ContentController::class, 'storeComment'])->name('content.comment')->middleware('auth');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [CustomAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [CustomAuthController::class, 'login']);
    Route::get('/register', [CustomAuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [CustomAuthController::class, 'register']);
});

// Email Verification
Route::get('/verify-email/{token}', [EmailVerificationController::class, 'verify'])->name('email.verify');

// Two Factor Authentication
Route::middleware('auth')->group(function () {
    Route::get('/two-factor', [TwoFactorController::class, 'show'])->name('two-factor.verify');
    Route::post('/two-factor', [TwoFactorController::class, 'verify']);
    Route::post('/two-factor/resend', [TwoFactorController::class, 'resend'])->name('two-factor.resend');
});

// Protected Frontend Routes (Authenticated users)
Route::middleware(['auth', 'two-factor'])->group(function () {
    Route::get('/profile', [CustomAuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [CustomAuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');
    
    // Premium Content (requires subscription)
    Route::middleware('subscribed')->group(function () {
        Route::get('/content/premium/{id}', [ContentController::class, 'showPremium'])->name('content.premium');
    });
});

// Subscription Routes
Route::middleware(['auth', 'two-factor'])->group(function () {
    Route::get('/subscription/plans', [SubscriptionController::class, 'plans'])->name('subscription.plans');
    Route::post('/subscription/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscription.subscribe');
    Route::get('/subscription/callback', [SubscriptionController::class, 'callback'])->name('subscription.callback');
    Route::get('/subscription/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
});

// Backend/Admin Routes
Route::middleware(['auth', 'two-factor', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Resource routes for all entities
    Route::resource('users', UserController::class);
    Route::resource('contenus', ContenuController::class);
    Route::resource('langues', LangueController::class);
    Route::resource('media', MediaController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('commentaires', CommentaireController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('typemedia', TypeMediaController::class);
    Route::resource('typecontenus', TypeContenuController::class);
});