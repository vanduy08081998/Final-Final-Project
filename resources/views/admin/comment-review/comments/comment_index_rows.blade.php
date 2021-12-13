<tr>
    <td class="text-left"><input type="checkbox" class="checkItem" name="checkItem[]"
            value="{{ $value->id }}"></td>
    <td class="text-left">

        <strong class="text-info">{{ $value->user->name ?? '' }}</strong>
        {!! $value->replyOne ? 'đã trả lời <strong>' . $value->replyOne->user->name . '</strong>' : '' !!}

    </td>

    <td class="text-left">
        <div style="width:400px; text-overflow: ellipsis; overflow: hidden;">
            {{ $value->comment_content }}
        </div>
    </td>

    <td class="text-left">
        @if ($value->comment_admin_feedback == 1 && $value->user->position != 'admin')
            <a class="btn btn-info">Đã phản
                hồi</a>
        @elseif($value->user->position == 'admin')
            <a class="btn btn-secondary">Chỉnh
                sửa</a>
        @else
            <button type="button" class="btn btn-warning"
                onclick="feedback({{ $value->id }}, {{ $parent_id }})">Phản
                hồi</button>
        @endif
    </td>


    <td>
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle radius-30" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="bx bx-cog"></i></button>
            <div class="dropdown-menu" style="">
                <a href="{{ route('comment.delete', $value->id) }}" class="text-danger radius-30 dropdown-item"><i
                        class="bx bx-edit"></i> Thùng rác</a>
            </div>
        </div>
    </td>

</tr>
