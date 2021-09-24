<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shopGrid() {
        return view('clients.shop.shop-grid-ls');
    }

    public function shopList() {
        return view('clients.shop.shop-list-ls');
    }

    public function productDetails() {
        return view('clients.shop.product-details');
    }
}
