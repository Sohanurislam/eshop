<div class="form-group">
    {{--                    <label for="title">Title</label>--}}

    {!! Form::label('category_id', 'Category') !!}

    {{--                    <input name="title" type="text" class="form-control" id="title">--}}

    {!! Form::select('category_id',$categories,null,[
       'class'=>'form-control',
       'id'=>'title',
       'placeholder'=>'Select one',
     ]) !!}

</div>

<div class="form-group">
{{--    <label for="title">Title</label>--}}
    {!! Form::label('title', 'Title') !!}
{{--    <input name="title" type="text" class="form-control" id="title">--}}
    {!! Form::text('title',null,[
       'class'=>'form-control',
       'id'=>'title',
     ]) !!}
</div>
<div class="form-group">
{{--    <label for="description">Description</label><br>--}}

    {!! Form::label('description', 'Description') !!}<br>

{{--    <textarea name="description" class="form-control" id="description" ></textarea>--}}
    {!! Form::textarea('description',null,[
     'class'=>'form-control',
     'id'=>'description',
   ]) !!}
</div>
<div>
        <label for="picture">Picture</label><br>

    {{--    <input type="file" name="picture" id="picture">--}}
    {!! Form::file('picture',null,[
     'class'=>'form-control',
     'id'=>'picture',
   ]) !!}
{{--    {!! Form::file('picture',null,[--}}

{{--     'id'=>'picture',--}}
{{--   ]) !!}--}}
</div>

<p>Sizes :</p>
<div class="form-group form-check">
    @foreach($sizes as $key => $size)
<div>
{{--        <input name="is_active" type="checkbox" class="form-check-input" id="isActive">--}}
{{--        <label class="form-check-label" for="exampleCheck1">{{ $size }}</label>--}}

    {!! Form::checkbox('size[]', $key, in_array($key,$selectedSizes),[
    'class'=>"form-check-input",
    'id'=>$size
]) !!}
    {{ $size }}
</div>
    @endforeach
</div>

<div>
    <label for="price">Price</label><br>

    {!! Form::number('price',null,[
     'class'=>'form-control',
     'id'=>'price',
   ]) !!}

</div>

<div class="form-group form-check">
    <input name="is_active" type="checkbox" class="form-check-input" id="isActive">
    <label class="form-check-label" for="exampleCheck1">Is Active</label>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
