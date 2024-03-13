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
        $comments = $book->comment()->first()->commentByBook($book);
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
