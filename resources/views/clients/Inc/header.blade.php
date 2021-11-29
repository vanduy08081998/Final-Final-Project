<?php
use App\Models\Category;
$categories = Category::where('category_parent_id', null)
    ->orderBy('id_cate', 'asc')
    ->get();
?>
<header class="shadow-sm">
  <!-- Topbar-->
  <div class="topbar topbar-dark bg-dark">
    <div class="container">
      <div>
        <div class="topbar-text text-nowrap d-none d-md-inline-block border-light">
          <span class="text-muted me-1">Tư vấn 24/7 tại</span>
          <a class="topbar-link" href="tel:00331697720">(00) 33 169 7720</a>
        </div>
      </div>
      <div class="topbar-text dropdown d-md-none ms-auto"><a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Yêu thích
          / So sánh / Đơn hàng</a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="{{ route('account.wishlist') }}">
              <i class="ci-heart text-muted me-2"></i>Yêu thích (3)</a>
          </li>
          <li>
            <a class="dropdown-item" href="comparison.html"><i class="ci-compare text-muted me-2"></i>So
              sánh (3)</a>
          </li>
          <li><a class="dropdown-item" href="{{ route('account.order-tracking') }}"><i class="ci-location text-muted me-2"></i>Theo dõi
              đơn hàng</a></li>
        </ul>
      </div>
      <div class="d-none d-md-block ms-3 text-nowrap">
        <a class="topbar-link d-none d-md-inline-block" href="{{ route('account.wishlist') }}"><i class="ci-heart mt-n1"></i>Yêu thích
          (3)</a>
        <a class="topbar-link ms-3 ps-3 border-start border-light d-none d-md-inline-block" href="comparison.html"><i
            class="ci-compare mt-n1"></i>So sánh (3)</a>
        <a class="topbar-link ms-3 border-start border-light ps-3 d-none d-md-inline-block"
          href="{{ route('account.order-tracking') }}"><i class="ci-location mt-n1"></i>Theo dõi đơn hàng</a>
      </div>
    </div>
  </div>
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    {{-- <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand d-none d-sm-block me-3 flex-shrink-0" href="{{ route('clients.index') }}">
                        <img src="{{ asset('frontend/img/logo/logo.png') }}" width="142" alt="Cartzilla">
                </a>
                <a class="navbar-brand d-sm-none me-2" href="index.html">
                        <img src="{{ asset('frontend/img/logo/logo.png') }}" width="74" alt="Cartzilla">
                </a>
                <!-- Search-->
                <form class="input-group d-none d-lg-flex flex-nowrap mx-4" action="{{ route('search.searchs') }}"
                    method="POST" enctype="multipart/form-data" id="choice-form">
                    @csrf
                    @method('POST')
                    <i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                    <input class="form-control rounded-start w-100" name="key" id="search" type="text"
                        placeholder="Tìm kiếm sản phẩm">
                    <select class="form-select flex-shrink-0" style="width: 10.5rem;">
                        <option>Tất cả</option>

                        <option>Computers</option>

                    </select>
                </form>
                <!-- Toolbar-->
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a
                        class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Toggle
                            menu</span>
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
                    </a><a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#signin-modal" data-bs-toggle="modal">
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                        <div class="navbar-tool-text ms-n3"><small>Xin chào, Đăng nhập</small>My Account</div>
                    </a>
                    <div class="navbar-tool dropdown ms-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle"
                            href="shop-cart.html"><span class="navbar-tool-label">4</span><i
                                class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text"
                            href="shop-cart.html"><small>Giỏ hàng</small>$1,247.00</a>
                        <!-- Cart dropdown-->
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                                <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                                    <div class="widget-cart-item pb-2 border-bottom">
                                        <button class="btn-close text-danger" type="button" aria-label="Remove"><span
                                                aria-hidden="true">&times;</span></button>
                                        <div class="d-flex align-items-center"><a class="d-block flex-shrink-0"
                                                href="shop-single-v2.html"><img
                                                    src="{{ asset('frontend/img/shop/cart/widget/05.jpg') }}"
                                                    width="64" alt="Product"></a>
                                            <div class="ps-2">
                                                <h6 class="widget-product-title"><a href="shop-single-v2.html">Bluetooth
                                                        Headphones</a></h6>
                                                <div class="widget-product-meta"><span
                                                        class="text-accent me-2">$259.<small>00</small></span><span
                                                        class="text-muted">x 1</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-cart-item py-2 border-bottom">
                                        <button class="btn-close text-danger" type="button" aria-label="Remove"><span
                                                aria-hidden="true">&times;</span></button>
                                        <div class="d-flex align-items-center"><a class="d-block flex-shrink-0"
                                                href="shop-single-v2.html"><img
                                                    src="{{ asset('frontend/img/shop/cart/widget/06.jpg') }}"
                                                    width="64" alt="Product"></a>
                                            <div class="ps-2">
                                                <h6 class="widget-product-title"><a href="shop-single-v2.html">Cloud
                                                        Security Camera</a></h6>
                                                <div class="widget-product-meta"><span
                                                        class="text-accent me-2">$122.<small>00</small></span><span
                                                        class="text-muted">x 1</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-cart-item py-2 border-bottom">
                                        <button class="btn-close text-danger" type="button" aria-label="Remove"><span
                                                aria-hidden="true">&times;</span></button>
                                        <div class="d-flex align-items-center"><a class="d-block flex-shrink-0"
                                                href="shop-single-v2.html"><img
                                                    src="{{ asset('frontend/img/shop/cart/widget/07.jpg') }}"
                                                    width="64" alt="Product"></a>
                                            <div class="ps-2">
                                                <h6 class="widget-product-title"><a href="shop-single-v2.html">Android
                                                        Smartphone S10</a></h6>
                                                <div class="widget-product-meta"><span
                                                        class="text-accent me-2">$799.<small>00</small></span><span
                                                        class="text-muted">x 1</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-cart-item py-2 border-bottom">
                                        <button class="btn-close text-danger" type="button" aria-label="Remove"><span
                                                aria-hidden="true">&times;</span></button>
                                        <div class="d-flex align-items-center"><a class="d-block flex-shrink-0"
                                                href="shop-single-v2.html"><img
                                                    src="{{ asset('frontend/img/shop/cart/widget/08.jpg') }}"
                                                    width="64" alt="Product"></a>
                                            <div class="ps-2">
                                                <h6 class="widget-product-title"><a href="shop-single-v2.html">Android
                                                        Smart TV Box</a></h6>
                                                <div class="widget-product-meta"><span
                                                        class="text-accent me-2">$67.<small>00</small></span><span
                                                        class="text-muted">x 1</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                    <div class="fs-sm me-2 py-2"><span class="text-muted">Tổng:</span><span
                                            class="text-accent fs-base ms-1">$1,247.<small>00</small></span></div><a
                                        class="btn btn-outline-secondary btn-sm"
                                        href="{{ route('cart.cart-list') }}">Xem giỏ hàng<i
                                            class="ci-arrow-right ms-1 me-n1"></i></a>
                                </div><a class="btn btn-primary btn-sm d-block w-100"
                                    href="{{ route('checkout.checkout-details') }}"><i
                                        class="ci-card me-2 fs-base align-middle"></i>Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
  <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
  <div class="navbar-sticky bg-light">
          
  </div>
    <div class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand d-none d-sm-block me-3 flex-shrink-0" href="{{ route('clients.index') }}">
          <img src="{{ asset('frontend/img/logo/logo.png') }}" width="142" alt="Cartzilla">
        </a>
        <a class="navbar-brand d-sm-none me-2" href="index.html">
          <img src="{{ asset('frontend/img/logo/logo.png') }}" width="74" alt="Cartzilla">
        </a>
        <!-- Search-->
        <div class="input-group d-none d-lg-flex flex-nowrap mx-4"><i
            class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
          <input class="form-control rounded-start w-100" type="text" placeholder="Tìm kiếm sản phẩm">
          <select class="form-select flex-shrink-0" style="width: 10.5rem;">
            <option>Tất cả</option>
            <option>Computers</option>
            <option>...</option>
          </select>
        </div>
        <!-- Toolbar-->
        <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span
              class="navbar-toggler-icon"></span></button><a class="navbar-tool navbar-stuck-toggler" href="#"><span
              class="navbar-tool-tooltip">Toggle
              menu</span>
            <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
          </a><a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#signin-modal" data-bs-toggle="modal">
            <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
            <div class="navbar-tool-text ms-n3"><small>Xin chào, Đăng nhập</small>My Account</div>
          </a>
          <div class="navbar-tool dropdown ms-3 cart__dropdown">


          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <!-- Search-->
          <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
            <input class="form-control rounded-start" type="text" placeholder="Tìm kiếm sản phẩm...">
          </div>
          <!-- Departments menu-->
          <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" href="#" data-bs-toggle="dropdown"
                data-bs-auto-close="outside"><i class="ci-menu align-middle mt-n1 me-2"></i>Danh mục</a>
              <ul class="dropdown-menu">
                @foreach ($categories as $cate)
                  <li class="dropdown mega-dropdown">
                    <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">
                      <i class="ci-laptop opacity-60 fs-lg mt-n1 me-2"></i>
                      {{ $cate->category_name }}
                    </a>
                    <div class="dropdown-menu p-0">
                      <div class="d-flex flex-wrap flex-sm-nowrap px-2">
                        <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                          <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Thương hiệu</h6>
                            <ul class="widget-list">
                              @foreach ($cate->brands as $brand)
                                <li class="widget-list-item pb-1">
                                  <a class="widget-list-link" href="#">{{ $brand->brand_name }}</a>
                                </li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                        <div class="mega-dropdown-column py-4 px-3">
                          <div class="widget widget-links">
                            <h6 class="fs-base mb-3">Accessories</h6>
                            <ul class="widget-list">
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Monitors</a></li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Bags, Cases &amp;
                                  Sleeves</a></li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Batteries</a>
                              </li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Charges &amp;
                                  Adapters</a></li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Cooling Pads</a>
                              </li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Mounts</a></li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Replacement
                                  Screens</a></li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Security
                                  Locks</a></li>
                              <li class="widget-list-item pb-1"><a class="widget-list-link" href="#">Stands</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a class="d-block mb-2" href="#"><img
                              src="{{ asset('frontend/img/shop/departments/07.jpg') }}" alt="Computers &amp; Accessories"></a>
                          <div class="fs-sm mb-3">Starting from <span class='fw-medium'>$149.<small>80</small></span></div><a
                            class="btn btn-primary btn-shadow btn-sm" href="#">See offers<i class="ci-arrow-right fs-xs ms-1"></i></a>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
              </ul>
            </li>
          </ul>
          <!-- Primary menu-->
          <ul class="navbar-nav">
            <li class="nav-item dropdown active">
              <a class="nav-link" href="{{ route('clients.index') }}"><i class="ci-home"></i> Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('clients.about') }}" data-bs-auto-close="outside"><i class="ci-flag"></i>
                Giới thiệu</a>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i
                  class="ci-lable"></i> Cửa hàng</a>
              <div class="dropdown-menu p-0">
                <div class="d-flex flex-wrap flex-sm-nowrap px-2">
                  <div class="mega-dropdown-column pt-1 pt-lg-4 pb-4 px-2 px-lg-3">
                    <div class="widget widget-links mb-4">
                      <h6 class="fs-base mb-3">Danh mục 1</h6>
                      <ul class="widget-list">
                        <li class="widget-list-item"><a class="widget-list-link" href="{{ route('shop.shop-grid') }}">Cửa hàng dạng
                            luới</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link" href="{{ route('shop.shop-list') }}">Cửa hàng dạng
                            list</a>
                        </li>
                      </ul>
                    </div>
                    <div class="widget widget-links">
                      <h6 class="fs-base mb-3">Danh mục 2</h6>
                      <ul class="widget-list">
                        <li class="widget-list-item"><a class="widget-list-link" href="marketplace-category.html">Category Page</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="marketplace-single.html">Single Item Page</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="marketplace-vendor.html">Vendor Page</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="marketplace-cart.html">Cart</a></li>
                        <li class="widget-list-item"><a class="widget-list-link"
                            href="{{ route('checkout.checkout-details') }}">Checkout</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="mega-dropdown-column pt-1 pt-lg-4 pb-4 px-2 px-lg-3">
                    <div class="widget widget-links">
                      <h6 class="fs-base mb-3">Danh mục 3</h6>
                      <ul class="widget-list">
                        <li class="widget-list-item"><a class="widget-list-link" href="shop-categories.html">Shop Categories</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="shop-single-v1.html">Product Page v.1</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="shop-single-v2.html">Product Page v.2</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="shop-cart.html">Cart</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="checkout-details.html">Checkout - Details</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="checkout-shipping.html">Checkout - Shipping</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link" href="checkout-payment.html">Checkout - Payment</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="checkout-review.html">Checkout - Review</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="checkout-complete.html">Checkout - Complete</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link" href="order-tracking.html">Order Tracking</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="comparison.html">Product Comparison</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="mega-dropdown-column pt-1 pt-lg-4 pb-4 px-2 px-lg-3">
                    <div class="widget widget-links mb-4">
                      <h6 class="fs-base mb-3">Danh mục 4</h6>
                      <ul class="widget-list">
                        <li class="widget-list-item"><a class="widget-list-link" href="grocery-catalog.html">Product Catalog</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="grocery-single.html">Single Product Page</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="grocery-checkout.html">Checkout</a></li>
                      </ul>
                    </div>
                    <div class="widget widget-links">
                      <h6 class="fs-base mb-3">Danh mục 5</h6>
                      <ul class="widget-list">
                        <li class="widget-list-item"><a class="widget-list-link" href="food-delivery-category.html">Category Page</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="food-delivery-single.html">Single Item
                            (Restaurant)</a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link" href="food-delivery-cart.html">Cart (Your Order)</a></li>
                        <li class="widget-list-item"><a class="widget-list-link" href="food-delivery-checkout.html">Checkout (Address
                            &amp;
                            Payment)</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                data-bs-auto-close="outside"><i class="ci-store"></i>
                Nhãn hiệu</a>
              <ul class="dropdown-menu">
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Shop User
                    Account</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="account-orders.html">Orders History</a>
                    </li>
                    <li><a class="dropdown-item" href="account-profile.html">Profile Settings</a>
                    </li>
                    <li><a class="dropdown-item" href="account-address.html">Account Addresses</a>
                    </li>
                    <li><a class="dropdown-item" href="account-payment.html">Payment Methods</a>
                    </li>
                    <li><a class="dropdown-item" href="account-wishlist.html">Wishlist</a></li>
                    <li><a class="dropdown-item" href="account-tickets.html">My Tickets</a></li>
                    <li><a class="dropdown-item" href="account-single-ticket.html">Single
                        Ticket</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Vendor
                    Dashboard</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="dashboard-settings.html">Settings</a></li>
                    <li><a class="dropdown-item" href="dashboard-purchases.html">Purchases</a>
                    </li>
                    <li><a class="dropdown-item" href="dashboard-favorites.html">Favorites</a>
                    </li>
                    <li><a class="dropdown-item" href="dashboard-sales.html">Sales</a></li>
                    <li><a class="dropdown-item" href="dashboard-products.html">Products</a></li>
                    <li><a class="dropdown-item" href="dashboard-add-new-product.html">Add New
                        Product</a></li>
                    <li><a class="dropdown-item" href="dashboard-payouts.html">Payouts</a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="account-signin.html">Sign In / Sign Up</a></li>
                <li><a class="dropdown-item" href="account-password-recovery.html">Password
                    Recovery</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('clients.blog') }}"><i class="ci-store"></i>
                Bài viết</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('clients.contact') }}" data-bs-auto-close="outside"><i
                  class="ci-phone"></i> Liên hệ và Phản hồi</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
