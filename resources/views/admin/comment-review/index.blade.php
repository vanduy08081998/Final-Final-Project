@extends('admin.layouts.master')

@section('title')
    Trang chủ
@endsection

@section('content')
    @php
    use App\Models\Comment;
    @endphp
    <div class="content container-fluid">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="card">
                    <form action="#" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">Liệt kê sản phẩm theo bình luận</h4>
                            </div>
                            <hr />
                            {{-- <div class="table-responsive"> --}}
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" colspan="2">Sản phẩm được bình luận</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Chờ phản hồi</th>
                                        <th class="text-center">Chờ duyệt</th>
                                        <th class="text-center">Đánh giá và bình luận</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        @if ($product->comments->count())
                                            <tr>
                                                <td>
                                                    <div class="position-relative mr-2">
                                                        <img width="40" height="60"
                                                            src="{{ asset($product->product_image) }}" />
                                                    </div>
                                                </td>
                                                <td class="text-center">

                                                    {{ $product->product_name }}

                                                </td>
                                                <td class="text-center">
                                                    <button
                                                        class="btn btn-success">{{ $product->comments->count() }}</button>
                                                </td>
                                                <td class="text-center">
                                                    <button
                                                        class="btn btn-warning">{{ Comment::where([['comment_id_product', $product->id], ['comment_admin_feedback', null], ['clearance_at', '!=', null]])->count() }}</button>
                                                </td>
                                                <td class="text-center">
                                                    <button
                                                        class="btn btn-info">{{ Comment::where([['comment_id_product', $product->id], ['clearance_at', null]])->count() }}</button>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-success dropdown-toggle radius-30"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i class="bx bx-cog"></i></button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">

                                                            <a class="dropdown-item text-primary"
                                                                href="{{ route('product.comment', $product->id) }}">Xem
                                                                bình
                                                                luận</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- </div> --}}
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
