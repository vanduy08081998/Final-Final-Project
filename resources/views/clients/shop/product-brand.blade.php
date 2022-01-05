@extends('layouts.client_master')


@section('title', 'Danh sách sản phẩm')


@section('content')
    <!-- Quick View Modal-->
    <div class="modal-quick-view modal fade" id="quick-view" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title product-title"><a href="shop-single-v1.html" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Go to product page">Sports Hooded Sweatshirt<i
                                class="ci-arrow-right fs-lg ms-2"></i></a></h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Product gallery-->
                        <div class="col-lg-7 pe-lg-0">
                            <div class="product-gallery">
                                <div class="product-gallery-preview order-sm-2">
                                    <div class="product-gallery-preview-item active" id="first"><img class="image-zoom"
                                            src="{{ asset('frontend/img/shop/single/gallery/01.jpg') }}"
                                            data-zoom="{{ asset('frontend/img/shop/single/gallery/01.jpg') }}"
                                            alt="Product image">
                                        <div class="image-zoom-pane"></div>
                                    </div>
                                    <div class="product-gallery-preview-item" id="second"><img class="image-zoom"
                                            src="{{ asset('frontend/img/shop/single/gallery/02.jpg') }}"
                                            data-zoom="{{ asset('frontend/img/shop/single/gallery/02.jpg') }}"
                                            alt="Product image">
                                        <div class="image-zoom-pane"></div>
                                    </div>
                                    <div class="product-gallery-preview-item" id="third"><img class="image-zoom"
                                            src="{{ asset('frontend/img/shop/single/gallery/03.jpg') }}"
                                            data-zoom="{{ asset('frontend/img/shop/single/gallery/03.jpg') }}"
                                            alt="Product image">
                                        <div class="image-zoom-pane"></div>
                                    </div>
                                    <div class="product-gallery-preview-item" id="fourth"><img class="image-zoom"
                                            src="{{ asset('frontend/img/shop/single/gallery/04.jpg') }}"
                                            data-zoom="{{ asset('frontend/img/shop/single/gallery/04.jpg') }}"
                                            alt="Product image">
                                        <div class="image-zoom-pane"></div>
                                    </div>
                                </div>
                                <div class="product-gallery-thumblist order-sm-1"><a
                                        class="product-gallery-thumblist-item active" href="#first"><img
                                            src="{{ asset('frontend/img/shop/single/gallery/th01.jpg') }}"
                                            alt="Product thumb"></a><a class="product-gallery-thumblist-item"
                                        href="#second"><img src="{{ asset('frontend/img/shop/single/gallery/th02.jpg') }}"
                                            alt="Product thumb"></a><a class="product-gallery-thumblist-item"
                                        href="#third"><img src="{{ asset('frontend/img/shop/single/gallery/th03.jpg') }}"
                                            alt="Product thumb"></a><a class="product-gallery-thumblist-item"
                                        href="#fourth"><img
                                            src="{{ asset('frontend/img/shop/single/gallery/th04.jpg') }}"
                                            alt="Product thumb"></a></div>
                            </div>
                        </div>
                        <!-- Product details-->
                        <div class="col-lg-5 pt-4 pt-lg-0 image-zoom-pane">
                            <div class="product-details ms-auto pb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2"><a
                                        href="shop-single-v1.html#reviews">
                                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star"></i>
                                        </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74
                                            Reviews</span>
                                    </a>
                                    <button class="btn-wishlist" type="button" data-bs-toggle="tooltip"
                                        title="Thêm vào yêu thích"><i class="ci-heart"></i></button>
                                </div>
                                <div class="mb-3"><span
                                        class="h3 fw-normal text-accent me-1">$18.<small>99</small></span>
                                    <del class="text-muted fs-lg me-3">$25.<small>00</small></del><span
                                        class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                                </div>
                                <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Color:</span><span
                                        class="text-muted" id="colorOptionText">Red/Dark blue/White</span></div>
                                <div class="position-relative me-n4 mb-3">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color" id="color1"
                                            data-bs-label="colorOptionText" value="Red/Dark blue/White" checked>
                                        <label class="form-option-label rounded-circle" for="color1"><span
                                                class="form-option-color rounded-circle"
                                                style="background-image: url({{ asset('frontend/img/shop/single/color-opt-1.png') }}"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color" id="color2"
                                            data-bs-label="colorOptionText" value="Beige/White/Black">
                                        <label class="form-option-label rounded-circle" for="color2"><span
                                                class="form-option-color rounded-circle"
                                                style="background-image: url({{ asset('frontend/img/shop/single/color-opt-2.png') }}"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color" id="color3"
                                            data-bs-label="colorOptionText" value="Dark grey/White/Mustard">
                                        <label class="form-option-label rounded-circle" for="color3"><span
                                                class="form-option-color rounded-circle"
                                                style="background-image: url({{ asset('frontend/img/shop/single/color-opt-3.png') }}"></span></label>
                                    </div>
                                    <div class="product-badge product-available mt-n1"><i
                                            class="ci-security-check"></i>Product available</div>
                                </div>
                                <form class="mb-grid-gutter">
                                    <div class="mb-3">
                                        <label class="fw-medium pb-1" for="product-size">Size:</label>
                                        <select class="form-select" required id="product-size">
                                            <option value="">Select size</option>
                                            <option value="xs">XS</option>
                                            <option value="s">S</option>
                                            <option value="m">M</option>
                                            <option value="l">L</option>
                                            <option value="xl">XL</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 d-flex align-items-center">
                                        <select class="form-select me-3" style="width: 5rem;">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit"><i
                                                class="ci-cart fs-lg me-2"></i>Thêm vào giỏ hàng</button>
                                    </div>
                                </form>
                                <h5 class="h6 mb-3 pb-2 border-bottom"><i
                                        class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info
                                </h5>
                                <h6 class="fs-sm mb-2">Style</h6>
                                <ul class="fs-sm ps-4">
                                    <li>Hooded top</li>
                                </ul>
                                <h6 class="fs-sm mb-2">Composition</h6>
                                <ul class="fs-sm ps-4">
                                    <li>Elastic rib: Cotton 95%, Elastane 5%</li>
                                    <li>Lining: Cotton 100%</li>
                                    <li>Cotton 80%, Polyester 20%</li>
                                </ul>
                                <h6 class="fs-sm mb-2">Art. No.</h6>
                                <ul class="fs-sm ps-4 mb-0">
                                    <li>183260098</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar 3 Level (Light)-->
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2 pb-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i
                                    class="ci-home"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Cửa hàng</a></li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 text-center">
                <h1 class="h3 text-light mb-0"> {{$brand_id->brand_name}} </h1>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-3">
                @include('clients.shop.navbar-shop');
                <!-- Sidebar-->

            </aside>
            <!-- Content  -->
            <section class="col-lg-9 tab-content-shop" style="padding-right: 50px;">
                <!-- Toolbar-->
                <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
                    <div class="flex-wrap">
                        <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
                            <label class="text-light opacity-75 text-nowrap fs-sm me-2 d-none d-sm-block" for="sorting">Sắp
                                xếp theo:</label>
                            <select class="form-select" id="sorting">
                                <option>Tất cả</option>
                                <option>Giá tăng dần</option>
                                <option>Giá giảm dần</option>
                                <option>Lượt đánh giá</option>
                                <option>Từ A - Z</option>
                                <option>Từ Z - A</option>
                            </select><span class="fs-sm text-light opacity-75 text-nowrap ms-2 d-none d-md-block">
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mx-n2">

                    <!-- Product-->

                    @foreach ($product_brand as $pro)

                        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                            <div class="card product-card">
                                <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="Thêm vào yêu thích"><i
                                        class="ci-heart"></i></button>
                                <a class="card-img-top d-block overflow-hidden" href="{{ route('shop.product-details', $pro->product_slug) }}">
                                    <img src="{{ URL::to($pro->product_image) }}" alt="Product"
                                        width="80%" style="margin: auto; display: block">
                                </a>
                                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">{{ $pro->Category->category_name }}</a>
                                    <h3 class="product-title fs-sm"><a
                                            href="">{{ $pro->product_name }}</a></h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="product-price"><span
                                                class="text-accent">{{ number_format($pro->unit_price) }}VNĐ</span></div>
                                        <div class="star-rating"><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr class="d-sm-none">
                        </div>

                    @endforeach
                </div>

            </section>
        </div>
    </div>
@endsection

@push('script')
<script>
    function shorting() {
      var value = $('select[name="shorting"] option:selected').val()
      var orderby = $('select[name="shorting"] option:selected').attr('data-short')
      let _token = $('meta[name="csrf-token"]').attr('content')
      let id_cate = 0;
      $.ajax({
        type: "POST",
        url: "{{ route('clients.products.short') }}",
        data: {
          value: value,
          orderby: orderby,
          id_cate: id_cate,
          _token: _token
        },
        success: function(response) {
          $('#product-short').html(response)
        }

      })
    }

    function search_by_cate(id) {
      let _token = $('meta[name="csrf-token"]').attr('content')
      let id_cate = 0;
      let key = $(#category_search_${id}).val()
      $.ajax({
        type: "POST",
        url: "{{ route('clients.products.searchbycate') }}",
        data: {
          id: id,
          id_cate: id_cate,
          key: key,
          _token: _token
        },
        success: function(response) {
          $('#product-short').html(response)
        }

      })
    }

    function focusout(id) {
      let _token = $('meta[name="csrf-token"]').attr('content')
      let id_cate = 0;
      let key = $(#category_search_${id}).val()
      $.ajax({
        type: "POST",
        url: "{{ route('clients.products.searchbycate') }}",
        data: {
          id: id,
          id_cate: id_cate,
          key: '',
          _token: _token
        },
        success: function(response) {
          $('#product-short').html(response)
        }

      })
    }

    function searchBrand() {
      $.ajax({
        type: "POST",
        url: "{{ route('clients.products.searchbybrand') }}",
        data: $('#form-search-brand').serializeArray(),
        success: function(response) {
          $('#product-short').html(response)
        }
      });
    }
    $(".js-range-slider").ionRangeSlider({
      type: "double",
      min: @php echo $min @endphp,
      max: @php echo $max @endphp,
      from: 200,
      to: 500,
      grid: true
    });
    $('#search-by-price').on('change', function(event) {
      event.preventDefault()
      $.ajax({
        type: "POST",
        url: "{{ route('search.range') }}",
        data: $(this).serializeArray(),
        success: function(response) {
          $('#product-short').html(response)
        }
      });
    })
  </script>
@endpush



