@extends('layouts.client_master')


@section('title', 'Trang chủ')


@section('content')
  <?php
  use App\Models\Wishlist;
  ?>
  <style>
    .card-body .product-title {
      min-height: 28px;
      margin-bottom: 0px !important;
    }

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
                      <img class="d-block mx-auto" src="{{ url('uploads/Banner/', $item->banner_img) }}"
                        alt="VR Collection">
                    </div>
                    <div
                      class="col-lg-5 col-md-6 offset-lg-1 order-md-1 pt-4 pb-md-4 text-center text-md-start carousel-text">
                      <h2 class="fw-light pb-1 from-bottom" style="color: #38ada9;"></h2>
                      <h1 class="display-4 from-bottom delay-1" style="color: #38ada9;">
                        {{ $item->banner_name }}</h1>
                      <h4 class="fw-light pb-3 from-bottom delay-2" style="color: #38ada9; font-weight: 700;">Với Nhiều Ưu
                        Đãi Hấp Dẫn Đang Chờ
                        Bạn</h4>
                      <div class="d-table scale-up delay-4 mx-auto mx-md-0">
                        <a class="btn btn-primary btn-shadow" href="{{ $item->banner_link }}"><i
                            class="fas fa-shopping-cart"></i> Mua ngay</a>
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
                href="{{ route('shop.shop-grid', 23) }}" style="min-width: 16rem;">
                <img src="{{ asset('frontend/img/home/banners/banner-sm02.png') }}" width="100" alt="Banner">
                <div class="py-4 px-2 banner-item-text">
                  <h5 class="mb-2"><span class="fw-light">Điện Thoại</span><br>có
                    giá<br><span class="fw-light">Cực Sốc </span></h5>
                  <div class="text-warning fs-sm">Mua ngay<i class="ci-arrow-right fs-xs ms-1"></i></div>
                </div>
              </a>
              <a class="d-flex align-items-center bg-faded-info rounded-3 pt-2 ps-2 mb-4 me-4 me-xl-0 banner-item"
                href="{{ route('shop.shop-grid', 27) }}" style="min-width: 16rem;">
                <img src="{{ asset('frontend/img/home/banners/banner-sm01.png') }}" width="100" alt="Banner">
                <div class="py-4 px-2 banner-item-text">
                  <h5 class="mb-2"><span class="fw-light">Camera</span><br><span
                      class="fw-light">kèm nhiều</span><br>Ưu Đãi</h5>
                  <div class="text-info fs-sm">Mua ngay<i class="ci-arrow-right fs-xs ms-1"></i></div>
                </div>
              </a>
              <a class="d-flex align-items-center bg-faded-info rounded-3 pt-2 ps-2 mb-4 banner-item"
                href="{{ route('shop.shop-grid', 25) }}" style="min-width: 16rem;">
                <img src="{{ asset('frontend/img/home/banners/banner-sm03.png') }}" width="100" alt="Banner">
                <div class="py-4 px-2 banner-item-text">
                  <h5 class="mb-2"><span class="fw-light">Phụ Kiện Số</span><br><span
                      class="fw-light">ưu đãi</span><br>Cực Lớn</h5>
                  <div class="text-success fs-sm">Mua ngay<i class="ci-arrow-right fs-xs ms-1"></i></div>
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
      <a href="{{ $banner[0]->banner_link }}">
        <img src="{{ url('uploads/Banner/', $banner[0]->banner_img) }}" alt="">
      </a>
    </div>
    <div class="col-md-10"></div>
    <div class="banner-right col-md-1">
      <a href="{{ $banner[1]->banner_link }}">
        <img src="{{ url('uploads/Banner/', $banner[1]->banner_img) }}" alt="">
      </a>
    </div>
  </section>

  <!-- Products grid (Trending products)-->
  <section class="container pt-5 trending-product">
    <!-- Heading-->
    <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
      <h2><strong>Sản phẩm mới nhất</strong></h2>
      <div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="shop-grid-ls.html">Xem thêm<i
            class="ci-arrow-right ms-1 me-n1"></i></a></div>
    </div>
    <!-- Grid-->
    <div class="tns-carousel tns-controls-static tns-controls-outside" style="height: 360px">
      <div class="tns-carousel-inner"
        data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1280&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 30}, &quot;1920&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 30}, &quot;966&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 30}}}">
        <!-- Product-->
        @foreach ($product as $product)
          <div class="product-item">
            <div class="card product-card">
              @if ($product->discount == 0)
              @else
                <span class="badge bg-danger badge-shadow">Giảm giá
                  {{ $product->discount }}@if ($product->discount_unit == '%') % @else ₫ @endif</span>
              @endif
              <a class="card-img-top d-block overflow-hidden"
                href="{{ route('shop.product-details', $product->product_slug) }}">
                <img srcset="{{ URL::to($product->product_image) }} 2x" alt="Product" width="200px"
                  style="margin: auto; display: block">
              </a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1 category-name text-center"
                  href="#">{{ $product->Category->category_name }}</a>
                <h3 class="product-title fs-sm text-center"><a
                    href="shop-single-v1.html">{{ Str::limit($product->product_name, 30, '...') }}</a>
                </h3>
                <div class="d-flex justify-content-between">
                  @if ($product->discount != 0)
                    <div class="product-price">
                      <span>{{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }}
                        ₫</span>
                    </div>
                    <div class="product-price" style="font-size: 12px">
                      <span style="text-decoration: line-through">{{ number_format($product->unit_price) }}
                        ₫</span>
                    </div>
                  @elseif ($product->discount == 0)
                    <div class="product-price w-100 text-center">
                      <span>{{ number_format($product->unit_price) }}
                        ₫</span>
                    </div>
                  @endif
                </div>
                <div class="d-flex justify-content-between">
                  <div class="star-rating w-100 text-center">
                    @php
                      $arrayRating = [];
                      $avg = 0;
                      $total = 0;
                      $reviews = \App\Models\Review::where('product_id', $product->id)->get();
                      $count = 0;
                      if (count($reviews) > 0) {
                          $count = count($reviews);
                          foreach ($reviews as $key => $review) {
                              $total += $review->count_rating;
                          }
                          $avg = round($total / $count);
                      } else {
                          $avg = 0;
                          $count = 0;
                      }
                    @endphp

                    @if ($reviews != null)
                      @for ($i = 0; $i < 5; $i++)
                        @for ($j = 0; $j < $avg; $j++)
                          @php
                            array_push($arrayRating, $j);
                          @endphp
                        @endfor
                        <i class="star-rating-icon ci-star-filled @if (in_array($i, $arrayRating)) active @endif"></i>
                      @endfor
                    @else

                    @endif
                  </div>
                </div>
              </div>
              <div class="card-body card-body-hidden text-center" id="card-body"
                style="z-index: 10; display: inline; padding: 15px">
                @if (Auth::user() != null)
                  <?php
                  $user = Auth::user()->id;
                  $wishlist = Wishlist::orderByDESC('id')
                      ->where('id_prod', $product->id)
                      ->where('id_user', $user)
                      ->first();
                  ?>
                  @if ($wishlist != null)
                    <a class="btn-wishlist_{{ $product->id }} nav-link-style me-3" style="cursor: pointer"
                      onclick="add_to_wishlist({{ $product->id }})">
                      <i class="ci-heart"></i>
                    </a>
                  @elseif ($wishlist == NULL)
                    <a class="btn-wishlist_{{ $product->id }} nav-link-style me-3" style="cursor: pointer"
                      onclick="add_to_wishlist({{ $product->id }})">
                      <i class="ci-heart"></i>
                    </a>
                  @endif
                @else
                  <a class="btn-wishlist_{{ $product->id }} nav-link-style me-3" style="cursor: pointer"
                    onclick="add_to_wishlist({{ $product->id }})">
                    <i class="ci-heart"></i>
                  </a>
                @endif
                <input type="hidden" id="wishlist_productsku{{ $product->id }}"
                  value="{{ $product->specifications }}">
                <input type="hidden" value="{{ $product->id }}">
                <input type="hidden" id="wishlist_productname{{ $product->id }}"
                  value="{{ $product->product_name }}">
                <input type="hidden" id="wishlist_productprice{{ $product->id }}"
                  value="{{ number_format($product->unit_price) }}">
                <input type="hidden" id="wishlist_productimg{{ $product->id }}"
                  value="{{ url($product->product_image) }}">
                <a type="hidden" id="wishlist_producturl{{ $product->id }}"
                  href="{{ route('shop.product-details', $product->product_slug) }}">
                </a>
                </a>
                <a class="nav-link-style me-3" onclick="quickviewModal({{ $product->id }})">
                  <i class="ci-eye"></i>
                </a>
              </div>
              <!-- Quick View Modal-->
            </div>
          </div>
          <!-- Product-->
        @endforeach
      </div>
    </div>
  </section>
  {{-- Sản phẩm nổi bật --}}
  <section class="container highlight-product">
    <!-- Heading-->
    <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
      <h2><strong>Sản phẩm nổi bật</strong></h2>
      <div class="pt-3">
        <a class="btn btn-outline-accent btn-sm" href="shop-grid-ls.html">Xem thêm
          <i class="ci-arrow-right ms-1 me-n1"></i>
        </a>
      </div>
    </div>
    <!-- Grid-->
    <div class="tns-carousel tns-controls-static tns-controls-outside" style="height: 360px">
      <div class="tns-carousel-inner"
        data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1280&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 30}, &quot;1920&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 30}, &quot;966&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 30}}}">
        <!-- Product-->
        @foreach ($highlight as $product)
          <div class="product-item" style="height: 375px">
            <div class="card product-card">
              @if ($product->discount == 0)
              @else
                <span class="badge bg-danger badge-shadow">Giảm giá
                  {{ $product->discount }}@if ($product->discount_unit == '%') % @else ₫ @endif</span>
              @endif
              <a class="card-img-top d-block overflow-hidden"
                href="{{ route('shop.product-details', $product->product_slug) }}">
                <img srcset="{{ URL::to($product->product_image) }} 2x" alt="Product" width="200px"
                  style="margin: auto; display: block">
              </a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1 category-name text-center"
                  href="#">{{ $product->Category->category_name }}</a>
                <h3 class="product-title fs-sm text-center"><a
                    href="shop-single-v1.html">{{ Str::limit($product->product_name, 30, '...') }}</a>
                </h3>
                <div class="d-flex justify-content-between">
                  @if ($product->discount != 0)
                    <div class="product-price">
                      <span>{{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }}
                        ₫</span>
                    </div>
                    <div class="product-price" style="font-size: 12px">
                      <span style="text-decoration: line-through">{{ number_format($product->unit_price) }}
                        ₫</span>
                    </div>
                  @elseif ($product->discount == 0)
                    <div class="product-price w-100 text-center">
                      <span>{{ number_format($product->unit_price) }}
                        ₫</span>
                    </div>
                  @endif
                </div>
                <div class="d-flex justify-content-between">
                  <div class="star-rating w-100 text-center">
                    @php
                      $arrayRating = [];
                      $avg = 0;
                      $total = 0;
                      $reviews = \App\Models\Review::where('product_id', $product->id)->get();
                      $count = 0;
                      if (count($reviews) > 0) {
                          $count = count($reviews);
                          foreach ($reviews as $key => $review) {
                              $total += $review->count_rating;
                          }
                          $avg = round($total / $count);
                      } else {
                          $avg = 0;
                          $count = 0;
                      }
                    @endphp

                    @if ($reviews != null)
                      @for ($i = 0; $i < 5; $i++)
                        @for ($j = 0; $j < $avg; $j++)
                          @php
                            array_push($arrayRating, $j);
                          @endphp
                        @endfor
                        <i class="star-rating-icon ci-star-filled @if (in_array($i, $arrayRating)) active @endif"></i>
                      @endfor
                    @else

                    @endif
                  </div>
                </div>
              </div>
              <div class="card-body card-body-hidden text-center" id="card-body"
                style="z-index: 10; display: inline; padding: 15px">
                @if (Auth::user() != null)
                  <?php
                  $user = Auth::user()->id;
                  $wishlist = Wishlist::orderByDESC('id')
                      ->where('id_prod', $product->id)
                      ->where('id_user', $user)
                      ->first();
                  ?>
                  @if ($wishlist != null)
                    <a class="btn-wishlist_{{ $product->id }} nav-link-style me-3" style="cursor: pointer"
                      onclick="add_to_wishlist({{ $product->id }})">
                      <i class="ci-heart"></i>
                    </a>
                  @elseif ($wishlist == NULL)
                    <a class="btn-wishlist_{{ $product->id }} nav-link-style me-3" style="cursor: pointer"
                      onclick="add_to_wishlist({{ $product->id }})">
                      <i class="ci-heart"></i>
                    </a>
                  @endif
                @else
                  <a class="btn-wishlist_{{ $product->id }} nav-link-style me-3" style="cursor: pointer"
                    onclick="add_to_wishlist({{ $product->id }})">
                    <i class="ci-heart"></i>
                  </a>
                @endif
                <input type="hidden" id="wishlist_productsku{{ $product->id }}"
                  value="{{ $product->specifications }}">
                <input type="hidden" value="{{ $product->id }}">
                <input type="hidden" id="wishlist_productname{{ $product->id }}"
                  value="{{ $product->product_name }}">
                <input type="hidden" id="wishlist_productprice{{ $product->id }}"
                  value="{{ number_format($product->unit_price) }}">
                <input type="hidden" id="wishlist_productimg{{ $product->id }}"
                  value="{{ url($product->product_image) }}">
                <a type="hidden" id="wishlist_producturl{{ $product->id }}"
                  href="{{ route('shop.product-details', $product->product_slug) }}">
                </a>
                </a>
                <a class="nav-link-style me-3" onclick="quickviewModal({{ $product->id }})">
                  <i class="ci-eye"></i>
                </a>
              </div>
              <!-- Quick View Modal-->
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
          <div class="px-4 pe-sm-0 ps-sm-5">
            <span class="badge bg-danger">Ưu đãi cực sốc</span>
            <h3 class="mt-4 mb-1 text-body fw-light">Tất cả</h3>
            <h2 class="mb-1">Các sản phẩm từ Apple</h2>
            <p class="h5 text-body fw-light">sẽ giảm giá 15%</p>
            <a class="btn btn-accent" href="#">Mua ngay <i class="ci-arrow-right"></i></a>
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
      <div class="tns-carousel-inner"
        data-carousel-options="{ &quot;nav&quot;: false, &quot;controls&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 3000, &quot;loop&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
        @foreach ($brand as $item)
          <div>
            <a class="d-block bg-white py-4 py-sm-4 px-2" href="#" style="margin-right: -.0625rem;">
              <img class="d-block mx-auto" src="{{ url($item->brand_image) }}" style="width: 130px; height: 60px"
                alt="Brand">
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
          <h3 class="widget-title">Đánh giá cao</h3>
          @foreach ($productRating as $product)
            <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0"
                href="{{ url('shop/product-details') }}"><img src="{{ asset($product->product_image) }}" width="64"
                  alt="Product"></a>
              <div class="ps-2">
                <h6 class="widget-product-title"><a
                    href="{{ url('shop/product-details') }}">{{ Str::limit($product->product_name, 30, '...') }}</a>
                </h6>
                @if ($product->discount_unit == '%')
                  <div class="product-price">
                    <span>{{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }}
                      ₫</span>
                  </div>
                  <div class="product-price" style="font-size: 12px">
                    <span style="text-decoration: line-through">{{ number_format($product->unit_price) }}
                      ₫</span>
                  </div>
                @else
                  <div class="product-price" style="font-size: 12px">
                    <span style="text-decoration: line-through">{{ number_format($product->unit_price) }}
                      ₫</span>
                  </div>
                @endif
              </div>
            </div>
          @endforeach
          {{-- <a class="fs-sm" href="shop-grid-ls.html">Xem thêm...<i
                            class="ci-arrow-right fs-xs ms-1"></i></a> --}}
        </div>
      </div>
      <!-- New arrivals-->
      <div class="col-md-4 col-sm-6 mb-2 py-3">
        <div class="widget">
          <h3 class="widget-title">Sản phẩm mới</h3>
          @foreach ($newProduct as $product)
            <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0"
                href="{{ url('shop/product-details') }}"><img src="{{ asset($product->product_image) }}" width="64"
                  alt="Product"></a>
              <div class="ps-2">
                <h6 class="widget-product-title"><a
                    href="{{ url('shop/product-details') }}">{{ Str::limit($product->product_name, 30, '...') }}</a>
                </h6>
                @if ($product->discount_unit == '%')
                  <div class="product-price">
                    <span>{{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }}
                      ₫</span>
                  </div>
                  <div class="product-price" style="font-size: 12px">
                    <span style="text-decoration: line-through">{{ number_format($product->unit_price) }}
                      ₫</span>
                  </div>
                @else
                  <div class="product-price" style="font-size: 12px">
                    <span style="text-decoration: line-through">{{ number_format($product->unit_price) }}
                      ₫</span>
                  </div>
                @endif
              </div>
            </div>
          @endforeach
          {{-- <a class="fs-sm" href="shop-grid-ls.html">Xem thêm...<i
                            class="ci-arrow-right fs-xs ms-1"></i></a> --}}
        </div>
      </div>
      <!-- Top rated-->
      <div class="col-md-4 col-sm-6 mb-2 py-3">
        <div class="widget">
          <h3 class="widget-title">Bán chạy nhất</h3>
          @foreach ($sellingProducts as $product)
            <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0"
                href="{{ url('shop/product-details') }}"><img src="{{ asset($product->product_image) }}" width="64"
                  alt="Product"></a>
              <div class="ps-2">
                <h6 class="widget-product-title"><a
                    href="{{ url('shop/product-details') }}">{{ Str::limit($product->product_name, 30, '...') }}</a>
                </h6>
                @if ($product->discount_unit == '%')
                  <div class="product-price">
                    <span>{{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }}
                      ₫</span>
                  </div>
                  <div class="product-price" style="font-size: 12px">
                    <span style="text-decoration: line-through">{{ number_format($product->unit_price) }}
                      ₫</span>
                  </div>
                @else
                  <div class="product-price" style="font-size: 12px">
                    <span style="text-decoration: line-through">{{ number_format($product->unit_price) }}
                      ₫</span>
                  </div>
                @endif
              </div>
            </div>
          @endforeach
          {{-- <a class="fs-sm" href="shop-grid-ls.html">Xem thêm...<i
                            class="ci-arrow-right fs-xs ms-1"></i></a> --}}
        </div>
      </div>
    </div>
  </section>
  <!-- Blog + Instagram info cards-->
  <section class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary"
          href="{{ route('clients.blog') }}">
          <div class="card-body text-center"><i class="ci-edit h3 mt-2 mb-4 text-primary"></i>
            <h3 class="h5 mb-1">Xem các bài viết</h3>
            <p class="text-muted fs-sm">Tin tức về cửa hàng, sản phẩm và xu hướng</p>
          </div>
        </a></div>
      <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent"
          rel="noopener noreferrer" target="_blank" href="https://www.facebook.com/BigDeal-106183301182718">
          <div class="card-body text-center"><i class="ci-facebook h3 mt-2 mb-4 text-accent"></i>
            <h3 class="h5 mb-1">Theo dõi trên Facebook</h3>
            <p class="text-muted fs-sm">#MuaHangCungBigDeal</p>
          </div>
        </a></div>
    </div>
  </section>
@endsection
