<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class CartController extends Controller
{
    public function view(string $uuid)
    {
        $subtotal = 0;
        $total = 0;
        $portShip = 5;
        $tax = 10;
        $orderItems= Orderitem::where('order_id',$uuid)->get();
        $order= Order::where('id',$uuid)->get();
      foreach ($orderItems as $command){
          $subtotal = $subtotal + $command->price_wt;
      $total = $subtotal + $portShip + $tax;}
        return view('Cart.index', compact('order', 'orderItems', 'total', 'subtotal','portShip','tax'));
    }
}
