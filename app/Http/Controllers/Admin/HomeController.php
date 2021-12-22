<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Statistical;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Blog;
use App\Models\Review;
use App\Models\OrderDetail;
use App\Models\Comment;
use App\Models\Category;
use App\Models\StatisticalProduct;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $count_order = count(Order::all());
        $count_product = count(Product::all());
        $count_user = count(User::where('position',null)->get());
        $count_post = count(Blog::all());

        $category = Category::where('category_parent_id',null)->get();
		foreach($category as $key => $val){
			$chart_data[] = array(
				'x' => $val->category_name,
				'value' => count($val->products),
			);
		}
	    $data = json_encode($chart_data);
        // dd($data);
        $done_cate = DB::table('order_details')->groupBy('categories.category_name')
           ->join('orders', 'order_details.order_id', '=', 'orders.id')
           ->join('products', 'order_details.product_id', '=', 'products.id')
           ->join('categories', 'products.product_id_category', '=', 'categories.id_cate')
           ->select('categories.category_name', DB::raw('SUM(order_details.quantity) AS total'))
           ->orderByDESC('total')->where('orders.payment_status','Confirmed')
           ->get();
           if(count($done_cate)==0){
                $chart_data_buy = '';
           }else{
            foreach($done_cate as $key => $done){
                $chart_data_buy[] = array(
                    'x' => $done->category_name,
                    'value' => (float)$done->total,
                );
            }
           };
        $data_cate_buy = json_encode($chart_data_buy);
        return view('admin.dashboard')->with(compact('count_product','count_order','count_user','count_post','data','data_cate_buy'));
    }
    public function days_order(Request $request){
	    $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();
	    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
		$get = Statistical::whereBetween('order_date',[$sub30days,$now])->orderBy('order_date','ASC')->get();
		foreach($get as $key => $val){
			$chart_data[] = array(
				'period' => $val->order_date,
				'order' => $val->total_order,
				'sales' => $val->sales,
				'quantity' => $val->quantity
			);
		}
		echo $data = json_encode($chart_data);  
	}

    public function filter_by_date(Request $request){
		$data = $request->all();
		$form_date = $data['form_date'];
		$to_date = $data['to_date'];
		$get = Statistical::whereBetween('order_date',[$form_date,$to_date])->orderBy('order_date','ASC')->get();
        $get_count = $get->count();
        if($get_count == 0){
            $chart_data = [];
        }else{
		foreach($get as $key => $val){
	
			$chart_data[] = array(
	
				'period' => $val->order_date,
				'order' => $val->total_order,
				'sales' => $val->sales,
				'quantity' => $val->quantity
			);
		}
        }
	
		echo $data = json_encode($chart_data);  
	}


    
	public function dashboard_filter(Request $request){
        $data = $request->all();
         $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
         $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString(); 
         $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        
        $dashboard = $data['dashboard_value'];
        
        if($dashboard=='week'){
            $get = Statistical::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();
        }
        elseif($dashboard=='today'){
            $get = Statistical::where('order_date',$now)->get();
        }
        elseif($dashboard=='month'){
            $get = Statistical::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
        }else{
            $get = Statistical::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
        }

        $get_count = $get->count();
        if($get_count == 0){
            $chart_data = [];
        }else{
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'quantity' => $val->quantity
            );
        }
        }
        echo json_encode($chart_data);  
    }

    public function chart_product_line(Request $request){
        $product = Product::find($request->id);
	    $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();
	    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
		$get = StatisticalProduct::where('product_id', $request->id)->whereBetween('order_date',[$sub30days,$now])->orderBy('order_date','ASC')->get();
		foreach($get as $key => $val){
			$chart_data[] = array(
				'period' => $val->order_date,
				'sales' => $val->sales,
				'quantity' => $val->quantity,
                'id' => $product->id,
                'name' => $product->product_name
			);
		}
		echo $data = json_encode($chart_data);  
	}
    public function chart_product_max(){
        $count_buy = DB::table('order_details')
        ->select('product_id', DB::raw('count(*) as count_buy'))
       ->groupBy('product_id')
         ->orderBy('count_buy', 'DESC')
       ->pluck('product_id')
       ->all();
       $product_max_buy = Product::with(['reviews','comments','orders'])->whereIn('id', $count_buy)->orderByRaw(\DB::raw("FIELD(id, ".implode(",",$count_buy).")"))->first();
       $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();
	    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
		$get = StatisticalProduct::where('product_id', $product_max_buy->id)->whereBetween('order_date',[$sub30days,$now])->orderBy('order_date','ASC')->get();
        foreach($get as $key => $val){
			$chart_data[] = array(
				'period' => $val->order_date,
				'sales' => $val->sales,
				'quantity' => $val->quantity,
                'id' => $product_max_buy->id,
                'name' => $product_max_buy->product_name
			);
		}
		echo $data = json_encode($chart_data);  
    }
    public function filter_by_date_product(Request $request){
        $data = $request->all();
		$form_date = $data['form_date'];
		$to_date = $data['to_date'];
        $product = Product::find($data['id']);
		$get = StatisticalProduct::where('product_id', $product->id)->whereBetween('order_date',[$form_date,$to_date])->orderBy('order_date','ASC')->get();
        $get_count = $get->count();
        if($get_count == 0){
            $chart_data = [];
        }else{
		foreach($get as $key => $val){
			$chart_data[] = array(	
				'period' => $val->order_date,
				'sales' => $val->sales,
				'quantity' => $val->quantity,
                'id' => $product->id,
                'name' => $product->product_name
			);
		}
        }
	
		echo $data = json_encode($chart_data);  
    }
    public function dashboard_filter_product(Request $request){
         $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
         $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString(); 
         $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        
        $dashboard = $request->dashboard_value;
        
        if($dashboard=='week'){
            $get = StatisticalProduct::where('product_id', $request->id)->whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();
        }
        elseif($dashboard=='today'){
            $get = StatisticalProduct::where('product_id', $request->id)->where('order_date',$now)->get();
        }
        elseif($dashboard=='month'){
            $get = StatisticalProduct::where('product_id', $request->id)->whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
        }else{
            $get = StatisticalProduct::where('product_id', $request->id)->whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
        }

        $get_count = $get->count();
        if($get_count == 0){
            $chart_data = [];
        }else{
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
				'sales' => $val->sales,
				'quantity' => $val->quantity,
            );
        }
        }
        echo json_encode($chart_data);  
    }



}
