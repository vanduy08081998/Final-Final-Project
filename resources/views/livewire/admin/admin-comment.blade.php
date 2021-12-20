<div>
    <div class="modal fade" wire:ignore.self id="StoreFeedbackModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Phản hồi</h5>
                    <button type="button" class="close" wire:click.prevent="close_modal('store')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="update_phone">
                    @if ($modelId && $handle == 'store')
                        <div class="modal-body">

                            <div class="d-block user-comment">
                                <div class="avt">
                                    <img src="{{ asset('uploads/Users/' . $modelId->user->avatar) }}" alt="">
                                </div>
                                <strong class="name">
                                    {{ $modelId->user->name }}
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    <a href="">{{ $modelId->product->product_name }}</a>
                                </strong>

                                <div class="body-comment">
                                    <div class="body">
                                        {{ $modelId->comment_content }}
                                    </div>
                                </div>
                                <div class="footer-comment">
                                    <em>{{ $modelId->created_at->diffForHumans() }}</em>
                                </div>
                            </div>



                            <div class="form-feedback">
                                <textarea name="comment_content" class="form-control" cols="3" rows="3"
                                    wire:model.lazy="comment_content"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info"
                                wire:click.prevent="storeFeedback('{{ $modelId->comment_id_product }}', '{{ $parent_id }}', '{{ $modelId->id }}')">Trả
                                lời</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="EditFeedbackModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Chỉnh sửa</h5>
                    <button type="button" class="close" wire:click.prevent="close_modal('edit')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @if ($modelId && $handle == 'edit')
                    <div class="modal-body">

                        <div class="d-block user-comment">
                            <div class="avt">
                                <img src="{{ asset('uploads/Users/' . $modelId->replyOne->user->avatar) }}" alt="">
                            </div>
                            <strong class="name">
                                {{ $modelId->replyOne->user->name }}
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                                <a href="">{{ $modelId->product->product_name }}</a>
                            </strong>

                            <div class="body-comment">
                                <div class="body">
                                    {{ $modelId->replyOne->comment_content }}
                                </div>
                            </div>
                            <div class="footer-comment">
                                <em>{{ $modelId->replyOne->created_at->diffForHumans() }}</em>
                            </div>
                        </div>
                        <div class="form-feedback">
                            <textarea name="comment_content" class="form-control" cols="3" rows="3"
                                wire:model.lazy="comment_content"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info"
                            wire:click.prevent="updateFeedback('{{ $modelId->id }}')">Cập
                            nhật</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
