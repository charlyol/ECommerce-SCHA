<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;

class AuthorController extends Controller
{
    public function dataByAuthor (User $user) {
        $books=Book::with('comment')->whereHas('user',function (Builder $query){
            $query->where('id',	'9b818e29-9a07-422f-a40c-21d54313bb63');
        })->get();
        $booksIds=$books->pluck('id');
    $comments = Comment::whereIn('book_id', $booksIds)->paginate(3);

    return view('catalog.byAuthor', compact('books', 'comments'));
    }
}
