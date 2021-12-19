<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistical;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.dashboard');
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
        
        if($dashboard=='tuannay'){
            $get = Statistical::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();
        }
        elseif($dashboard=='homnay'){
            $get = Statistical::where('order_date',$now)->get();
        }
        elseif($dashboard=='thangnay'){
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

}
