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
  public function productsBrand($slug)
  {

    if ($slug == 'all-brands') {
      $product = Product::simplePaginate(12);
      // $cate = null;
      // $cate_id = null;
      $pro = Product::orderByDESC('id')->count();
      $on = 0;
    } else {
      $brand = Brand::where('brand_slug', $slug)->first();
      $brand_id = $brand->id;
      $product = Product::where('product_id_brand', $brand_id)->simplePaginate(12);
      // $cate = Category::where('id_cate', $product->product_id_category)->first();
      // $cate_id = $cate->id;
      $pro = Product::orderByDESC('id')->where('product_id_brand', $brand_id)->count();
      $on = 1;
    }
    $min = Product::orderByDESC('id')->min('unit_price');
    $max = Product::orderByDESC('id')->max('unit_price');
    $products = Product::orderBy('id', 'asc')->get();
    $categories = Category::where('category_parent_id', null)->orderBy('id_cate', 'asc')->get();
    $brands = Brand::orderBy('id', 'asc')->get();
    return view('clients.shop.product-brand', [
      'min' => $min,
      'max' => $max,
      'product' => $product,
      'products' => $products,
      // 'cate' => $cate,
      'pro' => $pro,
      'category' => $categories,
      'brand_id' => $brand_id,
      'brands' => $brands,
      'id_brand' => $brand_id,
      'on' => $on
    ]);
  }

  public function quickview(Request $request)
  {

    $product = Product::find($request->id);


    return view('clients.inc.quickview-details', compact('product'));
  }

  public function productsCategory($category_slug)
  {
    $min = Product::orderByDESC('id')->min('unit_price');
    $max = Product::orderByDESC('id')->max('unit_price');
    $categories = Category::where('category_parent_id', null)->orderBy('id_cate', 'desc')->get();
    $product_category = Product::join('categories', 'product_id_category', '=', 'categories.id_cate')->where('category_slug', $category_slug)->orderByDESC('id')->get();
    $category_id = Category::where('category_slug', $category_slug)->first();
    $brands = Brand::orderByDESC('id')->get();
    return view('clients.shop.product-category', [
      'min' => $min,
      'max' => $max,
      'product_category' => $product_category,
      'category' => $categories,
      'brands' => $brands,
      'category_id' => $category_id,
    ]);
  }
  public function shopGrid($slug)
  {
    if ($slug == 'all-category') {
      $product = Product::simplePaginate(12);
      $cate = null;
      $cate_id = null;
      $pro = Product::orderByDESC('id')->count();
      $on = 0;
    } else {
      $cate = Category::where('category_slug', $slug)->first();
      $cate_id = $cate->id_cate;
      $product = Product::where('product_id_category', $cate_id)->simplePaginate(12);
      $pro = Product::orderByDESC('id')->where('product_id_category', $cate_id)->count();
      $on = 1;
    }
    $min = Product::orderByDESC('id')->min('unit_price');
    $max = Product::orderByDESC('id')->max('unit_price');
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
      'id_cate' => $cate_id,
      'on'=>$on
    ]);
  }

  public function searchByCate(Request $request)
  {
    if ($request->key == '') {
      $products = Product::simplePaginate(12);
    } else {
      $products = Product::orderByDESC('id')
        ->where('product_name', 'REGEXP', $request->key)->where('product_id_category', $request->id)->get();
    }
    return view('clients.shop.details.search', compact('products'));
  }

  public function searchByBrand(Request $request)
  {

    if ($request->brandbox == null) {
      $products = Product::all();
    } else {
      $products = Product::orderByDESC('id')->whereIn('product_id_brand', $request->brandbox)->get();
    }
    return view('clients.shop.details.search-by-brand', compact('products'));
  }

  public function shopList()
  {
    $min = Product::orderByDESC('id')->min('unit_price');
    $max = Product::orderByDESC('id')->max('unit_price');
    $categories = Category::where('category_parent_id', null)->orderBy('id_cate', 'desc')->get();
    $product = Product::orderByDESC('id')->get();
    $brands = Brand::orderByDESC('id')->get();
    return view('clients.shop.shop-list-ls', [
      'min' => $min,
      'max' => $max,
      'product' => $product,
      'category' => $categories,
      'brands' => $brands,
    ]);
  }

  public function brands()
  {
    $brands = Brand::orderByDESC('id')->get();
    return view('clients.shop.brands', [
      'brands' => $brands,
    ]);
  }

  public function productDetails($slug)
  {
    $product = Product::where('product_slug', $slug)->first();
    $product->update(['views' => $product->views + 1]);
    $variants = ProductVariant::where('id_product', $product->id)->get();
    return view('clients.shop.product-details', compact('product', 'variants'));
  }

  public function getVariantPrice(Request $request)
  {
    // $color = \App\Models\Color::where('color_code', $request->input('radio-custom-color'));
    $product = Product::where('id', $request->product_id)->first();
    $timestamp = time();
    if ($product->type_of_category == 'isNotAttribute') {

      if (count($product->flash_deals) == 0) {
        if ($product->discount != null) {
          if ($product->discount_unit == '%') {
            $price = $product->unit_price - ($product->unit_price * $product->discount / 100);
          } else {
            $price = $product->unit_price - $product->discount;
          }
        } else {
          $price = $product->unit_price;
        }
      } else {
        $flash_deal = $product->flash_deals()->first();
        if ($timestamp > $flash_deal->date_end) {
          if ($product->discount != null) {
            if ($product->discount_unit == '%') {
              $price = $product->unit_price - ($product->unit_price * $product->discount / 100);
            } else {
              $price = $product->unit_price - $product->discount;
            }
          } else {
            $price = $product->unit_price;
          }
        } else {
          $price = $product->unit_price - ($product->unit_price * $flash_deal->discount / 100);
        }
      }

      $product_quantity = $request->product_quantity;
      $quantity = $product->quantity;
      return response()->json([
        'price' => number_format($price * $product_quantity),
        'product_quantity' => $quantity,
      ]);
    } else {
      $str = '';
      $product_quantity = $request->product_quantity;
      if ($request->has('radio_custom_color')) {
        $str = $request['radio_custom_color'];
      }

      if (json_decode($product->choice_options) != null) {
        foreach (json_decode($product->choice_options) as $key => $choice) {
          if ($str != null) {
            $str .= '-' . str_replace([',', '/', '.', ' '], '', $request['radio_custom_' . $choice->attribute_id]);
          } else {
            $str .= str_replace([',', '/', '.', ' '], '', $request['radio_custom_' . $choice->attribute_id]);
          }
        }
      }

      $product_stock = ProductVariant::where('id_product', $request->product_id)->where('variant', $str)->first();

      $price = 0;
      if ($product_stock != null) {
        if (count($product->flash_deals) == 0) {
          if ($product->discount != null) {
            if ($product->discount_unit == '%') {
              $price = $product_stock->variant_price - ($product_stock->variant_price * $product->discount / 100);
            } else {
              $price = $product_stock->variant_price - $product->discount;
            }
          } else {
            $price = $product_stock->variant_price;
          }
        } else {
          $flash_deal = $product->flash_deals()->first();
          if ($timestamp > $flash_deal->date_end) {
            if ($product->discount != null) {
              if ($product->discount_unit == '%') {
                $price = $product_stock->variant_price - ($product_stock->variant_price * $product->discount / 100);
              } else {
                $price = $product_stock->variant_price - $product->discount;
              }
            } else {
              $price = $product_stock->variant_price;
            }
          } else {
            $price = $product_stock->variant_price - ($product_stock->variant_price * $flash_deal->discount / 100);
          }
        }
      } else {
        if (count($product->flash_deals) == 0) {
          if ($product->discount != null) {
            if ($product->discount_unit == '%') {
              $price = $product->unit_price - ($product->unit_price * $product->discount / 100);
            } else {
              $price = $product->unit_price - $product->discount;
            }
          } else {
            $price = $product->unit_price;
          }
        } else {
          $flash_deal = $product->flash_deals()->first();
          if ($timestamp > $flash_deal->date_end) {
            if ($product->discount != null) {
              if ($product->discount_unit == '%') {
                $price = $product->unit_price - ($product->unit_price * $product->discount / 100);
              } else {
                $price = $product->unit_price - $product->discount;
              }
            } else {
              $price = $product->unit_price;
            }
          } else {
            $price = $product->unit_price - ($product->unit_price * $flash_deal->discount / 100);
          }
        }
      }

      // $variant_quantity = $product_stock->variant_quantity;
      // $v_image = $product_stock->variant_image;
      return response()->json([
        'price' => number_format($price * $product_quantity),
        // 'product_quantity' => $variant_quantity,
        'quantity' => $product_quantity,
        'variant' =>  $product_stock,
        // 'variant_image' => $v_image
      ]);
    }
  }

  public function productShort(Request $request)
  {
    if ($request->value == 'all') {
      if ($request->id_cate == 0) {
        $products = Product::orderBy('id', 'DESC')->simplePaginate(12);
      } else {
        $products = Product::orderBy('id', 'DESC')->where('product_id_category', $request->id_cate)->simplePaginate(12);
      }
    } else {
      if ($request->id_cate == 0) {
        $products = Product::orderBy($request->value, $request->orderby)->simplePaginate(12);
      } else {
        $products = Product::orderBy($request->value, $request->orderby)->where('product_id_category', $request->id_cate)->simplePaginate(12);
      }
    }
    return view('clients.shop.details.product-short', compact('products'));
  }
}
