<div class="commentask">
    @if ($comment->user->position == 'admin')
        <div class="avt-qtv">
            <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="">
        </div>
        <strong class="name-{{ $comment->id }}">{{ $comment->user->name }}</strong>
        <b class="qtv">Quản trị viên</b>
    @else
        @if ($comment->user->avatar)
            <div class="avt-qtv">
                <img src="{{ url('uploads/Users/' . $comment->user->avatar) }}" alt="">
            </div>
            <strong class="name-{{ $comment->id }}">{{ $comment->user->name }}</strong>
        @else
            <i class="iconcom-user">NN</i>
            <strong class="name-{{ $comment->id }}">{{ $comment->user->name }}</strong>
        @endif

    @endif


    <div class="infocom_ask">

        <div class="form-comment-show edit-comment-{{ $comment->id }} d-none pb-1">
            <input type="text" class="form-control edit-comment-form-{{ $comment->id }} form-validated"
                value="{{ $comment->comment_content }}">
            <div class="handle mt-1">
                <button type="button" class="recall btn-submit-text bg-danger"
                    data-url="{{ url('comment/recall/' . $comment->id) }}">Thu hồi</button>

                <button type="button" class="edit btn-submit-text bg-warning" data-id="{{ $comment->id }}"
                    data-url="{{ url('comment/editComment/' . $comment->id) }}">Sửa</button>

                <button type="button" class="esc bg-primary text-light" data-id="{{ $comment->id }}"><i
                        class="fa fa-sign-out" aria-hidden="true"></i></button>
            </div>
        </div>

        <div class="pb-1 comment-body-{{ $comment->id }} body-comment">
            {{ $comment->comment_content }}
        </div>

        <div class="relate_infocom">
            @if ($comment->user->id != $userLoginId)
                <span class="reply" data-id="{{ $comment->id }}">Trả
                    lời</span>
                <b class="dot">.</b>
            @else
                <span class="edit-comment" onclick="editComment({{ $comment->id }})"><i class="fa fa-pencil-square"
                        aria-hidden="true"></i>Chỉnh sửa
                </span>
                <b class="dot">.</b>
            @endif

            @if (in_array($userLoginId, $comment->usersLike->pluck('id')->all()))
                <span class="numlike isLike">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span wire:click="UnLikeComment('{{ $comment->id }}')">Bỏ thích</span>
                </span>
            @else
                <span class="numlike">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span class="like" wire:click="likeComment('{{ $comment->id }}')">Thích</span>
                </span>
            @endif

            <span class="date">
                <b class="dot">.</b>
                {{ $comment->created_at->diffForHumans() }}
            </span>

            @if ($comment->usersLike->count())
                <span class="list-like">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    {{ $comment->usersLike->count() }}

                    <div class="comment-list-like-user">
                        @foreach ($comment->usersLike as $user)
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

<!--Form bình luận-->
<div class="comment_reply d-none form-comment-show reply-comment-{{ $comment->id }}">
    <div class="col-lg-12 mt-2">
        <textarea class="form-control body-{{ $comment->id }} form-comment-text" cols="2" rows="2"
            wire:model.lazy="comment_content"></textarea>
        <div class="form-comment">
            <div class="row p-1">
                <div class="col-lg-12">
                    <button class="btn-submit-text"
                        wire:click.prevent="saveReply('{{ $product->id }}', '{{ $comment->id }}', '{{ $comment->id }}')">Trả
                        lời</button>
                </div>
            </div>
        </div>
    </div>
</div>
