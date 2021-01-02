@extends('frontend.layouts.master')

@section('content')

    <div class="card card-body container margin-top-20 mb-3">
       <div class="card card-body ">

           @include('frontend.layouts.elements.message')

           <h2>Confirm Items</h2>
        <hr>
          <div class="row">
              <div class="col-md-7 border-right">
                  @foreach(\App\Cart::totalCarts() as $cart)
                      <p>
                          {{ $cart->product->title }} -
                          <strong>{{ $cart->product->price }} TK</strong>
                          - {{ $cart->product_quantity }} Item
                      </p>
                  @endforeach
              </div>
              <div class="col-md-5">
                  @php
                      $total_price = 0;
                  @endphp
                  @foreach(\App\Cart::totalCarts() as $cart)
                      @php
                         $total_price += $cart->product->price * $cart->product_quantity;
                      @endphp
                  @endforeach
                  <p>Total price : <strong>{{ $total_price }}</strong> Taka</p>
                  <p>Total price With Shipping Cost : <strong>{{ $total_price + \App\Setting::first()->shipping_cost }}</strong> Taka</p>
              </div>
          </div>
           <p>
               <a href="{{ route('carts') }}">Change Carts items</a>
           </p>
       </div>

        <div class="card card-body mt-2 mb-4">
        <h2>Shipping Address</h2>

            <form method="POST" action="{{ route('checkouts.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Receiver Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::check() ? Auth::user()->name : '' }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                    <div class="col-md-6">
                        <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ Auth::check() ? Auth::user()->number : '' }}" required autocomplete="phone_no">

                        @error('phone_no')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="shipping_address" class="col-md-4 col-form-label text-md-right">Shipping Address</label>
                    <div class="col-md-6">
                        <textarea name="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" required autocomplete="shipping_address"></textarea>

                        @error('shipping_address')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="message" class="col-md-4 col-form-label text-md-right">Additional Message(Optional)</label>
                    <div class="col-md-6">
                        <textarea name="message" class="form-control @error('message') is-invalid @enderror"></textarea>

                        @error('message')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="payment_method" class="col-md-4 col-form-label text-md-right">Payment Method</label>
                    <div class="col-md-6">
                        <select class="form-control" name="payment_method_id" required id="payments">
                            <option value="">Select a payment method</option>
                            @foreach($payments as $payment)
                                <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                            @endforeach
                        </select>

                        @foreach($payments as $payment)
{{--                            <div id="paymentDiv" class="hidden">--}}
                                @if($payment->short_name == "cash_in")
                                <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden">
                                        <h3>
                                            For Cash in Delivery is nothing necessary. Just click Finish Order.
                                            <br>
                                            <small>
                                                you will get your product in tw or three business days.
                                            </small>
                                        </h3>
                                    </div>
                                @else
                                       <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden">                                        <h3>{{ $payment->name }} Payment</h3>
                                           <p>
                                               <strong>{{ $payment->name }} No :  {{$payment->no}}</strong>
                                               <br>
                                               <strong>Account Type : {{ $payment->type }}</strong>
                                           </p>
                                           <div class="alert alert-success">
                                               Please send the above money to this Bkash no and write your transaction code below there..
                                           </div>
                                       </div>

                                @endif
                        @endforeach
                        <input type="text" name="transaction_id" id="transaction_id" class="hidden" placeholder="Enter transaction code">

                    </div>

              </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Order Now
                        </button>
                    </div>
                </div>
            </form>

       </div>
    </div>

@endsection

<style>
    .hidden{
        display: none;
    }
    /*html{*/
    /*    height: 100%;*/
    /*}*/

    /*body{*/
    /*    position: relative;*/
    /*    min-height: 100%;*/
    /*}*/
    /*footer{*/
    /*    padding: 20px;*/
    /*    margin-top: 20px;*/
    /*    position: absolute;*/
    /*    right: 0;*/
    /*    left: 0;*/
    /*    bottom: 0;*/
    /*}*/
</style>

@push('scripts')
    <script type="text/javascript">
        $("#payments").change(function (){
            $payment_method = $("#payments").val();
            if ($payment_method == "cash_in"){
                $("#payment_cash_in").removeClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#payment_rocket").addClass('hidden');
            }else if ($payment_method == "bkash"){
                $("#payment_bkash").removeClass('hidden');
                $("#payment_cash_in").addClass('hidden');
                $("#payment_rocket").addClass('hidden');
                $("#transaction_id").removeClass('hidden');
            }else if ($payment_method == "rocket"){
                $("#payment_rocket").removeClass('hidden');
                $("#payment_cash_in").addClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#transaction_id").removeClass('hidden');
            }
        })
    </script>
@endpush
