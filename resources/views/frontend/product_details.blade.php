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
@include('frontend.layouts.partials.navbar')
{{--        <div class="col-lg-3">--}}
{{--            <h1 class="my-4">Shop Name</h1>--}}
{{--            <div class="list-group">--}}
{{--                <a href="#" class="list-group-item active">Category 1</a>--}}
{{--                <a href="#" class="list-group-item">Category 2</a>--}}
{{--                <a href="#" class="list-group-item">Category 3</a>--}}
{{--                @foreach($categories as $category)--}}
{{--                    <a href="{{ url('/'.$category->id) }}" class="list-group-item">{{$category->title}}</a>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="card mt-4">


                @if(file_exists(storage_path().'/app/public/images/'.$product->picture) && (!is_null($product->picture)))

                    <a href="#"><img class="card-img-top" src="{{ asset('storage/images/'.$product->picture) }}" alt=""></a>
                    {{--                            <img src="" height="100" width="100">--}}
                @else
                    <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
                @endif

                <div class="card-body">
                    <h3 class="card-title">{{ $product->title }}</h3>
                    <table>
                        <tr>Sizes:</tr>
                    </table>
                    @foreach($product->sizes as $size)
                    <p class="btn-group btn-warning" style="text-decoration-color: yellow!important;" >{{ $size->title }}</p>
                    @endforeach
                    <h4>Prize:{{ $product->price }} TK</h4>
                    <p class="card-text">{!! $product->description !!}   </p>
                    <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>

                    4.0 stars
                </div>
            </div>
            <!-- /.card -->

            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Product Reviews
                </div>
                <div class="card-body">

                    @foreach($product->comments as $comment)
                    <p>{{ $comment->body }}</p>
                    <small class="text-muted">Posted by {{ $comment->commentedBy->name }} on {{ $comment->created_at->toFormattedDateString() }} <mark>{{ $comment->created_at->diffForHumans() }}</mark></small>
                    <hr>
                    @endforeach

                    {!! Form::open([
                       'route'=>['products.review', $product->id]
                     ]) !!}

                    <div class="form-group">

                        {!! Form::textarea('body',null,[
                            'class'=>'form-control',
                        ]) !!}

                    </div>

{{--                    <a href="#" class="btn btn-success">Leave a Review</a>--}}
                    {!! Form::button('Leave a Review',[
                        'class'=>"btn btn-success",
                        'type'=>'submit',
                     ]) !!}

                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

    </div>

</div>
<!-- /.container -->

<!-- Footer -->
@include('frontend.layouts.partials.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('ui/frontend/users') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('ui/frontend/users') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
