<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Order extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'order_ref',
        'status'
    ];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id','users');
    }
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
