@extends('layouts.client_master')


@section('title', $flashDeals->title)


@section('content')
  <?php
  use App\Models\Wishlist;
  ?>
  <!-- Page Title-->
  <div class="page-title-overlap bg-dark pt-4">
    <div class="container py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2 pb-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center">
            <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Trang
                chủ</a></li>
            <li class="breadcrumb-item text-nowrap"><a href="#">{{ $flashDeals->title }}</a>
            </li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 text-center">
        <h1 class="h5 text-light mb-0">
          {{ $flashDeals->title }}</h1>
        <h3 style="color: #fff" class="end_date" data-date="{{ date('Y/m/d h:i:s', $flashDeals->date_end) }}">Còn
          : <span id="countdown"></span></h3>
      </div>
    </div>
  </div>
  <div class="container-fluid pb-5 mb-2 mb-md-4">
    <div class="row justify-content-center">
      <!-- Content  -->
      <section class="col-lg-9 tab-content-shop" style="padding-right: 50px;">
        <!-- Toolbar-->
        <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
          <div class="d-flex flex-wrap">
            <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">

            </div>
          </div>
        </div>
        <!-- Products grid-->
        <div class="row mx-n2 mt-3" id="product-short">
          <!-- Product-->
          @foreach ($products as $pro)
            <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
              <div class="card product-card">
                <a class="card-img-top d-block overflow-hidden"
                  href="{{ route('shop.product-details', $pro->product_slug) }}">
                  <img srcset="{{ URL::to($pro->product_image) }} 2x" alt="Product" width="200px"
                    style="margin: auto; display: block">
                </a>
                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1 category-name"
                    href="#">{{ $pro->Category->category_name }}</a>
                  <h3 class="product-title fs-sm"><a
                      href="shop-single-v1.html">{{ Str::limit($pro->product_name, 30, '...') }}</a>
                  </h3>
                  <div class="d-flex justify-content-between">
                    <div class="product-price"><span class="text-accent">{{ number_format($pro->unit_price) }}
                        ₫</span>
                    </div>
                    <div class="star-rating">
                      <i class="star-rating-icon ci-star-filled active"></i>
                      <i class="star-rating-icon ci-star-filled active"></i>
                      <i class="star-rating-icon ci-star-filled active"></i>
                      <i class="star-rating-icon ci-star-filled active"></i>
                      <i class="star-rating-icon ci-star"></i>
                    </div>
                  </div>
                </div>

                <div class="card-body card-body-hidden text-center" style="z-index: 10; display: inline; padding: 15px">
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
                  <input type="hidden" id="wishlist_productimg{{ $pro->id }}"
                    value="{{ url($pro->product_image) }}">
                  <a type="hidden" id="wishlist_producturl{{ $pro->id }}"
                    href="{{ route('shop.product-details', $pro->product_slug) }}">
                  </a>
                  <a class="btn-action nav-link-style me-3" style="cursor:pointer;"
                    onclick="add_compare({{ $pro->id }})">
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
        </div>

        <!-- Pagination-->
        <nav class="d-flex justify-content-center pt-2" aria-label="Page navigation">
          {{-- {{ $product->links() }} --}}
        </nav>
      </section>
    </div>
  </div>
@endsection

@push('script')
  <script>
    let end_date = $('.end_date').attr('data-date')
    $('#countdown').countdown(end_date, {
        elapse: true
      })
      .on('update.countdown', function(event) {
        var $this = $(this);
        if (event.elapsed) {
          $this.html(event.strftime('After end: <span>%H:%M:%S</span>'));
        } else {
          $this.html(event.strftime('<span class="hour">%H</span>:<span class="min">%M</span>:<span class="sec">%S</span>'));
        }
      });
  </script>
@endpush
