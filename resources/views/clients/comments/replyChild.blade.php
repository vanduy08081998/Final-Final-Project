<div class="commentask pt-2 childs-comment-line" style="margin-left: 30px;">
    @include('clients.comments.partial.info-comment', ['value' => $replyChilds])

</div>
<!--Form gửi bình luận-->
<div class="d-block" style="padding-left: 60px">
    <div class="form-comment-show d-none reply-comment-{{ $replyChilds->id }}">
        <div class="form-reply-show">
            <div class="d-block">
                <textarea class="form-control body-{{ $replyChilds->id }} form-comment-text" cols="2" rows="2"
                    wire:model.lazy="comment_content"></textarea>
            </div>
            <div class="form-footer">
                <button
                    wire:click.prevent="saveReply('{{ $product->id }}', '{{ $reply->id }}', '{{ $replyChilds->id }}')">Trả
                    lời <i class="fa fa-reply" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
