@extends('admin.layouts.master')

@section('title')
    Quản lý tài khoản
@endsection

@section('content')

    <!-- Page Wrapper -->

    <div class="content container-fluid">

        @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Danh sách khách hàng'])

        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="card-title">
                            <a href="{{ route('customer_trash') }}" class="btn btn-warning">Thùng rác
                                ({{ $countTrashed }})</a>
                            <hr />
                        </div>
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="datatable table table-stripped mb-0">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Tài khoản</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Khóa tài khoản</th>
                                        <th style="text-align: center;">Khóa bình luận</th>
                                        <th style="text-align: center;">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customerAll as $customer)
                                        <tr>
                                            <td style="text-align: center;">{{ $customer->name }}</td>
                                            <td style="text-align: center;">{{ $customer->email }}</td>
                                            <td id="account">
                                                <div class="status-toggle d-flex justify-content-center">
                                                    <input type="checkbox" id="account_lock_{{ $customer->id }}"
                                                        onchange="lockAccount({{ $customer->id }})" name="user_status"
                                                        value="{{ $customer->user_status }}" class="check"
                                                        @if ($customer->user_status == 1) checked @endif>
                                                    <label for="account_lock_{{ $customer->id }}"
                                                        class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td id="comment">
                                                <div class="status-toggle d-flex justify-content-center">
                                                    <input type="checkbox" id="comment_lock_{{ $customer->id }}"
                                                        onchange="lockComment({{ $customer->id }})" name="user_status"
                                                        value="{{ $customer->user_status }}" class="check"
                                                        @if ($customer->user_status == 2 || $customer->user_status == 1) checked @endif>
                                                    <label for="comment_lock_{{ $customer->id }}"
                                                        class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                            class="bx bx-cog"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                        <a class="dropdown-item text-warning" href="{{ route('history', $customer->id) }}"><i
                                                                class="fas fa-history"></i> Lịch sử mua</a>
                                                        <form
                                                            action="{{ route('users.destroy', ['user' => $customer->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item text-danger"><i
                                                                    class="fas fa-trash-alt"></i> Xóa tài khoản</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('script')
    <script>
        const lockAccount = (id) => {
            let val = '';

            if (!$('#account_lock_' + id).is(':checked')) {
                val = 0;
            } else {
                val = 1;
            }
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{ route('lockAccount') }}",
                data: {
                    _token: _token,
                    id: id,
                    val: val
                },
                success: function(response) {
                    toastr.success('Chỉnh sửa thành công!', 'Chúc mừng');
                }
            });
        }

        const lockComment = (id) => {
            let val = '';

            if (!$('#comment_lock_' + id).is(':checked')) {
                val = 0;
            } else {
                val = 2;
            }
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{ route('lockComment') }}",
                data: {
                    _token: _token,
                    id: id,
                    val: val
                },
                success: function(response) {
                    toastr.success('Chỉnh sửa thành công!', 'Chúc mừng');
                }
            });
        }
    </script>
@endpush
