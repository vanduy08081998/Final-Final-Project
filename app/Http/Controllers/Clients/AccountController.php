<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function orderTracking() {
        return view('clients.account.order-tracking');
    }

    public function wishlist() {
        return view('clients.account.account-wishlist');
    }

    public function orderList() {
        return view('clients.account.account-orders');
    }

    public function accountInfo() {
        return view('clients.account.account-profile');
    }

    public function accountAddress() {
        return view('clients.account.account-address');
    }

    public function accountPayment() {
        return view('clients.account.account-payment');
    }
}
