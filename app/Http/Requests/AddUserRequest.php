<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'Vui lòng không bỏ trống tên tài khoản! ',
            'name.string'=> 'Tên tài khoản không hợp lệ! ',
            'name.max'=> 'Tên tài khoản không quá 255 ký tự! ',
            'email.unique'=> 'Trường email này đã tồn tại! ',
            'email.required'=> 'Vui lòng không bỏ trống trường email!',
            'email.email'=> 'Vui lòng nhập đúng định dạng email! ',
            'email.max'=> 'Trường email không quá 255 ký tự! ',
            'email.string'=> 'Trường email không hợp lệ! ',
            'password.required'=> 'Vui lòng không bỏ trống mật khẩu! ',
            'password.string'=> 'Mật khẩu không hợp lệ! ',
            'password.min'=> 'Mật khẩu không được nhỏ hơn 8 ký tự! ',
            'password.confirmed'=> 'Mật khẩu xác nhận không hợp lệ! ',
            'role.required' => 'Vui lòng chọn vai trò',
        ];
    }
}
