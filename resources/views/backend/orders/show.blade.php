@extends('backend.layouts.master')

@section('title', 'order show')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Show Orders #Eshop{{ $order->id }}</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Order Details</h6>
        <a class="btn btn-primary float-right" href="{{ route('orders.index') }}">Index</a>
        </div>
        <div class="card-body">

            @include('backend.layouts.elements.message')
            <h3>Order Information</h3>
            <div class="row">
                <div class="col-md-6 border-right">
                    <p><strong>Orderer Name : {{ $order->name }}</strong></p>
                    <p><strong>Orderer Email : {{ $order->email }}</strong></p>
                    <p><strong>Orderer Shipping Address : {{ $order->shipping_address }}</strong></p>
                    <p><strong>Orderer Additional Message : {{ $order->message }}</strong></p>
                </div>
                <div class="col-md-6">
                    <p> <strong>Orderer Payment Method : </strong> {{ $order->payment->name }}</p>
                    <p> <strong>Orderer Payment Transaction : </strong> {{ $order->transaction_id }}</p>
                </div>
            </div>
            <hr>
            <h3>Order Items :</h3>
            @if ($order->carts->count() >0)
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
            @foreach($order->carts as $cart)
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
            @endif

            <hr>

            <form action="{{ route('orders.completed',$order->id) }}" method="post" class="form-inline" style="display: inline-block ">
                @csrf
                @if($order->is_completed)
                    <input type="submit" value="Cancel Order" class="btn btn-danger">
                @else
                    <input type="submit" value="Completed Order" class="btn btn-success">
                @endif
            </form>

            <form action="{{ route('orders.paid',$order->id) }}" method="post" class="form-inline" style="display: inline-block">
                @csrf
                @if($order->is_paid)
                    <input type="submit" value="Cancel Payment" class="btn btn-danger">
                @else
                    <input type="submit" value="Paid Order" class="btn btn-success">
                @endif
            </form>

        </div>
    </div>
@endsection

@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('ui/backend') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('js')

    <!-- Page level plugins -->
    <script src="{{ asset('ui/backend') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('ui/backend') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('ui/backend') }}/js/demo/datatables-demo.js"></script>
@endpush
