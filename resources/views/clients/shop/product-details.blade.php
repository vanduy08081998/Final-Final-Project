@extends('layouts.client_master')


@section('title', $product->product_name)

@section('meta')
    <meta name="description" content="{!! $product->meta_description !!}">
    <meta name="keywords" content="{!! $product->meta_keywords !!}">
    <meta name="author" content="{!! $product->meta_title !!}">
@endsection

@section('content')
    <!-- Size chart modal-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i
                                    class="ci-home"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Cửa hàng</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Chi tiết sản phẩm</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-2">{{ $product->product_name }}</h1>
                <div>
                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                            class="star-rating-icon ci-star-filled active"></i><i
                            class="star-rating-icon ci-star-filled active"></i><i
                            class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                    </div><span class="d-inline-block fs-sm text-white opacity-70 align-middle mt-1 ms-1">74 Đánh giá</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="bg-light shadow-lg rounded-3">
            <!-- Tabs-->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link py-4 px-sm-4 active" href="#general" data-bs-toggle="tab"
                        role="tab"><span class='d-none d-sm-inline'>Thông tin</span></a></li>
                <li class="nav-item"><a class="nav-link py-4 px-sm-4" href="#specs" data-bs-toggle="tab"
                        role="tab"><span class='d-none d-sm-inline'>Thông số kỹ thuật</span></a></li>
                <li class="nav-item"><a class="nav-link py-4 px-sm-4" href="#reviews" data-bs-toggle="tab"
                        role="tab">Đánh giá <span class="fs-sm opacity-60">(74)</span></a></li>
            </ul>
            <div class="px-4 pt-lg-3 pb-3 mb-5">
                <div class="tab-content px-lg-3">
                    <!-- General info tab-->

                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <form id="choice_attribute_options" onchange="getVariantPrice()">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <!-- Product gallery -->
                                <div class="col-lg-7 pe-lg-0">
                                    <div class="product-gallery">
                                        <div class="product-gallery-preview order-sm-2">
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
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product details-->
                                <div class="col-lg-5 pt-4 pt-lg-0">
                                    <div class="product-details pb-3">
                                        <div class="h4 fw-normal mb-3 me-1"> <small>Giá gốc: </small>
                                            {{ number_format($product->unit_price) }}</div>

                                        @foreach (json_decode($product->choice_options) as $item)
                                            <div class="fs-sm mb-2"><span
                                                    class="text-heading fw-medium me-1">{{ \App\Models\Attribute::where('id', $item->attribute_id)->first()->name }}:
                                            </div>
                                            <div class="boxed-check-group boxed-check-success boxed-check-sm">
                                                @foreach ($item->values as $key => $value)
                                                    <label class="boxed-check">
                                                        <input class="boxed-check-input" type="radio"
                                                            name="radio_custom_{{ $item->attribute_id }}"
                                                            value="{{ $value }}" checked>
                                                        <div class="boxed-check-label" style="text-align:center;">
                                                            <span>{{ $value }}</span>
                                                        </div>
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endforeach

                                        <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Color:</span>
                                        </div>


                                        <div class="position-relative me-n4 mb-3">
                                            <!-- Product color -->

                                            <div class="form-check form-option form-check-inline mb-2">

                                                <div class="boxed-check-group boxed-check-sm">
                                                    @foreach (json_decode($product->colors) as $key => $value)
                                                        <label class="boxed-check">
                                                            <input class="boxed-check-input" type="radio"
                                                                name="radio_custom_color"
                                                                value="{{ \App\Models\Color::where('color_code', $value)->first()->color_slug }}"
                                                                checked>
                                                            <div class="boxed-check-label"
                                                                style="text-align:center; background: {{ $value }}; width: 25px; height: 25px; ">
                                                                <span></span>
                                                            </div>
                                                        </label>
                                                    @endforeach
                                                </div>

                                            </div>
                                            <!-- End Product Color -->
                                            <div class="d-flex">
                                                <span>Số lượng : &nbsp;</span>
                                                <input class="input-number"
                                                type="number" name="product_quantity" value="1" min="0" max="10">
                                            </div>
                                            <div class="position-relative me-n4 mb-3 mt-3">
                                                <div class="h5 fw-normal mb-3 me-1 total_product_price"></div>
                                            </div>
                                            <div id="product_badge">

                                            </div>
                                        </div>
                                        <div class="align-items-center pt-2 pb-4">

                                            

                                            <button class="btn btn-primary btn-shadow d-block w-100 mt-3" type="button"><i
                                                    class="ci-cart fs-lg me-2"></i>Thêm vào giỏ hàng</button>
                                        </div>


                                        <div class="d-flex mb-4">
                                            <div class="w-100 me-3">
                                                <button class="btn btn-secondary d-block w-100" type="button"><i
                                                        class="ci-heart fs-lg me-2"></i><span
                                                        class='d-none d-sm-inline'>Thêm vào yêu thích</span></button>
                                            </div>
                                            <div class="w-100">
                                                <button class="btn btn-secondary d-block w-100" type="button"><i
                                                        class="ci-compare fs-lg me-2"></i>So sánh</button>
                                            </div>
                                        </div>

                                        <!-- Product panels-->
                                        <div class="accordion mb-4" id="productPanels">
                                            <div class="accordion-item">
                                                <h3 class="accordion-header"><a class="accordion-button"
                                                        href="#shippingOptions" role="button" data-bs-toggle="collapse"
                                                        aria-expanded="true" aria-controls="shippingOptions"><i
                                                            class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Giao
                                                        hàng</a>
                                                </h3>
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
                                                            class="ci-location text-muted fs-lg align-middle mt-n1 me-2"></i>Tìm
                                                        cửa hàng gần bạn</a></h3>
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
                                        <label class="form-label d-inline-block align-middle my-2 me-3">Chia sẻ:</label><a
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
                        <!-- Specs table-->
                        <div class="row pt-2">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body" id="specifications">
                                        

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>



                    <!-- Reviews tab-->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="d-md-flex justify-content-between align-items-start pb-4 mb-4 border-bottom">
                            <div class="d-flex align-items-center me-md-3"><img
                                    src="{{ asset('frontend/img/shop/single/gallery/th05.jpg') }}" width="90"
                                    alt="Product thumb">
                                <div class="ps-3">
                                    <h6 class="fs-base mb-2">Smartwatch Youth Edition</h6>
                                    <div class="h4 fw-normal text-accent">$124.<small>99</small></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <select class="form-select" required id="product-size" style="margin-right: 10px">
                                    <option value="">Chọn thông số</option>
                                    <option value="xs">XS</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                </select>
                                <select class="form-select me-2" style="width: 5rem;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <button class="btn btn-primary btn-shadow me-2" type="button"><i
                                        class="ci-cart fs-lg me-sm-2"></i><span class="d-none d-sm-inline">Thêm vào giỏ
                                        hàng</span></button>
                                <div class="me-2">
                                    <button class="btn btn-secondary btn-icon" type="button" data-bs-toggle="tooltip"
                                        title="Thêm vào yêu thích"><i class="ci-heart fs-lg"></i></button>
                                </div>
                                <div>
                                    <button class="btn btn-secondary btn-icon" type="button" data-bs-toggle="tooltip"
                                        title="So sánh"><i class="ci-compare fs-lg"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Reviews-->
                        <div class="row pt-2 pb-3">
                            <div class="col-lg-4 col-md-5">
                                <h2 class="h3 mb-4">74 Đánh giá</h2>
                                <div class="star-rating me-2"><i class="ci-star-filled fs-sm text-accent me-1"></i><i
                                        class="ci-star-filled fs-sm text-accent me-1"></i><i
                                        class="ci-star-filled fs-sm text-accent me-1"></i><i
                                        class="ci-star-filled fs-sm text-accent me-1"></i><i
                                        class="ci-star fs-sm text-muted me-1"></i></div>
                                <span class="d-inline-block align-middle">4.1</span>
                                <p class="pt-3 fs-sm text-muted">58 trên 74 (77%)<br>Khánh hàng đã mua và đánh giá.</p>
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
                                                src="img/shop/reviews/01.jpg" width="50" alt="Rafael Marquez">
                                            <div class="ps-3">
                                                <h6 class="fs-sm mb-0">Rafael Marquez</h6><span
                                                    class="fs-ms text-muted">June 28,
                                                    2019</span>
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
                                        cumque nihil impedit quo
                                        minus id quod maxime placeat facere possimus, omnis voluptas assumenda est...</p>
                                    <ul class="list-unstyled fs-ms pt-1">
                                        <li class="mb-1"><span
                                                class="fw-medium">Pros:&nbsp;</span>Consequuntur magni,
                                            voluptatem sequi, tempora</li>
                                        <li class="mb-1"><span
                                                class="fw-medium">Cons:&nbsp;</span>Architecto beatae, quis
                                            autem</li>
                                    </ul>
                                    <div class="text-nowrap">
                                        <button class="btn-like" type="button">15</button>
                                        <button class="btn-dislike" type="button">3</button>
                                    </div>
                                </div>
                                <!-- Review-->
                                <div class="product-review pb-4 mb-4 border-bottom">
                                    <div class="d-flex mb-3">
                                        <div class="d-flex align-items-center me-4 pe-2"><img class="rounded-circle"
                                                src="img/shop/reviews/02.jpg" width="50" alt="Barbara Palson">
                                            <div class="ps-3">
                                                <h6 class="fs-sm mb-0">Barbara Palson</h6><span
                                                    class="fs-ms text-muted">May 17,
                                                    2019</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="star-rating"><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i>
                                            </div>
                                            <div class="fs-ms text-muted">99% of users found this review helpful</div>
                                        </div>
                                    </div>
                                    <p class="fs-md mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                        do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco
                                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <ul class="list-unstyled fs-ms pt-1">
                                        <li class="mb-1"><span
                                                class="fw-medium">Pros:&nbsp;</span>Consequuntur magni,
                                            voluptatem sequi, tempora</li>
                                        <li class="mb-1"><span
                                                class="fw-medium">Cons:&nbsp;</span>Architecto beatae, quis
                                            autem</li>
                                    </ul>
                                    <div class="text-nowrap">
                                        <button class="btn-like" type="button">34</button>
                                        <button class="btn-dislike" type="button">1</button>
                                    </div>
                                </div>
                                <!-- Review-->
                                <div class="product-review pb-4 mb-4 border-bottom">
                                    <div class="d-flex mb-3">
                                        <div class="d-flex align-items-center me-4 pe-2"><img class="rounded-circle"
                                                src="img/shop/reviews/03.jpg" width="50" alt="Daniel Adams">
                                            <div class="ps-3">
                                                <h6 class="fs-sm mb-0">Daniel Adams</h6><span
                                                    class="fs-ms text-muted">May 8, 2019</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="star-rating"><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star"></i><i
                                                    class="star-rating-icon ci-star"></i>
                                            </div>
                                            <div class="fs-ms text-muted">75% of users found this review helpful</div>
                                        </div>
                                    </div>
                                    <p class="fs-md mb-2">Sed ut perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                        veritatis et quasi
                                        architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem.</p>
                                    <ul class="list-unstyled fs-ms pt-1">
                                        <li class="mb-1"><span
                                                class="fw-medium">Pros:&nbsp;</span>Consequuntur magni,
                                            voluptatem sequi</li>
                                        <li class="mb-1"><span
                                                class="fw-medium">Cons:&nbsp;</span>Architecto beatae, quis
                                            autem, voluptatem sequ</li>
                                    </ul>
                                    <div class="text-nowrap">
                                        <button class="btn-like" type="button">26</button>
                                        <button class="btn-dislike" type="button">9</button>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-outline-accent" type="button"><i class="ci-reload me-2"></i>Xem
                                        thêm...</button>
                                </div>
                            </div>
                            <!-- Leave review form-->
                            <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
                                <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3">
                                    <h3 class="h4 pb-2">Viết bình luận của bạn</h3>
                                    <form class="needs-validation" method="post" novalidate>
                                        <div class="mb-3">
                                            <label class="form-label" for="review-rating">Rating<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" required id="review-rating">
                                                <option value="">Chọn đánh giá</option>
                                                <option value="5">5 sao</option>
                                                <option value="4">4 sao</option>
                                                <option value="3">3 sao</option>
                                                <option value="2">2 sao</option>
                                                <option value="1">1 sao</option>
                                            </select>
                                            <div class="invalid-feedback">Vui lòng chọn đánh giá!</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="review-text">Đánh giá<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="6" required id="review-text"></textarea>
                                            <div class="invalid-feedback">Vui lòng viết đánh giá của bạn!</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="review-pros">Ưu điểm</label>
                                            <textarea class="form-control" rows="2" placeholder="Separated by commas"
                                                id="review-pros"></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="review-cons">Nhược điểm</label>
                                            <textarea class="form-control" rows="2" placeholder="Separated by commas"
                                                id="review-cons"></textarea>
                                        </div>
                                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Gửi đánh
                                            giá</button>
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
        <h2 class="h3 text-center pb-4">Sản phẩm tương tự</h2>
        <div class="tns-carousel tns-controls-static tns-controls-outside">
            <div class="tns-carousel-inner"
                data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
                <!-- Product-->
                <div>
                    <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Add to wishlist"><i class="ci-heart"></i></button><a
                            class="card-img-top d-block overflow-hidden" href="#"><img
                                src="{{ asset('frontend/img/shop/catalog/66.jpg') }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Smartwatches</a>
                            <h3 class="product-title fs-sm"><a href="#">Health &amp; Fitness Smartwatch</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$250.<small>00</small></span>
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
                <div>
                    <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Add to wishlist"><i class="ci-heart"></i></button><a
                            class="card-img-top d-block overflow-hidden" href="#"><img
                                src="{{ asset('frontend/img/shop/catalog/67.jpg') }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Smartwatches</a>
                            <h3 class="product-title fs-sm"><a href="#">Heart Rate &amp; Activity Tracker</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price text-accent">$26.<small>99</small></div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-half active"></i><i
                                        class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product-->
                <div>
                    <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Add to wishlist"><i class="ci-heart"></i></button><a
                            class="card-img-top d-block overflow-hidden" href="#"><img
                                src="{{ asset('frontend/img/shop/catalog/64.jpg') }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Smartwatches</a>
                            <h3 class="product-title fs-sm"><a href="#">Smart Watch Series 5, Aluminium</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price text-accent">$349.<small>99</small></div>
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
                <div>
                    <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Add to wishlist"><i class="ci-heart"></i></button><a
                            class="card-img-top d-block overflow-hidden" href="#"><img
                                src="{{ asset('frontend/img/shop/catalog/68.jpg') }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Smartwatches</a>
                            <h3 class="product-title fs-sm"><a href="#">Health &amp; Fitness Smartwatch</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price text-accent">$118.<small>00</small></div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product-->
                <div>
                    <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Add to wishlist"><i class="ci-heart"></i></button><a
                            class="card-img-top d-block overflow-hidden" href="#"><img
                                src="{{ asset('frontend/img/shop/catalog/69.jpg') }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Smartwatches</a>
                            <h3 class="product-title fs-sm"><a href="#">Heart Rate &amp; Activity Tracker</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price text-accent">$25.<small>00</small></div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-half active"></i><i
                                        class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product bundles carousel (Cheaper together)-->
    <div class="container pt-lg-1 pb-5 mb-md-3">
        <div class="card card-body pt-5">
            <h2 class="h3 text-center pb-4">Combo giảm giá</h2>
            <div class="tns-carousel">
                <div class="tns-carousel-inner"
                    data-carousel-options="{&quot;items&quot;: 1, &quot;controls&quot;: false, &quot;nav&quot;: true}">
                    <div>
                        <div class="row align-items-center">
                            <div class="col-md-3 col-sm-5">
                                <div class="card product-card card-static text-center mx-auto" style="max-width: 20rem;"><a
                                        class="card-img-top d-block overflow-hidden" href="#"><img
                                            src="{{ asset('frontend/img/shop/catalog/70.jpg') }}" alt="Product"></a>
                                    <div class="card-body py-2"><span
                                            class="d-inline-block bg-secondary fs-ms rounded-1 py-1 px-2 mb-3">Your
                                            product</span>
                                        <h3 class="product-title fs-sm"><a href="#">Smartwatch Youth Edition</a></h3>
                                        <div class="product-price text-accent">$124.<small>99</small></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-2 text-center">
                                <div class="display-4 fw-light text-muted px-4">+</div>
                            </div>
                            <div class="col-md-3 col-sm-5">
                                <div class="card product-card card-static text-center mx-auto" style="max-width: 20rem;"><a
                                        class="card-img-top d-block overflow-hidden" href="#"><img
                                            src="{{ asset('frontend/img/shop/catalog/72.jpg') }}" alt="Product"></a>
                                    <div class="card-body py-2"><span
                                            class="d-inline-block bg-danger fs-ms text-white rounded-1 py-1 px-2 mb-3">-20%</span>
                                        <h3 class="product-title fs-sm"><a href="#">Smartwatch Wireless Charger</a></h3>
                                        <div class="product-price"><span
                                                class="text-accent">$16.<small>00</small></span>
                                            <del class="fs-sm text-muted">$20.<small>00</small></del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-md-block col-md-1 text-center">
                                <div class="display-4 fw-light text-muted px-4">=</div>
                            </div>
                            <div class="col-md-4 pt-3 pt-md-0">
                                <div class="bg-secondary p-4 rounded-3 text-center mx-auto" style="max-width: 20rem;">
                                    <div class="h3 fw-normal text-accent mb-3 me-1">$140.<small>99</small></div>
                                    <button class="btn btn-primary" type="button">Purchase together</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row align-items-center">
                            <div class="col-md-3 col-sm-5">
                                <div class="card product-card card-static text-center mx-auto" style="max-width: 20rem;"><a
                                        class="card-img-top d-block overflow-hidden" href="#"><img
                                            src="{{ asset('frontend/img/shop/catalog/70.jpg') }}" alt="Product"></a>
                                    <div class="card-body py-2"><span
                                            class="d-inline-block bg-secondary fs-ms rounded-1 py-1 px-2 mb-3">Your
                                            product</span>
                                        <h3 class="product-title fs-sm"><a href="#">Smartwatch Youth Edition</a></h3>
                                        <div class="product-price text-accent">$124.<small>99</small></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-2 text-center">
                                <div class="display-4 fw-light text-muted px-4">+</div>
                            </div>
                            <div class="col-md-3 col-sm-5">
                                <div class="card product-card card-static text-center mx-auto" style="max-width: 20rem;"><a
                                        class="card-img-top d-block overflow-hidden" href="#"><img
                                            src="{{ asset('frontend/img/shop/catalog/71.jpg') }}" alt="Product"></a>
                                    <div class="card-body py-2"><span
                                            class="d-inline-block bg-danger fs-ms text-white rounded-1 py-1 px-2 mb-3">-15%</span>
                                        <h3 class="product-title fs-sm"><a href="#">Bluetooth Headset Air (White)</a></h3>
                                        <div class="product-price"><span
                                                class="text-accent">$59.<small>00</small></span>
                                            <del class="fs-sm text-muted">$69.<small>00</small></del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-md-block col-md-1 text-center">
                                <div class="display-4 fw-light text-muted px-4">=</div>
                            </div>
                            <div class="col-md-4 pt-3 pt-md-0">
                                <div class="bg-secondary p-4 rounded-3 text-center mx-auto" style="max-width: 20rem;">
                                    <div class="h3 fw-normal text-accent mb-3 me-1">$183.<small>99</small></div>
                                    <button class="btn btn-primary" type="button">Purchase together</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script type="text/javascript">
        (function() {

            window.inputNumber = function(el) {

                var min = el.attr('min') || false;
                var max = el.attr('max') || false;

                var els = {};

                els.dec = el.prev();
                els.inc = el.next();

                el.each(function() {
                    init($(this));
                });

                function init(el) {

                    els.dec.on('click', decrement);
                    els.inc.on('click', increment);

                    function decrement() {
                        var value = el[0].value;
                        value--;
                        if (!min || value >= min) {
                            el[0].value = value;
                        }
                    }

                    function increment() {
                        var value = el[0].value;
                        value++;
                        if (!max || value <= max) {
                            el[0].value = value++;
                        }
                    }
                }
            }
        })();

        inputNumber($('.input-number'));
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 9
        });

        $(window).on('load', () => {
            getVariantPrice()
        })

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



                    if (response.variant_quantity > 0) {
                        $('#product_badge').html(` <div class="product-badge product-available mt-n1 bg-green"><i
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
    </script>
@endpush
