@extends('layouts.client_master')


@section('title', 'Địa chỉ giao nhận')


@section('content')
<!-- Add New Address-->
<form class="needs-validation modal fade" method="post" id="add-address" tabindex="-1" novalidate>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm địa chỉ giao nhận mới</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gx-4 gy-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="address-fn">Họ</label>
                        <input class="form-control" type="text" id="address-fn" required>
                        <div class="invalid-feedback">Vui lòng nhập Họ!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="address-ln">Tên</label>
                        <input class="form-control" type="text" id="address-ln" required>
                        <div class="invalid-feedback">Vui lòng nhập Tên!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="address-company">Công ty</label>
                        <input class="form-control" type="text" id="address-company">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="address-country">Địa chỉ</label>
                        <select class="form-select" id="address-country" required>
                            <option value>Select country</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Belgium">Belgium</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="Spain">Spain</option>
                            <option value="UK">United Kingdom</option>
                            <option value="USA">USA</option>
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn địa chỉ!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="address-city">City</label>
                        <input class="form-control" type="text" id="address-city" required>
                        <div class="invalid-feedback">Please fill in your city!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="address-line1">Line 1</label>
                        <input class="form-control" type="text" id="address-line1" required>
                        <div class="invalid-feedback">Please fill in your address!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="address-line2">Line 2</label>
                        <input class="form-control" type="text" id="address-line2">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="address-zip">ZIP code</label>
                        <input class="form-control" type="text" id="address-zip" required>
                        <div class="invalid-feedback">Please add your ZIP code!</div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="address-primary">
                            <label class="form-check-label" for="address-primary">Chọn làm địa chỉ chính thức</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Thoát</button>
                <button class="btn btn-primary btn-shadow" type="submit">Thêm</button>
            </div>
        </div>
    </div>
</form>
<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('clients.index') }}"><i class="ci-home"></i>Trang chủ</a></li>
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
                <h6 class="fs-base text-light mb-0">Danh sách đăng ký địa chỉ giao nhận hàng:</h6><a class="btn btn-primary btn-sm"
                    href="account-signin.html"><i class="ci-sign-out me-2"></i>Đăng xuất</a>
            </div>
            <!-- Addresses list-->
            <div class="table-responsive fs-md">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Địa chỉ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3 align-middle">396 Lillian Blvd, Holbrook, NY 11741, USA<span
                                    class="align-middle badge bg-info ms-2">Chính</span></td>
                            <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Sửa"><i
                                        class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#"
                                    data-bs-toggle="tooltip" title="Xóa">
                                    <div class="ci-trash"></div>
                                </a></td>
                        </tr>
                        <tr>
                            <td class="py-3 align-middle">769, Industrial, West Chicago, IL 60185, USA</td>
                            <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Sửa"><i
                                        class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#"
                                    data-bs-toggle="tooltip" title="Xóa">
                                    <div class="ci-trash"></div>
                                </a></td>
                        </tr>
                        <tr>
                            <td class="py-3 align-middle">514 S. Magnolia St. Orlando, FL 32806, USA</td>
                            <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Sửa"><i
                                        class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#"
                                    data-bs-toggle="tooltip" title="Xóa">
                                    <div class="ci-trash"></div>
                                </a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-sm-end pt-4"><a class="btn btn-primary" href="#add-address" data-bs-toggle="modal">Thêm địa chỉ mới</a></div>
        </section>
    </div>
</div>
@endsection
