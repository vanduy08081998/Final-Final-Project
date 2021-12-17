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
            <div class="px-4 pt-lg-3 pb-3 mb-5">
                <div class="container-fluid">
                    <div class="bg-light shadow-lg rounded-3">
                        <div class="px-4 pt-lg-3 pb-3 mb-5 mt-3">

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
                    <div class="container pt-lg-3 pb-4 pb-sm-5 long-desc">
                        <div class="row justify-content-center" style="text-align: justify">
                            <div class="col-lg-10 text-description" id="point">
                                <div
                                    class="d-md-flex justify-content-between align-items-start pb-4 mb-4 border-bottom bg-secondary">
                                    <div class=" align-items-center pt-3" style="width: 100% !important">
                                        <h3 class="text-center text-danger">Đặc điểm nổi bật</h3>
                                        {!! $product->short_description !!}
                                    </div>
                                </div>
                                {!! $product->long_description !!}
                            </div>
                        </div>
                        <div class="btn-show">
                            <button class="btn btn-danger justify-items-center show-more"
                                style="display: block; margin: 0 auto; margin-top: 30px">Xem thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Product description-->
            </div>
        </div>
    </div>
    </div>
    <!-- Product description-->
    <div class="container pt-lg-3 pb-4 pb-sm-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

            </div>
        </div>
    </div>
    <hr class="mb-5">
    <!-- Product carousel (You may also like)-->
    <!-- Bình luận ở đây nha bà con-->
    @include('clients.shop.details.gallery-css')

    @livewire('reviews',['product' => $product])
    @include('clients.shop.details.related-product')

    @livewire('comment-live', ['product' => $product])
    <!-- Bình luận ở đây nha bà con-->

@endsection

@push('script')
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 20,
            slidesPerView: 6,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 20,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
        $('#choice_attribute_options').on('change', function() {
            getVariantPrice()
        })

        let qt_inc = document.querySelector('.qt-inc');
        let qt_dec = document.querySelector('.qt-dec');

        qt_dec.addEventListener('click', function(e) {
            document.querySelector('#product_quantity').value = Number(document.querySelector(
                    '#product_quantity')
                .value) - 1;
            if (document.querySelector('.quantity_number').value < 1) {
                document.querySelector('.quantity_number').value = 1;
            }
            getVariantPrice()
        })

        qt_inc.addEventListener('click', function(e) {
            document.querySelector('#product_quantity').value = Number(document.querySelector(
                    '#product_quantity')
                .value) + 1;
            getVariantPrice()
        })
    </script>


    <script>
        const getVariantPrice = () => {
            $.ajax({
                type: "POST",
                url: "{{ route('products.get_variant_price') }}",
                data: $('#choice_attribute_options').serializeArray(),
                success: function(response) {
                    console.log(response)
                    console.log(response.quantity)
                    $('#specifications').html(response.specifications)
                    $('.total_product_price').html(
                        ` <strong>Tổng tiền: </strong><span>${response.price}</span>`)
                    // Quantity check
                    quantityCheck(response.product_quantity)
                    // End Quantity check
                }

            })
        }

        const quantityCheck = (quantity) => {
            if (quantity > 0) {
                $('#product_badge').html(` <div class="product-badge product-available mt-n1 bg-green" style="right: 70px; top: 550px"><i
                                                  class="ci-security-check"></i>Sản phẩm còn hàng
                                              </div>`)
            } else {
                $('#product_badge').html(`<div class="product-badge product-available mt-n1 bg-red"><i
                                                  class="fas fa-times" style="right: 70px; top: 550px"></i>Sản phẩm hết hàng
                                              </div> `)
            }
        }
    </script>
    <script type="text/javascript">
        // ///////////////////// XỬ LÝ BÌNH LUẬN //////////////////////////////////////////////
        $(document).on('click', '.move-top', function() {
            setTimeout(function() {
                $('html, body').animate({
                    scrollTop: $('#div_id').position().top
                }, 'slow');
            }, 1000);
        })
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
                $('.content-' + id).fadeOut("slow");
            }
        }
    </script>
    {{-- Xử lý long description --}}
    <script>
        $(".show-more").click(function() {
            if ($("#point").hasClass("text-description")) {
                $(this).text("Xem thêm");
            }
            $("#point").removeClass("text-description");
            $(".show-more").remove();
        });
    </script>
@endpush
