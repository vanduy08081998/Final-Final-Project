@extends('layouts.client_master')


@section('title', 'Phương thức thanh toán')


@section('content')
    <!-- Add Payment Method-->
    <form class="needs-validation modal fade" method="post" id="add-payment" tabindex="-1" novalidate>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm phương thức thanh toán mới</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="radio" id="paypal" name="payment-method">
                        <label class="form-check-label" for="paypal">PayPal<img class="d-inline-block align-middle ms-2"
                                src="{{ asset('frontend/img/card-paypal.png') }}" width="39" alt="PayPal"></label>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="radio" id="card" name="payment-method" checked>
                        <label class="form-check-label" for="card">Thẻ tín dụng / Ghi nợ<img class="d-inline-block align-middle ms-2"
                                src="{{ asset('frontend/img/cards.png') }}" width="187" alt="Credit card"></label>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="number" placeholder="Số thẻ" required>
                            <div class="invalid-feedback">Vui lòng nhập số thẻ!</div>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="name" placeholder="Họ và tên" required>
                            <div class="invalid-feedback">Vui lòng nhập Tên đầy đủ!</div>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="expiry" placeholder="MM/YY" required>
                            <div class="invalid-feedback">Please provide card expiration date!</div>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="cvc" placeholder="CVC" required>
                            <div class="invalid-feedback">Please provide card CVC code!</div>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-primary d-block w-100" type="submit">Thêm thẻ</button>
                        </div>
                    </div>
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
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('clients.index')}}"><i class="ci-home"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Tài khoản</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Phương thức thanh toán</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Phương thức thanh toán</h1>
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
                    <h6 class="fs-base text-light mb-0">Phương thức thanh toán chính được sử dụng theo mặc định</h6><a class="btn btn-primary btn-sm"
                        href="account-signin.html"><i class="ci-sign-out me-2"></i>Đăng xuất</a>
                </div>
                <!-- Payment methods list-->
                <div class="table-responsive fs-md mb-4">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Thẻ tín dụng / Thẻ ghi nợ</th>
                                <th>Tên chủ thẻ</th>
                                <th>Ngày hết hạn</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-3 align-middle">
                                    <div class="d-flex align-items-center"><img src="{{ asset('frontend/img/card-visa.png') }}" width="39" alt="Visa">
                                        <div class="ps-2"><span class="fw-medium text-heading me-1">Visa</span>ending in 4999<span
                                                class="align-middle badge bg-info ms-2">Primary</span></div>
                                    </div>
                                </td>
                                <td class="py-3 align-middle">Susan Gardner</td>
                                <td class="py-3 align-middle">08 / 2019</td>
                                <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Sửa"><i
                                            class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#"
                                        data-bs-toggle="tooltip" title="Xóa">
                                        <div class="ci-trash"></div>
                                    </a></td>
                            </tr>
                            <tr>
                                <td class="py-3 align-middle">
                                    <div class="d-flex align-items-center"><img src="{{ asset('frontend/img/card-master.png') }}" width="39" alt="MesterCard">
                                        <div class="ps-2"><span class="fw-medium text-heading me-1">MasterCard</span>ending in 0015
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 align-middle">Susan Gardner</td>
                                <td class="py-3 align-middle">11 / 2021</td>
                                <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Sửa"><i
                                            class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#"
                                        data-bs-toggle="tooltip" title="Xóa">
                                        <div class="ci-trash"></div>
                                    </a></td>
                            </tr>
                            <tr>
                                <td class="py-3 align-middle">
                                    <div class="d-flex align-items-center"><img src="{{ asset('frontend/img/card-paypal.png') }}" width="39" alt="PayPal">
                                        <div class="ps-2"><span class="fw-medium text-heading me-1">PayPal</span>s.gardner@example.com
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 align-middle">&mdash;</td>
                                <td class="py-3 align-middle">&mdash;</td>
                                <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Sửa"><i
                                            class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#"
                                        data-bs-toggle="tooltip" title="Xóa">
                                        <div class="ci-trash"></div>
                                    </a></td>
                            </tr>
                            <tr>
                                <td class="py-3 align-middle">
                                    <div class="d-flex align-items-center"><img src="{{ asset('frontend/img/card-visa.png') }}" width="39" alt="Visa">
                                        <div class="ps-2"><span class="fw-medium text-heading me-1">Visa</span>ending in 6073</div>
                                    </div>
                                </td>
                                <td class="py-3 align-middle">Susan Gardner</td>
                                <td class="py-3 align-middle">09 / 2021</td>
                                <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Sửa"><i
                                            class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#"
                                        data-bs-toggle="tooltip" title="Xóa">
                                        <div class="ci-trash"></div>
                                    </a></td>
                            </tr>
                            <tr>
                                <td class="py-3 align-middle">
                                    <div class="d-flex align-items-center"><img src="{{ asset('frontend/img/card-visa.png') }}" width="39" alt="Visa">
                                        <div class="ps-2"><span class="fw-medium text-heading me-1">Visa</span>ending in 9791</div>
                                    </div>
                                </td>
                                <td class="py-3 align-middle">Susan Gardner</td>
                                <td class="py-3 align-middle">05 / 2021</td>
                                <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Sửa"><i
                                            class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#"
                                        data-bs-toggle="tooltip" title="Xóa">
                                        <div class="ci-trash"></div>
                                    </a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-sm-end"><a class="btn btn-primary" href="#add-payment" data-bs-toggle="modal">Thêm phương thức</a></div>
            </section>
        </div>
    </div>
@endsection
