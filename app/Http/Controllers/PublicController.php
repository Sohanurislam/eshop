<?php

namespace App\Http\Controllers;

use App\Category;
use App\Notifications\ProductReviewed;
use App\Product;
use App\Size;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PublicController extends Controller
{
    public function index($categoryId = null)
    {
//        dd(auth()->user()->unreadNotifications);
//        dd(auth()->user()->unreadNotifications[0]->data['message']);

        $productIds = Cookie::get('productIds');
        $productsInCart = [];
        if(!is_null($productIds)){
            $productsInCart = unserialize($productIds);
        }



        $categories = Category::all();
        $sizes =Size::all();

        $query = new Product();

        if (\request('keyword')){
            $query = $query->where('title', 'like', '%'.\request('keyword').'%');
        }

        if (!is_null($categoryId)){
            $products = $query->where('category_id',$categoryId)->paginate(9);
        }else{
            $products = $query->paginate(9);
        }


        return view('frontend.index',compact('categories','products', 'sizes','productsInCart'));
    }

    public function show(Product $product)
    {
//        dd($product);
        $sizes =Size::all();
        $categories = Category::all();

        return view('frontend.product_details',compact('categories','product','sizes'));
    }

    public function review(Request $request, Product $product)
    {
        $product->comments()->create([
            'body'=>$request->body,
            'user_id'=>auth()->user()->id,
        ]);

        $user = User::where('email','sohanurislam280028@gmail.com')->first();

        $user->notify(new ProductReviewed($product));


        return redirect()->back();
    }


}
