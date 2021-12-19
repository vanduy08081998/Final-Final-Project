<?php

namespace App\Http\Controllers\Clients;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Wards;
use App\Mail\SendMail;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Districts;
use App\Models\Provinces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkoutDetail()
    {
        $provinces = Provinces::all();
        $districts = Districts::all();
        $wards = Wards::all();
        $user = User::find(Auth()->user()->id);
        $shipping_default = Shipping::where([['user_id', Auth::user()->id], ['default', 1]])->first();
        $shipping_all = Shipping::where([['user_id', Auth::user()->id], ['default', 0]])->get();
        return view('Clients.checkout.checkout-details')->with(compact('shipping_default', 'shipping_all', 'provinces', 'districts', 'wards', 'user'));
    }
    public function checkoutShipping()
    {
        $shipping_methods = DB::table('shipping_method')->get();
        return view('Clients.checkout.checkout-shipping', compact('shipping_methods'));
    }
    public function checkoutPayment()
    {
        return view('Clients.checkout.checkout-payment');
    }
    public function checkoutComplete()
    {
        return view('Clients.checkout.checkout-complete');
    }
    public function checkoutReview()
    {
        return view('Clients.checkout.checkout-review');
    }

    public function checkoutCartCheckout()
    {
        if (auth()->check()) {
            $carts = Cart::where('user_id', auth()->user()->id)->get();
        }
        return view('clients.checkout.Checkout.cart-checkout', compact('carts'));
    }

    public function getShippingAddress(Request $request)
    {
        $options = array();
        $shipping_address = session()->get('shipping_address');
        $options['name'] = auth()->user()->name;
        $options['email'] = $request->email;
        $options['address'] = $request->address;

        if ($shipping_address != null) {
            $shipping_address = $options;
            session()->push('shipping_address', $shipping_address);
        } else {
            session()->push('shipping_address', $options);
        }
    }

    public function getShippingMethod(Request $request)
    {
        $options = array();
        $shipping_method = DB::table('shipping_method')->where('id', $request->input('shipping_method'))->first();
        array_push($options, $shipping_method);
        $shipping_method_session = session()->get('shipping_method');

        if ($shipping_method_session != null) {
            $shipping_method_session = $options;
            session()->push('shipping_method', $shipping_method_session);
        } else {
            session()->push('shipping_method', $options);
        }
        return response()->json($shipping_method_session);
    }

    public function checkout(Request $request)
    {
        $order = new Order;
        $shipping_address = session()->get('shipping_address');
        $shipping_method_session = session()->get('shipping_method');
        $user_id = auth()->user()->id;

        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $total = 0;
        $product = array();
        $product_details = [];
        $productID = [];
        $item = 0;
        foreach ($cart as $key => $cart) {
            foreach (json_decode($cart->specifications) as $key => $speciation) {
                $total += $speciation->variant_price * $cart->quantity;
                $product_details['product_id'] = $cart->product_id;
                $product_details['specification'] = $cart->specifications;
                $product_details['quantity'] = $cart->quantity;
                $product_details['promotion_price'] = $speciation->variant_price * $cart->quantity;
                if (\App\Models\Product::where('id', $cart->product_id)->first()->discount == null) {
                    $product_details['discount'] = 0;
                } else {
                    $product_details['discount'] = \App\Models\Product::where('id', $cart->product_id)->first()->discount;
                }
            }
            array_push($product, $product_details);
            array_push($productID, $cart->product_id);
        }

        foreach ($shipping_address as $key => $value) {
            $shipping_address = json_encode($value, JSON_UNESCAPED_UNICODE);
        }

        $order->user_id = $user_id;

        foreach ($shipping_method_session as $key => $method) {
            $shipping_method = $method[0]->id;
        }

        $order->shipping_address = $shipping_address;
        $order->shipping_status = $shipping_method;
        $order->payment_type = 'Tiền mặt';
        $order->payment_status = 'NotConfirm';
        $order->payment_details = '';
        $order->date = strtotime(date('Y-m-d H:i:s'));
        $order->grand_total = $request->total;
        $order->save();
        $order->products()->attach($product);

        foreach ($productID as $key =>  $pro) {
            Cart::where('product_id', $pro)->where('user_id', auth()->user()->id)->first()->delete();
        }
        return response()->json($product);
    }

    public function promotionCode(Request $request)
    {
        $promocode = DB::table('discount')->where('discount_code', $request->promocode)->first();
        if (!$promocode) {
            return response()->json(['error' => 'error']);
        } else {
            return response()->json(['success' => 'success', 'promocode' => $promocode]);
        }
    }
}
