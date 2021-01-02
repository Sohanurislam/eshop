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
            <h1 class="my-4">Order Summary</h1>

        </div>


                <div class="table-responsive">

                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <div>
                            <h1>Your Order Has Submitted</h1>
                        </div>
                        <tr>
                            <th>SL#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>City</th>
                            <th>Area</th>
                            <th>Address</th>
                            <th>Product name</th>
                            <th>quantity</th>
                            <th>price</th>
                            <th>Total</th>

                        </tr>
                        </thead>

                        <tbody>

                            @foreach($orders as $order)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order['shipping'] != null ?$order['shipping']->name : '' }}</td>
                                <td>{{ $order['shipping'] != null ?$order['shipping']->email : '' }}</td>
                                <td>{{ $order['shipping'] != null ?$order['shipping']->number : '' }}</td>
                                <td>{{ $order['shipping'] != null ?$order['shipping']->city : '' }}</td>
                                <td>{{ $order['shipping'] != null ?$order['shipping']->area : '' }}</td>
                                <td>{{ $order['shipping'] != null ?$order['shipping']->address : '' }}</td>


{{--                                @foreach($orders as $order)--}}
                                  <td>{{ $order['order']->product_name }}</td>
                                  <td>{{ $order['order']->quantity }}</td>
                                  <td>{{ $order['order']->unit_price }}</td>
                                  <td>{{ $order['order']->grand_total }}</td>

                            </tr>

                        </tbody>


{{--                        </tr>--}}

{{--                                <td>--}}
{{--                                    @foreach($user->roles as $role)--}}
{{--                                       <span class="badge badge-info">{{ $role->name }}</span>--}}
{{--                                    @endforeach--}}
{{--                                </td>--}}
{{--                                <td><span class="badge badge-primary">{{ $user->activeRole? $user->activeRole->name:'' }}</span></td>--}}
{{--                                <td>--}}
{{--                                    @can('show-user')--}}
{{--                                    <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-info">Show</a>--}}
{{--                                    @endcan--}}

{{--                                    @can('edit-user')--}}
{{--                                    <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-warning">Edit</a>--}}
{{--                                    @endcan--}}

{{--                                    <form action="{{route('users.destroy',[$user->id]) }}" method="post" style="display: inline">--}}
{{--                                        @csrf--}}
{{--                                        @method('delete')--}}
{{--                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</button>--}}
{{--                                    </form>--}}


                            </tr>
                        @endforeach
{{--                        @endforeach--}}
                    </table>


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




{{--@extends('backend.layouts.master')--}}

{{--@section('name', 'User List')--}}



{{--            @include('backend.layouts.elements.message')--}}

{{--            <div class="table-responsive">--}}
{{--                <table class="table table-bordered" width="100%" cellspacing="0">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Role</th>--}}
{{--                        <th>SL#</th>--}}
{{--                        <th>email</th>--}}
{{--                        <th>Name</th>--}}
{{--                        <th>Email</th>--}}
{{--                        <th>Roles</th>--}}
{{--                        <th>Active Role</th>--}}
{{--                        <th>Action</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($users as $user)--}}
{{--                        <tr>--}}
{{--                            <td>{{ $loop->iteration }}</td>--}}
{{--                            <td>{{ $user->name }}</td>--}}
{{--                            <td>{!! $user->email !!}</td>--}}
{{--                            <td>--}}
{{--                                @foreach($user->roles as $role)--}}
{{--                                   <span class="badge badge-info">{{ $role->name }}</span>--}}
{{--                                @endforeach--}}
{{--                            </td>--}}
{{--                            <td><span class="badge badge-primary">{{ $user->activeRole? $user->activeRole->name:'' }}</span></td>--}}
{{--                            <td>--}}
{{--                                @can('show-user')--}}
{{--                                <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-info">Show</a>--}}
{{--                                @endcan--}}

{{--                                @can('edit-user')--}}
{{--                                <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-warning">Edit</a>--}}
{{--                                @endcan--}}

{{--                                <form action="{{route('users.destroy',[$user->id]) }}" method="post" style="display: inline">--}}
{{--                                    @csrf--}}
{{--                                    @method('delete')--}}
{{--                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</button>--}}
{{--                                </form>--}}

{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@push('css')--}}
{{--    <!-- Custom styles for this page -->--}}
{{--    <link href="{{ asset('ui/backend') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">--}}
{{--@endpush--}}

{{--@push('js')--}}

{{--    <!-- Page level plugins -->--}}
{{--    <script src="{{ asset('ui/backend') }}/vendor/datatables/jquery.dataTables.min.js"></script>--}}
{{--    <script src="{{ asset('ui/backend') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>--}}

{{--    <!-- Page level custom scripts -->--}}
{{--    <script src="{{ asset('ui/backend') }}/js/demo/datatables-demo.js"></script>--}}
{{--@endpush--}}
