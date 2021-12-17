<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Session;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function revenue(Request $request)
    {

        // $done_product = OrderDetail::orderByDESC('quantity')->get()->groupBy('product_id');
        //  $done_product = OrderDetail::orderByDESC('quantity')->get()->groupBy('product_id');

        // $done_product= DB::table('order_details')->select( DB::raw('SUM(quantity) as Tong'))
        //         ->groupBy('product_id')
        //         ->get();
        // $done_product = OrderDetail::select('SELECT p.product_name,p.unit_price, SUM(o.quantity) as Tong FROM order_details as o  INNER JOIN products as p ON o.product_id = p.id GROUP BY product_id ORDER BY Tong DESC');

        $s = '1=1 ';
        $startDate=$request->star;
        $endDate=$request->end;

        // if($request->star != null ){
        //     $s+='and creared_at>='+$request->star;
        // }
        // if($request->end != null ){
        //     $s+=' and creared_at<='+$request->end;
        // }
        //dd($startDate);
        if($request->star != null && $request->end != null)
        {
            $done_product = DB::table('order_details')->groupBy('products.product_name','products.unit_price')
           ->join('products', '.order_details.product_id', '=', 'products.id')
           ->join('orders', 'order_details.order_id', '=', 'orders.id')->whereBetween('orders.created_at',array($startDate,$endDate))
           ->select('products.product_name','products.unit_price', DB::raw('SUM(order_details.quantity) AS tong'))
           ->orderByDESC('tong')
           ->get();
        }else if($request->star != null){
            $done_product = DB::table('order_details')->groupBy('product_name','unit_price')
           ->join('products', 'product_id', '=', 'products.id')
           ->join('orders', 'order_details.order_id', '=', 'orders.id')->whereDate('orders.created_at','>=',$startDate)
           ->select('products.product_name','products.unit_price', DB::raw('SUM(order_details.quantity) AS tong'))
           ->orderByDESC('tong')
           ->get();
        }else if($request->end != null){
            $done_product = DB::table('order_details')->groupBy('product_name','unit_price')
           ->join('products', 'product_id', '=', 'products.id')
           ->join('orders', 'order_details.order_id', '=', 'orders.id')->whereDate('orders.created_at','<=',$endDate)
           ->select('products.product_name','products.unit_price', DB::raw('SUM(order_details.quantity) AS tong'))
           ->orderByDESC('tong')
           ->get();
        }else{
            //dd('dd');
            $done_product = DB::table('order_details')->groupBy('product_name','unit_price')
           ->join('products', 'product_id', '=', 'products.id')
           ->join('orders', 'order_details.order_id', '=', 'orders.id')
           ->select('products.product_name','products.unit_price', DB::raw('SUM(order_details.quantity) AS tong'))
           ->orderByDESC('tong')
           ->get();
        }

        $total_price = Order::get()->sum('grand_total');

        // $countTrashed = User::where('position','admin')->onlyTrashed()->count();
         return view('admin.statistics.revenue', compact('total_price','done_product'));

    }
    public function done_cate(){
        $done_cate =  DB::table('order_details')->groupBy('categories.category_name')
        ->join('products', 'order_details.product_id', '=', 'products.id')
        ->join('categories', 'products.product_id_category', '=', 'categories.id_cate')
        ->select('categories.category_name', DB::raw('COUNT(products.product_id_category) AS tong'))
        ->orderByDESC('tong')
        ->get();
        return view('admin.statistics.revenue-cate', compact('done_cate'));
     }

    public function user_vip(){
       $user_vip =  DB::table('orders')->groupBy('name','email')
       ->join('users', 'user_id', '=', 'users.id')
       ->select('users.name','users.email', DB::raw('COUNT(orders.user_id) AS tong'))
       ->orderByDESC('tong')
       ->get();
       $user_pro = DB::table('orders')->groupBy('name','email')
       ->join('users', 'user_id', '=', 'users.id')
       ->select('users.name','users.email', DB::raw('SUM(orders.grand_total) AS total'))
       ->orderByDESC('total')
       ->get();
       return view('admin.statistics.user', compact('user_vip','user_pro'));
    }



    // public function list_customer(){
    //     $customerAll = User::where('position',null)->get();
    //     $countTrashed = User::where('position',null)->onlyTrashed()->count();
    //     return view('admin.users.list_customer', compact('customerAll','countTrashed'));
    // }
}
