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
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customerAll as $customer)
                                <tr>
                                    <td style="text-align: left">{{ $customer->name }}</td>
                                    <td style="text-align: left">{{ $customer->email }}</td>
                                    <td style="text-align: left">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                    class="bx bx-cog"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                <form action="{{ route('users.destroy', ['user' => $customer->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item text-danger">Xóa tài khoản</button>
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
