<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Subscribe extends Model
{
    public static function checkEmail($email){
        return self::where('email', $email)
                ->first();
    }
    public static function checkVerification($auth){
        return self::where('key', $auth)
                ->first();
    }

    public function verify(){
        $this->verification = true;
        $this->update();
    }

    public static function checkEmailInSubscribers($email){
        $result = Subscribe::checkEmail($email);

        if (isset($result)){
            if ($result->verification == false){
                return 'Your email is not confirmed';
            }
            else{
                return 'You are already subscribed to the newsletter';
            }
        }
        else{
            return 'Confirm subscription by email';
        }
    }

}
