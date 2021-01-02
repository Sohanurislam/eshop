<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Notifications\InvoiceOrder;
use App\Notifications\ProductReviewed;
use App\Order;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $payments = Payment::orderBy('priority', 'asc')->get();
        return view('frontend.checkouts',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
//            'phone_no' => 'required',
            'shipping_address' => 'required',
            'payment_method_id' => 'required',
        ]);
        $order = new Order();

        //check transaction id has given or not

        if ($request->payment_method_id != 'cash_in'){
            if ($request->transaction_id == NULL || empty($request->transaction_id)){
                session()->flash('sticky_error','Please give your transaction id for your payment');
                return back();
            }
        }
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone_no = $request->phone_no;
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;
        $order->transaction_id = $request->transaction_id;
        $order->user_id = Auth::id();
        $order->payment_id = Payment::where('short_name',$request->payment_method_id)->first()->id;
        $order->save();


        foreach (Cart::totalCarts() as $cart){
            $cart->order_id = $order->id;
            $cart->save();
        }

        $user = User::where('email','sohanurislam280028@gmail.com')->first();

        $user->notify(new InvoiceOrder($order));

        return redirect()->route('index')->withStatus('Your Order has Submitted!');
    }

}
