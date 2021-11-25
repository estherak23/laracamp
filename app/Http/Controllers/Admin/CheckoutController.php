<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Checkout\paid;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    // ambil dari checkout
    public function update(Request $request, Checkout $checkout)
    {
        // update jadi true tadinya false
        $checkout->is_paid = true;
        // kita save
        $checkout->save();

        // Send email
        Mail::to($checkout->User->email)->send(new paid($checkout));
// ngasih tau berhasil apa enggaya
        $request->session()->flash('success', "Checkout with ID {$checkout->id} has been updated");
        return redirect(route('admin.dashboard'));
    }
}
