        <!-- Bình luận đầu tiên-->
        <div class="form-comment">
            <div class="col-lg-12">
                <textarea class="form-control form-validated" id="form-one" cols="3" rows="3"></textarea>
                <div class="form-comment">
                    <div class="row p-1">
                        <div class="col-lg-6 d-flex align-content-center">
                            <label class="mt-2" for="">Hình ảnh</label>
                            <div class="file-options">
                                <a class="btn-file iframe-btn"
                                    href="{{ asset('rfm/filemanager') }}/dialog.php?field_id=image"
                                    style="color: #1e272e; font-size: 24px;"><input class="upload"
                                        type="hidden"><i class="fa fa-upload"></i></a>
                            </div>
                            <input type="hidden" id="image" data-upload="product_image" data-preview="image__preview">
                            <input type="hidden" name="product_image">
                            <div id="image__preview"></div>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn-submit-text save-comment"
                                data-url="{{ url('/comment/saveComment/' . $product->id) }}" style="float: right"
                                disabled>Bình luận</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
