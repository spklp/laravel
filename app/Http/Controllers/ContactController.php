<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactEmail;
use App\Mail\SubscribeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    public function send(ContactRequest $request)
    {
        Mail::to('shop.ggvabi@gmail.com')
                ->send(new ContactEmail($request));
        session()->flash('success', 'Your topic has been sent!');

        return view('contacts.index');
    }

}
