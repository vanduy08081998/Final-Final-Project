@extends('layouts.client_master')


@section('title', 'Thanh toán thành công')


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
                    </a><a class="step-item active" href="checkout-payment.html">
                        <div class="step-progress"><span class="step-count">4</span></div>
                        <div class="step-label"><i class="ci-card"></i>Payment</div>
                    </a><a class="step-item active current" href="checkout-review.html">
                        <div class="step-progress"><span class="step-count">5</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Review</div>
                    </a></div>
                <!-- Order details-->
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="box">
                    <div class="success alert">
                        <div class="alert-body">
                            Thanh toán thành công
                            <p><strong>Cảm ơn bạn đã đặt hàng của BigDeal</strong></p>
                            <i><strong><a href="{{ URL::to('/') }}"> <i class="fa fa-home"></i> Về trang chủ</a></strong></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .box {
            margin-bottom: 60px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .alert {
            margin-top: 25px;
            background-color: #fff;
            font-size: 25px;
            font-family: sans-serif;
            text-align: center;
            width: 640pxpx;
            height: 100px;
            padding-top: 150px;
            position: relative;
            border: 1px solid #efefda;
            border-radius: 2%;
            box-shadow: 0px 0px 3px 1px #ccc;
        }

        .alert::before {
            width: 100px;
            height: 100px;
            position: absolute;
            border-radius: 100%;
            inset: 20px 0px 0px 100px;
            font-size: 60px;
            line-height: 100px;
            border: 5px solid gray;
            animation-name: reveal;
            animation-duration: 1.5s;
            animation-timing-function: ease-in-out;
            margin-left: 18%;
        }

        .alert>.alert-body {
            opacity: 0;
            animation-name: reveal-message;
            animation-duration: 1s;
            animation-timing-function: ease-out;
            animation-delay: 1.5s;
            animation-fill-mode: forwards;
            margin-top: 15px;
        }

        @keyframes reveal-message {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .success {
            color: green;
        }

        .success::before {
            content: '✓';
            background-color: #eff;
            box-shadow: 0px 0px 12px 7px rgba(200, 255, 150, 0.8) inset;
            border: 5px solid green;
        }

        .error {
            color: red;
        }

        .error::before {
            content: '✗';
            background-color: #fef;
            box-shadow: 0px 0px 12px 7px rgba(255, 200, 150, 0.8) inset;
            border: 5px solid red;
        }

        @keyframes reveal {
            0% {
                border: 5px solid transparent;
                color: transparent;
                box-shadow: 0px 0px 12px 7px rgba(255, 250, 250, 0.8) inset;
                transform: rotate(1000deg);
            }

            25% {
                border-top: 5px solid gray;
                color: transparent;
                box-shadow: 0px 0px 17px 10px rgba(255, 250, 250, 0.8) inset;
            }

            50% {
                border-right: 5px solid gray;
                border-left: 5px solid gray;
                color: transparent;
                box-shadow: 0px 0px 17px 10px rgba(200, 200, 200, 0.8) inset;
            }

            75% {
                border-bottom: 5px solid gray;
                color: gray;
                box-shadow: 0px 0px 12px 7px rgba(200, 200, 200, 0.8) inset;
            }

            100% {
                border: 5px solid gray;
                box-shadow: 0px 0px 12px 7px rgba(200, 200, 200, 0.8) inset;
            }
        }

    </style>
@endsection
