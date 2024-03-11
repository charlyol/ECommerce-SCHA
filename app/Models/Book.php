<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasUuids;
    use HasFactory;
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'books_has_categories');
    }
    public function image(): BelongsToMany
    {
        return $this->belongsToMany(Image::class,'books_has_images');
    }
    public function ageClass(): BelongsTo
    {
        return $this->belongsTo(AgeClass::class);
    }
    public function saga(): BelongsTo
    {
        return $this->belongsTo(Saga::class);
    }
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'books_has_users');
    }
    public function authorByBook(Book $book)
    {
        // $book=Book::first();// faker
        $authors=$book->user()->get();
        return $authors;
    }
    public function coverByBook () {
        $images=$this->image()->where('type', 'cover')->get()->pluck('path');
        return $images;
    }
}
