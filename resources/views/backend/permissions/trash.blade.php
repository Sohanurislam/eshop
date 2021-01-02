@extends('backend.layouts.master')

@section('title', 'Deleted permission List')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Post Office</h1>
{{--        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">List</h6>
            <a class="btn btn-primary float-right" href="{{ route('permissions.index') }}">List</a>
        </div>
        <div class="card-body">

            @include('backend.layouts.elements.message')

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
{{--                        <th>Description</th>--}}
{{--                        <th>Image</th>--}}
{{--                        <th>Status</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
{{--                            <td>{!! $permission->description !!} </td>--}}
{{--                            <td><img src="{{ asset('storage/images/').'/'.$product->picture }}" height="100" width="100"></td>--}}
{{--                            <td>{{ $permission->is_active? 'Active': 'Inactive' }}</td>--}}
                            <td>
                                <a href="{{ route('permissions.restore', [$permission->id]) }}" class="btn btn-info">Restore</a>
{{--                                <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-warning">Edit</a>--}}

                                <form action="{{route('permissions.forceDelete',[$permission->id]) }}" method="post" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('ui/backend') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('js')
    <!-- Page level plugins -->
    <script src="{{ asset('ui/backend') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('ui/backend') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('ui/backend') }}/js/demo/datatables-demo.js"></script>
@endpush
