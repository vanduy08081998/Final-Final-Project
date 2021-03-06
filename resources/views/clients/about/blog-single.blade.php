@extends('layouts.client_master')


@section('title', 'Bài viết')


@section('content')

    <!-- Page Title (Light)-->
    <div class="bg-secondary py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i
                                    class="ci-home"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Bài viết</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Nội dung bài viết</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 mb-0">{{ $blogs->blog_title }}</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row pt-5 mt-md-2">
            <section class="col-lg-9" style="margin: 0 auto;">
                <!-- Post meta-->
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4 mt-n1">
                    <div class="d-flex align-items-center fs-sm mb-2"><a class="blog-entry-meta-link" href="#">
                            <div class="blog-entry-author-ava"><img src="{{ asset('frontend/img/blog/meta/02.jpg') }}"
                                    alt="Cynthia Gomez"></div>
                            Lâm Văn
                        </a><span class="blog-entry-meta-divider"></span><a class="blog-entry-meta-link" href="#">{{ $blogs->created_at }}</a>
                    </div>
                </div>
                <!-- Gallery-->
                <div class="gallery row pb-2">
                    <div class="col-sm-12">
                        <img src="{{ asset($blogs->blog_image) }}" alt="Gallery image" width="100%">
                    </div>
                </div>
                <!-- Post content-->
                <p>{!! $blogs->blog_content !!}</p>
                <div class="d-flex flex-wrap justify-content-between pt-2 pb-4 mb-1">
                    <div class="mt-3"><span
                            class="d-inline-block align-middle text-muted fs-sm me-3 mt-1 mb-2">Share post:</span><a
                            class="btn-social bs-facebook me-2 mb-2" href="#"><i class="ci-facebook"></i></a><a
                            class="btn-social bs-twitter me-2 mb-2" href="#"><i class="ci-twitter"></i></a><a
                            class="btn-social bs-pinterest me-2 mb-2" href="#"><i class="ci-pinterest"></i></a></div>
                </div>
            </section>
        </div>
    </div>
    <!-- Related posts-->
    <div class="bg-secondary py-5">
        <div class="container py-3">
            <h2 class="h4 text-center pb-4">Bài viết liên quan</h2>
            <div class="tns-carousel">
                <div class="tns-carousel-inner"
                    data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 20},&quot;900&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 30}}}">
                    @foreach ($blogs1 as $blog)
                        <article><a class="blog-entry-thumb mb-3" href="{{ route('clients.blog-single', $blog->id) }}"><img
                                    src="{{ asset($blog->blog_image) }}" alt="Post"></a>
                            <div class="d-flex align-items-center fs-sm mb-2"><a class="blog-entry-meta-link" href="#">by
                                    Lâm Văn</a><span class="blog-entry-meta-divider"></span><a
                                    class="blog-entry-meta-link" href="#">{{ $blog->created_at }}</a></div>
                            <h3 class="h6 blog-entry-title"><a href="{{ route('clients.blog-single', $blog->id) }}">{{ $blog->blog_title }}</a></h3>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
