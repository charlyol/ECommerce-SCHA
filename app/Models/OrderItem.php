<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'quantity',
        'price_wt',
        'title',
        'created_at',
        'updated_at',
        'order_id',
    ];
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
