<tr class="@if ($value->user->position != 'admin') qtv @endif">
    <td class="text-left"><input type="checkbox" class="checkItem" name="checkItem[]"
            value="{{ $value->id }}"></td>
    <td class="text-left">

        <strong class="text-info">
          {!! $value->user->position == 'admin' ? '<b class="logo-qtv">Quản Trị Viên</b>' : $value->user->name !!}
       </strong>
        {!! $value->replyOne ? ($value->replyOne->user->position == 'admin' ? 'đã trả lời <b class="logo-qtv">Quản Trị Viên</b>' : 'đã trả lời <strong>' . $value->replyOne->user->name . '</strong>') : '' !!}

    </td>

    <td class="text-left">
        <div style="width:400px; text-overflow: ellipsis; overflow: hidden;">
            {{ $value->comment_content }}
        </div>
    </td>

    <td class="text-left">
        @if ($value->comment_admin_feedback == 1 && $value->user->position != 'admin')
            <a class="btn btn-info rounded-0">Đã phản
                hồi</a>
        @elseif($value->user->position == 'admin')
            <button type="button" class="btn btn-secondary rounded-0" onclick="editFeedback({{ $value->id }})">Chỉnh
                sửa</button>
        @else
            <button type="button" class="btn btn-warning rounded-0"
                onclick="feedback({{ $value->id }}, {{ $parent_id }})">Phản
                hồi</button>
        @endif
    </td>


    <td>
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle rounded-0" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="bx bx-cog"></i></button>
            <div class="dropdown-menu" style="">
                <a href="{{ route('comment.delete', $value->id) }}" class="text-danger radius-30 dropdown-item"><i
                        class="bx bx-edit"></i> Thùng rác</a>
            </div>
        </div>
    </td>
    <style>
        .qtv {
            background: #CCFFFF;
        }

        .logo-qtv {
            display: inline-block;
            padding: 5px 10px;
            background: #FFCC00;
            color: #000;
        }

    </style>
</tr>
