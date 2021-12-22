@extends('admin.layouts.master')

@section('title')
    Trang chủ
@endsection

@section('content')
    <div class="content container-fluid">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="card">
                    <form action="{{ route('brand.handle') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">Liệt kê thương hiệu</h4>
                                <div class="d-block mt-2">
                                    <select name="handle" id="" class="form-select-sm">
                                        <option value="">------- Hành động ------</option>
                                        <option value="trash">------- Thùng rác ------</option>
                                    </select>
                                    <button class="btn-sm btn-primary handle rounded-0" type="submit" disabled>Hành
                                        động</button>
                                    @if ($countTrashed)
                                        <a href="{{ asset('admin/brand/trash') }}"
                                            class="btn btn-warning float-right">Thùng
                                            rác
                                            ({{ $countTrashed }})</a>

                                    @endif
                                </div>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered datatable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><input type="checkbox" id="checkAll"></th>
                                            <th class="text-center">Thương Hiệu</th>
                                            <th class="text-center">Tên TH</th>
                                            <th class="text-center">Danh mục SP</th>
                                            <th class="text-center">Công cụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brandAll as $brand)

                                            <tr>
                                                <td><input type="checkbox" class="checkItem" name="checkItem[]"
                                                        value="{{ $brand->id }}"></td>
                                                <td class="py-2">
                                                    <div class="text-center">
                                                        <div class="position-relative mr-2">
                                                            <img width="80" height="47"
                                                                src="{{ url($brand->brand_image) }}" />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    {{ $brand->brand_name }}
                                                </td>
                                                <td class="text-center">
                                                    @foreach ($brand->categories as $item)

                                                        <button type="button"
                                                            class="btn-sm btn-primary rounded-0">{{ $item->category_name }}</button>

                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-success dropdown-toggle rounded-0"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i class="bx bx-cog"></i></button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                            <a class="dropdown-item text-warning"
                                                                href="{{ route('brand.edit', ['brand' => $brand->id]) }}">Sửa</a>

                                                            <button type="button" class="dropdown-item text-danger trash"
                                                                data-id="{{ $brand->id }}">Thùng rác</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                    <form method="POST" name="form-trash">
                        @csrf
                        @method('DELETE')
                    </form>
                    <input type="text" value="{{ url('admin/brand/handle') }}" class="d-none url-handle">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let checkAll = $('#checkAll')
            let checkItem = $('.checkItem')
            let _token = $('input[name="_token"]').val();
            let formTrash = document.forms['form-trash']

            // Checked
            checkAll.change(function() {
                let isCheckAll = $(this).prop('checked')
                checkItem.prop('checked', isCheckAll)
                handle()
            })

            checkItem.change(function() {
                let isAllCheck = checkItem.length === $('.checkItem:checked').length
                checkAll.prop('checked', isAllCheck)
                handle()
            })

            function handle() {
                if ($('.checkItem:checked').length) {
                    $('.handle').attr('disabled', false)
                }
            }
            // Thùng rác
            $('.trash').click(function() {
                let id = $(this).data('id')
                formTrash.action = '/admin/brand/' + id + 'destroy'
                formTrash.submit()
            })

            // Hành động chung
            $('.handle-all').click(function() {
                let url = $('.url-handle').val()
                let handle = $(this).data('handle')
                console.log(handle);

                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        handle: handle,
                        _token: _token
                    },
                    success: function() {
                        window.location.href = 'http://127.0.0.1:8000/admin/brand/';
                    }
                })
            });
        });
    </script>

@endpush
