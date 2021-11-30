<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Session;

class Users extends Component
{
    public $name, $birthday, $gender;
    public $phone, $cid;

    public function update_profile($id)
    {
        $this->validate([
              'name'=>['required','string'],
        ],
        [
            'name.required'=>'Họ tên không được bỏ trống',
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

    public function render()
    {
        return view('livewire.users');
    }

    public function alertSuccess($message)
    {
        $this->dispatchBrowserEvent('alert',['type' => 'success', 'message' => $message]);
    }

}
