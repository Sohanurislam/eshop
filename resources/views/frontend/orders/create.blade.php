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

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">ESHOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('index') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart') }}">Cart</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">Confirm Order</h1>
            {{--            <div class="list-group">--}}
            {{--                @foreach($categories as $category)--}}
            {{--                    <a href="{{ url('/'.$category->id) }}" class="list-group-item">{{$category->title}}</a>--}}
            {{--                @endforeach--}}
            {{--            </div>--}}

        </div>



        {!! Form::open([
              'route' => 'orders.shipping',
       ]) !!}
{{--        <form action="{{ route('orders.shipping')  }}" method="post">--}}


        <div class="form-group">

                <div class="form-group">
                    <label for="name" >Name</label>
                    <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}" >
                    @foreach($orderIds as $orderId)
                    <input type="hidden" name="order_id[]" class="form-control" value=" {{$orderId['order_id']}}" >
                    @endforeach
{{--                    <input type="hidden" name="categ">--}}

                </div>

                <div class="form-group">
                    <label for="email" >Email</label>
                    <input type="text" name="email"  class="form-control" value="{{auth()->user()->email}}" >
                </div>

                <div class="form-group">
                    <label for="number" >Number</label>
                    <input type="text" name="number"  class="form-control" value="{{auth()->user()->number}}" >
                </div>



            <div class="form-group">

            {!! Form::label('city', 'City') !!}<br>

            {!! Form::text('city',null,[
             'class'=>'form-control',
             'id'=>'city',
           ]) !!}
        </div>

        <div class="form-group">

            {!! Form::label('area', 'Area') !!}<br>

            {!! Form::text('area',null,[
             'class'=>'form-control',
             'id'=>'area',
           ]) !!}
        </div>


        <div class="form-group">

            {!! Form::label('address', 'Address') !!}<br>

            {!! Form::textarea('address',null,[
             'class'=>'form-control',
             'id'=>'address',
           ]) !!}
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>

        {!! Form::close() !!}
{{--        </form>--}}

    </div>

</div>
</div>




<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('ui/frontend/users') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('ui/frontend/users') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>

{{--<script>--}}
{{--    $('input[name=quantity]').on('blur', function (){--}}
{{--        var quantity = $(this).val();--}}
{{--        var baseprice = $('input[name=baseprice]').val();--}}
{{--        console.log(quantity)--}}
{{--        console.log(baseprice)--}}
{{--        var price = quantity*baseprice;--}}
{{--        $('#price').html('')--}}
{{--        $('#price').html(price)--}}
{{--        $('input[name=price]').val('')--}}
{{--        $('input[name=price]').val(price)--}}
{{--        console.log($('input[name=rice]').val())--}}

{{--    })--}}
{{--</script>--}}

