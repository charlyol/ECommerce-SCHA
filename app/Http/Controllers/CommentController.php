<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function widgetByBook (Book $book) {
        $book=Comment::all()->random()->book;
        $comments=$book->comment;
        return view('comments.byBook.widget', compact('comments'));
    }
    public function widgetByUser (User $user) {
        $user=Comment::all()->random()->user;
        $comments=$user->comment;
        return view('comments.byUser.widget', compact('comments'));
    }
}
