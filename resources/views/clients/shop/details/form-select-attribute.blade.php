<form id="choice_attribute_options" onchange="getVariantPrice()">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">

  <div class="row">
    <!-- Product gallery-->
    <div class="col-lg-7" id="content-wrapper">
      <div id="main-image">
        <a data-zoom-id="main" href="{{ asset($product->product_image) }}" class="MagicZoom main_image" id="main"><img
            src="{{ asset($product->product_image) }}"></a>
      </div>
      <div id="thumbnails">
        <a data-zoom-id="main" href="{{ asset($product->product_image) }}" data-image="{{ asset($product->product_image) }}"><img
            src="{{ asset($product->product_image) }}"></a>
        @foreach (explode(',', $product->product_gallery) as $key => $gallery)
          <a data-zoom-id="main" href="{{ asset($gallery) }}" data-image="{{ asset($gallery) }}"><img src="{{ asset($gallery) }}"></a>
        @endforeach
      </div>
    </div>
    <style>
      .price-and-icon {
        display: flex;
        flex-direction: column;
        border-radius: 4px;
        background-color: rgb(250, 250, 250);
        padding: 0px 16px 12px;
      }

      .price-and-icon .product-price {
        padding-top: 12px;
        display: flex;
        align-items: flex-end;
        color: rgb(56, 56, 61);
      }

      .price-and-icon .product-price__current-price {
        font-size: 32px;
        line-height: 40px;
        margin-right: 8px;
        font-weight: 500;
      }

    </style>
    <!-- Product details-->
    <div class="col-lg-5 pt-4 pt-lg-0">
      <div class="product-details ms-auto pb-3">
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
          <p class="h4 text-dark mb-2" style="font-weight: 400">{{ trans($product->product_name) }}</h1>
          <div>
            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i
                class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
            </div><span class="d-inline-block fs-sm text-black opacity-70 align-middle mt-1 ms-1">74 Reviews</span>
          </div>
        </div>
        <div class="price-and-icon mt-3">
          <div class="product-price">
            <div class="product-price__current-price">
              @if ($product->discount_unit == '%')
                {{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }} /
                <small>{{ $product->product_unit }}</small>
              @else
                {{ number_format($product->unit_price - $product->discount) }}
              @endif
            </div>
          </div>
          <div class="style-sc-11ucdwk-0 jfBwzZ">
            <div class="item mt-3"><span> <span class="text-success"><i class="fa fa-money"></i></span> Khuyến mãi :
                {{ $product->discount }}{{ $product->discount_unit }}</span></div>
            <div class="item mt-3"><span> <span class="text-success"><i class="fa fa-money"></i></span> Hoàn
                tiền 15%, miễn phí phí thường niên !</span></div>
            <div class="item mt-3"><span> <span><i class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i></span> Miễn phí vận
                chuyển !</span></div>
          </div>
        </div>
        @foreach (json_decode($product->choice_options) as $item)
          <div class="fs-sm mb-2"><span
              class="text-heading fw-medium me-1">{{ \App\Models\Attribute::where('id', $item->attribute_id)->first()->name }}:
          </div>
          <div class="boxed-check-group boxed-check-success boxed-check-sm">
            @foreach ($item->values as $key => $value)
              <label class="boxed-check">
                <input class="boxed-check-input" type="radio" name="radio_custom_{{ $item->attribute_id }}" value="{{ $value }}">
                <div class="boxed-check-label" style="text-align:center;">
                  <img class="img-selected"
                    src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/selected-variant-indicator.svg" alt="">
                  <span>{{ $value }}</span>
                </div>
              </label>
            @endforeach
          </div>
        @endforeach

        <div class="position-relative me-n4 mb-3">
          <div class="boxed-check-group boxed-check-sm">
            @isset($product->colors)
              <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Color:</span>
              </div>
              @foreach (json_decode($product->colors) as $key => $value)
                <label class="boxed-check">
                  <input class="boxed-check-input" type="radio" name="radio_custom_color"
                    value="{{ \App\Models\Color::where('color_code', $value)->first()->color_slug }}">
                  <div class="boxed-check-label" style="text-align:center; background: {{ $value }}; width: 25px; height: 25px; ">
                    <span></span>
                  </div>
                </label>
              @endforeach
            @endisset
            <div id="product_badge">

            </div>
          </div>
        </div>
        <style>
          .hhVFoh .label {
            font-size: 15px;
            line-height: 1.6;
          }

          .hhVFoh .group-input {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            margin-top: 8px;
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

        </style>
        <div class="d-flex">
          <div class="qty-and-message">
            <div class="QuantityInput__Wrapper-sc-h67rf2-0 hhVFoh">
              <p class="label">Số Lượng</p>
              <div class="group-input"><span class="qt-dec"><img
                    src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/icons-remove.svg" alt="remove-icon" width="20"
                    height="20"></span><input type="text" class="input quantity_number" name="product_quantity" id="product_quantity"
                  value="1"><span class="qt-inc"><img
                    src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/icons-add.svg" alt="add-icon" width="20"
                    height="20"></span></div>
            </div>
          </div>
        </div>
        <div class="position-relative me-n4 mb-3 mt-3">
          <div class="h5 fw-normal mb-3 me-1 total_product_price"></div>
        </div>


        <div class="d-flex align-items-center pt-2 pb-4">

          <button class="btn btn-primary btn-shadow d-block w-100 card_add_btn" style="border-radius: 40px; background-color:#EA2027"
            type="button"><i class="ci-cart fs-lg me-2"></i>Thêm vào giỏ
            hàng</button>
        </div>
        <div class="d-flex mb-4">
          <div class="w-100 me-3">
            <button class="btn btn-secondary d-block w-100" type="button"><i class="ci-heart fs-lg me-2"></i><span
                class='d-none d-sm-inline'>Add
                to </span>Wishlist</button>
          </div>
          <div class="w-100">
            <button class="btn btn-secondary d-block w-100" type="button"><i class="ci-compare fs-lg me-2"></i>Compare</button>
          </div>
        </div>
        @include('clients.shop.details.panel')
      </div>
    </div>
  </div>
</form>
