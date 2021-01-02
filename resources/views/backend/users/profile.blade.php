@extends('backend.layouts.master')

@section('title', 'Profile ')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Details</h6>
            <a class="btn btn-primary float-right"
{{--               href="{{ route('products.index') }}"--}}
            >List</a>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
{{--                <tr>--}}
{{--                    <td>Image</td>--}}
{{--                    <td><img src="{{ asset('storage/images').'/'.$product->picture }}" height="100" width="100"></td>--}}
{{--                </tr>--}}
                <tr>
                    <td>Number</td>
                    <td>{{ $user->number }}</td>
                </tr>
                <tr>
                    <td>PostOffice</td>
                    <td>{{ $user->postOffice->post_office }}</td>
{{--                    <td>{{ $product->is_active? 'Active' : 'Inactive' }}</td>--}}
                </tr>
{{--                <tr>--}}
{{--                    <td>Facebook</td>--}}
{{--                    <td>{{ $user->profile->facebook_uri }}</td>--}}
{{--                </tr>--}}
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // alert('Creating category')
    </script>
@endpush
