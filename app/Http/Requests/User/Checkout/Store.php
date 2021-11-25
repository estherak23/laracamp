<?php

namespace App\Http\Requests\User\Checkout;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // cek apakah udah login belom yg boleh cuma yg udah login
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       //bulan saat ini
        $expiredValidation = date('Y-m', time());
        return [

            'name' => "required|string",
            // unik ke table user ,auth itu exception email yg login gak error jadi kalo update gak akan error
            'email' => "required|email|unique:users,email,".Auth::id().",id",
            'occupation' => "required|string",
            // digit antara 8-16
            'card_number' => 'required|numeric|digits_between:8,16',
            // after or equal itu yg berlaku expirednya sesuai kalo milih bulan setelah expired gak bisa
            // expired harus bulan saat ngisi atau setelahnya misal sekarang oktober kalo milih september error
            'expired' => 'required|date|date_format:Y-m|after_or_equal:'.$expiredValidation,
            'cvc' => 'required|numeric|digits:3'
        ];
    }
}
//cara pakenya dipanggil di checkoutcontroller 
//terus bagian store requestnya diganti store
