@extends('admin.layouts.master')

@section('title')
    Quản lý đánh giá
@endsection

@section('content')
    <!-- Page Wrapper -->

    <div class="content container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-flex align-items-center">Đánh giá <i
                                class="mr-2 ml-2 fas fa-caret-right"></i>
                            <span class="text-warning">Chưa được duyệt</span> <i class="mr-2 ml-2 fas fa-caret-right"></i>
                            <em>Sản phẩm
                                {{ trans($product->product_name) }}</em>
                        </h4>
                        <p class="card-text">
                            Danh sách đánh giá theo sản phẩm
                        </p>
                    </div>
                    <form action="{{ route('comment.handle') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="card-title">
                                <div class="d-block mt-2">
                                    <select name="handle" id="" class="form-select-sm" required>
                                        <option value="">------- Hành động -------</option>
                                        <option value="delete">Xóa</option>
                                        <option value="clearace">Duyệt</option>
                                    </select>
                                    <button class="btn-sm btn-primary handle" type="submit" disabled>Hành động</button>
                                    <a href="{{ route('product.review', $product->id) }}" class="btn btn-success">Đã
                                        duyệt</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="datatable table table-stripped mb-0">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <td><input type="checkbox" id="checkAll"></td>
                                            <td>{{ trans('Người đánh giá') }}</td>
                                            <td>{{ trans('Sao đánh giá') }}</td>
                                            <td>{{ trans('Nội dung') }}</td>
                                            <td>{{ trans('Hành động') }}</td>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                            <tr>
                                                <td class="text-left"><input type="checkbox" class="checkItem"
                                                        name="checkItem[]" value="{{ $review->id }}"></td>
                                                <td class="text-left">
                                                    <strong
                                                        class="text-info">{{ $review->user->name ?? '' }}</strong>
                                                </td>
                                                <td class="text-left">
                                                    @for ($count = 1; $count <= round($review->count_rating); $count++)
                                                        <i class="fa fa-star fs-ms text-danger me-1"></i>
                                                    @endfor
                                                    @for ($count = 1; $count <= 5 - round($review->count_rating); $count++)
                                                        <i class="fa fa-star-o fs-ms text-danger me-1"></i>
                                                    @endfor
                                                </td>
                                                <td class="text-left">
                                                    <div style="width:400px; text-overflow: ellipsis; overflow: hidden;">
                                                        {{ $review->content_rating }}
                                                    </div>
                                                </td>
                                                <td class="text-left">
                                                    <a href="{{ route('review-admin.browse', $review->id) }}"
                                                        class="btn btn-warning"><i class="bx bx-edit"></i> Duyệt</a>
                                                    <a href="{{ route('review-admin.delete', $review->id) }}"
                                                        class="btn btn-danger"><i class="bx bx-edit"></i> Thùng rác</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>

                    <input type="text" value="{{ url('admin/review/handle') }}" class="d-none url-handle">
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
