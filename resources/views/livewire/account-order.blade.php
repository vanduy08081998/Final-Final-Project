<div>
    <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
        <div class="d-flex align-items-center">
            <label class="d-none d-lg-block fs-sm text-light text-nowrap opacity-75 me-2" for="order-sort">Sắp
                xếp theo:</label>
            <label class="d-lg-none fs-sm text-nowrap opacity-75 me-2" for="order-sort">Sắp xếp theo:</label>
            <select class="form-select" id="order-sort" wire:model="select">
                <option value="">Mới nhất</option>
                <option value="latest">Cũ nhất</option>
                @foreach (\App\Models\DeliveryViewed::get() as $item)
                    <option value="{{ $item->delivery_viewed }}">{{ $item->delivery_description }}</option>
                @endforeach
            </select>
        </div>
        <form class="user_logout" action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-primary btn-sm" type="submit"><i class="ci-sign-out me-2"></i>Đăng
                xuất</button>
        </form>
    </div>
    <!-- Orders list-->
    @if ($orders->count() > 0)
        <div class="table-responsive fs-md mb-4">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Mã đơn #</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Theo dõi</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $item)
                        <tr>
                            <td class="py-3"><button
                                    class="nav-link-style fw-medium fs-sm">{{ $item->date }}</button>
                            </td>
                            <td class="py-3">{{ date('H:i:s d-m-Y', strtotime($item->created_at)) }}</td>
                            <td class="py-3">
                                <span
                                    class="badge {{ $item->status->id == 6 ? 'bg-danger' : 'bg-info' }} m-0">{{ $item->status->delivery_description }}</span>
                            </td>
                            <td class="py-3"><a class="btn-sm btn-info"
                                    href="{{ url('account/order-tracking/' . $item->id) }}"><i
                                        class="far fa-eye"></i></a></td>
                            <td><button
                                    wire:click.prevent="orderDetail('{{ $item->id }}', '{{ $item->grand_total }}')"
                                    class="btn-sm btn-primary">Xem</button></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @else
        <div class="d-block">
            <div class="nullable">
                <div class="icon-null">
                    <i class="far fa-question-circle"></i>
                </div>
                <div class="text-null">
                    Bạn chưa có thông báo nào!
                </div>
                <a href="{{ route('clients.index') }}">Tiếp tục mua sắm</a>
            </div>
        </div>
    @endif
    {{ $orders->links('clients.comments.inc.page-link') }}

    <div class="modal fade" id="order-details">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mã đơn hàng - {{ $orderId ? $orderId->date : '' }}</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-0">
                    <!-- Item-->
                    @forelse ($order_details as $item)
                        <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
                            @foreach (json_decode($item->specification) as $pro)
                                <div class="d-sm-flex text-center text-sm-start"><a
                                        class="d-inline-block flex-shrink-0 mx-auto" href="shop-single-v1.html"
                                        style="width: 10rem;"><img src="{{ asset($pro->variant_image) }}"
                                            alt="Product"></a>
                                    <div class="ps-sm-4 pt-2">
                                        <h3 class="product-title fs-base mb-2"><a
                                                href="shop-single-v1.html">{{ $pro->product_name }}</a>
                                        </h3>
                                        {{-- <div class="fs-sm"><span class="text-muted me-2">Size:</span>8.5</div>
                                        <div class="fs-sm"><span class="text-muted me-2">Color:</span>White
                                            &amp;
                                            Blue
                                        </div> --}}
                                        @if (!isset($pro->colors))
                                            <div class="fs-sm"><span class="text-muted me-2">Màu
                                                    sắc:</span>Không
                                            </div>
                                        @else
                                            <div class="fs-sm"><span class="text-muted me-2">Màu
                                                    sắc:</span>{{ \App\Models\Color::where('color_slug', $pro->colors)->first()->color_name }}
                                            </div>
                                        @endif
                                        @if ($pro->specifications != null)
                                            <div class="d-block mt-2">
                                                @foreach ($pro->specifications as $ts)
                                                    <label class="boxed">
                                                        <strong>{{ $ts }}</strong>
                                                    </label>
                                                @endforeach
                                            </div>
                                        @else

                                        @endif
                                        <div class="fs-lg text-accent pt-2">
                                            {{ number_format($pro->variant_price, 0, '.', ',') . ' đ' }}</div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                <div class="text-muted mb-2">Số lượng:</div>{{ $item->quantity }}
                            </div>
                            <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                <div class="text-muted mb-2">Thành tiền</div>
                                {{ number_format($item->promotion_price, 0, '.', ',') . ' đ' }}
                            </div>
                        </div>
                    @empty
                        <h1>Chả có gì</h1>
                    @endforelse
                </div>
                <!-- Footer-->
                <div class="modal-footer flex-wrap justify-content-between bg-secondary fs-md">
                    <div class="px-2 py-1"><span class="text-muted">Thành
                            tiền:&nbsp;</span><span>{{ $orderId ? number_format($orderId->grand_total, 0, '.', ',') . ' đ' : '' }}</span>
                    </div>
                    <div class="px-2 py-1"><span class="text-muted">Phí giao
                            hàng:&nbsp;</span><span>22,000 đ</span></div>
                    {{-- <div class="px-2 py-1"><span
                            class="text-muted">Thuế:&nbsp;</span><span>$9.<small>50</small></span></div> --}}
                    <div class="px-2 py-1"><span class="text-muted">Tổng tiền:&nbsp;</span><span
                            class="fs-lg">{{ $orderId ? number_format($orderId->grand_total, 0, '.', ',') . ' đ' : '' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
