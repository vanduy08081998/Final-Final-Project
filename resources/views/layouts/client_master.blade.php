<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from cartzilla.createx.studio/home-electronics-store.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Sep 2021 17:32:03 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>BigDeal | @yield('title')</title>
    <!-- SEO Meta Tags-->
   @yield('meta')
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/img/logo/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/img/logo/favicon.png') }}">
    {{-- <link rel="manifest" href="site.webmanifest"> --}}
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/vendor/simplebar/dist/simplebar.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/vendor/tiny-slider/dist/tiny-slider.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/vendor/drift-zoom/dist/drift-basic.min.css') }}" />
    <link rel="stylesheet" media="screen"
        href="{{ asset('frontend/vendor/lightgallery.js/dist/css/lightgallery.min.css') }}" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/theme.min.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/custom-style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('frontend/vendor/boxed/css/boxed-check.min.css') }}">
    <!-- Google Tag Manager-->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WKV3GT5');
    </script>

</head>
<!-- Body-->

<body class="handheld-toolbar-enabled">
  <!-- Sign in / sign up modal-->
  @include('clients.Inc.modal-login')
  <main class="page-wrapper">
    <!-- Quick View Modal-->
    @include('clients.Inc.quickview')
    <!-- Navbar Electronics Store-->
    @include('clients.Inc.header')


    @yield('content')
  </main>
  <input type="hidden" name="" id="url_to" value="{{ URL::to('/') }}">
  <!-- Footer-->
  @include('clients.Inc.footer')
  <!-- Toolbar for handheld devices (Default)-->
  <div class="handheld-toolbar">
    <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item" href="account-wishlist.html"><span
          class="handheld-toolbar-icon"><i class="ci-heart"></i></span><span class="handheld-toolbar-label">Yêu thích</span></a><a
        class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i class="ci-menu"></i></span><span
          class="handheld-toolbar-label">Menu</span></a><a class="d-table-cell handheld-toolbar-item" href="shop-cart.html"><span
          class="handheld-toolbar-icon"><i class="ci-cart"></i><span class="badge bg-primary rounded-pill ms-1">4</span></span><span
          class="handheld-toolbar-label">$265.00</span></a></div>
  </div>
  <!-- Back To Top Button-->
  <a class="btn-scroll-top" href="#top" data-scroll>
    <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
    <i class="btn-scroll-top-icon ci-arrow-up"></i>
  </a>
  <!-- Vendor scrits: js libraries and plugins-->
  <script src="{{ URL::to('backend/js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('fancybox/dist/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/simplebar/dist/simplebar.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
  <script src="{{ asset('frontend/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/drift-zoom/dist/Drift.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/lightgallery.js/dist/js/lightgallery.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/lg-video.js/dist/lg-video.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>
  <!-- Main theme script-->
  <script src="{{ asset('frontend/js/theme.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.4/jquery.simplePagination.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
  @include('sweetalert::alert')
  <script>
    const cartDropdown = () => {
      $.ajax({
        type: "GET",
        url: "{{ route('cart.dropdown') }}",
        success: function(response) {
          $('.cart__dropdown').html(response)
        }
      });
    }
    cartDropdown()
  </script>
  @stack('script')
</body>
</html>
