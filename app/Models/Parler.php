<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parler extends Model
{
    protected $fillable = ['langue_id', 'region_id'];

    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
