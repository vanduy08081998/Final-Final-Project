@extends('admin.layouts.master')

@section('title')
Thêm tài khoản
@endsection

@section('content')

<div class="content container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card radius-15">
                <div class="card-body border-lg-top-danger">
                    <div class="card-body p-1">
                        <a href="{{route('users.index')}}"><button class="btn btn-outline-primary float-right">Danh sách</button></a>
                        <div class="card-title">
                            <h4 class="text-primary font-weight-bold mb-2 d-inline">Cập nhật tài khoản nhân viên: </h4>
                            <hr />
                        </div>
                        <div class="form-body">
                            @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('users.update', ['user' => $userId->id]) }}">
                                @csrf
                                @method('PUT')
                                <label>Họ và tên</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle-o"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input name="name" value="{{ $userId->name}}" type="text"
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
                                    <input name="email" value="{{ $userId->email }}" type="text"
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
                                    <input name="password" id="password" type="password"
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
                                         type="password"
                                        class="form-control border-left-0" placeholder="Xác nhận mật khẩu">
                                    <div class="input-group-append"> <a href="javascript:;"
                                            class="input-group-text bg-transparent border-left-0"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger px-5">Thêm tài khoản</button>
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
