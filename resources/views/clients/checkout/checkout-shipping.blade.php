@extends('layouts.client_master')


@section('title', 'Thông tin giao hàng')


@section('content')
<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a>
                    </li>
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
        <form id="shipping_methods" method="POST">
            @csrf
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
                            @foreach ($shipping_methods as $shipping)
                            <tr>
                                <td>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" id="courier"
                                            value="{{ $shipping->id }}" name="shipping_method" checked>
                                        <label class="form-check-label" for="courier"></label>
                                    </div>
                                </td>
                                <td class="align-middle"><span class="text-dark fw-medium">{{ $shipping->shipping_method
                                        }}</span><br><span class="text-muted">All addresses (default zone), United
                                        States
                                        &amp;
                                        Canada</span></td>
                                <td class="align-middle">{{ $shipping->delivery_time_from }} - {{
                                    $shipping->delivery_time_from }} Ngày</td>
                                <td class="align-middle">{{ $shipping->handing_fee }}</td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout-details.html"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                                Adresses</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100"><button
                                class="d-none d-sm-inline">Proceed to Payment</button><span
                                class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <!-- Navigation (mobile)-->
    <div class="row d-lg-none">
        <div class="col-lg-8">
            <div class="d-flex pt-4 mt-3">
                <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout-details.html"><i
                            class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                            Adresses</span><span class="d-inline d-sm-none">Back</span></a></div>
                <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100"><span class="d-none d-sm-inline">Proceed
                            to Payment</span><span class="d-inline d-sm-none">Next</span><i
                            class="ci-arrow-right mt-sm-0 ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $('#shipping_methods').on('submit', function (event) {
        event.preventDefault() 
        $.ajax({
        type: "POST",
        url: route('checkout.shipping-method'),
        data: $(this).serializeArray(),
        success: function (response) {
            window.location.href="{{ route('checkout.checkout-payment') }}"
        }
        });
    })
</script>
@endpush