@extends('layouts.app')

@section('title')
Đăng nhập
@endsection

@section('content')
<div class="wrapper">
    <div class="authentication-forgot d-flex align-items-center justify-content-center">
        <div class="card shadow-lg forgot-box">
            <div class="card-body p-md-5">
                <div class="text-center">
                    <img src="backend/images/icons/forgot-2.png" width="140" alt="" />
                </div>
                <h4 class="mt-5 font-weight-bold">Đăng nhập</h4>
                <p class="text-muted">Đăng nhập để trở thành thành viên</p>
                <form action="{{ route('login') }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-5">
                        <label>Địa chỉ email</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control form-control-lg radius-30" placeholder="example@user.com" />
                        @error('email')
                            <span class="text-danger text-italic" >{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-5">
                        <label>Mật khẩu</label>
                        <input type="text" name="password" value="{{ old('password') }}" class="form-control form-control-lg radius-30" placeholder="********************" />
                        @error('password')
                            <span class="text-danger text-italic" >{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block radius-30">Send</button><a href="authentication-login.html" class="btn btn-link btn-block"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
