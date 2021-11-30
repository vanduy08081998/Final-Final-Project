<a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="shop-cart.html"><span
    class="navbar-tool-label cart-count">{{ count($cart) }}</span><i class="navbar-tool-icon ci-cart"></i></a><a class="navbar-link-dropdown"
  href="shop-cart.html"><small>Giỏ hàng</small></a>
<!-- Cart dropdown-->
<div class="dropdown-menu dropdown-menu-end">
  <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
    <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">

      <?php $totalprice = 0; ?>
      @foreach ($cart as $key => $value)
        @foreach (json_decode($value->specifications) as $index => $item)
          <?php
          $totalprice += $value->quantity * $item->variant_price; ?>
          <div class="widget-cart-item pb-2 border-bottom">
            {{-- <button class="btn-close text-danger btn-cart-remove" type="button" data-handle="remove" aria-label="Remove"><span
                aria-hidden="true">&times;</span></button> --}}
            <div class="d-flex align-items-center"><a class="d-block flex-shrink-0" href="shop-single-v2.html">
                @if ($item->variant_image != null)
                  <img src="{{ asset($item->variant_image) }}" width="64" alt="Product">
                @else
                  <img
                    src="https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg"
                    width="64" alt="Product">
                @endif
              </a>
              <div class="ps-2">
                <h6 class="widget-product-title"><a href="shop-single-v2.html">{{ $item->product_name }}</a></h6>
                <div class="widget-product-meta"><span
                    class="text-accent me-2">{{ number_format($value->quantity * $item->variant_price) }}</small></span><span
                    class="text-muted">x
                    {{ $value->quantity }}</span></div>
              </div>
            </div>
          </div>
        @endforeach
      @endforeach

    </div>
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
      <div class="fs-sm me-2 py-2"><span class="text-muted">Tổng:</span><span
          class="text-accent fs-base ms-1">{{ number_format($totalprice) }}</span></div><a class="btn btn-cart-view-dropdown btn-sm"
        href="{{ route('cart.cart-list') }}">Xem giỏ hàng</a>
    </div>
    {{-- <a class="btn btn-primary btn-sm d-block w-100" href="{{ route('checkout.checkout-details') }}"><i
        class="ci-card me-2 fs-base align-middle"></i>Thanh toán</a> --}}
  </div>
</div>
