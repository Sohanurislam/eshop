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
              'route' => 'orders.store',
       ]) !!}



        {{--        <div class="form-group row">--}}
        {{--            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

        {{--            <div class="col-md-6">--}}

        {{--                {{ Form::text('name', null,[--}}
        {{--                   'class'=>'form-control',--}}
        {{--                    'required',--}}
        {{--                    'id'=>'name'--}}
        {{--                 ]) }}--}}
        {{--                @error('name')--}}
        {{--                <span class="invalid-feedback" role="alert">--}}
        {{--               <strong>{{ $message }}</strong>--}}
        {{--         </span>--}}
        {{--                @enderror--}}
        {{--            </div>--}}
        {{--        </div>--}}

        {{--        <div class="form-group row">--}}
        {{--            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

        {{--            <div class="col-md-6">--}}
        {{--                {{ Form::email('email', null,[--}}
        {{--                  'class'=>'form-control',--}}
        {{--                   'required',--}}
        {{--                   'id'=>'email'--}}
        {{--                ]) }}--}}
        {{--                @error('email')--}}
        {{--                <span class="invalid-feedback" role="alert">--}}
        {{--             <strong>{{ $message }}</strong>--}}
        {{--        </span>--}}
        {{--                @enderror--}}
        {{--            </div>--}}
        {{--        </div>--}}


        <div class="form-group">
            <label for="name" >Name</label>
            @foreach($users as $user)
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" >
            @endforeach


        </div>

        <div class="form-group">
            <label for="email" >Email</label>
            @foreach($users as $user)
                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" >
            @endforeach
        </div>

        <div class="form-group">
            <label for="email" >Number</label>
            @foreach($users as $user)
                <input type="text" name="number" id="number" class="form-control" value="{{ $user->number }}" >
            @endforeach
        </div>


        {{--        <div>--}}
        {{--            <label for="number">Number</label><br>--}}

        {{--            {!! Form::number('number',null,[--}}
        {{--             'class'=>'form-control',--}}
        {{--             'id'=>'number',--}}
        {{--           ]) !!}--}}
        {{--        </div>--}}

        <div class="form-group">

            {!! Form::label('address', 'Address') !!}<br>

            {!! Form::textarea('address',null,[
             'class'=>'form-control',
             'id'=>'address',
           ]) !!}
        </div>

        <div class="form-group">
            <label for="post_office_id" >Post Offices</label>

            <select name="post_office" id="postOffice" class="form-control" value="{{ $user->post_office }}" >
                @foreach($postOffices as $postOffice)

                    <option value="{{ $postOffice->id }}">{{ $postOffice->post_office }} </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        {!! Form::close() !!}
    </div>

</div>

{{--</div>--}}

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








{{--@extends('backend.layouts.master')--}}

{{--@section('title', 'User Create')--}}

{{--@section('content')--}}
{{--    <!-- Page Heading -->--}}
{{--    <div class="d-sm-flex align-items-center justify-content-between mb-4">--}}
{{--        <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>--}}
{{--        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
{{--    </div>--}}

{{--    <div class="card shadow mb-4">--}}
{{--        <div class="card-header py-3">--}}
{{--            <h6 class="m-0 font-weight-bold text-primary float-left">Edit</h6>--}}
{{--            <a class="btn btn-primary float-right" href="{{ route('users.index') }}">List</a>--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}

{{--            @include('backend.layouts.elements.errors')--}}

{{--            {!! Form::model($user,[--}}
{{--             'route' => ['users.update',$user->id],--}}
{{--             'method'=>'put',--}}
{{--               ]) !!}--}}


{{--            --}}{{--            <form action="{{ route('products.update', [$product->id]) }}" method="post" enctype="multipart/form-data">--}}
{{--            --}}{{--                @csrf--}}
{{--            --}}{{--                @method('put')--}}
{{--            --}}{{--                <div class="form-group">--}}
{{--            --}}{{--                    <label for="title">Title</label>--}}
{{--            --}}{{--                    <input name="title" type="text" value="{{ $product->title }}" class="form-control" id="title">--}}
{{--            --}}{{--                </div>--}}
{{--            --}}{{--                <div class="form-group">--}}
{{--            --}}{{--                    <label for="description">Description</label><br>--}}
{{--            --}}{{--                    <textarea name="description" class="form-control" id="description" >--}}
{{--            --}}{{--                        {{ $product->description }}--}}
{{--            --}}{{--                    </textarea>--}}
{{--            --}}{{--                </div>--}}
{{--            --}}{{--                <div>--}}
{{--            --}}{{--                    <input type="file" name="picture" id="picture">--}}
{{--            --}}{{--                </div>--}}
{{--            --}}{{--                <div class="form-group form-check">--}}
{{--            --}}{{--                    <input name="is_active" type="checkbox" {{ $product->is_active? 'checked':'' }} class="form-check-input" id="isActive">--}}
{{--            --}}{{--                    <label class="form-check-label" for="exampleCheck1">Is Active</label>--}}
{{--            --}}{{--                </div>--}}
{{--            @include('backend.users.form')--}}


{{--            <div class="form-group row mb-0">--}}
{{--                    <div class="col-md-6 offset-md-4">--}}
{{--                        <button type="submit" class="btn btn-primary">--}}
{{--                            Update--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            {!! Form::close() !!}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@push('js')--}}
{{--    <script>--}}
{{--        // alert('Creating category')--}}
{{--    </script>--}}
{{--@endpush--}}
