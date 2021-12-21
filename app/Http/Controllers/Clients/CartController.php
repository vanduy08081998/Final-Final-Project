<?php

namespace App\Http\Controllers\Clients;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CartController extends Controller
{
  public function addToCart(Request $request)
  {

    $timestamp = time();
    if (auth()->check()) {
      $product = Product::where('id', $request->product_id)->first();
      $choice_options = array();
      $str = '';
      if ($request->has('radio_custom_color')) {
        $colors = $request['radio_custom_color'];
        $item['colors'] = $colors;
        $str = $request['radio_custom_color'];
      } else {
        $item['colors'] = null;
      }

      if (json_decode($product->choice_options) != null) {
        foreach (json_decode($product->choice_options) as $key => $choice) {
          $options[Attribute::find($choice->attribute_id)->slug] = $request['radio_custom_' . $choice->attribute_id];
          if ($str != null) {
            $str .= '-' . str_replace([',', '/', '.', ' '], '', $request['radio_custom_' . $choice->attribute_id]);
          } else {
            $str .= str_replace([',', '/', '.', ' '], '', $request['radio_custom_' . $choice->attribute_id]);
          }
        }
      } else {
        $options = null;
        $str = '';
      }

      $product_variant = ProductVariant::where('id_product', $request->product_id)->where('variant', $str)->first();
      $item['product_name'] = $product->product_name;
      $item['specifications'] = $options;
      if ($product_variant != null) {
        if (count($product->flash_deals) == 0) {
          if ($product->discount != null) {
            if ($product->discount_unit == '%') {
              $price = $product_variant->variant_price - ($product_variant->variant_price * $product->discount / 100);
            } else {
              $price = $product_variant->variant_price - $product->discount;
            }
          } else {
            $price = $product_variant->variant_price;
          }
        } else {
          $flash_deal = $product->flash_deals()->first();
          if ($timestamp > $flash_deal->date_end) {
            if ($product->discount != null) {
              if ($product->discount_unit == '%') {
                $price = $product_variant->variant_price - ($product_variant->variant_price * $product->discount / 100);
              } else {
                $price = $product_variant->variant_price - $product->discount;
              }
            } else {
              $price = $product_variant->variant_price;
            }
          } else {
            $price = $product_variant->variant_price - ($product_variant->variant_price * $flash_deal->discount / 100);
          }
        }

        $item['variant_price'] = $price;
        $item['variant_image'] = $product_variant->variant_image;
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
          if($timestamp > $flash_deal->date_end){
            if ($product->discount != null) {
              if ($product->discount_unit == '%') {
                $price = $product->unit_price - ($product->unit_price * $product->discount / 100);
              } else {
                $price = $product->unit_price - $product->discount;
              }
            } else {
              $price = $product->unit_price;
            }
          }else{
            $price = $product->unit_price - ($product->unit_price * $flash_deal->discount / 100);
          }
        }


        $item['variant_price'] = $price;
        $item['variant_image'] = $product->product_image;
      }

      array_push($choice_options, $item);
      $user_id = auth()->user()->id;
      $cart = Cart::where('product_id', $request->product_id)
        ->where('user_id', $user_id)
        ->where('specifications', json_encode($choice_options, JSON_UNESCAPED_UNICODE))
        ->first();

      if (!$cart) {
        Cart::create([
          'specifications' => json_encode($choice_options, JSON_UNESCAPED_UNICODE),
          'quantity' => $request->product_quantity,
          'user_id' => $user_id,
          'product_id' => $request->product_id,
          'variant' => $str
        ]);
      } else {
        $cart->update([
          'quantity' => $cart->quantity + $request->product_quantity
        ]);
      }
      return response()->json(['success' => 'success', 'str' => $str]);
    } else {
      $user_id = null;
      return response()->json(['error' => 'error']);
    }
  }
  public function cartList()
  {
    if (auth()->check()) {
      $user_id = auth()->user()->id;
      $carts = Cart::where('user_id', $user_id)->get();
      return view('clients.checkout.shop-cart', compact('carts'));
    } else {
      return view('clients.errors.404');
    }
  }

  public function cartDropdown()
  {
    if (auth()->check()) {
      $user_id = auth()->user()->id;
      $cart = Cart::where('user_id', $user_id)->get();
      return response()->view('clients.Inc.cart-dropdown', compact('cart'));
    } else {
      return response()->json('<a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="shop-cart.html"><i class="navbar-tool-icon ci-cart"></i></a><a
      href="shop-cart.html"><small style="margin-left: 1rem;">Giỏ hàng</small></a>
      <!-- Cart dropdown-->
      <div class="dropdown-menu dropdown-menu-end" style="width: 20rem">
        <p style="font-size:14; padding: 1rem 1rem;"><a href="' . url('/login') . '">Đăng nhập </a><span> Để mua hàng</span></p>
      </div>
      ');
    }
  }

  public function cartDelete(Request $request)
  {
    if (auth()->check()) {
      $user_id = auth()->user()->id;
      $count = 0;
      $cart = Cart::where('user_id', $user_id)->get();
      foreach ($cart as $index => $item) {
        $count = count($cart);
        if ($index == $request->index) {
          $cart[$request->index]->delete();
        }
      }
      return response()->json(['success' => 'Xóa thành công']);
    } else {
    }
  }

  public function cartUpdate(Request $request)
  {

    if (auth()->check()) {
      $user_id = auth()->user()->id;
      $cart = Cart::where('user_id', $user_id)->get();
      foreach ($cart as $index => $item) {
        if ($index == $request->index) {
          $cart[$index]->update([
            'quantity' => $request->quantity
          ]);
          if (json_decode($cart[$index]->specifications) != null) {
            foreach (json_decode($cart[$index]->specifications) as $key => $value) {
              $price = $value->variant_price;
            }
          }
        }
      }
      return response()->json(['success' => 'Chỉnh sủa thành công', 'price' => $price]);
    } else {
    }
  }

  public function cartTotals()
  {
    if (auth()->check()) {
      $user_id = auth()->user()->id;
      $cart = Cart::where('user_id', $user_id)->get();
      $totalprice = 0;
      foreach ($cart as  $cart) {
        if (json_decode($cart->specifications) != null) {
          foreach (json_decode($cart->specifications) as $key => $value) {
            $totalprice += $value->variant_price * $cart->quantity;
          }
        }
      }
      return response()->json(['totalprice' => $totalprice]);
    } else {
    }
  }

  public function carDeleteDefault($id){
    Cart::find($id)->delete();
    Toastr::success('Xóa thành công','Chúc mừng !');
    return redirect()->back();
  }
}
