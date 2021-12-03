<!-- Product carousel (You may also like)-->
<div class="container pt-lg-2 pb-5 mb-md-3">
  <h2 class="h3 text-center pb-4">Sản phẩm liên quan</h2>
  <div class="tns-carousel tns-controls-static tns-controls-outside">
    <div class="tns-carousel-inner"
      data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
      <!-- Product-->
      @foreach (\App\Models\Product::where('product_id_category', '!=', $product->product_id_category)->get() as $proOther)
        <div>
          <div class="card product-card card-static">
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i
                class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="#"><img
                src="{{ asset($proOther->product_image) }}" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"></a>
              <h3 class="product-title fs-sm"><a href="#">{{ trans($proOther->product_name) }}</a>
              </h3>
              <div class="d-flex justify-content-between">
                <div class="product-price">{{ number_format($proOther->unit_price) }}</span>
                </div>
                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Product-->
      @endforeach
    </div>
  </div>
</div>
