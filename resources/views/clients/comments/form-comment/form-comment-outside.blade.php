<div class="comment_reply d-none comment-inline reply-comment-{{ $comment_id }}">
    <div class="col-lg-12 mt-2">
        <textarea class="form-control body-{{ $comment_id }}" wire:model.lazy="comment_content" cols="2"
            rows="2"></textarea>
        <div class="form-comment">
            <div class="row p-1">
                <div class="col-lg-12">
                    <button class="btn-sm btn-warning"
                        wire:click="saveReply('{{ $product_id }}', '{{ $parent_id }}', '{{ $comment_id }}')">Gửi</button>
                </div>
            </div>
        </div>
    </div>
</div>
