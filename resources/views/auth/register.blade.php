@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="section-authentication-register d-flex align-items-center justify-content-center">

        <div class="col-12 col-lg-10 mx-auto">
            <div class="card radius-15">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <div class="card-body p-md-5">
                            <div class="text-center">
                                <img src="{{asset('backend/images/logo-icon.png')}}" width="80" alt="">
                                <h3 class="mt-4 font-weight-bold">{{ __('Create an Account') }}</h3>
                            </div>
                            <div class="input-group shadow-sm rounded mt-5">
                                <div class="input-group-prepend"> <span
                                        class="input-group-text bg-transparent border-0 cursor-pointer"><img
                                            src="{{asset('backend/images/icons/search.svg')}}" alt="" width="16"></span>
                                </div>
                                <input type="button" class="form-control  border-0" value="Đăng nhập bằng google">
                            </div>
                            <div class="input-group shadow-sm rounded mt-2">
                                <div class="input-group-prepend"> <span
                                        class="input-group-text bg-transparent border-0 cursor-pointer"><img
                                            src="{{asset('backend/images/icons/facebook.svg')}}" alt=""
                                            width="16"></span>
                                </div>
                                <input type="button" class="form-control  border-0" value="Đăng nhập bằng facebook">
                            </div>
                            <div class="login-separater text-center"> <span>HOẶC ĐĂNG NHẬP BẰNG TÀI KHOẢN EMAIL</span>
                                <hr />
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group mt-3">
                                    <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>

                                <div class="form-group mt-3">
                                    <label for="email"
                                        class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>


                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control border-right-0 @error('password') is-invalid @enderror"
                                        name="password" type="password" required autocomplete="new-password">
                                    <div class="input-group-append"> <a href="javascript:;"
                                            class="input-group-text bg-transparent border-left-0"><i
                                                class='bx bx-hide'></i></a>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label for="password-confirm"
                                    class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="input-group" id="show_hide_password2">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <div class="input-group-append"> <a href="javascript:;"
                                            class="input-group-text bg-transparent border-left-0"><i
                                                class='bx bx-hide'></i></a>
                                    </div>

                                </div>



                                <div class="btn-group mt-3 w-100">
                                    <button type="submit"
                                        class="btn btn-primary btn-block">{{ __('Register') }}</button>
                                    <button type="submit" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
                                    </button>
                                </div>
                            </form>


                            <hr />
                            <div class="text-center mt-4">
                                <p class="mb-0">{{ __('Already have an account?') }} <a
                                        href="{{route('login') }}">{{ __('Login') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{asset('backend/images/login-images/login-frent-img.jpg')}}"
                            class="card-img login-img h-100" alt="...">
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>

    </div>
</div>

@endsection