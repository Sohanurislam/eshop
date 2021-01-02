

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





{{--<div class="form-group row">--}}
{{--    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--    <div class="col-md-6">--}}

{{--        {{ Form::text('name', null,[--}}
{{--           'class'=>'form-control',--}}
{{--            'required',--}}
{{--            'id'=>'name'--}}
{{--         ]) }}--}}
{{--        @error('name')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--               <strong>{{ $message }}</strong>--}}
{{--         </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--    <div class="col-md-6">--}}
{{--        {{ Form::email('email', null,[--}}
{{--          'class'=>'form-control',--}}
{{--           'required',--}}
{{--           'id'=>'email'--}}
{{--        ]) }}--}}
{{--        @error('email')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--             <strong>{{ $message }}</strong>--}}
{{--        </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="form-group row">--}}
{{--    <label for="facebookUri" class="col-md-4 col-form-label text-md-right">Facebook URI</label>--}}

{{--    <div class="col-md-6">--}}

{{--        {{ Form::url('facebook_uri', $user->profile->facebook_uri??null,[--}}
{{--          'class'=>'form-control',--}}
{{--           'required',--}}
{{--           'id'=>'facebookUri'--}}
{{--        ]) }}--}}


{{--        @error('facebook_uri')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--             <strong>{{ $message }}</strong>--}}
{{--        </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}



{{--<div class="form-group row">--}}
{{--    <label for="dateofbirth" class="col-md-4 col-form-label text-md-right">Date OF Birth</label>--}}

{{--    <div class="col-md-6">--}}

{{--        {{ Form::date('dateofbirth', null,[--}}
{{--          'class'=>'form-control',--}}
{{--           'required',--}}
{{--           'id'=>'dateofbirth'--}}
{{--        ]) }}--}}


{{--        @error('dateofbirth')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--             <strong>{{ $message }}</strong>--}}
{{--        </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--    <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>--}}
{{--    <div class="col-md-6">--}}

{{--        {!!  Form::textarea('bio', $user->profile->bio??null,[--}}
{{--          'class'=>'form-control',--}}
{{--           'id'=>'bio'--}}
{{--        ])  !!}--}}

{{--        @error('bio')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--              <strong>{{ $message }}</strong>--}}
{{--        </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--    <label for="post_office_id" class="col-md-4 col-form-label text-md-right">Post Offices</label>--}}

{{--    <div class="col-md-6">--}}

{{--        <select name="post_office" id="postOffice" class="form-control" value="{{ old('post_office') }}" >--}}
{{--            @foreach($postOffices as $postOffice)--}}
{{--                --}}{{----}}{{--                            <option value="">Select one</option>--}}
{{--                <option value="{{ $postOffice->id }}">{{ $postOffice->post_office }} </option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
{{--</div>--}}


{{--  <div class="form-group row" >--}}
{{--    <label for="post_office_id" class="col-md-4 col-form-label text-md-right">Post Office</label>--}}
{{--      <div class="col-md-6">--}}


{{--      --}}{{--                            {!! Form::label('post_office_id', 'Post Office')!!}--}}


{{--{!! Form::select('post_office_id',$postOffice,null,[--}}
{{--   'class'=>'form-control',--}}
{{--      'id'=>'postOffice',--}}
{{--   ]) !!}--}}
{{--      </div>--}}
{{-- </div>--}}

{{--<div class="form-group row">--}}
{{--    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--    <div class="col-md-6">--}}
{{--        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">--}}

{{--        @error('password')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--             <strong>{{ $message }}</strong>--}}
{{--        </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--    <div class="col-md-6">--}}
{{--        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">--}}
{{--    </div>--}}
{{--</div>--}}

{{--<p>Roles :</p>--}}
{{--<div class="form-group form-check">--}}
{{--    @foreach($roles as $key => $role)--}}
{{--        <div>--}}
{{--            {!! Form::checkbox('roles[]', $key, in_array($key,$selectedRoles),[--}}
{{--            'class'=>"form-check-input",--}}
{{--            'id'=>$role--}}
{{--        ]) !!}--}}
{{--            {{$role}}--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--    <label for="activeRole" class="col-md-4 col-form-label text-md-right">Active Role</label>--}}

{{--    <div class="col-md-6">--}}
{{--        {!! Form::select('active_role_id',$roles,null,[--}}
{{--          'class'=>'form-control',--}}
{{--          'id'=>'activeRole'--}}
{{--        ]) !!}--}}
{{--    </div>--}}
{{--</div>--}}

