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
            <select class="form-select" name="shorting" onchange="shorting()" id="sorting">
              <option value="all">Tất cả</option>
              <option value="unit_price" data-short="ASC">Giá tăng dần</option>
              <option value="unit_price" data-short="DESC">Giá giảm dần</option>
              <option value="product_name" data-short="ASC">Từ A - Z</option>
              <option value="product_name" data-short="DESC">Từ Z - A</option>
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
      <div class="row mx-n2" id="product-short">
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
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Xóa khỏi yêu thích" onclick="add_to_wishlist({{ $pro->id }})" style="color: red">
              <i class="ci-heart"></i>
            </button>
            @elseif ($wishlist == NULL)
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích" onclick="add_to_wishlist({{ $pro->id }})">
              <i class="ci-heart"></i>
            </button>
            @endif
            @else
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
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
          </div>
        </div>
        <hr class="d-sm-none">
        @endforeach
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
                class="ci-arrow-right ms-2"></i></a>
          </li>
        </ul>
      </nav>
    </section>
  </div>
</div>
@endsection

@push('script')
    <script>
      function shorting(){
        var value = $('select[name="shorting"] option:selected').val()
        var orderby = $('select[name="shorting"] option:selected').attr('data-short')
        let _token = $('meta[name="csrf-token"]').attr('content')
         $.ajax({
                type: "POST",
                url: "{{ route('clients.products.short') }}",
                data: {
                  value: value,
                  orderby: orderby,
                  _token: _token
                },
                success: function(response) {
                  $('#product-short').html(response)
                }

            })
      }
    </script>
@endpush
