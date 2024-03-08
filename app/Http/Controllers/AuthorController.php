<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Saga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;

class AuthorController extends Controller
{
    public function authorBySaga(Saga $saga)
    {
        //$saga=Saga::first(); // faker
        $authors=Book::with('user')->where('saga_id', $saga->id)->get()
        ->map(function($book) {
            $userId=$book->user()->pluck('id');
            return User::where('id', $userId)->first();});
        return $authors;
    }
    public function dataByAuthor(string $firstName, string $lastName)
    {
        $user = User::where("first_name", "=", $firstName)
            ->where("last_name", "=", $lastName)->first();
            
        $books = Book::with('comment')->whereHas('user', function (Builder $query) use ($user) {
            $query->where('id',$user->id);
        })->paginate(3);

        $comments = Comment::first()->commentByAuthor($user);
        return view('catalog.byAuthor', compact('user','books', 'comments'));
    }
}
