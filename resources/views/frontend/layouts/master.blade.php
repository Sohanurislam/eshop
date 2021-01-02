<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eshop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('ui/frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('ui/frontend') }}/css/shop-homepage.css" rel="stylesheet">

</head>

<body>


{{--<!-- Navigation -->--}}
@include('frontend.layouts.partials.top-bar')
<!-- Page Content -->


@yield('content')
<!-- /.container -->

<!-- Footer -->
@include('frontend.layouts.partials.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('ui/frontend') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('ui/frontend') }}/vendor/jquery/jquery-3.5.1.min.js"></script>
<script src="{{ asset('ui/frontend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

@stack('css')

@stack('scripts')

</body>

</html>
