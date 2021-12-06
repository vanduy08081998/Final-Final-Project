<?php

namespace App\Http\Controllers\Clients;

use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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

    public function getShippingAddress(Request $request){
        $item = array();
        $options = array();
        $shipping_address = session()->get('shipping_address');
        $options['name'] = $request->name;
        $options['email'] = $request->email;
        $options['address'] = $request->address;

        array_push($item, $options);

        if($shipping_address != null){
            $shipping_address = $item;
            session()->push('shipping_address', $shipping_address);
        }else{
            session()->push('shipping_address', $item);
        }
        return response()->json($shipping_address);
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
}
