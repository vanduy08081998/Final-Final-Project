@extends('layouts.client_master')


@section('title', 'Giỏ hàng')


@section('content')
<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('clients.index') }}"><i
                class="ci-home"></i>Trang
              chủ</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Cửa hàng</a>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Giỏ hàng</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">Giỏ hàng</h1>
    </div>
  </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
  <div class="row">
    <!-- List of items-->
    <section class="col-lg-8">
      <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
        <h2 class="h6 text-light mb-0 d-none d-sm-block">Sản phẩm</h2><a class="btn btn-outline-primary btn-sm ps-2"
          href="shop-grid-ls.html"><i class="ci-arrow-left me-2"></i>Tiếp tục mua hàng</a>
      </div>
      <?php $totalprice = 0; ?>
      @foreach ($carts as $index => $cart)
      @foreach (json_decode($cart->specifications) as $key => $value)
      <?php $totalprice += $value->variant_price * $cart->quantity; ?>
      <!-- Item-->
      <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom" id="cart_{{ $index }}">
        <input type="hidden" id="product_id" value="{{ $cart->product_id }}">
        <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a
            class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html">
            @if ($value->variant_image != null)
            <img src="{{ asset($value->variant_image) }}" width="160" alt="Product">
            @else
            <img
              src="https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg"
              width="160" alt="Product">
            @endif
          </a>
          <div class="pt-2">
            <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">{{ $value->product_name }}</a></h3>

            @if ($value->colors != null)
            <?php $colorname = \App\Models\Color::where('color_slug', $value->colors)->first()->color_name; ?>
            <div class="fs-sm"><span class="text-muted me-2">Màu sắc
                :</span>{{ $colorname }}
            </div>
            @else
            <div class="fs-sm"><span class="text-muted me-2">Màu sắc
                :</span>none
            </div>
            @endif
            @if ($value->specifications != null)
            @foreach ($value->specifications as $key => $attr)
            <?php

                      $nameAttribute = \App\Models\Attribute::where('slug', $key)->first()->name;

                      ?>
            <div class="fs-sm"><span class="text-muted me-2">{{ $nameAttribute }}
                :</span>{{ $attr }}
            </div>
            @endforeach
            @else
            <div class="fs-sm"><span class="text-muted me-2">Sản phẩm không có
                thuộc
                tinh</span></div>
            @endif
            <div class="fs-lg text-accent pt-2"><span>Tổng giá :
              </span><span class="cart_price">{{ number_format($value->variant_price * $cart->quantity) }}₫</span>
            </div>
          </div>
        </div>
        <div class="pt-2  ps-sm-3 text-center text-sm-start">
          <label class="form-label" for="quantity1">Số lượng</label>
          <div class="d-flex text-center mx-auto form-quantity">
            <button class="dec">-</button>
            <input class="form-control quantity_number" type="number" id="quantity1" min="1"
              value="{{ $cart->quantity }}">
            <button class="inc">+</button>
          </div>

          <button class="btn btn-link px-0 text-danger delete_button" type="button"><i
              class="ci-close-circle me-2"></i><span class="fs-sm">Xóa</span></button>
        </div>
      </div>
      @endforeach
      @endforeach
      {{-- <button class="btn btn-outline-accent d-block w-100 mt-4" type="button"><i
          class="ci-loading fs-base me-2"></i>Cập
        nhật
        giỏ hàng</button> --}}
    </section>
    <!-- Sidebar-->
    <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
      <div class="bg-white rounded-3 shadow-lg p-4">
        <div class="py-2 px-xl-2">
          <div class="text-center mb-4 pb-3 border-bottom">
            <h3 class="fw-normal cart_total_price"></h3>
          </div>
          <a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="{{ URL::to('checkout/checkout-details') }}"><i
              class="ci-card fs-lg me-2"></i>Tiến
            hành thanh toán</a>
        </div>
      </div>
    </aside>
  </div>
</div>
@endsection
