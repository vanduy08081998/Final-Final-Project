<div class="commentask">

    @include('clients.comments.partial.info-comment', ['value' => $reply])

</div>

<div class="d-block" style="padding-left: 30px">
    <div class="form-comment-show d-none reply-comment-{{ $reply->id }}">
        <div class="form-reply-show">
            <div class="d-block">
                <textarea class="form-control body-{{ $reply->id }} form-comment-text" cols="2" rows="2"
                    wire:model.lazy="comment_content"></textarea>
            </div>
            <div class="form-footer">
                <button
                    wire:click.prevent="saveReply('{{ $product->id }}', '{{ $reply->id }}', '{{ $reply->id }}')">Trả
                    lời <i class="fa fa-reply" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
