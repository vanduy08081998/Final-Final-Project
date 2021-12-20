<div class="bg-white shadow-lg p-4 ms-lg-auto">
        <div class="py-2 px-xl-2">
                <div class="widget mb-3">
                        <h2 class="widget-title text-center">Order summary</h2>
                        <?php $totalprice = 0; ?>
                        @forelse ($carts as $cart)
                        @foreach (json_decode($cart->specifications) as $key => $value)
                        <?php $totalprice += $value->variant_price * $cart->quantity; ?>
                        <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0"
                                        href="shop-single-v1.html"> @if ($value->variant_image != null)
                                        <img src="{{ asset($value->variant_image) }}" width="50" alt="Product">
                                        @else
                                        <img src="https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg"
                                                width="50" alt="Product">
                                        @endif</a>
                                <div class="ps-2">
                                        <h6 class="widget-product-title"><a href="shop-single-v1.html">{{
                                                        $value->product_name }}</a></h6>
                                        @if ($value->colors != null)
                                        <?php $colorname = \App\Models\Color::where('color_slug', $value->colors)->first()->color_name; ?>
                                        <div class="fs-sm"><span class="text-muted me-2">Màu sắc
                                                        :</span>{{ $colorname }}
                                        </div>
                                        @else
                                        <div class="fs-sm"><span class="text-muted me-2">Màu sắc
                                                        :</span>none
                                        </div>
                                        @endif
                                        @if ($value->specifications != null)
                                        @foreach ($value->specifications as $key => $attr)
                                        <?php

                      $nameAttribute = \App\Models\Attribute::where('slug', $key)->first()->name;

                      ?>
                                        <div class="fs-sm"><span class="text-muted me-2">{{ $nameAttribute }}
                                                        :</span>{{ $attr }}
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="fs-sm"><span class="text-muted me-2">Sản phẩm không có
                                                        thuộc
                                                        tinh</span></div>
                                        @endif
                                        <div class="widget-product-meta"><span class="text-accent me-2">{{
                                                        number_format($value->variant_price * $cart->quantity)
                                                        }}</span><span class="text-muted">x
                                                        {{ $cart->quantity }}</span></div>
                                </div>
                        </div>
                        @endforeach
                        @empty

                        @endforelse

                </div>
                <h6 class="fw-normal text-center my-4" id="totalprice" >Tổng tiền : {{ number_format($totalprice) }}</h6>
                <input type="hidden" name="totalprice" value="{{ $totalprice }}">
        </div>
</div>
