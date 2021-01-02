@extends('backend.layouts.master')

@section('title', 'Product Update')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
{{--        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Edit</h6>
            <a class="btn btn-primary float-right" href="{{ route('products.index') }}">List</a>
        </div>
        <div class="card-body">

            @include('backend.layouts.elements.errors')

            {!! Form::model($product,[
             'route' => ['products.update',$product->id],
             'method'=>'put',
             'enctype'=>'multipart/form-data'
               ]) !!}


{{--            <form action="{{ route('products.update', [$product->id]) }}" method="post" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                @method('put')--}}
{{--                <div class="form-group">--}}
{{--                    <label for="title">Title</label>--}}
{{--                    <input name="title" type="text" value="{{ $product->title }}" class="form-control" id="title">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="description">Description</label><br>--}}
{{--                    <textarea name="description" class="form-control" id="description" >--}}
{{--                        {{ $product->description }}--}}
{{--                    </textarea>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <input type="file" name="picture" id="picture">--}}
{{--                </div>--}}
{{--                <div class="form-group form-check">--}}
{{--                    <input name="is_active" type="checkbox" {{ $product->is_active? 'checked':'' }} class="form-check-input" id="isActive">--}}
{{--                    <label class="form-check-label" for="exampleCheck1">Is Active</label>--}}
{{--                </div>--}}
            @include('backend.products.form')
                <button type="submit" class="btn btn-primary">Submit</button>
{{--            </form>--}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('js')
    <script>
        // alert('Creating category')
    </script>
@endpush
