<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'checkout_name' => 'required|min:3|max:15',
                'checkout_last_name' => 'required|min:3|max:15',
                'checkout_address' => 'required|min:3|max:30',
                'checkout_phone' => 'required|min:3|max:15',
                'checkout_email' => 'required|email',
        ];
    }
}
