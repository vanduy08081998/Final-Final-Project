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
                    'Danh sách bình luận'])
                    <form action="{{ route('comment.handle') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="card-title">
                                <div class="d-block mt-2">
                                    <select name="handle" id="" class="form-select-sm">
                                        <option value="">------- Hành động -------</option>
                                        <option value="trash">Thùng rác</option>
                                    </select>
                                    <button class="btn-sm btn-primary handle" type="submit" disabled>Hành động</button>

                                    <a href="{{ url('admin/comment/isfeedback') }}"
                                        class="btn-sm btn-success float-lg-right mr-1">Đã
                                        phản hồi
                                        ({{ $isFeedback }})</a>
                                    <a href="{{ url('admin/comment/nonefeedback') }}"
                                        class="btn-sm btn-info float-lg-right mr-1">Chưa
                                        phản hồi
                                        ({{ $noneFeedback }})</a>

                                    @if ($countTrashed)
                                        <a href="{{ asset('admin/comment/trash') }}"
                                            class="btn-sm btn-warning float-right mr-1">Thùng
                                            rác
                                            ({{ $countTrashed }})</a>
                                    @endif

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

                                            @foreach ($comment->reply as $reply)
                                                @include('admin.comments.comment_index_rows', ['value' => $reply, 'prefix'
                                                =>
                                                '--', 'parent' => '1'])

                                                @foreach ($reply->reply as $replyChilds)
                                                    @include('admin.comments.comment_index_rows', ['value' =>
                                                    $replyChilds, 'prefix' => '----', 'parent' => '2'])
                                                @endforeach
                                            @endforeach

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
                console.log(handle);

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
