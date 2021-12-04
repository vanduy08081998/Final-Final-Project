<div class="commentask pt-2 childs-comment-line" style="margin-left: 30px;">
    @if ($replyChilds->user->position == 'admin')
        <div class="avt-qtv">
            <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="">
        </div>
        <strong class="name-{{ $replyChilds->id }}">{{ $replyChilds->user->name }}</strong>
        <b class="qtv">Quản trị viên</b>
    @else
        <div class="avt-qtv">
            <img src="{{ $replyChilds->user->avatar }}" alt="">
        </div>
        <strong class="name-{{ $replyChilds->id }}">{{ $replyChilds->user->name }}</strong>

    @endif
    <div class="infocom_ask">
        <div class="form-comment-show edit-comment-{{ $replyChilds->id }} d-none pb-1">
            <input type="text" class="form-control edit-comment-form-{{ $replyChilds->id }} form-comment-text"
                value="{{ $replyChilds->comment_content }}">
            <div class="handle mt-1">
                <button type="button" class="recall btn-submit-text bg-danger" data-id="{{ $replyChilds->id }}"
                    data-url="{{ url('comment/recall/' . $replyChilds->id) }}">Thu hồi</button>

                <button type="button" class="edit bg-aqua text-dark btn-submit-text" data-id="{{ $replyChilds->id }}"
                    data-url="{{ url('comment/editComment/' . $replyChilds->id) }}">Sửa</button>
                <button type="button" class="esc bg-danger text-light"><i class="fa fa-sign-out"
                        aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="pb-1 comment-body-{{ $replyChilds->id }} body-comment">
            {{ $replyChilds->comment_content }}
        </div>

        <div class="relate_infocom">
            @if ($replyChilds->user->id != $userLoginId)
                <span class="reply reply-comment" data-id="{{ $replyChilds->id }}">Trả
                    lời</span>
                <b class="dot">.</b>
            @else
                <span class="edit-comment" onclick="editComment({{ $replyChilds->id }})"><i
                        class="fa fa-pencil-square" aria-hidden="true"></i>Chỉnh sửa
                </span>
                <b class="dot">.</b>
            @endif


            @php
                $isUser = $replyChilds->usersLike->pluck('id')->all();
            @endphp
            @if (in_array($userLoginId, $isUser))
                <span class="numlike isLike">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span wire:click="UnLikeComment('{{ $replyChilds->id }}')">Bỏ thích</span>
                </span>
            @else
                <span class="numlike">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span class="like" wire:click="likeComment('{{ $replyChilds->id }}')">Thích</span>
                </span>
            @endif

            <span class="date">
                <b class="dot">.</b>
                {{ $replyChilds->created_at->diffForHumans() }}
            </span>

            @if ($replyChilds->usersLike->count())
                <span class="list-like">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    {{ $replyChilds->usersLike->count() }}
                    <div class="comment-list-like-user">
                        @foreach ($replyChilds->usersLike as $user)
                            @if ($userLoginId == $user->id)
                                <li class="name-user">Bạn</li>
                            @else
                                <li class="name-user">{{ $user->name }}</li>
                            @endif
                        @endforeach
                    </div>
                </span>
            @endif
        </div>
    </div>
    <div class="clr"></div>
</div>
<!--Form gửi bình luận-->
<div class="d-block" style="padding-left: 60px">
    <div class="form-comment-show d-none reply-comment-{{ $replyChilds->id }}">
        <div class="col-lg-12 mt-2">
            <textarea class="form-control body-{{ $replyChilds->id }} form-comment-text" cols="2" rows="2"
                wire:model.defer="comment_content"></textarea>
            <div class="form-comment">
                <div class="row p-1">
                    <div class="col-lg-12">
                        <button class="btn-submit-text"
                            wire:click="saveReply('{{ $product->id }}', '{{ $reply->id }}', '{{ $replyChilds->id }}')">Trả
                            lời</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
