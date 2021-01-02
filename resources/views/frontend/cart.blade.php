{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}

{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}

{{--    <title>Shop Item - Start Bootstrap Template</title>--}}

{{--    <!-- Bootstrap core CSS -->--}}
{{--    <link href="{{ asset('ui/frontend/users') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}

{{--    <!-- Custom styles for this template -->--}}
{{--    <link href="{{ asset('ui/frontend/users') }}/css/shop-item.css" rel="stylesheet">--}}
{{--    <script--}}
{{--        src="https://code.jquery.com/jquery-3.5.1.js"--}}
{{--        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="--}}
{{--        crossorigin="anonymous"></script>--}}
{{--</head>--}}

{{--<body>--}}

{{--<!-- Navigation -->--}}
{{--@include('frontend.layouts.partials.top-bar')--}}
{{--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">--}}
{{--    <div class="container">--}}
{{--        <a class="navbar-brand" href="{{ route('index') }}">ESHOP</a>--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarResponsive">--}}
{{--            <ul class="navbar-nav ml-auto">--}}
{{--                <li class="nav-item active">--}}
{{--                    <a class="nav-link" href="{{ route('index') }}">Home--}}
{{--                        <span class="sr-only">(current)</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">About</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Services</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Contact</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('cart') }}">Cart</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

{{--<!-- Page Content -->--}}
{{--< class="container">--}}

{{--    <div class="row">--}}

{{--        <div class="col-lg-3">--}}
{{--            <h1 class="my-4">Shopping Cart</h1>--}}
{{--            <div class="list-group">--}}
{{--                @foreach($categories as $category)--}}
{{--                    <a href="{{ url('/'.$category->id) }}" class="list-group-item">{{$category->title}}</a>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- /.col-lg-3 -->--}}
{{--        {!! Form::open([--}}
{{--                       'route'=>'orders.cart',--}}

{{--                     ]) !!}--}}
{{--<div class="row">--}}
{{--        <div class="form-group ">--}}
{{--        @foreach($products as $key => $product)--}}

{{--        <div class="form-group">--}}
{{--            <label for="name" >Product Name</label>--}}
{{--                <input type="text" name="product_name[]"  class="form-control" value="{{ $product->title  }}" >--}}
{{--                <input type="hidden" name="product_id[]"  class="form-control" value="{{ $product->id  }}" >--}}
{{--        </div>--}}



{{--                <div class="form-group ">--}}
{{--                    <label for="">Select Size</label>--}}

{{--                    <div class="form-group">--}}

{{--                        <select name="title" id="postOffice" class="form-control" value="{{ old('sizes') }}" >--}}
{{--                            <option value="">Select one</option>--}}
{{--                            @foreach($sizes as $key => $size)--}}

{{--                                <option value="">{{ $size->title }} </option>--}}
{{--                                {{ $size }}--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}



{{--                         <div class="form-group">--}}
{{--            <label for="sizes" >Select Size</label>--}}
{{--                <input type="text" name="size"  class="form-control" value="{{ $product->size }}" >--}}
{{--                <input type="hidden" name="product_id[]"  class="form-control" value="{{ $product->id  }}" >--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="price" >Price</label>--}}
{{--                <input type="number" name="unit_price[]"  class="form-control"  value="{{ $product->price }}" >--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="quantity" >Quantity</label>--}}
{{--            {!! Form::number('quantity[]', 1, [--}}
{{--                    'class'=>'form-control',--}}
{{--                    'id'=> 'quantity'--}}
{{--              ]) !!}--}}
{{--            <label for="quantity" >Quantity</label>--}}
{{--                <input type="number" name="quantity[]" id="quantity{{$key}}" class="form-control" value="1" >--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="discount" >Discount</label>--}}
{{--            <input type="text" name="discount[]"  class="form-control" value="{{ $product->discount }}" >--}}
{{--        </div>--}}


{{--        <div class="form-group">--}}
{{--            <label for="email" >Total Price</label>--}}
{{--                <input type="text" name="grand_total[]" id="grand_total{{ $key }}" class="form-control" value="{{ $product->price }}" >--}}
{{--            <input type="hidden" name="baseprice" value="{{ $product->price }}">--}}
{{--              <input type="hidden" name="price" value="{{ $product->price }}">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="remove" >Remove</label>--}}
{{--                <a class="btn btn-danger" href="{{ route('carts.remove_product', $product->id) }}">X</a>--}}
{{--        </div>--}}


{{--                <script>--}}
{{--                    $('#quantity{{$key}}').on('blur', function (){--}}
{{--                        var quantity = $(this).val();--}}
{{--                        var baseprice = $('input[name=baseprice]').val();--}}
{{--                        console.log(quantity)--}}
{{--                        console.log(baseprice)--}}
{{--                        var price = quantity*baseprice;--}}
{{--                        $('#price').val('')--}}
{{--                        $('#price').val(price)--}}
{{--                        $('#grand_total{{$key}}').val('')--}}
{{--                        $('#grand_total{{$key}}').val(price)--}}
{{--                        console.log($('#grand_total{{ $key }}').val())--}}

{{--                    })--}}
{{--                </script>--}}


{{--            @endforeach--}}
{{--    </div>--}}


{{--        <div class="col-lg-9">--}}
{{--            <table class="table table-striped my-4">--}}
{{--                <thead>--}}
{{--                        <tr>--}}
{{--                            <td>SL#</td>--}}
{{--                            <td>Product Name</td>--}}
{{--                            <td>Price</td>--}}
{{--                            <td>Quantity</td>--}}
{{--                            <td>Total</td>--}}
{{--                            <td>Remove</td>--}}
{{--                        </tr>--}}
{{--                </thead>--}}

{{--                <tbody>--}}
{{--                @foreach($products as $product)--}}
{{--                        <tr>--}}
{{--                            <td>{{ $loop->iteration }}</td>--}}
{{--                            <td>{{ $product->title }} </td>--}}
{{--                            <td>{{ $product->price }}</td>--}}
{{--                            <td>--}}
{{--                                {!! Form::number('quantity', 1, [--}}
{{--                                    'class'=>'form-control',--}}
{{--                                 ]) !!}--}}
{{--                            </td>--}}
{{--                            <td id="price">{{ $product->price }}</td>--}}
{{--                            <input type="hidden" name="baseprice" value="{{ $product->price }}">--}}
{{--                            <input type="hidden" name="price" value="{{ $product->price }}">--}}
{{--                            <td>--}}
{{--                                <a class="btn btn-danger" href="{{ route('carts.remove_product', $product->id) }}">X</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}


{{--@if(count($products)>0)--}}
{{--            {!! Form::button('Place Order',[--}}
{{--                        'class'=>"btn btn-primary",--}}
{{--                       'type'=>'submit',--}}
{{--                       'method'=>'post',--}}
{{--                     ]) !!}--}}
{{--            <button class="btn btn-primary" >Place Order</button>--}}

{{--            {!! Form::close() !!}--}}
{{--@endif--}}

{{--    </div>--}}


{{--        </div>--}}
{{--        <!-- /.col-lg-9 -->--}}



{{--</div>--}}
{{--<!-- /.container -->--}}

{{--<!-- Footer -->--}}
{{--@include('frontend.layouts.partials.footer')--}}


{{--<!-- Bootstrap core JavaScript -->--}}
{{--<script src="{{ asset('ui/frontend/users') }}/vendor/jquery/jquery.min.js"></script>--}}
{{--<script src="{{ asset('ui/frontend/users') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}

{{--</body>--}}

{{--</html>--}}
{{--<script>--}}
{{--    $('input[name=quantity]').on('blur', function (){--}}
{{--        var quantity = $(this).val();--}}
{{--        var baseprice = $('input[name=baseprice]').val();--}}
{{--        console.log(quantity)--}}
{{--        console.log(baseprice)--}}
{{--        var price = quantity*baseprice;--}}
{{--        $('#price').val('')--}}
{{--        $('#price').val(price)--}}
{{--        $('input[name=grand_total]').val('')--}}
{{--        $('input[name=grand_total]').val(price)--}}
{{--        console.log($('input[name=price]').val())--}}

{{--    })--}}
{{--</script>--}}

