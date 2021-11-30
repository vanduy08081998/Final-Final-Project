<div class="commentask">
    <div class="avt-qtv">
        <img src="{{ $reply->user->avatar }}" alt="">
    </div>
    <strong class="name-{{ $reply->id }}">{{ $reply->user->name }}</strong>
    <div class="infocom_ask">
        {{ $reply->comment_content }}
        <div class="relate_infocom">
            <span class="reply reply-comment" data-id="{{ $reply->id }}">Trả
                lời</span>
            <b class="dot">.</b>

            @php
                $isUser = $reply->usersLike->pluck('id')->all();
            @endphp

            @if (in_array(Auth::user()->id, $isUser))
                <span class="numlike isLike">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span wire:click="UnLikeComment('{{ $reply->id }}')">Bỏ thích</span>
                </span>

            @else
                <span class="numlike">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span class="like" wire:click="likeComment('{{ $reply->id }}')">Thích</span>
                </span>
            @endif

            <span class="date">
                <b class="dot">.</b>
                {{ $reply->created_at->diffForHumans() }}
            </span>

            @if ($reply->usersLike->count())
                <span class="list-like">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    {{ $reply->usersLike->count() }}
                </span>
            @endif
        </div>
    </div>

    <div class="clr"></div>
</div>

<div class="d-block" style="padding-left: 30px">
    <div class="comment-inline d-none reply-comment-{{ $reply->id }}">
        <div class="col-lg-12 mt-2">
            <textarea class="form-control body-{{ $reply->id }} form-comment-text" cols="2" rows="2"
                wire:model.defer="comment_content"></textarea>
            <div class="form-comment">
                <div class="row p-1">
                    <div class="col-lg-12">
                        <button class="btn-sm btn-warning btn-submit-text"
                            wire:click="saveReply('{{ $product->id }}', '{{ $reply->id }}', '{{ $reply->id }}')">Trả
                            lời</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
