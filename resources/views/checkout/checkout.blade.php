@extends('layouts.layout', ['title' => "Checkout"])

@section('content')

    <div class="home home-small">
        <div class="home_container">
            <div class="home_background" style="background-image:url({{asset('images/cart.jpg')}})"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        <li><a href="{{ route('cart.show') }}">Shopping Cart</a></li>
                                        <li>Checkout</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout -->
    <div class="checkout">
        <div class="container">
            @if(session('cart'))
            <form action="{{ route('checkout.index') }}" method="post">
                @csrf
                @method('POST')
            <div class="row">



                <!-- Billing Info -->
                <div class="col-lg-6">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                    <div class="billing checkout_section">
                        <div class="section_title">Billing Address</div>
                        <div class="section_subtitle">Enter your address info</div>
                        <div class="checkout_form_container">
                            @guest
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_name">First Name*</label>
                                        <input type="text" name="checkout_name" class="checkout_input"
                                               value="{{ old('checkout_name') ?? ''}}"required="required">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Last Name*</label>
                                        <input type="text" name="checkout_last_name" class="checkout_input"
                                               value="{{ old('checkout_last_name') ?? ''}}" required="required">
                                    </div>
                                </div>
                                <div>
                                    <!-- Address -->
                                    <label for="checkout_address">Address*</label>
                                    <input type="text" name="checkout_address" class="checkout_input"
                                           value="{{ old('checkout_address') ?? ''}}" required="required">
                                </div>
                                <div>
                                    <!-- Phone no -->
                                    <label for="checkout_phone">Phone no*</label>
                                    <input type="phone" name="checkout_phone" class="checkout_input"
                                           value="{{ old('checkout_phone') ?? ''}}" required="required">
                                </div>
                                <div>
                                    <!-- Email -->
                                    <label for="checkout_email">Email Address*</label>
                                    <input type="email" name="checkout_email" class="checkout_input"
                                           value="{{ old('checkout_email') ?? '' }}" required="required">
                                </div>
                                <div class="checkout_extra">
                                    <div>
                                        <input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" checked="checked">
                                        <label for="checkbox_terms"><img src="{{asset('images/check.png')}}" alt=""></label>
                                        <span class="checkbox_title">Terms and conditions</span>
                                    </div>

                                    <div>
                                        <input type="checkbox" id="checkbox_account" name="account" class="regular_checkbox">
                                        <label for="checkbox_account"><img src="{{ asset('images/check.png') }}" alt=""></label>
                                        <span class="checkbox_title">Create an account</span>
                                    </div>

                                    <div>
                                        <input type="checkbox" id="checkbox_newsletter" name="subscribe" class="regular_checkbox">
                                        <label for="checkbox_newsletter"><img src="{{ asset('images/check.png') }}" alt=""></label>
                                        <span class="checkbox_title">Subscribe to our newsletter</span>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_name">First Name*</label>
                                        <input type="text" name="checkout_name" class="checkout_input"
                                               value="{{ old('checkout_name') ?? Auth::user()->name }}"required="required">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Last Name*</label>
                                        <input type="text" name="checkout_last_name" class="checkout_input"
                                               value="{{ old('checkout_last_name') ?? Auth::user()->last_name }}" required="required">
                                    </div>
                                </div>
                                <div>
                                    <!-- Address -->
                                    <label for="checkout_address">Address*</label>
                                    <input type="text" name="checkout_address" class="checkout_input"
                                           value="{{ old('checkout_address') ?? Auth::user()->address }}" required="required">
                                </div>
                                <div>
                                    <!-- Phone no -->
                                    <label for="checkout_phone">Phone no*</label>
                                    <input type="phone" name="checkout_phone" class="checkout_input"
                                           value="{{ old('checkout_phone') ?? Auth::user()->phone }}" required="required">
                                </div>
                                <div>
                                    <!-- Email -->
                                    <label for="checkout_email">Email Address*</label>
                                    <input type="email" name="checkout_email" class="checkout_input"
                                           value="{{ old('checkout_email') ?? Auth::user()->email  }}" required="required">
                                </div>
                                <div class="checkout_extra">
                                    <div>
                                        <input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" checked="checked">
                                        <label for="checkbox_terms"><img src="{{asset('images/check.png')}}" alt=""></label>
                                        <span class="checkbox_title">Terms and conditions</span>
                                    </div>

                                    <div>
                                        <input type="checkbox" id="checkbox_newsletter" name="subscribe" class="regular_checkbox">
                                        <label for="checkbox_newsletter"><img src="{{ asset('images/check.png') }}" alt=""></label>
                                        <span class="checkbox_title">Subscribe to our newsletter</span>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>

                <!-- OrderEmail Info -->

                <div class="col-lg-6">
                    <div class="order checkout_section">
                        <div class="section_title">Your order</div>
                        <div class="section_subtitle">Order details</div>

                        <!-- OrderEmail details -->
                        <div class="order_list_container">
                            <div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Product</div>
                                <div class="order_list_value ml-auto">{{ session('cart.totalQuantity') }}</div>
                            </div>
                            <ul class="order_list">
                                @foreach(session('cart.products') as $product)
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">{{ $product->name }}</div>
                                    <div class="order_list_value ml-auto">{{ $product->price }} x {{ $product->quantity }}</div>
                                </li>
                                @endforeach
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Subtotal</div>
                                    <div class="order_list_value ml-auto">${{session('cart.totalSum') }}</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Shipping</div>
                                    <div class="order_list_value ml-auto">Free</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Total</div>
                                    <div class="order_list_value ml-auto">${{session('cart.totalSum') }}</div>
                                </li>
                            </ul>
                        </div>

                        <!-- Payment Options -->
                        <div class="payment">
                            <div class="payment_options">
                                <label class="payment_option clearfix">Paypal
                                    <input type="radio" name="payment" value="Paypal">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="payment_option clearfix">Cach on delivery
                                    <input type="radio" name="payment" value="Cach on delivery">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="payment_option clearfix">Credit card
                                    <input type="radio" name="payment" value="Credit card">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="payment_option clearfix">Direct bank transfer
                                    <input type="radio" checked="checked" name="payment" value="Direct bank transfer">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <!-- OrderEmail Text -->
                        <div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</div>
                        @csrf
                        @method('POST')
                        <div class="cart_buttons_right ml-lg-auto">
                            <div class="button order_button newsletter_button">
                                <button><span>Place Order</span></button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            </form>
            @else
                @foreach($messages as $message)
                <h2>{{$message}}</h2>
                @endforeach
            @endif
        </div>
    </div>


@endsection

@section('script')
<script src="{{asset('js/custom.js')}}"></script>
<script src="js/checkout.js"></script>
@endsection
