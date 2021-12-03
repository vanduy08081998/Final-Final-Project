<?php

namespace App\Http\Controllers\Clients;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function productsBrand($id) {
        $min = Product::orderByDESC('id')->min('unit_price');
        $max = Product::orderByDESC('id')->max('unit_price');
        $categories = Category::where('category_parent_id', null)->orderBy('id_cate', 'desc')->get();
        $product_brand = Product::where('product_id_brand',$id)->orderByDESC('id')->get();
        $brand_id = Brand::where('id',$id)->first();
        $brands = Brand::orderByDESC('id')->get();
        return view('clients.shop.product-brand', [
            'min' => $min,
            'max' => $max,
            'product_brand' => $product_brand,
            'category' => $categories,
            'brands' => $brands,
            'brand_id'=> $brand_id,
    
        ]);
    }
    public function productsCategory($id_cate) {
        $min = Product::orderByDESC('id')->min('unit_price');
        $max = Product::orderByDESC('id')->max('unit_price');
        $categories = Category::where('category_parent_id', null)->orderBy('id_cate', 'desc')->get();
        $product_category = Product::where('product_id_category',$id_cate)->orderByDESC('id')->get();
        $category_id = Category::where('id_cate',$id_cate)->first();
        $brands = Brand::orderByDESC('id')->get();
        return view('clients.shop.product-category', [
            'min' => $min,
            'max' => $max,
            'product_category' => $product_category,
            'category' => $categories,
            'brands' => $brands,
            'category_id' =>$category_id,
    
        ]);
    }
    public function shopGrid() {
        $min = Product::orderByDESC('id')->min('unit_price');
        $max = Product::orderByDESC('id')->max('unit_price');
        $categories = Category::where('category_parent_id', null)->orderBy('id_cate', 'desc')->get();
        $product = Product::orderByDESC('id')->get();
        $brands = Brand::orderByDESC('id')->get();
        return view('clients.shop.shop-grid-ls', [
            'min' => $min,
            'max' => $max,
            'product' => $product,
            'category' => $categories,
            'brands' => $brands,
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

  public function brands()
  {
    // $categories = Category::where('category_parent_id', null)->orderBy('id_cate', 'desc')->get();
    // $product = Product::orderByDESC('id')->get();
    $brands = Brand::orderByDESC('id')->get();
    // dd($product->where('product_id_category', 24)->count());
    return view('clients.shop.brands', [
      'brands' => $brands,
    ]);
  }

  public function productDetails($slug)
  {
    $product = Product::where('product_slug', $slug)->first();
    $variants = ProductVariant::where('id_product', $product->id)->get();
    return view('clients.shop.product-details', compact('product', 'variants'));
  }

  public function getVariantPrice(Request $request)
  {
    // $color = \App\Models\Color::where('color_code', $request->input('radio-custom-color'));
    $product = Product::where('id', $request->product_id)->first();
    if ($product->type_of_category == 'isNotAttribute') {

      $price = $product->unit_price;
      $product_quantity = $request->product_quantity;
      $quantity = $product->quantity;
      return response()->json([
        'price' => number_format($price * $product_quantity),
        'product_quantity' => $quantity,
      ]);
    } else {
      $str = '';
      $specifications = '';
      $product_quantity = $request->product_quantity;
      if ($request->has('radio_custom_color')) {
        $str = $request['radio_custom_color'];
      }

      if (json_decode($product->choice_options) != null) {
        foreach (json_decode($product->choice_options) as $key => $choice) {
          $specifications .= '
                                        <div class="d-flex">
                                            <strong>' . \App\Models\Attribute::where('id', $choice->attribute_id)->first()->name . ':  </strong>
                                            <p>&nbsp; ' . $request['radio_custom_' . $choice->attribute_id] . '</p>
                                        </div>
                    ';
          if ($str != null) {
            $str .= '-' . str_replace(' ', '', $request['radio_custom_' . $choice->attribute_id]);
          } else {
            $str .= str_replace(' ', '', $request['radio_custom_' . $choice->attribute_id]);
          }
        }
      }

      $product_stock = ProductVariant::where('id_product', $request->product_id)->where('variant', $str)->first();
      $price = $product_stock->variant_price;
      $variant_quantity = $product_stock->variant_quantity;
      $v_image = $product_stock->variant_image;
      return response()->json([
        'price' => number_format($price * $product_quantity),
        'product_quantity' => $variant_quantity,
        'quantity' => $product_quantity,
        'variant' =>  $product_stock,
        'specifications' => $specifications,
        'variant_image' => $v_image
      ]);
    }
  }
}
