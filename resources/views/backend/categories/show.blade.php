@extends('backend.layouts.master')

@section('title', 'Category Create')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Details</h6>
            <a class="btn btn-primary float-right" href="{{ route('categories.index') }}">List</a>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Title</td>
                    <td>{{ $category->title }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{!! $category->description !!}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{ $category->is_active? 'Active' : 'Inactive' }}</td>
                </tr>
            </table>

            <h3>Products</h3>
            <ol>
                @foreach($category->products as $product)
                <li>{{$product->title}}</li>
{{--                <li>{{$product->description}}</li>--}}
                @endforeach
            </ol>

        </div>
    </div>
@endsection

@push('js')
    <script>
        // alert('Creating category')
    </script>
@endpush
