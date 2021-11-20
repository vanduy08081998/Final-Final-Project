@extends('admin.layouts.master')

@section('title')
Thêm tài khoản
@endsection

@section('content')

<div class="content container-fluid">
    @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Thêm tài khoản nhân viên'])
    <div class="row">
        <div class="col-sm-12">
            <div class="card radius-15">
                <div class="card-body border-lg-top-danger">
                    <div class="card-body p-1">
                        <div class="form-body">
                            @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('users.store') }}">
                                @csrf

                                <label>Họ và tên</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle-o"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input name="name" value="{{ old('name') }}" type="text"
                                        class="form-control  @error('name') is-invalid @enderror border-left-0"
                                        placeholder="Họ và tên" autocomplete="off" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label>Địa chỉ email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input name="email" value="{{ old('email') }}" type="text"
                                        class="form-control @error('email') is-invalid @enderror border-left-0"
                                        placeholder="Địa chỉ email" autocomplete="off">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label>Mật khẩu</label>
                                <div id="show_hide_password" class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input name="password" id="password" value="{{ old('password') }}" type="password"
                                        class="form-control  @error('password') is-invalid @enderror border-left-0"
                                        placeholder="Mật khẩu">
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


                                <label>Xác nhận mật khẩu</label>
                                <div id="show_hide_password2" class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"> <i class="fa fa-unlock"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="password-confirm" name="password_confirmation"
                                        value="{{ old('password') }}" type="password" class="form-control border-left-0"
                                        placeholder="Confirm Password">
                                    <div class="input-group-append"> <a href="javascript:;"
                                            class="input-group-text bg-transparent border-left-0"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary px-5 mt-2">Thêm tài khoản</button>
                                <form>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <!--end page-content-wrapper-->
</div>


@endsection
