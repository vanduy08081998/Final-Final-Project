@extends('layouts.client_master')


@section('title', 'Thanh toán thành công')


@section('content')
<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Trang
                            chủ</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Tài khoản</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Thông tin hồ sơ</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Thông tin hồ sơ</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <!-- Sidebar-->
        @include('dlients.Inc.account-sidebar')
        <!-- Content  -->
        <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3 ">
                <h6 class="fs-base text-light mb-0">Cập nhật chi tiết cá nhân của bạn:</h6>
                <form class="user_logout" action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-primary btn-sm" type="submit"><i class="ci-sign-out me-2"></i>Đăng
                        xuất</button>
                </form>
            </div>
            @livewire('users', ['name'=>Auth::user()->name,'birthday'=>Auth::user()->birthday,
            'gender'=>Auth::user()->gender,'phone'=>Auth::user()->phone, 'provinces' => $provinces, 'districts' => $districts, 'user' => $user])
        </section>
    </div>
</div>
@endsection

<!-- 'wards' => $wards -->
