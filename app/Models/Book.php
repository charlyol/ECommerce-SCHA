<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasUuids;
    use HasFactory;
    public function category(): HasMany
    {
        return $this->hasMany(Book::class,'books_has_categories');
    }
    public function image(): HasMany
    {
        return $this->hasMany(Book::class,'books_has_images');
    }
    public function ageClass(): BelongsTo
    {
        return $this->belongsTo(AgeClass::class);
    }
    public function saga(): BelongsTo
    {
        return $this->belongsTo(Saga::class);
    }
}
