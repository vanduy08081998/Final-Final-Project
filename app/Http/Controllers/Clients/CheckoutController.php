<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkoutDetail() {
        return view('Clients.checkout.checkout-details');
    }
    public function checkoutShipping() {
        return view('Clients.checkout.checkout-shipping');
    }
    public function checkoutPayment() {
        return view('Clients.checkout.checkout-payment');
    }
    public function checkoutComplete() {
        return view('Clients.checkout.checkout-complete');
    }
    public function checkoutReview() {
        return view('Clients.checkout.checkout-review');
    }
}
