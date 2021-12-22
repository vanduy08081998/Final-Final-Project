 <?php
 use App\Models\Wishlist;
 ?>


 @foreach ($products as $pro)
   <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
     <div class="card product-card">
       @if ($pro->discount == 0)
       @else
         <span class="badge bg-danger badge-shadow">Giảm giá
           {{ $pro->discount }}@if ($pro->discount_unit == '%') % @else ₫ @endif</span>
       @endif
       <a class="card-img-top d-block overflow-hidden" href="{{ route('shop.product-details', $pro->product_slug) }}">
         <img srcset="{{ URL::to($pro->product_image) }} 2x" alt="Product" width="200px"
           style="margin: auto; display: block">
       </a>
       <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1 category-name text-center"
           href="#">{{ $pro->Category->category_name }}</a>
         <h3 class="product-title fs-sm text-center"><a
             href="shop-single-v1.html">{{ Str::limit($pro->product_name, 30, '...') }}</a>
         </h3>
         <div class="d-flex justify-content-between">
           @if ($pro->discount != 0)
             <div class="product-price">
               <span>{{ number_format($pro->unit_price - ($pro->unit_price * $pro->discount) / 100) }}
                 ₫</span>
             </div>
             <div class="product-price" style="font-size: 12px">
               <span style="text-decoration: line-through">{{ number_format($pro->unit_price) }}
                 ₫</span>
             </div>
           @elseif ($pro->discount == 0)
             <div class="product-price w-100 text-center">
               <span>{{ number_format($pro->unit_price) }}
                 ₫</span>
             </div>
           @endif
         </div>
         <div class="d-flex justify-content-between">
           <div class="star-rating w-100 text-center">
             @php
               $arrayRating = [];
               $avg = 0;
               $total = 0;
               $reviews = \App\Models\Review::where('product_id', $pro->id)->get();
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
               ->where('id_prod', $pro->id)
               ->where('id_user', $user)
               ->first();
           ?>
           @if ($wishlist != null)
             <a class="btn-wishlist_{{ $pro->id }} nav-link-style me-3" style="cursor: pointer"
               onclick="add_to_wishlist({{ $pro->id }})">
               <i class="ci-heart"></i>
             </a>
           @elseif ($wishlist == NULL)
             <a class="btn-wishlist_{{ $pro->id }} nav-link-style me-3" style="cursor: pointer"
               onclick="add_to_wishlist({{ $pro->id }})">
               <i class="ci-heart"></i>
             </a>
           @endif
         @else
           <a class="btn-wishlist_{{ $pro->id }} nav-link-style me-3" style="cursor: pointer"
             onclick="add_to_wishlist({{ $pro->id }})">
             <i class="ci-heart"></i>
           </a>
         @endif
         <input type="hidden" id="wishlist_productsku{{ $pro->id }}" value="{{ $pro->specifications }}">
         <input type="hidden" value="{{ $pro->id }}">
         <input type="hidden" id="wishlist_productname{{ $pro->id }}" value="{{ $pro->product_name }}">
         <input type="hidden" id="wishlist_productprice{{ $pro->id }}"
           value="{{ number_format($pro->unit_price) }}">
         <input type="hidden" id="wishlist_productimg{{ $pro->id }}" value="{{ url($pro->product_image) }}">
         <a type="hidden" id="wishlist_producturl{{ $pro->id }}"
           href="{{ route('shop.product-details', $pro->product_slug) }}">
         </a>
         <a class="btn-action nav-link-style me-3" style="cursor:pointer;" onclick="add_compare({{ $pro->id }})">
           <i class="ci-compare me-1"></i>
         </a>
         <a class="nav-link-style me-3" onclick="quickviewModal({{ $pro->id }})">
           <i class="ci-eye"></i>
         </a>
       </div>
       <!-- Quick View Modal-->
     </div>
   </div>
   <hr class="d-sm-none">
 @endforeach
