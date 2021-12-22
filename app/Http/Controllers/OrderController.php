<?php

namespace App\Http\Controllers;
use App\Models\Statistical;
use App\Models\Order;
use App\Models\StatisticalProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\NotificationService;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('permission:QL đơn hàng', ['only' => ['index','show','paymentStatus','delivery']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->get();
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
        $order_details = $order->detail;

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
                $statistic_update->quantity = $statistic_update->quantity + $order->detail->sum('quantity');
                $statistic_update->total_order = $statistic_update->total_order + 1;
                $statistic_update->save();
            }else{
                $statistic_new = new Statistical();
                $statistic_new->order_date = $order_date;
                $statistic_new->sales = $order->grand_total;
                $statistic_new->quantity = $order->detail->sum('quantity');
                $statistic_new->total_order = 1;
                $statistic_new->save();
            }
            foreach($order_details as $key => $order_detail){
                $statistic_product_id = StatisticalProduct::where([['order_date',$order_date],['product_id',$order_detail->product_id]])->first();
                if(!$statistic_product_id){
                    $statistic_new_product = new StatisticalProduct();
                    $statistic_new_product->product_id = $order_detail->product_id;
                    $statistic_new_product->order_date = $order_date;
                    $statistic_new_product->sales = $order_detail->promotion_price;
                    $statistic_new_product->quantity = $order_detail->quantity;
                    $statistic_new_product->save();
                }
                else{
                $statistic_product_id->update([
                    'sales' => $statistic_product_id->sales + $order_detail->promotion_price,
                    'quantity' => $statistic_product_id->quantity + $order_detail->quantity
                ]);
                }
            }

        }
}

    public function delivery(Request $request){
        $order = Order::find($request->id);
        $order->update([
            'delivery_viewed' => $request->value
        ]);
        $service = new NotificationService();
        $service->store($order->user_id, $order->id, 'order', $request->value);
    }
}
