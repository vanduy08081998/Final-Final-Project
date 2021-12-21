@extends('layouts.client_master')


@section('title', 'Địa chỉ giao nhận')


@section('content')

<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('clients.index') }}"><i
                                class="ci-home"></i>Trang chủ</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Tài khoản</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Địa chỉ</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Địa chỉ giao nhận hàng</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        @include('Clients.Inc.account-sidebar')
        <!-- Content  -->
        <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                <h6 class="fs-base text-light mb-0">Đăng ký địa chỉ giao nhận hàng:</h6><a
                    class="btn btn-primary btn-sm" href="account-signin.html"><i class="ci-sign-out me-2"></i>Đăng
                    xuất</a>
            </div>

            <!-- Add New Address-->
            <form action="{{route('shippings.store')}}" method="post">
                @csrf
                <div class="align-middle add-ship mb-3">
                    <a class="add-shipping" href="{{route('account.account-address')}}"><i
                            class="fa fa-list fa-lg aria-hidden"></i> Danh sách địa chỉ</a>
                </div>
                @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
                @endif
                <div class="body route mt-3" data-url="{{route('select-address')}}">
                    <div class="row gx-4 gy-3">
                        <div class="col-sm-6">
                            <label class="form-label">Họ và tên</label>
                            <input class="form-control" name="fullname" type="text" value="{{ old('fullname') }}"
                                required>
                            @error('fullname')
                            <span style="font-size:14px" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Số điện thoại</label>
                            <input class="form-control" name="phone" oninvalid="setCustomValidity('Số điện thoại không đúng định dạng')" pattern="(0[3|5|7|8|9])+[0-9]{8}" type="tel" value="{{ old('phone') }}" required>
                            @error('phone')
                            <span style="font-size:14px" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Tỉnh/thành phố</label>
                            <select class="form-control choose choose_province" onchange="fee('province')" id="province" name="province_id" required>
                                <option value="">Chọn tỉnh, thành phố</option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Quận/huyện</label>
                            <select class="form-control choose choose_district" onchange="fee('district')" id="district" name="district_id" required>
                                <option value="">Chọn quận, huyện</option>

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Xã/Phường/Thị trấn</label>
                            <select class="form-control" id="ward" name="ward_id" required>
                                <option value="">Chọn xã, phường</option>

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Làng, xóm, số đường, số nhà,...</label>
                            <input class="form-control" type="text" name="neighbor" value="{{ old('neighbor') }}"
                                required>
                            @error('neighbor')
                            <span style="font-size:14px" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Loại địa chỉ</label>
                            <select class="form-control" name="address_type">
                                <option value="0">Nhà riêng / Chung cư</option>
                                <option value="1">Cơ quan / Công ty</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="default">
                                <label class="form-check-label" for="address-primary">Đặt làm địa chỉ mặc định</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary btn-shadow mt-3" type="submit">Cập nhật</button>
            </form>


        </section>
    </div>
</div>
<script>
fee()
</script>
@endsection
