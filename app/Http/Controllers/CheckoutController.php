<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\InfoOrder;
use App\Mail\AccountEmail;
use App\Mail\NewEmail;
use App\Mail\OrderEmail;
use App\Mail\SubscribeEmail;
use App\Order;
use App\Subscribe;
use App\User;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index(CheckoutRequest $request)
    {
        $messages = [];
        if ($request->account == 'on'){
            $result = User::checkEmail($request->checkout_email);
            if ($result == null) {
                $password = Str::random(8);
                $user = new User();
                $user->name = $request->checkout_name;
                $user->last_name = $request->checkout_last_name;
                $user->address = $request->checkout_address;
                $user->phone = $request->checkout_phone;
                $user->email = $request->checkout_email;
                $user->password = Hash::make($password);
                $user->save();

                Mail::to($request->checkout_email)->send(new AccountEmail($request->checkout_email, $password));

                $messages['account'] = 'Thank you for registration. Your password sent by email';
            }
            else{
                $messages['account'] = 'This email is registered';
            }
        }
        if ($request->subscribe == 'on'){
            $result = Subscribe::checkEmail($request->checkout_email);

            if ($result == null){
                Mail::to($request->checkout_email)->send(new SubscribeEmail($request->checkout_email));
                $messages['subscribe'] = 'Confirm subscription by email';
            }
            else {

                $messages['subscribe'] = Subscribe::checkEmailInSubscribers($request->checkout_email);
            }
        }

        $order = new Order();
        $order->name = $request->checkout_name;
        $order->last_name = $request->checkout_last_name;
        $order->address = $request->checkout_address;
        $order->phone = $request->checkout_phone;
        $order->email = $request->checkout_email;
        $order->payment = $request->payment;
        $order->total_price = session('cart.totalSum');
        $order->save();

        $orderId = Order::getIdOrder($request->checkout_email);

        $products = [];
        foreach (session('cart.products') as $product) {
            $InfoOrder = new InfoOrder();
            $InfoOrder->order_id = $orderId;
            $InfoOrder->product_name = $product->name;
            $InfoOrder->quantity = $product->quantity;
            $InfoOrder->product_price = $product->price;
            $InfoOrder->img = $product->img;
            $InfoOrder->save();
            $products[] = $InfoOrder;
        }
        Mail::to('shop.ggvabi@gmail.com')->send(new NewEmail($request->checkout_email, $orderId, $order, $products));
        Mail::to($request->checkout_email)->send(new OrderEmail($request->checkout_email, $orderId, $order, $products));
        $messages['order'] = "Thank you for the order, your order №:$orderId";

        session()->forget('cart');
        return view('checkout.checkout', compact('messages'));
    }

    public function show(){
        if (session('cart')){
            return view('checkout.checkout');
        }
        else{
            return redirect('/');
        }

    }
}
