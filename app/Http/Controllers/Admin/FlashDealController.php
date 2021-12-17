<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\FlashDeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class FlashDealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flashdeals = FlashDeal::all(); 
        return view('admin.flash-deals.index', compact('flashdeals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $products = Product::all();
      return view('admin.flash-deals.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flashdeal = new FlashDeal;

        $flashdeal->title = $request->title; // discount, deal_image, date
        $flashdeal->discount = $request->discount;
        $flashdeal->banner = $request->deal_image;

        if ($request->has('date')) {
            $var_date = explode(' - ', $request->date);
            $flashdeal->date_start = strtotime($var_date[0]);
            $flashdeal->date_end = strtotime($var_date[1]);
        }

        $flash_deal_array = array();
        $items = array();
        foreach(DB::table('flash_deals_products')->get() as $key => $val) {
            array_push($flash_deal_array, $val->product_id);
        }

   
        $flag = true;
        foreach($request->product_id as $key => $item){
            if(in_array($item, $flash_deal_array)){
                $flag = false;
                array_push($items,$item);
            }else{
                $flag = true;
                $flashdeal->save();
                FlashDeal::find($flashdeal->id)->products()->attach($item);
            }
            
        }

        if($flag == false){
            return redirect()->back()->with('message',$items);
        }else{
            Toastr::success('Thêm thành công', 'Chúc mừng');
            return redirect()->route('flash-deals.index');
        }      
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
    public function edit(FlashDeal $flash_deal)
    {
        $products = Product::all();
        return view('admin.flash-deals.edit', compact('flash_deal','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlashDeal $flash_deal)
    {
        $flash_deal->title = $request->title; // discount, deal_image, date
        $flash_deal->discount = $request->discount;
        $flash_deal->banner = $request->deal_image;

        if ($request->has('date')) {
            $var_date = explode(' - ', $request->date);
            $flash_deal->date_start = strtotime($var_date[0]);
            $flash_deal->date_end = strtotime($var_date[1]);
        }
        $flash_deal_array = array();
        $items = array();
        foreach(DB::table('flash_deals_products')->where('flash_deal_id','!=', $flash_deal->id)->get() as $key => $val) {
            array_push($flash_deal_array, $val->product_id);
        }

   
        $flag = true;
        foreach($request->product_id as $key => $item){
            if(in_array($item, $flash_deal_array)){
                $flag = false;
                array_push($items,$item);
            }else{
                $flag = true;
                $flash_deal->save();
                $flash_deal->products()->sync($request->product_id);
            }
        }
        if($flag == false){
            return redirect()->back()->with('message',$items);
        }else{
            Toastr::success('Sửa thành công', 'Chúc mừng');
            return redirect()->route('flash-deals.index');
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlashDeal $flash_deal)
    {
        $flash_deal->products()->detach();
        $flash_deal->delete();
        return redirect()->back();
    }
}
