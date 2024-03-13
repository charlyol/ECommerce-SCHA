<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    use HasUuids;

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id','users');

    }
    public function commentByBook (Book $book) {
        $comments=Comment::where('book_id', $book->id)->paginate(3);
        return $comments;
    }
    public function commentByUser (User $user) {
        // $user=Comment::all()->random()->user; // fake user to test stuff
        $comments=Comment::where('user_id', $user->id)->paginate(3);
        return $comments;
    }
    public function commentByAuthor (User $user) {
        $books=Book::with('comment')->whereHas('user',function (Builder $query) use ($user){
            $query->where('id',	$user->id);
        })->get();
        $booksIds=$books->pluck('id');
        $comments = Comment::whereIn('book_id', $booksIds)->paginate(3);
        return $comments;
    }
}
