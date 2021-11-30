<div class="commentask pt-2" style="margin-left: 30px;">
    <div class="avt-qtv">
        <img src="{{ $replyChilds->user->avatar }}" alt="">
    </div>
    <strong class="name-{{ $replyChilds->id }}">{{ $replyChilds->user->name }}</strong>

    <div class="infocom_ask">
        {{ $replyChilds->comment_content }}
        <div class="relate_infocom">
            <span class="reply reply-comment" data-id="{{ $replyChilds->id }}">Trả
                lời</span>
            <b class="dot">.</b>
            @if ($replyChilds->usersLike->count())
                @foreach ($replyChilds->usersLike as $value)
                    @if ($value->id == Auth::user()->id)
                        <span class="numlike isLike">
                            <i class="fa fa-thumbs-o-up"></i>
                            <span wire:click="UnLikeComment('{{ $replyChilds->id }}')">Thích</span>
                        </span>
                    @endif
                @endforeach
            @else
                <span class="numlike">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span class="like" wire:click="likeComment('{{ $replyChilds->id }}')">Thích</span>
                </span>
            @endif

            <span class="date">
                <b class="dot">.</b>
                {{ $replyChilds->created_at->diffForHumans() }}
            </span>

            @if ($replyChilds->usersLike->count())
                <span class="list-like">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    {{ $replyChilds->usersLike->count() }}
                </span>
            @endif
        </div>
    </div>
    <div class="clr"></div>
</div>
<!--Form gửi bình luận-->
<div class="d-block" style="padding-left: 60px">
    <div class="comment-inline d-none reply-comment-{{ $replyChilds->id }}">
        <div class="col-lg-12 mt-2">
            <textarea class="form-control body-{{ $replyChilds->id }} form-comment-text" cols="2" rows="2"
                wire:model.defer="comment_content"></textarea>
            <div class="form-comment">
                <div class="row p-1">
                    <div class="col-lg-12">
                        <button class="btn-sm btn-warning btn-submit-text"
                            wire:click="saveReply('{{ $product->id }}', '{{ $reply->id }}', '{{ $replyChilds->id }}')">Trả
                            lời</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
