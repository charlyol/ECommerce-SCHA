<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function sort($name)
    {
        $catalog = Category::where('name', $name)->first()->book()->paginate(9);

        return view('catalog.index', compact('catalog'));
    }


    public function search(Request $request)
    {
        $booksByCategory = Category::where('name', 'like', '%' . $request->input('search') . '%')->with('book')->first();

        if (!$booksByCategory) {
            return redirect()->route('categories.find');
        }

        $booksByCategory = $booksByCategory->book;

        return view('categories.find', compact('booksByCategory'));
    }

}
