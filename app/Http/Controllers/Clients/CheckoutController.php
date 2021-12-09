<?php

namespace App\Http\Controllers\Clients;

use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkoutDetail() {
        $shipping_default = Shipping::where([['user_id', Auth::user()->id],['default',1]])->first();
        $shipping_all = Shipping::where([['user_id', Auth::user()->id],['default',0]])->get();
        return view('Clients.checkout.checkout-details')->with(compact('shipping_default','shipping_all'));
    }
    public function checkoutShipping() {
        $shipping_methods = DB::table('shipping_method')->get();
        return view('Clients.checkout.checkout-shipping', compact('shipping_methods'));
    }
    public function checkoutPayment() {
        return view('Clients.checkout.checkout-payment');
    }
    public function checkoutComplete() {
        return view('Clients.checkout.checkout-complete');
    }
    public function checkoutReview() {
        return view('Clients.checkout.checkout-review');
    }

    public function checkoutCartCheckout(){
        if(auth()->check()){
            $carts = Cart::where('user_id', auth()->user()->id)->get();
        }
        return view('clients.checkout.Checkout.cart-checkout', compact('carts'));
    }

    public function getShippingAddress(Request $request){
        $options = array();
        $shipping_address = session()->get('shipping_address');
        $options['name'] = auth()->user()->name;
        $options['email'] = $request->email;
        $options['address'] = $request->address;

        if($shipping_address != null){
            $shipping_address = $options;
            session()->push('shipping_address', $shipping_address);
        }else{
            session()->push('shipping_address', $options);
        }
    }

    public function getShippingMethod(Request $request){
        $options = array();
        $shipping_method = DB::table('shipping_method')->where('id', $request->input('shipping_method'))->first();
        array_push($options, $shipping_method);
        $shipping_method_session = session()->get('shipping_method');

        if($shipping_method_session != null){
            $shipping_method_session = $options;
            session()->push('shipping_method', $shipping_method_session);
        }else{
            session()->push('shipping_method', $options);
        }
        return response()->json($shipping_method_session);
    }

    public function checkout(Request $request){
        $order = new Order;
        $shipping_address = session()->get('shipping_address');
        $shipping_method_session = session()->get('shipping_method');
        $user_id = auth()->user()->id;

        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $total = 0;
        $product = array();
        $product_details = [];
        $item = 0;
        foreach($cart as $key => $cart){
            foreach(json_decode($cart->specifications) as $key => $speciation){
                $total+= $speciation->variant_price * $cart->quantity;
                $product_details['product_id'] = $cart->product_id;
                $product_details['quantity'] = $cart->quantity;
                $product_details['promotion_price'] = $speciation->variant_price * $cart->quantity;
                $product_details['discount'] = \App\Models\Product::where('id', $cart->product_id)->first()->discount;

            }
            array_push($product, $product_details);
        }
        
        foreach($shipping_address as $key => $value){
            $shipping_address = json_encode($value,JSON_UNESCAPED_UNICODE);
        }
        
        $order->user_id = $user_id;
        
        foreach($shipping_method_session as $key => $method){
            $shipping_method = $method[0]->id;
        } 

        $order->shipping_address = $shipping_address;
        $order->shipping_status = $shipping_method;
        $order->payment_type = 'Tiền mặt';
        $order->grand_total = $total;

        $order->save();
        $order->products()->attach($product);
        return response()->json($product);
    }
}
