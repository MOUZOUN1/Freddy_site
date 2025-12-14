<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_subscribed',
        'subscription_ends_at',
        'subscription_type',
        'email_verified',
        'verification_token',
        'two_factor_code',
        'two_factor_expires_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_code',
        'verification_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
        'is_subscribed' => 'boolean',
        'email_verified' => 'boolean',
        'subscription_ends_at' => 'datetime',
        'two_factor_expires_at' => 'datetime',
    ];

    // Relations
    public function contenus()
    {
        return $this->hasMany(Contenu::class, 'utilisateur_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'utilisateur_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function activeSubscription()
    {
        return $this->hasOne(Subscription::class)
                    ->where('status', 'active')
                    ->where('ends_at', '>', Carbon::now());
    }

    // Méthodes utiles
    public function isAdmin()
    {
        return $this->is_admin === true;
    }

    public function hasActiveSubscription()
    {
        return $this->is_subscribed && 
               $this->subscription_ends_at && 
               $this->subscription_ends_at > Carbon::now();
    }

    public function generateTwoFactorCode()
    {
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = Carbon::now()->addMinutes(10);
        $this->save();

        return $this->two_factor_code;
    }

    public function resetTwoFactorCode()
    {
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    public function verifyTwoFactorCode($code)
    {
        return $this->two_factor_code === $code && 
               $this->two_factor_expires_at > Carbon::now();
    }
}