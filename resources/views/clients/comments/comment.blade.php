<div class="commentask">
    <div class="avt-qtv">
        <img src="{{ $comment->user->avatar }}" alt="">
    </div>
    <strong class="name-{{ $comment->id }}">{{ $comment->user->name }}</strong>
    <div class="infocom_ask">
        {{ $comment->comment_content }}
        <div class="relate_infocom">
            <span class="reply reply-comment" data-id="{{ $comment->id }}">Trả
                lời</span>
            <b class="dot">.</b>
            <span class="numlike">
                <i class="fa fa-thumbs-o-up"></i>
                <span class="like">Thích</span>
            </span>
            <span class="date">
                <b class="dot">.</b>
                {{ $comment->created_at->diffForHumans() }}
            </span>
        </div>
    </div>
    <div class="clr"></div>
</div>


@include('clients.comments.form-comment-no-reply', ['comment' => $comment])
