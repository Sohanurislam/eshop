<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Item - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('ui/frontend/users') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('ui/frontend/users') }}/css/shop-item.css" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
</head>

<body>

<!-- Navigation -->
@include('frontend.layouts.partials.top-bar')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 >My Orders</h4>

    </div>
    <div class="card-body">

        @include('frontend.layouts.elements.message')

        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                <thead>
                <tr>
{{--                    <th>SL#</th>--}}
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Order Amount</th>
                    <th>Order Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    @foreach($order->carts as $cart)
                        <tr>
                        <td>#Eshop{{ $order->id }}</td>
                        <td>
                            @foreach($order->carts as $cart)
                                {{ $cart->product->title }}
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->carts as $cart)
                            <img src="{{ asset('storage/images/'.$cart->product->picture) }}" width="100px">
                            @endforeach
                        </td>
                        <td>
{{--                                @php--}}
{{--                                    $total_price += $cart->product->price * $cart->product_quantity;--}}
{{--                                @endphp--}}
                                {{ $cart->product->price * $cart->product_quantity }} Tk
                        </td>
                    </tr>
                    @endforeach

                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

<!-- /.container -->

<!-- Footer -->
@include('frontend.layouts.partials.footer')


<!-- Bootstrap core JavaScript -->
<script src="{{ asset('ui/frontend/users') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('ui/frontend/users') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>





{{--@push('css')--}}
    <style>
        html{
            height: 100%;
        }

        body{
            position: relative;
            min-height: 100%;
        }
        footer{
            padding: 20px;
            margin-top: 20px;
            position: relative;
            right: 0;
            left: 0;
            bottom: 0;
        }
        .pointer{
            cursor: pointer;
        }
    </style>
{{--@endpush--}}

</body>
</html>
