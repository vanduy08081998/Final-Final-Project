<!-- Modal -->
<div class="modal fade" id="exampleModal_{{ $value->id_cate }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            <th>Hành động</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($value->brands as $brand)
                            <tr>
                                <td>{{ $brand->brand_name }}</td>
                                <td><img src="{{ url('public/uploads/brand/' . $brand->brand_image) }}" alt="" height="40px">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                class="bx bx-cog"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                            <a class="dropdown-item text-warning"
                                                href="{{ route('brand.edit', ['brand' => $brand->id]) }}">Sửa</a>
                                            <a class="dropdown-item text-danger"
                                                href="{{ route('detach-brand', ['brand_id' => $brand->id, 'cate_id' => $value->id_cate]) }}">Xóa liên kết</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <p class="text-center text-danger">Không có dữ liệu</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
