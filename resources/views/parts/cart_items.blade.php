@if(session('cart.totalQuantity') > 0 )

    <div class="row">
        <div class="col">
            <!-- Column Titles -->
            <div class="cart_info_columns clearfix">
                <div class="cart_info_col cart_info_col_product">Product</div>
                <div class="cart_info_col cart_info_col_price">Price</div>
                <div class="cart_info_col cart_info_col_quantity">Quantity</div>
                <div class="cart_info_col cart_info_col_total">Total</div>
            </div>
        </div>
    </div>
    <div class="row cart_items_row">

        @foreach(session('cart.products') as $product)
            <div class="col-12">
                <!-- Cart Item -->
                <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                    <!-- Name -->
                    <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                        <div class="cart_item_image">
                            <div><a href="{{ route('product.show', ['id' => $product->id]) }}">
                                    <img src="{{ asset($product->img) }}" alt=""></a></div>
                        </div>
                        <div class="cart_item_name_container">
                            <div class="cart_item_name"><a href="{{ route('product.show', ['id' => $product->id]) }}">{{ $product->name }}</a></div>


                        </div>
                    </div>

                    <!-- Price -->
                    <div class="cart_item_price">${{ $product->price }}</div>
                    <!-- Quantity -->


                    <div class="cart_item_quantity">
                        <div class="product_quantity_container">
                            <div class="product_quantity clearfix">
                                <span>Qty</span>
                                <input class="quantity_input" id="qty-value-{{$product->id}}" type="text" pattern="[0-9]*" value="{{ $product->quantity }}">
                                <div class="quantity_buttons" onclick="quantity({{$product->id}})">
                                    <div class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                    <div class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                    {{--<div class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>--}}
                                    {{--<div class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Total -->
                    <div class="cart_item_total">${{ $product->price * $product->quantity }}</div>

                    <div class="delete" onclick="delete_prod({{$product->id}})" style="text-align: center; cursor: pointer; vertical-align: middle; color: red"><span>&#10006;</span></div>
                </div>

            </div>

        @endforeach

    </div>
    <div class="row row_cart_buttons">
        <div class="col">
            <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                <div class="button continue_shopping_button newsletter_button"><a href="{{ route('category.index', ['id' => 'all']) }}">Continue shopping</a></div>
                <div class="cart_buttons_right ml-lg-auto">
                    <div class="button checkout_button newsletter_button">
                        <a type="button" class="cart_clear" href="#">Clear cart</a></div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row_extra">
        <div class="col-lg-4">

            <!-- Delivery -->
            <div class="delivery">
                <div class="section_title">Shipping method</div>
                <div class="section_subtitle">Select the one you want</div>
                <div class="delivery_options">
                    <label class="delivery_option clearfix">Next day delivery
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                        <span class="delivery_price">$4.99</span>
                    </label>
                    <label class="delivery_option clearfix">Standard delivery
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                        <span class="delivery_price">$1.99</span>
                    </label>
                    <label class="delivery_option clearfix">Personal pickup
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                        <span class="delivery_price">Free</span>
                    </label>
                </div>
            </div>

            <!-- Coupon Code -->
            <div class="coupon">
                <div class="section_title">Coupon code</div>
                <div class="section_subtitle">Enter your coupon code</div>
                <div class="coupon_form_container">
                    <form action="#" id="coupon_form" class="coupon_form">
                        <input type="text" class="coupon_input" required="required">
                        <button class="button coupon_button newsletter_button"><span>Apply</span></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 offset-lg-2">
            <div class="cart_total">
                <div class="section_title">Cart total</div>
                <div class="section_subtitle">Final info</div>
                <div class="cart_total_container">
                    <ul>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Subtotal</div>
                            <div class="cart_total_value ml-auto">${{ session('cart.totalSum') }}</div>
                        </li>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Shipping</div>
                            <div class="cart_total_value ml-auto">Free</div>
                        </li>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Total</div>
                            <div class="cart_total_value ml-auto">${{ session('cart.totalSum') }}</div>
                        </li>
                    </ul>
                </div>
                <div class="button checkout_button newsletter_button"><a href="{{ route('checkout.show') }}">Proceed to checkout</a></div>
                {{--<div class="cart_buttons_right ml-lg-auto">--}}
                {{--<div class="button checkout_button newsletter_button">--}}
                {{--<button><span>Proceed to checkout</span></button>--}}
                {{--</div>--}}
                {{--</div>--}}

            </div>
        </div>
    </div>

@else
    <h2>Your shopping cart is empty</h2>
    <div class="row row_cart_buttons">
        <div class="col">
            <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                <div class="button continue_shopping_button newsletter_button"><a href="{{ route('category.index', ['id' => 'all']) }}">Continue shopping</a></div>
                <div class="cart_buttons_right ml-lg-auto">

                </div>
            </div>
        </div>
    </div>


@endif
<script>
    $('.cart_clear').on('click', function (event) {
        event.preventDefault();
        if ( confirm('Do you really want to clear the cart?')) {
            $.ajax({
                url: '/cart/clear',
                data: {},
                type: 'GET',
                success: function (res) {
                    $('#cart_content').html(res);
                    updateCart();
                },
                error: function () {
                    alert('error');
                }
            })
        }
    });
</script>
<script>
    if($('.product_quantity').length)
    {
        var incButton = $('.quantity_inc');
        var decButton = $('.quantity_dec');

        var originalVal;
        var endVal;

        incButton.on('click', function()
        {
            originalVal = $(this).parent().parent().find($('.quantity_input')).val();
            endVal = parseFloat(originalVal) + 1;
            $(this).parent().parent().find($('.quantity_input')).val(endVal);
        });

        decButton.on('click', function()
        {
            originalVal = $(this).parent().parent().find($('.quantity_input')).val();
            if(originalVal > 0)
            {
                endVal = parseFloat(originalVal) - 1;
                $(this).parent().parent().find($('.quantity_input')).val(endVal);
            }
        });
    }
</script>