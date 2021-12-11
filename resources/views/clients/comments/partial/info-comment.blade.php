@if ($value->user->position == 'admin')
    <div class="avt-qtv">
        <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="">
    </div>
    <strong class="name-{{ $value->id }}">{{ $value->user->name }}</strong>
    <b class="qtv">Quản trị viên</b>
@else
    @if ($value->user->avatar)
        <div class="avt-qtv">
            <img src="{{ url('uploads/Users/' . $value->user->avatar) }}" alt="">
        </div>
        <strong class="name-{{ $value->id }}">{{ $value->user->name }}</strong>
    @else
        <div class="avt-qtv">
            <img src="{{ URL::to('backend/img/profiles/avt.png') }}" alt="">
        </div>
        <strong class="name-{{ $value->id }}">{{ $value->user->name }}</strong>
    @endif

@endif

<div class="infocom_ask">
    <div class="form-comment-show edit-comment-{{ $value->id }} d-none pb-1">
        <input type="text" class="form-control edit-comment-form-{{ $value->id }} form-comment-text"
            value="{{ $value->comment_content }}">
        <div class="handle mt-1">
            <button type="button" class="recall btn-submit-text bg-danger" data-id="{{ $value->id }}"
                data-url="{{ url('comment/recall/' . $value->id) }}">Thu hồi</button>

            <button type="button" class="edit bg-aqua text-dark btn-submit-text" data-id="{{ $value->id }}"
                data-url="{{ url('comment/editComment/' . $value->id) }}">Sửa</button>
            <button type="button" class="esc bg-danger text-light" data-id="{{ $value->id }}">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </div>
    </div>
    <div class="pb-1 comment-body-{{ $value->id }} body-comment">
        {{ $value->comment_content }}
    </div>

    <div class="relate_infocom">
        @if ($value->user->id != $idUser)
            <span class="reply reply-comment" data-id="{{ $value->id }}">Trả
                lời</span>
            <b class="dot">.</b>
        @else
            <span class="edit-comment" onclick="editComment({{ $value->id }})">
                <i class="fas fa-edit"></i>
                Chỉnh sửa
            </span>
            <b class="dot">.</b>
        @endif



        @if (in_array($idUser, $value->usersLike->pluck('id')->all()))
            <span class="numlike isLike">
                <i class="fas fa-thumbs-up"></i>
                <span wire:click="UnLikeComment('{{ $value->id }}')">Bỏ thích</span>
            </span>
        @else
            <span class="numlike">
                <i class="fas fa-thumbs-up"></i>
                <span class="like" wire:click="likeComment('{{ $value->id }}')">Thích</span>
            </span>
        @endif

        <span class="date">
            <b class="dot">.</b>
            {{ $value->created_at->diffForHumans() }}
        </span>

        @if ($value->usersLike->count())
            <span class="list-like">
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                {{ $value->usersLike->count() }}
                <div class="comment-list-like-user">
                    @foreach ($value->usersLike as $user)
                        @if ($idUser == $user->id)
                            <li class="name-user">Bạn</li>
                        @else
                            <li class="name-user">{{ $user->name }}</li>
                        @endif
                    @endforeach
                </div>
            </span>
        @endif
    </div>

    @if (Auth::user())
        @if (Auth::user()->position == 'admin' && $value->user->position != 'admin')
            <div class="admin-com">
                <i class="fa fa-th-list" aria-hidden="true"></i>
                <div class="admin-handle">
                    <ul>
                        <span class="recall" data-id="{{ $value->id }}"
                            data-url="{{ url('comment/recall/' . $value->id) }}">Xóa</span>
                        <span>Chặn</span>
                    </ul>
                </div>
            </div>
        @endif
    @endif


</div>
<div class="clr"></div>
