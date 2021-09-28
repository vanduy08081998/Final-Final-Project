@extends('layouts.client_master')


@section('title', 'Danh sách đơn hàng')


@section('content')
    <!-- Order Details Modal-->
    <div class="modal fade" id="order-details">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mã đơn hàng - 34VB5540K83</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-0">
                    <!-- Item-->
                    <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
                        <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto"
                                href="shop-single-v1.html" style="width: 10rem;"><img src="{{ asset('frontend/img/shop/cart/01.jpg') }}" alt="Product"></a>
                            <div class="ps-sm-4 pt-2">
                                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">Women Colorblock Sneakers</a></h3>
                                <div class="fs-sm"><span class="text-muted me-2">Size:</span>8.5</div>
                                <div class="fs-sm"><span class="text-muted me-2">Color:</span>White &amp; Blue</div>
                                <div class="fs-lg text-accent pt-2">$154.<small>00</small></div>
                            </div>
                        </div>
                        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                            <div class="text-muted mb-2">Số lượng:</div>1
                        </div>
                        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                            <div class="text-muted mb-2">Thành tiền</div>$154.<small>00</small>
                        </div>
                    </div>
                    <!-- Item-->
                    <div class="d-sm-flex justify-content-between my-4 pb-3 pb-sm-2 border-bottom">
                        <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto"
                                href="shop-single-v1.html" style="width: 10rem;"><img src="{{ asset('frontend/img/shop/cart/02.jpg') }}" alt="Product"></a>
                            <div class="ps-sm-4 pt-2">
                                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">TH Jeans City Backpack</a></h3>
                                <div class="fs-sm"><span class="text-muted me-2">Brand:</span>Tommy Hilfiger</div>
                                <div class="fs-sm"><span class="text-muted me-2">Color:</span>Khaki</div>
                                <div class="fs-lg text-accent pt-2">$79.<small>50</small></div>
                            </div>
                        </div>
                        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                            <div class="text-muted mb-2">Số lượng:</div>1
                        </div>
                        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                            <div class="text-muted mb-2">Thành tiền</div>$79.<small>50</small>
                        </div>
                    </div>
                    <!-- Item-->
                    <div class="d-sm-flex justify-content-between my-4 pb-3 pb-sm-2 border-bottom">
                        <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto"
                                href="shop-single-v1.html" style="width: 10rem;"><img src="{{ asset('frontend/img/shop/cart/03.jpg') }}" alt="Product"></a>
                            <div class="ps-sm-4 pt-2">
                                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">3-Color Sun Stash Hat</a></h3>
                                <div class="fs-sm"><span class="text-muted me-2">Brand:</span>The North Face</div>
                                <div class="fs-sm"><span class="text-muted me-2">Color:</span>Pink / Beige / Dark blue</div>
                                <div class="fs-lg text-accent pt-2">$22.<small>50</small></div>
                            </div>
                        </div>
                        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                            <div class="text-muted mb-2">Số lượng:</div>1
                        </div>
                        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                            <div class="text-muted mb-2">Thành tiền</div>$22.<small>50</small>
                        </div>
                    </div>
                    <!-- Item-->
                    <div class="d-sm-flex justify-content-between my-4">
                        <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto"
                                href="shop-single-v1.html" style="width: 10rem;"><img src="{{ asset('frontend/img/shop/cart/04.jpg') }}" alt="Product"></a>
                            <div class="ps-sm-4 pt-2">
                                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">Cotton Polo Regular Fit</a></h3>
                                <div class="fs-sm"><span class="text-muted me-2">Size:</span>42</div>
                                <div class="fs-sm"><span class="text-muted me-2">Color:</span>Light blue</div>
                                <div class="fs-lg text-accent pt-2">$9.<small>00</small></div>
                            </div>
                        </div>
                        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                            <div class="text-muted mb-2">Số lượng:</div>1
                        </div>
                        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                            <div class="text-muted mb-2">Thành tiền</div>$9.<small>00</small>
                        </div>
                    </div>
                </div>
                <!-- Footer-->
                <div class="modal-footer flex-wrap justify-content-between bg-secondary fs-md">
                    <div class="px-2 py-1"><span class="text-muted">Thành tiền:&nbsp;</span><span>$265.<small>00</small></span></div>
                    <div class="px-2 py-1"><span class="text-muted">Phí giao hàng:&nbsp;</span><span>$22.<small>50</small></span></div>
                    <div class="px-2 py-1"><span class="text-muted">Thuế:&nbsp;</span><span>$9.<small>50</small></span></div>
                    <div class="px-2 py-1"><span class="text-muted">Tổng tiền:&nbsp;</span><span
                            class="fs-lg">$297.<small>00</small></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('clients.index') }}"><i class="ci-home"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Tài khoản</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Lịch sử mua hàng</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Lịch sử mua hàng</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            @include('clients.Inc.account-sidebar')
            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                    <div class="d-flex align-items-center">
                        <label class="d-none d-lg-block fs-sm text-light text-nowrap opacity-75 me-2" for="order-sort">Sắp xếp theo:</label>
                        <label class="d-lg-none fs-sm text-nowrap opacity-75 me-2" for="order-sort">Sắp xếp theo:</label>
                        <select class="form-select" id="order-sort">
                            <option>Tất cả</option>
                            <option>Đã giao</option>
                            <option>Đang giao</option>
                            <option>Bị hoãn</option>
                            <option>Đã hủy</option>
                        </select>
                    </div><a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="account-signin.html"><i
                            class="ci-sign-out me-2"></i>Sign out</a>
                </div>
                <!-- Orders list-->
                <div class="table-responsive fs-md mb-4">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Mã đơn #</th>
                                <th>Ngày đặt</th>
                                <th>Tình trạng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="#order-details"
                                        data-bs-toggle="modal">34VB5540K83</a></td>
                                <td class="py-3">May 21, 2019</td>
                                <td class="py-3"><span class="badge bg-info m-0">Đang giao hàng</span></td>
                                <td class="py-3">$358.75</td>
                            </tr>
                            <tr>
                                <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="#order-details"
                                        data-bs-toggle="modal">78A643CD409</a></td>
                                <td class="py-3">December 09, 2018</td>
                                <td class="py-3"><span class="badge bg-danger m-0">Đã hủy</span></td>
                                <td class="py-3"><span>$760.50</span></td>
                            </tr>
                            <tr>
                                <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="#order-details"
                                        data-bs-toggle="modal">112P45A90V2</a></td>
                                <td class="py-3">October 15, 2018</td>
                                <td class="py-3"><span class="badge bg-warning m-0">Bị hoãn</span></td>
                                <td class="py-3">$1,264.00</td>
                            </tr>
                            <tr>
                                <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="#order-details"
                                        data-bs-toggle="modal">28BA67U0981</a></td>
                                <td class="py-3">July 19, 2018</td>
                                <td class="py-3"><span class="badge bg-success m-0">Đã giao hàng</span></td>
                                <td class="py-3">$198.35</td>
                            </tr>
                            <tr>
                                <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="#order-details"
                                        data-bs-toggle="modal">502TR872W2</a></td>
                                <td class="py-3">April 04, 2018</td>
                                <td class="py-3"><span class="badge bg-success m-0">Đã giao hàng</span></td>
                                <td class="py-3">$2,133.90</td>
                            </tr>
                            <tr>
                                <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="#order-details"
                                        data-bs-toggle="modal">47H76G09F33</a></td>
                                <td class="py-3">March 30, 2018</td>
                                <td class="py-3"><span class="badge bg-success m-0">Đã giao hàng</span></td>
                                <td class="py-3">$86.40</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination-->
                <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a></li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                        <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span
                                    class="visually-hidden">(current)</span></span></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i
                                    class="ci-arrow-right ms-2"></i></a></li>
                    </ul>
                </nav>
            </section>
        </div>
    </div>
@endsection
