<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;

class AuthorController extends Controller
{
    public function dataByAuthor(string $firstName, string $lastName)
    {
        $user = User::where("first_name", "=", $firstName)
            ->where("last_name", "=", $lastName)->first();
        $books = Book::with('comment')->whereHas('user', function (Builder $query) use ($user) {
            $query->where('id',    $user->id);
        })->paginate(3);
        $commentController = new CommentController();
        $comments = $commentController->widgetByAuthor($user);
        return view('catalog.byAuthor', compact('books', 'comments'));
    }
}
