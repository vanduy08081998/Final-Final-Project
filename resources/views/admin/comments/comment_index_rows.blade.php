<tr>
    <td class="text-left"><input type="checkbox" class="checkItem" name="checkItem[]"
            value="{{ $comment->id }}"></td>
    <td>
        <li class="nav-item dropdown" style="list-style-type: none">
            <a class="nav-link text-left" href="#">
                {{ $prefix ?? '' }} <span></span> {{ $value->user->name ?? '' }}
            </a>
        </li>
    </td>
    <td class="text-left">{{ $value->comment_content }}</td>
    <td class="text-center">
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle radius-30" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="bx bx-cog"></i></button>
            <div class="dropdown-menu" style="">
                <a href="{{ route('comment.edit', $value->id) }}" class="text-primary radius-30 dropdown-item"><i
                        class="bx bx-edit"></i> Sửa</a>
                <form action="{{ route('comment.destroy', $value->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="dropdown-item text-danger"><i class="bx bx-trash">Thùng rác</i></button>
                </form>

            </div>
        </div>
    </td>
</tr>
