<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function searchs(Request $request) {
        $min = Product::orderByDESC('id')->min('unit_price');
        $max = Product::orderByDESC('id')->max('unit_price');
        $search = Product::orderByDESC('id')
        ->where('product_name','REGEXP', $request->key)->get();
        return view('clients.shop.search', [
            'min' => $min,
            'max' => $max,
            'search' => $search
        ]);
    }

    public function range(Request $request){
        $min = Product::orderByDESC('id')->min('unit_price');
        $max = Product::orderByDESC('id')->max('unit_price');
        $search = Product::where('unit_price','>=',$min)
        ->where('unit_price', '<=', $request->range)->get();
        return view('clients.shop.search', [
            'min' => $min,
            'max' => $max,
            'search' => $search
            ]);
    }
}
