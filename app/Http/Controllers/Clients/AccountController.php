<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Wards;
use Session;


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
        return view('clients.account.account-profile')->with(compact('provinces'));
    }

    public function accountAddress() {
        return view('clients.account.account-address');
    }

    public function accountPayment() {
        return view('clients.account.account-payment');
    }
    public function update_profile_customer(Request $request, $id)
    {
        $this->validate($request, [
           'name' => ['required', 'string', 'max:255'],
        //    'password' => ['required', 'string', 'min:8', 'confirmed'],
        //    'phone' => ['regex:/(84|0[3|5|7|8|9])+([0-9]{8})/'],
        ],
        [
            'name.required'=> 'Vui lòng không bỏ trống tên tài khoản!',
            'name.string'=> 'Tên tài khoản không hợp lệ!',
            'name.max'=> 'Tên tài khoản không quá 255 ký tự! ',
            'phone.required' => 'Vui lòng không bỏ trống số điện thoại!',
            'phone.regex' => 'Số điện thoại không hợp lệ!',
            'address.required' => 'Vui lòng không bỏ trống địa chỉ!',
            'address.string'=>'Địa chỉ không hợp lệ',
            'password.required'=> 'Vui lòng không bỏ trống mật khẩu!',
            'password.string'=> 'Mật khẩu không hợp lệ!',
            'password.min'=> 'Mật khẩu không được nhỏ hơn 8 ký tự!',
            'password.confirmed'=> 'Mật khẩu xác nhận không hợp lệ!',
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

    public function select_address(Request $request){
        $data = $request->all();
        $ma_id = $data['ma_id'];
        $output = '';
        if($data['action']=='city'){
          $select_districts = Districts::where('province_id',$ma_id)->orderby('id','ASC')->get();
          $output.='<option>---Chọn quận huyện---</option>';
          foreach($select_districts as $key => $district){
              $output.='<option value="'.$district->id.'">'.$district->name.'</option>';
          }
        }else{
            $select_wards = Wards::where('district_id', $ma_id)->orderby('id','ASC')->get();
            $output.='<option>---Chọn xã phường---</option>';
            foreach($select_wards as $key => $wards){
              $output.='<option value="'.$wards->id.'">'.$wards->name.'</option>';
            }
        }
        echo $output;
    }
}
