    <div class="avt-qtv">
        <img src="{{ asset('frontend/img/bigdeal.gif') }}" alt="" style="border-radius:50%;">
    </div>
    <strong class="name-{{ $value->id }}">BigDeal</strong>
    <b class="qtv">Quản trị viên</b>

    <div class="infocom_ask">
        <div class="form-comment-show edit-comment-{{ $value->id }} d-none pb-1">

            <textarea class="form-control edit-comment-form-{{ $value->id }} form-validated" cols="2"
                rows="2">{{ $value->comment_content }}</textarea>

            <div class="handle mt-1">
                <button type="button" class="recall btn-submit-text bg-danger"
                    wire:click.prevent="recall('{{ $value->id }}')">Thu hồi</button>

                <button type="button" class="edit btn-submit-text" data-id="{{ $value->id }}"
                    data-url="{{ url('comment/editComment/' . $value->id) }}">Sửa</button>
                <button type="button" class="esc" data-id="{{ $value->id }}">
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


            <span class="numlike @if (in_array($idUser, $value->usersLike->pluck('id')->all())) isLike  @endif" wire:click="likeComment('{{ $value->id }}')">
                <i class="fas fa-thumbs-up"></i>
                <span>Hài lòng</span>
            </span>

            <span style="margin-left: 8px" class="numlike @if (in_array($idUser, $value->userUnsatisfied->pluck('id')->all())) isLike  @endif"
                wire:click="unsatisfied('{{ $value->id }}')">
                <i class="mt-1 fas fa-thumbs-down"></i>
                <span>Không hài lòng</span>
            </span>

            <span class="date">
                <b class="dot">.</b>
                {{ $value->created_at->diffForHumans() }}
            </span>

        </div>
    </div>
    <div class="clr"></div>
