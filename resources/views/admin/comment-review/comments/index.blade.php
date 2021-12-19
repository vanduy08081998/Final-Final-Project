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
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-flex align-items-center">Bình luận <i
                                class="mr-2 ml-2 fas fa-caret-right"></i>
                            <span class="text-success">Đã duyệt</span> <i class="mr-2 ml-2 fas fa-caret-right"></i>
                            <em>Sản phẩm
                                {{ trans($product->product_name) }}</em>
                        </h4>
                        <p class="card-text">
                            Danh sách bình luận theo sản phẩm
                        </p>
                    </div>
                    <form action="{{ route('comment.handle') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="card-title">
                                <div class="d-block mt-2">
                                    <select name="handle" id="" class="form-select-sm">
                                        <option value="">------- Hành động -------</option>
                                        <option value="trash">Thùng rác</option>
                                    </select>
                                    <button class="btn-sm btn-primary handle rounded-0" type="submit" disabled>Hành
                                        động</button>
                                    <a class="btn btn-primary rounded-0"
                                        href="{{ route('comment.list-clearance', $product->id) }}">Chờ duyệt <span
                                            class="badge badge-light">{{ $countComment }}</span></a>
                                    <a class="btn btn-primary rounded-0"
                                        href="{{ route('comment.answered', $product->id) }}">Chờ
                                        phản hồi <span class="badge badge-light">{{ $countA }}</span></a>
                                    @if ($countTrashed)
                                        <a href="{{ route('comment.trash', $product->id) }}"
                                            class="btn-sm btn-warning rounded-0 float-right mr-1">Thùng
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
                                            <td>{{ trans('Hành động') }}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->comments as $comment)
                                            @if ($comment->comment_parent_id == 0 && $comment->clearance_at)
                                                @include('admin.comment-review.comments.comment_index_rows', ['value' =>
                                                $comment, 'parent_id'
                                                => $comment->id])

                                                @foreach ($comment->reply as $reply)
                                                    @include('admin.comment-review.comments.comment_index_rows', ['value' =>
                                                    $reply, 'parent_id' =>
                                                    $reply->id])

                                                    @foreach ($reply->reply as $replyChilds)
                                                        @include('admin.comment-review.comments.comment_index_rows',
                                                        ['value' =>
                                                        $replyChilds,
                                                        'parent_id' => $reply->id])
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </tbody>
                                    @livewire('admin.admin-comment')
                                </table>
                            </div>
                        </div>
                    </form>
                    <input type="text" value="{{ url('admin/comment/handle') }}" class="d-none url-handle">
                </div>
            </div>
        </div>
    </div>

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

    <script>
        function feedback(id, parent_id) {
            window.livewire.emit('feedback', id, parent_id)
        }
    </script>
@endpush
