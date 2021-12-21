@extends('layouts.client_master')


@section('title', 'Thông tin thanh toán')


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
                    </a><a class="step-item active" href="checkout-shipping.html">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div class="step-label"><i class="ci-package"></i>Shipping</div>
                    </a><a class="step-item active current" href="checkout-payment.html">
                        <div class="step-progress"><span class="step-count">4</span></div>
                        <div class="step-label"><i class="ci-card"></i>Payment</div>
                    </a><a class="step-item" href="checkout-review.html">
                        <div class="step-progress"><span class="step-count">5</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Review</div>
                    </a></div>
                <!-- Payment methods accordion-->
                <h2 class="h6 pb-3 mb-2">Chọn phương thức thanh toán</h2>
                <div class="accordion mb-2" id="payment-method">
                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button" href="#card" data-bs-toggle="collapse"><i
                                    class="ci-card fs-lg me-2 mt-n1 align-middle"></i>Paypal/Credit Card</a></h3>
                        <div class="accordion-collapse collapse show" id="card" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <div id="paypal-button-container" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points"
                                data-bs-toggle="collapse"><i class="ci-gift me-2"></i>Thanh toán bằng thẻ / Ví điện tử</a>
                        </h3>
                        <div class="accordion-collapse collapse" id="points" data-bs-parent="#payment-method">
                            <div class="accordion-body"
                                style="text-align: center; align-items: center; justify-content: center">
                                <button class="w-100 btn btn-primary"
                                    style="border-radius: 40px; background-color: #b40433; border: none;">Thanh toán
                                    bằng
                                    momo</button>
                                <button class="w-100 btn btn-primary mt-3"
                                    style="border-radius: 40px;background-color: #009432; border: none;">Thanh
                                    toán bằng VNPay</button>
                                <button class="w-100 btn btn-primary mt-3"
                                    style="border-radius: 40px;background-color: #1B1464; border: none;">Thanh
                                    toán bằng ZaloPay</button>
                            </div>
                        </div>
                    </div>
            </section>
            <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                <div class="row">
                    <aside class="col-lg-12 pt-4 pt-lg-0 ps-xl-5" id="cart_checkout">

                    </aside>
                    <aside class="col-lg-12 pt-4 pt-lg-0 ps-xl-5">
                        <div class="bg-white shadow-lg p-4 ms-lg-auto">
                            <div class="py-2 px-xl-2">
                                <div class="widget mb-3">

                                    <div class="button-checkout-default mt-3">
                                        <input type="hidden" name="sale_code" id="hidden_sale_code">
                                        <form class="needs-validation" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <input class="form-control" type="text" name="promocode"
                                                    placeholder="Nhập mã giảm giá *(Nếu có)" required>
                                                <div class="invalid-feedback">Please provide promo code.</div>
                                            </div>
                                            <button class="btn btn-outline-primary d-block w-100" type="submit">Nhập mã giảm giá</button>
                                        </form>

                                        <button class="btn btn-primary d-block w-100 mt-3" id="checkout-complete"
                                            onclick="checkoutComplete()" type="submit">Tiến hành thanh
                                            toán</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </aside>

                </div>
            </aside>
            <!-- Sidebar-->
        </div>

    </div>
@endsection

<?php
$cart = \App\Models\Cart::where('user_id', auth()->user()->id)->get();
$total = 0;
foreach ($cart as $key => $cart) {
    foreach (json_decode($cart->specifications) as $key => $speciation) {
        $total += $speciation->variant_price * $cart->quantity;
        $product_details['product_id'] = $cart->product_id;
        $product_details['quantity'] = $cart->quantity;
        $product_details['promotion_price'] = $speciation->variant_price * $cart->quantity;
        $product_details['discount'] = \App\Models\Product::where('id', $cart->product_id)->first()->discount;
    }
}
?>
<input type="hidden" name="total_price" id="total_price" value="{{ round($total / 22000,2) }}">
@push('script')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AVoCCe7dYAM9wd4Uh-G1rYJiygcqS3B8ZQVVHzDRU0qVnf7I3XsXDdnG0EIG_pXpYThvtskM1JrPemmx&currency=USD">
    </script>
    <script>
        console.log($('#total_price').val())
        paypal.Buttons({

            // Call your server to set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: $('#total_price').val()
                        }
                    }]
                });
            },

            // Call your server to finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction ' + transaction.status + ': ' + transaction.id +
                        '\n\nSee console for all available details');

                    $.ajax({
                        type: "POST",
                        url: "{{ route('paypal.create') }}",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            window.location.href = route('checkout.checkout-review')
                        }
                    });
                });
            }

        }).render('#paypal-button-container');
    </script>
@endpush
