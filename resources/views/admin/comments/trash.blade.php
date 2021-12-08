@extends('admin.layouts.master')

@section('title')
    Quản lý bình luận
@endsection

@section('content')
    <!-- Page Wrapper -->

    <div class="content container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    @include('admin.inc.card-header', ['table_title' => 'Bình luận' , 'table_content' =>
                    'Thùng rác'])
                    <form action="{{ route('comment.handle') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="card-title">
                                <div class="d-block mt-2">
                                    <select name="handle" id="" class="form-select-sm" required>
                                        <option value="">------- Hành động -------</option>
                                        <option value="delete">Xóa</option>
                                        <option value="restore">Khôi phục</option>
                                    </select>
                                    <button class="btn-sm btn-primary handle" type="submit" disabled>Hành động</button>
                                    <a class="btn btn-info handle-all" data-handle="restore-all">Khôi
                                        phục tất cả</a>
                                    <a href="{{ route('comment.index') }}" class="btn btn-success float-lg-right">Danh
                                        sách</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="datatable table table-stripped mb-0">
                                    <thead>
                                        <tr>
                                            <td><input type="checkbox" id="checkAll"></td>
                                            <td>{{ trans('Người bình luận') }}</td>
                                            <td>{{ trans('Nội dung') }}</td>
                                            <td>{{ trans('Phản hồi khách hàng') }}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comments as $comment)
                                            @include('admin.comments.comment_index_rows', ['value' => $comment, 'parent' =>
                                            '1'])
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>

                    <input type="text" value="{{ url('admin/comment/handle') }}" class="d-none url-handle">
                </div>
            </div>
        </div>
    </div>

    <!-- /Page Wrapper -->
@endsection
@push('script')
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.options.newestOnTop = false;
            toastr.error("{!! Session::get('message') !!}");
        </script>
    @endif

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
                let url = $(this).data('url')
                formTrash.action = url
                formTrash.submit()
            })

            // Hành động chung
            $('.handle-all').click(function() {
                let url = $('.url-handle').val()
                let handle = $(this).data('handle')
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        handle: handle,
                        _token: _token
                    },
                    success: function() {
                        window.location.href = 'http://127.0.0.1:8000/admin/comment/';
                    }
                })
            });
        });
    </script>
@endpush
