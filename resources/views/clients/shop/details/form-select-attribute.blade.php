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

      #thumbnails img, #main {
        box-shadow: none !important;
    }
</style>
<form id="choice_attribute_options" onchange="getVariantPrice()">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">

  <div class="order-lg-1 pe-lg-4 text-center text-lg-start" style="display: inline-flex; padding-bottom: 25px; margin-left: 25px;">
        <p class="h2 text-dark mb-2" style="font-weight: 600">{{ trans($product->product_name) }}</h1>
        <div style="margin-left:30px !important; margin: auto 0">
          <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
              class="star-rating-icon ci-star-filled active"></i><i
              class="star-rating-icon ci-star-filled active"></i><i
              class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
          </div><span class="d-inline-block fs-sm text-black opacity-70 align-middle mt-1 ms-1">74 Reviews</span>
        </div>
      </div>
  <div class="row">
    <!-- Product gallery-->
    <div class="col-lg-4" id="content-wrapper" style="margin-left: 25px;">
      
      <div id="main-image">
        <a data-zoom-id="main" href="{{ asset($product->product_image) }}" class="MagicZoom main_image" id="main"><img
            src="{{ asset($product->product_image) }}"></a>
      </div>
      <div id="thumbnails">
        <a data-zoom-id="main" href="{{ asset($product->product_image) }}"
          data-image="{{ asset($product->product_image) }}"><img src="{{ asset($product->product_image) }}"></a>
        @foreach (explode(',', $product->product_gallery) as $key => $gallery)
        <a data-zoom-id="main" href="{{ asset($gallery) }}" data-image="{{ asset($gallery) }}"><img
            src="{{ asset($gallery) }}"></a>
        @endforeach
      </div>
    </div>
    <!-- Product details-->
    <div class="col-lg-4 pt-4 pt-lg-0">
      <div class="product-details ms-auto pb-3">
        <div class="price-and-icon mt-3 bg-light">
          <div class="product-price">
            <div class="product-price__current-price">
              @if ($product->discount_unit == '%')
              <span class="text-danger">{{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }} ₫</span>
              <span class="text-muted" style="font-size: 22px; text-decoration: line-through">2.000.000 ₫</span>
              @else
              {{ number_format($product->unit_price - $product->discount) }}
              @endif
            </div>
          </div>
        </div>
        <div class="fs-sm mb-2"><span class="text-heading fw-medium me-1"> Ram:
        </div>
        <div class="boxed-check-group boxed-check-success boxed-check-sm">
          <label class="boxed-check">
            <input class="boxed-check-input" type="radio" name="">
            <div class="boxed-check-label" style="text-align:center;">
              <img class="img-selected"
                src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/selected-variant-indicator.svg"
                alt="">
              <span>ThUộc tính</span>
            </div>
          </label>
          <label class="boxed-check">
            <input class="boxed-check-input" type="radio" name="">
            <div class="boxed-check-label" style="text-align:center;">
              <img class="img-selected"
                src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/selected-variant-indicator.svg"
                alt="">
              <span>ThUộc tính</span>
            </div>
          </label>
          <label class="boxed-check">
            <input class="boxed-check-input" type="radio" name="">
            <div class="boxed-check-label" style="text-align:center;">
              <img class="img-selected"
                src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/selected-variant-indicator.svg"
                alt="">
              <span>ThUộc tính</span>
            </div>
          </label>
          <label class="boxed-check">
            <input class="boxed-check-input" type="radio" name="">
            <div class="boxed-check-label" style="text-align:center;">
              <img class="img-selected"
                src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/selected-variant-indicator.svg"
                alt="">
              <span>ThUộc tính</span>
            </div>
          </label>
        </div>
        <div class="boxed-check-group boxed-check-success boxed-check-sm text-center">
          @isset($product->colors)
          <div class="fs-sm mb-2" style="text-align: left !important; width:100%"><span class="text-heading fw-medium me-1">Color:</span>
          </div>
          @foreach (json_decode($product->colors) as $key => $value)
          <label class="boxed-check" style="">
            <input class="boxed-check-input" type="radio" name="radio_custom_color"
              value="{{ \App\Models\Color::where('color_code', $value)->first()->color_slug }}">
            <div class="boxed-check-label border" style="text-align:center; background: {{ $value }}; width: 50px; height: 33px;">
              <span></span>
            </div>
          </label>
          @endforeach
          @endisset
        </div>
        <div class="style-sc-11ucdwk-0 jfBwzZ mb-3 mt-4" style="border-radius: 20px; border: 1px solid #D70018; width: 100%">
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
   <div class="accordion-item" style="border-radius: 20px">
     <h3 class="accordion-header" style="padding: 10px; ">Thông số kỹ thuật</h3>
     <div class="accordion-collapse collapse show">
      <table class="table table-striped">
        <tbody>
        @foreach (json_decode($product->choice_options) as $item)
        <tr>
          <th scope="row">{{ \App\Models\Attribute::where('id', $item->attribute_id)->first()->name }}:</th>
              @foreach ($item->values as $key => $value)
                <?php $attribure_name_details = \App\Models\Variant::where('name', $value)->first()->name ?>
              <td>{!! $attribure_name_details !!}</td>
              @endforeach
        </tr>
        @endforeach
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
                <img src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/icons-remove.svg" alt="remove-icon" width="20" height="20">
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
            <button class="btn btn-primary btn-shadow d-block w-100 card_add_btn" style="border-radius: 40px; background-color:#EA2027" type="button">
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
