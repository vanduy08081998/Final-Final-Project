@extends('layouts.client_master')


@section('title', 'Phương thức vận chuyển')


@section('content')
  @php
  use App\Models\Cart;

  $carts = Cart::where('user_id', auth()->user()->id)->get();
  @endphp
  <!-- Page Title-->
  <div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('clients.index') }}"><i class="ci-home"></i>Trang chủ</a>
            </li>
            <li class="breadcrumb-item text-nowrap"><a href="{{ route('shop.shop-grid', ['slug' => 'all-category']) }}">Cửa hàng</a>
            </li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">Thanh toán</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 text-light mb-0">Phuơng thức vận chuyển</h1>
      </div>
    </div>
  </div>
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">

      <section class="col-lg-8">
        <form id="shipping_methods" method="POST">
          @csrf
          <!-- Steps-->
          <div class="steps steps-light pt-2 pb-3 mb-5">
            @include('clients.Inc.checkout-bar')
          </div>
          <!-- Shipping methods table-->
          {{-- <h2 class="h6 pb-3 mb-2">Chọn phương thức thanh toán</h2> --}}
          <div class="table-responsive">
            <table class="table table-hover table-bordered fs-sm border-top">
              <thead>
                <tr>
                  <th class="align-middle">#</th>
                  <th class="align-middle">Phương thức vận chuyển</th>
                  <th class="align-middle">Thời gian dự tính</th>
                  <th class="align-middle">Phí vận chuyển</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($shipping_methods as $shipping)
                  <tr>
                    <td>
                      <div class="form-check mb-4">
                        <input class="form-check-input" type="radio" id="courier" value="{{ $shipping->id }}"
                          name="shipping_method" checked>
                        <label class="form-check-label" for="courier"></label>
                      </div>
                    </td>
                    <td class="align-middle"><span
                        class="text-dark fw-medium">{{ $shipping->shipping_method }}</span><br><span
                        class="text-muted">All addresses (default zone), United
                        States
                        &amp;
                        Canada</span></td>
                    <td class="align-middle">{{ $shipping->delivery_time_from }} -
                      {{ $shipping->delivery_time_from }} Ngày</td>
                    <td class="align-middle">{{ number_format($shipping->handing_fee) }} <sup>đ</sup> </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Navigation (desktop)-->
          <div class="d-flex pt-4">
            <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100"
                href="{{ route('checkout.checkout-details') }}"><i class="ci-arrow-left mt-sm-0 me-1"></i><span
                  class="d-sm-inline">Quay lại</span></a></div>
            @if (count($carts) <= 0)
             <div class="w-50 ps-2"><button class="d-sm-inline btn btn-primary d-block w-100" disabled>Mua hàng để tiếp tục</button>
            @else
              <div class="w-50 ps-2"><button class="d-sm-inline btn btn-primary d-block w-100">Tiếp tục</button>
            @endif
          </div>
    </div>
    </form>
    </section>


    <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5" id="cart_checkout">

    </aside>
  </div>
  </div>
@endsection

@push('script')
  <script>
    $('#shipping_methods').on('submit', function(event) {
      event.preventDefault()
      $.ajax({
        type: "POST",
        url: route('checkout.shipping-method'),
        data: $(this).serializeArray(),
        beforeSend: () => {
          $("body").append(`<div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>`);
        },
        success: function(response) {
          window.location.href = "{{ route('checkout.checkout-payment') }}"
        }
      });
    })
  </script>
@endpush
