<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
        return view('clients.account.account-profile');
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
}
