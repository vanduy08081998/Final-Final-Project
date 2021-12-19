<?php

namespace App\Http\Controllers;
use App\Models\Statistical;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $delivery_viewed = DB::table('delivery_viewed')->get();
        return view('admin.orders.index', compact('orders', 'delivery_viewed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
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

    public function paymentStatus(Request $request){
        $order = Order::where('id',$request->id)->update(['payment_status' => $request->value]);
        $order = Order::where('id',$request->id)->first();
        if($order->payment_status == 'Confirmed'){
            $total_order = 0;
			$sales = 0;
			$profit = 0;
			$quantity = 0;


            $order_date = date("Y-m-d",$order->date);
            $statistic = Statistical::where('order_date',$order_date)->get();
            if($statistic){
                $statistic_count = $statistic->count();
            }else{
                $statistic_count = 0;
            }
                //update doanh so
            if($statistic_count>0){
                $statistic_update = Statistical::where('order_date',$order_date)->first();
                $statistic_update->sales = $statistic_update->sales + $order->grand_total;
                $statistic_update->quantity = $statistic_update->quantity + $order->order_details->sum('quantity');
                $statistic_update->total_order = $statistic_update->total_order + 1;
                $statistic_update->save();
            }else{
                $statistic_new = new Statistical();
                $statistic_new->order_date = $order_date;
                $statistic_new->sales = $order->grand_total;
                $statistic_new->quantity = $order->order_details->sum('quantity');
                $statistic_new->total_order = 1;
                $statistic_new->save();
            }
        }
    }

    public function delivery(Request $request){
        DB::table('orders')->where('id', $request->id)->update([
            'delivery_viewed' => $request->value
        ]);
    }
}
