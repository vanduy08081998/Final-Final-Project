<div wire:ignore.self>
    <!-- Reviews-->

    <div class="row pt-2 pb-3">
        <h3 class="col-lg-12 mb-5">{{$all_count_review}} đánh giá {{$product->product_name}}</h3>
        <div style="line-height: 2" class="col-lg-4 col-md-3 text-center">
            <img src="{{URL::to($product->product_image)}}" width="110" height="auto"><br>
            <span class="mt-4">{{$product->product_name}}</span><br>
            <span class="fs-sm">
                @if ($product->discount_unit == '%')
                <strong
                    class="text-danger">{{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }}₫</strong>
                @else
                <strong class="text-danger">{{ number_format($product->unit_price - $product->discount) }}₫</strong>
                @endif
            </span>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">5</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;width: 300px">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{$fivestar}}%; background-color: #fe8c23;" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span class="text-muted ms-3">{{$fivestar}}%</span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">4</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;width: 300px">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{$fourstar}}%; background-color: #fe8c23" aria-valuenow="27"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span class="text-muted ms-3">{{$fourstar}}%</span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">3</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;width: 300px">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{$threestar}}%; background-color: #fe8c23;" aria-valuenow="17"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span class="text-muted ms-3">{{$threestar}}%</span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">2</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;width: 300px">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{$twostar}}%; background-color: #fe8c23;" aria-valuenow="9" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div><span class="text-muted ms-3">{{$twostar}}%</span>
            </div>
            <div class="d-flex align-items-center">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">1</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;width: 300px">
                        <div class="progress-bar bg-danger" role="progressbar"
                            style="width: {{$onestar}}%; background-color: #fe8c23;" aria-valuenow="4" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div><span wire:click.prevent="close_review()" class="text-muted ms-3">{{$onestar}}%</span>
            </div>
            @if($id_review == 0)
            <button type="button" wire:click.prevent="add_review()" class="btn btn-primary btn-sm mt-4 w-100">
                Viết đánh giá
            </button>
            @endif
        </div>

        <div class="col-lg-4 col-md-5 text-center">
            <h5 class="d-inline-block ">Đánh Giá Trung Bình</h5><br>
            <p style="color:#fe6004" class="d-inline-block h1">{{$avg}}</p><br>
            <div class="star-rating me-2 mb-1">
                @for($count = 1; $count <= $rating_avg; $count++) <i class="ci-star-filled fs-lg text-warning me-1"></i>
                    @endfor
                    @for($count = 1; $count <= 5-$rating_avg; $count++) <i class="ci-star fs-lg text-warning me-1"></i>
                        @endfor
            </div>

            <p class="pt-3 fs-sm text-muted">{{$introduce_review}} trên {{$all_count_review}}
                ({{round($introduce_review/$all_count_review*100)}}%)<br>Khách hàng sẽ giới thiệu sản phẩm này</p>
        </div>
    </div>

    <hr class="mt-4 mb-3">
    <div class="row py-4">
        <!-- Reviews list-->
        <div class="col-md-9">
            <div class="d-flex justify-content-end pb-4">
                <div class="d-flex flex-nowrap align-items-center">
                    <label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block" for="sort-reviews">Sắp
                        xếp:</label>
                    <select class="form-select form-select-sm" id="sort-reviews">
                        <option>Mới nhất</option>
                        <option>Hữu ích</option>
                        <option>Đánh giá cao</option>
                        <option>Đánh giá thấp</option>
                    </select>
                </div>
            </div>
            <!-- Review-->
            @foreach($all_review as $key => $review)
            <div class="product-review pb-4 mb-4 border-bottom">
                <div class="d-flex mb-3">
                    <div class="d-flex align-items-center me-4"><img class="rounded-circle"
                            src="{{ URL::to('uploads/Users/', $review->user->avatar) }}" width="50"
                            alt="Rafael Marquez">
                        <div class="ps-3">
                            <h6 class="fs-md mb-0">{{$review->user->name}}</h6>
                            <div class="star-rating">
                                @for($count = 1; $count <= $review->count_rating; $count++)
                                    <i class="ci-star-filled fs-ms text-warning"></i>
                                    @endfor
                                    @for($count = 1; $count <= 5-$review->count_rating; $count++)
                                        <i class="ci-star fs-ms text-warning me-1"></i>
                                        @endfor
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="fs-sm mt-1 text-success"><i class="fa fa-check-circle me-1" aria-hidden="true"></i>
                            Đã mua tại Bigdeal</div>
                        @if($review->introduce==1)
                        <div class="fs-sm mt-1 me-1"><i class="fa fa-heart text-danger me-1" aria-hidden="true"></i> Sẽ
                            giới thiệu cho bạn bè, người thân</div>
                        @endif
                    </div>
                </div>
                <p class="fs-md mb-2">{{$review->content_rating}}</p>
                @if($review->image)
                <div class="text-nowrap ">
                    @php
                    $str = $review->image;
                    $image_array = explode(',', $str);
                    @endphp
                    @foreach($image_array as $img)
                    <div class="image-review">
                        <img class="review_image" src="{{URL::to('uploads/Reviews', $img)}}">
                    </div>
                    @endforeach
                </div>
                @endif
                <div class="text-nowrap">
                    <button class="btn-like text-primary" type="button">Hữu ích</button>
                    <button class="btn-comment text-primary" data-id="{{$review->id}}" type="button"><i
                            class="fa fa-comment-o" aria-hidden="true"></i> Thảo luận</button>
                    <button class="btn-time-comment text-muted" type="button"><i class="fa fa-comment-o"
                            aria-hidden="true"></i> Đã đánh giá khoảng {{$review->created_at->diffForHumans()}}</button>
                </div>

                <div class="col-lg-12 mt-2 rating_reply d-none form-review-show reply-review-{{ $review->id }}">
                    <textarea class="form-control body-{{ $review->id }} form-comment-text" cols="2" rows="2"
                        wire:model.lazy="comment_content"></textarea>
                    <div class="form-review d-flex justify-content-end">
                        <button class="btn-submit-text"
                            wire:click.prevent="ReplyRating('{{ $review->id }}', '{{ $review->id }}', '{{ $review->id }}')">Gửi
                            <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </div>

            </div>
            @endforeach


            <!-- Review-->
            <!-- <div class="text-center">
                <button class="btn btn-outline-accent" type="button"><i class="ci-reload me-2"></i>Load
                    more reviews</button>
            </div> -->
        </div>
    </div>
    @include('clients.shop.details.review')
</div>

@push('script')
<script>
let myContent = document.getElementById("content_rating");
myContent.addEventListener("input", () => {
    let count = (myContent.value).length;
    document.getElementById("count-result").textContent = `${count}`;
});

function new_review() {

    let URL = $('.button_save_review').data('url');
    let count_rating = $('.count-rating').val();
    let product_id = $('.product_id').val();
    let content_rating = $('.content-rating').val();
    let check_rating = document.getElementById('rating_checkbox');
    if (check_rating.checked) {
        check_rating = '1'
    } else {
        check_rating = ''
    }
    if (count_rating == 'none') {
        $('.review_error').html('Bạn chưa đánh giá điểm sao, vui lòng đánh giá.');
    } else {
        let array_image = [];
        let form = $('form');
        let inputImages = form.find('input[name^="images"]');
        if (!inputImages.length) {
            inputImages = form.find('input[name^="photos"]')
        }
        for (let file of inputImages.prop('files')) {
            array_image.push(file.name)
        }
        let form_data = new FormData()
        let totalfiles = document.getElementById('images').files.length;
        if ($('#content_rating').val().length < 80) {
            $('.review_error').html('Nội dung đánh giá quá ít. Vui lòng nhập thêm nội dung đánh giá về sản phẩm.')
        } else {
            if (totalfiles > 4) {
                $('.review_error').html('Đã upload quá số ảnh quy định (tối đa 4 ảnh)');
            } else {
                for (var index = 0; index < totalfiles; index++) {
                    form_data.append("images[]", document.getElementById('images').files[index]);
                }
                form_data.append("count_rating", count_rating);
                form_data.append("product_id", product_id);
                form_data.append("content_rating", content_rating);
                form_data.append("introduce", check_rating);
                $.ajax({
                    url: URL,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function() {
                        $('.new_review').modal('hide');
                        window.livewire.emit('render')
                        toastr.success('Đánh giá sản phẩm thành công')
                    }
                })
            }
        }
    }
}
$('.btn-comment').click(function() {
    var id = $(this).data('id');
    $('.form-review-show').addClass('d-none')
    $('.reply-review-' + id).removeClass('d-none');
})
</script>
@endpush