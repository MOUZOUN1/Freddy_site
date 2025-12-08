<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    protected $fillable = ['description', 'typemedia_id', 'contenu_id'];

    public function typemedia(): BelongsTo
    {
        return $this->belongsTo(Typemedia::class);
    }

    public function contenu(): BelongsTo
    {
        return $this->belongsTo(Contenu::class);
    }
}
