@extends('layouts.layout', ['title' => "$product->name"])

@section('content')

    <div class="home home-notmain">
        <div class="home_container">
            <div class="home_background" style="background-image:url({{asset('images/categories.jpg')}})"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">{{ $product->name }}<span>.</span></div>
                                <div class="home_text"><p>{{$product->descr}}</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Details -->

    <div class="product_details">
        <div class="container">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        <div class="details_image_large"><img src="{{asset($product->img)}}" alt=""><div class="product_extra product_{{ $product->flag }}"><a href="/">{{ $product->flag }}</a></div></div>
                        <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                            <div class="details_image_thumbnail active" data-image="{{asset($product->img)}}"><img src="{{asset($product->img)}}" alt=""></div>
                            @foreach($productImages as $productImage)
                            <div class="details_image_thumbnail" data-image="{{asset($productImage->image)}}"><img src="{{asset($productImage->image)}}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name">{{ $product->name }}</div>
                        <div class="details_discount">${{ $product->original_price }}</div>
                        <div class="details_price">${{ $product->price }}</div>

                        <!-- In Stock -->
                        <div class="in_stock_container">
                            <div class="availability">Availability:</div>
                            <span>In Stock</span>
                        </div>
                        <div class="details_text">
                            <p>{{ $product->descr }}</p>
                        </div>

                        <!-- Product Quantity -->
                        <div class="product_quantity_container">
                            <div class="product_quantity clearfix">
                                <span>Qty</span>
                                {{--session("cart.products.$product->id")->quantity ?? 1--}}
                                <input type="text" id="quantity_input" pattern="[0-9]*" value="1">
                                <div class="quantity_buttons">
                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="button cart_button"><a href="{{ route('cart.add', ['id' => $product->link_name]) }}" data-name="{{ $product->link_name }}" class="product-button__add" >Add to cart</a></div>
                        </div>

                        <!-- Share -->
                        <div class="details_share">
                            <span>Share:</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row description_row">
                <div class="col">
                    <div class="description_title_container">
                        <div class="description_title">Description</div>
                    </div>
                    <div class="description_text">
                        <p>{{ $product->descr }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="products_title">Related Products</div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">


                        <!-- Product -->
                        @foreach($relatedProducts as $product)
                        <div class="product">
                            <div class="product_image"><a href="{{ route('product.show', ['id' => $product->id]) }}">
                                    <img src="{{ asset($product->img) }}" alt=""></a></div>
                            <div class="product_extra product_{{ $product->flag }}"><a href="/">{{ $product->flag }}</a></div>
                            <div class="product_content">
                                <div class="product_title"><a href="{{ route('product.show', ['id' => $product->id]) }}">{{ $product->name }}</a></div>
                                <div class="product_price">${{ $product->price }}</div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->
    @include('parts.subscribe')

@endsection

@section('script')
    <script src="{{asset('js/main_add.js')}}"></script>
    <script src="{{asset('js/product.js')}}"></script>
@endsection