<div>

    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="container pt-lg-2 pb-5 mb-md-3">
        <!-- Bình luận đầu tiên-->
        @include('clients.comments.form-comment.form-parent', ['product' => $product])
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

                                        @include('clients.comments.reply', ['comment' => $comment,'reply' => $reply])

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