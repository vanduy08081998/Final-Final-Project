@extends('layouts.client_master')


@section('title', 'Thông tin giao hàng')


@section('content')
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i
                                    class="ci-home"></i>Home</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Checkout</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <section class="col-lg-8">
                <!-- Steps-->
                <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="shop-cart.html">
                        <div class="step-progress"><span class="step-count">1</span></div>
                        <div class="step-label"><i class="ci-cart"></i>Cart</div>
                    </a><a class="step-item active" href="checkout-details.html">
                        <div class="step-progress"><span class="step-count">2</span></div>
                        <div class="step-label"><i class="ci-user-circle"></i>Details</div>
                    </a><a class="step-item active current" href="checkout-shipping.html">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div class="step-label"><i class="ci-package"></i>Shipping</div>
                    </a><a class="step-item" href="checkout-payment.html">
                        <div class="step-progress"><span class="step-count">4</span></div>
                        <div class="step-label"><i class="ci-card"></i>Payment</div>
                    </a><a class="step-item" href="checkout-review.html">
                        <div class="step-progress"><span class="step-count">5</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Review</div>
                    </a></div>
                <!-- Shipping methods table-->
                <h2 class="h6 pb-3 mb-2">Choose shipping method</h2>
                <div class="table-responsive">
                    <table class="table table-hover fs-sm border-top">
                        <thead>
                            <tr>
                                <th class="align-middle"></th>
                                <th class="align-middle">Shipping method</th>
                                <th class="align-middle">Delivery time</th>
                                <th class="align-middle">Handling fee</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" id="courier" name="shipping-method"
                                            checked>
                                        <label class="form-check-label" for="courier"></label>
                                    </div>
                                </td>
                                <td class="align-middle"><span class="text-dark fw-medium">Courier</span><br><span
                                        class="text-muted">All addresses (default zone), United States &amp;
                                        Canada</span></td>
                                <td class="align-middle">2 - 4 days</td>
                                <td class="align-middle">$26.50</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" id="local" name="shipping-method">
                                        <label class="form-check-label" for="local"></label>
                                    </div>
                                </td>
                                <td class="align-middle"><span class="text-dark fw-medium">Local Shipping</span><br><span
                                        class="text-muted">All addresses (default zone), United States &amp;
                                        Canada</span></td>
                                <td class="align-middle">up to one week</td>
                                <td class="align-middle">$10.00</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" id="flat" name="shipping-method">
                                        <label class="form-check-label" for="flat"></label>
                                    </div>
                                </td>
                                <td class="align-middle"><span class="text-dark fw-medium">Flat Rate</span><br><span
                                        class="text-muted">All addresses (default zone)</span></td>
                                <td class="align-middle">5 - 7 days</td>
                                <td class="align-middle">$33.85</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" id="ups" name="shipping-method">
                                        <label class="form-check-label" for="ups"></label>
                                    </div>
                                </td>
                                <td class="align-middle"><span class="text-dark fw-medium">UPS Ground
                                        Shipping</span><br><span class="text-muted">All addresses (default zone)</span>
                                </td>
                                <td class="align-middle">4 - 6 days</td>
                                <td class="align-middle">$18.00</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" id="pickup" name="shipping-method">
                                        <label class="form-check-label" for="pickup"></label>
                                    </div>
                                </td>
                                <td class="align-middle"><span class="text-dark fw-medium">Local Pickup from
                                        store</span><br><span class="text-muted">All addresses (default zone)</span>
                                </td>
                                <td class="align-middle">&mdash;</td>
                                <td class="align-middle">$0.00</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" id="locker" name="shipping-method">
                                        <label class="form-check-label" for="locker"></label>
                                    </div>
                                </td>
                                <td class="align-middle"><span class="text-dark fw-medium">Pick Up at Cartzilla
                                        Locker</span><br><span class="text-muted">All addresses (default zone), United
                                        States &amp; Canada</span></td>
                                <td class="align-middle">&mdash;</td>
                                <td class="align-middle">$9.99</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" id="global-export"
                                            name="shipping-method">
                                        <label class="form-check-label" for="global-export"></label>
                                    </div>
                                </td>
                                <td class="align-middle"><span class="text-dark fw-medium">Cartzilla Global
                                        Export</span><br><span class="text-muted fs-sm">All addresses (default zone),
                                        outside United States</span></td>
                                <td class="align-middle">3 - 4 days</td>
                                <td class="align-middle">$25.00</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" id="same-day" name="shipping-method">
                                        <label class="form-check-label" for="same-day"></label>
                                    </div>
                                </td>
                                <td class="align-middle"><span class="text-dark fw-medium">Same-Day
                                        Delivery</span><br><span class="text-muted">Only United States</span></td>
                                <td class="align-middle">&mdash;</td>
                                <td class="align-middle">$34.00</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" id="international"
                                            name="shipping-method">
                                        <label class="form-check-label" for="international"></label>
                                    </div>
                                </td>
                                <td class="align-middle"><span class="text-dark fw-medium">International
                                        Shipping</span><br><span class="text-muted">All addresses (default zone)</span>
                                </td>
                                <td class="align-middle">up to 15 days</td>
                                <td class="align-middle">$27.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout-details.html"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                                Adresses</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100"
                            href="checkout-payment.html"><span class="d-none d-sm-inline">Proceed to Payment</span><span
                                class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a>
                    </div>
                </div>
            </section>
            <!-- Sidebar-->
            <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
                    <div class="py-2 px-xl-2">
                        <div class="widget mb-3">
                            <h2 class="widget-title text-center">Order summary</h2>
                            <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0"
                                    href="shop-single-v1.html"><img src="img/shop/cart/widget/01.jpg" width="64"
                                        alt="Product"></a>
                                <div class="ps-2">
                                    <h6 class="widget-product-title"><a href="shop-single-v1.html">Women Colorblock
                                            Sneakers</a></h6>
                                    <div class="widget-product-meta"><span
                                            class="text-accent me-2">$150.<small>00</small></span><span
                                            class="text-muted">x 1</span></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                                    href="shop-single-v1.html"><img src="img/shop/cart/widget/02.jpg" width="64"
                                        alt="Product"></a>
                                <div class="ps-2">
                                    <h6 class="widget-product-title"><a href="shop-single-v1.html">TH Jeans City
                                            Backpack</a></h6>
                                    <div class="widget-product-meta"><span
                                            class="text-accent me-2">$79.<small>50</small></span><span
                                            class="text-muted">x 1</span></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                                    href="shop-single-v1.html"><img src="img/shop/cart/widget/03.jpg" width="64"
                                        alt="Product"></a>
                                <div class="ps-2">
                                    <h6 class="widget-product-title"><a href="shop-single-v1.html">3-Color Sun Stash
                                            Hat</a></h6>
                                    <div class="widget-product-meta"><span
                                            class="text-accent me-2">$22.<small>50</small></span><span
                                            class="text-muted">x 1</span></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                                    href="shop-single-v1.html"><img src="img/shop/cart/widget/04.jpg" width="64"
                                        alt="Product"></a>
                                <div class="ps-2">
                                    <h6 class="widget-product-title"><a href="shop-single-v1.html">Cotton Polo Regular
                                            Fit</a></h6>
                                    <div class="widget-product-meta"><span
                                            class="text-accent me-2">$9.<small>00</small></span><span
                                            class="text-muted">x 1</span></div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled fs-sm pb-2 border-bottom">
                            <li class="d-flex justify-content-between align-items-center"><span
                                    class="me-2">Subtotal:</span><span
                                    class="text-end">$265.<small>00</small></span></li>
                            <li class="d-flex justify-content-between align-items-center"><span
                                    class="me-2">Shipping:</span><span class="text-end">—</span></li>
                            <li class="d-flex justify-content-between align-items-center"><span
                                    class="me-2">Taxes:</span><span
                                    class="text-end">$9.<small>50</small></span></li>
                            <li class="d-flex justify-content-between align-items-center"><span
                                    class="me-2">Discount:</span><span class="text-end">—</span></li>
                        </ul>
                        <h3 class="fw-normal text-center my-4">$274.<small>50</small></h3>
                        <form class="needs-validation" method="post" novalidate>
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Promo code" required>
                                <div class="invalid-feedback">Please provide promo code.</div>
                            </div>
                            <button class="btn btn-outline-primary d-block w-100" type="submit">Apply promo code</button>
                        </form>
                    </div>
                </div>
            </aside>
        </div>
        <!-- Navigation (mobile)-->
        <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout-details.html"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                                Adresses</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100"
                            href="checkout-payment.html"><span class="d-none d-sm-inline">Proceed to Payment</span><span
                                class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
