@include('clients.comments.comment', ['comment' => $comment])

@if ($comment->reply->count() > 0)
    <!-- Dùng form này nếu có bình luận trả lời trước đó-->
    <div class="comment_reply">
        <!-- Trả lời bình luận-->
        @foreach ($comment->reply as $reply)

            <div class="line">
                <div class="connect">
                </div>
                @include('clients.comments.reply', ['comment' => $comment, 'reply' => $reply])

                <!-- Trả lời bình luận con-->

                @foreach ($reply->reply as $replyChilds)

                    @include('clients.comments.replyChild', ['replyChilds' => $replyChilds])

                @endforeach
            </div>
        @endforeach

    </div>

@endif
