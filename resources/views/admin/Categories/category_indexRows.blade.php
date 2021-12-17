<tr>
    <td>
        <li class="nav-item dropdown" style="list-style-type: none">
            <a class="nav-link" href="#">
                {{ $prefix ?? '' }} <span>{!! $value->category_icon ?? '' !!}</span> {{ $value->category_name ?? '' }}
            </a>
        </li>
    </td>
    <td>{!! Str::limit($value->meta_desc, 60, '...') ?? '' !!}</td>
    <td>
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle radius-30" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="bx bx-cog"></i></button>
            <div class="dropdown-menu" style="">
                <a href="{{ route('categories.edit', $value->id_cate) }}"
                    class="text-primary radius-30 dropdown-item"><i class="bx bx-edit"></i> Sửa</a>
                <form action="{{ route('categories.destroy', $value->id_cate) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="dropdown-item text-danger"><i class="bx bx-trash">Xóa</i></button>
                </form>
                <a href="#" class="dropdown-item text-success" data-toggle="modal"
                    data-target="#exampleModal_{{ $value->id_cate }}"><i class="bx bx-edit"></i> Xem thương
                    hiệu</a>
                <a href="{{ route('attribute', ['id' => $value->id_cate]) }}" class="dropdown-item text-dark"><i
                        class="bx bx-edit"></i> Xem thuộc tính</a>
            </div>
        </div>

        @include('admin.Categories.category_brand_modal',['value' => $value])
    </td>
</tr>
