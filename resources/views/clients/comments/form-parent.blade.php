<div class="form-comment">
    <div class="col-lg-12">
        <textarea class="form-control" name="comment_content" cols="3" rows="3"
            wire:model.lazy="comment_content"></textarea>
        <div class="form-comment">
            <div class="row p-1">
                <div class="col-lg-12">
                    <button class="btn-sm btn-warning"
                        wire:click="saveParentComment('{{ $product->id }}')">Gửi</button>
                </div>
            </div>
        </div>

    </div>
</div>
