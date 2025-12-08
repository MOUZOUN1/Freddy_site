<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Langue extends Model
{
    protected $fillable = ['nomlangue', 'codelangue', 'description'];

    public function utilisateurs(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function contenus(): HasMany
    {
        return $this->hasMany(Contenu::class);
    }

    public function parlers(): HasMany
    {
        return $this->hasMany(Parler::class);
    }
}
