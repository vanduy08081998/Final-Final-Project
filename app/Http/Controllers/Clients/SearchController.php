<?php

namespace App\Http\Controllers\Clients;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function searchs(Request $request) {
        if($request->category == 0){
            $product = Product::where('product_name','REGEXP', $request->key)->simplePaginate(12);
            $pro = Product::where('product_name','REGEXP', $request->key)->count();
        }else {
            $product = Product::where('product_id_category', $request->category)
            ->where('product_name','REGEXP', $request->key)->simplePaginate(12);
            $pro = Product::where('product_id_category', $request->category)
            ->where('product_name','REGEXP', $request->key)->count();
        }
        $min = Product::orderByDESC('id')->min('unit_price') ;
        $max = Product::orderByDESC('id')->max('unit_price');
        $cate = null;
        $products= Product::orderBy('id', 'asc')->get();
        $categories = Category::where('category_parent_id', null)->orderBy('id_cate', 'asc')->get();
        $brands = Brand::orderBy('id', 'asc')->get();
        return view('clients.shop.shop-grid-ls', [
            'min' => $min,
            'max' => $max,
            'product' => $product,
            'products' => $products,
            'cate' => $cate,
            'pro' => $pro,
            'category' => $categories,
            'brands' => $brands,
            'id_cate' => 0
        ]);
    }


    public function range(Request $request){
        $min = Product::orderByDESC('id')->min('unit_price') ;
        $max = Product::orderByDESC('id')->max('unit_price');
        $product = Product::where('unit_price','>=',$min)
        ->where('unit_price', '<=', $request->range)->simplePaginate(12);
        $cate = null;
        $pro = Product::where('unit_price','>=',$min)
        ->where('unit_price', '<=', $request->range)->count();
        $products = Product::orderBy('id', 'asc')->get();
        $categories = Category::where('category_parent_id', null)->orderBy('id_cate', 'asc')->get();
        $brands = Brand::orderBy('id', 'asc')->get();
        return view('clients.shop.shop-grid-ls', [
            'min' => $min,
            'max' => $max,
            'product' => $product,
            'products' => $products,
            'cate' => $cate,
            'pro' => $pro,
            'category' => $categories,
            'brands' => $brands,
            'id_cate' => 0
        ]);
    }

    public function find(Request $request) {
        $product = Product::where('product_name', 'LIKE', '%' . $request->get('key') . '%')->get();
         return response()->json($product);
      }

}
