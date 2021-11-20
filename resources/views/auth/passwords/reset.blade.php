@extends('admin.layouts.user')

@section('content')

<div class="wrapper">
    <div class="authentication-forgot d-flex align-items-center justify-content-center">
        <div class="card shadow-lg forgot-box">
            <div class="card-body p-md-5">
                <div class="text-center">
                    <img src="{{ asset('backend/img/khoa1.jpg') }}" width="140" alt="" />
                </div>
                <h4 class="mt-3 font-weight-bold">Tạo mật khẩu mới</h4>
                <p class="text-muted">
                    Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn. Vui lòng nhập mật khẩu mới của bạn!
                </p>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group mt-1">
                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label for="password" class="col-form-label text-md-right">Mật khẩu</label>
                    <div id="show_hide_password" class="input-group mt-3">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
                        <div class="input-group-append"> <a href="javascript:;"
                                class="input-group-text bg-transparent border-left-0"><i class="fa fa-eye"
                                    aria-hidden="true"></i></a>
                        </div>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <label for="password-confirm" class="col-form-label text-md-right">Xác nhận Mật khẩu</label>
                    <div id="show_hide_password2" class="input-group mt-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                        <div class="input-group-append"> <a href="javascript:;"
                                class="input-group-text bg-transparent border-left-0"><i class="fa fa-eye"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 btn-block">Thay đổi mật khẩu</button>


                </form>
                <a href="{{route('login')}}" class="btn btn-link btn-block mt-3"><i class='bx bx-arrow-back mr-1'></i>Quay
                    lại đăng nhập</a>
            </div>

        </div>
        @endsection
