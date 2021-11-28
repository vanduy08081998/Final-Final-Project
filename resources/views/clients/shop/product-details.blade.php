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
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i
                                    class="ci-home"></i>{{ trans('Trang chủ') }}</a></li>
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
                            class="star-rating-icon ci-star-filled active"></i><i
                            class="star-rating-icon ci-star-filled active"></i><i
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
                <li class="nav-item"><a class="nav-link py-4 px-sm-4 active" href="#general" data-bs-toggle="tab"
                        role="tab">General <span class='d-none d-sm-inline'>Info</span></a></li>
                <li class="nav-item"><a class="nav-link py-4 px-sm-4" href="#specs" data-bs-toggle="tab"
                        role="tab"><span class='d-none d-sm-inline'>Tech</span> Specs</a></li>
                <li class="nav-item"><a class="nav-link py-4 px-sm-4" href="#reviews" data-bs-toggle="tab"
                        role="tab">Reviews <span class="fs-sm opacity-60">(74)</span></a></li>
            </ul>
            <div class="px-4 pt-lg-3 pb-3 mb-5">

                <div class="tab-content px-lg-3">
                    <!-- General info tab-->


                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <form id="choice_attribute_options" onchange="getVariantPrice()">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="row">
                                <!-- Product gallery-->
                                <div class="col-lg-7 pe-lg-0">
                                    <div class="product-gallery">
                                        <style>
                                            .demo {
                                                width: 100%;
                                                overflow: hidden;
                                                margin: 0 auto;
                                            }

                                            ul {
                                                list-style: none outside none;
                                                padding-left: 0;
                                                margin-bottom: 0;
                                            }

                                            li {
                                                display: block;
                                                float: left;
                                                margin-right: 6px;
                                                cursor: pointer;
                                            }

                                            .demo li img {
                                                display: block;
                                                height: auto;
                                                width: 100%;
                                            }

                                            #lightSlider li img {
                                                width: 60%;
                                                height: 400px;
                                                /* margin: 0 auto; */
                                            }

                                            .product-badge.product-available.bg-red {
                                                background-color: red;
                                            }

                                            .product-badge.product-available.bg-red::after {
                                                border-color: rgba(66, 214, 151, 0);
                                                border-bottom-color: red;
                                            }

                                            .product-badge.product-available.bg-green {
                                                background-color: green;
                                            }

                                            .product-badge.product-available.bg-green::after {
                                                border-color: rgba(66, 214, 151, 0);
                                                border-bottom-color: green;
                                            }

                                            * {
                                                box-sizing: border-box;
                                            }

                                            .input-number {
                                                width: 80px;
                                                padding: 0 12px;
                                                vertical-align: top;
                                                text-align: center;
                                                outline: none;
                                            }

                                        </style>
                                        <div class="demo">
                                            <ul id="lightSlider">
                                                <li data-thumb="{{ asset($product->product_image) }}">
                                                    <img srcset="{{ asset($product->product_image) }} 2x" />
                                                </li>
                                                @foreach (explode(',', $product->product_gallery) as $key => $image)
                                                    <li data-thumb="{{ asset($image) }}">
                                                        <img srcset="{{ asset($image) }} 2x" />
                                                    </li>
                                                @endforeach

                                                @foreach ($variants as $variant_data_image)
                                                    @if ($variant_data_image->variant_image == null)
                                                        <li
                                                            data-thumb="https://vanhoadoanhnghiepvn.vn/wp-content/uploads/2020/08/112815953-stock-vector-no-image-available-icon-flat-vector.jpg">
                                                            <img
                                                                srcset="https://vanhoadoanhnghiepvn.vn/wp-content/uploads/2020/08/112815953-stock-vector-no-image-available-icon-flat-vector.jpg 2x" />
                                                        </li>
                                                    @else
                                                        <li data-thumb="{{ asset($variant_data_image->variant_image) }}">
                                                            <img
                                                                srcset="{{ asset($variant_data_image->variant_image) }} 2x" />
                                                        </li>
                                                    @endif

                                                @endforeach

                                            </ul>
                                        </div>
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
                                                        <input class="boxed-check-input" type="radio"
                                                            name="radio_custom_{{ $item->attribute_id }}"
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
                                                    <div class="fs-sm mb-4"><span
                                                            class="text-heading fw-medium me-1">Color:</span>
                                                    </div>
                                                    @foreach (json_decode($product->colors) as $key => $value)
                                                        <label class="boxed-check">
                                                            <input class="boxed-check-input" type="radio"
                                                                name="radio_custom_color"
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
                                            <input class="input-number" type="number" name="product_quantity" value="1"
                                                min="0" max="10">
                                        </div>
                                        <div class="position-relative me-n4 mb-3 mt-3">
                                            <div class="h5 fw-normal mb-3 me-1 total_product_price"></div>
                                        </div>


                                        <div class="d-flex align-items-center pt-2 pb-4">

                                            <button class="btn btn-primary btn-shadow d-block w-100 card_add_btn"
                                                type="button"><i class="ci-cart fs-lg me-2"></i>Thêm vào giỏ hang</button>
                                        </div>
                                        <div class="d-flex mb-4">
                                            <div class="w-100 me-3">
                                                <button class="btn btn-secondary d-block w-100" type="button"><i
                                                        class="ci-heart fs-lg me-2"></i><span class='d-none d-sm-inline'>Add
                                                        to </span>Wishlist</button>
                                            </div>
                                            <div class="w-100">
                                                <button class="btn btn-secondary d-block w-100" type="button"><i
                                                        class="ci-compare fs-lg me-2"></i>Compare</button>
                                            </div>
                                        </div>
                                        <!-- Product panels-->
                                        <div class="accordion mb-4" id="productPanels">
                                            <div class="accordion-item">
                                                <h3 class="accordion-header"><a class="accordion-button"
                                                        href="#shippingOptions" role="button" data-bs-toggle="collapse"
                                                        aria-expanded="true" aria-controls="shippingOptions"><i
                                                            class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Tùy
                                                        chọn vận chuyển</a></h3>
                                                <div class="accordion-collapse collapse show" id="shippingOptions"
                                                    data-bs-parent="#productPanels">
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
                                                <h3 class="accordion-header"><a class="accordion-button collapsed"
                                                        href="#localStore" role="button" data-bs-toggle="collapse"
                                                        aria-expanded="true" aria-controls="localStore"><i
                                                            class="ci-location text-muted fs-lg align-middle mt-n1 me-2"></i>Find
                                                        in local store</a></h3>
                                                <div class="accordion-collapse collapse" id="localStore"
                                                    data-bs-parent="#productPanels">
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
                                        <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a
                                            class="btn-share btn-twitter me-2 my-2" href="#"><i
                                                class="ci-twitter"></i>Twitter</a><a
                                            class="btn-share btn-instagram me-2 my-2" href="#"><i
                                                class="ci-instagram"></i>Instagram</a><a
                                            class="btn-share btn-facebook my-2" href="#"><i
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
                                        class="ci-star-filled fs-sm text-accent me-1"></i><i
                                        class="ci-star-filled fs-sm text-accent me-1"></i><i
                                        class="ci-star-filled fs-sm text-accent me-1"></i><i
                                        class="ci-star fs-sm text-muted me-1"></i></div><span
                                    class="d-inline-block align-middle">4.1 Overall rating</span>
                                <p class="pt-3 fs-sm text-muted">58 out of 74 (77%)<br>Customers recommended this
                                    product</p>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap me-3"><span
                                            class="d-inline-block align-middle text-muted">5</span><i
                                            class="ci-star-filled fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%;"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div><span class="text-muted ms-3">43</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap me-3"><span
                                            class="d-inline-block align-middle text-muted">4</span><i
                                            class="ci-star-filled fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: 27%; background-color: #a7e453;" aria-valuenow="27"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div><span class="text-muted ms-3">16</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap me-3"><span
                                            class="d-inline-block align-middle text-muted">3</span><i
                                            class="ci-star-filled fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: 17%; background-color: #ffda75;" aria-valuenow="17"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div><span class="text-muted ms-3">9</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-nowrap me-3"><span
                                            class="d-inline-block align-middle text-muted">2</span><i
                                            class="ci-star-filled fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: 9%; background-color: #fea569;" aria-valuenow="9"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div><span class="text-muted ms-3">4</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="text-nowrap me-3"><span
                                            class="d-inline-block align-middle text-muted">1</span><i
                                            class="ci-star-filled fs-xs ms-1"></i></div>
                                    <div class="w-100">
                                        <div class="progress" style="height: 4px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 4%;"
                                                aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        <label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block"
                                            for="sort-reviews">Sort by:</label>
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
                                                src="{{ URL::to('frontend/img/shop/reviews/01.jpg') }}" width="50"
                                                alt="Rafael Marquez">
                                            <div class="ps-3">
                                                <h6 class="fs-sm mb-0">Rafael Marquez</h6><span
                                                    class="fs-ms text-muted">June 28, 2019</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="star-rating"><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star"></i>
                                            </div>
                                            <div class="fs-ms text-muted">83% of users found this review helpful</div>
                                        </div>
                                    </div>
                                    <p class="fs-md mb-2">Nam libero tempore, cum soluta nobis est eligendi optio
                                        cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis
                                        voluptas assumenda est...</p>
                                    <ul class="list-unstyled fs-ms pt-1">
                                        <li class="mb-1"><span
                                                class="fw-medium">Pros:&nbsp;</span>Consequuntur
                                            magni, voluptatem
                                            sequi, tempora</li>
                                        <li class="mb-1"><span
                                                class="fw-medium">Cons:&nbsp;</span>Architecto
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
                                    <button class="btn btn-outline-accent" type="button"><i
                                            class="ci-reload me-2"></i>Load
                                        more reviews</button>
                                </div>
                            </div>
                            <!-- Leave review form-->
                            <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
                                <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3">
                                    <h3 class="h4 pb-2">Write a review</h3>
                                    <form class="needs-validation" method="post" novalidate>
                                        <div class="mb-3">
                                            <label class="form-label" for="review-name">Your name<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" required id="review-name">
                                            <div class="invalid-feedback">Please enter your name!</div><small
                                                class="form-text text-muted">Will be displayed on the comment.</small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="review-email">Your email<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="email" required id="review-email">
                                            <div class="invalid-feedback">Please provide valid email address!</div>
                                            <small class="form-text text-muted">Authentication only - we won't spam
                                                you.</small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="review-rating">Rating<span
                                                    class="text-danger">*</span></label>
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
                                            <label class="form-label" for="review-text">Review<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="6" required id="review-text"></textarea>
                                            <div class="invalid-feedback">Please write a review!</div><small
                                                class="form-text text-muted">Your review must be at least 50
                                                characters.</small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="review-pros">Pros</label>
                                            <textarea class="form-control" rows="2" placeholder="Separated by commas"
                                                id="review-pros"></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="review-cons">Cons</label>
                                            <textarea class="form-control" rows="2" placeholder="Separated by commas"
                                                id="review-cons"></textarea>
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
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a
                                class="card-img-top d-block overflow-hidden" href="#"><img
                                    src="{{ asset($proOther->product_image) }}" alt="Product"></a>
                            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"></a>
                                <h3 class="product-title fs-sm"><a href="#">{{ trans($proOther->product_name) }}</a>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price">{{ number_format($proOther->unit_price) }}</span>
                                    </div>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star"></i>
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
    <script type="text/javascript">
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 9
        });

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
            });
        }

        $('.card_add_btn').click(function() {
            $.ajax({
                type: "POST",
                url: "{{ route('card.add') }}",
                data: $('#choice_attribute_options').serializeArray(),
                success: function(response) {
                    Swal.fire({
                        imageUrl: 'https://img.icons8.com/ultraviolet/50/000000/shopping-cart-loaded--v2.png',
                        title: 'Chúc mừng',
                        text: 'Thêm giỏ hàng thành công!',
                        confirmButtonText: 'Tiếp tục',
                        confirmButtonColor: 'green'
                    })
                }
            });
        })
    </script>
@endpush
