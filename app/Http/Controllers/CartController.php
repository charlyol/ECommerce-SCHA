<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class CartController extends Controller
{
    public function view()
    {
//        $order= OrderItem::where("order_id", "=", '9b7ff8d7-0f2e-48c3-8f7e-17311a0cbfeb')
//            ->innerJoin("orders", function($join){
//                $join->on("orders.id", "=", "order_items.order_id");
//            })
//->get();
        $subtotal = 0;
        $total = 0;
        $portShip = 5;
        $tax = 10;
        $orderItems= Orderitem::where('order_id','9b7ff8d7-0f2e-48c3-8f7e-17311a0cbfeb')->get();
        $order= Order::where('id','9b7ff8d7-0f2e-48c3-8f7e-17311a0cbfeb')->get();
      foreach ($orderItems as $command){
          $subtotal = $subtotal + $command->price_wt;
      $total = $subtotal + $portShip + $tax;}
        return view('Cart.index', compact('order', 'orderItems', 'total', 'subtotal','portShip','tax'));
    }
}
