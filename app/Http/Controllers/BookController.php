<?php

namespace App\Http\Controllers;

use App\Models\AgeClass;
use App\Models\Book;

use App\Models\Saga;
use App\Models\User;
use Faker\Core\Uuid;

use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function show(string $uuid)
    {
        $book = Book::where('id', $uuid)->firstOrFail();
        $comment = $book->comment()->first();
        $comments = $comment ? $comment->commentByBook($book) : null;
        return view('books.show', compact('book', 'comments'));
    }


    public function create(): View

    {
        return view('books.create');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'price_wt' => $request->input('price_wt')
        ]);
        return redirect()->route('list.edit')->with('success', 'Book updated successfully');
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

        return redirect(route('books.show',
            ['id'=>$book->id ,
            'book'=> $book]));

    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('list.edit')->with('success', 'Book deleted successfully');
    }

}
