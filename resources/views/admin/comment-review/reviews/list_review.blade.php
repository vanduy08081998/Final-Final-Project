@extends('admin.layouts.master')

@section('title')
    Trang chủ
@endsection

@section('content')
    <div class="content container-fluid">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    <div class="breadcrumb-title pr-3">Sản phẩm</div>
                    <div class="pl-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Đánh giá sản phẩm</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card">
                    <form action="#" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">Liệt kê sản phẩm có đánh giá</h4>
                            </div>
                            <hr />
                            {{-- <div class="table-responsive"> --}}
                            <table class="datatable table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Hình ảnh</th>
                                        <th class="text-center">Sản phẩm</th>
                                        <th class="text-center">Sao đánh giá</th>
                                        <th class="text-center">Lượt đánh giá</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        @if ($product->reviews->count())
                                            <tr>
                                                <td class="py-2">
                                                    <div class="text-center">
                                                        <div class="position-relative mr-2">
                                                            <img width="60" height="80"
                                                                src="{{ asset($product->product_image) }}" />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    {{ $product->product_name }}
                                                </td>
                                                <td class="text-center">
                                                    @for ($count = 1; $count <= round($product->rating); $count++)
                                                        <i class="fa fa-star fs-ms text-danger me-1"></i>
                                                    @endfor
                                                    @for ($count = 1; $count <= 5 - round($product->rating); $count++)
                                                        <i class="fa fa-star-o fs-ms text-danger me-1"></i>
                                                    @endfor
                                                    <strong class="text-danger">({{ $product->rating }})</strong>
                                                </td>
                                                <td class="text-center">
                                                    {{ $product->count_review }} lượt đánh giá
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-success dropdown-toggle radius-30"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i class="bx bx-cog"></i></button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                            <a class="dropdown-item text-warning"
                                                                href="{{ route('product.review', $product->id) }}">Xem
                                                                đánh
                                                                giá</a>
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
                    <input type="text" value="{{ url('admin/review/handle') }}" class="d-none url-handle">
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
