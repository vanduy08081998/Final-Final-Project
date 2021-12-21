<?php

namespace App\Http\Controllers\Clients;

use App\Models\Cart;
use App\Models\Order;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PaypalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $order->payment_status = 'Confirmed';
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
