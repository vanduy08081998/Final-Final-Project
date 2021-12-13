<!--Form bình luận-->
<div class="{{ $class }}">
    <div class="{{ $form }} d-none form-comment-show reply-comment-{{ $value->id }}">
        <div class="form-reply-show">
            <div class="d-block">
                <textarea class="form-control body-{{ $value->id }} form-validated" cols="2" rows="2"
                    wire:model.lazy="comment_content"></textarea>
            </div>
            <div class="form-footer">
                <button wire:click.prevent="saveReply('{{ $parent_id }}', '{{ $value->id }}')">Trả
                    lời <i class="fa fa-reply" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
