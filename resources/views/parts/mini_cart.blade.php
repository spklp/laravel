
@if(session('cart.totalQuantity') > 0)
    <div>Cart <span>({{ session('cart.totalQuantity') }}, {{ session('cart.totalSum') }}$)</span></div>
@else
    <div>Cart <span>(0)</span></div>
@endif
