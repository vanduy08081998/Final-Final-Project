@extends('layouts.client_master')


@section('title', $product->product_name)

@section('meta')
  <meta name="description" content="{!! $product->meta_description !!}">
  <meta name="keywords" content="{!! $product->meta_keywords !!}">
  <meta name="author" content="{!! $product->meta_title !!}">
@endsection

@section('content')
  <div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>{{ trans('Trang chủ') }}</a>
            </li>
            <li class="breadcrumb-item text-nowrap"><a href="#">{{ trans('Cửa hàng') }}</a>
            </li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('Chi tiết sản phẩm') }}
            </li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h4 text-light mb-2">{{ trans($product->product_name) }}</h1>
        <div>
          <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
              class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i
              class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
          </div><span class="d-inline-block fs-sm text-white opacity-70 align-middle mt-1 ms-1">74 Reviews</span>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="bg-light shadow-lg rounded-3">
      <!-- Tabs-->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link py-4 px-sm-4 active" href="#general" data-bs-toggle="tab" role="tab">General <span
              class='d-none d-sm-inline'>Info</span></a></li>
        <li class="nav-item"><a class="nav-link py-4 px-sm-4" href="#specs" data-bs-toggle="tab" role="tab"><span
              class='d-none d-sm-inline'>Tech</span> Specs</a></li>
        <li class="nav-item"><a class="nav-link py-4 px-sm-4" href="#reviews" data-bs-toggle="tab" role="tab">Reviews <span
              class="fs-sm opacity-60">(74)</span></a></li>
      </ul>
      <div class="px-4 pt-lg-3 pb-3 mb-5">

        <div class="tab-content px-lg-3">
          <!-- General info tab-->


          <div class="tab-pane fade show active" id="general" role="tabpanel">
            <form id="choice_attribute_options" onchange="getVariantPrice()">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <div class="row">
                @include('clients.shop.gallery-css')
                <!-- Product gallery-->
                <div class="col-lg-7" id="content-wrapper">
                  <div id="main-image">
                    <a data-zoom-id="main" href="{{ asset($product->product_image) }}" class="MagicZoom main_image" id="main"><img
                        src="{{ asset($product->product_image) }}"></a>
                  </div>

                  <div id="thumbnails">
                    <a data-zoom-id="main" href="{{ asset($product->product_image) }}"
                      data-image="{{ asset($product->product_image) }}"><img src="{{ asset($product->product_image) }}"></a>
                    @foreach (explode(',', $product->product_gallery) as $key => $gallery)
                      <a data-zoom-id="main" href="{{ asset($gallery) }}" data-image="{{ asset($gallery) }}"><img
                          src="{{ asset($gallery) }}"></a>
                    @endforeach

                  </div>
                </div>
                <!-- Product details-->
                <div class="col-lg-5 pt-4 pt-lg-0">
                  <div class="product-details ms-auto pb-3">
                    <div class="h5 fw-normal text-accent mb-3 me-1">
                      {{ number_format($product->unit_price) }} / {{ $product->product_unit }}
                    </div>
                    @foreach (json_decode($product->choice_options) as $item)
                      <div class="fs-sm mb-2"><span
                          class="text-heading fw-medium me-1">{{ \App\Models\Attribute::where('id', $item->attribute_id)->first()->name }}:
                      </div>
                      <div class="boxed-check-group boxed-check-success boxed-check-sm">
                        @foreach ($item->values as $key => $value)
                          <label class="boxed-check">
                            <input class="boxed-check-input" type="radio" name="radio_custom_{{ $item->attribute_id }}"
                              value="{{ $value }}">
                            <div class="boxed-check-label" style="text-align:center;">
                              <span>{{ $value }}</span>
                            </div>
                          </label>
                        @endforeach
                      </div>
                    @endforeach

                    <div class="position-relative me-n4 mb-3">
                      <div class="boxed-check-group boxed-check-sm">
                        @isset($product->colors)
                          <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Color:</span>
                          </div>
                          @foreach (json_decode($product->colors) as $key => $value)
                            <label class="boxed-check">
                              <input class="boxed-check-input" type="radio" name="radio_custom_color"
                                value="{{ \App\Models\Color::where('color_code', $value)->first()->color_slug }}">
                              <div class="boxed-check-label"
                                style="text-align:center; background: {{ $value }}; width: 25px; height: 25px; ">
                                <span></span>
                              </div>
                            </label>
                          @endforeach
                        @endisset
                        <div id="product_badge">

                        </div>
                      </div>
                    </div>
                    <div class="d-flex">
                      <span>Số lượng : &nbsp;</span>
                      <input class="input-number" type="number" name="product_quantity" value="1" min="0" max="10">
                    </div>
                    <div class="position-relative me-n4 mb-3 mt-3">
                      <div class="h5 fw-normal mb-3 me-1 total_product_price"></div>
                    </div>


                    <div class="d-flex align-items-center pt-2 pb-4">

                      <button class="btn btn-primary btn-shadow d-block w-100 card_add_btn" type="button"><i
                          class="ci-cart fs-lg me-2"></i>Thêm vào giỏ hang</button>
                    </div>
                    <div class="d-flex mb-4">
                      <div class="w-100 me-3">
                        <button class="btn btn-secondary d-block w-100" type="button"><i class="ci-heart fs-lg me-2"></i><span
                            class='d-none d-sm-inline'>Add
                            to </span>Wishlist</button>
                      </div>
                      <div class="w-100">
                        <button class="btn btn-secondary d-block w-100" type="button"><i class="ci-compare fs-lg me-2"></i>Compare</button>
                      </div>
                    </div>
                    <!-- Product panels-->
                    <div class="accordion mb-4" id="productPanels">
                      <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button" href="#shippingOptions" role="button"
                            data-bs-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions"><i
                              class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Tùy
                            chọn vận chuyển</a></h3>
                        <div class="accordion-collapse collapse show" id="shippingOptions" data-bs-parent="#productPanels">
                          <div class="accordion-body fs-sm">
                            <div class="d-flex justify-content-between border-bottom pb-2">
                              <div>
                                <div class="fw-semibold text-dark">Ngày vận chuyển ước tính
                                </div>
                                <div class="fs-sm text-muted">
                                  {{ $product->shipping_day }} Ngày</div>
                              </div>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                              <div>
                                <div class="fw-semibold text-dark">Phí vận chuyển</div>
                                @if ($product->shipping_stock == null)
                                  <div class="fs-sm text-muted">
                                    {{ $product->shipping_type }}</div>
                                @else
                                  <div class="fs-sm text-muted">
                                    {{ $product->shipping_stock }} VND</div>
                                @endif

                              </div>

                            </div>
                            <div class="d-flex justify-content-between pt-2">
                              <div>
                                <div class="fw-semibold text-dark">VAT</div>
                                <div class="fs-sm text-muted">
                                  {{ $product->vat }}{{ $product->vat_unit }}</div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#localStore" role="button"
                            data-bs-toggle="collapse" aria-expanded="true" aria-controls="localStore"><i
                              class="ci-location text-muted fs-lg align-middle mt-n1 me-2"></i>Find
                            in local store</a></h3>
                        <div class="accordion-collapse collapse" id="localStore" data-bs-parent="#productPanels">
                          <div class="accordion-body">
                            <select class="form-select">
                              <option value>Select your country</option>
                              <option value="Argentina">Argentina</option>
                              <option value="Belgium">Belgium</option>
                              <option value="France">France</option>
                              <option value="Germany">Germany</option>
                              <option value="Spain">Spain</option>
                              <option value="UK">United Kingdom</option>
                              <option value="USA">USA</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Sharing-->
                    <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2"
                      href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i
                        class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i
                        class="ci-facebook"></i>Facebook</a>
                  </div>
                </div>
              </div>
            </form>
          </div>


          <!-- Tech specs tab-->
          <div class="tab-pane fade" id="specs" role="tabpanel">
            <div class="d-md-flex justify-content-between align-items-start pb-4 mb-4 border-bottom">
              <div class="d-flex align-items-center pt-3" id="specifications">

              </div>
            </div>
          </div>
          <!-- Reviews tab-->
          <div class="tab-pane fade" id="reviews" role="tabpanel">
            <!-- Reviews-->
            <div class="row pt-2 pb-3">
              <div class="col-lg-4 col-md-5">
                <h2 class="h3 mb-4">74 Reviews</h2>
                <div class="star-rating me-2"><i class="ci-star-filled fs-sm text-accent me-1"></i><i
                    class="ci-star-filled fs-sm text-accent me-1"></i><i class="ci-star-filled fs-sm text-accent me-1"></i><i
                    class="ci-star-filled fs-sm text-accent me-1"></i><i class="ci-star fs-sm text-muted me-1"></i></div><span
                  class="d-inline-block align-middle">4.1 Overall rating</span>
                <p class="pt-3 fs-sm text-muted">58 out of 74 (77%)<br>Customers recommended this
                  product</p>
              </div>
              <div class="col-lg-8 col-md-7">
                <div class="d-flex align-items-center mb-2">
                  <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">5</span><i
                      class="ci-star-filled fs-xs ms-1"></i></div>
                  <div class="w-100">
                    <div class="progress" style="height: 4px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </div><span class="text-muted ms-3">43</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                  <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">4</span><i
                      class="ci-star-filled fs-xs ms-1"></i></div>
                  <div class="w-100">
                    <div class="progress" style="height: 4px;">
                      <div class="progress-bar" role="progressbar" style="width: 27%; background-color: #a7e453;" aria-valuenow="27"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div><span class="text-muted ms-3">16</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                  <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">3</span><i
                      class="ci-star-filled fs-xs ms-1"></i></div>
                  <div class="w-100">
                    <div class="progress" style="height: 4px;">
                      <div class="progress-bar" role="progressbar" style="width: 17%; background-color: #ffda75;" aria-valuenow="17"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div><span class="text-muted ms-3">9</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                  <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">2</span><i
                      class="ci-star-filled fs-xs ms-1"></i></div>
                  <div class="w-100">
                    <div class="progress" style="height: 4px;">
                      <div class="progress-bar" role="progressbar" style="width: 9%; background-color: #fea569;" aria-valuenow="9"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div><span class="text-muted ms-3">4</span>
                </div>
                <div class="d-flex align-items-center">
                  <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">1</span><i
                      class="ci-star-filled fs-xs ms-1"></i></div>
                  <div class="w-100">
                    <div class="progress" style="height: 4px;">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 4%;" aria-valuenow="4" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </div><span class="text-muted ms-3">2</span>
                </div>
              </div>
            </div>
            <hr class="mt-4 mb-3">
            <div class="row py-4">
              <!-- Reviews list-->
              <div class="col-md-7">
                <div class="d-flex justify-content-end pb-4">
                  <div class="d-flex flex-nowrap align-items-center">
                    <label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block" for="sort-reviews">Sort by:</label>
                    <select class="form-select form-select-sm" id="sort-reviews">
                      <option>Newest</option>
                      <option>Oldest</option>
                      <option>Popular</option>
                      <option>High rating</option>
                      <option>Low rating</option>
                    </select>
                  </div>
                </div>
                <!-- Review-->
                <div class="product-review pb-4 mb-4 border-bottom">
                  <div class="d-flex mb-3">
                    <div class="d-flex align-items-center me-4 pe-2"><img class="rounded-circle"
                        src="{{ URL::to('frontend/img/shop/reviews/01.jpg') }}" width="50" alt="Rafael Marquez">
                      <div class="ps-3">
                        <h6 class="fs-sm mb-0">Rafael Marquez</h6><span class="fs-ms text-muted">June 28, 2019</span>
                      </div>
                    </div>
                    <div>
                      <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                          class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i
                          class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                      </div>
                      <div class="fs-ms text-muted">83% of users found this review helpful</div>
                    </div>
                  </div>
                  <p class="fs-md mb-2">Nam libero tempore, cum soluta nobis est eligendi optio
                    cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis
                    voluptas assumenda est...</p>
                  <ul class="list-unstyled fs-ms pt-1">
                    <li class="mb-1"><span class="fw-medium">Pros:&nbsp;</span>Consequuntur
                      magni, voluptatem
                      sequi, tempora</li>
                    <li class="mb-1"><span class="fw-medium">Cons:&nbsp;</span>Architecto
                      beatae, quis autem
                    </li>
                  </ul>
                  <div class="text-nowrap">
                    <button class="btn-like" type="button">15</button>
                    <button class="btn-dislike" type="button">3</button>
                  </div>
                </div>
                <!-- Review-->
                <div class="text-center">
                  <button class="btn btn-outline-accent" type="button"><i class="ci-reload me-2"></i>Load
                    more reviews</button>
                </div>
              </div>
              <!-- Leave review form-->
              <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
                <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3">
                  <h3 class="h4 pb-2">Write a review</h3>
                  <form class="needs-validation" method="post" novalidate>
                    <div class="mb-3">
                      <label class="form-label" for="review-name">Your name<span class="text-danger">*</span></label>
                      <input class="form-control" type="text" required id="review-name">
                      <div class="invalid-feedback">Please enter your name!</div><small class="form-text text-muted">Will be displayed on
                        the comment.</small>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="review-email">Your email<span class="text-danger">*</span></label>
                      <input class="form-control" type="email" required id="review-email">
                      <div class="invalid-feedback">Please provide valid email address!</div>
                      <small class="form-text text-muted">Authentication only - we won't spam
                        you.</small>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="review-rating">Rating<span class="text-danger">*</span></label>
                      <select class="form-select" required id="review-rating">
                        <option value="">Choose rating</option>
                        <option value="5">5 stars</option>
                        <option value="4">4 stars</option>
                        <option value="3">3 stars</option>
                        <option value="2">2 stars</option>
                        <option value="1">1 star</option>
                      </select>
                      <div class="invalid-feedback">Please choose rating!</div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="review-text">Review<span class="text-danger">*</span></label>
                      <textarea class="form-control" rows="6" required id="review-text"></textarea>
                      <div class="invalid-feedback">Please write a review!</div><small class="form-text text-muted">Your review must be at
                        least 50
                        characters.</small>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="review-pros">Pros</label>
                      <textarea class="form-control" rows="2" placeholder="Separated by commas" id="review-pros"></textarea>
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="review-cons">Cons</label>
                      <textarea class="form-control" rows="2" placeholder="Separated by commas" id="review-cons"></textarea>
                    </div>
                    <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Submit a
                      Review</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>



  </div>
  <!-- Product description-->
  <div class="container pt-lg-3 pb-4 pb-sm-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">

      </div>
    </div>
  </div>
  <hr class="mb-5">
  <!-- Product carousel (You may also like)-->
  <!-- Bình luận ở đây nha bà con-->
  @livewire('comment-live', ['product' => $product])
  <!-- Bình luận ở đây nha bà con-->

  <style>
    .form-comment {
      border: 1px solid #a09797;
    }

    .line {
      padding-bottom: 10px;
      overflow: hidden;
      position: relative;
    }

    .line::before {
      content: '';
      position: absolute;
      height: 100%;
      width: 4px;
      margin-top: 40px;
      margin-left: 12px;
      background: #4a90e2;
      border-radius: 5px;
    }

    .infocomment {
      display: block;
      clear: both;
      margin-bottom: 20px;
    }

    .commentask {
      display: block;
      overflow: visible;
      margin: 10px 0 0;
    }

    .commentask strong {
      margin-top: 5px;
      text-transform: capitalize;
    }

    .iconcom-user {
      display: inline-block;
      width: 25px;
      height: 25px;
      background-image: none;
      background-color: rgb(213, 145, 156);
      margin-right: 3px;
      text-align: center;
      color: #fff;
      text-transform: uppercase;
      font-size: 12px;
      line-height: 26px;
      font-style: normal;
    }

    .relate_infocom .reply {
      cursor: pointer;
      color: #4a90e2;
    }

    .infocom_ask {
      padding-top: 8px;
      display: block;
      font-size: 14px;
      color: #4a4a4a;
      line-height: 22px;
      margin-left: 30px;
    }

    .relate_infocom {
      display: flex;
      align-items: center overflow: visible;
      height: 18px;
      padding: 5px 0;
      font-size: 12px;
      color: #666;
      position: relative;
    }

    .relate_infocom span {
      float: left;
    }

    .clr {
      clear: both;
    }

    .relate_infocom .dot {
      float: left;
      display: inline;
      font-size: 8px;
      vertical-align: middle;
      margin: 2px 5px;
      color: #babbb8;
    }

    .relate_infocom .like {
      float: none;
      color: #4a90e2;
    }

    .fa-thumbs-o-up {
      background-position: -106px -25px;
      width: 13px;
      height: 13px;
      margin-top: 5px;
    }


    /*  Trả lời bình luận */

    .comment_reply {
      display: block;
      margin-top: 15px;
      position: relative;
      background: #ece9c7;
      border: 1px solid #e7e7e7;
      padding: 15px 10px;
      font-size: 14px;
      color: #333;
      margin-left: 30px;
    }

    .avt-qtv {
      float: left;
      width: 27px;
      height: 27px;
      margin-right: 5px;
      text-align: center;
      color: #666;
      text-transform: uppercase;
      font-size: 12px;
      line-height: 26px;
      font-weight: 600;
      text-shadow: 1px 1px 0 rgb(255 255 255 / 20%);
    }

    .avt-qtv img {
      margin-top: -5px;
      height: 100%;
      width: 100%;
    }

    .qtv {
      text-transform: uppercase;
      margin-right: 10px;
      color: #000;
      font-weight: normal;
      font-size: 10px;
      background: #eebc49;
      padding: 2px 6px;
      border-radius: 3px;
      line-height: 18px;
      height: 18px;
      margin-left: 10px;
    }

    .comment_reply::before {
      position: absolute;
      content: '';
      background: #ece9c7;
      height: 30px;
      width: 30px;
      transform: rotate(-45deg);
      top: -8px;
      left: 5px;
      z-index: -1;
    }

    .totalcomment-reply {
      display: block;
      padding: 10px 0 0;
      border-top: 1px solid #b4b4b4;
      font-size: 12px;
      color: #4a90e2;
      cursor: pointer;
      margin-top: 7px;
    }

    .numlike span,
    .numlike i {
      float: left;
    }

  </style>
  </div>
  <!-- Product description-->
  <div class="container pt-lg-3 pb-4 pb-sm-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        {!! $product->long_description !!}
      </div>
    </div>
  </div>
  <hr class="mb-5">
  <!-- Product carousel (You may also like)-->
  <div class="container pt-lg-2 pb-5 mb-md-3">
    <h2 class="h3 text-center pb-4">Sản phẩm liên quan</h2>
    <div class="tns-carousel tns-controls-static tns-controls-outside">
      <div class="tns-carousel-inner"
        data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
        <!-- Product-->
        @foreach (\App\Models\Product::where('product_id_category', '!=', $product->product_id_category)->get() as $proOther)
          <div>
            <div class="card product-card card-static">
              <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i
                  class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img
                  src="{{ asset($proOther->product_image) }}" alt="Product"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"></a>
                <h3 class="product-title fs-sm"><a href="#">{{ trans($proOther->product_name) }}</a>
                </h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price">{{ number_format($proOther->unit_price) }}</span>
                  </div>
                  <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                      class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i
                      class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Product-->
        @endforeach
      </div>
    </div>
  </div>
@endsection

@push('script')
  <script>
    $('#choice_attribute_options').on('change', function() {
      getVariantPrice()
    })
  </script>

  <script>
    const getVariantPrice = () => {
      $.ajax({
        type: "POST",
        url: "{{ route('products.get_variant_price') }}",
        data: $('#choice_attribute_options').serializeArray(),
        success: function(response) {
          console.log(response.quantity)
          $('#specifications').html(response.specifications)
          $('.total_product_price').html(` <small>Tổng tiền: </small>
                                                  ${response.price}`)
          $('#main-image').html(`
            <a data-zoom-id="main" href="${$('#url_to').val()}/${response.variant_image}" class="MagicZoom main_image" id="main"><img
                          src="${$('#url_to').val()}/${response.variant_image}"></a>
            `)
          MagicZoom.refresh();
          if (response.product_quantity > 0) {
            $('#product_badge').html(` <div class="product-badge product-available mt-n1 bg-green" style="top: -200" ><i
                                                  class="ci-security-check"></i>Sản phẩm còn hàng
                                              </div>`)
          } else {
            $('#product_badge').html(`<div class="product-badge product-available mt-n1 bg-red"><i
                                                  class="fas fa-times"></i>Sản phẩm hết hàng
                                              </div> `)
          }
        }

      })
    }
  </script>


  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {

      $(document).ready(function() {
        // Xử lý bình luận
        $(document).on('click', '.reply-comment', function(ev) {
          ev.preventDefault();
          let id = $(this).data('id')
          $('.comment-inline').addClass('d-none');
          $('.reply-comment-' + id).removeClass('d-none');
          // $('.comment-inline').slideUp();
          $('.reply-comment-' + id).slideDown();

          let tagName = '@' + $('.name-' + id).text() + ':'
          $('.body-' + id).val(tagName)

        })


        $(document).on('keyup', '.form-comment-text', function() {
          let text = $(this).val()
          if (text) {
            replaceText(text)
            $('.btn-submit-text').attr('disabled', false)
          } else {
            $('.btn-submit-text').attr('disabled', true)
          }
        })

        function replaceText(text) {
          text = text.replace(/lồn/gi, "***");
          text = text.replace(/cặc/gi, "***");
          text = text.replace(/dm/gi, "***");
          text = text.replace(/vãi/gi, "***");
          text = text.replace(/buồi/gi, "***");
          text = text.replace(/dái/gi, "***");
          text = text.replace(/địt/gi, "***");
          text = text.replace(/chịch/gi, "***");
          text = text.replace(/xoạc/gi, "***");
          text = text.replace(/vếu/gi, "***");
          text = text.replace(/vú/gi, "***");
          text = text.replace(/bụ/gi, "***");
          text = text.replace(/đụ/gi, "***");
          text = text.replace(/mé/gi, "***");
          text = text.replace(/mày/gi, "***");
          text = text.replace(/tao/gi, "***");
          text = text.replace(/gớm/gi, "***");
          text = text.replace(/tởm/gi, "***");
          $('.form-comment-text').val(text)
        }
      })
    })
  </script>
@endpush
