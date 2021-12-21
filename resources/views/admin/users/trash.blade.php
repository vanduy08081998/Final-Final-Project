@extends('admin.layouts.master')

@section('title')
Quản lý tài khoản
@endsection

@section('content')

<!-- Page Wrapper -->

<div class="content container-fluid">

    @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Thùng rác (tài khoản nhân
    viên)'])

    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-0">
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="datatable table table-stripped mb-0">
                            <thead>
                                <tr>
                                    <th style="text-align: left;">Tài khoản</th>
                                    <th style="text-align: left;">Email</th>
                                    <th style="text-align: center;">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userAll as $user)
                                <tr>
                                    <td style="text-align: left">{{ $user->name }}</td>
                                    <td style="text-align: left">{{ $user->email }}</td>
                                    <td style="text-align: center;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                    class="bx bx-cog"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                <form action="{{ route('user_restore', $user->id) }}" method="POST">
                                                    @csrf

                                                    <button class="dropdown-item text-infor">Khôi phục</button>
                                                </form>

                                                <form action="{{ route('user_forceDelete',$user->id) }}" method="POST">
                                                    @csrf
                                                    <button class="dropdown-item text-danger">Xóa vĩnh viễn</button>
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
