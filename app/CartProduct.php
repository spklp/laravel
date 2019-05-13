<?php
/**
 * Created by PhpStorm.
 * User: Kira
 * Date: 26.04.2019
 * Time: 18:10
 */

namespace App;


class CartProduct {
    public $id;
    public $name;
    public $price;
    public $img;
    public $quantity;



    public function __construct($product, $qnt) {
        $this->id = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->img = $product->img;
        $this->quantity = $qnt;

    }

}