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
    public function dataByAuthor (string $firstName , string $lastName) {
        $user= User ::where("first_name", "=", $firstname)
        ->where("last_name", "=", $lastname)
        ->get();
        $books=Book::with('comment')->whereHas('user',function (Builder $query){
            $query->where('id',	$user->id);
        })->get();
        $booksIds=$books->pluck('id');
    $comments = Comment::whereIn('book_id', $booksIds)->paginate(3);

    return view('catalog.byAuthor', compact('books', 'comments'));
    }
}
