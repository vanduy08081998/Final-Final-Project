@extends('admin.layouts.master')

@section('title')
    Quản lý vai trò
@endsection

@section('content')



    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0 ">
                    <div class="card-body">
                        <h4 class="text-primary mb-2">Danh sách vai trò: </h4>
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
                                            <td style="text-align: left">
                                                @if ($role->name == 'admin')
                                                    <button type="button" class="btn btn-danger font-weight-bold">
                                                        <span aria-hidden="true" class="bi bi-person-check"></span>
                                                        {{ $role->name }}</button>
                                            </td>
                                        @else
                                            <button type="button" class="btn btn-outline-primary font-weight-bold">
                                                <span aria-hidden="true" class="bi bi-person-check"></span>
                                                {{ $role->name }}</button></td>
                                    @endif
                                    <td style="text-align: left">
                                        @if ($role->name != 'admin')
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                        class="bx bx-cog"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                    <a class="dropdown-item text-primary"
                                                        href="{{ route('add_permissions', [$role->id]) }}">
                                                        Gán quyền</a>

                                                </div>
                                            </div>
                                        @endif
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
