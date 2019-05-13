<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $email;
    public $orderId;
    public $order;
    public $products;

        /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $orderId, $order, $products)
    {
        $this->email = $email;
        $this->orderId = $orderId;
        $this->order = $order;
        $this->products = $products;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.order');
    }
}
