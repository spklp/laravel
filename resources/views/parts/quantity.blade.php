<div class="row cart_items_row">

    @foreach(session('cart.products') as $product)
        <div class="col-12">
            <!-- Cart Item -->

            <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                <!-- Name -->
                <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_item_image">
                        <div><img src="{{ asset($product->img) }}" alt=""></div>
                    </div>
                    <div class="cart_item_name_container">
                        <div class="cart_item_name"><a href="#">{{ $product->name }}</a></div>

                    </div>
                </div>

                <!-- Price -->
                <div class="cart_item_price">${{ $product->price }}</div>
                <!-- Quantity -->


                <div class="cart_item_quantity">
                    <div class="product_quantity_container">
                        <div class="product_quantity clearfix">
                            <span>Qty</span>
                            <input  class="quantity_input" name="" type="text" pattern="[0-9]*" value="{{ $product->quantity }}">
                            <div class="quantity_buttons">
                                <div class="quantity_inc quantity_control" data-id="{{$product->id}}"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                <div class="quantity_dec quantity_control" data-id="{{$product->id}}"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total -->
                <div class="cart_item_total">${{ $product->price * $product->quantity }}</div>
            </div>
        </div>



    @endforeach

</div>