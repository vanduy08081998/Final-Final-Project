@extends('layouts.client_master')


@section('title', $product->product_name)

@section('meta')
  <meta name="description" content="{!! $product->meta_description !!}">
  <meta name="keywords" content="{!! $product->meta_keywords !!}">
  <meta name="author" content="{!! $product->meta_title !!}">
@endsection

@section('content')
  <div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>{{ trans('Trang chủ') }}</a>
            </li>
            <li class="breadcrumb-item text-nowrap"><a href="#">{{ trans('Cửa hàng') }}</a>
            </li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('Chi tiết sản phẩm') }}
            </li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h4 text-light mb-2">{{ trans($product->product_name) }}</h1>
        <div>
          <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
              class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i
              class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
          </div><span class="d-inline-block fs-sm text-white opacity-70 align-middle mt-1 ms-1">74 Reviews</span>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="bg-light shadow-lg rounded-3">
      <!-- Tabs-->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link py-4 px-sm-4 active" href="#general" data-bs-toggle="tab" role="tab">Tổng quan <span
              class='d-none d-sm-inline'>Info</span></a></li>
        <li class="nav-item"><a class="nav-link py-4 px-sm-4" href="#specs" data-bs-toggle="tab" role="tab"><span
              class='d-none d-sm-inline'>Thông số kĩ thuật</span></a></li>
        <li class="nav-item"><a class="nav-link py-4 px-sm-4" href="#reviews" data-bs-toggle="tab" role="tab">Bình luận <span
              class="fs-sm opacity-60">(74)</span></a></li>
      </ul>
      <div class="px-4 pt-lg-3 pb-3 mb-5">

        <div class="tab-content px-lg-3">
          <!-- General info tab-->


          <div class="tab-pane fade show active" id="general" role="tabpanel">
            @include('clients.shop.details.form-select-attribute')
          </div>


          <!-- Tech specs tab-->
          <div class="tab-pane fade" id="specs" role="tabpanel">
            <div class="d-md-flex justify-content-between align-items-start pb-4 mb-4 border-bottom">
              <div class="d-flex align-items-center pt-3" id="specifications">

              </div>
            </div>
          </div>
          <!-- Reviews tab-->
          @include('clients.shop.details.review')
        </div>
      </div>
    </div>
    <!-- Product description-->
    <div class="container pt-lg-3 pb-4 pb-sm-5">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          {!! $product->long_description !!}
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
  @livewire('comment-live', ['product' => $product])
  <!-- Bình luận ở đây nha bà con-->
  </div>
  <hr class="mb-5">
  @include('clients.shop.details.related-product')
@endsection

@push('script')
  <script>
    $('#choice_attribute_options').on('change', function() {
      getVariantPrice()
    })

    let qt_inc = document.querySelector('.qt-inc');
    let qt_dec = document.querySelector('.qt-dec');

    qt_dec.addEventListener('click', function(e) {
      document.querySelector('#product_quantity').value = Number(document.querySelector('#product_quantity').value) - 1;
      if (document.querySelector('.quantity_number').value < 1) {
        document.querySelector('.quantity_number').value = 1;
      }
      getVariantPrice()
    })

    qt_inc.addEventListener('click', function(e) {
      document.querySelector('#product_quantity').value = Number(document.querySelector('#product_quantity').value) + 1;
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
          console.log(response.quantity)
          $('#specifications').html(response.specifications)
          $('.total_product_price').html(` <small>Tổng tiền: </small>${response.price}`)
          // With magic Zoom
          getMagicZoom(response.variant_image)
          // End magic zoom
          // Quantity check
          quantityCheck(response.product_quantity)
          // End Quantity check
        }

      })
    }

    const getMagicZoom = (image) => {
      if (!image) {

      } else {
        $('#main-image').html(`
          <a data-zoom-id="main" href="${$('#url_to').val()}/${image}" class="MagicZoom main_image" id="main"><img
                        src="${$('#url_to').val()}/${image}"></a>
          `)
      }
      MagicZoom.refresh();
    }

    const quantityCheck = (quantity) => {
      if (quantity > 0) {
        $('#product_badge').html(` <div class="product-badge product-available mt-n1 bg-green" style="top: -200" ><i
                                                  class="ci-security-check"></i>Sản phẩm còn hàng
                                              </div>`)
      } else {
        $('#product_badge').html(`<div class="product-badge product-available mt-n1 bg-red"><i
                                                  class="fas fa-times"></i>Sản phẩm hết hàng
                                              </div> `)
      }
    }
  </script>


  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {

      $(document).ready(function() {
        // Xử lý bình luận
        $(document).on('click', '.reply-comment', function(ev) {
          ev.preventDefault();
          let id = $(this).data('id')
          $('.comment-inline').addClass('d-none');
          $('.reply-comment-' + id).removeClass('d-none');
          // $('.comment-inline').slideUp();
          $('.reply-comment-' + id).slideDown();

          let tagName = '@' + $('.name-' + id).text() + ':'
          $('.body-' + id).val(tagName)

        })


        $(document).on('keyup', '.form-comment-text', function() {
          let text = $(this).val()
          if (text) {
            replaceText(text)
            $('.btn-submit-text').attr('disabled', false)
          } else {
            $('.btn-submit-text').attr('disabled', true)
          }
        })

        function replaceText(text) {
          text = text.replace(/lồn/gi, "***");
          text = text.replace(/cặc/gi, "***");
          text = text.replace(/dm/gi, "***");
          text = text.replace(/vãi/gi, "***");
          text = text.replace(/buồi/gi, "***");
          text = text.replace(/dái/gi, "***");
          text = text.replace(/địt/gi, "***");
          text = text.replace(/chịch/gi, "***");
          text = text.replace(/xoạc/gi, "***");
          text = text.replace(/vếu/gi, "***");
          text = text.replace(/vú/gi, "***");
          text = text.replace(/bụ/gi, "***");
          text = text.replace(/đụ/gi, "***");
          text = text.replace(/mé/gi, "***");
          text = text.replace(/mày/gi, "***");
          text = text.replace(/tao/gi, "***");
          text = text.replace(/gớm/gi, "***");
          text = text.replace(/tởm/gi, "***");
          $('.form-comment-text').val(text)
        }
      })
    })
  </script>
@endpush
