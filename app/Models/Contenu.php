<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contenu extends Model
{

   


    // ou 'typecontenu' selon ton schéma

    protected $fillable = ['titre', 'texte', 'statut', 'typecontenu_id', 'region_id', 'langue_id', 'utilisateur_id', 'contenu_id'];

    public function typecontenu(): BelongsTo
    {
        return $this->belongsTo(TypeContenu::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class);
    }

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'utilisateur_id');
    }

    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Contenu::class, 'contenu_id');
    }

    public function enfants(): HasMany
    {
        return $this->hasMany(Contenu::class, 'contenu_id');
    }
}
