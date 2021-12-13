<form id="choice_attribute_options" onchange="getVariantPrice()">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">

  <div class="order-lg-1 pe-lg-4 text-center text-lg-start" style="display: inline-flex; padding-bottom: 25px">
    <p class="h2 text-dark mb-2" style="font-weight: 700; font-size: 1.25rem;">{{ trans($product->product_name) }}</h1>
  </div>
  <div class="row">
    <!-- Product gallery-->
    <div class="col-lg-4" id="content-wrapper">
      <div class="box-gallery">
        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
          class="swiper mySwiper2 gallery-slider ">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="{{ URL::to($product->product_image) }}" />
            </div>
            @forelse (explode(',', $product->product_gallery) as $item)
            <div class="swiper-slide">
              <img src="{{ URL::to($item) }}" />
            </div>
            @empty
            @endforelse
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
        <div thumbsSlider="" class="swiper mySwiper gallery-thumbs" style="margin-top: 10px;">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="{{ URL::to($product->product_image) }}" />
            </div>
            @forelse (explode(',', $product->product_gallery) as $item)
            <div class="swiper-slide">
              <img src="{{ URL::to($item) }}" />
            </div>
            @empty
            @endforelse
          </div>
        </div>
      </div>
    </div>
    <!-- Product details-->
    <div class="col-lg-4 pt-4 pt-lg-0">
      <div class="product-details ms-auto pb-3">
        <div class="price-and-icon mt-3 bg-light">
          <div class="product-price">
            <div class="product-price__current-price">
              @if ($product->discount_unit == '%')
              <span>{{ number_format($product->unit_price - ($product->unit_price *
                $product->discount) / 100) }} ₫</span>
              <small class="text-muted" style="font-size: 22px; text-decoration: line-through">{{
                number_format($product->unit_price) }}
                ₫</small>
              @else
              {{ number_format($product->unit_price - $product->discount) }}
              @endif
            </div>
          </div>
        </div>
        @if ($product->choice_options != null)
        @forelse (json_decode($product->choice_options) as $option)
        <div class="boxed-check-group boxed-check-success boxed-check-sm">
          @forelse ($option->values as $key => $value)
          <label class="boxed-check">
            <input class="boxed-check-input" type="radio" value="{{ str_replace([',', '/','.',':',' '], '', $value) }}"
              name="radio_custom_{{ $option->attribute_id }}">
            <div class="boxed-check-label" style="text-align:center;">
              <img class="img-selected"
                src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/selected-variant-indicator.svg"
                alt="">
              <?php 
                    $variant_image_with_attr = \App\Models\ProductVariant::where('id_product', $product->id)->where('variant', 'like', '%'.str_replace([',', '/','.',':',' '], '', $value).'%')->first()->variant_image;
                    $variant_price_with_attr = \App\Models\ProductVariant::where('id_product', $product->id)->where('variant', 'like', '%'.str_replace([',', '/','.',':',' '], '', $value).'%')->first()->variant_price; ?>
              <span class="boxed-check-text"> <img class="cpslazy" src="{{ asset($variant_image_with_attr) }}"
                  alt="hinh anh san pham">
                <p> <strong>{{ $value}}</strong> <span>{{ number_format($variant_price_with_attr) }}</span></p>
              </span>
            </div>
          </label>
          @empty

          @endforelse

        </div>
        @empty

        @endforelse
        @endif
        <div class="boxed-check-group boxed-check-success boxed-check-sm">
          @isset($product->colors)
          <div class="fs-sm mb-2" style="text-align: left !important; width:100%"><span
              class="text-heading fw-medium me-1"><strong>Chọn màu sắc để xem giá </strong></span>
          </div>
          @foreach (json_decode($product->colors) as $key => $value)
          <label class="boxed-check">
            <input class="boxed-check-input" type="radio"
              value="{{ \App\Models\Color::where('color_code', $value)->first()->color_slug }}"
              name="radio_custom_color">
            <div class="boxed-check-label" style="text-align:center;">
              <img class="img-selected"
                src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/selected-variant-indicator.svg"
                alt="">
              <?php 
              $name_color = \App\Models\Color::where('color_code', $value)->first()->color_name; 
              $slug_color = \App\Models\Color::where('color_code', $value)->first()->color_slug; 
              $variant_image = \App\Models\ProductVariant::where('id_product', $product->id)->where('variant', 'like', '%'.$slug_color.'%')->first()->variant_image;
              $variant_price = \App\Models\ProductVariant::where('id_product', $product->id)->where('variant', 'like', '%'.$slug_color.'%')->first()->variant_price;
              ?>
              <span class="boxed-check-text"> <img class="cpslazy" src="{{ asset($variant_image) }}"
                  alt="hinh anh san pham">
                <p> <strong>{{ $name_color}}</strong> <span>{{ number_format($variant_price) }}</span></p>
              </span>
            </div>
          </label>
          @endforeach
          @endisset
        </div>
        <div class="box-promotion">
          <div class="box-title">
            <p class="box-title__title"><svg xmlns="http://www.w3.org/2000/svg" width="13.125" height="15"
                viewBox="0 0 13.125 15">
                <path id="gift"
                  d="M14.656,4.693H2.469A.468.468,0,0,0,2,5.161V9.38a.468.468,0,0,0,.469.469h.469v4.687A.468.468,0,0,0,3.406,15H13.719a.468.468,0,0,0,.469-.469V9.849h.469a.468.468,0,0,0,.469-.469V5.161A.468.468,0,0,0,14.656,4.693ZM7.625,13.6a.468.468,0,0,1-.469.469H4.344a.468.468,0,0,1-.469-.469V9.849a.468.468,0,0,1,.469-.469H7.156a.468.468,0,0,1,.469.469Zm0-5.625a.468.468,0,0,1-.469.469H3.406a.468.468,0,0,1-.469-.469V6.1a.468.468,0,0,1,.469-.469h3.75a.468.468,0,0,1,.469.469ZM13.25,13.6a.468.468,0,0,1-.469.469H9.969A.468.468,0,0,1,9.5,13.6V9.849a.468.468,0,0,1,.469-.469h2.812a.468.468,0,0,1,.469.469Zm.937-5.625a.468.468,0,0,1-.469.469H9.969A.468.468,0,0,1,9.5,7.974V6.1a.468.468,0,0,1,.469-.469h3.75a.468.468,0,0,1,.469.469ZM6.481,4.692h4.312A3.266,3.266,0,0,0,12.314,2.72a1.5,1.5,0,0,0-.645-1.383,1.64,1.64,0,0,0-1.013-.4c-1.07,0-1.675,1.312-2,2.483C8.264,1.926,7.509.005,6.213.005A1.7,1.7,0,0,0,5.092.492a1.886,1.886,0,0,0-.725,1.747A4.185,4.185,0,0,0,6.481,4.692Zm4.176-2.631a.686.686,0,0,1,.386.18c.242.19.228.308.225.347-.045.41-.814,1.055-1.711,1.587.264-1.135.7-2.114,1.1-2.114Zm-4.891-.7a.782.782,0,0,1,.447-.228c.58,0,1.177,1.523,1.525,3-1.1-.584-2.229-1.412-2.33-2.077C5.394,1.965,5.357,1.719,5.766,1.357Z"
                  transform="translate(-2 -0.005)" fill="#d70018"></path>
              </svg>&nbsp;Khuyến Mãi</p>
          </div>
          <div class="box-content">
            <ul class="list-promotions">
              <li class="item-promotion general-promotion"><a
                  href="https://cellphones.com.vn/danh-sach-khuyen-mai#gift">Giảm 1 triệu khi thanh toán qua ví Moca,
                  thẻ tín dụng BIDV, Standard Charter (số lượng có hạn)&nbsp;<span class="color-red">(xem chi
                    tiết)</span></a></li>
              <li class="item-promotion general-promotion"><a href="https://cellphones.com.vn/thu-cu-doi-moi">Thu cũ lên
                  đời - Trợ giá 1 triệu&nbsp;<span class="color-red">(xem chi tiết)</span></a></li>
            </ul>
            <div class="cps-additional-note">
              <p><a data-toggle="modal" data-target="#myModal"><strong><img
                      src="https://cellphones.com.vn/media/icon/icon_fire.png" style="width: 20px;">&nbsp;DANH SÁCH CỬA
                    HÀNG ĐÃ CÓ HÀNG TRẢI NGHIỆM</strong></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <!-- Product panels-->
      <div class="accordion mb-4" id="productPanels">
        <div class="accordion-item" style="border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 5px;">
          <p class="accordion-header" style="padding-left: 20px; padding-top: 25px;"><span
              style="font-size: 1.25rem; font-weight: 700; color: #000;">Thông số kỹ thuật</span>
          </p>
          <div class="accordion-collapse collapse show" style="padding: 15px;">
            <table class="table table-striped" border="0">
              <style>
                table tr,
                table tr th,
                table tr td {
                  border: none;
                }
              </style>
              <tbody>
                @forelse ($product->specifications as $item)
                <tr>
                  <th>{{ $item->specifications }}</th>
                  <td>{{ $item->value }}</td>
                </tr>
                @empty
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="me-n4 mb-3 row" style="">
        <div class="qty-and-message col-12">
          <div class="QuantityInput__Wrapper-sc-h67rf2-0 hhVFoh" style="margin: auto 0; display: flex">
            <p class="label text-heading fw-medium">Số Lượng: </p>
            <div class="group-input" style="">
              <span class="qt-dec">
                <img src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/icons-remove.svg"
                  alt="remove-icon" width="20" height="20">
              </span>
              <input type="text" class="input quantity_number" name="product_quantity" id="product_quantity" value="1">
              <span class="qt-inc">
                <img src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/icons-add.svg"
                  alt="add-icon" width="20" height="20">
              </span>
            </div>
            <div id="product_badge">

            </div>
          </div>
        </div>
      </div>

      <div class="position-relative me-n4 mb-3 mt-3">
        <div class="h5 fw-normal mb-3 me-1 total_product_price"></div>
      </div>

      <div class="d-flex align-items-center pt-2 pb-4">
        <button class="btn btn-primary btn-shadow d-block w-100 card_add_btn"
          style="border-radius: 40px; background-color:#EA2027" type="button">
          <i class="ci-cart fs-lg me-2"></i>Thêm vào giỏ hàng
        </button>
      </div>
      <div class="d-flex mb-4">
        <div class="w-100 me-3">
          <button class="btn btn-secondary d-block w-100" type="button"><i class="ci-heart fs-lg me-2"></i>
            <span class='d-none d-sm-inline'>Thêm vào yêu thích</span>
          </button>
        </div>
        <div class="w-100">
          <button class="btn btn-secondary d-block w-100" type="button">
            <i class="ci-compare fs-lg me-2"></i>So sánh
          </button>
        </div>
      </div>
      {{-- @include('clients.shop.details.panel') --}}
    </div>
  </div>
  {{-- </div> --}}
</form>