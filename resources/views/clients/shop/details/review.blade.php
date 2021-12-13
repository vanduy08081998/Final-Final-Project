<div class="modal fade new_review" wire:ignore.self id="updatePhoneModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div style="max-width: 55%" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-review" id="exampleModalLongTitle"> Đánh giá</h5>
                <button type="button" class="btn btn-outline-danger btn-sm text-dark"
                    wire:click.prevent="close_review()">
                    <span aria-hidden="true">X</span> Đóng
                </button>
            </div>
            <form style="margin-left:20px">
                <div class="count-rating-hidden">
                    <input type="hidden" class="count-rating" name="count-rating" value="none">
                    <input type="hidden" class="product_id" name="count-rating" value="{{ $product->id }}">
                </div>
                <div class="modal-body-review">
                    <div class="product-title">
                        <img src="{{ asset($product->product_image) }}" width="110" height="auto">
                        <span>{{ $product->product_name }}</span>
                    </div>

                    <div class="rating-review-product d-flex justify-content-between mt-2">
                        <div class="">Bạn cảm thấy sản phẩm này như thế nào? <br>(chọn sao nhé):</div>
                        <ul style="list-style-type: none" class="ratting wrap-rating d-flex">
                            <li class="text-center li-rating">
                                <i data-count="1" data-product_id="{{ $product->id }}"
                                    class="item-rating ci-star text-warning fa-2x"></i>
                                <p class="text-rating text-rating_0">Rất tệ
                                <p>
                            </li>
                            <li class="text-center li-rating">
                                <i data-count="2" data-product_id="{{ $product->id }}"
                                    class="item-rating ci-star text-warning fa-2x"></i>
                                <p class="text-rating text-rating_1">Tệ
                                <p>
                            </li>
                            <li class="text-center li-rating">
                                <i data-count="3" data-product_id="{{ $product->id }}"
                                    class="item-rating ci-star text-warning fa-2x"></i>
                                <p class="text-rating text-rating_2">Bình<br> thường
                                <p>
                            </li>
                            <li class="text-center li-rating">
                                <i data-count="4" data-product_id="{{ $product->id }}"
                                    class="item-rating ci-star text-warning fa-2x"></i>
                                <p class="text-rating text-rating_3">Tốt
                                <p>
                            </li>
                            <li class="text-center li-rating">
                                <i data-count="5" data-product_id="{{ $product->id }}"
                                    class="item-rating ci-star text-warning fa-2x"></i>
                                <p class="text-rating text-rating_4">Rất tốt
                                <p>
                            </li>
                        </ul>
                    </div>

                    <div class="textarea border-textarea">
                        <textarea class="review-content content-rating"
                            placeholder="Mời bạn chia sẻ thêm một số cảm nhận ..." id="content_rating"
                            rows="3"></textarea>
                        <div style="font-size:14px" class="d-flex error-review">
                            <span class="ms-sm-2 text-danger review_error"> </span>
                            <span class="me-sm-2"><span id="count-result">0</span> ký tự (tối thiểu 80)</span>
                        </div>
                        <div class="input-field">
                            <div class="input-images-1"></div>
                        </div>


                    </div>
                    <div class="form-check mt-3">
                        <input type="checkbox" class="check_rating form-check-input" value="Đi chơi"
                            id="rating_checkbox">
                        <label class="form-check-label" for="exampleCheck1">Tôi sẽ giới thiệu sản phẩm này cho bạn bè
                            người thân</label>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                        <button data-url="{{ route('review.store') }}" onclick="new_review()" type="button"
                            class="button_save_review btn btn-primary">Gửi đánh giá ngay</button>
                    </div>


                    <div class="d-flex justify-content-center mb-2">
                        <span style="font-size:14px">Để đánh giá được duyệt, quý khách vui lòng tuân thủ 
                            <span class="text-primary">Quy định đánh giá</span></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

