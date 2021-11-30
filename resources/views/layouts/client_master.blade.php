<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <title>BigDeal | @yield('title')</title>
  <!-- SEO Meta Tags-->
  @yield('meta')
  <!-- Viewport-->
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/vendor/simplebar/dist/simplebar.min.css') }}" />
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/vendor/tiny-slider/dist/tiny-slider.css') }}" />
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/vendor/drift-zoom/dist/drift-basic.min.css') }}" />
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/vendor/lightgallery.js/dist/css/lightgallery.min.css') }}" />
  <!-- Main Theme Styles + Bootstrap-->
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/theme.min.css') }}">
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/custom-style.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="{{ asset('frontend/vendor/boxed/css/boxed-check.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('frontend/vendor/boxed/css/boxed-check.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  @livewireStyles
  @routes
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
  <!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span
      class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon ci-arrow-up">
    </i></a>
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
  @livewireScripts
  @stack('script')
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
  @stack('script')
  <script src="{{ URL::to('frontend/js/cart.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.4/jquery.simplePagination.min.js">
  </script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  @livewireScripts
  @stack('script')

  <script type="text/javascript">
    window.addEventListener('alert', event => {
      toastr[event.detail.type](event.detail.message,
        event.detail.title ?? ''), toastr.options = {
        "closeButton": true,
        "progressBar": true,
      };
    })
    window.addEventListener('OpenUpdatePhoneModal', function(event) {
      $('.updatePhone').modal('show');
    });

    window.addEventListener('CloseUpdatePhoneModal', function(event) {
      $('.updatePhone').modal('hide');
    });

    window.addEventListener('OpenUpdateAddressModal', function(event) {
      $('.updateAddress').modal('show');
    });

    window.addEventListener('CloseUpdateAddressModal', function(event) {
      $('.updateAddress').modal('show');
    });
  </script>
</body>

</html>
