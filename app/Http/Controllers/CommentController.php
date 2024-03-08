<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CommentController extends Controller
{
    public function widgetByBook (Book $book) {
        $book=Comment::all()->random()->book;
        $comments=Comment::where('book_id', $book->id)->paginate(3);
        return $comments;
    }
    public function widgetByUser (User $user) {
        // $user=Comment::all()->random()->user; // fake user to test stuff
        $comments=Comment::where('user_id', $user->id)->paginate(3);
        return $comments;
    }
    public function widgetByAuthor (User $user) {
        $books=Book::with('comment')->whereHas('user',function (Builder $query) use ($user){
            $query->where('id',	$user->id);
        })->get();
        $booksIds=$books->pluck('id');
        $comments = Comment::whereIn('book_id', $booksIds)->paginate(3);
        return $comments;
    }
}
