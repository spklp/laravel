@extends('layouts.layout', ['title' => "Sublime"])

@section('content')

    <div class="home">
        <div class="home_slider_container">

            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url({{asset('images/home_slider_1.jpg')}})"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">A new Online Shop experience.</div>
                                        <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                                        <div class="button button_light home_button"><a href="{{route('category.index', ['activeCategory' => 'all']) }}">Shop Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url({{asset('images/home_slider_1.jpg')}})"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">A new Online Shop experience.</div>
                                        <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                                        <div class="button button_light home_button"><a href="{{route('category.index', ['activeCategory' => 'all']) }}">Shop Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url({{asset('images/home_slider_1.jpg')}})"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">A new Online Shop experience.</div>
                                        <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                                        <div class="button button_light home_button"><a href="{{route('category.index', ['activeCategory' => 'all']) }}">Shop Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Ads -->

    <div class="avds">
        <div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">

            <div class="avds_small">
                <div class="avds_background" style="background-image:url({{asset('images/avds_small.jpg')}})"></div>
                <div class="avds_small_inner">
                    <div class="avds_discount_container">
                        <img src="{{asset('images/discount.png')}}" alt="">
                        <div>
                            <div class="avds_discount">
                                <div>20<span>%</span></div>
                                <div>Discount</div>
                            </div>
                        </div>
                    </div>
                    <div class="avds_small_content">
                        <div class="avds_title">{{$categories[4]->category_name}}</div>
                        <div class="avds_link"><a href="{{route('category.index', ['activeCategory' => $categories[4]->link_name]) }}">See More</a></div>
                    </div>
                </div>
            </div>

            <div class="avds_large">
                <div class="avds_background" style="background-image:url({{asset('images/avds_large.jpg')}})"></div>
                <div class="avds_large_container">
                    <div class="avds_large_content">
                        <div class="avds_title">{{ $categories[2]->category_name }}</div>
                        <div class="avds_text">{{ $categories[2]->category_descr }}.</div>
                        <div class="avds_link avds_link_large">
                            <a href="{{ route('category.index', ['activeCategory' => $categories[2]->link_name]) }}">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="product_grid">
                        @if($products->count())
                        <!-- Product -->
                        @foreach($products as $product)
                        <div class="product">
                            <div class="product_image"><a href="{{ route('product.show', ['id' => $product->id]) }}">
                                    <img src="{{asset($product->img)}}" alt=""></a></div>
                            @if($product->flag)
                            <div class="product_extra product_{{ $product->flag }}"><a href="/">{{ $product->flag }}</a></div>
                            @endif
                            <div class="product_content">
                                <div class="product_title"><a href="{{ route('product.show', ['id' => $product->id]) }}">{{ $product->name }}</a></div>
                                <div class="product_price">${{ $product->price }}</div>
                            </div>
                        </div>
                        @endforeach
                        @else
                            <div class="product" style="width: 500px">
                                <h2>No results found for: {{ $search }}</h2>
                            </div>
                        @endif


                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Ad -->

    <div class="avds_xl">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="avds_xl_container clearfix">
                        <div class="avds_xl_background" style="background-image:url({{asset('images/avds_xl.jpg')}})"></div>
                        <div class="avds_xl_content">
                            <div class="avds_title">{{ $categories[3]->category_name }}</div>
                            <div class="avds_text">{{ $categories[3]->category_descr }}</div>
                            <div class="avds_link avds_xl_link"><a href="{{ route('category.index', ['activeCategory' => $categories[3]->link_name]) }}">See More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Icon Boxes -->

    <div class="icon_boxes">
        <div class="container">
            <div class="row icon_box_row">

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="{{asset('images/icon_1.svg')}}" alt=""></div>
                        <div class="icon_box_title">Free Shipping Worldwide</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="{{asset('images/icon_2.svg')}}" alt=""></div>
                        <div class="icon_box_title">Free Returns</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="{{asset('images/icon_3.svg')}}" alt=""></div>
                        <div class="icon_box_title">24h Fast Support</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Newsletter -->
    @include('parts.subscribe')

@endsection

@include('parts.search')