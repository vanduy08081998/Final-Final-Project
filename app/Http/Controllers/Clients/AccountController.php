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
use DB;

class AccountController extends Controller
{

    public function orderTracking($id) {
        if(!Auth::user()){
            return redirect('/login');
        }
        $order = Order::find($id);
        $ship = DB::table('shipping_method')->where('id', $order->shipping_status)->first();
        return view('clients.account.order-tracking', compact('order', 'ship'));
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

    public function update_profile_customer(Request $request, $id)
    {
        $this->validate($request, [
           'name' => ['required', 'string', 'max:255'],
        ],
        [
            'name.required'=> 'Vui l??ng kh??ng b??? tr???ng t??n t??i kho???n!',
            'name.string'=> 'T??n t??i kho???n kh??ng h???p l???!',
            'name.max'=> 'T??n t??i kho???n kh??ng qu?? 255 k?? t???! ',
        ]);
       $data = $request->all();
       $user = User::find($id);
       $user->update($data);
       return back()->with('message','C???p nh???t th??nh c??ng !');
    }

    public function crop(Request $request)
    {
        $path = 'uploads/Users/';
        $file = $request->file('customer_avatar');
        $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';
        $upload = $file->move(public_path($path), $new_image_name);

        if(!$upload){
            return response()->json(['status'=>0, 'msg'=>'Vui l??ng th??? l???i!']);
        }else{
            $oldPicture = User::find(Auth()->user()->id)->getAttributes()['avatar'];
               if( $oldPicture != ''){
               if(\File::exists(public_path($path.$oldPicture))){
                \File::delete(public_path($path.$oldPicture));
               }
            }

            $update = User::find(Auth()->user()->id)->update(['avatar'=>$new_image_name]);
            if($upload){
                return response()->json(['status'=>1, 'msg'=>'Thay ?????i ???nh ?????i di???n th??nh c??ng']);
            }else{
                  return response()->json(['status'=>0, 'msg'=>'Vui l??ng th??? l???i!']);
            }
        }
    }

    public function notification(){
        if(!Auth::user()){
            return redirect('/login');
        }
        return view('clients.account.account-notification');
    }

}