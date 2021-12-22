@extends('layouts.client_master')


@section('title', 'Thông tin giao hàng')


@section('content')
    <!-- Page Title (Dark)-->
    <div class="bg-dark py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('clients.index') }}"><i
                                    class="ci-home"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Tài khoản</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Thông tin giao hàng</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Mã đơn hàng: <span
                        class="h4 fw-normal text-light">{{ $order->date }}</span>
                </h1>
            </div>
        </div>
    </div>
    <div class="container py-5 mb-2 mb-md-3">
        <!-- Details-->
        <div class="row gx-4 mb-4">
            <div class="col-md-4 mb-2">
                <div class="bg-secondary h-100 p-4 text-center rounded-3"><span class="fw-medium text-dark me-2">Đơn vị vận
                        chuyển:</span>Đang cập nhật
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="bg-secondary h-100 p-4 text-center rounded-3"><span class="fw-medium text-dark me-2">Tình trạng
                        đơn hàng:</span>{{ $order->status ? $order->status->delivery_description : 'Đang xử lý' }}</div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="bg-secondary h-100 p-4 text-center rounded-3"><span class="fw-medium text-dark me-2">Ngày giao
                        dự kiến:</span>Đang cập nhật</div>
            </div>
        </div>
        <!-- Progress-->
        <div class="card border-0 shadow-lg">
            <div class="card-body pb-2">

                <ul class="nav nav-tabs media-tabs nav-justified">
                    @if ($order->delivery_viewed != 6)
                        <li class="nav-item">
                            <div
                                class="nav-link {{ $order->delivery_viewed == 2 ? 'active' : '' }} {{ $order->delivery_viewed > 2 ? 'completed' : '' }}">
                                <div class="d-flex align-items-center">
                                    <div class="media-tab-media"><i class="ci-bag"></i></div>
                                    <div class="ps-3">
                                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Bước 1:</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Xác nhận đơn hàng</h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div
                                class="nav-link {{ $order->delivery_viewed == 3 ? 'active' : '' }} {{ $order->delivery_viewed > 3 ? 'completed' : '' }}">
                                <div class="d-flex align-items-center">
                                    <div class="media-tab-media"><i class="ci-settings"></i></div>
                                    <div class="ps-3">
                                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Bước 2:</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Đóng gói và giao hàng</h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div
                                class="nav-link {{ $order->delivery_viewed == 4 ? 'active' : '' }} {{ $order->delivery_viewed > 4 ? 'completed' : '' }}">
                                <div class="d-flex align-items-center">
                                    <div class="media-tab-media"><i class="ci-star"></i></div>
                                    <div class="ps-3">
                                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Bước 3:</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Đang giao hàng</h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link {{ $order->delivery_viewed == 5 ? 'completed' : '' }}">
                                <div class="d-flex align-items-center">
                                    <div class="media-tab-media"><i class="ci-package"></i></div>
                                    <div class="ps-3">
                                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Bước 4:</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Đã giao hàng</h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <div class="nullable">
                            <div class="icon-null">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="text-null">
                                Đơn hàng đã bị hủy!
                            </div>
                            <a href="{{ route('clients.index') }}">Tiếp tục mua sắm</a>
                        </div>
                    @endif
                </ul>
            </div>
        </div>
        <div class="d-sm-flex flex-wrap justify-content-between align-items-center text-center pt-4">
            <a class="btn btn-primary btn-sm mt-2" href="#order-details" data-bs-toggle="modal">Chi tiết đơn hàng</a>
        </div>
        <div class="modal fade" id="order-details">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mã đơn hàng - {{ $order->date }}</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-0">
                        <!-- Item-->
                        @forelse ($order->detail as $item)
                            <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
                                @foreach (json_decode($item->specification) as $pro)
                                    <div class="d-sm-flex text-center text-sm-start"><a
                                            class="d-inline-block flex-shrink-0 mx-auto" href="shop-single-v1.html"
                                            style="width: 10rem;"><img src="{{ asset($pro->variant_image) }}"
                                                alt="Product"></a>
                                        <div class="ps-sm-4 pt-2">
                                            <h3 class="product-title fs-base mb-2"><a
                                                    href="shop-single-v1.html">{{ $pro->product_name }}</a>
                                            </h3>
                                            @if (!isset($pro->colors))
                                                <div class="fs-sm"><span class="text-muted me-2">Màu
                                                        sắc:</span>Không
                                                </div>
                                            @else
                                                <div class="fs-sm"><span class="text-muted me-2">Màu
                                                        sắc:</span>{{ \App\Models\Color::where('color_slug', $pro->colors)->first()->color_name }}
                                                </div>
                                            @endif
                                            @if ($pro->specifications != null)
                                                <div class="d-block mt-2">
                                                    @foreach ($pro->specifications as $ts)
                                                        <label class="boxed">
                                                            <strong>{{ $ts }}</strong>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            @else

                                            @endif
                                            <div class="fs-lg text-accent pt-2">
                                                {{ number_format($pro->variant_price, 0, '.', ',') . ' đ' }}</div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                    <div class="text-muted mb-2">Số lượng:</div>{{ $item->quantity }}
                                </div>
                                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                    <div class="text-muted mb-2">Thành tiền</div>
                                    {{ number_format($item->promotion_price, 0, '.', ',') . ' đ' }}
                                </div>
                            </div>
                        @empty
                            <h1>Đang cập nhật ... </h1>
                        @endforelse

                    </div>
                    <!-- Footer-->
                    <div class="modal-footer flex-wrap justify-content-between bg-secondary fs-md">
                        <div class="px-2 py-1"><span class="text-muted">Thành
                                tiền:&nbsp;</span><span>{{ $order ? number_format($order->grand_total, 0, '.', ',') . ' đ' : '' }}</span>
                        </div>
                        <div class="px-2 py-1"><span class="text-muted">Phí giao
                                hàng:&nbsp;</span><span>{{ number_format($ship->handing_fee, 0,'.', ',').' đ'}}</span></div>
                        {{-- <div class="px-2 py-1"><span
                        class="text-muted">Thuế:&nbsp;</span><span>$9.<small>50</small></span></div> --}}
                        <div class="px-2 py-1"><span class="text-muted">Tổng tiền:&nbsp;</span><span
                                class="fs-lg">{{ $order ? number_format($order->grand_total + $ship->handing_fee, 0, '.', ',') . ' đ' : '' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
