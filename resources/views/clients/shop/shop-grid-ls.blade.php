@extends('layouts.client_master')


@section('title', 'Danh sách sản phẩm')


@section('content')
<?php
  use App\Models\Wishlist;
  ?>
<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
  <div class="container py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2 pb-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center">
          <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Trang chủ</a></li>
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
      @include('clients.shop.navbar-shop');
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
              class="ci-view-list"></i></a>
        </div>
      </div>
      <!-- Products grid-->
      <div class="row mx-n2">
        <!-- Product-->
        @foreach ($product as $pro)

        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            @if (Auth::user() != null)
            <?php
                  $user = Auth::user()->id;
                  $wishlist = Wishlist::orderByDESC('id')
                      ->where('id_prod', $pro->id)
                      ->where('id_user', $user)
                      ->first();
                  ?>
            @if ($wishlist != null)
            <button class="btn-wishlist_{{$pro->id}} btn-sm text-danger type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Xóa khỏi yêu thích" onclick="add_to_wishlist({{ $pro->id }})">
              <i class="ci-heart"></i>
            </button>
            @elseif ($wishlist == NULL)
            <button class="btn-wishlist_{{$pro->id}} btn-sm text-muted" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích" onclick="add_to_wishlist({{ $pro->id }})">
              <i class="ci-heart"></i>
            </button>
            @endif
            {{-- <button class="btn-wishlist_{{$pro->id}} btn-sm text-muted" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
            title="Xóa khỏi yêu thích" onclick="add_to_wishlist({{ $pro->id }})">
            <i class="ci-heart"></i>
          </button> --}}
            @else
            <button class="btn-wishlist_{{$pro->id}} btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích" onclick="add_to_wishlist({{ $pro->id }})">
              <i class="ci-heart"></i>
            </button>
            @endif
            <a class="card-img-top d-block overflow-hidden"
              href="{{ route('shop.product-details', $pro->product_slug) }}">
              <img srcset="{{ URL::to($pro->product_image) }} 2x" alt="Product" width="200px"
                style="margin: auto; display: block">
            </a>
            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1 category-name" href="#">{{ $pro->Category->category_name }}</a>
              <h3 class="product-title fs-sm"><a href="shop-single-v1.html">{{ Str::limit($pro->product_name,30,'...')
                  }}</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">{{ number_format($pro->unit_price) }}</span></div>
                <div class="star-rating">
                  <i class="star-rating-icon ci-star-filled active"></i>
                  <i class="star-rating-icon ci-star-filled active"></i>
                  <i class="star-rating-icon ci-star-filled active"></i>
                  <i class="star-rating-icon ci-star-filled active"></i>
                  <i class="star-rating-icon ci-star"></i>
                </div>
              </div>
            </div>
            {{-- <div class="card-body card-body-hidden">
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
                  class="ci-cart fs-sm me-1"></i>Thêm vào giỏ
                hàng</button>
              <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i
                    class="ci-eye align-middle me-1"></i>Xem nhanh</a>
              </div>
              <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view-electro"
                  data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Xem nhanh</a>
              </div>
            </div> --}}
          </div>
        </div>
        <hr class="d-sm-none">
        @endforeach
      </div>
      <!-- Banner-->
      <div class="py-sm-2">
        <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden mb-4 rounded-3">
          <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
            <h4 class="fs-lg fw-light mb-2">Converse All Star</h4>
            <h3 class="mb-4">Make Your Day Comfortable</h3><a class="btn btn-primary btn-shadow btn-sm" href="#">Shop
              Now</a>
          </div><img class="d-block ms-auto" src="{{ asset('frontend/img/shop/catalog/banner.jpg') }}"
            alt="Shop Converse">
        </div>
      </div>
      <!-- Products grid-->
      <div class="row mx-n2">
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích"><i class="ci-heart"></i></button><a
              class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img
                src="{{ asset('frontend/img/shop/catalog/07.jpg') }}" alt="Product"></a>
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
                    class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
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
                  class="ci-cart fs-sm me-1"></i>Thêm vào giỏ
                hàng</button>
              <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i
                    class="ci-eye align-middle me-1"></i>Xem nhanh</a></div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích"><i class="ci-heart"></i></button><a
              class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img
                src="{{ asset('frontend/img/shop/catalog/08.jpg') }}" alt="Product"></a>
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
                  class="ci-cart fs-sm me-1"></i>Thêm vào giỏ
                hàng</button>
              <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i
                    class="ci-eye align-middle me-1"></i>Xem nhanh</a></div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích"><i class="ci-heart"></i></button><a
              class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img
                src="{{ asset('frontend/img/shop/catalog/09.jpg') }}" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Cosmetics</a>
              <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Metallic Lipstick
                  (Crimson)</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$12.<small>99</small></span>
                </div>
                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                </div>
              </div>
            </div>
            <div class="card-body card-body-hidden">
              <div class="text-center pb-2">
                <div class="form-check form-option form-check-inline mb-2">
                  <input class="form-check-input" type="radio" name="color3" id="crimson" checked>
                  <label class="form-option-label rounded-circle" for="crimson"><span
                      class="form-option-color rounded-circle" style="background-color: #bd3c82;"></span></label>
                </div>
                <div class="form-check form-option form-check-inline mb-2">
                  <input class="form-check-input" type="radio" name="color3" id="creamy">
                  <label class="form-option-label rounded-circle" for="creamy"><span
                      class="form-option-color rounded-circle" style="background-color: #ebae81;"></span></label>
                </div>
                <div class="form-check form-option form-check-inline mb-2">
                  <input class="form-check-input" type="radio" name="color3" id="palm">
                  <label class="form-option-label rounded-circle" for="palm"><span
                      class="form-option-color rounded-circle" style="background-color: #ca8799;"></span></label>
                </div>
              </div>
              <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i
                  class="ci-cart fs-sm me-1"></i>Thêm vào giỏ
                hàng</button>
              <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i
                    class="ci-eye align-middle me-1"></i>Xem nhanh</a>
              </div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích"><i class="ci-heart"></i></button><a
              class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img
                src="{{ asset('frontend/img/shop/catalog/10.jpg') }}" alt="Product"></a>
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
                  class="ci-cart fs-sm me-1"></i>Thêm vào giỏ
                hàng</button>
              <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i
                    class="ci-eye align-middle me-1"></i>Xem nhanh</a>
              </div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích"><i class="ci-heart"></i></button><a
              class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img
                src="{{ asset('frontend/img/shop/catalog/11.jpg') }}" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                Sandals</a>
              <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Soft Footbed Sandals</a>
              </h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$99.<small>50</small></span></div>
                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                </div>
              </div>
            </div>
            <div class="card-body card-body-hidden">
              <div class="text-center pb-2">
                <div class="form-check form-option form-check-inline mb-2">
                  <input class="form-check-input" type="radio" name="color4" id="blue2" checked>
                  <label class="form-option-label rounded-circle" for="blue2"><span
                      class="form-option-color rounded-circle" style="background-color: #879fb3;"></span></label>
                </div>
                <div class="form-check form-option form-check-inline mb-2">
                  <input class="form-check-input" type="radio" name="color4" id="brown">
                  <label class="form-option-label rounded-circle" for="brown"><span
                      class="form-option-color rounded-circle" style="background-color: #9c6d4a;"></span></label>
                </div>
                <div class="form-check form-option form-check-inline mb-2">
                  <input class="form-check-input" type="radio" name="color4" id="black">
                  <label class="form-option-label rounded-circle" for="black"><span
                      class="form-option-color rounded-circle" style="background-color: #333333;"></span></label>
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
                <button class="btn btn-primary btn-sm" type="button"><i class="ci-cart fs-sm me-1"></i>Thêm vào giỏ
                  hàng</button>
              </div>
              <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i
                    class="ci-eye align-middle me-1"></i>Xem nhanh</a>
              </div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích"><i class="ci-heart"></i></button><a
              class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img
                src="{{ asset('frontend/img/shop/catalog/12.jpg') }}" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                Hats</a>
              <h3 class="product-title fs-sm"><a href="shop-single-v1.html">3-Color Sun Stash Hat</a>
              </h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$25.<small>99</small></span></div>
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
                  class="ci-cart fs-sm me-1"></i>Thêm vào giỏ
                hàng</button>
              <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i
                    class="ci-eye align-middle me-1"></i>Xem nhanh</a>
              </div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card"><span class="badge bg-danger badge-shadow">Sale</span>
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích"><i class="ci-heart"></i></button><a
              class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img
                src="{{ asset('frontend/img/shop/catalog/13.jpg') }}" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                T-shirts</a>
              <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Cotton Polo Regular Fit</a>
              </h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$11.<small>50</small></span>
                  <del class="fs-sm text-muted">$13.<small>50</small></del>
                </div>
                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i><i
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
                  class="ci-cart fs-sm me-1"></i>Thêm vào giỏ
                hàng</button>
              <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i
                    class="ci-eye align-middle me-1"></i>Xem nhanh</a>
              </div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích"><i class="ci-heart"></i></button><a
              class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img
                src="{{ asset('frontend/img/shop/catalog/14.jpg') }}" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                Jeans</a>
              <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Slim Taper Fit Jeans</a>
              </h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$58.<small>99</small></span></div>
                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
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
                  class="ci-cart fs-sm me-1"></i>Thêm vào giỏ
                hàng</button>
              <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i
                    class="ci-eye align-middle me-1"></i>Xem nhanh</a>
              </div>
            </div>
          </div>
          <hr class="d-sm-none">
        </div>
        <!-- Product-->
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích"><i class="ci-heart"></i></button><a
              class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img
                src="{{ asset('frontend/img/shop/catalog/15.jpg') }}" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                Waistcoats</a>
              <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Single-breasted
                  Trenchcoat</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">$79.<small>99</small></span></div>
                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
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
                  class="ci-cart fs-sm me-1"></i>Thêm vào giỏ
                hàng</button>
              <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i
                    class="ci-eye align-middle me-1"></i>Quick view</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="my-3">
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
                class="ci-arrow-right ms-2"></i></a>
          </li>
        </ul>
      </nav>
    </section>
  </div>
</div>
@endsection