<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AgeClass extends Model
{
    use HasUuids;
    use HasFactory;

    public function book(): HasMany
    {
        return $this->HasMany(Book::class);
    }
}
