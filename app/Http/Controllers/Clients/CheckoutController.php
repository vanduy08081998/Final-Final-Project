<?php

namespace App\Http\Controllers\Clients;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Wards;
use App\Mail\SendMail;
use App\Mail\OrderMail;
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
        return view('clients.checkout.checkout-details')->with(compact('shipping_default', 'shipping_all', 'provinces', 'districts', 'wards', 'user'));
    }
    public function checkoutShipping()
    {
        $shipping_methods = DB::table('shipping_method')->get();
        return view('clients.checkout.checkout-shipping', compact('shipping_methods'));
    }
    public function checkoutPayment()
    {
        return view('clients.checkout.checkout-payment');
    }
    public function checkoutComplete()
    {
        return view('clients.checkout.checkout-complete');
    }
    public function checkoutReview()
    {
        return view('clients.checkout.checkout-review');
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
        $options['phone'] = $request->phone;

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
                $product_details['variant'] = $cart->variant;
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
        $order->code = $request->hiddenSaleCode;
        $order->date = strtotime(date('Y-m-d H:i:s'));
        $order->grand_total = $request->total * (100 - $request->promocodeInsert) / 100;
        $order->save();
        $order->products()->attach($product);

        foreach ($productID as $key =>  $pro) {
            Cart::where('product_id', $pro)->where('user_id', auth()->user()->id)->first()->delete();
        }

        Mail::to(auth()->user()->email)->send(new OrderMail($order));
        return response()->json($product);
    }

    public function promotionCode(Request $request)
    {
        $promocode = DB::table('discount')->where('discount_code', $request->promocode)->first();
        if (!$promocode) {
            return response()->json(['error' => 'Mã giảm giá không trùng khớp']);
        } else {
            if($promocode->discount_limit <= 0){
                return response()->json(['error' => 'Mã giảm giá đã hết số lượng', 'promocode' => $promocode]);
            }else{
                DB::table('discount')->where('discount_code', $request->promocode)->update([
                    'discount_limit' => $promocode->discount_limit - 1
                ]);
            }
            return response()->json(['success' => 'Nhập mã giảm giá thành công bạn được giảm giá '. $promocode->discount_deduct.' %', 'discount' => $promocode->discount_deduct]);
        }
    }
}


