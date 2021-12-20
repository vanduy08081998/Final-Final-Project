@include('clients.comments.partial.info-comment', ['value' => $comment, 'parent_id' => $comment->id, 'form'=>
'comment_reply', 'class' => 'd-block'])

@if ($comment->reply->count() > 0)
    <!-- Dùng form này nếu có bình luận trả lời trước đó-->
    <div class="comment_reply">
        <!-- Trả lời bình luận-->
        @foreach ($comment->reply as $reply)

            <div class="line out-parent-load load-show-{{ $comment->id }}">
                <div class="connect">
                </div>
                @include('clients.comments.partial.info-comment', ['value' => $reply, 'parent_id' => $reply->id,
                'form'=> '', 'class'=> 'comment_reply_parent'])

                <!-- Trả lời bình luận con-->

                @foreach ($reply->reply as $replyChild)

                    @include('clients.comments.partial.info-comment', ['value' => $replyChild, 'parent_id' =>
                    $reply->id, 'form'=> '', 'class' => 'comment_reply_child', 'line' =>
                    'childs-comment-line', 'id' =>
                    $reply->id, 'className' => 'out-child-load'])

                @endforeach

                @if (count($reply->reply) > 2)
                    <div class="content-load-more-child content-{{ $reply->id }}">
                        <span class="load-more more-{{ $reply->id }}" onclick="loadMore({{ $reply->id }})"> Xem
                            thêm bình luận <i class="far fa-comments"></i></span>
                    </div>
                    <div class="content-load-more-child content-none-{{ $reply->id }} d-none">
                        <span class="load-more more-{{ $reply->id }}" onclick="upMore({{ $reply->id }})"> Ẩn
                            bớt &nbsp;<i class="fas fa-chevron-up"></i></span>
                    </div>
                @endif
            </div>

        @endforeach

        @if ($comment->reply->count() > 2)
            <div class="mt-2 content-load-more-parent content-{{ $comment->id }}">
                <span class="load-more" onclick="loadMore({{ $comment->id }})"><i class="far fa-comments"></i>...
                    Xem thêm
                    ... <i class="far fa-comments"></i></span>
            </div>
            <div class="mt-2 content-load-more-parent content-none-{{ $comment->id }} d-none">
                <span class="load-more" onclick="upMore({{ $comment->id }})"> Ẩn
                    bớt &nbsp;<i class="fas fa-chevron-up"></i></span>
            </div>
        @endif
    </div>

@endif
