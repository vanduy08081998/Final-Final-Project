<div>
    <div class="container-fluid" style="position:relative">
        <h3> Đánh giá của bạn </h3>
        <div class="d-flex pb-4">
            <div class="d-flex flex-nowrap align-items-center sort-star">
                <button data-id="all"
                    class="move-top filterstar-all check-filterstar {{ $check == '' ? 'active' : '' }}">Tất
                    cả</button>

                <input
                    class="form-check-input d-none check-star-5 {{ $check == 'fivestar' ? 'check-star-active' : '' }}"
                    wire:model="checkfivestar" value="5star" type="checkbox" id="review_image_5">
                <button data-id="5"
                    class="move-top filterstar-5 check-filterstar  {{ $check == 'fivestar' ? 'active' : '' }}">5
                    sao</button>
                <input
                    class="form-check-input d-none check-star-4 {{ $check == 'fourstar' ? 'check-star-active' : '' }}"
                    wire:model="checkfourstar" value="4star" type="checkbox" id="review_image_4">
                <button data-id="4"
                    class="move-top filterstar-4 check-filterstar  {{ $check == 'fourstar' ? 'active' : '' }}">4
                    sao</button>
                <input
                    class="form-check-input d-none check-star-3 {{ $check == 'threestar' ? 'check-star-active' : '' }}"
                    wire:model="checkthreestar" value="3star" type="checkbox" id="review_image_3">
                <button data-id="3"
                    class="move-top filterstar-3 check-filterstar  {{ $check == 'threestar' ? 'active' : '' }}">3
                    sao</button>
                <input
                    class="form-check-input d-none check-star-2 {{ $check == 'twostar' ? 'check-star-active' : '' }}"
                    wire:model="checktwostar" value="2star" type="checkbox" id="review_image_2">
                <button data-id="2"
                    class="move-top filterstar-2 check-filterstar  {{ $check == 'twostar' ? 'active' : '' }}">2
                    sao</button>
                <input
                    class="form-check-input d-none check-star-1 {{ $check == 'onestar' ? 'check-star-active' : '' }}"
                    wire:model="checkonestar" value="1star" type="checkbox" id="review_image_1">
                <button data-id="1"
                    class="move-top filterstar-1 check-filterstar  {{ $check == 'onestar' ? 'active' : '' }}">1
                    sao</button>
            </div>
        </div>
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
<style>
    a.nav-link.btn-review {
        color: white;
    }

    a.nav-link.btn-review.active {
        color: white;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        background: #0bc589 !important;
    }
    a.nav-link.btn-review {
        color: white;
        background: #aaadac !important;
    }

    .nav-tabs .nav-link.active::before {
        background-color: #0bc589;
    }

</style>
