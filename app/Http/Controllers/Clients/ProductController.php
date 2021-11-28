<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function shopGrid() {
        $min = Product::orderByDESC('id')->min('unit_price');
        $max = Product::orderByDESC('id')->max('unit_price');
        $product = Product::orderByDESC('id')->get();
        return view('clients.shop.shop-grid-ls', [
            'min' => $min,
            'max' => $max,
            'product' => $product,
        ]);
    }

    public function shopList() {
        $min = Product::orderByDESC('id')->min('unit_price');
        $max = Product::orderByDESC('id')->max('unit_price');
        $product = Product::orderByDESC('id')->get();
        return view('clients.shop.shop-list-ls', [
            'min' => $min,
            'max' => $max,
            'product' => $product,
        ]);
    }

    public function productDetails($slug) {
        $product = Product::where('product_slug', $slug)->first();
        return view('clients.shop.product-details', compact('product'));
    }
}
