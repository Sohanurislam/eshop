@extends('frontend.layouts.master')

@section('content')

    <div class="container mt-4">
        <div class="row">
            @include('frontend.layouts.elements.message')
            <div class="col-md-4">
                <div class="list-group">
                    <a class="list-group-item" href="">
                        <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" width="100">
                    </a>
                    <a class="list-group-item {{ Route::is('user.dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">Dashboard</a>
                    <a class="list-group-item {{ Route::is('user.profile') ? 'active' : '' }}" href="{{ route('user.profile') }}">Update Profile</a>
{{--                    <a class="list-group-item" href="{{ route('logout') }}">Logout</a>--}}
                    <a class="list-group-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <div class=" col-md-8">
                <div class="card card-body"
            @yield('sub-content')
            </div>
            </div>
        </div>
    </div>

@endsection
