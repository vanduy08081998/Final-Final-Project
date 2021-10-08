@extends('layouts.admin_master')

@section('title', 'Quản lý sản phẩm')

@section('content')

    <div class="page-wrapper">
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
                                <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ml-auto">
                        <div class="btn-group">
                            <a href="{{ route('products.create') }}" class="btn btn-primary radius-30">Thêm mới sản phẩm</a>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="mb-0">Sắp xếp sản phẩm</h4>
                        </div>
                        <hr />
                        <div class="table-responsive">
                            <table id="example" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Sản phẩm</th>
                                        <th style="text-align: center;">Tên SP</th>
                                        <th style="text-align: center;">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $pro)
                                        <tr>
                                            <td class="py-2">
                                                <div style="text-align: center;">
                                                    <div class="position-relative mr-2">
                                                        <img class="avatar" width="110" height="115"
                                                            src="{{ url('uploads/Products/', $pro->product_image) }}" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="text-align: center;">{{ $pro->product_name }}</td>
                                            <td style="text-align: center;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                            class="bx bx-cog"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                        <a class="dropdown-item text-warning"
                                                            href="{{ route('products.edit', ['product' => $pro->id]) }}">Sửa</a>
                                                        <form
                                                            action="{{ route('products.destroy', ['product' => $pro->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item text-danger">Xóa</button>
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
        <!--end page-content-wrapper-->
    </div>
@endsection
