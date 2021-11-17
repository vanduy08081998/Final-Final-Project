@extends('layouts.app')

@section('content')

<h2 class="mt-4">Thế giới mua sắm trực tuyến Bigdeal</h2>
<div class="container" id="container">
    <div class="card-body p-md-4">
                <div class="text-center">
                    <img src="{{asset('backend/img/khoa.jpg')}}" width="140" alt="" />
                </div>
                <h4 class="mt-2 font-weight-bold">Quên mật khẩu</h4>
                <p class="text-muted"> Nhập ID email đã đăng ký của bạn để đặt lại mật khẩu</p>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="col-form-label">Địa chỉ email của bạn</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="text-center">
                        <button type="submit" class="send_email_pass btn btn-primary mt-4 btn-lg btn-block radius-30">
                            Gửi liên kết đặt lại mật khẩu</button>
                        </div>
                    </div>

                </form>

                <a href="{{route('login')}}" class="btn btn-link btn-block"><i class='bx bx-arrow-back mr-1'></i>Quay lại đăng nhập</a>
            </div>

    </div>
@endsection
