@extends('layouts.client_master')


@section('title', 'Thanh toán thành công')


@section('content')
      <!-- Page Title-->
      <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
                </li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">Profile info</li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Profile info</h1>
          </div>
        </div>
      </div>
      <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
          <!-- Sidebar-->
          @include('Clients.Inc.account-sidebar')
          <!-- Content  -->
          <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
              <h6 class="fs-base text-light mb-0">Cập nhật chi tiết cá nhân của bạn:</h6><a class="btn btn-primary btn-sm" href="account-signin.html"><i class="ci-sign-out me-2"></i>Đăng xuất</a>
            </div>
            <!-- Profile form-->
            <form>
              <div class="bg-secondary rounded-3 p-4 mb-4">
                <div class="d-flex align-items-center"><img class="rounded" src="{{ asset('frontend/img/shop/account/avatar.jpg') }}" width="90" alt="Susan Gardner">
                  <div class="ps-3">
                    <button class="btn btn-light btn-shadow btn-sm mb-2" type="button"><i class="ci-loading me-2"></i>Thay ảnh đại diện</button>
                  </div>
                </div>
              </div>
              <div class="row gx-4 gy-3">
                <div class="col-sm-6">
                  <label class="form-label" for="account-fn">Họ</label>
                  <input class="form-control" type="text" id="account-fn" value="Susan">
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-ln">Tên</label>
                  <input class="form-control" type="text" id="account-ln" value="Gardner">
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-email">Địa chỉ Email</label>
                  <input class="form-control" type="email" id="account-email" value="s.gardner@example.com" disabled>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-phone">Số điện thoại</label>
                  <input class="form-control" type="text" id="account-phone" value="+7 (805) 348 95 72" required>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-pass">Mật khẩu mới</label>
                  <div class="password-toggle">
                    <input class="form-control" type="password" id="account-pass">
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-confirm-pass">Xác nhận mật khẩu</label>
                  <div class="password-toggle">
                    <input class="form-control" type="password" id="account-confirm-pass">
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <hr class="mt-2 mb-3">
                  <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="subscribe_me" checked>
                      <label class="form-check-label" for="subscribe_me">Đăng ký để nhận tin tức mới nhất</label>
                    </div>
                    <button class="btn btn-primary mt-3 mt-sm-0" type="button">Cập nhật thông tin</button>
                  </div>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
@endsection
