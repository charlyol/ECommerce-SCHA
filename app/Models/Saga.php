<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Saga extends Model
{
    use HasFactory;
    use HasUuids;

    public function book(): HasMany
    {
        return $this->hasMany(Book::class);
    }
    public function booksBySaga(string $uuid)
    {
    $books=Book::where('saga_id',$uuid)->get();
    return $books;
    }
}

