@extends('backend.layouts.master')

@section('title', 'order List')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Orders</h1>
        {{--        <a href="{{ route('users.download_pdf') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">--}}
        {{--            <i class="fas fa-download fa-sm text-white-50"></i> Generate PDF Report--}}
        {{--        </a>--}}
        {{--        <a href="{{ route('users.download_excel') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">--}}
        {{--            <i class="fas fa-file-excel fa-sm text-white-50"></i> Generate Excel Report--}}
        {{--        </a>--}}
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">List</h6>
            {{--            <a class="btn btn-primary float-right" href="{{ route('products.create') }}">Create</a>--}}
            {{--            <a class="btn btn-primary float-right" href="{{ route('users.create') }}">Create</a>--}}
            {{--            <a class="btn btn-danger float-right" href="{{ route('users.trash') }}">Trash</a>--}}
        </div>
        <div class="card-body">

            @include('backend.layouts.elements.message')

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                    <thead>
                    <tr>
                        <th>SL#</th>
                        <th>Order ID</th>
                        <th>Order Name</th>
                        <th>Order Phone No</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)
                       <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>#Eshop{{ $order->id }}</td>
                          <td>{{ $order->name }} </td>
                          <td>{{ $order->phone_no }}</td>
                          <td>
                              <P>
                                  @if($order->is_seen_by_admin)
                                      <button type="button" class="btn btn-success btn-sm">Seen</button>
                                  @else
                                      <button type="button" class="btn btn-warning btn-sm">Unseen</button>
                                  @endif
                              </P>
                              <P>
                                  @if($order->is_completed)
                                      <button type="button" class="btn btn-success btn-sm">Completed</button>
                                  @else
                                      <button type="button" class="btn btn-warning btn-sm">Not Completed</button>
                                  @endif
                              </P>
                              <P>
                                  @if($order->is_paid)
                                      <button type="button" class="btn btn-success btn-sm">Paid</button>
                                  @else
                                      <button type="button" class="btn btn-danger btn-sm">Unpaid</button>
                                  @endif
                              </P>
                          </td>
                            <td>
                                <a href="{{ route('orders.show',$order->id) }}" class="btn btn-info">Show</a>
                                <form action='{{ route('orders.destroy',$order->id) }}' method="post" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</button>
                                </form>
                            </td>
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
