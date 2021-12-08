<div class="commentask">

    @include('clients.comments.partial.info-comment', ['value' => $comment])

</div>

<!--Form bình luận-->
<div class="comment_reply d-none form-comment-show reply-comment-{{ $comment->id }}">
    <div class="form-reply-show">
        <div class="d-block">
            <textarea class="form-control body-{{ $comment->id }} form-comment-text" cols="2" rows="2"
                wire:model.lazy="comment_content"></textarea>
        </div>
        <div class="form-footer">
            <button
                wire:click.prevent="saveReply('{{ $product->id }}', '{{ $comment->id }}', '{{ $comment->id }}')">Trả
                lời <i class="fa fa-reply" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
