@extends('frontend.users.master')

@section('sub-content')
    <div class="container margin-top-20">
      <div class="card-body">
          @include('frontend.layouts.elements.message')
       <div class="card-header py-3">
        <h2>Welcome {{ Auth::user()->name }}</h2>
        <p>You Can Change Your Profile And Every Information Here..</p>
           <hr>
           <div class="row">
           <div class="col-md-6">
           <div class="card card-body mt-2 pointer" onclick="location.href='{{ route('user.profile') }}'">
               <h3>Update Profile</h3>

           </div>
           </div>
           </div>
    </div>
      </div>
    </div>
@endsection


@push('css')
<style>
    html{
        height: 100%;
    }

    body{
        position: relative;
        min-height: 100%;
    }
    footer{
        padding: 20px;
        margin-top: 20px;
        position: absolute;
        right: 0;
        left: 0;
        bottom: 0;
    }
    .pointer{
        cursor: pointer;
    }
</style>
@endpush
