<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentaire extends Model
{
    protected $fillable = ['contenu', 'note', 'user_id', 'contenu_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function contenu(): BelongsTo
    {
        return $this->belongsTo(Contenu::class);
    }
}
