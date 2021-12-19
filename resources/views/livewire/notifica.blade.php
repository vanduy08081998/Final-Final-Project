<div>
    <div class="container-fluid" style="position:relative;">
        <ul class="nav nav-tabs nav-material">
            <li class="nav-item contact-not">
                <a class="nav-link {{ !$check ? ' active checkedNot' : '' }}">Tất cả</a>
                <div class="material-border"></div>
            </li>
            <li class="nav-item contact-not" data-type="order">
                <a class="nav-link {{ $check == 'order' ? 'active checkedNot' : '' }}">Đơn
                    hàng</a>
                <div class="material-border"></div>
            </li>
            <li class="nav-item contact-not" data-type="comment">
                <a class="nav-link {{ $check == 'comment' ? 'active checkedNot' : '' }}">Bình
                    luận</a>
                <div class="material-border"></div>
            </li>

            <li class="nav-item contact-not" data-type="review">
                <a class="nav-link {{ $check == 'review' ? 'active checkedNot' : '' }}">Đánh
                    giá</a>
                <div class="material-border"></div>
            </li>
            {{-- <li class="nav-item contact-not" data-type="discount">
                <a class="nav-link" id="review-top-tab" data-bs-toggle="tab" href="#top-review" role="tab"
                    aria-selected="false">Mã giảm giá</a>
                <div class="material-border"></div>
            </li> --}}
            <span class="delete-notifica" data-type="{{ $check ?? '' }}">
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
                        @if ($item->type == 'comment')
                            <div class="content-not" data-id="{{ $item->id }}">
                                <div class="icon-ct">
                                    <div class="content-icon">
                                        <i class="far fa-comments"></i>
                                    </div>
                                </div>
                                <div class="content-body">
                                    <a wire:click="deleted({{ $item->id }})"
                                        href="{{ route('shop.product-details', $item->product->product_slug) }}">
                                        {!! $item->content !!}
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
                        @elseif($item->type == 'order')
                            <a href="{{ route('shop.product-details', $item->product->product_slug) }}"
                                class="content-not">
                                <div class="icon-ct">
                                    <div class="content-icon">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                </div>
                                <div class="content-body">
                                    {!! $item->content !!}
                                    {{-- <div class="moving">
                        Tại sản phẩm {{ $item->product->product_name }}
                    </div> --}}
                                    <div class="time">
                                        <em> {{ $item->created_at->diffForHumans() }}</em>
                                    </div>
                                </div>
                                <div class="content-handle">
                                    <span>
                                        <i class="fas fa-times"
                                            wire:click.prevent="deleted('{{ $item->id }}')"></i>
                                    </span>
                                </div>
                            </a>
                        @else
                            <div class="content-not" data-id="{{ $item->id }}">
                                <div class="icon-ct">
                                    <div class="content-icon">
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                                <div class="content-body">
                                    <a wire:click="deleted({{ $item->id }})"
                                        href="{{ route('shop.product-details', $item->product->product_slug) }}">
                                        {!! $item->content !!}
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
