<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $fillable = ['nom', 'description', 'localisation', 'superficie', 'population'];

    public function contenus(): HasMany
    {
        return $this->hasMany(Contenu::class);
    }

    public function parlers(): HasMany
    {
        return $this->hasMany(Parler::class);
    }
}
