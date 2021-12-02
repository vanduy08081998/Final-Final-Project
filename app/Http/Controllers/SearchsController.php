<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchsController extends Controller

{

    public function index()
    {
        return view('clients.about.testSearch');
    }

    public function find(Request $request) {
        $product = Product::orderByDESC('id')->where('product_name','REGEXP', $request->key)->get();
        return response()->json($product);
      }

}
