<?php
use Carbon\Carbon;
?>
<div class="container-fluid bg-light pt-3 pb-3" id="div_id" style="position:relative">
    <h3 class="text-danger"> Đánh giá của bạn </h3>
    <div class="d-flex pt-3">
        <div class="d-flex flex-nowrap align-items-center sort-star">
            <form wire:submit.prevent="render()">
                {{-- <input
                    class="form-check-input d-none check-star-all {{ $check == '' ? 'check-star-active' : '' }}"
                    wire:model="checkfivestar" type="checkbox" id="review_image_all"> --}}
                <button onclick="click_star('all')"
                    class="move-top filterstar-all check-filterstar {{ $check == '' ? 'active' : '' }}"><i
                        class="ci-star-filled opacity-60 me-2"></i> Tất
                    cả</button>

                <input 
                    class="form-check-input d-none check-star-5 {{ $check == 'fivestar' ? 'check-star-active' : '' }}"
                    wire:model="checkfivestar" value="5star" type="checkbox" id="review_image_5">
                <button onclick="click_star(5)"
                    class="move-top filterstar-5 check-filterstar  {{ $check == 'fivestar' ? 'active' : '' }}"><i
                        class="ci-star-filled opacity-60 me-2"></i>5
                    sao</button>
                <input
                    class="form-check-input d-none check-star-4 {{ $check == 'fourstar' ? 'check-star-active' : '' }}"
                    wire:model="checkfourstar" value="4star" type="checkbox" id="review_image_4">
                <button onclick="click_star(4)"
                    class="move-top filterstar-4 check-filterstar  {{ $check == 'fourstar' ? 'active' : '' }}"><i
                        class="ci-star-filled opacity-60 me-2"></i>4
                    sao</button>
                <input
                    class="form-check-input d-none check-star-3 {{ $check == 'threestar' ? 'check-star-active' : '' }}"
                    wire:model="checkthreestar" value="3star" type="checkbox" id="review_image_3">
                <button onclick="click_star(3)"
                    class="move-top filterstar-3 check-filterstar  {{ $check == 'threestar' ? 'active' : '' }}"><i
                        class="ci-star-filled opacity-60 me-2"></i>3
                    sao</button>
                <input
                    class="form-check-input d-none check-star-2 {{ $check == 'twostar' ? 'check-star-active' : '' }}"
                    wire:model="checktwostar" value="2star" type="checkbox" id="review_image_2">
                <button onclick="click_star(2)"
                    class="move-top filterstar-2 check-filterstar  {{ $check == 'twostar' ? 'active' : '' }}"><i
                        class="ci-star-filled opacity-60 me-2"></i>2
                    sao</button>
                <input
                    class="form-check-input d-none check-star-1 {{ $check == 'onestar' ? 'check-star-active' : '' }}"
                    wire:model="checkonestar" value="1star" type="checkbox" id="review_image_1">
                <button onclick="click_star(1)"
                    class="move-top filterstar-1 check-filterstar  {{ $check == 'onestar' ? 'active' : '' }}"><i
                        class="ci-star-filled opacity-60 me-2"></i>1
                    sao</button>
            </form>
        </div>
    </div>

    <div class="align-items-center sort-star mt-5">
        @if (count($all_review) != 0)
            @foreach ($all_review as $key => $review)
                <div class="product-review pb-4 mb-4 border-bottom">
                    <div class="d-flex mb-3">
                        <div class="d-flex align-items-center me-4">
                            @if (!$review->user->avatar)
                                <img class="rounded-1" src="{{ URL::to('backend/img/profiles/avt.png') }}"
                                    width="45" alt="{{ $review->user->name }}">
                            @else
                                <img class="rounded-1"
                                    src="{{ URL::to('uploads/Users/', $review->user->avatar) }}" width="45"
                                    alt="{{ $review->user->name }}">
                            @endif
                            <div class="ps-3">
                                <h6 class="fs-md mb-0 fw-bold">{{ $review->user->name }}</h6>
                                <div class="star-rating">
                                    @for ($count = 1; $count <= $review->count_rating; $count++)
                                        <i class="ci-star-filled fs-ms text-warning me-1"></i>
                                    @endfor
                                    @for ($count = 1; $count <= 5 - $review->count_rating; $count++)
                                        <i class="ci-star fs-ms text-warning me-1"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="hide-review">
                            @if ($review->review_eye == null)
                                <button wire:click.prevent="review_eye_slash({{ $review->id }})"><i
                                        class="fas fa-eye"></i> Thiết lập ẩn danh</button>
                            @else
                                <button class="text-muted" wire:click.prevent="review_eye({{ $review->id }})"><i
                                        class="fas fa-eye-slash"></i> Thiết lập công khai</button>
                            @endif
                        </div>
                    </div>
                    <p class="fs-md mb-2 review">{{ $review->content_rating }}</p>
                    @if ($review->image)
                        <div class="text-nowrap content-review">
                            @php
                                $str = $review->image;
                                $image_array = explode(',', $str);
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
                        $review_child = $review->review_child;
                        $count_review = 0;
                        foreach ($review_child as $rv) {
                            if ($rv->review_status != null) {
                                $count_review++;
                            }
                        }
                    @endphp
                    <div style="position: relative" class="text-nowrap content-review">
                        <button class="btn-review btn-discussion text-primary" type="button"><i
                                class="far fa-thumbs-up me-1"></i>Hữu ích @if (isset($count_useful) && $count_useful > 0)({{ $count_useful }}) @endif </button>

                        <button class="btn-review btn-discussion text-primary"
                            wire:click="discussion({{ $review->id }})" data-id="{{ $review->id }}"
                            type="button"><i class="far fa-comment"></i>
                            @if (isset($count_review) && $count_review > 0)
                                {{ $count_review }}
                            @endif Thảo luận
                        </button>
                        <?php
                        $timebuy = Carbon::createFromFormat('Y-m-d H:i:s', $review->time_buy)->format('d/m/Y');
                        $timereview = Carbon::createFromFormat('Y-m-d H:i:s', $review->created_at)->format('d/m/Y');
                        $first_date = strtotime($review->time_buy);
                        $second_date = strtotime($review->created_at);
                        $time = abs($second_date - $first_date);
                        $time = floor($time / (60 * 60 * 24));
                        ?>
                        <button data-id="{{ $review->id }}" wire:mouseover="info_buy({{ $review->id }})"
                            wire:mouseout="none_info_buy()" class="btn-time-review fs-ms text-muted" type="button"><i
                                class="far fa-clock"></i> Đã dùng khoảng
                            {{ $time }} ngày</button>

                        <div class="info-buying info_buy_{{ $review->id }} d-none">
                            <div class="info-buying-close"></div>
                            <div class="info-buying-text">

                                <div class="txtitem">
                                    <p class="txt01">Mua ngày</p>
                                    <p class="txtdate">{{ $timebuy }}
                                    </p>
                                </div>
                                <div class="txtitem">
                                    <p class="txt01">Viết đánh giá</p>
                                    <p class="txtdate">{{ $timereview }}</p>
                                </div>
                            </div>

                            <div class="length-using">
                                <div class="length-percent" style="width:70%"></div>
                            </div>
                            <p class="timeline-txt"> Đã dùng <span>Khoảng {{ $time }} ngày</span>
                            </p>

                            <ul style="list-style: none;" class="info-buying-list">
                                <li><span></span>Ở thời điểm đánh giá, khách đã mua sản <br> phẩm khoảng
                                    {{ $time }} ngày</li>
                                <li><span></span>Thời gian sử dụng thực tế có thể bằng hoặc <br>ít hơn
                                    khoảng thời gian này.</li>
                            </ul>
                        </div>
                    </div>
                    @if (count($review->review_child) > 0)
                        <div
                            class="col-lg-12 mt-2 rating_reply {{ isset($class) && $class == $review->id ? 'down' : '' }}">
                            <p class="fw-bold fs-md text-danger"><i class="fas fa-user-shield"></i> Phản hồi của quản
                                trị viên</p>
                            @foreach ($review->review_child as $key => $review_child)
                                @if ($review_child->user->position == 'admin')
                                    @if ($review_child->review_status != null)
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
                                                            src="{{ URL::to('backend/img/profiles/avt.png') }}"
                                                            width="35" alt="{{ $review->user->name }}">
                                                    @else
                                                        <img style="z-index:1" class="rounded-circle"
                                                            src="{{ URL::to('uploads/Users/', $review_child->user->avatar) }}"
                                                            width="35" alt="{{ $review->user->name }}">
                                                    @endif
                                                    <div class="ps-2">
                                                        <h6 class="fs-md mb-0 fw-bold text-primary">
                                                            {{ $review_child->user->name }}
                                                        </h6>
                                                    </div>
                                                    @if ($review_child->user->position == 'admin')
                                                        <div class="fs-sm ms-sm-1  text-success">
                                                            <b class="qtv"> Quản trị viên </b>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="review-reply-content">
                                                <p
                                                    class="fs-md mb-2 review ms-1 text-review text-review-child-{{ $review_child->id }}">
                                                    {{ $review_child->content_rating }}</p>
                                                <form
                                                    class="edit-review form-edit-review-{{ $review_child->id }} d-none">
                                                    <textarea
                                                        data-url="{{ route('review.update', ['review' => $review_child->id]) }}"
                                                        class="form-validated form-control edit-text-review edit-child-review-{{ $review_child->id }}"
                                                        rows="2">{{ $review_child->content_rating }}</textarea>
                                                    <div class="form-review d-flex justify-content-end">
                                                        <button type="button" class="btn-submit-text"
                                                            onclick="update_content_review({{ $review_child->id }})">Cập
                                                            nhật <i class="fa fa-paper-plane"
                                                                aria-hidden="true"></i></button>
                                                    </div>
                                                    </textarea>
                                                </form>
                                                <div class="text-nowrap d-flex flex-wrap">
                                                    <button class="fs-ms btn-time-review review-child text-muted"
                                                        type="button"><i class="far fa-clock"></i> Đã thảo luận
                                                        khoảng
                                                        {{ $review->created_at->diffForHumans() }} </button>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach


                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <p>Chưa có đánh giá nào </p>
        @endif
    </div>

    {{ $all_review->links('clients.comments.inc.page-link') }}
</div>

<style>
    .check-filterstar.active {
        border: 1px solid #fe8c23;
        color: #fe8c23;
    }

    .hide-review {
        font-size: 15px;
        position: absolute;
        right: 0;
        color: currentcolor;
    }

</style>
<script>

    function click_star(sort_filterstar) {
        $(".check-star-active").click();
        $("#review_image_" + sort_filterstar).click();
        $(".check-star-" + sort_filterstar).addClass('check-star-active');
    }
    $('.move-top').click(function() {
        setTimeout(function() {
            $('html, body').animate({
                scrollTop: $('#div_id').position().top
            }, 'slow');
        }, 1000);
    })
</script>
