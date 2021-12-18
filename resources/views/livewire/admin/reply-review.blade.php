<div class="container" wire:ignore.self>
    <!-- Reviews-->
    {{-- <h4 class="row mb-4 fw-bold"> {{ $all_count_review }} đánh giá {{ $product->product_name }} --}}
    </h4>

    <div class="row">
        <!-- Reviews list-->
        <!-- Review-->
        <div class="list-review mt-3">
            <div class="product-review pb-4 mb-4 border-bottom">
                <div class="d-flex mb-3">
                    <div class="d-flex align-items-center me-4">
                        @if (!$review->user->avatar)
                            <img class="rounded-1" src="{{ URL::to('backend/img/profiles/avt.png') }}" width="40"
                                alt="{{ $review->user->name }}">
                        @else
                            @if ($review->user->provider_id == null)
                                <img class="rounded-1"
                                    src="{{ URL::to('uploads/Users/', $review->user->avatar) }}" width="40"
                                    alt="{{ $review->user->name }}">
                            @else
                                <img class="rounded-1" src="{{ URL::to($review->user->avatar) }}" width="40"
                                    alt="{{ $review->user->name }}">
                            @endif
                        @endif
                        <div class="ps-3">
                            <h5 class="fs-md mb-0 fw-bold">{{ $review->user->name }}</h5>
                            <div class="star-rating">
                                @for ($count = 1; $count <= round($review->count_rating); $count++)
                                    <i class="fa fa-star fs-ms text-danger me-1"></i>
                                @endfor
                                @for ($count = 1; $count <= 5 - round($review->count_rating); $count++)
                                    <i class="fa fa-star-o fs-ms text-danger me-1"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="fs-sm mt-1 text-success"><i class="fa fa-check-circle me-1" aria-hidden="true"></i>
                            Đã mua tại Bigdeal</div>
                        @if ($review->introduce == 1)
                            <div class="fs-sm mt-1 me-1"><i class="fa fa-heart text-danger me-1" aria-hidden="true"></i>
                                Sẽ
                                giới thiệu cho bạn bè, người thân</div>
                        @endif
                    </div>
                </div>
                <p class="fs-md mb-2 review text-dark">{{ $review->content_rating }}</p>
                @if ($review->image)
                    <div class="text-nowrap">
                        @php
                            $str = $review->image;
                            $image_array = explode(',', $str);
                            
                            $useful = $review->useful;
                            $useful_array = explode(',', $useful);
                            $count_useful = count($useful_array) - 1;
                            $count_review = $review->review_child->count();
                        @endphp
                        @foreach ($image_array as $img)
                            <div class="image-review">
                                <img class="review_image" src="{{ URL::to('uploads/Reviews', $img) }}">
                            </div>
                        @endforeach
                    </div>
                @endif
                @php
                    $useful = $review->useful;
                    $useful_array = explode(',', $useful);
                    $count_useful = count($useful_array) - 1;
                    $count_review = $review->review_child->count();
                @endphp
                <div class="text-nowrap">
                    <button class="btn btn-outline-primary"><i class="far fa-thumbs-up"></i>
                        Hữu ích @if (isset($count_useful) && $count_useful > 0)({{ $count_useful }}) @endif </button>

                    <button class="btn btn-outline-info btn-discussion text-primary"
                        wire:click="discussion({{ $review->id }})" data-id="{{ $review->id }}" type="button"><i
                            class="far fa-comment"></i>
                        @if (isset($count_review) && $count_review > 0)
                            {{ $count_review }}
                        @endif Thảo luận
                    </button>
                    <button class="btn btn-outline-dark" type="button"><i class="far fa-clock"></i> Đã
                        đánh
                        giá
                        khoảng
                        {{ $review->created_at->diffForHumans() }}</button>
                </div>
                <div class="col-lg-12 mt-3 rating_reply">
                    <form class="form-discussion"
                        wire:submit.prevent="ReplyRating('{{ $review->id }}', '{{ $review->product_id }}')">
                        <textarea class="form-control text_review" cols="2" rows="2"
                            wire:model.defer="content_rating"> </textarea>
                        <div class="form-review d-flex justify-content-end border">
                            <button type="submit" class="btn btn-danger btn-submit-text">Gửi <i
                                    class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                        </textarea>
                    </form>
                    @if (count($review->review_child) > 0)
                        @foreach ($review->review_child as $key => $review_child)
                            @php
                                $useful_child = $review_child->useful;
                                $useful_child_array = explode(',', $useful_child);
                                $count_child_useful = count($useful_child_array) - 1;
                            @endphp
                            <div class="col-lg-12 mt-2 mb-4 pb-2 rating_reply_content border-bottom">
                                <div class="d-flex mb-2">
                                    <div class="d-flex align-items-center me-4">
                                        @if (!$review_child->user->avatar)
                                            <img style="z-index:1" class="rounded-circle"
                                                src="{{ URL::to('backend/img/profiles/avt.png') }}" width="35"
                                                alt="{{ $review->user->name }}">
                                        @else
                                            @if ($review_child->user->provider_id == null)
                                                <img style="z-index:1" class="rounded-circle"
                                                    src="{{ URL::to('uploads/Users/', $review_child->user->avatar) }}"
                                                    width="35" alt="{{ $review->user->name }}">
                                            @else
                                                <img style="z-index:1" class="rounded-circle"
                                                    src="{{ URL::to($review_child->user->avatar) }}"
                                                    width="35" alt="{{ $review->user->name }}">
                                            @endif
                                        @endif
                                        <div class="ps-2">
                                            <h6 class="fs-md mb-0 fw-bold">{{ $review_child->user->name }}
                                            </h6>
                                        </div>
                                        @if ($review_child->user->position == 'admin')
                                            <div class="fs-md ms-sm-1  text-success">
                                                <b class="qtv"> Quản trị viên </b>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                                <div class="review-reply-content">
                                    <p
                                        class="fs-md mb-2 review ms-1 text-review text-review-child-{{ $review_child->id }}">
                                        {{ $review_child->content_rating }}</p>
                                    <div class="text-nowrap d-flex flex-wrap">
                                        <button class="btn btn-primary btn-review me-1"
                                            wire:click.prevent="useful({{ $review_child->id }})"><i
                                                class="far fa-thumbs-up"></i>
                                            Hữu ích @if ($count_child_useful > 0)({{ $count_child_useful }}) @endif </button>
                                        <button class="btn btn-dark btn-time-review review-child me-1"
                                            type="button"><i class="far fa-clock"></i> Đã thảo luận
                                            khoảng
                                            {{ $review_child->created_at->diffForHumans() }} </button>
                                        @if ($review_child->review_status == null)
                                            <button class="btn btn-success"
                                                wire:click.prevent="browse({{ $review_child->id }})">Duyệt</button>
                                        @endif
                                        <div class="update-remove-review">
                                            <button onclick="remove_review({{ $review_child->id }})"
                                                class="ms-sm-4 btn btn-outline-muted"><i
                                                    class="fas fa-ellipsis-h"></i></button>
                                            <div class="update-review upd_review_{{ $review_child->id }} d-none">
                                                <button
                                                    wire:click.prevent="remove_review_child({{ $review_child->id }})"
                                                    class="w-100 btn btn-outline-muted">Xóa thảo luận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
        </div>

    </div>


    <style>
        .qtv {
            margin-top: -3px;
            text-transform: uppercase;
            margin-right: 10px;
            color: black;
            font-weight: normal;
            font-size: 10px;
            background: #f1c40f;
            padding: 2px 6px;
            border-radius: 3px;
            line-height: 18px;
            height: 18px;
            margin-left: 10px;
        }

        .rating_reply {
            padding: 10px 8px;
            display: block;
            margin-top: 15px;
            position: relative;
            background: #b6b3b3;
            border: 1px solid #e7e7e7;
            font-size: 14px;
            color: #333;
            z-index: 0;
        }

        .rating_reply::before {
            position: absolute;
            content: '';
            background: #b3b0b0;
            height: 25px;
            width: 25px;
            transform: rotate(-45deg);
            top: -8px;
            left: 160px;
            z-index: -1;
            border: 1px solid #e7e7e7;
        }

        .image-review {
            position: relative;
            margin-bottom: 10px;
            cursor: pointer;
            display: inline-block;
            margin-right: 8px;
            margin-top: 10px;
            vertical-align: top;
        }

        img.review_image {
            max-width: 100px;
            max-height: 100px;
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .update-review {
            background-color: #fff;
            box-shadow: 0 4px 20px rgb(0 0 0 / 20%);
            border-radius: 4px;
            font-size: 13px;
            line-height: 17px;
            position: absolute;
            width: 140px;
            z-index: 1;
        }

    </style>
</div>

</div>


@push('script')
    <script>
        function remove_review(review_id) {
            $('.update-review').addClass('d-none');
            $('.upd_review_' + review_id).removeClass('d-none');
        }

        function update_content_review(review_id, product_id) {
            let content_rating = $('.edit-child-review-' + review_id).val();
            let url = $('.edit-text-review').data('url');
            $.ajax({
                url: url,
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    review_id: review_id,
                    product_id: product_id,
                    content_rating: content_rating
                },
                success: function() {
                    window.livewire.emit('render');
                }
            })
        }
    </script>
@endpush
