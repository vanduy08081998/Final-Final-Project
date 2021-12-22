@extends('admin.layouts.master')

@section('title')
    Danh sách thuộc tính sản phẩm
@endsection

@section('content')
    <div class="content container-fluid">
        <div class="card-title">
            <h4 class="text-primary mb-2 d-inline font-weight-bold">Quản lý thuộc
                tính sản phẩm </h4>
                <span class="text-right mb-3 float-right"><a href="{{ route('attribute.create') }}" class="btn btn-info"
                    style="border-radius: 40px">Thêm thuộc tính sản phẩm</a></span>
            <hr />
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table id="example" class="table table-striped table-bordered datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Thuộc tính</th>
                                    <th style="text-align: center;">Slug</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attribute as $attri)
                                    <tr>
                                        <td><a
                                                href="{{ route('variant', ['slug' => $attri->slug]) }}">{{ $attri->name }}</a>
                                        </td>
                                        <td>{{ $attri->slug }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                        class="bx bx-cog"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                    <a class="dropdown-item text-warning" style="text-align: center;"
                                                        href="{{ route('attribute.edit', ['attribute' => $attri->id]) }}"><i class="fas fa-edit"></i> Sửa</a>
                                                    <form
                                                        action="{{ route('attribute.destroy', ['attribute' => $attri->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item text-danger" style="text-align: center;"><i class="fas fa-trash-alt"></i> Xóa</button>
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
@endsection
