<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class Users extends Component
{
    public $provinces, $districts, $wards, $name, $birthday, $gender, $password, $password_confirmation;
    public $phone, $cid;
    public $province;

    public function update_profile($id)
    {
        $this->validate([
              'name'=> ['required', 'string', 'max:255'],
        ],
        [
            'name.required'=> 'Vui lòng không bỏ trống tên tài khoản! ',
            'name.string'=> 'Tên tài khoản không hợp lệ! ',
            'name.max'=> 'Tên tài khoản không quá 255 ký tự! ',
        ]);
        User::find($id)->update([
            'name'=>$this->name,
            'birthday'=>$this->birthday,
            'gender'=>$this->gender,
        ]);
        $this->alertSuccess('Cập nhật thông tin hồ sơ thành công');
        $this->emit('render');
    }

    public function edit_phone($id){
        $user = User::find($id);
        $this->id_user = $user->id;
        $this->phone = $user->phone;
        $this->dispatchBrowserEvent('OpenUpdatePhoneModal',[
            'id'=>$id
        ]);
    }

    public function update_phone(){
        $this->validate([
              'phone'=>'required',
        ],[
            'phone.required'=>'Vui lòng nhập số điện thoại!',
        ]);

        $user = User::find($this->id_user)->update([
            'phone'=>$this->phone,
        ]);

        if($user){
            $this->dispatchBrowserEvent('CloseUpdatePhoneModal');
            $this->alertSuccess('Cập nhật số điện thoại thành công');
        }
    }

    public function edit_address($id){
        $user = User::find($id);
        $this->id_user = $user->id;
        $this->address = $user->address;
        $this->dispatchBrowserEvent('OpenUpdateAddressModal',[
            'id'=>$id
        ]);
    }

    public function update_address(){
        $this->validate([
              'address'=>'required',
        ],[
            'address.required'=>'Vui lòng nhập địa chỉ!',
        ]);

        $user = User::find($this->id_user)->update([
            'address'=>$this->address,
        ]);

        if($user){
            $this->dispatchBrowserEvent('CloseUpdateAddressModal');
            $this->alertSuccess('Cập nhật địa chỉ thành công');
        }
    }

    public function edit_password($id){
        $user = User::find($id);
        $this->id_user = $user->id;
        $this->dispatchBrowserEvent('OpenUpdatePasswordModal',[
            'id'=>$id
        ]);
    }

    public function update_password(){
        $this->validate([
            'password'=>['required', 'string', 'min:8', 'confirmed'],
        ],[
            'password.required'=> 'Vui lòng không bỏ trống mật khẩu! ',
            'password.string'=> 'Mật khẩu không hợp lệ! ',
            'password.min'=> 'Mật khẩu không được nhỏ hơn 8 ký tự! ',
            'password.confirmed'=> 'Mật khẩu xác nhận không hợp lệ! ',
        ]);

        $user = User::find($this->id_user)->update([
          'password'=>Hash::make($this->password),
        ]);

        if($user){
          $this->dispatchBrowserEvent('CloseUpdatePasswordModal');
          $this->alertSuccess('Cập nhật mật khẩu thành công');
         }
    }

    public function render()
    {
        return view('livewire.users');
    }

    public function alertSuccess($message)
    {
        $this->dispatchBrowserEvent('alert',['type' => 'success', 'message' => $message]);
    }

}
