<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url-to" content="{{ URL::to('/') }}">
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
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/vendor/drift-zoom/dist/drift-basic.min.css') }}" />
    <link rel="stylesheet" media="screen"
        href="{{ asset('frontend/vendor/lightgallery.js/dist/css/lightgallery.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendor/tiny-slider/dist/tiny-slider.css') }}">
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/theme.min.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/custom-style.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/ijaboCropTool.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/boxed/css/boxed-check.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/vendor/boxed/css/boxed-check.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('frontend/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('frontend/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('frontend/css/image-uploader.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/range.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/product-details-custom.css') }}">

    @livewireStyles
    @livewireScripts
    @routes
</head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CFSNQ4FS84"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-CFSNQ4FS84');
</script>

<!-- Body-->
<script>
    function fee(action) {
        var url = $('.route').data('url');
        var ma_id = $('chose_' + action).val();

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


    }
</script>

<body class="handheld-toolbar-enabled">
    {{-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> --}}
    <!-- Sign in / sign up modal-->
    @include('clients.Inc.modal-login')
    <main class="page-wrapper">
        <!-- Navbar Electronics Store-->
        @include('clients.Inc.header')


        @yield('content')
    </main>
    <input type="hidden" name="" id="url_to" value="{{ URL::to('/') }}">
    <!-- Footer-->
    @include('clients.Inc.footer')
    <!-- Toolbar for handheld devices (Default)-->
    <div class="handheld-toolbar">
        <div class="d-table table-layout-fixed w-100">
            <a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)">
                <span class="handheld-toolbar-icon"><i class="ci-menu"></i></span>
                <span class="handheld-toolbar-label">Menu</span>
            </a>
            @php
                use App\Models\Cart;
                if (auth()->check()) {
                    $cart = Cart::where('user_id', auth()->user()->id)->get();
                    $totalprice = 0;
                    foreach ($cart as $key => $value) {
                        foreach (json_decode($value->specifications) as $index => $item) {
                            $totalprice += $value->quantity * $item->variant_price;
                        }
                    }
                } else {
                    $cart = null;
                }
            @endphp
            @auth
                @if (count($cart) > 0)
                    <a class="d-table-cell handheld-toolbar-item" href="{{ route('cart.cart-list') }}">
                        <span class="handheld-toolbar-icon"><i class="ci-cart"></i>
                            <span class="badge bg-primary rounded-pill ms-1">{{ count($cart) }}</span>
                        </span>

                        <span class="handheld-toolbar-label">{{ number_format($totalprice) }}</span>
                    </a>
                @else
                    <a class="d-table-cell handheld-toolbar-item" href="{{ url('/') }}">
                        <span class="handheld-toolbar-icon"><i class="ci-cart"></i>
                            <span class="badge bg-primary rounded-pill ms-1">0</span>
                        </span>

                        <span class="handheld-toolbar-label">Chưa có gì trong giỏ hàng</span>
                    </a>
                @endif

            @endauth
            @guest
                <a class="d-table-cell handheld-toolbar-item" href="{{ url('login') }}">
                    <span class="handheld-toolbar-icon"><i class="ci-cart"></i>
                    </span>
                    <span class="handheld-toolbar-label">Bạn chưa đăng nhập</span>
                </a>
            @endguest
            <a class="d-table-cell handheld-toolbar-item" href="#">
                <span class="handheld-toolbar-icon"><i class="ci-user"></i></span>
                <span class="handheld-toolbar-label">Tài khoản</span>
            </a>
        </div>
    </div>
    {{-- Chatbox button --}}
    @include('clients.Inc.chatbox')
    <!-- GetButton.io widget -->
    <!-- Compare -->
    @include('clients.Inc.compare')

    <!-- Quickview -->
    @include('clients.Inc.quickview')
    <!-- /GetButton.io widget -->
    <!-- Back To Top Button-->
    <a class="btn-scroll-top" href="#top" data-scroll>
        <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
        <i class="btn-scroll-top-icon ci-arrow-up"></i>
    </a>

    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{ asset('backend/js/jquery-3.5.1.min.js') }}"></script>
    <!-- JQUery ở đây nảy !!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>


    <script src="{{ asset('fancybox/dist/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('frontend/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/drift-zoom/dist/Drift.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/lightgallery.js/dist/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/lg-video.js/dist/lg-video.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <!-- Main theme script-->
    <script src="{{ asset('frontend/js/theme.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.4/jquery.simplePagination.min.js">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ URL::to('frontend/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/ijaboCropTool.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script src="{{ URL::to('frontend/js/cart.js') }}"></script>
    <script src="{{ asset('frontend/js/range.js') }}"></script>
    <script src="{{ asset('frontend/js/ijaboCropTool.min.js') }}"></script>
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/image-uploader.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wishlist.js') }}"></script>
    <script src="{{ asset('frontend/js/search.js') }}"></script>
    <script src="{{ asset('frontend/js/account.js') }}"></script>
    <script src="{{ asset('frontend/js/review.js') }}"></script>
    <script src="{{ asset('frontend/js/chatbox.js') }}"></script>
    <script src="{{ asset('frontend/js/compare.js') }}"></script>
    <script src="{{ asset('frontend/js/quickview.js') }}"></script>
    <script src="{{ asset('frontend/js/productdetails.js') }}"></script>
    <!-- JQUery ở đây nảy !!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>

    <script>
        $('.input-images-1').imageUploader();
    </script>
    {!! Toastr::message() !!}
    @include('sweetalert::alert')
    @stack('script')
    <script type="text/javascript">
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            };
        })

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

        $(document).on('click', '.dropdown-item', function() {
            var href = $(this).attr('href');
            window.location.href = href;
        })
    </script>
    <script>
        $(".preloader").fadeOut(600);
    </script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function(event) {
                var pos_body = $('html,body').scrollTop();
                //   console.log(pos_body);
                if (pos_body > 545.4545288085938) {
                    $('.banner-main').addClass('banner-fixed');
                }
                if (pos_body < 545.4545288085938) {
                    $('.banner-main').removeClass('banner-fixed');
                }
            });
        });
    </script>

    <script>
        $('body').resize(function() {
                const width = $('body').width();
                console.log(width)
                if (width < 1024) {
                    $('.card-body').removeClass('card-body-hidden');
                }
            })
            .resize()
    </script>

    <script>
        $(document).on('click', '.move-top', function() {
            setTimeout(function() {
                $('html, body').animate({
                    scrollTop: $('#div_id').position().top
                }, 'slow');
            }, 1000);
        })
    </script>

    <script>
        $(document).on('click', '.dropdown-item', function() {
            var href = $(this).attr('href');
            window.location.href = href;
        })
    </script>
    <script>
        $(".preloader").fadeOut(600);
    </script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function(event) {
                var pos_body = $('html,body').scrollTop();
                // console.log(pos_body);
                if (pos_body > 545.4545288085938) {
                    $('.banner-main').addClass('banner-fixed');
                }
                if (pos_body < 545.4545288085938) {
                    $('.banner-main').removeClass('banner-fixed');
                }
                if (pos_body > 2496) {
                    $('.banner-main').removeClass('banner-fixed');
                }
            });
        });
    </script>

    <script>
        $('body').resize(function() {
                const width = $('body').width();
                // console.log(width)
                if (width < 1024) {
                    $('.card-body').removeClass('card-body-hidden');
                }
            })
            .resize()
    </script>

</body>

</html>
