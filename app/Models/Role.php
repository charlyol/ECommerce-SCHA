<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory,  HasUuids;
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
    public function permission(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permissions_has_roles');
    }

}
