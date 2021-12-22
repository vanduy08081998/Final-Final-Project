<a class="step-item active" href="{{ route('cart.cart-list') }}">
    <div class="step-progress">
        <span class="step-count">1</span>
    </div>
    <div class="step-label">
        <i class="ci-cart"></i>Giỏ hàng
    </div>
</a>
<a class="step-item active {{ Route::currentRouteNamed('checkout.checkout-shipping') ? 'active' : 'current'}}" href="{{ route('checkout.checkout-details') }}">
    <div class="step-progress">
        <span class="step-count">2</span>
    </div>
    <div class="step-label">
        <i class="ci-user-circle"></i>Thông tin
    </div>
</a>
<a class="step-item {{ Route::currentRouteNamed('checkout.checkout-shipping') ? 'active' : 'current'}} {{ Route::currentRouteNamed('checkout.checkout-payment') ? 'active' : 'current'}} {{ Route::currentRouteNamed('checkout.checkout-review') ? 'active' : 'current'}}" href="{{ route('checkout.checkout-shipping') }}">
    <div class="step-progress">
        <span class="step-count">3</span>
    </div>
    <div class="step-label">
        <i class="ci-package"></i>Vận chuyển
    </div>
</a>
<a class="step-item {{ Route::currentRouteNamed('checkout.checkout-payment') ? 'active' : 'current'}} {{ Route::currentRouteNamed('checkout.checkout-review') ? 'active' : 'current'}}" href="{{ route('checkout.checkout-payment') }}">
    <div class="step-progress">
        <span class="step-count">4</span>
    </div>
    <div class="step-label">
        <i class="ci-card"></i>Thanh toán
    </div>
</a>
<a class="step-item {{ Route::currentRouteNamed('checkout.checkout-review') ? 'active' : 'current'}}" href="{{ route('checkout.checkout-review') }}">
    <div class="step-progress">
        <span class="step-count">5</span>
    </div>
    <div class="step-label">
        <i class="ci-check-circle"></i>Thành công
    </div>
</a>