<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
//Login Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
//Google Callback
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('home');
    }

//Login Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
//Facebook Callback
    }
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('home');
    }


    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', $data->email)->first();
        if(!$user){
            $user = New User();;
            $user->name = $data->getName();
            $user->email = $data->getEmail();
            $user->provider_id = $data->getId();
            $user->avatar = $data->getAvatar();
            $user->save();
        }
        Auth::login($user);
    }
}
