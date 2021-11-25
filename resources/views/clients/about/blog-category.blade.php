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
                        @extends('layouts.client_master')


                    @section('title', 'Bài viết')


                    @section('content')
                        <!-- Page Title (Light)-->
                        <div class="bg-secondary py-4">
                            <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
                                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                                    <nav aria-label="breadcrumb">
                                        <ol
                                            class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                                            <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i
                                                        class="ci-home"></i>Trang chủ</a></li>
                                            <li class="breadcrumb-item text-nowrap"><a
                                                    href="#">Bài viết</a>
                                            </li>
                                            <li class="breadcrumb-item text-nowrap"><a
                                                    href="#">{{ $blogCate1->blogCate_name }}</a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                                    <h1 class="h3 mb-0">{{ $blogCate1->blogCate_name }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="container pb-5 mb-2 mb-md-4">
                            <!-- Featured posts carousel-->
                            <div class="row d-flex justify-content-center">
                                <!-- Entries list-->
                                <section class="col-lg-9">
                                    <!-- Entry-->
                                    @foreach ($blogCate as $blogCate)
                                        <article class="blog-list border-bottom pb-4 mb-5">
                                            <div class="blog-start-column" style="margin-top: 50px;">
                                                <div class="d-flex align-items-center fs-sm pb-2 mb-1"><a
                                                        class="blog-entry-meta-link" href="#">
                                                        <div class="blog-entry-author-ava"><img
                                                                src="{{ asset('frontend/img/blog/meta/02.jpg') }}"
                                                                alt="Cynthia Gomez">
                                                        </div>Lâm Văn
                                                    </a><span class="blog-entry-meta-divider"></span><a
                                                        class="blog-entry-meta-link"
                                                        href="#">{{ $blogCate->created_at }}</a>
                                                </div>
                                                <h2 class="h5 blog-entry-title"><a
                                                        href="{{ route('clients.blog-single', $blogCate->id) }}">{{ $blogCate->blog_title }}</a>
                                                </h2>
                                            </div>
                                            <div class="blog-end-column"><a class="blog-entry-thumb mb-3"
                                                    href="{{ route('clients.blog-single', $blogCate->id) }}"
                                                    style="height: 300px;"><img src="{{ asset($blogCate->blog_image) }}"
                                                        alt="Post"></a>
                                                <p class="fs-sm">{{ $blogCate->blog_description }}… <a
                                                        href='{{ route('clients.blog-single', $blogCate->id) }}'
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
                                            <li class="page-item d-sm-none"><span class="page-link page-link-static">1 /
                                                    5</span></li>
                                            <li class="page-item active d-none d-sm-block" aria-current="page"><span
                                                    class="page-link">1<span
                                                        class="visually-hidden">(current)</span></span></li>
                                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a>
                                            </li>
                                        </ul>
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#"
                                                    aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>
                                        </ul>
                                    </nav>
                                </section>
                            </div>
                        </div>
                    @endsection
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">Bài viết</h1>
        </div>
    </div>
</div>
@endsection
