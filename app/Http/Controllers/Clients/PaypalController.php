<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

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
    public function create()
    {
        $provider = new PayPalClient;
        $provider = \PayPal::setProvider();
        $config = [
            'mode'    => 'sandbox',
            'sandbox' => [
                'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', 'AVoCCe7dYAM9wd4Uh-G1rYJiygcqS3B8ZQVVHzDRU0qVnf7I3XsXDdnG0EIG_pXpYThvtskM1JrPemmx'),
                'client_secret'     => env('PAYPAL_SANDBOX_CLIENT_SECRET', 'EMNELGxc04Y49z47_MoGj6IZahZR_O0ZGQAGymtvICNjpEpPs7vCNGQ3CYAhf73Mq-XQA-7I1PKcut_E'),
                'app_id'            => 'APP-80W284485P519543T',
            ],
        
            'payment_action' => 'Sale',
            'currency'       => 'USD',
            'notify_url'     => 'https://your-app.com/paypal/notify',
            'locale'         => 'en_US',
            'validate_ssl'   => true,
        ];
        
        $provider->setApiCredentials($config);
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);
        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => 88.88
                    ],
                    "description" => "Hay chon toi"
                ]
            ]
        ]);
        return response()->json($order);
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
