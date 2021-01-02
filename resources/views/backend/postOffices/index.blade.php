@extends('backend.layouts.master')

@section('name', 'postOffice List')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Post Office</h1>

    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">List</h6>
            <a class="btn btn-primary float-right" href="{{ route('postOffices.create') }}">Create</a>

        </div>
        <div class="card-body">

            @include('backend.layouts.elements.message')

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                    <thead>
                    <tr>
                        <th>SL#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $sl=0 @endphp
                    @foreach($postOffices as $postOffice)
                        <tr>
                            <td>{{ ++$sl }}</td>
                            <td>{{ $postOffice->post_office }}</td>
                            <td>
                                <a href="{{ route('postOffices.show', [$postOffice->id]) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('postOffices.edit', [$postOffice->id]) }}" class="btn btn-warning">Edit</a>

                                <form action="{{route('postOffices.destroy',[$postOffice->id]) }}" method="post" style="display: inline">
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
