@extends('layouts.client_master')


@section('title', 'Liên hệ')


@section('content')
    <div class="bg-secondary py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i
                                    class="ci-home"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Liên hệ</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 mb-0">Liên hệ và phản hồi</h1>
            </div>
        </div>
    </div>
    <!-- Contact detail cards-->
    @foreach ($infors as $infor)
    <section class="container-fluid pt-grid-gutter">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#map" data-scroll>
                    <div class="card-body text-center"><i class="ci-location h3 mt-2 mb-4 text-primary"></i>
                        <h3 class="h6 mb-2">Địa chỉ cửa hàng</h3>
                        <p class="fs-sm text-muted">{{ $infor->address }}</p>
                    </div>
                </a></div>
            <div class="col-xl-3 col-sm-6 mb-grid-gutter">
                <div class="card h-100">
                    <div class="card-body text-center"><i class="ci-time h3 mt-2 mb-4 text-primary"></i>
                        <h3 class="h6 mb-3">Giờ làm việc</h3>
                        <ul class="list-unstyled fs-sm text-muted mb-0">
                            <li>Mở cữa: {{ $infor->start_time }}</li>
                            <li>Đóng cữa: {{ $infor->end_time }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-grid-gutter">
                <div class="card h-100">
                    <div class="card-body text-center"><i class="ci-phone h3 mt-2 mb-4 text-primary"></i>
                        <h3 class="h6 mb-3">Số điện thoại</h3>
                        <ul class="list-unstyled fs-sm mb-0">
                            <li><a class="nav-link-style" href="#">{{ $infor->phone }}</a></li>                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-grid-gutter">
                <div class="card h-100">
                    <div class="card-body text-center"><i class="ci-mail h3 mt-2 mb-4 text-primary"></i>
                        <h3 class="h6 mb-3">Địa chỉ liên hệ</h3>
                        <ul class="list-unstyled fs-sm mb-0">
                            <li><a class="nav-link-style" href="#">{{ $infor->email }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid px-0" id="map">
        <div class="row g-0">
            <div class="col-lg-6 iframe-full-height-wrap">
                {!! $infor->gg_map !!}
            </div>
            <div class="col-lg-6 px-4 px-xl-5 py-5 border-top">
                <h2 class="h4 mb-4">Đóng gop ý kiến</h2>
                <form class="needs-validation mb-3" >
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="cf-name">Your name:&nbsp;<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="cf-name" placeholder="John Doe" required>
                            <div class="invalid-feedback">Please fill in you name!</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="cf-email">Email address:&nbsp;<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="email" id="cf-email" placeholder="johndoe@email.com"
                                required>
                            <div class="invalid-feedback">Please provide valid email address!</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="cf-phone">Your phone:&nbsp;<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="cf-phone" placeholder="+1 (212) 00 000 000"
                                required>
                            <div class="invalid-feedback">Please provide valid phone number!</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="cf-subject">Subject:</label>
                            <input class="form-control" type="text" id="cf-subject"
                                placeholder="Provide short title of your request">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="cf-message">Message:&nbsp;<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="cf-message" rows="6"
                                placeholder="Please describe in detail your request" required></textarea>
                            <div class="invalid-feedback">Please write a message!</div>
                            <button class="btn btn-primary mt-4" type="submit">Send message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@endsection
