<div>

    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="container pt-lg-2 pb-5 mb-md-3">
        <!-- Bình luận đầu tiên-->
        <div class="form-comment">
            <div class="col-lg-12">
                <textarea class="form-control form-comment-text" cols="3" rows="3"
                    wire:model.lazy="comment_content"></textarea>
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
                            <button class="btn-sm btn-warning btn-submit-text" style="float: right"
                                wire:click="saveParentComment('{{ $product->id }}')" disabled>Bình luận</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Comment-->
        <div class="col-lg-12 pt-3">

            <div class="b-block pb-1">
                <h5>{{ $product->comments->count() }} bình luận</h5>
            </div>

            <div class="infocomment">

                @foreach ($product->comments as $key => $comment)

                    @if ($comment->comment_parent_id == 0)

                        @include('clients.comments.comment', ['comment' => $comment])

                        @if ($comment->reply->count() > 0)
                            <!-- Dùng form này nếu có bình luận trả lời trước đó-->
                            <div class="comment_reply">
                                <!-- Trả lời bình luận-->
                                @foreach ($comment->reply as $reply)

                                    <div class="line">

                                        @include('clients.comments.reply', ['comment' => $comment, 'reply' => $reply])

                                        <!-- Trả lời bình luận con-->
                                        @foreach ($reply->reply as $replyChilds)

                                            @include('clients.comments.replyChild', ['replyChilds' => $replyChilds])

                                        @endforeach

                                    </div>

                                @endforeach

                            </div>

                        @endif

                    @endif

                @endforeach
            </div>


        </div>
    </div>

</div>
