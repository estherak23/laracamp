<?php

namespace App\Http\Controllers;


use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {

        // ambil data yang login
        //with untuk terus ambil nama camp sama harganya yg sesuai dengan user id
        //bikin relasinya di bagian model supaya bisa keambil datanya
        //$checkout=Checkout::with('Camp')->WhereUserId(Auth::id())->get();
       
       //jadi bisa diarahin dashboardnya tergantung yg login user atau admin
        switch (Auth::user()->is_admin) {
            case true:
                return redirect(route('admin.dashboard'));
                break;

            default:
                return redirect(route('user.dashboard'));
                break;
        }
    }
}
