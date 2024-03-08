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
//    public function create (Request $request)
//    {
//        $request->validate([
//            'title' =>'required',
//            'description' => 'required'
//        ]);
//        $book = new Book();
//        $book->title = $request->input('title');
//        $book->description = $request->input('description');
//        $book->save();
//        return view()->route('books.create')-with('success', 'La BD a été ajoutée avec succès.');
//    }
}
