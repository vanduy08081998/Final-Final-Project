 <?php
  use App\Models\Wishlist;
  ?>
 @foreach ($products as $pro)

        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
          <div class="card product-card">
            @if (Auth::user() != null)
            <?php
                  $user = Auth::user()->id;
                  $wishlist = Wishlist::orderByDESC('id')
                      ->where('id_prod', $pro->id)
                      ->where('id_user', $user)
                      ->first();
                  ?>
            @if ($wishlist != null)
            <button class="btn-wishlist_{{$pro->id}} btn-sm text-danger type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Xóa khỏi yêu thích" onclick="add_to_wishlist({{ $pro->id }})">
              <i class="ci-heart"></i>
            </button>
            @elseif ($wishlist == NULL)
            <button class="btn-wishlist_{{$pro->id}} btn-sm text-muted" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích" onclick="add_to_wishlist({{ $pro->id }})">
              <i class="ci-heart"></i>
            </button>
            @endif
            @else
            <button class="btn-wishlist_{{$pro->id}} btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Thêm vào yêu thích" onclick="add_to_wishlist({{ $pro->id }})">
              <i class="ci-heart"></i>
            </button>
            @endif
            <a class="card-img-top d-block overflow-hidden"
              href="{{ route('shop.product-details', $pro->product_slug) }}">
              <img srcset="{{ URL::to($pro->product_image) }} 2x" alt="Product" width="200px"
                style="margin: auto; display: block">
            </a>
            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1 category-name" href="#">{{ $pro->Category->category_name }}</a>
              <h3 class="product-title fs-sm"><a href="shop-single-v1.html">{{ Str::limit($pro->product_name,30,'...')
                  }}</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">{{ number_format($pro->unit_price) }}</span></div>
                <div class="star-rating">
                  <i class="star-rating-icon ci-star-filled active"></i>
                  <i class="star-rating-icon ci-star-filled active"></i>
                  <i class="star-rating-icon ci-star-filled active"></i>
                  <i class="star-rating-icon ci-star-filled active"></i>
                  <i class="star-rating-icon ci-star"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="d-sm-none">
        @endforeach
