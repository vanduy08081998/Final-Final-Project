@extends('layouts.client_master')


@section('title', $product->product_name)

@section('meta')
    <meta name="description" content="{!! $product->meta_description !!}">
    <meta name="keywords" content="{!! $product->meta_keywords !!}">
    <meta name="author" content="{!! $product->meta_title !!}">
@endsection

@section('content')
    <style>
        h2,
        span.title_profile {
            max-width: 100%;
            word-wrap: break-word;
        }

        .long-desc img {
            width: 100%;
        }

      #content-wrapper .lSPager {
        margin-left: calc(100% - 73%) !important;
        margin-top: 20px !important;
    }
      @media screen and (max-width: 600px) {
        .detail-tab .tab-content {
        width: 100%;
        margin: 0 auto;
        display: flex !important;
        justify-content: center !important;
    }
      }
    </style>
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2 pb-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i
                                    class="ci-home"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Cửa hàng</a></li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 text-center">
                <h1 class="h3 text-light mb-0">Chi tiết sản phẩm</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="bg-light shadow-lg rounded-3">
            <!-- Tabs-->
            <div class="px-4 pt-lg-3 pb-3 mb-5 detail-tab">
                <div class="container-fluid">
                    <div class="bg-light shadow-lg rounded-3">
                        <div class="px-4 pt-lg-3 pb-3 mb-5 mt-3 detail-content">

                            <div class="tab-content px-lg-3">
                                <!-- General info tab-->
                                <div class="tab-pane fade show active" id="general" role="tabpanel">
                                    @include('clients.shop.details.form-select-attribute')
                                </div>
                                <!-- Tech specs tab-->
                                <div class="tab-pane fade" id="specs" role="tabpanel">

                                </div>
                                <!-- Reviews tab-->
                            </div>
                        </div>
                    </div>
                    <!-- Product description-->
                    <!-- Product description-->
                    <div class="container pt-lg-3 pb-4 pb-sm-5 long-desc" style="position: relative">
                        <div class="row justify-content-center" style="text-align: justify">
                            <div class="col-lg-10 text-description" id="point">
                                @if ($product->short_description != null)
                                    <div
                                        class="d-md-flex justify-content-between align-items-start pb-4 mb-4 border-bottom bg-secondary">
                                        <div class=" align-items-center pt-3" style="width: 100% !important">
                                            <h3 class="text-center text-danger">Đặc điểm nổi bật</h3>
                                            {!! $product->short_description !!}
                                        </div>
                                    </div>
                                @else
                                @endif

                                @if ($product->long_description != null)
                                    {!! $product->long_description !!}
                                @else
                                @endif
                            </div>
                        </div>
                        @if ($product->long_description != null)
                            <div class="btn-show fade-desc" id="point1">
                                <button class="btn btn-danger justify-items-center show-more"
                                    style="display: block; margin: 0 auto; margin-top: 50px">Xem thêm</button>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
                <!-- Product description-->
            </div>
        </div>
    </div>
    </div>
    <hr class="mb-5">
    <!-- Product carousel (You may also like)-->
    <!-- Bình luận ở đây nha bà con-->

    @livewire('reviews',['product' => $product])
    @include('clients.shop.details.related-product')

    @livewire('comment-live', ['product' => $product])
    <!-- Bình luận ở đây nha bà con-->

@endsection

@push('script')
    <script>
        // ///////////////////// XỬ LÝ BÌNH LUẬN //////////////////////////////////////////////

        //Bình luận ở mục đầu tiên
        $(document).on('click', '.save-comment', function() {
            let URL = $(this).data('url')
            let body = $('#form-one').val()
            $.ajax({
                url: URL,
                data: {
                    comment_content: body
                },
                success: function() {
                    $('#form-one').val('')
                    toastr.success('Bình luận của đang được duyệt!')
                    window.livewire.emit('render')
                }
            })
        })
        // click vào phần bình luận đầu tiên
        $(document).on('click', '#form-one', function() {
            $('.form-comment-show').addClass('d-none')
            $('.body-comment').removeClass('d-none')
            window.livewire.emit('login')
        })

        // Mở form trả lời bình luận
        $(document).on('click', '.reply', function() {
            $('.form-comment-show').addClass('d-none')
            let id = $(this).data('id')
            $('.reply-comment-' + id).removeClass('d-none')

            // Chèn tag name
            let tagName = '@' + $('.name-' + id).text() + ' '
            $('.body-' + id).val(tagName)
        })

        // mở chỉnh sửa bình luận
        function editComment(id) {
            $('.body-comment').removeClass('d-none')
            $('.form-comment-show').addClass('d-none')
            $('.edit-comment-' + id).removeClass('d-none');
            $('.comment-body-' + id).addClass('d-none')
        }

        //Thoát chỉnh sửa
        $(document).on('click', '.esc', function(ev) {
            ev.preventDefault();
            let id = $(this).data('id');
            $('.edit-comment-' + id).addClass('d-none');
            $('.comment-body-' + id).removeClass('d-none')
        })

        // Chỉnh sửa bình luận
        $(document).on('click', '.edit', function(ev) {
            ev.preventDefault();
            let URL = $(this).data('url')
            let id = $(this).data('id')
            let body = $('.edit-comment-form-' + id).val()
            $.ajax({
                url: URL,
                data: {
                    comment_content: body
                },
                success: function() {
                    toastr.success('Chỉnh sửa thành công!')
                    window.livewire.emit('render')
                }
            })
        })

        // Thu hồi bình luận
        $(document).on('click', '.recall', function(ev) {
            ev.preventDefault();
            let URL = $(this).data('url')
            $.ajax({
                url: URL,
                success: function() {
                    toastr.success('Bạn đã thu hồi một bình luận!')
                    window.livewire.emit('render')
                }
            })
        })


        // Kiểm soát ngôn từ tiêu cực
        $(document).on('keyup', '.form-validated', function() {
            let text = $(this).val()
            if (text) {
                $(this).val(replaceText(text))
                $('.btn-submit-text').attr('disabled', false)
            } else {
                $('.btn-submit-text').attr('disabled', true)
            }
        })

        function replaceText(text) {
            text = text.replace(/lồn/gi, "");
            text = text.replace(/cặc/gi, "");
            text = text.replace(/dm/gi, "");
            text = text.replace(/vãi/gi, "");
            text = text.replace(/buồi/gi, "");
            text = text.replace(/dái/gi, "");
            text = text.replace(/địt/gi, "");
            text = text.replace(/chịch/gi, "");
            text = text.replace(/xoạc/gi, "");
            text = text.replace(/vếu/gi, "");
            text = text.replace(/vú/gi, "");
            text = text.replace(/bụ/gi, "");
            text = text.replace(/đụ/gi, "");
            text = text.replace(/mé/gi, "");
            text = text.replace(/mày/gi, "");
            text = text.replace(/tao/gi, "");
            text = text.replace(/gớm/gi, "");
            text = text.replace(/tởm/gi, "");
            return text;
        }

        $('.wrap-rating').each(function() {
            var item = $(this).find('.item-rating');
            var rated = -1;

            //Lúc di chuột vào tp
            $(item).on('mouseenter', function() {
                var index = item.index(this);
                var i = 0;
                for (i = 0; i <= index; i++) {
                    $(item[i]).removeClass('ci-star');
                    $(item[i]).addClass('ci-star-filled');
                }

                for (var j = i; j < item.length; j++) {
                    $(item[j]).addClass('ci-star');
                    $(item[j]).removeClass('ci-star-filled');
                }

            });

            $(item).on('click', function() {
                var index = item.index(this);
                rated = index;
                $('.text-rating_' + [index]).css({
                    'color': '#fe8c23',
                    'font-weight': 'bold'
                });
                for (var t = 0; t <= 4; t++) {
                    if (t != index) {
                        $('.text-rating_' + [t]).removeAttr('style');
                    }
                }

            });


            //Lúc di chuột ra khỏi tp
            $(this).on('mouseleave', function() {
                var i = 0;
                for (i = 0; i <= rated; i++) {
                    $(item[i]).removeClass('ci-star');
                    $(item[i]).addClass('ci-star-filled');
                }
                for (var j = i; j < item.length; j++) {
                    $(item[j]).addClass('ci-star');
                    $(item[j]).removeClass('ci-star-filled');
                }
            });
        });
        $(document).on('click', '.item-rating', function() {
            $('.count-rating').val($(this).data('count'));
        })
    </script>


    <script>
        function loadMore(id) {
            let loadMore = $('.load-show-' + id + ':hidden')
            loadMore.slice(0, 4).slideDown();
            if (loadMore.length == 0) {
                $('.content-' + id).addClass('d-none')
                $('.content-none-' + id).removeClass('d-none')
            }
        }

        function upMore(id) {
            let loadMore = $('.load-show-' + id)
            loadMore.slice(2, 20).slideUp();
            $('.content-' + id).removeClass('d-none')
            $('.content-none-' + id).addClass('d-none')
        }
    </script>
    {{-- Xử lý long description --}}
    <script>
        $(".show-more").click(function() {
            if ($("#point").hasClass("text-description")) {
                $(this).text("Ẩn bớt");
            } else {
                $(this).text("Xem thêm");
            }
            $("#point").toggleClass("text-description");
            $("#point1").toggleClass("fade-desc");
        });
    </script>
@endpush
