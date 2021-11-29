<div class="comment_reply d-none comment-inline reply-comment-{{ $comment->id }}">
    <div class="col-lg-12 mt-2">
        <textarea class="form-control body-{{ $comment->id }}" wire:model.lazy="comment_content" cols="2"
            rows="2"></textarea>
        <div class="form-comment">
            <div class="row p-1">
                <div class="col-lg-12">
                    <button class="btn-sm btn-warning"
                        wire:click="saveReplyComment('{{ $product->id }}', '{{ $comment->id }}', '{{ $comment->id }}')">Gửi</button>
                </div>
            </div>
        </div>
    </div>
</div>
