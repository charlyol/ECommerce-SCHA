<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function show(string $uuid)
    {
        $book = Book::where('id', $uuid)->firstOrFail();
        return view('books.show', compact('book'));
    }

    public function create(): View
    {
        return view('books.create');
    }


    public function store(Request $request)
    {
$book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->summary = $request->summary;
        $book->size = $request->size;
        $book->stock = $request->stock;
        $book->page_quantity = $request->page_quantity;
        $book->price_wt = $request->price_wt;
        $book->weight = $request->weight;
        $book->age_class_id = $request->age_class_id;
        $book->saga_id = $request->saga_id;
        $book->save();

//        Book::create($request->only([
//            'title' => 'required',
//            'author' => 'nullable',
//            'summary' => 'required',
//            'description' => 'required',
//            'size' => 'required',
//            'stock' => 'required',
//            'page_quantity' => 'required',
//            'price_wt' => 'required',
//            'weight' => 'required',
//            'age_class_id' => 'required',
//            'saga_id' => 'required',
//        ]));
        return $book;

    }
}
