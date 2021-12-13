<style>
  .hhVFoh .label {
    font-size: 15px;
    line-height: 1.6;
  }

  .hhVFoh .group-input {
    display: inline-flex;
    -webkit-box-align: center;
    align-items: center;
    margin-top: -16px;
    margin-left: 10px;
  }

  .hhVFoh .group-input span:first-child {
    border-right: none;
    border-radius: 4px 0px 0px 4px;
    padding: 4px;
  }

  .hhVFoh .group-input span {
    cursor: pointer;
    width: 30px;
    background-color: rgb(255, 255, 255);
    border: 1px solid rgb(236, 236, 236);
  }

  .hhVFoh .group-input input {
    width: 40px;
    border: 1px solid rgb(236, 236, 236);
  }

  .hhVFoh .group-input span,
  .hhVFoh .group-input input {
    height: 30px;
    color: rgb(36, 36, 36);
    font-size: 14px;
    text-align: center;
    outline: none;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
  }

  .hhVFoh .disable {
    pointer-events: none !important;
  }

  .price-and-icon {
    display: flex;
    flex-direction: column;
    border-radius: 4px;
    background-color: rgb(250, 250, 250);
    padding: 0px 0px 12px;
  }

  .price-and-icon .product-price {
    padding-top: 12px;
    display: flex;
    align-items: flex-end;
    color: rgb(56, 56, 61);
  }

  .price-and-icon .product-price__current-price {
    font-size: 1.5rem;
    line-height: 40px;
    margin-right: 8px;
    font-weight: 700;
    color: #D70018;
  }

  #thumbnails img,
  #main {
    box-shadow: none !important;
  }

  .boxed-check .cpslazy {
    width: 30px;
    height: auto;
    margin: 4px 0px;
  }

  .boxed-check-text {
    display: flex;
  }

  .boxed-check-label .boxed-check-text p {
    display: flex;
    flex-direction: column;
    margin-bottom: 0;
    font-size: 12px;
    color: #444444;
  }
</style>
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
        <div class="swiper-container gallery-slider">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{ asset($product->product_image) }}" alt=""></div>
            @foreach (explode(',', $product->product_gallery) as $item)
            <div class="swiper-slide"><img src="{{ asset($item) }}" alt=""></div>
            @endforeach
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>

        <div class="swiper-container gallery-thumbs">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{ asset($product->product_image) }}" alt=""></div>
            @foreach (explode(',', $product->product_gallery) as $item)
            <div class="swiper-slide"><img src="{{ asset($item) }}" alt=""></div>
            @endforeach


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
              <span>{{ $value }}</span>
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

              <span class="boxed-check-text"> <img class="cpslazy"
                  src="https://cdn.cellphones.com.vn/media/catalog/product/cache/7/thumbnail/9df78eab33525d08d6e5fb8d27136e95/i/p/iphone_13-_pro-2_1_5.jpg"
                  alt="hinh anh san pham">
                <p> <strong>{{ \App\Models\Color::where('color_code', $value)->first()->color_name
                    }}</strong> <span>26.000.000</span></p>
              </span>
            </div>
          </label>
          @endforeach
          @endisset
        </div>
        <div class="style-sc-11ucdwk-0 jfBwzZ mb-3 mt-4" style="border-radius: 20px; border: 1px solid #D70018">
          <div class="item mt-3" style="margin-left: 10px">
            <span>
              <span class="text-success"><i class="fa fa-money"></i></span> Khuyến mãi :
              {{ $product->discount }}{{ $product->discount_unit }}
            </span>
          </div>
          <div class="item mt-3" style="margin-left: 10px">
            <span>
              <span class="text-success"><i class="fa fa-money"></i></span>
              Hoàn tiền 15%, miễn phí phí thường niên !
            </span>
          </div>
          @if ($product->shipping_type == 'free_ship')
          <div class="item mt-3" style="margin-left: 10px"><span> <span><i
                  class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i></span> Miễn phí vận
              chuyển !</span></div>
          @else
          <div class="item mt-3" style="margin-left: 10px"><span> <span><i
                  class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i></span> Phí vận chuyển cơ bản trong
              tỉnh : {{ number_format($product->shipping_stock) }}</span></div>
          @endif
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

      <div class="me-n4 mb-3 row" style="text-align: center;">
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

      <div class="position-relative me-n4 mb-3 mt-3 text-center">
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