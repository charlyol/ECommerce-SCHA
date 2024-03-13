<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show(string $uuid)
    {
        $book = Book::where('id', $uuid)->firstOrFail();
        $comment = $book->comment()->first();
        $comments = $comment ? $comment->commentByBook($book) : null;
        return view('books.show', compact('book', 'comments'));
    }
    public function create()
    {
        return view('books.create');
    }


    public function store()
    {
        return view('books.store');
    }
}
