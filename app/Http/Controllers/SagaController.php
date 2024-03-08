<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Saga;

class SagaController extends Controller
{
    public function index(string $uuid)
    {
        $saga = Saga::where('id', $uuid)->firstOrFail();
        $books=$saga->booksBySaga($uuid);
        return view('sagas.index', compact('books','saga'));


    }

    public function collection(string $uuid)
    {
        $saga = Saga::join('books', 'sagas.id', '=', 'books.saga_id')
            ->select('sagas.*')
            ->where('books.saga_id', $uuid)
            ->get();
        return view('sagas.index', compact('saga'));
    }


}
