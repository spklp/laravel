<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart {


    static function quantity($id, $mod){
        if ($mod == 'inc'){
            $cartProduct = session("cart.products.$id");
            $cartProduct->quantity += 1;
            session()->put("cart.products.$id", $cartProduct);
            return session("cart.products.$id");
        }
    }
    public function addToCart($product, $qnt)
    {
        if (session("cart.products.$product->id")) {
            $cartProduct = (session("cart.products.$product->id"));
            $cartProduct->quantity += $qnt;
        }
        else{
            $cartProduct = new CartProduct($product, $qnt);
            session()->put("cart.products.$product->id", $cartProduct);
        }



        $this->getTotalQuantity();
        $this->getTotalSum();
    }

    public function updateQuantity($id, $qnt){
        if ($qnt > 0){
            $product = session("cart.products.$id");
            $product->quantity = $qnt;
            session()->put("cart.products.$id", $product);
        }
        else{
            session()->forget("cart.products.$id");
        }

        $this->getTotalQuantity();
        $this->getTotalSum();
    }


    protected function getTotalQuantity()
    {
        $totalQuantity = 0;
        foreach (session("cart.products") as $product){
            $totalQuantity += $product->quantity;
        }
        session()->put('cart.totalQuantity', $totalQuantity);
    }

    protected function getTotalSum()
    {
        $totalSum = 0;
        foreach (session("cart.products") as $product){
            $totalSum += $product->price * $product->quantity;
        }
        session()->put('cart.totalSum', $totalSum);

    }

    public function delete($id){
        session()->forget("cart.products.$id");
        $this->getTotalQuantity();
        $this->getTotalSum();
    }
}
