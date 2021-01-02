@extends('frontend.layouts.master')
@section('content')
    <div class="container margin-top-20">
        <div class="card-body">

            @include('frontend.layouts.elements.message')

            <div class="card-header py-3">
                <h2>My Carts Item</h2>
                @if(\App\Cart::totalItems() >0)
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Product Quantity</th>
                            <th>Unit Price</th>
                            <th>Sub Total Price</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total_price = 0;
                        @endphp
                        @foreach(\App\Cart::totalCarts() as $cart)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('product_details', [$cart->product->id]) }}">{{ $cart->product->title }}</a></td>
                                <td>
                                    <img src="{{ asset('storage/images/'.$cart->product->picture) }}" width="100px">
                                </td>
                                <td>
                                    <form class="form-inline" action="{{ route('carts.update',$cart->id) }}" method="post">
                                        @csrf
                                        <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}">
                                        <button type="submit" class="btn btn-success ml-1">Update</button>
                                    </form>
                                </td>
                                <td>{{ $cart->product->price }} Tk</td>
                                <td>
                                    @php
                                        $total_price += $cart->product->price * $cart->product_quantity;
                                    @endphp
                                    {{ $cart->product->price * $cart->product_quantity }} Tk
                                </td>

                                <td>
                                    <form class="form-inline" action="{{ route('carts.destroy',$cart->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="cart_id">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"></td>
                            <td>
                                Total Amount:
                            </td>
                            <td colspan="2">
                                <strong>{{$total_price}} TK</strong>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                    <div class="float-right">
                        <a href="{{ route('index') }}" class="btn btn-info btn-lg">Continue Shopping..</a>
                        <a href="{{ route('checkouts') }}" class="btn btn-warning btn-lg">Check Out</a>
                    </div>
                @else
                    <div class="alert alert-warning">
                        <strong>There is no item in your carts.</strong>
                        <br>
                        <a href="{{ route('index') }}" class="btn btn-info btn-lg">Continue Shopping..</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

{{--<style>--}}
{{--    html{--}}
{{--        height: 100%;--}}
{{--    }--}}

{{--    body{--}}
{{--        position: relative;--}}
{{--        min-height: 100%;--}}
{{--    }--}}
{{--    footer{--}}
{{--        padding: 20px;--}}
{{--        margin-top: 20px;--}}
{{--        position: absolute;--}}
{{--        right: 0;--}}
{{--        left: 0;--}}
{{--        bottom: 0;--}}
{{--    }--}}
{{--</style>--}}
