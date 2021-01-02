@extends('backend.layouts.master')

@section('title', 'order Create')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Order</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Edit</h6>
            <a class="btn btn-primary float-right" href="{{ route('orders.index') }}">List</a>
        </div>
        <div class="card-body">

            @include('backend.layouts.elements.errors')

{{--            {!! Form::model($order,[--}}
{{--             'route' => ['orders.update',$order->id],--}}
{{--             'method'=>'put',--}}
{{--               ]) !!}--}}

            {!! Form::open([
                'method'=>'post'
              ]) !!}


            <div class="form-group form-check">
                <input name="Delivery" type="checkbox" class="form-check-input" >
                <input name="UnDelivery" type="checkbox" class="form-check-input" >
                {{--    {!! Form::checkbox('is_active',null,[--}}
                {{--     'class'=>'form-check-input',--}}
                {{--     'id'=>'isActive',--}}
                {{--   ]) !!}--}}
                <label class="form-check-label" for="exampleCheck1">Delivery</label>
                <label class="form-check-label" for="exampleCheck1">UnDelivery</label>
            </div>


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
{{--            @include('backend.orders.form')--}}


            <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('js')
    <script>
        // alert('Creating category')
    </script>
@endpush
