<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartProduct;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::where('link_name', $request->name)
                ->first();

        $cart = new Cart();
        $cart->addToCart($product, $request->qnt);

        return session('cart.totalQuantity');
    }

    public function show()
    {
        $products = session('product');
        return view('cart.cart', compact('products'));
    }

    public function clear()
    {
        session()->forget('cart');
        return view('parts.cart_content');
    }

    public function update()
    {
        return view('parts.mini_cart');
    }

    public function quantity(Request $request)
    {
        $cart = new Cart();
        $cart->updateQuantity($request->id, $request->qnt);
        return view('parts.cart_items');
    }

    public function delete(Request $request)
    {
        $cart = new Cart();
        $cart->delete($request->id);
        return view('parts.cart_items');
    }
}
