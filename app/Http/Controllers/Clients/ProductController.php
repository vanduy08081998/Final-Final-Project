<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function shopGrid() {
        $product = Product::orderByDESC('id')->get();
        return view('clients.shop.shop-grid-ls', [
            'product' => $product,
        ]);
    }

    public function shopList() {
        return view('clients.shop.shop-list-ls');
    }

    public function productDetails() {
        return view('clients.shop.product-details');
    }
}
