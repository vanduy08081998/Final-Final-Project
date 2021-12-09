<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Wards;
use App\Models\Shipping;
use Session;
use Auth;

class AccountController extends Controller
{

    public function orderTracking() {
        return view('clients.account.order-tracking');
    }

    public function wishlist() {
        return view('clients.account.account-wishlist');
    }

    public function orderList() {
        return view('clients.account.account-orders');
    }

    public function accountInfo() {
        $provinces = Provinces::all();
        $districts = Districts::all();
        $wards = Wards::all();
        $user = User::find(Auth()->user()->id);
        return view('clients.account.account-profile')->with(compact('provinces','districts','wards','user'));
    }

    public function accountAddress() {
        $shipping_default = Shipping::where([['user_id', Auth::user()->id],['default',1]])->first();
        $shipping_all = Shipping::where([['user_id', Auth::user()->id],['default',0]])->get();
        return view('clients.account.account-address')->with(compact('shipping_default','shipping_all'));
    }

    public function accountPayment() {
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

    public function crop(Request $request)
    {
        $path = 'uploads/Users/';
        $file = $request->file('customer_avatar');
        $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';
        $upload = $file->move(public_path($path), $new_image_name);

        if(!$upload){
            return response()->json(['status'=>0, 'msg'=>'Vui lòng thử lại!']);
        }else{
            $oldPicture = User::find(Auth()->user()->id)->getAttributes()['avatar'];
               if( $oldPicture != ''){
               if(\File::exists(public_path($path.$oldPicture))){
                \File::delete(public_path($path.$oldPicture));
               }
            }

            $update = User::find(Auth()->user()->id)->update(['avatar'=>$new_image_name]);
            if($upload){
                return response()->json(['status'=>1, 'msg'=>'Thay đổi ảnh đại diện thành công']);
            }else{
                  return response()->json(['status'=>0, 'msg'=>'Vui lòng thử lại!']);
            }
        }
    }

}