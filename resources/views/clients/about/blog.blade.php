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
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 mb-0">Bài viết</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <!-- Featured posts carousel-->
        <div class="featured-posts-carousel tns-carousel pt-5" style="margin-bottom: 30px;">
            <div class="tns-carousel-inner"
                data-carousel-options="{&quot;items&quot;: 2, &quot;nav&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;700&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 20},&quot;991&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 30}}}">
                @foreach ($blogs as $blog)
                    <article>
                        <a class="blog-entry-thumb mb-3" href="{{ route('clients.blog-single', $blog->id) }}"
                            style="height: 200px;"><span class="blog-entry-meta-label fs-sm"><i
                                    class="ci-time"></i>{{ $blog->created_at }}</span><img
                                src="{{ asset($blog->blog_image) }}" alt="Featured post"></a>
                        <div class="d-flex justify-content-between mb-2 pt-1">
                            <h2 class="h5 blog-entry-title mb-0"><a
                                    href="{{ route('clients.blog-single', $blog->id) }}">{{ $blog->blog_title }}</a>
                            </h2><a class="blog-entry-meta-link fs-sm text-nowrap ms-3 pt-1"
                                href="{{ route('clients.blog-single', $blog->id) }}"></a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
        <div class="row">
            <!-- Entries list-->
            <section class="col-lg-8">
                <!-- Entry-->
                @foreach ($blogs1 as $blog)
                    <article class="blog-list border-bottom pb-4 mb-5">
                        <div class="blog-start-column" style="margin-top: 50px;">
                            <div class="d-flex align-items-center fs-sm pb-2 mb-1"><a class="blog-entry-meta-link" href="#">
                                    <div class="blog-entry-author-ava"><img
                                            src="{{ asset('frontend/img/blog/meta/02.jpg') }}" alt="Cynthia Gomez">
                                    </div>Lâm Văn
                                </a><span class="blog-entry-meta-divider"></span><a class="blog-entry-meta-link"
                                    href="#">{{ $blog->created_at }}</a></div>
                            <h2 class="h5 blog-entry-title"><a
                                    href="{{ route('clients.blog-single', $blog->id) }}">{{ $blog->blog_title }}</a>
                            </h2>
                        </div>
                        <div class="blog-end-column"><a class="blog-entry-thumb mb-3"
                                href="{{ route('clients.blog-single', $blog->id) }}" style="height: 300px;"><img
                                    src="{{ asset($blog->blog_image) }}" alt="Post"></a>
                            <p class="fs-sm">{{ $blog->blog_description }}… <a
                                    href='{{ route('clients.blog-single', $blog->id) }}'
                                    class='blog-entry-meta-link fw-medium'>[Read more]</a>
                            </p>
                        </div>
                    </article>
                @endforeach
                <!-- Pagination-->
                <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i
                                    class="ci-arrow-left me-2"></i>Prev</a></li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                        <li class="page-item active d-none d-sm-block" aria-current="page"><span
                                class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i
                                    class="ci-arrow-right ms-2"></i></a></li>
                    </ul>
                </nav>
            </section>
            <aside class="col-lg-4">
                <!-- Sidebar-->
                <div class="offcanvas offcanvas-collapse offcanvas-end border-start ms-lg-auto" id="blog-sidebar"
                    style="max-width: 22rem;">
                    <div class="offcanvas-header align-items-center shadow-sm">
                        <h2 class="h5 mb-0">Sidebar</h2>
                        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body py-grid-gutter py-lg-1 px-lg-4" data-simplebar
                        data-simplebar-auto-hide="true">
                        <!-- Categories-->
                        <div class="widget widget-links mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
                            <h4>Danh mục bài viết </h4>
                            <ul class="widget-list">
                                @foreach ($blogCate as $blogCate)
                                    <li class="widget-list-item">
                                        <a class="widget-list-link"
                                            href="{{ route('clients.blog-category', $blogCate->id) }}">
                                            <h6 style="color:#e67e22;">{{ $blogCate->blogCate_name }}<span style="float: right;">(
                                                    {{ $blogs->where('id_blogCate', $blogCate->id)->count() }}
                                                    )</span></h6>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Trending posts-->
                        <div class="widget mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
                            <h2 class="widget-title">Bài viết mới</h2>
                            @foreach ($blogs2 as $blogs)
                                <div class="d-flex align-items-center mb-3">
                                    <a class="flex-shrink-0" href="{{ route('clients.blog-single', $blog->id) }}">
                                        <img class="rounded" src="{{ asset($blogs->blog_image) }}" width="64"
                                            alt="Post image">
                                    </a>
                                    <div class="ps-3">
                                        <h6 class="blog-entry-title fs-sm mb-0"><a
                                                href="{{ route('clients.blog-single', $blog->id) }}">{{ $blogs->blog_title }}</a>
                                        </h6><span class="fs-ms text-muted">từ <a href='#' class='blog-entry-meta-link'>Lâm
                                                Văn</a></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
