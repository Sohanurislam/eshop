<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Product;
use App\Shipping;
use App\User;
use App\Http\Controllers\CartController;
use Cart;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function userOrder()
    {
        $user = Auth::user();
        $orders = Order::all();
        $products = Product::all();
        return view('frontend.users.myOrder',compact('user','orders','products'));
    }

    public function index()
    {
        $orders =Order::orderBy('id', 'desc')->get();
        return view('backend.orders.index',compact('orders'));
    }

    public function show($id)
    {
        $order =Order::find($id);
        $order->is_seen_by_admin = 1;
        $order->save();
        return view('backend.orders.show',compact('order'));
    }

    public function completed($id)
    {
        $order =Order::find($id);
        if ($order->is_completed){
            $order->is_completed = 0;
        }else{
            $order->is_completed = 1;
        }
        $order->save();
        return back()->withStatus('Your Order Completed Status Change!');
    }

    public function paid($id)
    {
        $order =Order::find($id);
        if ($order->is_paid){
            $order->is_paid = 0;
        }else{
            $order->is_paid = 1;
        }
        $order->save();
        return back()->withStatus('Your Order Paid Status Change!');
    }

    public function destroy(Order $order)
    {
        $order->carts()->delete();
        $order->payment()->delete();
        $order->delete();
        return back()->withStatus('Order has Deleted!');

    }

}

