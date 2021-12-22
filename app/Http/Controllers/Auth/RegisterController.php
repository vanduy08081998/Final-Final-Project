<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\SendMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
    [
        'name.required' => 'Họ và tên không được để trống!',
        'name.string' => 'Họ và tên không hợp lệ!',
        'name.max' => 'Họ và tên không được quá 255 ký tự!',
        'email.required' => 'Email không được để trống!',
        'email.string' => 'Email không hợp lệ!',
        'email.email' => 'Email không đúng định dạng!',
        'email.max' => 'Email không được quá 255 ký tự!',
        'email.unique' => 'Email đã tồn tại!',
        'password.required' => 'Mật khẩu được để trống!',
        'password.string' => 'Mật khẩu không hợp lệ!',
        'password.min' => 'Mật khẩu phải lớn hơn 8 ký tự!',
        'password.confirmed' => 'Xác nhận mật khẩu không khớp!'

    ]);
        
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_status' => 0
        ]);
    }
}
