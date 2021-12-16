@extends('layouts.client_master')


@section('title', 'Trang chủ')


@section('content')
<style>
    .card-body .product-title {
        min-height: 28px;
        margin-bottom: 0px !important;
    }
    /* @media (min-width: 68.75em){
        #tns2 {
        width: calc(400%);
    }
        #tns3 {
        width: calc(400%);
    }
    } */
    .product-item {
        height: 400px !important;
    } 
</style>

    <!-- Hero (Banners + Slider)-->
    <section class="bg-secondary py-4 banner">
        <div class="container py-xl-2">
            <div class="row">
                <!-- Slider     -->
                <div class="col-xl-9 pt-xl-4 order-xl-2 slider">
                    <div class="tns-carousel">
                        <div class="tns-carousel-inner"
                            data-carousel-options="{&quot;items&quot;: 1, &quot;controls&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true}">
                            @foreach ($slide as $item)
                                <div>
                                    <div class="row align-items-center carousel-control">
                                        <div class="col-md-6 order-md-2 carousel-img">
                                            <img class="d-block mx-auto"
                                                src="{{ url('uploads/Banner/', $item->banner_img) }}" alt="VR Collection">
                                        </div>
                                        <div class="col-lg-5 col-md-6 offset-lg-1 order-md-1 pt-4 pb-md-4 text-center text-md-start carousel-text">
                                            <h2 class="fw-light pb-1 from-bottom" style="color: #38ada9;"></h2>
                                            <h1 class="display-4 from-bottom delay-1" style="color: #38ada9;">
                                                {{ $item->banner_name }}</h1>
                                            <h4 class="fw-light pb-3 from-bottom delay-2" style="color: #38ada9; font-weight: 700;">Với Nhiều Ưu Đãi Hấp Dẫn Đang Chờ Bạn</h4>
                                            <div class="d-table scale-up delay-4 mx-auto mx-md-0">
                                                <a class="btn btn-primary btn-shadow" href="{{ $item->banner_link }}"><i class="fas fa-shopping-cart"></i> Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Banner group-->
                <div class="col-xl-3 order-xl-1 pt-4 mt-3 mt-xl-0 pt-xl-0 nav-slider">
                    <div class="table-responsive" data-simplebar>
                        <div class="d-flex d-xl-block">
                            <a class="d-flex align-items-center bg-faded-info rounded-3 pt-2 ps-2 mb-4 me-4 me-xl-0 banner-item"
                                href="#" style="min-width: 16rem;">
                                <img src="{{ asset('frontend/img/home/banners/banner-sm01.png') }}" width="100"
                                    alt="Banner">
                                <div class="py-4 px-2 banner-item-text">
                                    <h5 class="mb-2"><span class="fw-light">Next Gen</span><br>Video <span
                                            class="fw-light">with</span><br>360 Cam</h5>
                                    <div class="text-info fs-sm">Shop now<i class="ci-arrow-right fs-xs ms-1"></i></div>
                                </div>
                            </a>
                            <a class="d-flex align-items-center bg-faded-warning rounded-3 pt-2 ps-2 mb-4 me-4 me-xl-0 banner-item"
                                href="#" style="min-width: 16rem;">
                                <img src="{{ asset('frontend/img/home/banners/banner-sm02.png') }}" width="100"
                                    alt="Banner">
                                <div class="py-4 px-2 banner-item-text">
                                    <h5 class="mb-2"><span class="fw-light">Top
                                            Rated</span><br>Gadgets<br><span class="fw-light">are on </span>Sale</h5>
                                    <div class="text-warning fs-sm">Shop now<i class="ci-arrow-right fs-xs ms-1"></i></div>
                                </div>
                            </a>
                            <a class="d-flex align-items-center bg-faded-success rounded-3 pt-2 ps-2 mb-4 banner-item"
                                href="#" style="min-width: 16rem;">
                                <img src="{{ asset('frontend/img/home/banners/banner-sm03.png') }}" width="100"
                                    alt="Banner">
                                <div class="py-4 px-2 banner-item-text">
                                    <h5 class="mb-2"><span class="fw-light">Catch Big</span><br>Deals <span
                                            class="fw-light">on</span><br>Earbuds</h5>
                                    <div class="text-success fs-sm">Shop now<i class="ci-arrow-right fs-xs ms-1"></i></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid banner-main">
        <div class="banner-left col-md-1">
            <a href="#">
                <img src="{{ asset ('frontend/images/bannerQC.jpg') }}" alt="">
            </a>
        </div>
        <div class="banner-center col-md-10"></div>
        <div class="banner-right col-md-1">
            <a href="#">
                <img src="{{ asset ('frontend/images/bannerQC.jpg') }}" alt="">
            </a>
        </div>
    </section>
        
    <!-- Products grid (Trending products)-->
    <section class="container pt-5">
        <!-- Heading-->
        <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 me-2">Sản phẩm thịnh hành</h2>
            <div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="shop-grid-ls.html">Xem thêm<i
                        class="ci-arrow-right ms-1 me-n1"></i></a></div>
        </div>
        <!-- Grid-->
        <div class="tns-carousel tns-controls-static tns-controls-outside" style="height: 360px">
            <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1920&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 30}}}">
              <!-- Product-->
              @foreach ($product as $product)
                <div class="product-item">
                  <div class="card product-card">
                    @if ($product->discount_unit == '%')
                    <span class="badge bg-danger badge-shadow">Sale</span>
                    @endif
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào yêu thích">
                        <i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('shop.product-details', $product->product_slug) }}">
                        <img src="{{ asset($product->product_image) }}" alt="Product"></a>
                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="{{ route('shop.product-details', $product->product_slug) }}"></a>
                      <h3 class="product-title fs-sm"><a href="{{ route('shop.product-details', $product->product_slug) }}">{{ trans($product->product_name) }}</a></h3>
                      <div class="d-flex justify-content-between">
                        @if ($product->discount_unit == '%')
                        <div class="product-price">
                            <span>{{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }} ₫</span>
                        </div>
                        <div class="product-price" style="font-size: 12px">
                            <span style="text-decoration: line-through">{{ number_format($product->unit_price) }} ₫</span>
                        </div>
                        @else
                        <div class="product-price" style="font-size: 12px">
                            <span style="text-decoration: line-through">{{ number_format($product->unit_price) }} ₫</span>
                        </div>
                        @endif
                      </div>
                      <div class="d-flex justify-content-between">
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                            class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i
                            class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                        </div>
                      </div>
                    </div>
                    <div class="card-body card-body-hidden" style="z-index: 10">
                      <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button">
                          <i class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng
                      </button>
                      <div class="text-center">
                          <a class="nav-link-style fs-ms" href="#quick-view-electro" data-bs-toggle="modal">
                              <i class="ci-eye align-middle me-1"></i>Xem nhanh
                          </a>
                      </div>
                  </div>
                  </div>
                </div>
                <!-- Product-->
              @endforeach
            </div>
          </div>
    </section>
    {{-- Sản phẩm nổi bật --}}
    <section class="container">
        <!-- Heading-->
        <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 me-2">Sản phẩm nổi bật</h2>
            <div class="pt-3">
                <a class="btn btn-outline-accent btn-sm" href="shop-grid-ls.html">Xem thêm
                    <i class="ci-arrow-right ms-1 me-n1"></i>
                </a>
            </div>
        </div>
        <!-- Grid-->
        <div class="tns-carousel tns-controls-static tns-controls-outside" style="height: 360px">
            <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1920&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 30}}}">
              <!-- Product-->
              @foreach ($highlight as $product)
                <div class="product-item" style="height: 375px">
                  <div class="card product-card">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào yêu thích">
                        <i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('shop.product-details', $product->product_slug) }}">
                        <img src="{{ asset($product->product_image) }}" alt="Product"></a>
                    <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="{{ route('shop.product-details', $product->product_slug) }}"></a>
                      <h3 class="product-title fs-sm"><a href="{{ route('shop.product-details', $product->product_slug) }}">{{ trans($product->product_name) }}</a></h3>
                      <div class="d-flex justify-content-between">
                        @if ($product->discount_unit == '%')
                        <div class="product-price">
                            <span>{{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }} ₫</span>
                        </div>
                        <div class="product-price" style="font-size: 12px">
                            <span style="text-decoration: line-through">{{ number_format($product->unit_price) }} ₫</span>
                        </div>
                        @else
                        <div class="product-price" style="font-size: 12px">
                            <span style="text-decoration: line-through">{{ number_format($product->unit_price) }} ₫</span>
                        </div>
                        @endif
                      </div>
                      <div class="d-flex justify-content-between">
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                            class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i
                            class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                        </div>
                      </div>
                    </div>
                    <div class="card-body card-body-hidden" style="z-index: 10">
                      <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button">
                          <i class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng
                      </button>
                      <div class="text-center">
                          <a class="nav-link-style fs-ms" href="#quick-view-electro" data-bs-toggle="modal">
                              <i class="ci-eye align-middle me-1"></i>Xem nhanh
                          </a>
                      </div>
                  </div>
                  </div>
                </div>
                <!-- Product-->
              @endforeach
            </div>
          </div>
    </section>
    <!-- Promo banner-->
    <section class="container mt-4 mb-grid-gutter">
        <div class="bg-faded-info rounded-3 py-4">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="px-4 pe-sm-0 ps-sm-5"><span class="badge bg-danger">Limited Offer</span>
                        <h3 class="mt-4 mb-1 text-body fw-light">All new</h3>
                        <h2 class="mb-1">Last Gen iPad Pro</h2>
                        <p class="h5 text-body fw-light">at discounted price. Hurry up!</p>
                        <div class="countdown py-2 h4" data-countdown="07/01/2021 07:00:00 PM">
                            <div class="countdown-days"><span class="countdown-value"></span><span
                                    class="countdown-label text-muted">d</span></div>
                            <div class="countdown-hours"><span class="countdown-value"></span><span
                                    class="countdown-label text-muted">h</span></div>
                            <div class="countdown-minutes"><span class="countdown-value"></span><span
                                    class="countdown-label text-muted">m</span></div>
                            <div class="countdown-seconds"><span class="countdown-value"></span><span
                                    class="countdown-label text-muted">s</span></div>
                        </div><a class="btn btn-accent" href="#">View offers<i class="ci-arrow-right fs-ms ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-7"><img src="{{ asset('frontend/img/home/banners/offer.jpg') }}"
                        alt="iPad Pro Offer"></div>
            </div>
        </div>
    </section>
    <!-- Brands carousel-->
    <section class="container mb-5 mt-5">
        <div class="tns-carousel">
            <div class="tns-carousel-inner" data-carousel-options="{ &quot;nav&quot;: false, &quot;controls&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 3000, &quot;loop&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
                @foreach ($brand as $item)
                <div>
                    <a class="d-block bg-white py-4 py-sm-4 px-2" href="#" style="margin-right: -.0625rem;">
                        <img class="d-block mx-auto" src="{{ url( 'uploads/files/Brands/', $item->brand_image ) }}" style="width: 130px; height: 60px" alt="Brand">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product widgets-->
    <section class="container pb-4 pb-md-5">
        <div class="row">
            <!-- Bestsellers-->
            <div class="col-md-4 col-sm-6 mb-2 py-3">
                <div class="widget">
                    <h3 class="widget-title">Bán chạy nhất</h3>
                    <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0"
                            href="{{ url('shop/product-details') }}"><img
                                src="{{ asset('frontend/img/shop/cart/widget/05.jpg') }}" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="{{ url('shop/product-details') }}">Wireless
                                    Bluetooth
                                    Headphones</a></h6>
                            <div class="widget-product-meta"><span class="text-accent">$259.<small>00</small></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                            href="{{ url('shop/product-details') }}"><img
                                src="{{ asset('frontend/img/shop/cart/widget/06.jpg') }}" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="{{ url('shop/product-details') }}">Cloud Security
                                    Camera</a></h6>
                            <div class="widget-product-meta"><span class="text-accent">$122.<small>00</small></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                            href="{{ url('shop/product-details') }}"><img
                                src="{{ asset('frontend/img/shop/cart/widget/07.jpg') }}" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="{{ url('shop/product-details') }}">Android
                                    Smartphone S10</a></h6>
                            <div class="widget-product-meta"><span class="text-accent">$799.<small>00</small></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center py-2"><a class="d-block flex-shrink-0"
                            href="{{ url('shop/product-details') }}"><img
                                src="{{ asset('frontend/img/shop/cart/widget/08.jpg') }}" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="{{ url('shop/product-details') }}">Android Smart
                                    TV Box</a></h6>
                            <div class="widget-product-meta"><span class="text-accent">$67.<small>00</small></span>
                                <del class="text-muted fs-xs">$90.<small>43</small></del>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0">...</p><a class="fs-sm" href="shop-grid-ls.html">Xem thêm...<i
                            class="ci-arrow-right fs-xs ms-1"></i></a>
                </div>
            </div>
            <!-- New arrivals-->
            <div class="col-md-4 col-sm-6 mb-2 py-3">
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0"
                            href="{{ url('shop/product-details') }}"><img
                                src="{{ asset('frontend/img/shop/widget/06.jpg') }}" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="{{ url('shop/product-details') }}">Monoblock
                                    Desktop PC</a></h6>
                            <div class="widget-product-meta"><span class="text-accent">$1,949.<small>00</small></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                            href="{{ url('shop/product-details') }}"><img
                                src="{{ asset('frontend/img/shop/widget/07.jpg') }}" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="{{ url('shop/product-details') }}">Laserjet
                                    Printer All-in-One</a>
                            </h6>
                            <div class="widget-product-meta"><span class="text-accent">$428.<small>60</small></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                            href="{{ url('shop/product-details') }}"><img
                                src="{{ asset('frontend/img/shop/widget/08.jpg') }}" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="{{ url('shop/product-details') }}">Console
                                    Controller Charger</a>
                            </h6>
                            <div class="widget-product-meta"><span class="text-accent">$14.<small>97</small></span>
                                <del class="text-muted fs-xs">$16.<small>47</small></del>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center py-2"><a class="d-block flex-shrink-0"
                            href="{{ url('shop/product-details') }}"><img
                                src="{{ asset('frontend/img/shop/widget/09.jpg') }}" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="{{ url('shop/product-details') }}">Smart Watch
                                    Series 5,
                                    Aluminium</a></h6>
                            <div class="widget-product-meta"><span class="text-accent">$349.<small>99</small></span>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0">...</p><a class="fs-sm" href="shop-grid-ls.html">Xem thêm...<i
                            class="ci-arrow-right fs-xs ms-1"></i></a>
                </div>
            </div>
            <!-- Top rated-->
            <div class="col-md-4 col-sm-6 mb-2 py-3">
                <div class="widget">
                    <h3 class="widget-title">Đánh giá cao</h3>
                    <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0"
                            href="{{ url('shop/product-details') }}"><img
                                src="{{ asset('frontend/img/shop/widget/10.jpg') }}" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="{{ url('shop/product-details') }}">Android
                                    Smartphone S9</a></h6>
                            <div class="widget-product-meta"><span class="text-accent">$749.<small>99</small></span>
                                <del class="text-muted fs-xs">$859.<small>99</small></del>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                            href="{{ url('shop/product-details') }}"><img
                                src="{{ asset('frontend/img/shop/widget/11.jpg') }}" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="{{ url('shop/product-details') }}">Wireless
                                    Bluetooth
                                    Headphones</a></h6>
                            <div class="widget-product-meta"><span class="text-accent">$428.<small>60</small></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                            href="{{ url('shop/product-details') }}"><img
                                src="{{ asset('frontend/img/shop/widget/12.jpg') }}" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="{{ url('shop/product-details') }}">360 Degrees
                                    Camera</a></h6>
                            <div class="widget-product-meta"><span class="text-accent">$98.<small>75</small></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center py-2"><a class="d-block flex-shrink-0"
                            href="{{ url('shop/product-details') }}"><img
                                src="{{ asset('frontend/img/shop/widget/13.jpg') }}" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="{{ url('shop/product-details') }}">Digital Camera
                                    40MP</a></h6>
                            <div class="widget-product-meta"><span class="text-accent">$210.<small>00</small></span>
                                <del class="text-muted fs-xs">$249.<small>00</small></del>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0">...</p><a class="fs-sm" href="shop-grid-ls.html">Xem thêm...<i
                            class="ci-arrow-right fs-xs ms-1"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog + Instagram info cards-->
    <section class="container-fluid px-0">
        <div class="row g-0">
            <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary"
                    href="blog-list-sidebar.html">
                    <div class="card-body text-center"><i class="ci-edit h3 mt-2 mb-4 text-primary"></i>
                        <h3 class="h5 mb-1">Xem các bài viết</h3>
                        <p class="text-muted fs-sm">Tin tức về cửa hàng, sản phẩm và xu hướng</p>
                    </div>
                </a></div>
            <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent"
                    href="#">
                    <div class="card-body text-center"><i class="ci-facebook h3 mt-2 mb-4 text-accent"></i>
                        <h3 class="h5 mb-1">Theo dõi trên Facebook</h3>
                        <p class="text-muted fs-sm">#MuaHangCungBigDeal</p>
                    </div>
                </a></div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
           $(window).scroll(function(event) {
              var pos_body = $('html,body').scrollTop();
            //   console.log(pos_body);
              if(pos_body>545.4545288085938){
                 $('.banner-main').addClass('banner-fixed');
              }
              if(pos_body<545.4545288085938){
                 $('.banner-main').removeClass('banner-fixed');
              }
           });
        });
    </script>
@endsection
