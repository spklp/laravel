<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\SubscribeRequest;
use App\Mail\SubscribeEmail;
use App\Product;
use App\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class SubscribeController extends Controller
{

    public function index(SubscribeRequest $request){
        if ($request->email) {
            $result = Subscribe::checkEmail($request->email);

            if (isset($result)){
                $msg = Subscribe::checkEmailInSubscribers($result->email);
                session()->flash('warning', $msg);
                return redirect('/');
            }
            else{
                Mail::to($request->email)->send(new SubscribeEmail($request->email));
                session()->flash('success', 'Confirm subscription by email');
                return redirect('/');
            }

        }
        return redirect('/');
    }

    public function verification(Request $request){

        $result = Subscribe::checkVerification($request->auth);

        if (isset($result)){
            if ($result->verification == false){
                $result->verify();
                session()->flash('success', 'Thank you for subscribing');
                return redirect('/');
            }
            else{
                return redirect('/');
            }
        }
        return redirect('/');
    }

}
