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
    <!-- Product details-->
    <div class="col-lg-5 pt-4 pt-lg-0">
      <div class="product-details ms-auto pb-3">
        <div class="h5 fw-normal text-accent mb-3 me-1">
          {{ number_format($product->unit_price) }} / {{ $product->product_unit }}
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
        <div class="d-flex">
          <span>Số lượng : &nbsp;</span>
          <div class="d-flex text-center mx-auto form-quantity">
            <span class="qt-dec">-</span>
            <input type="number" class="form-control quantity_number" name="product_quantity" id="product_quantity" min="1" value="1">
            <span class="qt-inc">+</span>
          </div>
        </div>
        <div class="position-relative me-n4 mb-3 mt-3">
          <div class="h5 fw-normal mb-3 me-1 total_product_price"></div>
        </div>


        <div class="d-flex align-items-center pt-2 pb-4">

          <button class="btn btn-primary btn-shadow d-block w-100 card_add_btn" type="button"><i class="ci-cart fs-lg me-2"></i>Thêm vào giỏ
            hang</button>
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
