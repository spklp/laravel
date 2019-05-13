<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static function getIdOrder($email){
        $order = Order::orderBy('id', 'desc')
                ->where('email', $email)
                ->first();
        return $order->id;
    }

}
