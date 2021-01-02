@extends('frontend.layouts.master')
@section('content')


    <div class="container">

        <div class="row">


        {{--        sidebar--}}
        @include('frontend.layouts.partials.navbar')

        <!-- /.col-lg-3 -->
            <div class="col-lg-9">

                @include('frontend.layouts.elements.message')

                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    {{--                @foreach($products as $product)--}}
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="{{asset('image/slide/Desert Safari YouTube Thumbnail (1).png')}}" alt="First slide" height="350" width="900">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('image/slide/Guess-Mens-Collection.jpg')}}" alt="Second slide" height="350" width="900">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('image/slide/womens-data.jpg')}}" alt="Third slide" height="350" width="900">
                        </div>
                    </div>
                    {{--                @endforeach--}}
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">

                                @if(file_exists(storage_path().'/app/public/images/'.$product->picture) && (!is_null($product->picture)))

                                    <a href="#"><img class="card-img-top" src="{{ asset('storage/images/'.$product->picture) }}" alt=""></a>
                                    {{--                            <img src="" height="100" width="100">--}}
                                @else
                                    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="{{ route('product_details', [$product->id]) }}">{{ $product->title }}</a>
                                    </h4>
                                    <h5>Prize:{{ $product->price }} TK</h5>
                                    <p class="card-text">{!! Str::limit($product->description , 50)  !!}    </p>
                                </div>
                                <div class="card-footer">

{{--                                    @if(!in_array($product->id, $productsInCart))--}}
{{--                                                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>--}}
{{--                                        <button class="btn btn-sm btn-primary" id="{{ $product->id }}" onclick="addToCart({{ $product->id }})">Add To Cart</button>--}}
{{--                                    @else--}}
{{--                                        <button class="btn btn-sm btn-danger" >Already In Cart</button>--}}
{{--                                    @endif--}}

                                    @include('frontend.cart-button')

{{--                                    <form class="form-inline" action="{{ route('carts.store') }}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="product_id" value="{{ $product->id }}">--}}
{{--                                        <button type="button" class="btn btn-info" onclick="addToCart({{ $product->id}})">--}}
{{--                                            Add to Cart--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            {{ $products->links() }}
            <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

{{--        @push('scripts')--}}
{{--            <script>--}}
{{--                $.ajax({--}}
{{--                        headers: {--}}
{{--                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                        }--}}
{{--                    })--}}
{{--                function addToCart(product_id){--}}
{{--                    $.post( "http://eshop.com/cart/store",--}}
{{--                        {--}}
{{--                            product_id: product_id--}}
{{--                        })--}}
{{--                        .done(function( data ) {--}}
{{--                        });--}}

{{--                }--}}

{{--            </script>--}}
{{--        @endpush--}}






{{--                @push('scripts')--}}
{{--            <script>--}}

{{--                function addToCart(id){--}}
{{--                    // alert('adding '+id);--}}
{{--                    $.ajax({--}}
{{--                        headers: {--}}
{{--                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                        },--}}
{{--                        type: "post",--}}
{{--                        url: '/add-to-cart',--}}
{{--                        data: {product_id: id},--}}
{{--                        cache: false,--}}
{{--                        success: function (res) {--}}

{{--                            $('#'+id).removeClass('btn-primary');--}}
{{--                            $('#'+id).addClass('btn-warning');--}}
{{--                            $('#'+id).text('Added To Cart');--}}

{{--                                      $('#addToCart'+id).html(`--}}
{{--                                <span type="submit" class="hub-cart phub-cart btn">--}}
{{--                                    <i class="fas fa-shopping-bag" aria-hidden="true"></i> Already In Cart--}}
{{--                                </span>--}}
{{--                            `);--}}
{{--                        },--}}
{{--                        error: function (xhr, status, error) {--}}
{{--                            console.log("An AJAX error occured: " + status + "\nError: " + error);--}}
{{--                        }--}}
{{--                    });--}}

{{--                }--}}

{{--            </script>--}}
{{--        @endpush--}}

    </div>

@endsection
