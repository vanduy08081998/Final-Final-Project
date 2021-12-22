@extends('layouts.client_master')


@section('title', 'Thông tin giao nhận')


@section('content')

    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                      <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('clients.index') }}"><i class="ci-home"></i>Trang chủ</a>
                      </li>
                      <li class="breadcrumb-item text-nowrap"><a href="{{ route('shop.shop-grid', ['slug' => 'all-category']) }}">Cửa hàng</a>
                      </li>
                      <li class="breadcrumb-item text-nowrap active" aria-current="page">Thanh toán</li>
                    </ol>
                  </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light">Thông tin giao nhận</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <section class="col-lg-8">
                <!-- Steps-->
                <div class="steps steps-light pt-2 pb-3 mb-5">
                    @include('clients.Inc.checkout-bar')
                </div>
                <!-- Autor info-->
                @auth
                    <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
                        <div class="d-flex align-items-center">
                            <div class="img-thumbnail rounded-circle position-relative flex-shrink-0">
                                @if (auth()->user()->avatar != null)
                                    <img class="rounded-circle"
                                        src="{{ asset('uploads/Users') }}/{{ auth()->user()->avatar }}" width="90"
                                        alt="Susan Gardner">
                                @else
                                    <img class="rounded-circle"
                                        src="{{ asset('backend/img/profiles/avt.png') }}" width="90"
                                        alt="Susan Gardner">
                                @endif

                            </div>
                            <div class="ps-3">
                                <h3 class="fs-base mb-0">{{ auth()->user()->name }}</h3><span
                                    class="text-accent fs-sm">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                @endauth

                @guest
                    <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
                        <div class="d-flex align-items-center">
                            <div class="img-thumbnail rounded-circle position-relative flex-shrink-0"><span
                                    class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip"
                                    title="Reward points">384</span><img class="rounded-circle"
                                    src="{{ asset('frontend/img/shop/account/avatar.jpg') }}" width="90" alt="Susan Gardner">
                            </div>
                            <div class="ps-3">
                                <h3 class="fs-base mb-0">Susan Gardner</h3><span
                                    class="text-accent fs-sm">s.gardner@example.com</span>
                            </div>
                        </div>
                    </div>
                @endguest
                <!-- Shipping address-->
                @include('clients.checkout.Checkout.form-infomation')
            </section>
            <!-- Sidebar-->
            <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5" id="cart_checkout">

            </aside>
        </div>
    </div>
    @include('clients.checkout.Checkout.add_address_modal')

@endsection

@push('script')
    <script>
        $('#form-infomations').on('submit', function(event) {
            event.preventDefault()
            let array = [];
            $.ajax({
                type: "POST",
                url: route('checkout.shipping-address'),
                data: $(this).serializeArray(),
                beforeSend: () => {
                    $("body").append(`<div class="preloader">
                        <div class="lds-ripple">
                            <div class="lds-pos"></div>
                            <div class="lds-pos"></div>
                        </div>
                    </div>`);
                },
                success: function(response) {
                    window.location.href = "{{ route('checkout.checkout-shipping') }}"
                }
            });
        })

        $('.button-action').on('click', function() {
            if ($(this).attr('data-action') == 'edit') {
                feeEdit()
            }

            if ($(this).attr('data-action') == 'add') {
                fee()
            }
            //edit-default
            if ($(this).attr('data-action') == 'edit-default') {
                feeDefaultEdit()
            }
        })

        function feeDefaultEdit() {
            $(document).on('change', '.choose-default-edit', function() {
                var url = $('.route').data('url');
                var action = $(this).attr("data-edit");
                var ma_id = $(this).val();
                var result = '';
                if (action == 'province') {
                    result = 'district-default-edit';
                } else {
                    result = 'ward-default-edit';
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


            })

        }

        function feeEdit() {
            var id_address = $('.id_address_edit')

            for (let index = 0; index < id_address.length; index++) {
                $(document).on('change', '.choose-edit-' + id_address[index].value, function() {
                    var url = $('.route').data('url');
                    var action = $(this).attr("data-edit");
                    var ma_id = $(this).val();
                    var result = '';
                    if (action == 'province') {
                        result = 'district-edit-' + id_address[index].value;
                    } else {
                        result = 'ward-edit-' + id_address[index].value;
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
                })
            }


            console.log(id_address)
        }
    </script>
@endpush
