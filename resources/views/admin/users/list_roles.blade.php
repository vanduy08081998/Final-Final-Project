@extends('admin.layouts.master')

@section('title')
Quản lý vai trò
@endsection

@section('content')



<div class="content container-fluid">

    @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Danh sách vai trò'])

    <div class="row">

        <div class="col-sm-8">
            <div class="card mb-0 ">
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
                                    <th>STT</th>
                                    <th>Vai trò</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($all_roles as $role)
                                @php
                                $i++;
                                @endphp
                                <tr>
                                    <td style="text-align: left">{{ $i }}</td>
                                    <td style="text-align: left"> <button type="button"
                                            class="btn btn-danger font-weight-bold">
                                            <span aria-hidden="true" class="bi bi-person-check"></span>
                                            {{$role->name}}</button></td>

                                    <td style="text-align: left">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                    class="bx bx-cog"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                <a class="dropdown-item text-primary" href="">
                                                    Gán quyền</a>
                                                <a class="dropdown-item text-danger"
                                                    href="{{route('delete-role',[$role->id])}}"
                                                    onclick="return confirm('Xóa sẽ khiến thu hồi vai trò. Bạn có chắc chắn muốn xóa vai trò này không?')">
                                                    Xóa</a>
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

        <div class="col-sm-4">
            <div class="card mb-0">
                <div class="card-body">
                    @if (session('message1'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message1') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <form action="{{ route('create-role')}}" method="post">
                            @csrf
                            <label>Tên vai trò</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle-o"
                                            aria-hidden="true"></i></span>
                                </div>
                                <input name="name" value="{{ old('name') }}" type="text"
                                    class="form-control  @error('name') is-invalid @enderror border-left-0"
                                    placeholder="Tên vai trò" autocomplete="off" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info mt-2">Thêm vai trò</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
@endsection
