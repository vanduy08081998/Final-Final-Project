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
                                href="shop-single-v1.html" style="width: 10rem;"><img
                                    src="{{ asset('frontend/img/shop/cart/01.jpg') }}" alt="Product"></a>
                            <div class="ps-sm-4 pt-2">
                                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">Women Colorblock
                                        Sneakers</a></h3>
                                <div class="fs-sm"><span class="text-muted me-2">Size:</span>8.5</div>
                                <div class="fs-sm"><span class="text-muted me-2">Color:</span>White &amp; Blue
                                </div>
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
                                href="shop-single-v1.html" style="width: 10rem;"><img
                                    src="{{ asset('frontend/img/shop/cart/02.jpg') }}" alt="Product"></a>
                            <div class="ps-sm-4 pt-2">
                                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">TH Jeans City
                                        Backpack</a></h3>
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
                                href="shop-single-v1.html" style="width: 10rem;"><img
                                    src="{{ asset('frontend/img/shop/cart/03.jpg') }}" alt="Product"></a>
                            <div class="ps-sm-4 pt-2">
                                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">3-Color Sun Stash
                                        Hat</a></h3>
                                <div class="fs-sm"><span class="text-muted me-2">Brand:</span>The North Face</div>
                                <div class="fs-sm"><span class="text-muted me-2">Color:</span>Pink / Beige / Dark
                                    blue</div>
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
                                href="shop-single-v1.html" style="width: 10rem;"><img
                                    src="{{ asset('frontend/img/shop/cart/04.jpg') }}" alt="Product"></a>
                            <div class="ps-sm-4 pt-2">
                                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">Cotton Polo Regular
                                        Fit</a></h3>
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
                    <div class="px-2 py-1"><span class="text-muted">Thành
                            tiền:&nbsp;</span><span>$265.<small>00</small></span></div>
                    <div class="px-2 py-1"><span class="text-muted">Phí giao
                            hàng:&nbsp;</span><span>$22.<small>50</small></span></div>
                    <div class="px-2 py-1"><span
                            class="text-muted">Thuế:&nbsp;</span><span>$9.<small>50</small></span></div>
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
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('clients.index') }}"><i
                                    class="ci-home"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Tài khoản</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Thông báo</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Thông báo</h1>
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

                    </div>
                    <a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="account-signin.html"><i
                            class="ci-sign-out me-2"></i>Đăng xuất</a>
                </div>
                <!-- Orders list-->
                @livewire('notifica')
                {{-- <div class="container-fluid" style="position:relative;">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item contact-not" data-type="mount">
                            <a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab"
                                aria-selected="true">Tất cả</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item contact-not" data-type="order">
                            <a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile"
                                role="tab" aria-selected="false">Đơn hàng</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item contact-not" data-type="comment">
                            <a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact"
                                role="tab" aria-selected="false">Bình luận</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item contact-not" data-type="discount">
                            <a class="nav-link" id="review-top-tab" data-bs-toggle="tab" href="#top-review"
                                role="tab" aria-selected="false">Mã giảm giá</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>

                    <div class="content-loader d-none">
                        <div class="loader"></div>
                    </div>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                            aria-labelledby="top-home-tab">
                            @livewire('notifica')
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            @livewire('notifica')
                        </div>
                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                            @livewire('notifica')
                        </div>
                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                            @livewire('notifica')
                        </div>
                    </div>

                </div> --}}
            </section>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $('.contact-not').click(function() {
            let type = $(this).data('type')
            $('.checked-input').click();
            if (type == 'comment') {
                $('.comment-check').click()
            }
            if (type == 'order') {
                $('.order-check').click()
            }
            if (type == 'review') {
                $('.review-check').click()
            }
        })
    </script>
@endpush
