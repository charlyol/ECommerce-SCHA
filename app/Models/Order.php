<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    use HasUuids;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id','users');
    }
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
