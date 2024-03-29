<?php

namespace App\Http\Controllers;

use App\Models\Book;

class CatalogController extends Controller
{
    public function index()
    {
        $catalog = Book::inRandomOrder()->paginate(9);
        return view('catalog.index', ['catalog' => $catalog]);
    }
}
