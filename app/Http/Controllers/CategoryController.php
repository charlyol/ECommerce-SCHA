<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::pluck('name');

        return view('components.footer', compact('categories'));
    }
    public function sort(Request $request)
    {
        $sort = $request->input('sort', 'name');
        $categories = Category::orderBy($sort)->get();

        return view('categories.index', compact('categories'));
    }
}
