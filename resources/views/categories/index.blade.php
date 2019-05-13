@extends('layouts.layout', ['title' => "$category->category_name"])

@section('content')

    <div class="home home-notmain">
        <div class="home_container">
            <div class="home_background" style="background-image:url({{asset($category->category_img)}})"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">{{ $category->category_name }}<span>.</span></div>
                                <div class="home_text"><p>{{ $category->category_descr }}</p></div>
                            </div>
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
                    <!-- Product Sorting -->
                    <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                        <div class="results">Showing <span>{{ $products->total() }}</span> results</div>
                        <div class="sorting_container ml-md-auto">
                            <div class="sorting">
                                <ul class="item_sorting">
                                    <li>
                                        <span class="sorting_text">Sort by</span>
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        <ul>
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "title" }'><span>Name</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">

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


                    </div>
                    <div class="product_pagination">
                        {{ $products->links() }}
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

@section('script')
    <script src="{{asset('js/categories.js')}}"></script>
@endsection
