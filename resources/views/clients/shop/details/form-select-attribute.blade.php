<form id="choice_attribute_options" class="choice_attribute_options" onchange="getVariantPrice()">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">

  <div class="order-lg-1 pe-lg-4 text-center text-lg-start" style="display: inline-flex; padding-bottom: 25px">
    <p class="h2 text-dark mb-2" style="font-weight: 700; font-size: 1.25rem;">{{ trans($product->product_name) }}
      </h1>
  </div>
  <div class="row">

    <!-- Product gallery-->
    <div class="col-lg-4" id="content-wrapper">
      <ul id="imageGallery">
        <li data-thumb="{{ URL::to($product->product_image) }}" data-src="{{ URL::to($product->product_image) }}">
          <img width="100%" src="{{ URL::to($product->product_image) }}" />
        </li>
        @forelse (explode(',', $product->product_gallery) as $item)
        <li class="img-small" data-thumb="{{ URL::to($item) }}" data-src="{{ URL::to($item) }}">
            <img width="100%" src="{{ URL::to($item) }}" />
        </li>
        @empty
        @endforelse
    </ul>

    </div>


    <!-- Product details-->
    <div class="col-lg-4 pt-4 pt-lg-0">
      <div class="product-details ms-auto pb-3">
        <div class="price-and-icon mb-3 bg-light">

          <div class="product-price">
            <div class="product-price__current-price ">
              <h5>Giá gốc: </h5>
              @php
                $timestamp = time();
              @endphp
              @if (count($product->flash_deals) == 0)
                @if ($product->discount_unit == '%')
                  <span>{{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }}
                    ₫</span>
                  @if ($product->discount == 0)
                  @else
                    <small class="text-muted"
                      style="font-size: 22px; text-decoration: line-through">{{ number_format($product->unit_price) }}
                      ₫</small>
                  @endif
                @else
                  {{ number_format($product->unit_price - $product->discount) }}
                @endif
              @else
                @php
                  $flash_deal = $product->flash_deals()->first();
                @endphp
                @if ($timestamp > $flash_deal->date_end)
                  <span>{{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }}
                    ₫</span>
                  <small class="text-muted"
                    style="font-size: 22px; text-decoration: line-through">{{ number_format($product->unit_price) }}
                    ₫</small>
                @else
                  <span>{{ number_format($product->unit_price - ($product->unit_price * $flash_deal->discount) / 100) }}
                    ₫</span>
                  <small class="text-muted"
                    style="font-size: 22px; text-decoration: line-through">{{ number_format($product->unit_price) }}
                    ₫</small>
                @endif

              @endif

            </div>
          </div>

          @if (count($product->flash_deals) == 0)

          @else
            @php
              $flash_deal = $product->flash_deals()->first();
            @endphp

            @if ($timestamp > $flash_deal->date_end)

            @else
              <div class="_314-b55619"><a href="#!" class="">
                  <div class="_314-2d0405 d7e-a90f22 d7e-04f3bc d7e-2243f4"
                    style="background-image: url(&quot;https://media3.scdn.vn/img4/2020/06_18/FBnN0sGbAeXbPuZ7IIWp.png&quot;);">
                    <img src="https://media3.scdn.vn/img4/2020/06_18/jaGsAfx1dzgHf82AyWSI.png" alt="flash-sale"
                      class="_314-919f69">
                    <div class="_314-65a424">
                      <div class="_314-e778ac" data-date="{{ date('Y/m/d h:i:s', $flash_deal->date_end) }}"></div>
                    </div>
                  </div>
                </a>
              </div>
            @endif
          @endif


        </div>
        @if ($product->choice_options != null)
          @forelse (json_decode($product->choice_options) as $option)
            <div class="boxed-check-group boxed-check-success boxed-check-sm">
              @forelse ($option->values as $key => $value)
                <label class="boxed-check">
                  <input class="boxed-check-input" type="radio"
                    value="{{ str_replace([',', '/', '.', ':', ' '], '', $value) }}"
                    name="radio_custom_{{ $option->attribute_id }}" checked>
                  <div class="boxed-check-label" style="text-align:center;">
                    <img class="img-selected"
                      src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/selected-variant-indicator.svg"
                      alt="">
                    <?php
                    $variant_image_with_attr = \App\Models\ProductVariant::where('id_product', $product->id)
                        ->where('variant', 'like', '%' . str_replace([',', '/', '.', ':', ' '], '', $value) . '%')
                        ->first()->variant_image;
                    $variant_price_with_attr = \App\Models\ProductVariant::where('id_product', $product->id)
                        ->where('variant', 'like', '%' . str_replace([',', '/', '.', ':', ' '], '', $value) . '%')
                        ->first()->variant_price; ?>
                    <span class="boxed-check-text">
                      <p> <strong>{{ $value }}</strong></p>
                    </span>
                  </div>
                </label>
              @empty

              @endforelse

            </div>
          @empty

          @endforelse
        @else
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
                  name="radio_custom_color" checked>
                <div class="boxed-check-label" style="text-align:center;">
                  <img class="img-selected"
                    src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/selected-variant-indicator.svg"
                    alt="">
                  <?php
                  $name_color = \App\Models\Color::where('color_code', $value)->first()->color_name;
                  $slug_color = \App\Models\Color::where('color_code', $value)->first()->color_slug;
                  $variant_image = \App\Models\ProductVariant::where('id_product', $product->id)
                      ->where('variant', 'like', '%' . $slug_color . '%')
                      ->first()->variant_image;
                  $variant_price = \App\Models\ProductVariant::where('id_product', $product->id)
                      ->where('variant', 'like', '%' . $slug_color . '%')
                      ->first()->variant_price;
                  ?>
                  <span class="boxed-check-text"> <img class="cpslazy" src="{{ asset($variant_image) }}"
                      alt="hinh anh san pham">
                    <p style="margin-top: 6px;"> <strong>{{ $name_color }}</strong></p>
                  </span>
                </div>
              </label>
            @endforeach
          @endisset

        @empty($product->colors)
        @endempty
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
                href="https://cellphones.com.vn/danh-sach-khuyen-mai#gift">Giảm 1 triệu khi thanh
                toán qua ví Moca,
                thẻ tín dụng BIDV, Standard Charter (số lượng có hạn)&nbsp;<span class="color-red">(xem chi
                  tiết)</span></a></li>
            <li class="item-promotion general-promotion"><a href="https://cellphones.com.vn/thu-cu-doi-moi">Thu cũ lên
                đời - Trợ giá 1 triệu&nbsp;<span class="color-red">(xem chi tiết)</span></a>
            </li>
            <li class="item-promotion general-promotion"><a href="https://cellphones.com.vn/thu-cu-doi-moi">Thuế VAT:
                {{ $product->vat }} %</span></a>
            </li>
            @if ($product->multiple_stock == 'on')
              <li class="item-promotion general-promotion"><a href="#!" style="color: red"><strong>Sản phẩm số lượng
                    lớn</strong></span></a>
              </li>
            @else

            @endif
          </ul>
          <div class="cps-additional-note">
            <p><a style="text-transform: uppercase"><img src="https://cellphones.com.vn/media/icon/icon_fire.png"
                  style="width: 20px; ">&nbsp; Giảm thêm tới 1% cho thành viên Smember </a>
            </p>
          </div>
        </div>
      </div>
      <div class="box-promotion-more">
        <div class="box-title">
          <p class="box-title__title">Ưu đãi thêm</p>
        </div>
        <div class="box-content">
          <ul class="list-promotions">
            <ul>
              <li class="item-promotion"><a href="https://cellphones.com.vn/smember" target="_blank">Giảm thêm tới 1%
                  cho thành viên Smember</a></li>
              <li class="item-promotion"><a href="https://cellphones.com.vn/uu-dai-doi-tac/moca" target="_blank">Giảm
                  5% tối đa 500k khi thanh toán bằng ví Moca trên ứng dụng Grab (áp dụng đơn
                  hàng từ 500k)</a></li>
              <li class="item-promotion"><a href="https://cellphones.com.vn/uu-dai-doi-tac/fe-credit"
                  target="_blank">Giảm 500.000đ khi thanh toán hoặc trả góp từ 5 triệu trở lên
                  bằng thẻ tín dụng
                  FE Credit</a></li>
            </ul>
            <div id="gtx-trans" style="position: absolute; left: 12px; top: 41px;">
              <div class="gtx-trans-icon"></div>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-xl-4">
    @if (count($product->specifications) == 0)

    @else
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
    @endif

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
    <div class="d-flex mb-4 btn-wishcom">
      <div class="w-100 me-3 text-center">
        @if (Auth::user() != null)
          <?php
          $user = Auth::user()->id;
          $wishlist = App\Models\Wishlist::orderByDESC('id')
              ->where('id_prod', $product->id)
              ->where('id_user', $user)
              ->first();
          ?>
          @if ($wishlist != null)
            <button class="btn-wishlist_{{ $product->id }} nav-link-style me-3" style="cursor: pointer;color: red"
              onclick="add_to_wishlist({{ $product->id }})">
              <i class="ci-heart"></i> Xóa khỏi yêu thích
            </button>
          @elseif ($wishlist == NULL)
            <button class="btn-wishlist_{{ $product->id }} nav-link-style me-3" style="cursor: pointer;"
              onclick="add_to_wishlist({{ $product->id }})">
              <i class="ci-heart"></i> Thêm vào yêu thích
            </button>
          @endif
        @else
          <button class="btn-wishlist_{{ $product->id }} nav-link-style me-3" style="cursor: pointer;"
            onclick="add_to_wishlist({{ $product->id }})">
            <i class="ci-heart"></i> Thêm vào yêu thích
          </button>
        @endif
      </div>
    </div>
  </div>
</div>
</form>
