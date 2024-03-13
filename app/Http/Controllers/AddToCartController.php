<?php

namespace App\Http\Controllers;

use App\Http\Requests\UseCartRequest;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;
use Str;

class AddToCartController extends Controller
{
    public function addToCart(Request $request, Book $book)
    {
        $quantity = 1;
        $actualCart = $request->session()->get('cart');
        if (isset($actualCart) && array_key_exists($book->id, $actualCart)) {
            $actualCart[$book->id] += $quantity;
            $request->session()->put('cart', $actualCart);
        } else {
            $actualCart[$book->id] = $quantity;
            $request->session()->put('cart', $actualCart);
        }
        return redirect()->route('cart');
    }
    public function addToCartLong(UseCartRequest $request)
    {
        $validated=$request->validated();
        $bookId=request()->input('book_id');
        $book=Book::where('id', $bookId)->first();
        $quantity = request()->input('quantity');
        $actualCart = $request->session()->get('cart');
        if (isset($actualCart) && array_key_exists($bookId, $actualCart)) {
            $actualCart[$bookId] += $quantity;
            $actualCart[$bookId] = ($actualCart[$bookId] > $book->stock) ? $book->stock : $actualCart[$bookId];
            $request->session()->put('cart', $actualCart);
        } else {
            $actualCart[$bookId] = $quantity;
            $request->session()->put('cart', $actualCart);
        }
        return redirect()->route('cart');
    }
    // public function aToCart(string $id, $quantity)
    // {
    //     $user = Auth::user();

    //     $order = new Order();
    //     $order->user_id = $user->id;
    //     $order->order_ref = date('d-m-Y');
    //     $order->status = 'waiting for confirmation';
    //     $order->created_at = now();
    //     $order->updated_at = now();
    //     $existingOrdersIds = Order::all()->pluck('id')->toArray();
    //     $order->id = (function () use ($existingOrdersIds) {
    //         $uuid = Uuid::uuid4()->toString();
    //         while (in_array($uuid, $existingOrdersIds)) {
    //             $uuid = Uuid::uuid4()->toString();
    //         }
    //         return $uuid;
    //     })();
    //     $order->save();

    //     $orderItem = new OrderItem();
    //     $existingOrderItemsIds = OrderItem::all()->pluck('id')->toArray();
    //     $orderItem->id = (function () use ($existingOrderItemsIds) {
    //         $uuid = Uuid::uuid4()->toString();
    //         while (in_array($uuid, $existingOrderItemsIds)) {
    //             $uuid = Uuid::uuid4()->toString();
    //         }
    //         return $uuid;
    //     })();;
    //     $orderItem->quantity = $quantity;
    //     $orderItem->price_wt = Book::where('id', $id)->first()->price_wt;
    //     $orderItem->title = Book::where('id', $id)->first()->title;
    //     $orderItem->created_at = now();
    //     $orderItem->updated_at = now();
    //     $orderItem->order_id = $order->id;
    //     $orderItem->save();
    //     return redirect()->route('cart', ['id' => $order->id]);
    // }
}
