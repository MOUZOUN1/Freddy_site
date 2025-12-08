<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentaire extends Model
{
    protected $fillable = ['contenu', 'note', 'utilisateur_id', 'contenu_id'];

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'utilisateur_id');
    }

    public function contenu(): BelongsTo
    {
        return $this->belongsTo(Contenu::class);
    }
}
