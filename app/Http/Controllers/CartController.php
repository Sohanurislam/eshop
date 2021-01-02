<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function index()
    {
        return view('frontend.carts');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required'
        ],
        [
            'product_id.required'=> 'Please give a product'
        ]);
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();
        }else{

        }

        if (!is_null($cart)){
            $cart->increment('product_quantity');
        }else{
            $cart = new Cart();
        if (Auth::check()) {
            $cart->user_id = Auth::id();
        }
            $cart->product_id = $request->product_id;
            $cart->save();
        }
//            session()->flash('success', 'product has added to cart !!');

            return back()->withStatus('Added To Cart was successful!');

    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        if (!is_null($cart)){
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
        }else{
            return redirect()->route('carts');
        }
        return back()->withStatus('Cart Update was successful!');
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        if (!is_null($cart)){
            $cart->delete();
        }else{
            return redirect()->route('carts');
        }
        return back()->withStatus('Delete was successful!');
    }


    public function shoppingCart()
    {
//        $sizes = Size::all();

        $productIds = Cookie::get('productIds');
        $products = [];
        if(!is_null($productIds)){
            $productIds = unserialize($productIds);
            $products = Product::whereIn('id', $productIds)->get();
        }

        return view('frontend.cart',compact('products'));
    }

    public function removeFromCart($productId)
    {

        $productIds = Cookie::get('productIds');
//        $products = [];
        if(!is_null($productIds)){
            $productIds = unserialize($productIds);
            if (($key = array_search($productId, $productIds)) !== false) {
                unset($productIds[$key]);
                $data = serialize($productIds);
            }
            Cookie::queue(Cookie::forget('productIds'));
            Cookie::queue('productIds', $data , 3600*10);
            return redirect()->route('cart');
        }
    }

    public function addToCart(Request $request)
    {

        $productIds = Cookie::get('productIds');

        if(!is_null($productIds)){
            $productIds = unserialize($productIds);
        }

        if(is_array($productIds) && (count($productIds)>0)){

            if (!in_array($request->product_id, $productIds)){
                array_push($productIds, $request->product_id);
            }
            $data = serialize($productIds);
        }else{
            $data = serialize([$request->product_id]);
        }

        Cookie::queue('productIds', $data , 3600*10);

        return response()->json($productIds);
    }


}
