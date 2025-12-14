<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'starts_at',
        'ends_at',
        'status',
        'payment_reference'
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'amount' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function isActive()
    {
        return $this->status === 'active' && $this->ends_at > Carbon::now();
    }

    public function isExpired()
    {
        return $this->ends_at < Carbon::now();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')
                     ->where('ends_at', '>', Carbon::now());
    }
}