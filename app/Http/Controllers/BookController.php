<?php

namespace App\Http\Controllers;

use App\Models\AgeClass;
use App\Models\Book;
use App\Models\Saga;
use App\Models\User;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

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
        $user= $request->user();
        $saga= $request->sagaId;
        $ageClass= $request->age_class_id;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->summary = $request->summary;
        $book->size = $request->size;
        $book->stock = $request->stock;
        $book->page_quantity = $request->page_quantity;
        $book->price_wt = $request->price_wt;
        $book->weight = $request->weight;
        $book->age_class_id =$ageClass;
        $book->saga_id = $saga;
        $book->save();
        $book->user()->attach($user);
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
        return redirect(route('books.show',
            ['id'=>$book->id ,
            'book'=> $book]));

    }
}
