@extends('layouts.client_master')


@section('title', 'Danh sách sản phẩm')


@section('content')
    <!-- Quick View Modal-->
    {{-- <div class="modal-quick-view modal fade" id="quick-view" tabindex="-1">
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
                                            src="img/shop/single/gallery/01.jpg" data-zoom="img/shop/single/gallery/01.jpg"
                                            alt="Product image">
                                        <div class="image-zoom-pane"></div>
                                    </div>
                                    <div class="product-gallery-preview-item" id="second"><img class="image-zoom"
                                            src="img/shop/single/gallery/02.jpg" data-zoom="img/shop/single/gallery/02.jpg"
                                            alt="Product image">
                                        <div class="image-zoom-pane"></div>
                                    </div>
                                    <div class="product-gallery-preview-item" id="third"><img class="image-zoom"
                                            src="img/shop/single/gallery/03.jpg" data-zoom="img/shop/single/gallery/03.jpg"
                                            alt="Product image">
                                        <div class="image-zoom-pane"></div>
                                    </div>
                                    <div class="product-gallery-preview-item" id="fourth"><img class="image-zoom"
                                            src="img/shop/single/gallery/04.jpg" data-zoom="img/shop/single/gallery/04.jpg"
                                            alt="Product image">
                                        <div class="image-zoom-pane"></div>
                                    </div>
                                </div>
                                <div class="product-gallery-thumblist order-sm-1"><a
                                        class="product-gallery-thumblist-item active" href="#first"><img
                                            src="img/shop/single/gallery/th01.jpg" alt="Product thumb"></a><a
                                        class="product-gallery-thumblist-item" href="#second"><img
                                            src="img/shop/single/gallery/th02.jpg" alt="Product thumb"></a><a
                                        class="product-gallery-thumblist-item" href="#third"><img
                                            src="img/shop/single/gallery/th03.jpg" alt="Product thumb"></a><a
                                        class="product-gallery-thumblist-item" href="#fourth"><img
                                            src="img/shop/single/gallery/th04.jpg" alt="Product thumb"></a></div>
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
                                        title="Add to wishlist"><i class="ci-heart"></i></button>
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
                                                style="background-image: url(img/shop/single/color-opt-1.png)"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color" id="color2"
                                            data-bs-label="colorOptionText" value="Beige/White/Black">
                                        <label class="form-option-label rounded-circle" for="color2"><span
                                                class="form-option-color rounded-circle"
                                                style="background-image: url(img/shop/single/color-opt-2.png)"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color" id="color3"
                                            data-bs-label="colorOptionText" value="Dark grey/White/Mustard">
                                        <label class="form-option-label rounded-circle" for="color3"><span
                                                class="form-option-color rounded-circle"
                                                style="background-image: url(img/shop/single/color-opt-3.png)"></span></label>
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
                                                class="ci-cart fs-lg me-2"></i>Add to Cart</button>
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
    </div> --}}
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
                <h1 class="h3 text-light mb-0">Cửa hàng</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-3">
                <!-- Sidebar-->
                @include('clients.shop.navbar-shop')
            </aside>
            <!-- Content  -->
            <section class="col-lg-9 tab-content-shop" style="padding-right: 50px">
                <!-- Toolbar-->
                <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
                    <div class="d-flex flex-wrap">
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
                            </select><span class="fs-sm text-light opacity-75 text-nowrap ms-2 d-none d-md-block">của 287
                                sản phẩm</span>
                        </div>
                    </div>
                    <div class="d-none d-sm-flex pb-3">
                        <a class="btn btn-icon nav-link-style me-2 nav-link-light"
                            href="{{ route('shop.shop-grid') }}"><i class="ci-view-grid"></i></a>
                        <a class="btn btn-icon nav-link-style bg-light text-dark disabled opacity-100"
                            href="{{ route('shop.shop-list') }}"><i class="ci-view-list"></i></a>
                    </div>
                </div>
                <!-- Products list-->
                <!-- Product-->
                <div class="card product-card product-list">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to wishlist"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"><a class="product-list-thumb"
                            href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/01.jpg') }}"
                                alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Sneakers &amp;
                                Keds</a>
                            <h3 class="product-title fs-base"><a href="shop-single-v1.html">Women Colorblock Sneakers</a>
                            </h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$154.<small>00</small></span>
                                </div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size1" id="s-75">
                                        <label class="form-option-label" for="s-75">7.5</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size1" id="s-80" checked>
                                        <label class="form-option-label" for="s-80">8</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size1" id="s-85">
                                        <label class="form-option-label" for="s-85">8.5</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size1" id="s-90">
                                        <label class="form-option-label" for="s-90">9</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                                <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top pt-3 mt-3"></div>
                <!-- Product-->
                <div class="card product-card product-list"><span class="badge bg-danger badge-shadow">Sale</span>
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to wishlist"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"><a class="product-list-thumb"
                            href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/02.jpg') }}"
                                alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Women’s
                                T-shirt</a>
                            <h3 class="product-title fs-base"><a href="shop-single-v1.html">Cotton Lace Blouse</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$28.<small>50</small></span>
                                    <del class="fs-sm text-muted">38.<small>50</small></del>
                                </div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-half active"></i><i
                                        class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color1" id="white" checked>
                                        <label class="form-option-label rounded-circle" for="white"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #eaeaeb;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color1" id="blue">
                                        <label class="form-option-label rounded-circle" for="blue"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #d1dceb;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color1" id="yellow">
                                        <label class="form-option-label rounded-circle" for="yellow"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #f4e6a2;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color1" id="pink">
                                        <label class="form-option-label rounded-circle" for="pink"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #f3dcff;"></span></label>
                                    </div>
                                </div>
                                <div class="d-flex mb-2">
                                    <select class="form-select form-select-sm me-2" style="max-width: 6rem;">
                                        <option>XS</option>
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                    </select>
                                    <button class="btn btn-primary btn-sm" type="button"><i
                                            class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                                </div>
                                <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top pt-3 mt-3"></div>
                <!-- Product-->
                <div class="card product-card product-list">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to wishlist"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"><a class="product-list-thumb"
                            href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/03.jpg') }}"
                                alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Women’s Shorts</a>
                            <h3 class="product-title fs-base"><a href="shop-single-v1.html">Mom High Waist Shorts</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$39.<small>50</small></span>
                                </div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size2" id="xs">
                                        <label class="form-option-label" for="xs">XS</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size2" id="s" checked>
                                        <label class="form-option-label" for="s">S</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size2" id="m">
                                        <label class="form-option-label" for="m">M</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size2" id="l">
                                        <label class="form-option-label" for="l">L</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                                <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top pt-3 mt-3"></div>
                <!-- Product-->
                <div class="card product-card product-list">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to wishlist"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"><a class="product-list-thumb"
                            href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/04.jpg') }}"
                                alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Sportswear</a>
                            <h3 class="product-title fs-base"><a href="shop-single-v1.html">Women Sports Jacket</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$68.<small>40</small></span>
                                </div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size3" id="xs2" checked>
                                        <label class="form-option-label" for="xs2">XS</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size3" id="s2">
                                        <label class="form-option-label" for="s2">S</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size3" id="m2">
                                        <label class="form-option-label" for="m2">M</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size3" id="l2">
                                        <label class="form-option-label" for="l2">L</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                                <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top pt-3 mt-3"></div>
                <!-- Product-->
                <div class="card product-card product-list">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to wishlist"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"> <a class="product-list-thumb"
                            href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/05.jpg') }}"
                                alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                                Sunglasses</a>
                            <h3 class="product-title fs-base"><a href="shop-single-v1.html">Polarized Sunglasses</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-muted fs-sm">Out of stock</span></div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-half active"></i><i
                                        class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden"><a class="btn btn-secondary btn-sm mb-2"
                                    href="shop-single-v1.html">View details</a>
                                <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top pt-3 mt-3"></div>
                <!-- Product-->
                <div class="card product-card product-list">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to wishlist"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"><a class="product-list-thumb"
                            href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/06.jpg') }}"
                                alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Backpacks</a>
                            <h3 class="product-title fs-base"><a href="shop-single-v1.html">TH Jeans City Backpack</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$79.<small>50</small></span>
                                </div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color2" id="khaki" checked>
                                        <label class="form-option-label rounded-circle" for="khaki"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #97947c;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color2" id="jeans">
                                        <label class="form-option-label rounded-circle" for="jeans"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #99a8be;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color2" id="white2">
                                        <label class="form-option-label rounded-circle" for="white2"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #eaeaeb;"></span></label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                                <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Banner-->
                <div
                    class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden my-4 rounded-3">
                    <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                        <h4 class="fs-lg fw-light mb-2">Converse All Star</h4>
                        <h3 class="mb-4">Make Your Day Comfortable</h3><a
                            class="btn btn-primary btn-shadow btn-sm" href="#">Shop Now</a>
                    </div><img class="d-block ms-auto" src="{{ asset('frontend/img/shop/catalog/banner') }}.jpg"
                        alt="Shop Converse">
                </div>
                <!-- Product-->
                <div class="card product-card product-list">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to wishlist"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"><a class="product-list-thumb"
                            href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/07.jpg') }}"
                                alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Women's
                                Swimwear</a>
                            <h3 class="product-title fs-base"><a href="shop-single-v1.html">Two-Piece Bikini in Print</a>
                            </h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$18.<small>99</small></span>
                                </div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size4" id="xs3" checked>
                                        <label class="form-option-label" for="xs3">XS</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size4" id="s3">
                                        <label class="form-option-label" for="s3">S</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size4" id="m3">
                                        <label class="form-option-label" for="m3">M</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                                <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top pt-3 mt-3"></div>
                <!-- Product-->
                <div class="card product-card product-list">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to wishlist"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"><a class="product-list-thumb"
                            href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/08.jpg') }}"
                                alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Kid's Toys</a>
                            <h3 class="product-title fs-base"><a href="shop-single-v1.html">Soft Panda Teddy Bear</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$14.<small>99</small></span>
                                </div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <button class="btn btn-primary btn-sm mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                                <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top pt-3 mt-3"></div>
                <!-- Product-->
                <div class="card product-card product-list">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to wishlist"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"><a class="product-list-thumb"
                            href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/09.jpg') }}"
                                alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Cosmetics</a>
                            <h3 class="product-title fs-base"><a href="shop-single-v1.html">Metallic Lipstick (Crimson)</a>
                            </h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$12.<small>99</small></span>
                                </div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color3" id="crimson" checked>
                                        <label class="form-option-label rounded-circle" for="crimson"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #bd3c82;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color3" id="creamy">
                                        <label class="form-option-label rounded-circle" for="creamy"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #ebae81;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color3" id="palm">
                                        <label class="form-option-label rounded-circle" for="palm"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #ca8799;"></span></label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                                <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top pt-3 mt-3"></div>
                <!-- Product-->
                <div class="card product-card product-list">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to wishlist"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"><a class="product-list-thumb"
                            href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/10.jpg') }}"
                                alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                                Accessories</a>
                            <h3 class="product-title fs-base"><a href="shop-single-v1.html">5-Pack Multicolor
                                    Bracelets</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$7.<small>99</small></span>
                                </div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <button class="btn btn-primary btn-sm mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                                <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top pt-3 mt-3"></div>
                <!-- Product-->
                <div class="card product-card product-list">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to wishlist"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"><a class="product-list-thumb"
                            href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/11.jpg') }}"
                                alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s
                                Sandals</a>
                            <h3 class="product-title fs-base"><a href="shop-single-v1.html">Soft Footbed Sandals</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$99.<small>50</small></span>
                                </div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color4" id="blue2" checked>
                                        <label class="form-option-label rounded-circle" for="blue2"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #879fb3;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color4" id="brown">
                                        <label class="form-option-label rounded-circle" for="brown"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #9c6d4a;"></span></label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="color4" id="black">
                                        <label class="form-option-label rounded-circle" for="black"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #333333;"></span></label>
                                    </div>
                                </div>
                                <div class="d-flex mb-2">
                                    <select class="form-select form-select-sm me-2" style="max-width: 6rem;">
                                        <option>9.5</option>
                                        <option>10</option>
                                        <option>10.5</option>
                                        <option>11</option>
                                        <option>11.5</option>
                                    </select>
                                    <button class="btn btn-primary btn-sm" type="button"><i
                                            class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                                </div>
                                <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top pt-3 mt-3"></div>
                <!-- Product-->
                <div class="card product-card product-list">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Add to wishlist"><i class="ci-heart"></i></button>
                    <div class="d-sm-flex align-items-center"><a class="product-list-thumb"
                            href="shop-single-v1.html"><img src="{{ asset('frontend/img/shop/catalog/12.jpg') }}"
                                alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Men’s Hats</a>
                            <h3 class="product-title fs-base"><a href="shop-single-v1.html">3-Color Sun Stash Hat</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price"><span class="text-accent">$25.<small>99</small></span>
                                </div>
                                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                <div class="pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size5" id="s4" checked>
                                        <label class="form-option-label" for="s4">S</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size5" id="m4">
                                        <label class="form-option-label" for="m4">M</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size5" id="l4">
                                        <label class="form-option-label" for="l4">L</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm mb-2" type="button"><i
                                        class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                                <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view"
                                        data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top pt-3 mt-3"></div>
                <!-- Pagination-->
                <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i
                                    class="ci-arrow-left me-2"></i>Prev</a></li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                        <li class="page-item active d-none d-sm-block" aria-current="page"><span
                                class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i
                                    class="ci-arrow-right ms-2"></i></a></li>
                    </ul>
                </nav>
            </section>
        </div>
    </div>
@endsection
