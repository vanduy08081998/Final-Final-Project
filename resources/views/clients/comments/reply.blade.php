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
            <span class="numlike">
                <i class="fa fa-thumbs-o-up"></i>
                <span class="like">Thích</span>

            </span>
            <span class="date">
                <b class="dot">.</b>
                {{ $reply->created_at->diffForHumans() }}
            </span>
        </div>
    </div>

    <div class="clr"></div>
</div>

<div class="d-block" style="padding-left: 30px">
    <div class="comment-inline d-none reply-comment-{{ $reply->id }}">
        <div class="col-lg-12 mt-2">
            <textarea class="form-control body-{{ $reply->id }}" cols="2" rows="2"
                wire:model.defer="comment_content"></textarea>
            <div class="form-comment">
                <div class="row p-1">
                    <div class="col-lg-12">
                        <button class="btn-sm btn-warning"
                            wire:click="saveReply('{{ $product->id }}', '{{ $reply->id }}', '{{ $reply->id }}')">Gửi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
