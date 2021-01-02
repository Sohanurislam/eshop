{{--@extends ('frontend.layouts.master')--}}

{{--@section('content')--}}

{{--    <div class="row">--}}
{{--        @foreach($products as $product)--}}
{{--            <div class="col-lg-4 col-md-6 mb-4">--}}
{{--                <div class="card h-100">--}}

{{--                    @if(file_exists(storage_path().'/app/public/images/'.$product->picture) && (!is_null($product->picture)))--}}

{{--                        <a href="#"><img class="card-img-top" src="{{ asset('storage/images/'.$product->picture) }}" alt=""></a>--}}
{{--                        --}}{{--                            <img src="" height="100" width="100">--}}
{{--                    @else--}}
{{--                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>--}}
{{--                    @endif--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title">--}}
{{--                            <a href="{{ route('product_details', [$product->id]) }}">{{ $product->title }}</a>--}}
{{--                        </h4>--}}
{{--                        <h5>Prize:{{ $product->price }} TK</h5>--}}
{{--                        <p class="card-text">{!! Str::limit($product->description , 50)  !!}    </p>--}}
{{--                    </div>--}}
{{--                    <div class="card-footer">--}}

{{--                        --}}{{--                                    @if(!in_array($product->id, $productsInCart))--}}
{{--                        --}}{{--                                                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>--}}
{{--                        --}}{{--                                        <button class="btn btn-sm btn-primary" id="{{ $product->id }}" onclick="addToCart({{ $product->id }})">Add To Cart</button>--}}
{{--                        --}}{{--                                    @else--}}
{{--                        --}}{{--                                        <button class="btn btn-sm btn-danger" >Already In Cart</button>--}}
{{--                        --}}{{--                                    @endif--}}

{{--                        @include('frontend.cart-button')--}}

{{--                        --}}{{--                                    <form class="form-inline" action="{{ route('carts.store') }}" method="post">--}}
{{--                        --}}{{--                                        @csrf--}}
{{--                        --}}{{--                                        <input type="hidden" name="product_id" value="{{ $product->id }}">--}}
{{--                        --}}{{--                                        <button type="button" class="btn btn-info" onclick="addToCart({{ $product->id}})">--}}
{{--                        --}}{{--                                            Add to Cart--}}
{{--                        --}}{{--                                        </button>--}}
{{--                        --}}{{--                                    </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}


{{--@endsection--}}
