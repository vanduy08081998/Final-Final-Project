<div class="modal fade show_image_review" wire:ignore.self id="updatePhoneModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div style="max-width: 70%" class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title-review text-primary mt-2" id="exampleModalLongTitle"><i class="fas fa-th-list"></i> Xem tất cả ảnh</h6>
                <button type="button" class="btn btn-outline-danger btn-sm text-dark close-image-review">
                    <span aria-hidden="true">X</span> Đóng
                </button>
            </div>

            <div style="height:520px" id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                {{-- <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div> --}}
                <div class="carousel-inner show">
                    @foreach ($all_list_review as $key => $review)
                        @if ($review->image)
                            @php
                                $str = $review->image;
                                $image_array = explode(',', $str);
                            @endphp
                            <div class="carousel-item show show-image-review show-slider-image-{{$key}}">
                                <img src="{{ URL::to('uploads/Reviews', $image_array[0]) }}"
                                    class="d-block show image-review" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    {{-- <h5>Second slide label</h5>
                                    <p>Some representative placeholder content for the second slide.</p> --}}
                                    <div class="d-flex mb-2">
                                        <div class="d-flex align-items-center me-4">
                                            @if (!$review->user->avatar)
                                                <img class="rounded-1"
                                                    src="{{ URL::to('backend/img/profiles/avt.png') }}" width="45"
                                                    alt="{{ $review->user->name }}">
                                            @else
                                                <img class="rounded-1"
                                                    src="{{ URL::to('uploads/Users/', $review->user->avatar) }}"
                                                    width="45" alt="{{ $review->user->name }}">
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
                                        <div class="d-flex flex-wrap flex-column justify-content-start">
                                            <div class="fs-sm mt-1 text-success bought-review me-2"><i class="fa fa-check-circle me-1"
                                                    aria-hidden="true"></i>
                                                Đã mua tại Bigdeal</div>
                                            @if ($review->introduce == 1)
                                                <div class="fs-sm mt-1 ms-md-4"><i class="fa fa-heart text-danger me-1"
                                                        aria-hidden="true"></i> Sẽ
                                                    giới thiệu cho bạn bè</div>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="fs-md mb-2 review show">{{ $review->content_rating }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
        
                </div>
                <button class="carousel-control-prev show-previous" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next show-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
