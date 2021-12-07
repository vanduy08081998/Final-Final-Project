<div wire:ignore.self>
    <!-- Reviews-->

    <div class="row pt-2 pb-3">
        <h3 class="col-lg-12 mb-5">74 đánh giá {{$product->product_name}}</h3>
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
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span class="text-muted ms-3">43</span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">4</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: 27%; background-color: #a7e453;"
                            aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span class="text-muted ms-3">16</span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">3</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: 17%; background-color: #ffda75;"
                            aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span class="text-muted ms-3">9</span>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">2</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: 9%; background-color: #fea569;"
                            aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span class="text-muted ms-3">4</span>
            </div>
            <div class="d-flex align-items-center">
                <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">1</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                </div>
                <div class="w-100">
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 4%;" aria-valuenow="4"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div><span wire:click.prevent="close_review()" class="text-muted ms-3">2</span>
            </div>

            <button type="button" wire:click.prevent="add_review()" class="btn btn-primary btn-sm mt-4 w-100">
                Viết đánh giá
            </button>

        </div>

        <div class="col-lg-4 col-md-5 text-center">
            <h5 class="d-inline-block ">Đánh Giá Trung Bình</h5><br>
            <p style="color:#fe6004" class="d-inline-block h1">4.1</p><br>
            <div class="star-rating me-2 mb-1"><i class="ci-star-filled fs-lg text-warning me-1"></i><i
                    class="ci-star-filled fs-lg text-warning me-1"></i><i
                    class="ci-star-filled fs-lg text-warning me-1"></i><i
                    class="ci-star-filled fs-lg text-warning me-1"></i><i class="ci-star fs-lg text-muted me-1"></i>
            </div>
            <p class="pt-3 fs-sm text-muted">58 trên 74 (77%)<br>Khách hàng sẽ giới thiệu sản phẩm này</p>
        </div>
    </div>

    <hr class="mt-4 mb-3">
    <div class="row py-4">
        <!-- Reviews list-->
        <div class="col-md-7">
            <div class="d-flex justify-content-end pb-4">
                <div class="d-flex flex-nowrap align-items-center">
                    <label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block" for="sort-reviews">Sort
                        by:</label>
                    <select class="form-select form-select-sm" id="sort-reviews">
                        <option>Newest</option>
                        <option>Oldest</option>
                        <option>Popular</option>
                        <option>High rating</option>
                        <option>Low rating</option>
                    </select>
                </div>
            </div>
            <!-- Review-->
            <div class="product-review pb-4 mb-4 border-bottom">
                <div class="d-flex mb-3">
                    <div class="d-flex align-items-center me-4 pe-2"><img class="rounded-circle"
                            src="{{ URL::to('frontend/img/shop/reviews/01.jpg') }}" width="50" alt="Rafael Marquez">
                        <div class="ps-3">
                            <h6 class="fs-sm mb-0">Rafael Marquez</h6><span class="fs-ms text-muted">June 28,
                                2019</span>
                        </div>
                    </div>
                    <div>
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                class="star-rating-icon ci-star-filled active"></i><i
                                class="star-rating-icon ci-star-filled active"></i><i
                                class="star-rating-icon ci-star-filled active"></i><i
                                class="star-rating-icon ci-star"></i>
                        </div>
                        <div class="fs-ms text-muted">83% of users found this review helpful</div>
                    </div>
                </div>
                <p class="fs-md mb-2">Nam libero tempore, cum soluta nobis est eligendi optio
                    cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis
                    voluptas assumenda est...</p>
                <ul class="list-unstyled fs-ms pt-1">
                    <li class="mb-1"><span class="fw-medium">Pros:&nbsp;</span>Consequuntur
                        magni, voluptatem
                        sequi, tempora</li>
                    <li class="mb-1"><span class="fw-medium">Cons:&nbsp;</span>Architecto
                        beatae, quis autem
                    </li>
                </ul>
                <div class="text-nowrap">
                    <button class="btn-like" type="button">15</button>
                    <button class="btn-dislike" type="button">3</button>
                </div>
            </div>
            <!-- Review-->
            <div class="text-center">
                <button class="btn btn-outline-accent" type="button"><i class="ci-reload me-2"></i>Load
                    more reviews</button>
            </div>
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
        alert('Bạn cần chọn sao đánh giá!')
    } else {
        let array_image = [];
        let $form = $('form');
        let $inputImages = $form.find('input[name^="images"]');
        if (!$inputImages.length) {
            $inputImages = $form.find('input[name^="photos"]')
        }
        for (let file of $inputImages.prop('files')) {
            array_image.push(file.name)
        }
        $.ajax({
            url: URL,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                product_id: product_id,
                count_rating: count_rating,
                content_rating: content_rating,
                introduce: check_rating,
                image : array_image
            },
            success: function() {
                $('.new_review').modal('hide');
                window.livewire.emit('render')
                toastr.success('Đánh giá sản phẩm thành công')
            }
        })
    }



}
</script>
@endpush