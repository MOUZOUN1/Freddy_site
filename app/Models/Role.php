<?php

namespace Orchid\Platform\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Platform\Concerns\Access;

class Role extends Model
{
    use HasFactory, Access;

    /**
     * The table associated with the model.
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'name',
        'permissions',
    ];

    /**
     * Cast attributes.
     */
    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * Get all users for this role.
     */
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'role_users', 'role_id', 'user_id');
    }
}
