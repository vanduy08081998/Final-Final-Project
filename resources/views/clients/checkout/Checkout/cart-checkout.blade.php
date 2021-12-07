<div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
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
                    <h6 class="widget-product-title"><a href="shop-single-v1.html">{{ $value->product_name }}</a></h6>
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
                            number_format($value->variant_price * $cart->quantity) }}</span><span class="text-muted">x
                            {{ $cart->quantity }}</span></div>
                </div>
            </div>
            @endforeach
            @empty

            @endforelse

        </div>
        <ul class="list-unstyled fs-sm pb-2 border-bottom">
            <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span
                    class="text-end">$265.<small>00</small></span></li>
            <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span
                    class="text-end">—</span></li>
            <li class="d-flex justify-content-between align-items-center"><span class="me-2">Taxes:</span><span
                    class="text-end">$9.<small>50</small></span></li>
            <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span
                    class="text-end">—</span></li>
        </ul>
        <h3 class="fw-normal text-center my-4">$274.<small>50</small></h3>
    </div>
</div>