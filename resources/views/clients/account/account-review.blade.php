@extends('layouts.client_master')


@section('title', 'Danh sách đơn hàng')


@section('content')
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
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Thông báo</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Thông báo</h1>
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
                <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                    <div class="d-flex align-items-center">

                    </div>
                    <a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="account-signin.html"><i
                            class="ci-sign-out me-2"></i>Đăng xuất</a>
                </div>
                <!-- Orders list-->
                @livewire('review-me')

            </section>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $('.contact-not').click(function() {
            let type = $(this).data('type')
            $('.checked-input').click();
            if (type == 'comment') {
                $('.comment-check').click()
            }
            if (type == 'order') {
                $('.order-check').click()
            }
            if (type == 'review') {
                $('.review-check').click()
            }
        })

        $('.content-not').click(function() {
            let id = $(this).data('id');
            window.livewire.emit('delete', id)
        })

        $('.delete-notifica').click(function() {
            let type = $(this).data('type')
            window.livewire.emit('deleteAll', type)
        })
    </script>
@endpush
