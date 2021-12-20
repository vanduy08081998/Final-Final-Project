<div id="div_id">
    <div class="container-fluid" style="position:relative;">
        <ul class="nav nav-tabs nav-material">
            <li class="nav-item contact-not" onclick="checkbox('')">
                <a class="nav-link {{ !$check ? ' active checkedNot' : '' }}">Tất cả</a>
                <div class="material-border"></div>
            </li>
            <li class="nav-item contact-not" data-type="order" onclick="checkbox('order')">
                <a class="nav-link {{ $check == 'order' ? 'active checkedNot' : '' }}">Đơn
                    hàng</a>
                <div class="material-border"></div>
            </li>
            <li class="nav-item contact-not" data-type="comment" onclick="checkbox('comment')">
                <a class="nav-link {{ $check == 'comment' ? 'active checkedNot' : '' }}">Bình
                    luận</a>
                <div class="material-border"></div>
            </li>

            <li class="nav-item contact-not" data-type="review" onclick="checkbox('review')">
                <a class="nav-link {{ $check == 'review' ? 'active checkedNot' : '' }}">Đánh
                    giá</a>
                <div class="material-border"></div>
            </li>
            {{-- <li class="nav-item contact-not" data-type="discount">
                <a class="nav-link" id="review-top-tab" data-bs-toggle="tab" href="#top-review" role="tab"
                    aria-selected="false">Mã giảm giá</a>
                <div class="material-border"></div>
            </li> --}}
            <span class="delete-notifica" wire:click.prevent="deleteAll('{{ $check }}')">
                <i class="far fa-trash-alt"></i>
            </span>
        </ul>
        <form class="d-none" wire:submit.prevent="render()">
            <input type="checkbox" wire:model.lazy="comment" value="comment"
                class="comment-check {{ $check == 'comment' ? 'checked-input' : '' }}">
            <input type="checkbox" wire:model.lazy="order" value="order"
                class="order-check {{ $check == 'order' ? 'checked-input' : '' }}">
            <input type="checkbox" wire:model.lazy="review" value="review"
                class="review-check {{ $check == 'review' ? 'checked-input' : '' }}">
        </form>

        <div class="tab-content nav-material" id="top-tabContent">
            @if ($models->count() > 0)
                <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                    @foreach ($models as $item)
                        @if ($item->type == 'comment' && $item->product)
                            <div class="content-not" data-id="{{ $item->id }}">
                                <div class="icon-ct">
                                    <div class="content-icon">
                                        <i class="far fa-comments"></i>
                                    </div>
                                </div>
                                <div class="content-body">
                                    <a wire:click="deleted({{ $item->id }})"
                                        href="{{ route('shop.product-details', $item->product->product_slug) }}">
                                        <b>{{ $item->content }}</b> đã phản hồi lại bình luận của bạn trong phần
                                        <b>Hỏi & Đáp</b>
                                        <div class="moving">
                                            Tại
                                            sản phẩm {{ $item->product->product_name }}

                                        </div>
                                    </a>
                                    <div class="time">
                                        <em> {{ $item->created_at->diffForHumans() }}</em>
                                    </div>
                                </div>
                                <div class="content-handle">
                                    <span title="Xóa" wire:click.prevent="deleted({{ $item->id }})">
                                        <i class="fas fa-times"></i>
                                    </span>

                                </div>
                            </div>
                        @elseif($item->type == 'order' && $item->order)
                            <div class="content-not" data-id="{{ $item->id }}">
                                <div class="icon-ct">
                                    <div class="content-icon text-danger">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </div>
                                </div>
                                <div class="content-body">
                                    <a class="text-dark" wire:click="deleted({{ $item->id }})"
                                        href="{{ route('account.order-list') }}">

                                        @if ($item->order->delivery_viewed == 1)
                                            <strong>Đơn hàng</strong> của bạn <em class="text-warning">đang
                                                được xử lý <i class="fas fa-warehouse"></i></em>
                                        @elseif($item->order->delivery_viewed == 2)
                                            <strong>Đơn hàng</strong> của bạn <em class="text-info">đang
                                                được
                                                vận chuyển <i class="fas fa-truck"></i></em>
                                        @elseif($item->order->delivery_viewed == 3)
                                            <strong>Đơn hàng</strong> của bạn <em class="text-success">đã
                                                hoàn thành <i class="fas fa-check"></i></em>
                                        @else
                                            <strong>Đơn hàng</strong> của bạn <em class="text-danger">đã
                                                hủy <i class="fas fa-exclamation-triangle"></i></em>
                                        @endif

                                        <div class="moving">
                                            <b>Mã đơn:</b> {{ $item->order->date }} &nbsp; <b>Ngày đặt:</b>
                                            {{ date('H:i:s d-m-Y', strtotime($item->order->created_at)) }}
                                            &nbsp; <b>Tổng tiền:</b>
                                            {{ number_format($item->order->grand_total, 0, '.', ',') . ' đ' }}
                                        </div>

                                    </a>
                                    <div class="time">
                                        <em> {{ $item->created_at->diffForHumans() }}</em>
                                    </div>
                                </div>
                                <div class="content-handle">
                                    <span title="Xóa" wire:click.prevent="deleted({{ $item->id }})">
                                        <i class="fas fa-times"></i>
                                    </span>

                                </div>
                            </div>
                        @elseif($item->type == 'review' && $item->product)
                            <div class="content-not" data-id="{{ $item->id }}">
                                <div class="icon-ct">
                                    <div class="content-icon">
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                                <div class="content-body">
                                    <a wire:click="deleted({{ $item->id }})"
                                        href="{{ route('shop.product-details', $item->product->product_slug) }}">
                                        {{ $item->content }} đã phản hồi đánh giá của bạn!
                                        <div class="moving">
                                            Tại
                                            sản phẩm <b>{{ $item->product->product_name }}</b>
                                        </div>
                                    </a>
                                    <div class="time">
                                        <em> {{ $item->created_at->diffForHumans() }}</em>
                                    </div>
                                </div>
                                <div class="content-handle">
                                    <span title="Xóa" wire:click.prevent="deleted({{ $item->id }})">
                                        <i class="fas fa-times"></i>
                                    </span>

                                </div>
                            </div>
                        @else
                            <div class="nullable">
                                <div class="icon-null">
                                    <i class="far fa-question-circle"></i>
                                </div>
                                <div class="text-null">
                                    Bạn chưa có thông báo nào!
                                </div>
                                <a href="{{ route('clients.index') }}">Tiếp tục mua sắm</a>
                            </div>

                        @endif
                    @endforeach
                </div>
            @else
                <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
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
        </div>
        {{ $models->links('clients.comments.inc.page-link') }}
    </div>
</div>
