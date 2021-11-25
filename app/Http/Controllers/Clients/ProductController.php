<?php

namespace App\Http\Controllers\Clients;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function shopGrid() {
        $categories = Category::where('category_parent_id', null)->orderBy('id_cate', 'desc')->get();
        $product = Product::orderByDESC('id')->get();
        $brands = Brand::orderByDESC('id')->get();
        // dd($product->where('product_id_category', 24)->count());
        return view('clients.shop.shop-grid-ls', [
            'product' => $product,
            'category' => $categories,
            'brands' => $brands,
        ]);
    }

    public function shopList() {
        return view('clients.shop.shop-list-ls');
    }

    public function productDetails($slug) {
        $product = Product::where('product_slug', $slug)->first();
        return view('clients.shop.product-details', compact('product'));
    }
}
