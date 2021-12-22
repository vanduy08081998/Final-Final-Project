<!-- Product carousel (You may also like)-->
<?php
  use App\Models\Wishlist;
  ?>
<div class="container pt-lg-2 pb-5 mb-md-3 other-product">
  <h2 class="h3 text-center pb-4">Sản phẩm liên quan</h2>
  <div class="tns-carousel tns-controls-static tns-controls-outside">
    <div class="tns-carousel-inner"
      data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
      <!-- Product-->
      @foreach (\App\Models\Product::where('product_id_category', '!=', $product->product_id_category)->get() as $proOther)
      <div class="product-item">
        <div class="card product-card">
          @if ($proOther->discount == 0)
          @else
            <span class="badge bg-danger badge-shadow">Giảm giá
              {{ $proOther->discount }}@if ($proOther->discount_unit == '%') % @else ₫ @endif</span>
          @endif
          <a class="card-img-top d-block overflow-hidden"
            href="{{ route('shop.product-details', $proOther->product_slug) }}">
            <img srcset="{{ URL::to($proOther->product_image) }} 2x" alt="Product" width="200px"
              style="margin: auto; display: block">
          </a>
          <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1 category-name text-center"
              href="#">{{ $proOther->Category->category_name }}</a>
            <h3 class="product-title fs-sm text-center"><a
                href="{{ route('shop.product-details', $proOther->product_slug) }}">{{ Str::limit($proOther->product_name, 30, '...') }}</a>
            </h3>
            <div class="d-flex justify-content-between sale-price">
              @if ($proOther->discount != 0)
                <div class="product-price">
                  <span>{{ number_format($proOther->unit_price - ($proOther->unit_price * $proOther->discount) / 100) }}
                    ₫</span>
                </div>
                <div class="product-price" style="font-size: 12px; margin-top: 4px;">
                  <span
                    style="text-decoration: line-through; color: black;">{{ number_format($proOther->unit_price) }}
                    ₫</span>
                </div>
              @elseif ($proOther->discount == 0)
                <div class="product-price w-100 text-center">
                  <span>{{ number_format($proOther->unit_price) }}
                    ₫</span>
                </div>
                <div class="product-price d-block d-sm-none" style="height: 12px">
                  <span style="text-decoration: line-through"></span>
                </div>
              @endif
            </div>
            <div class="d-flex justify-content-between">
              <div class="star-rating w-100 text-center">
                @php
                  $arrayRating = [];
                  $avg = 0;
                  $total = 0;
                  $reviews = \App\Models\Review::where('product_id', $proOther->id)->get();
                  $count = 0;
                  if (count($reviews) > 0) {
                      $count = count($reviews);
                      foreach ($reviews as $key => $review) {
                          $total += $review->count_rating;
                      }
                      $avg = round($total / $count);
                  } else {
                      $avg = 0;
                      $count = 0;
                  }
                @endphp

                @if ($reviews != null)
                  @for ($i = 0; $i < 5; $i++)
                    @for ($j = 0; $j < $avg; $j++)
                      @php
                        array_push($arrayRating, $j);
                      @endphp
                    @endfor
                    <i class="star-rating-icon ci-star-filled @if (in_array($i, $arrayRating)) active @endif"></i>
                  @endfor
                @else

                @endif
              </div>
            </div>
          </div>
          <div class="card-body card-body-hidden text-center" id="card-body"
            style="z-index: 10; display: inline; padding: 15px">
            @if (Auth::user() != null)
              <?php
              $user = Auth::user()->id;
              $wishlist = Wishlist::orderByDESC('id')
                  ->where('id_prod', $proOther->id)
                  ->where('id_user', $user)
                  ->first();
              ?>
              @if ($wishlist != null)
                <a class="btn-wishlist_{{ $proOther->id }} nav-link-style me-3" style="cursor: pointer"
                  onclick="add_to_wishlist({{ $proOther->id }})">
                  <i class="ci-heart"></i>
                </a>
              @elseif ($wishlist == NULL)
                <a class="btn-wishlist_{{ $proOther->id }} nav-link-style me-3" style="cursor: pointer"
                  onclick="add_to_wishlist({{ $proOther->id }})">
                  <i class="ci-heart"></i>
                </a>
              @endif
            @else
              <a class="btn-wishlist_{{ $proOther->id }} nav-link-style me-3" style="cursor: pointer"
                onclick="add_to_wishlist({{ $proOther->id }})">
                <i class="ci-heart"></i>
              </a>
            @endif
            <input type="hidden" id="wishlist_productsku{{ $proOther->id }}"
              value="{{ $proOther->specifications }}">
            <input type="hidden" value="{{ $proOther->id }}">
            <input type="hidden" id="wishlist_productname{{ $proOther->id }}"
              value="{{ $proOther->product_name }}">
            <input type="hidden" id="wishlist_productprice{{ $proOther->id }}"
              value="{{ number_format($proOther->unit_price) }}">
            <input type="hidden" id="wishlist_productimg{{ $proOther->id }}"
              value="{{ url($proOther->product_image) }}">
            <a type="hidden" id="wishlist_producturl{{ $proOther->id }}"
              href="{{ route('shop.product-details', $proOther->product_slug) }}">
            </a>
            </a>
            <a class="nav-link-style me-3" onclick="quickviewModal({{ $proOther->id }})">
              <i class="ci-eye"></i>
            </a>
          </div>
          <!-- Quick View Modal-->
        </div>
      </div>>
        <!-- Product-->
      @endforeach
    </div>
  </div>
</div>
