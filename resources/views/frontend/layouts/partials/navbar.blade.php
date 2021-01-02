<div class="col-lg-3">

    <h1 class="my-4">Products Category</h1>
    <div class="list-group">
        {{--                <a href="#" class="list-group-item">Category 1</a>--}}
        {{--                <a href="#" class="list-group-item">Category 2</a>--}}
        {{--                <a href="#" class="list-group-item">Category 3</a>--}}

        @foreach($categories as $category)
            <a href="{{  url('category/'.$category->id) }}" class="list-group-item">{{$category->title}}</a>
        @endforeach
    </div>

{{--    <hr>--}}

    {{--            {!! Form::open([--}}
    {{--                 'url'=>'/',--}}
    {{--                 'method'=>'get',--}}
    {{--             ]) !!}--}}

    {{--            {!! Form::text('keyword',null,[--}}
    {{--                 'class'=>'form-control',--}}
    {{--                 'placeholder'=>'Product Search'--}}
    {{--             ]) !!}--}}

    {{--            {!! Form::button('Search',[--}}
    {{--               'class'=>'btn btn-info',--}}
    {{--               'type'=>'submit'--}}
    {{--             ]) !!}--}}

    {{--            {!! Form::close() !!}--}}

</div>
