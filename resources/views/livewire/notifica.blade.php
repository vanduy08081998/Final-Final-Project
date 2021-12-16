<div>
    <div class="container-fluid" style="position:relative;">
        <ul class="nav nav-tabs nav-material">
            <li class="nav-item contact-not">
                <a class="nav-link {{ !$check ? ' active checkedNot' : '' }}" aria-selected="true">Tất cả</a>
                <div class="material-border"></div>
            </li>
            <li class="nav-item contact-not" data-type="order">
                <a class="nav-link {{ $check == 'order' ? 'active checkedNot' : '' }}" aria-selected="false">Đơn
                    hàng</a>
                <div class="material-border"></div>
            </li>
            <li class="nav-item contact-not" data-type="comment">
                <a class="nav-link {{ $check == 'comment' ? 'active checkedNot' : '' }}" aria-selected="false">Bình
                    luận</a>
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
            <input type="checkbox" wire:model="comment" value="comment"
                class="comment-check {{ $check == 'comment' ? 'checked-input' : '' }}">
            <input type="checkbox" wire:model="order" value="order"
                class="order-check {{ $check == 'order' ? 'checked-input' : '' }}">
            <input type="checkbox" wire:model="review" value="review"
                class="review-check {{ $check == 'review' ? 'checked-input' : '' }}">

        </form>

        <div class="tab-content nav-material" id="top-tabContent">
            @if ($models->count() > 0)
                <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                    @foreach ($models as $item)
                        @if ($item->type == 'comment')
                            <a href="{{ route('shop.product-details', $item->product->product_slug) }}"
                                class="content-not" data-id="{{ $item->id }}">
                                <div class="icon-ct">
                                    <div class="content-icon">
                                        <i class="far fa-comments"></i>
                                    </div>
                                </div>
                                <div class="content-body">
                                    {!! $item->content !!}
                                    <div class="moving">
                                        Tại sản phẩm {{ $item->product->product_name }}
                                    </div>
                                    <div class="time">
                                        <em> {{ $item->created_at->diffForHumans() }}</em>
                                    </div>
                                </div>
                                <div class="content-handle">
                                    <span>
                                        <i class="fas fa-times"
                                            wire:click.prevent="delete('{{ $item->id }}')"></i>
                                    </span>
                                </div>
                            </a>
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
                                            wire:click.prevent="delete('{{ $item->id }}')"></i>
                                    </span>
                                </div>
                            </a>

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

    </div>
</div>
