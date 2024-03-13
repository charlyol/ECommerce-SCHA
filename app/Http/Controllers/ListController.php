<?php


namespace App\Http\Controllers;

use \App\Models\Book;

class ListController extends Controller
{
    public function edit()
    {
        $catalog = Book::paginate(10);
        return view('auth.list', ['catalog' => $catalog]);
    }
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

}
