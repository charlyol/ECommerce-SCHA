<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class CartController extends Controller
{
    public function view()
    {
        $cartItems= session('cart');
        $orderItems=[];
        foreach ($cartItems as $bookId => $quantity) {
            $book=Book::where('id',$bookId)->first();
            $orderItems[$bookId]['quantity']=$quantity;
            $orderItems[$bookId]['book']=$book;
        }
        return view('Cart.index',compact('orderItems'));
    }
    public function delete(Request $request, $bookId)
    {
        $actualCart = $request->session()->get('cart');
        unset($actualCart[$bookId]);
        $request->session()->put('cart', $actualCart);
        $cartItems= session('cart');
        $orderItems=[];
        foreach ($cartItems as $bookId => $quantity) {
            $book=Book::where('id',$bookId)->first();
            $orderItems[$bookId]['quantity']=$quantity;
            $orderItems[$bookId]['book']=$book;
        }
        return view('Cart.index',compact('orderItems'));
    }
}
