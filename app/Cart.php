<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'order_id', 'product_quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //total items cart
    public static function totalItems()
    {
        (Auth::check());
        $carts = Cart::orwhere('user_id', Auth::id())->get();

      $total_item = 0;
    foreach ($carts as $cart)
    {
       $total_item += $cart->product_quantity;
    }
    return $total_item;

    }

    //total  carts
    //total Cart model
    public static function totalCarts()
    {
        (Auth::check());
        $carts = Cart::orwhere('user_id', Auth::id())->get();

    return $carts;

    }
}
