
    <span>Qty</span>
    <input type="text" pattern="[0-9]*" value="{{session("cart.products.$id")->quantity}}">
    <div class="quantity_buttons">
        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
    </div>