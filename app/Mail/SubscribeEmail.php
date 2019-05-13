<?php

namespace App\Mail;


use App\Subscribe;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class SubscribeEmail extends Mailable
{
    public $key;
    protected $email;


    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {

        $this->email = $email;
        $this->key = Str::random(20);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        $subscribe = new Subscribe();
        $subscribe->email = $this->email;
        $subscribe->key = $this->key;
        $subscribe->save();

        return $this->view('emails.sub');
    }

}
