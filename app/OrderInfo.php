<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    public $order;
    public $status;
    public $order_id;
    public $total_price;
    public $time;
    public $img;
    public $name;
    public $last_name;
    public $phone;
    public $email;
    public $address;
    public $payment;

}
