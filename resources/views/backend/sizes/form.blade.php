<div class="form-group">
{{--    <label for="title">Title</label>--}}
    {!! Form::label('title', 'Title') !!}
{{--    <input name="title" type="text" class="form-control" id="title">--}}
    {!! Form::text('title',null,[
       'class'=>'form-control',
       'id'=>'title',
     ]) !!}
</div>

{{--<div>--}}
{{--    <input type="file" name="picture" id="picture">--}}
{{--    {!! Form::file('picture',[--}}
{{--     'class'=>'form-control',--}}
{{--     'id'=>'picture',--}}
{{--   ]) !!}--}}
{{--    {!! Form::file('picture',null,[--}}

{{--     'id'=>'picture',--}}
{{--   ]) !!}--}}
{{--</div>--}}
{{--<div class="form-group form-check">--}}
{{--    <input name="is_active" type="checkbox" class="form-check-input" id="isActive">--}}
{{--    <label class="form-check-label" for="exampleCheck1">Is Active</label>--}}
{{--</div>--}}
{{--<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>--}}
{{--<script>--}}
{{--    // CKEDITOR.replace( 'description' );--}}
{{--</script>--}}
