@extends('layouts.client_master')


@section('title', 'Danh sách sản phẩm')


@section('content')
<?php 
use App\Models\Wishlist;
?>
    <!-- Quick View Modal-->
    <div class="modal-quick-view modal fade" id="quick-view" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title product-title"><a href="shop-single-v1.html" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Go to product page">Sports Hooded Sweatshirt<i
                                class="ci-arrow-right fs-lg ms-2"></i></a></h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Product gallery-->
                        <div class="col-lg-7 pe-lg-0">
                            <div class="product-gallery">
                                <div class="product-gallery-preview order-sm-2">
                                    <div class="product-gallery-preview-item active" id="first"><img class="image-zoom"
                                            src="{{ asset('frontend/img/shop/single/gallery/01.jpg') }}"
                                            data-zoom="{{ asset('frontend/img/shop/single/gallery/01.jpg') }}"
                                            alt="Product image">
                                        <div class="image-zoom-pane"></div>
                                    </div>
                                    <div class="product-gallery-preview-item" id="second"><img class="image-zoom"
                                            src="{{ asset('frontend/img/shop/single/gallery/02.jpg') }}"
                                            data-zoom="{{ asset('frontend/img/shop/single/gallery/02.jpg') }}"
                                            alt="Product image">
                                        <div class="image-zoom-pane"></div>
                                    </div>
                                    <div class="product-gallery-preview-item" id="third"><img class="image-zoom"
                                            src="{{ asset('frontend/img/shop/single/gallery/03.jpg') }}"
                                            data-zoom="{{ asset('frontend/img/shop/single/gallery/03.jpg') }}"
                                            alt="Product image">
                                        <div class="image-zoom-pane"></div>
                                    </div>
                                    <div class="product-gallery-preview-item" id="fourth"><img class="image-zoom"
                                            src="{{ asset('frontend/img/shop/single/gallery/04.jpg') }}"
                                            data-zoom="{{ asset('frontend/img/shop/single/gallery/04.jpg') }}"
                                            alt="Product image">
                                        <div class="image-zoom-pane"></div>
                                    </div>
                                </div>
                                <div class="product-gallery-thumblist order-sm-1"><a
                                        class="product-gallery-thumblist-item active" href="#first"><img
                                            src="{{ asset('frontend/img/shop/single/gallery/th01.jpg') }}"
                                            alt="Product thumb"></a><a class="product-gallery-thumblist-item"
                                        href="#second"><img src="{{ asset('frontend/img/shop/single/gallery/th02.jpg') }}"
                                            alt="Product thumb"></a><a class="product-gallery-thumblist-item"
                                        href="#third"><img src="{{ asset('frontend/img/shop/single/gallery/th03.jpg') }}"
                                            alt="Product thumb"></a><a class="product-gallery-thumblist-item"
                                        href="#fourth"><img
                                            src="{{ asset('frontend/img/shop/single/gallery/th04.jpg') }}"
                                            alt="Product thumb"></a></div>
                            </div>
                        </div>
                        <!-- Product details-->
                        <div class="col-lg-5 pt-4 pt-lg-0 image-zoom-pane">
                            <div class="product-details ms-auto pb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2"><a
                                        href="shop-single-v1.html#reviews">
                                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star"></i>
                                        </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74
                                            Reviews</span>
                                    </a>
                                    <button class="btn-wishlist" type="button" data-bs-toggle="tooltip"
                                        title="Thêm vào yêu thích"><i class="ci-heart"></i></button>
                                </div>
                                <div class="mb-3"><span
                                        class="h3 fw-normal text-accent me-1">$18.<small>99</small></span>
                                    <del class="text-muted fs-lg me-3">$25.<small>00</small></del><span
                                        class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                                </div>
                                <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Color:</span><span
                                        class="text-muted" id="colorOptionText">Red/Dark blue/White</span></div>
                                <div class="position-relative me-n4 mb-3">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color" id="color1"
                                            data-bs-label="colorOptionText" value="Red/Dark blue/White" checked>
                                        <label class="form-option-label rounded-circle" for="color1"><span
                                                class="form-option-color rounded-circle"
                                                style="background-image: url({{ asset('frontend/img/shop/single/color-opt-1.png') }}"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color" id="color2"
                                            data-bs-label="colorOptionText" value="Beige/White/Black">
                                        <label class="form-option-label rounded-circle" for="color2"><span
                                                class="form-option-color rounded-circle"
                                                style="background-image: url({{ asset('frontend/img/shop/single/color-opt-2.png') }}"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color" id="color3"
                                            data-bs-label="colorOptionText" value="Dark grey/White/Mustard">
                                        <label class="form-option-label rounded-circle" for="color3"><span
                                                class="form-option-color rounded-circle"
                                                style="background-image: url({{ asset('frontend/img/shop/single/color-opt-3.png') }}"></span></label>
                                    </div>
                                    <div class="product-badge product-available mt-n1"><i
                                            class="ci-security-check"></i>Product available</div>
                                </div>
                                <form class="mb-grid-gutter">
                                    <div class="mb-3">
                                        <label class="fw-medium pb-1" for="product-size">Size:</label>
                                        <select class="form-select" required id="product-size">
                                            <option value="">Select size</option>
                                            <option value="xs">XS</option>
                                            <option value="s">S</option>
                                            <option value="m">M</option>
                                            <option value="l">L</option>
                                            <option value="xl">XL</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 d-flex align-items-center">
                                        <select class="form-select me-3" style="width: 5rem;">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit"><i
                                                class="ci-cart fs-lg me-2"></i>Thêm vào giỏ hàng</button>
                                    </div>
                                </form>
                                <h5 class="h6 mb-3 pb-2 border-bottom"><i
                                        class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info
                                </h5>
                                <h6 class="fs-sm mb-2">Style</h6>
                                <ul class="fs-sm ps-4">
                                    <li>Hooded top</li>
                                </ul>
                                <h6 class="fs-sm mb-2">Composition</h6>
                                <ul class="fs-sm ps-4">
                                    <li>Elastic rib: Cotton 95%, Elastane 5%</li>
                                    <li>Lining: Cotton 100%</li>
                                    <li>Cotton 80%, Polyester 20%</li>
                                </ul>
                                <h6 class="fs-sm mb-2">Art. No.</h6>
                                <ul class="fs-sm ps-4 mb-0">
                                    <li>183260098</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar 3 Level (Light)-->
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2 pb-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i
                                    class="ci-home"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Cửa hàng</a></li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 text-center">
                <h1 class="h3 text-light mb-0">Cửa hàng</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-3">
                <!-- Sidebar-->
                <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar"
                    style="max-width: 24rem">
                    <div class="offcanvas-header align-items-center shadow-sm">
                        <h2 class="h5 mb-0">Bộ lọc</h2>
                        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas"
                            aria-label="Thoát"></button>
                    </div>
                    <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
                        <!-- Categories-->
                        <div class="widget widget-categories mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Danh mục</h3>
                            <div class="accordion mt-n1" id="shop-categories">
                                @foreach ($category as $key => $cate)
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <a class="accordion-button collapsed" href="#collapseSection-{{ $key }}" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">
                                            {{ $cate->category_name }}
                                        </a>
                                    </h3>
                                    <div class="accordion-collapse collapse" id="collapseSection-{{ $key }}">
                                        <div class="accordion-body">
                                            <div class="widget widget-links widget-filter">
                                                <div class="input-group input-group-sm mb-2">
                                                    <input class="widget-filter-search form-control rounded-end" type="text" placeholder="Tìm kiếm">
                                                    <i class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
                                                </div>
                                                <ul class="widget-list widget-filter-list pt-1" style="height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                                                    <li class="widget-list-item widget-filter-item">
                                                        <a class="widget-list-link d-flex justify-content-between align-items-center" href="#">
                                                            <span class="widget-filter-item-text">View all</span>
                                                            <span class="fs-xs text-muted ms-3">{{ $product->where('product_id_category', $cate->id_cate)->count() }}</span>
                                                        </a>
                                                    </li>
                                                    @foreach ($cate->brands as $brand)
                                                    <li class="widget-list-item widget-filter-item">
                                                        <a class="widget-list-link d-flex justify-content-between align-items-center" href="#">
                                                            <span class="widget-filter-item-text">{{ $brand->brand_name }}</span>
                                                            <span class="fs-xs text-muted ms-3">247</span>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Price range-->
                        <div class="widget mb-4 pb-4">
                            <h3 class="widget-title">Tìm theo giá: <span id="demo"></span></h3>
                            <form action="{{ route('search.range') }}" method="POST" enctype="multipart/form-data"
                                class="border-bottom">
                                @csrf
                                @method('POST')
                                <input type="range" name="range" max="{{ $max }}" min="{{ $min }}"
                                    id="myRange" value="{{ $min }}" step="1000" style="width: 260px;"><br>
                                <span style="float: left; margin-left: -5px;"><span>{{ number_format($min) }}
                                        ₫</span></span>
                                <span style="float: right; margin-right: -25px;"><span>{{ number_format($max) }}
                                        ₫</span></span><br>
                                <button class="btn btn-primary" style="float: right; margin-top: 15px;"
                                    type="submit">Tìm</button>
                            </form>
                        </div>
                        <!-- Filter by Brand-->
                        <div class="widget widget-filter mb-4 pb-4 pt-4 border-bottom">
                            <h3 class="widget-title">Brand</h3>
                            <div class="input-group input-group-sm mb-2">
                                <input class="widget-filter-search form-control rounded-end pe-5" type="text"
                                    placeholder="Search"><i
                                    class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
                            </div>
                            <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;"
                                data-simplebar data-simplebar-auto-hide="false">
                                @foreach ($brands as $brand)
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="adidas">
                                        <label class="form-check-label widget-filter-item-text" for="adidas">{{ $brand->brand_name }}</label>
                                    </div>
                                    <span class="fs-xs text-muted">123</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Filter by Size-->
                        <div class="widget widget-filter mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Size</h3>
                            <div class="input-group input-group-sm mb-2">
                                <input class="widget-filter-search form-control rounded-end pe-5" type="text"
                                    placeholder="Search"><i
                                    class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
                            </div>
                            <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;"
                                data-simplebar data-simplebar-auto-hide="false">
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-xs">
                                        <label class="form-check-label widget-filter-item-text" for="size-xs">XS</label>
                                    </div><span class="fs-xs text-muted">34</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-s">
                                        <label class="form-check-label widget-filter-item-text" for="size-s">S</label>
                                    </div><span class="fs-xs text-muted">57</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-m">
                                        <label class="form-check-label widget-filter-item-text" for="size-m">M</label>
                                    </div><span class="fs-xs text-muted">198</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-l">
                                        <label class="form-check-label widget-filter-item-text" for="size-l">L</label>
                                    </div><span class="fs-xs text-muted">72</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-xl">
                                        <label class="form-check-label widget-filter-item-text" for="size-xl">XL</label>
                                    </div><span class="fs-xs text-muted">46</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-39">
                                        <label class="form-check-label widget-filter-item-text" for="size-39">39</label>
                                    </div><span class="fs-xs text-muted">112</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-40">
                                        <label class="form-check-label widget-filter-item-text" for="size-40">40</label>
                                    </div><span class="fs-xs text-muted">85</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-41">
                                        <label class="form-check-label widget-filter-item-text" for="size-40">41</label>
                                    </div><span class="fs-xs text-muted">210</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-42">
                                        <label class="form-check-label widget-filter-item-text" for="size-42">42</label>
                                    </div><span class="fs-xs text-muted">57</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-43">
                                        <label class="form-check-label widget-filter-item-text" for="size-43">43</label>
                                    </div><span class="fs-xs text-muted">30</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-44">
                                        <label class="form-check-label widget-filter-item-text" for="size-44">44</label>
                                    </div><span class="fs-xs text-muted">61</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-45">
                                        <label class="form-check-label widget-filter-item-text" for="size-45">45</label>
                                    </div><span class="fs-xs text-muted">23</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-46">
                                        <label class="form-check-label widget-filter-item-text" for="size-46">46</label>
                                    </div><span class="fs-xs text-muted">19</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-47">
                                        <label class="form-check-label widget-filter-item-text" for="size-47">47</label>
                                    </div><span class="fs-xs text-muted">15</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-48">
                                        <label class="form-check-label widget-filter-item-text" for="size-48">48</label>
                                    </div><span class="fs-xs text-muted">12</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-49">
                                        <label class="form-check-label widget-filter-item-text" for="size-49">49</label>
                                    </div><span class="fs-xs text-muted">8</span>
                                </li>
                                <li class="widget-filter-item d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="size-50">
                                        <label class="form-check-label widget-filter-item-text" for="size-50">50</label>
                                    </div><span class="fs-xs text-muted">6</span>
                                </li>
                            </ul>
                        </div>
                        <!-- Filter by Color-->
                        <div class="widget">
                            <h3 class="widget-title">Color</h3>
                            <div class="d-flex flex-wrap">
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-blue-gray">
                                    <label class="form-option-label rounded-circle" for="color-blue-gray"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #b3c8db;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-blue-gray">Blue-gray</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-burgundy">
                                    <label class="form-option-label rounded-circle" for="color-burgundy"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #ca7295;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-burgundy">Burgundy</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-teal">
                                    <label class="form-option-label rounded-circle" for="color-teal"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #91c2c3;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-teal">Teal</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-brown">
                                    <label class="form-option-label rounded-circle" for="color-brown"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #9a8480;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-brown">Brown</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-coral-red">
                                    <label class="form-option-label rounded-circle" for="color-coral-red"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #ff7072;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-coral-red">Coral red</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-navy">
                                    <label class="form-option-label rounded-circle" for="color-navy"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #696dc8;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-navy">Navy</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-charcoal">
                                    <label class="form-option-label rounded-circle" for="color-charcoal"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #4e4d4d;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-charcoal">Charcoal</label>
                                </div>
                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                    <input class="form-check-input" type="checkbox" id="color-sky-blue">
                                    <label class="form-option-label rounded-circle" for="color-sky-blue"><span
                                            class="form-option-color rounded-circle"
                                            style="background-color: #8bcdf5;"></span></label>
                                    <label class="d-block fs-xs text-muted mt-n1" for="color-sky-blue">Sky blue</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- Content  -->
            <section class="col-lg-9 tab-content-shop" style="padding-right: 50px;">
                <!-- Toolbar-->
                <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
                    <div class="d-flex flex-wrap">
                        <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
                            <label class="text-light opacity-75 text-nowrap fs-sm me-2 d-none d-sm-block" for="sorting">Sắp
                                xếp theo:</label>
                            <select class="form-select" id="sorting">
                                <option>Tất cả</option>
                                <option>Giá tăng dần</option>
                                <option>Giá giảm dần</option>
                                <option>Lượt đánh giá</option>
                                <option>Từ A - Z</option>
                                <option>Từ Z - A</option>
                            </select><span class="fs-sm text-light opacity-75 text-nowrap ms-2 d-none d-md-block">của 287
                                sản phẩm</span>
                        </div>
                    </div>
                    <div class="d-none d-sm-flex pb-3"><a
                            class="btn btn-icon nav-link-style bg-light text-dark disabled opacity-100 me-2"
                            href="{{ route('shop.shop-grid') }}"><i class="ci-view-grid"></i></a><a
                            class="btn btn-icon nav-link-style nav-link-light" href="{{ route('shop.shop-list') }}"><i
                                class="ci-view-list"></i></a></div>
                </div>
                <!-- Products grid-->
                <div class="row mx-n2">
                    <!-- Product-->
                    @foreach ($product as $pro)
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                            <div class="card product-card">
                                @if (Auth::user() != NULL)
                                <?php
                                $user = Auth::user()->id;
                                $wishlist = Wishlist::orderByDESC('id')->where('id_prod', $pro->id)->where('id_user', $user)->first();
                                ?>
                                    @if ($wishlist != NULL)
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Xóa khỏi yêu thích" onclick="add_to_wishlist({{$pro->id}})" style="color: red">
                                        <i class="ci-heart"></i>
                                    </button>
                                    @elseif ($wishlist == NULL)
                                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào yêu thích" onclick="add_to_wishlist({{$pro->id}})">
                                        <i class="ci-heart"></i>
                                    </button>
                                    @endif
                                @else
                                    <a href="">dang nahap</a>
                                @endif
                                <a class="card-img-top d-block overflow-hidden" href="{{ route('shop.product-details', $pro->product_slug) }}">
                                    <img src="{{ URL::to($pro->product_image) }}" alt="Product" width="80%" style="margin: auto; display: block">
                                </a>
                                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">{{ $pro->Category->category_name }}</a>
                                    <h3 class="product-title fs-sm"><a
                                            href="shop-single-v1.html">{{ $pro->product_name }}</a></h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="product-price"><span
                                                class="text-accent">$154.<small>00</small></span></div>
                                        <div class="star-rating">
                                            <i class="star-rating-icon ci-star-filled active"></i>
                                            <i class="star-rating-icon ci-star-filled active"></i>
                                            <i class="star-rating-icon ci-star-filled active"></i>
                                            <i class="star-rating-icon ci-star-filled active"></i>
                                            <i class="star-rating-icon ci-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body card-body-hidden">
                                    <div class="text-center pb-2">
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="size1" id="s-75">
                                            <label class="form-option-label" for="s-75">7.5</label>
                                        </div>
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="size1" id="s-80" checked>
                                            <label class="form-option-label" for="s-80">8</label>
                                        </div>
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="size1" id="s-85">
                                            <label class="form-option-label" for="s-85">8.5</label>
                                        </div>
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="size1" id="s-90">
                                            <label class="form-option-label" for="s-90">9</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i
                                            class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng</button>
                                    <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view"
                                            data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Xem nhanh</a>
                                    </div>
                                </div>
                            </div>
                            <hr class="d-sm-none">
                        </div>
                    @endforeach
                </div>
                <!-- Banner-->
                <div class="py-sm-2">
                    <div
                        class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden mb-4 rounded-3">
                        <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                            <h4 class="fs-lg fw-light mb-2">Converse All Star</h4>
                            <h3 class="mb-4">Make Your Day Comfortable</h3><a
                                class="btn btn-primary btn-shadow btn-sm" href="#">Shop Now</a>
                        </div><img class="d-block ms-auto" src="{{ asset('frontend/img/shop/catalog/banner.jpg') }}"
                            alt="Shop Converse">
                    </div>
                </div>
                <!-- Products grid-->
                <div class="row mx-n2">
                    <!-- Product-->
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Thêm vào yêu thích"><i
                                    class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                                href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/07.jpg') }}"
                                    alt="Product"></a>
                            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Women's
                                    Swimwear</a>
                                <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Two-Piece Bikini in Print</a>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price"><span class="text-accent">$18.<small>99</small></span>
                                    </div>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="text-center pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size4" id="xs3" checked>
                                        <label class="form-option-label" for="xs3">XS</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size4" id="s3">
                                        <label class="form-option-label" for="s3">S</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size4" id="m3">
                                        <label class="form-option-label" for="m3">M</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng</button>
                                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Xem nhanh</a></div>
                            </div>
                        </div>
                        <hr class="d-sm-none">
                    </div>
                    <!-- Product-->
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Thêm vào yêu thích"><i
                                    class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                                href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/08.jpg') }}"
                                    alt="Product"></a>
                            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Kid's Toys</a>
                                <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Soft Panda Teddy Bear</a>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price"><span class="text-accent">$14.<small>99</small></span>
                                    </div>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng</button>
                                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Xem nhanh</a></div>
                            </div>
                        </div>
                        <hr class="d-sm-none">
                    </div>
                    <!-- Product-->
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Thêm vào yêu thích"><i
                                    class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                                href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/09.jpg') }}"
                                    alt="Product"></a>
                            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Cosmetics</a>
                                <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Metallic Lipstick
                                        (Crimson)</a></h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price"><span class="text-accent">$12.<small>99</small></span>
                                    </div>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-half active"></i><i
                                            class="star-rating-icon ci-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="text-center pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color3" id="crimson" checked>
                                        <label class="form-option-label rounded-circle" for="crimson"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #bd3c82;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color3" id="creamy">
                                        <label class="form-option-label rounded-circle" for="creamy"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #ebae81;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color3" id="palm">
                                        <label class="form-option-label rounded-circle" for="palm"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #ca8799;"></span></label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng</button>
                                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Xem nhanh</a>
                                </div>
                            </div>
                        </div>
                        <hr class="d-sm-none">
                    </div>
                    <!-- Product-->
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Thêm vào yêu thích"><i
                                    class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                                href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/10.jpg') }}"
                                    alt="Product"></a>
                            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                                    Accessories</a>
                                <h3 class="product-title fs-sm"><a href="shop-single-v1.html">5-Pack Multicolor
                                        Bracelets</a></h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price"><span class="text-accent">$7.<small>99</small></span>
                                    </div>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng</button>
                                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Xem nhanh</a>
                                </div>
                            </div>
                        </div>
                        <hr class="d-sm-none">
                    </div>
                    <!-- Product-->
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Thêm vào yêu thích"><i
                                    class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                                href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/11.jpg') }}"
                                    alt="Product"></a>
                            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                                    Sandals</a>
                                <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Soft Footbed Sandals</a>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price"><span
                                            class="text-accent">$99.<small>50</small></span></div>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="text-center pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color4" id="blue2" checked>
                                        <label class="form-option-label rounded-circle" for="blue2"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #879fb3;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color4" id="brown">
                                        <label class="form-option-label rounded-circle" for="brown"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #9c6d4a;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color4" id="black">
                                        <label class="form-option-label rounded-circle" for="black"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #333333;"></span></label>
                                    </div>
                                </div>
                                <div class="d-flex mb-2">
                                    <select class="form-select form-select-sm me-2">
                                        <option>9.5</option>
                                        <option>10</option>
                                        <option>10.5</option>
                                        <option>11</option>
                                        <option>11.5</option>
                                    </select>
                                    <button class="btn btn-primary btn-sm" type="button"><i
                                            class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng</button>
                                </div>
                                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Xem nhanh</a>
                                </div>
                            </div>
                        </div>
                        <hr class="d-sm-none">
                    </div>
                    <!-- Product-->
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Thêm vào yêu thích"><i
                                    class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                                href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/12.jpg') }}"
                                    alt="Product"></a>
                            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                                    Hats</a>
                                <h3 class="product-title fs-sm"><a href="shop-single-v1.html">3-Color Sun Stash Hat</a>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price"><span
                                            class="text-accent">$25.<small>99</small></span></div>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-half active"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="text-center pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size5" id="s4" checked>
                                        <label class="form-option-label" for="s4">S</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size5" id="m4">
                                        <label class="form-option-label" for="m4">M</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size5" id="l4">
                                        <label class="form-option-label" for="l4">L</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng</button>
                                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Xem nhanh</a>
                                </div>
                            </div>
                        </div>
                        <hr class="d-sm-none">
                    </div>
                    <!-- Product-->
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card"><span class="badge bg-danger badge-shadow">Sale</span>
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Thêm vào yêu thích"><i
                                    class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                                href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/13.jpg') }}"
                                    alt="Product"></a>
                            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                                    T-shirts</a>
                                <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Cotton Polo Regular Fit</a>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price"><span
                                            class="text-accent">$11.<small>50</small></span>
                                        <del class="fs-sm text-muted">$13.<small>50</small></del>
                                    </div>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star"></i><i
                                            class="star-rating-icon ci-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="text-center pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size6" id="s5">
                                        <label class="form-option-label" for="s5">S</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size6" id="m5">
                                        <label class="form-option-label" for="m5">M</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size6" id="l5" checked>
                                        <label class="form-option-label" for="l5">L</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size6" id="xl5">
                                        <label class="form-option-label" for="xl5">XL</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng</button>
                                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Xem nhanh</a>
                                </div>
                            </div>
                        </div>
                        <hr class="d-sm-none">
                    </div>
                    <!-- Product-->
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Thêm vào yêu thích"><i
                                    class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                                href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/14.jpg') }}"
                                    alt="Product"></a>
                            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                                    Jeans</a>
                                <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Slim Taper Fit Jeans</a>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price"><span
                                            class="text-accent">$58.<small>99</small></span></div>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="text-center pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size7" id="s6">
                                        <label class="form-option-label" for="s6">S</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size7" id="m6">
                                        <label class="form-option-label" for="m6">M</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size7" id="l6" checked>
                                        <label class="form-option-label" for="l6">L</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size7" id="xl6">
                                        <label class="form-option-label" for="xl6">XL</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng</button>
                                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Xem nhanh</a>
                                </div>
                            </div>
                        </div>
                        <hr class="d-sm-none">
                    </div>
                    <!-- Product-->
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Thêm vào yêu thích"><i
                                    class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
                                href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/15.jpg') }}"
                                    alt="Product"></a>
                            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                                    Waistcoats</a>
                                <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Single-breasted
                                        Trenchcoat</a></h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price"><span
                                            class="text-accent">$79.<small>99</small></span></div>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-half active"></i><i
                                            class="star-rating-icon ci-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="text-center pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size8" id="m7">
                                        <label class="form-option-label" for="m7">M</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size8" id="l7" checked>
                                        <label class="form-option-label" for="l7">L</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size8" id="xl7">
                                        <label class="form-option-label" for="xl7">XL</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng</button>
                                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-3">
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
