<div class="commentask">
    <div class="avt-qtv">
        <img src="{{ $comment->user->avatar }}" alt="">
    </div>
    <strong class="name-{{ $comment->id }}">{{ $comment->user->name }}</strong>
    <div class="infocom_ask">
        {{ $comment->comment_content }}
        <div class="relate_infocom">
            @if ($comment->user->id != $userLoginId)
                <span class="reply reply-comment" data-id="{{ $comment->id }}">Trả
                    lời</span>
                <b class="dot">.</b>
            @endif

            @php
                $isUser = $comment->usersLike->pluck('id')->all();
            @endphp

            @if (in_array($userLoginId, $isUser))

                <span class="numlike isLike">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span wire:click="UnLikeComment('{{ $comment->id }}')">Bỏ thích</span>
                </span>
            @else
                <span class="numlike">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span class="like" wire:click="likeComment('{{ $comment->id }}')">Thích</span>
                </span>
            @endif

            <span class="date">
                <b class="dot">.</b>
                {{ $comment->created_at->diffForHumans() }}
            </span>

            @if ($comment->usersLike->count())
                <span class="list-like">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    {{ $comment->usersLike->count() }}
                </span>
            @endif
        </div>
    </div>
    <div class="clr"></div>
</div>

<!--Form bình luận-->
<div class="comment_reply d-none comment-inline reply-comment-{{ $comment->id }}">
    <div class="col-lg-12 mt-2">
        <textarea class="form-control body-{{ $comment->id }} form-comment-text" wire:model.lazy="comment_content"
            cols="2" rows="2"></textarea>
        <div class="form-comment">
            <div class="row p-1">
                <div class="col-lg-12">
                    <button class="btn-sm btn-warning btn-submit-text"
                        wire:click="saveReply('{{ $product->id }}', '{{ $comment->id }}', '{{ $comment->id }}')">Trả
                        lời</button>
                </div>
            </div>
        </div>
    </div>
</div>
