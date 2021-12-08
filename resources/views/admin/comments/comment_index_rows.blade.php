<tr>
    <td class="text-left"><input type="checkbox" class="checkItem" name="checkItem[]"
            value="{{ $value->id }}"></td>
    <td>
        <li class="nav-item dropdown" style="list-style-type: none">
            <a class="nav-link text-left" href="#">
                {{ $prefix ?? '' }} <span></span> {{ $value->user->name ?? '' }}
            </a>
        </li>
    </td>

    <td class="text-left">{{ $value->comment_content }}</td>
    <td class="text-left">
        @if ($value->comment_admin_feedback == 1)
            <a href="{{ url('admin/comment/' . $parent . '/feedback/' . $value->id) }}" class="btn btn-info">Đã phản
                hồi</a>
        @elseif($value->user->position == 'admin')
            <a href="{{ route('comment.edit', $value->id) }}" class="btn btn-secondary">Chỉnh
                sửa</a>
        @else
            <a href="{{ url('admin/comment/' . $parent . '/feedback/' . $value->id) }}" class="btn btn-warning">Phản
                hồi</a>
        @endif
    </td>

</tr>
