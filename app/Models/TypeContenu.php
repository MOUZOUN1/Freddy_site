<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeContenu extends Model
{
     protected $table = 'typecontenus';
    protected $fillable = ['libelle'];

    public function contenus(): HasMany
    {
        return $this->hasMany(Contenu::class);
    }
}
