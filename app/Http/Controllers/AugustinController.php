<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request as Req;
use Illuminate\Support\Arr;

use function PHPUnit\Framework\isNull;

class AugustinController extends Controller
{
    public function dataByAuthor (User $user) {
        $books=Book::with('comment')->whereHas('user',function (Builder $query){
            $query->where('id',	'9b818e29-9a07-422f-a40c-21d54313bb63');
        })->get();
        $booksIds=$books->pluck('id');
    $comments = Comment::whereIn('book_id', $booksIds)->paginate(3);

    return view('catalog.byAuthor', compact('books', 'comments'));
    }
}
