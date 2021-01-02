<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">

        {{ Form::text('name', null,[
           'class'=>'form-control',
            'required',
            'id'=>'name'
         ]) }}
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
        {{ Form::email('email', null,[
          'class'=>'form-control',
           'required',
           'id'=>'email'
        ]) }}
        @error('email')
        <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="facebookUri" class="col-md-4 col-form-label text-md-right">Facebook URI</label>

    <div class="col-md-6">

        {{ Form::url('facebook_uri', $user->profile->facebook_uri??null,[
          'class'=>'form-control',
           'required',
           'id'=>'facebookUri'
        ]) }}


        @error('facebook_uri')
        <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



<div class="form-group row">
    <label for="dateofbirth" class="col-md-4 col-form-label text-md-right">Date OF Birth</label>

    <div class="col-md-6">

        {{ Form::date('dateofbirth', null,[
          'class'=>'form-control',
           'required',
           'id'=>'dateofbirth'
        ]) }}


        @error('dateofbirth')
        <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>
    <div class="col-md-6">

        {!!  Form::textarea('bio', $user->profile->bio??null,[
          'class'=>'form-control',
           'id'=>'bio'
        ])  !!}

        @error('bio')
        <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

{{--<div class="form-group row">--}}
{{--    <label for="post_office_id" class="col-md-4 col-form-label text-md-right">Post Offices</label>--}}

{{--    <div class="col-md-6">--}}

{{--        <select name="post_office" id="postOffice" class="form-control" value="{{ old('post_office') }}" >--}}
{{--            @foreach($postOffices as $postOffice)--}}
{{--                --}}{{--                            <option value="">Select one</option>--}}
{{--                <option value="{{ $postOffice->id }}">{{ $postOffice->post_office }} </option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
{{--</div>--}}


  <div class="form-group row" >
    <label for="post_office_id" class="col-md-4 col-form-label text-md-right">Post Office</label>
      <div class="col-md-6">


      {{--                            {!! Form::label('post_office_id', 'Post Office')!!}--}}


{!! Form::select('post_office_id',$postOffice,null,[
   'class'=>'form-control',
      'id'=>'postOffice',
   ]) !!}
      </div>
 </div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
    </div>
</div>

<p>Roles :</p>
<div class="form-group form-check">
    @foreach($roles as $key => $role)
        <div>
            {!! Form::checkbox('roles[]', $key, in_array($key,$selectedRoles),[
            'class'=>"form-check-input",
            'id'=>$role
        ]) !!}
            {{$role}}
        </div>
    @endforeach
</div>

<div class="form-group row">
    <label for="activeRole" class="col-md-4 col-form-label text-md-right">Active Role</label>

    <div class="col-md-6">
        {!! Form::select('active_role_id',$roles,null,[
          'class'=>'form-control',
          'id'=>'activeRole'
        ]) !!}
    </div>
</div>

