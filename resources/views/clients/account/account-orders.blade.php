@extends('layouts.client_master')


@section('title', 'Danh sách đơn hàng')


@section('content')
    <!-- Order Details Modal-->
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('clients.index') }}"><i
                                    class="ci-home"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Tài khoản</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Lịch sử mua hàng</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Lịch sử mua hàng</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            @include('clients.Inc.account-sidebar')
            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->

                @livewire('account-order')
                <!-- Pagination-->
            </section>
        </div>
    </div>
@endsection

@push('script')
    <script>
        window.addEventListener('OpenDetailModal', e => {
            $('#order-details').modal('show')
        })
    </script>
@endpush