<div class="commentask">
    <div class="avt-qtv">
        <img src="{{ $reply->user->avatar }}" alt="">
    </div>
    <strong class="name-{{ $reply->id }}">{{ $reply->user->name }}</strong>
    <div class="infocom_ask">
        <div class="all-edit-comment edit-comment-{{ $reply->id }} d-none pb-1">
            <input type="text" class="form-control edit-comment-form-{{ $reply->id }} form-comment-text"
                value="{{ $reply->comment_content }}">
            <div class="handle mt-1">
                <button type="button" class="recall btn-submit-text bg-danger" data-id="{{ $reply->id }}"
                    data-url="{{ url('comment/recall/' . $reply->id) }}">Thu hồi</button>

                <button type="button" class="edit bg-aqua text-dark btn-submit-text" data-id="{{ $reply->id }}"
                    data-url="{{ url('comment/editComment/' . $reply->id) }}">Sửa</button>
                <button type="button" class="esc bg-danger text-light"><i class="fa fa-sign-out"
                        aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="pb-1 comment-content-{{ $reply->id }} comment-content-all">
            {{ $reply->comment_content }}
        </div>
        <div class="relate_infocom">
            @if ($reply->user->id != $userLoginId)
                <span class="reply reply-comment" data-id="{{ $reply->id }}">Trả
                    lời</span>
                <b class="dot">.</b>
            @else
                <span class="edit-comment" onclick="editComment({{ $reply->id }})"><i class="fa fa-pencil-square"
                        aria-hidden="true"></i>Chỉnh sửa
                </span>
                <b class="dot">.</b>
            @endif

            @php
                $isUser = $reply->usersLike->pluck('id')->all();
            @endphp

            @if (in_array($userLoginId, $isUser))
                <span class="numlike isLike">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span wire:click="UnLikeComment('{{ $reply->id }}')">Bỏ thích</span>
                </span>

            @else
                <span class="numlike">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span class="like" wire:click="likeComment('{{ $reply->id }}')">Thích</span>
                </span>
            @endif

            <span class="date">
                <b class="dot">.</b>
                {{ $reply->created_at->diffForHumans() }}
            </span>

            @if ($reply->usersLike->count())
                <span class="list-like">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    {{ $reply->usersLike->count() }}
                    <div class="comment-list-like-user">
                        @foreach ($reply->usersLike as $user)
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

<div class="d-block" style="padding-left: 30px">
    <div class="comment-inline d-none reply-comment-{{ $reply->id }}">
        <div class="col-lg-12 mt-2">
            <textarea class="form-control body-{{ $reply->id }} form-comment-text" cols="2" rows="2"
                wire:model.lazy="comment_content"></textarea>
            <div class="form-comment">
                <div class="row p-1">
                    <div class="col-lg-12">
                        <button class="btn-submit-text"
                            wire:click="saveReply('{{ $product->id }}', '{{ $reply->id }}', '{{ $reply->id }}')">Trả
                            lời</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
