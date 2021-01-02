<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">ESHOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">


{{--            search--}}

            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">

                {!! Form::open([
                  'url'=>'/',
                  'method'=>'get',
                ]) !!}
        <div class="input-group">

                {!! Form::text('keyword',null,[
                     'class'=>'form-control',
                     'placeholder'=>'Product Search'
                 ]) !!}

             <div class="input-group-append">

                {!! Form::button('Search',[
                   'class'=>'btn btn-info',
                   'type'=>'submit'
                 ]) !!}

            </div>

        </div>
                {!! Form::close() !!}
                </li>
            </ul>
{{--            end search--}}

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
                    <a class="nav-link"  href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{ route('carts') }}">Cart <span class="badge badge-danger">{{ \App\Cart::totalItems() }}</span></a>
                    {{--                    <a class="nav-link" href="{{ route('cart') }}">Cart <span class="badge badge-danger">{{ count($productsInCart) }}</span></a>--}}
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary"  href="{{url('/home')}}">Backend-Home</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" width="40">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                     <a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a>

                      <a class="dropdown-item" href="{{ route('user.myOrder') }}">My Orders</a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

{{--            <ul class="navbar-nav ml-auto">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link"  href="#">Profile</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </div>
    </div>
</nav>

<!-- Page Content -->
