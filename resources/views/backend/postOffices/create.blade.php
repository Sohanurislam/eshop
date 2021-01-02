@extends('backend.layouts.master')

@section('name', 'postOffice Create')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Post Offices</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Create</h6>
            <a class="btn btn-primary float-right" href="{{ route('postOffices.index') }}">List</a>
        </div>
        <div class="card-body">

            @include('backend.layouts.elements.errors')

            {!! Form::open([
                  'route' => 'postOffices.store',
           ]) !!}

            @include('backend.postOffices.form')

                <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('js')
    <script>
        // alert('Creating category')
    </script>
@endpush
