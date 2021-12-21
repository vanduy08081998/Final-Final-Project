@extends('layouts.app')

@section('title')
Đăng nhập
@endsection

@section('content')

<style>
    .bg-forgot {
        max-height: 96vh;
    }

    .social-container a {
        border: none;
    }
</style>

<a class="navbar-brand d-sm-block me-3 flex-shrink-0" href="{{ route('clients.index') }}">
    <img src="{{ asset('frontend/img/logo/logo.png') }}" width="200px" alt="Cartzilla">
</a>
<h2 style="color: orangered" class="text-login">Thế giới mua sắm trực tuyến Bigdeal</h2>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form class="form_register form-horizontal form " role="form">
            <!-- <form method="POST" action="{{ route('register') }}"> -->
            <h2 class="mt-4">Đăng ký</h2>
            <div class="social-container text-left">
                <a href="{{route('login.facebook')}}" class="social facebook">
                    <i class="fa fa-facebook mr-2" style="border: 10px"></i><strong>Facebook</strong>
                </a>
                <a href="{{route('login.google')}}" class="social google">
                    <i class="fa fa-google mr-2"></i><strong>Google</strong>
                </a>
            </div>
            <span>Hoặc đăng ký bằng tài khoản email của bạn</span>
            <div class="text-left mt-2">
                <div class="form-group form-register">
                    <div class="input-group">
                        <input type="text" name="name" class="name_regis form-control" value="{{old('name')}}"
                            placeholder="Họ và tên" />
                    </div>
                    <span class="name_error_regis text-danger text-italic"></span>

                </div>


                <div class="form-group form-register">
                    <div class="input-group">
                        <input type="email" name="email" class="email_regis form-control" value="{{old('email')}}"
                            placeholder="Email" />
                    </div>
                    <span class="email_error_regis text-danger text-italic"></span>
                </div>

                <div class="form-group form-register">
                    <div id="show_hide_password" class="input-group">
                        <input type="password" name="password" class="pass_regis form-control" placeholder="Mật khẩu" />
                        <div class="input-group-append"> <a href="javascript:;"
                                class="input-group-text bg-transparent border-left-0"><i class="fa fa-eye"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <span class="pass_error_regis text-danger text-italic"></span>
                </div>

                <div class="form-group form-register">
                    <div id="show_hide_password2" class="input-group">
                        <input type="password" name="password_confirmation" class="pass_conf form-control"
                            placeholder="Nhập lại mật khẩu" />
                        <div class="input-group-append"> <a href="javascript:;"
                                class="input-group-text bg-transparent border-left-0"><i class="fa fa-eye"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="div_button">
                <button type="button" class="register mt-3">Đăng ký</button>
            </div>
            <a class="text-primary forgot_pass mt-4 w-100 d-none text-register" id="signInMB">
                <i class="bx bxs-key mr-2"></i>Đã có tài khoản? Hãy Đăng nhập !
            </a>
        </form>
    </div>


    <div class="form-container sign-in-container">
        <form class="form_login form-horizontal form" role="form">
            <!-- <form action="" method="post" enctype="multipart/form-data">
            @csrf -->
            <h2 class="mt-5">Đăng nhập</h2>
            <div class="social-container text-left">
                <a href="{{route('login.facebook')}}" class="social facebook"><i
                        class="fa fa-facebook mr-2"></i><strong>Facebook</strong></a>
                <a href="{{route('login.google')}}" class="social google"><i
                        class="fa fa-google mr-2"></i><strong>Google</strong></a>
            </div>
            <span>Hoặc sử dụng tài khoản của bạn</span>
            <div class="text-left mt-2">

                <div class="form-group form-login">
                    <input type="email" name="email" class="email form-control" value="{{old('email')}}"
                        placeholder="Email" />
                    <span class="name_error text-danger"></span>
                </div>

                <div class="form-group form-login">
                    <div id="show_hide_password" class="input-group">
                        <input type="password" name="password" class="password form-control" value="{{old('password')}}"
                            placeholder="Password" />
                        <div class="input-group-append"> <a href="javascript:;"
                                class="input-group-text bg-transparent border-left-0"><i class="fa fa-eye"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <span class="pass_error text-danger text-italic"></span>
                </div>

                <div class="custom-control custom-switch mt-3">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                    <label class="custom-control-label" for="customSwitch1">Ghi nhớ mật khẩu </label>
                </div>

            </div>

            <!-- <a href="{{ route('password.request') }}">Quên mật khẩu?</a> -->
            <div class="div_button">
                <button class="mt-3 login" type="button">Đăng nhập</button>
            </div>
            <a class="text-primary forgot_pass mt-4" href="{{ route('password.request') }}"><i
                    class='bx bxs-key mr-2'></i> Quên mật khẩu?</a>
            <a class="text-primary forgot_pass mt-4 w-100 d-none text-register" id="signUpMB"><i
                    class='bx bxs-key mr-2'></i> Bạn chưa có tài khoản? Hãy Đăng ký !</a>
        </form>
    </div>

    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>Đăng ký tài khoản để có thể tham gia với chúng tôi</p>
                <button class="ghost" id="signIn">Đăng nhập</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Đăng nhập tài khoản của bạn để bắt đầu hành trình với chúng tôi</p>
                <button class="ghost" id="signUp">Đăng ký</button>
            </div>
        </div>
    </div>
</div>
{{-- <script>
    $('body').resize(function(){
    const width = $('body').width();
    console.log(width)
    if(width < 600){
        $('.overlay').css({'display':'none'});
    }
})
.resize()
</script> --}}


@endsection
