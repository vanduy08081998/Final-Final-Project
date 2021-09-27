@extends('layouts.app')

@section('title')
Đăng nhập
@endsection

@section('content')
<div class="wrapper">
    <div class="section-authentication-login d-flex align-items-center justify-content-center">

        <div class="col-12 col-lg-10 mx-auto">
            <div class="card radius-15">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <div class="card-body p-md-5">
                            <div class="text-center">
                                <img src="{{asset('backend/images/logo-icon.png')}}" width="50" alt="">
                                <h3 class="mt-4 font-weight-bold"> {{ __('Welcome Back') }}</h3>
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
                            <form action="{{ route('login') }}" method="post" class="" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group mt-4">
                                    <label> {{ __('Email') }} </label>
                                    <input type="text" class="form-control" value="{{old('email')}}" name="email"
                                        placeholder="Enter your email address" />
                                    @error('email')
                                    <span class="text-danger text-italic">{{$message}}</span>
                                    @enderror
                                </div>

                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" class="form-control" value="{{old('password')}}"
                                        name="password" placeholder="Enter your email address" />
                                    <div class="input-group-append"> <a href="javascript:;"
                                            class="input-group-text bg-transparent border-left-0"><i
                                                class='bx bx-hide'></i></a>
                                    </div>
                                    @error('password')
                                    <span class="text-danger text-italic">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-row mt-3">
                                    <div class="form-group col">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1"
                                                checked>
                                            <label class="custom-control-label" for="customSwitch1">
                                                {{ __('Remember Me') }} </label>
                                        </div>
                                    </div>
                                    <div class="form-group col text-right"> <a href="{{ route('password.request') }}"><i
                                                class='bx bxs-key mr-2'></i> {{ __('Forget Password?') }}</a>
                                    </div>
                                </div>
                                <div class="btn-group mt-3 w-100">
                                    <button type="submit" class="btn btn-primary btn-block"> {{ __('Login') }}</button>
                                    <button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
                                    </button>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <p class="mb-0">{{ __('Do not have an account?') }} <a href="{{route('register')}}">
                                            {{ __('Sign up') }}</a>
                                    </p>
                                </div>
                                <form>
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