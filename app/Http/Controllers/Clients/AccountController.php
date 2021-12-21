<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Wards;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\Review;
use Session;
use Auth;

class AccountController extends Controller
{

   
    public function orderTracking($id) {
        if(!Auth::user()){
            return redirect('/login');
        }
        $order = Order::find($id);
        return view('clients.account.order-tracking', compact('order'));
    }

    public function wishlist() {
        if(!Auth::user()){
            return redirect('/login');
        }
        return view('clients.account.account-wishlist');
    }

    public function orderList() {
        if(!Auth::user()){
            return redirect('/login');
        }
        return view('clients.account.account-orders');
    }

    public function accountInfo() {
        if(!Auth::user()){
            return redirect('/login');
        }
        $provinces = Provinces::all();
        $districts = Districts::all();
        $wards = Wards::all();
        $user = User::find(Auth()->user()->id);
        return view('clients.account.account-profile')->with(compact('provinces','districts','wards','user'));
    }
    public function accountReview(){
        if(!Auth::user()){
            return redirect('/login');
        }
        $reviews  = Review::where('customer_id', Auth::user()->id)->get();
        return view('clients.account.account-review')->with(compact('reviews'));
    }

    public function accountAddress() {
        if(!Auth::user()){
            return redirect('/login');
        }
        $shipping_default = Shipping::where([['user_id', Auth::user()->id],['default',1]])->first();
        $shipping_all = Shipping::where([['user_id', Auth::user()->id],['default',0]])->get();
        return view('clients.account.account-address')->with(compact('shipping_default','shipping_all'));
    }

    public function accountPayment() {
        if(!Auth::user()){
            return redirect('/login');
        }
        return view('clients.account.account-payment');
    }

    public function update_profile_customer(Request $request, $id)
    {
        $this->validate($request, [
           'name' => ['required', 'string', 'max:255'],
        ],
        [
            'name.required'=> 'Vui lòng không bỏ trống tên tài khoản!',
            'name.string'=> 'Tên tài khoản không hợp lệ!',
            'name.max'=> 'Tên tài khoản không quá 255 ký tự! ',
        ]);
       $data = $request->all();
       $user = User::find($id);
       $user->update($data);
       return back()->with('message','Cập nhật thành công !');
    }

    public function notification(){
        if(!Auth::user()){
            return redirect('/login');
        }
        return view('clients.account.account-notification');
    }

}