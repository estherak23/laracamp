<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Checkout\Store;
use App\Mail\Checkout\AfterCheckout;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Camp $camp,Request $request)
    {
        // supaya kalo udah terdaftar dikelas ini gak bisa masuk ke checkout lagi
        // isRegister bikin atribut baru di camp model
        if ($camp -> isRegistered) {
            // flash alert kalo udah daftar kelas 
            //alert nya bikin di komponen tampilannya
            $request->session()->flash('error', "You're already registered on {$camp->title} camp.");
            return redirect(route('user.dashboard'));
        }
        return view('checkout.create', [
            'camp' => $camp
        ]);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //buat manggil validasi requestnya diganti store
     public function store(Store $request, Camp $camp)
    {
       // Mapping request data user id  dn camp id di backend lebih aman walau bisa dimasukin ke frontend
       $data = $request->all();
    //    ngambil id dari season login
    $data['user_id'] = Auth::id();
    $data['camp_id'] = $camp->id;
       // Update user data
       $user = Auth::user();
       $user->email = $data['email'];
       $user->name = $data['name'];
       $user->occupation = $data['occupation'];
       $user->save();

       // Create checkout
       $checkout = Checkout::create($data);

       //Send email
       //kirim email ke user yg login kirim juga email aftercheckout yg iinya data checkout
       Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));

       return redirect(route('checkout.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }

    public function success()
    {
        return view('checkout.success');
    }

    // buat baru untuk invoice buat di route web
    // public function invoice(Checkout $checkout)
    // {
    //     return $checkout;
    // }

}
