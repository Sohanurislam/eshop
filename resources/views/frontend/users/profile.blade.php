@extends('frontend.users.master')

@section('sub-content')

    <div class="container">

        <div class="card-body mb-5">
            @include('frontend.layouts.elements.message')

            <form method="POST" action="{{ route('user.updateProfile') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                    <div class="col-md-6">
                        <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ $user->number }}" required autocomplete="number">

                        @error('number')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


         <div class="form-group row">
             <label for="facebookUri" class="col-md-4 col-form-label text-md-right">Facebook URI</label>

             <div class="col-md-6">
                 <input id="facebookUri" type="url" class="form-control @error('facebook_uri') is-invalid @enderror" name="facebook_uri" value="{{ $user->profile->facebook_uri }}" required autocomplete="facebook_uri">

                 @error('facebook_uri')
                 <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
             </div>
         </div>

                <div class="form-group row">
                    <label for="post_office_id" class="col-md-4 col-form-label text-md-right">Post Offices</label>

                    <div class="col-md-6">

                        <select name="post_office" id="postOffice" class="form-control" value="{{ $user->post_office }}" >
                            <option value="">Select one</option>
                            @foreach($postOffices as $postOffice)

                                <option value="{{ $postOffice->id }}" {{ $postOffice->id == $postOffice->id ? 'selected' : '' }}>{{ $postOffice->post_office }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>


             <div class="form-group row">
                 <label for="dateofbirth" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                 <div class="col-md-6">
                     <input id="dateofbirth" type="date" class="form-control @error('dateofbirth') is-invalid @enderror" name="dateofbirth" value="{{ $user->dateofbirth }}" required autocomplete="dateofbirth">

                     @error('age')
                     <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>
             </div>

             <div class="form-group row">
                 <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>
                 <div class="col-md-6">
                     <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" >{{ $user->profile->bio }}</textarea>

                     @error('bio')
                     <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>
             </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">New Password (Optional)</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

{{--                <div class="form-group row">--}}
{{--                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                    <div class="col-md-6">--}}
{{--                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Update Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
