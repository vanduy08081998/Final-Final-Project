<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/vendor/simplebar/dist/simplebar.min.css') }}" />
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/vendor/tiny-slider/dist/tiny-slider.css') }}" />
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/vendor/drift-zoom/dist/drift-basic.min.css') }}" />
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/vendor/lightgallery.js/dist/css/lightgallery.min.css') }}" />
  <!-- Main Theme Styles + Bootstrap-->
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/theme.min.css') }}">
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/custom-style.css') }}">
  <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/ijaboCropTool.min.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="{{ asset('frontend/vendor/boxed/css/boxed-check.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('frontend/vendor/boxed/css/boxed-check.min.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
  <script src="{{ asset('frontend/js/search.js') }}"></script>
  <script src="{{ asset('frontend/js/wishlist.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::to('frontend/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ URL::to('frontend/dist/assets/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ URL::to('frontend/magiczoom/magiczoom.css') }}">
  @livewireStyles
  @routes
</head>
<!-- Body-->
<script>
  function fee() {
    $(document).on('change', '.choose', function() {
      var url = $('.route').data('url');
      var action = $(this).attr("id");
      var ma_id = $(this).val();
      var result = '';
      if (action == 'province') {
        result = 'district';
      } else {
        result = 'ward';
      }
      $.ajax({
        url: url,
        method: "POST",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          action: action,
          ma_id: ma_id
        },
        success: function(data) {
          $('#' + result).html(data);
        }
      })
    })
  }
</script>

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
  <script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
  <!-- Main theme script-->
  <script src="{{ asset('frontend/js/theme.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.4/jquery.simplePagination.min.js">
  </script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  <script src="{{ URL::to('frontend/js/cart.js') }}"></script>
  <script src="{{ URL::to('frontend/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::to('frontend/magiczoom/magiczoom.js') }}"></script>
  <script src="{{ asset('frontend/js/ijaboCropTool.min.js') }}"></script>
  @include('sweetalert::alert')
  @stack('script')
  <script src="{{ URL::to('frontend/js/cart.js') }}"></script>


  @livewireScripts


  <script type="text/javascript">
    window.addEventListener('alert', event => {
      toastr[event.detail.type](event.detail.message,
        event.detail.title ?? ''), toastr.options = {
        "closeButton": true,
        "progressBar": true,
      };
    })
    window.addEventListener('OpenUpdatePhoneModal', function(event) {
      $('.updatePhone').modal('show')
    });

    window.addEventListener('CloseUpdatePhoneModal', function(event) {
      $('.updatePhone').modal('hide');
    });

    window.addEventListener('OpenUpdateAddressModal', function(event) {
      $('.updateAddress').modal('show');
    });

    window.addEventListener('CloseUpdateAddressModal', function(event) {
      $('.updateAddress').modal('hide');
    });

    window.addEventListener('OpenUpdatePasswordModal', function(event) {
      $('.updatePassword').modal('show');
    });

    window.addEventListener('CloseUpdatePasswordModal', function(event) {
      $('.updatePassword').modal('hide');
    });

    $(document).ready(function() {
      $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bx-hide");
          $('#show_hide_password i').removeClass("bx-show");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bx-hide");
          $('#show_hide_password i').addClass("bx-show");
        }
      });

      $("#show_hide_password2 a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password2 input').attr("type") == "text") {
          $('#show_hide_password2 input').attr('type', 'password');
          $('#show_hide_password2 i').addClass("bx-hide");
          $('#show_hide_password2 i').removeClass("bx-show");
        } else if ($('#show_hide_password2 input').attr("type") == "password") {
          $('#show_hide_password2 input').attr('type', 'text');
          $('#show_hide_password2 i').removeClass("bx-hide");
          $('#show_hide_password2 i').addClass("bx-show");
        }
      });
    });

    $(document).on('click', '#change_avatar', function() {
      $('#customer_avatar').click();
    })
    $('#customer_avatar').ijaboCropTool({
      preview: '.customer_picture',
      setRatio: 1,
      allowedExtensions: ['jpg', 'jpeg', 'png'],
      buttonsText: ['CẮT VÀ LƯU', 'ĐÓNG'],
      buttonsColor: ['#30bf7d', '#ee5155', -15],
      processUrl: '{{ route('crop') }}',
      withCSRF: ['_token', '{{ csrf_token() }}'],
      onSuccess: function(message, element, status) {
        toastr.success(message);
      },
      onError: function(message, element, status) {
        alert(message);
      }
    });
  </script>

</body>

</html>
