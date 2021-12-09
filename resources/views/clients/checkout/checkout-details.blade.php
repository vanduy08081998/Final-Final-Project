@extends('layouts.client_master')


@section('title', 'Thông tin thanh toán')


@section('content')

<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">Checkout</h1>
    </div>
  </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
  <div class="row">
    <section class="col-lg-8">
      <!-- Steps-->
      <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="shop-cart.html">
          <div class="step-progress"><span class="step-count">1</span></div>
          <div class="step-label"><i class="ci-cart"></i>Cart</div>
        </a><a class="step-item active current" href="{{ route('checkout.checkout-details') }}">
          <div class="step-progress"><span class="step-count">2</span></div>
          <div class="step-label"><i class="ci-user-circle"></i>Details</div>
        </a><a class="step-item" href="{{ route('checkout.checkout-shipping') }}">
          <div class="step-progress"><span class="step-count">3</span></div>
          <div class="step-label"><i class="ci-package"></i>Shipping</div>
        </a><a class="step-item" href="{{ route('checkout.checkout-payment') }}">
          <div class="step-progress"><span class="step-count">4</span></div>
          <div class="step-label"><i class="ci-card"></i>Payment</div>
        </a><a class="step-item" href="{{ route('checkout.checkout-review') }}">
          <div class="step-progress"><span class="step-count">5</span></div>
          <div class="step-label"><i class="ci-check-circle"></i>Review</div>
        </a></div>
      <!-- Autor info-->
      @auth
      <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
        <div class="d-flex align-items-center">
          <div class="img-thumbnail rounded-circle position-relative flex-shrink-0"><span
              class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip"
              title="Reward points">384</span><img class="rounded-circle"
              src="{{ asset('uploads/Users') }}/{{ auth()->user()->avatar }}" width="90" alt="Susan Gardner"></div>
          <div class="ps-3">
            <h3 class="fs-base mb-0">{{ auth()->user()->name }}</h3><span class="text-accent fs-sm">{{
              auth()->user()->email }}</span>
          </div>
        </div><a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="account-profile.html"><i
            class="ci-edit me-2"></i>Edit
          profile</a>
      </div>
      @endauth

      @guest
      <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
        <div class="d-flex align-items-center">
          <div class="img-thumbnail rounded-circle position-relative flex-shrink-0"><span
              class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip"
              title="Reward points">384</span><img class="rounded-circle"
              src="{{ asset('frontend/img/shop/account/avatar.jpg') }}" width="90" alt="Susan Gardner"></div>
          <div class="ps-3">
            <h3 class="fs-base mb-0">Susan Gardner</h3><span class="text-accent fs-sm">s.gardner@example.com</span>
          </div>
        </div><a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="account-profile.html"><i
            class="ci-edit me-2"></i>Edit
          profile</a>
      </div>
      @endguest
      <!-- Shipping address-->
      @include('clients.checkout.Checkout.form-infomation')
    </section>
    <!-- Sidebar-->
    <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5" id="cart_checkout">

    </aside>
  </div>
  <!-- Navigation (mobile)-->
  <div class="row d-lg-none">
    <div class="col-lg-8">
      <div class="d-flex pt-4 mt-3">
        <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="shop-cart.html"><i
              class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
              Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
        <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-shipping.html"><span
              class="d-none d-sm-inline">Proceed to
              Shipping</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script>
  $('#form-infomations').on('submit', function(event){
    event.preventDefault()

    let array = [];
    $.ajax({
      type: "POST",
      url: route('checkout.shipping-address'),
      data: $(this).serializeArray(),
      success: function (response) {
        window.location.href="{{ route('checkout.checkout-shipping') }}"
      }
    });


  })
</script>
@endpush