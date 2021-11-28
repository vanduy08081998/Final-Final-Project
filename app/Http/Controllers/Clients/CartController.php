<?php

namespace App\Http\Controllers\Clients;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        if (auth()->check()) {
            $product = Product::where('id', $request->product_id)->first();
            $choice_options = array();
            if ($request->has('radio_custom_color')) {
                $colors = $request['radio_custom_color'];
                $options['colors'] = $colors;
            }

            if (json_decode($product->choice_options) != null) {
                foreach (json_decode($product->choice_options) as $key => $choice) {
                    $options[Attribute::find($choice->attribute_id)->slug] = $request['radio_custom_' . $choice->attribute_id];
                }
            } else {
                $options = null;
            }
            $item['product_name'] = $product->product_name;
            $item['specifications'] = $options;

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
                    'product_id' => $request->product_id
                ]);
            } else {
                $cart->update([
                    'quantity' => $cart->quantity + $request->product_quantity
                ]);
            }
            return response()->json(['success', 'success']);
        } else {
            $user_id = null;
            return response()->json(['error', 'error']);
        }
    }
    public function cartList()
    {
        return view('clients.checkout.shop-cart');
    }
}
