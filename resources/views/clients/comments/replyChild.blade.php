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
            <span class="numlike">
                <i class="fa fa-thumbs-o-up"></i>
                <span class="like">Thích</span>

            </span>
            <span class="date">
                <b class="dot">.</b>
                {{ $replyChilds->created_at->diffForHumans() }}
            </span>
        </div>
    </div>
    <div class="clr"></div>

    <div class="d-block" style="padding-left: 30px">
        <div class="comment-inline d-none reply-comment-{{ $replyChilds->id }}">
            <div class="col-lg-12 mt-2">
                <textarea class="form-control body-{{ $replyChilds->id }}" name="comment_content" cols="2" rows="2"
                    wire:model.defer="comment_content"></textarea>
                <div class="form-comment">
                    <div class="row p-1">
                        <div class="col-lg-12">
                            <button class="btn-sm btn-warning"
                                wire:click="saveReplyLast('{{ $product->id }}', '{{ $reply->id }}', '{{ $replyChilds->id }}')">Gửi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
