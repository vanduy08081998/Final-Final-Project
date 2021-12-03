@extends('layouts.client_master')


@section('title', 'Danh sách sản phẩm')


@section('content')
    <!-- Quick View Modal-->
    @include('clients.Inc.quickview');
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2 pb-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i
                                    class="ci-home"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Nhãn hiệu</a></li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 text-center">
                <h1 class="h3 text-light mb-0">Nhãn hiệu</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            {{-- <aside class="col-lg-3">
                @include('Clients.shop.navbar-shop');
            </aside> --}}
            <!-- Content  -->
            <section class="col-lg-12 tab-content-shop" style="padding-right: 50px">
                <!-- Toolbar-->
                
                <!-- Products list-->
                <!-- Product-->
                @foreach ($brands as $brand)
                <div class="card card-body">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Yêu thích"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"><a class="product-list-thumb" href="shop-single-v1.html">
                        <img src="{{ url('uploads/files/Brands/', $brand->brand_image) }}" alt="Brand" width="250px"></a>
                        <div class="card-body py-2">
                            <h2 class="product-title fs-base" style="text-align:center;">
                                <a href="shop-single-v1.html" style="font-size: 20px">{{ $brand->brand_name }}</a>
                            </h2>
                            <div class="d-flex justify-content-between" style="text-align:center;">
                                <div class="product-price">
                                    <span class="text-accent">{!! $brand->meta_desc !!}</span>
                                </div>
                            </div>
                            <div class="card-body" style="text-align: center">
                                <button class="btn btn-primary btn-sm mb-2" type="button">
                                    <i class="ci-view-grid fs-sm me-1"></i>Xem sản phẩm hiện có
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top pt-3 mt-3"></div>
                @endforeach
                <!-- Pagination-->
                <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i
                                    class="ci-arrow-left me-2"></i>Prev</a></li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                        <li class="page-item active d-none d-sm-block" aria-current="page"><span
                                class="page-link">1<span class="visually-hidden">(current)</span></span></li>
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
