<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show(string $uuid)
    {
        $book = Book::where('id', $uuid)->firstOrFail();
        return view('books.show', compact('book'));
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
