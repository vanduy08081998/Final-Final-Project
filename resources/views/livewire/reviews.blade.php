<div class="container" wire:ignore.self>
    <!-- Reviews-->
    <h3 class="col-lg-12 mb-5"> {{ $all_count_review }} đánh giá {{ $product->product_name }}
    </h3>
    <div class="row pt-2 pb-3 pt-5 border" id="div_id">
        <div style="line-height: 2" class="col-lg-4 col-md-3 text-center border-end">
            <img src="{{ URL::to($product->product_image) }}" width="150" height="auto"><br>
            <span class="mt-4">{{ $product->product_name }}</span><br>
            <span class="fs-sm">
                @if ($product->discount_unit == '%')
                    <strong
                        class="text-danger">{{ number_format($product->unit_price - ($product->unit_price * $product->discount) / 100) }}₫</strong>
                @else
                    <strong
                        class="text-danger">{{ number_format($product->unit_price - $product->discount) }}₫</strong>
                @endif
            </span>
        </div>

        <div class="col-lg-4 col-md-4 border-end ps-5 pe-5">

            <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">5</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;width: 240px">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{ $fivestar }}%; background-color: #fe8c23;" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span class="text-muted ms-3">{{ $fivestar }}%</span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">4</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;width: 240px">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{ $fourstar }}%; background-color: #fe8c23" aria-valuenow="27"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span class="text-muted ms-3">{{ $fourstar }}%</span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">3</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;width: 240px">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{ $threestar }}%; background-color: #fe8c23;" aria-valuenow="17"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span class="text-muted ms-3">{{ $threestar }}%</span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">2</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;width: 240px">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{ $twostar }}%; background-color: #fe8c23;" aria-valuenow="9"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span class="text-muted ms-3">{{ $twostar }}%</span>
            </div>
            <div class="d-flex align-items-center">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">1</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;width: 240px">
                        <div class="progress-bar bg-danger" role="progressbar"
                            style="width: {{ $onestar }}%; background-color: #fe8c23;" aria-valuenow="4"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span wire:click.prevent="close_review()" class="text-muted ms-3">{{ $onestar }}%</span>
            </div>
            @if ($id_review == 0)
                <button type="button" wire:click.prevent="add_review()" class="btn btn-primary btn-sm mt-4 w-100">
                    Viết đánh giá
                </button>
            @endif

        </div>

        <div class="col-lg-4 col-md-5 text-center">
            <h5 class="d-inline-block ">Đánh Giá Trung Bình</h5><br>
            <p style="color:#fe6004" class="d-inline-block h1">{{ $avg }}</p><br>
            <div class="star-rating me-2 mb-1">
                @for ($count = 1; $count <= $rating_avg; $count++) <i
                        class="ci-star-filled fs-lg text-warning me-1">
                    </i>
                @endfor
                @for ($count = 1; $count <= 5 - $rating_avg; $count++) <i
                        class="ci-star fs-lg text-warning me-1">
                    </i>
                @endfor
            </div>

            <p class="pt-3 fs-sm text-muted">{{ $introduce_review }} trên {{ $all_count_review }}
                @php
                    if ($all_count_review == 0) {
                        $all_count_review = 1;
                    }
                @endphp
                ({{ round(($introduce_review / $all_count_review) * 100) }}%)<br>Khách hàng sẽ giới thiệu sản
                phẩm
                này</p>
        </div>
    </div>

    <div class="row py-4">
        <!-- Reviews list-->
        <div class="col-md-8">
            <form wire:submit.prevent="render()">
            <div class="d-flex pb-4">
                <div data-id="{{$product->id}}" class="d-flex flex-nowrap align-items-center sort-star">
                    <label class="fs-sm fw-medium text-nowrap me-2 d-none d-sm-block" for="sort-reviews">Lọc theo:</label>
                    <button data-id="all" class="filterstar-all check-filterstar">Tất cả</button>

                    <input class="form-check-input d-none check-star-5 {{$check == 'fivestar' ? 'check-star-active' : ''}}" wire:model="checkfivestar" value="5star" type="checkbox" id="review_image_5">
                    <button data-id="5" class="filterstar-5 check-filterstar  {{$check == 'fivestar' ? 'active' : ''}}">5 sao</button>
                    <input class="form-check-input d-none check-star-4 {{$check == 'fourstar' ? 'check-star-active' : ''}}" wire:model="checkfourstar" value="4star" type="checkbox" id="review_image_4">
                    <button data-id="4" class="filterstar-4 check-filterstar  {{$check == 'fourstar' ? 'active' : ''}}">4 sao</button>
                    <input class="form-check-input d-none check-star-3 {{$check == 'threestar' ? 'check-star-active' : ''}}" wire:model="checkthreestar" value="3star" type="checkbox" id="review_image_3">
                    <button data-id="3" class="filterstar-3 check-filterstar  {{$check == 'threestar' ? 'active' : ''}}">3 sao</button>
                    <input class="form-check-input d-none check-star-2 {{$check == 'twostar' ? 'check-star-active' : ''}}" wire:model="checktwostar" value="2star" type="checkbox" id="review_image_2">
                    <button data-id="2" class="filterstar-2 check-filterstar  {{$check == 'twostar' ? 'active' : ''}}">2 sao</button>
                    <input class="form-check-input d-none check-star-1 {{$check == 'onestar' ? 'check-star-active' : ''}}" wire:model="checkonestar" value="1star" type="checkbox" id="review_image_1">
                    <button data-id="1" class="filterstar-1 check-filterstar  {{$check == 'onestar' ? 'active' : ''}}">1 sao</button>
                </div>
            </div>
            <div class="d-flex pb-4">
                <div class="d-flex flex-nowrap align-items-center sort-review">
                    
                    <label class="fs-sm text-nowrap me-2 d-none d-sm-block me-4" for="sort-reviews"> <input
                            class="form-check-input check-sort-review me-1" wire:model="image" value="review_image" type="checkbox"><span
                            class="sort-review move-top"> Có hình ảnh (5)</span></label>
                    <label class="fs-sm text-nowrap me-2 d-none d-sm-block" for="sort-reviews"><input
                            class="form-check-input check-sort-review me-1"  wire:model="introduce" value="review_introduce" type="checkbox"> <span
                            class="sort-review">Giới thiệu bạn bè, người thân (5)<span></label>

               
                </div>
                <div class="d-flex flex-nowrap align-items-center">
                    <label class="fs-sm fw-medium text-nowrap me-2 d-none d-sm-block" for="sort-reviews">Sắp
                        xếp:</label>
                    <select class="form-select form-select-sort" wire:model="sort" id="sort-reviews">
                        <option>Mới nhất</option>
                        <option>Hữu ích</option>
                        <option>Đánh giá cao</option>
                        <option>Đánh giá thấp</option>
                    </select>
                </div>
            </div>
        </form> 
            <hr>
            <!-- Review-->
            <div class="list-review mt-3">
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
                                    <h6 class="fs-md mb-0">{{ $review->user->name }}</h6>
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
                            <div>
                                <div class="fs-sm mt-1 text-success"><i class="fa fa-check-circle me-1"
                                        aria-hidden="true"></i>
                                    Đã mua tại Bigdeal</div>
                                @if ($review->introduce == 1)
                                    <div class="fs-sm mt-1 me-1"><i class="fa fa-heart text-danger me-1"
                                            aria-hidden="true"></i> Sẽ
                                        giới thiệu cho bạn bè, người thân</div>
                                @endif
                            </div>
                        </div>
                        <p class="fs-md mb-2 review">{{ $review->content_rating }}</p>
                        @if ($review->image)
                            <div class="text-nowrap ">
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
                            @if (in_array($id_user, $useful_array))
                                <button class="btn-review text-primary"
                                    wire:click.prevent="un_useful({{ $review->id }})"><i
                                        class="fas fa-thumbs-up"></i>
                                    Hữu ích @if (isset($count_useful) && $count_useful > 0)({{ $count_useful }}) @endif</button>
                            @else
                                <button class="btn-review text-primary"
                                    wire:click.prevent="useful({{ $review->id }})"><i class="far fa-thumbs-up"></i>
                                    Hữu ích @if (isset($count_useful) && $count_useful > 0)({{ $count_useful }}) @endif </button>
                            @endif
                            <button class="btn-review btn-discussion text-primary"
                                wire:click="discussion({{ $review->id }})" data-id="{{ $review->id }}"
                                type="button"><i class="far fa-comment"></i>
                                @if (isset($count_review) && $count_review > 0)
                                    {{ $count_review }}
                                @endif Thảo luận
                            </button>
                            <button class="btn-time-review text-muted" type="button"><i class="far fa-clock"></i> Đã
                                đánh
                                giá
                                khoảng
                                {{ $review->created_at->diffForHumans() }}</button>
                        </div>
                        <div
                            class="col-lg-12 mt-2 rating_reply {{ isset($class) && $class == $review->id ? 'down' : 'd-none' }}">
                            <form class="form-discussion"
                                wire:submit.prevent="ReplyRating('{{ $review->id }}', '{{ $product->id }}')">
                                <textarea class="form-control text_review" cols="2" rows="2"
                                    wire:model.defer="content_rating"> </textarea>
                                <div class="form-review d-flex justify-content-end border">
                                    <button type="submit" class="btn-submit-text">Gửi <i class="fa fa-paper-plane"
                                            aria-hidden="true"></i></button>
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
                                                        src="{{ URL::to('backend/img/profiles/avt.png') }}"
                                                        width="35" alt="{{ $review->user->name }}">
                                                @else
                                                    <img style="z-index:1" class="rounded-circle"
                                                        src="{{ URL::to('uploads/Users/', $review_child->user->avatar) }}"
                                                        width="35" alt="{{ $review->user->name }}">
                                                @endif
                                                <div class="ps-2">
                                                    <h6 class="fs-md mb-0">{{ $review_child->user->name }}</h6>
                                                </div>
                                                @if ($review_child->user->position == 'admin')
                                                    <div class="fs-sm mt-1 ms-sm-1  text-success">
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
                                                    class="form-control edit-text-review edit-child-review-{{ $review_child->id }}"
                                                    rows="2">{{ $review_child->content_rating }}</textarea>
                                                <div class="form-review d-flex justify-content-end">
                                                    <button type="button" class="btn-submit-text"
                                                        onclick="update_content_review({{ $review_child->id }},{{ $product->id }})">Cập
                                                        nhật <i class="fa fa-paper-plane"
                                                            aria-hidden="true"></i></button>
                                                </div>
                                                </textarea>
                                            </form>
                                            <div class="text-nowrap d-flex flex-wrap">
                                                @if (in_array($id_user, $useful_child_array))
                                                    <button class="btn-review text-primary"
                                                        wire:click.prevent="un_useful({{ $review_child->id }})"><i
                                                            class="fas fa-thumbs-up"></i>
                                                        Hữu ích @if ($count_child_useful > 0)({{ $count_child_useful }}) @endif</button>
                                                @else
                                                    <button class="btn-review text-primary"
                                                        wire:click.prevent="useful({{ $review_child->id }})"><i
                                                            class="far fa-thumbs-up"></i>
                                                        Hữu ích @if ($count_child_useful > 0)({{ $count_child_useful }}) @endif </button>
                                                @endif
                                                <button class="btn-time-review review-child text-muted"
                                                    type="button"><i class="far fa-clock"></i> Đã thảo luận khoảng
                                                    {{ $review->created_at->diffForHumans() }} </button>
                                                @if ($review_child->customer_id == $id_user)
                                                    <div class="update-remove-review">
                                                        <button onclick="remove_review({{ $review_child->id }})"
                                                            class="ms-sm-4"><i
                                                                class="fas fa-ellipsis-h"></i></button>
                                                        <div
                                                            class="update-review upd_review_{{ $review_child->id }} d-none">
                                                            <button class="mb-1 w-100"
                                                                onclick="update_review({{ $review_child->id }})">Chỉnh
                                                                sửa</button><br>
                                                            <hr>
                                                            <button
                                                                wire:click.prevent="remove_review_child({{ $review_child->id }})"
                                                                class="mt-2 w-100">Xóa thảo luận</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                @endforeach

            </div>
            {{ $all_review->links('clients.comments.inc.page-link') }}
        </div>
      
    </div>

    <a href="{{ route('review.show-review', $product) }}">Xem đánh giá chi tiết</a>
</div>
@include('clients.shop.details.review')


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

        function remove_review(review_id) {
            $('.update-review').addClass('d-none');
            $('.upd_review_' + review_id).removeClass('d-none');
        }

        function update_review(review_id) {
            $('.update-review').addClass('d-none');
            $('.form-discussion').addClass('d-none');
            $('.text-review').removeClass('d-none');
            $('.text-review-child-' + review_id).addClass('d-none');
            $('.edit-review').addClass('d-none');
            $('.form-edit-review-' + review_id).removeClass('d-none');
            $('.form-edit-review-' + review_id).find('textarea').focus();
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
                    // $('.text-review-child-' + review_id).removeClass('d-none');
                    // $('.edit-review').addClass('d-none');
                    // $('.form-edit-review-' + review_id).removeClass('d-none');
                }
            })
        }


         $('.check-filterstar').click(function(){
            var sort_filterstar = $(this).data('id');
            $('.check-star-active').click();
            $("#review_image_"+sort_filterstar).click();
            $(".check-star-"+sort_filterstar).addClass('check-star-active');
        })
         //     setTimeout(function() {
        //         $('html, body').animate({
        //             scrollTop: $('#div_id').position().top
        //         }, 'slow');
        //     }, 1000);
        
    </script>
@endpush
