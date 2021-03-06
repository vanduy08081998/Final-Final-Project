@extends('admin.layouts.master')

@section('title')
    Thương hiệu | Thùng rác
@endsection

@section('content')
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    <div class="breadcrumb-title pr-3">Thương hiệu</div>
                    <div class="pl-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Thương hiệu</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ml-auto">
                        <div class="btn-group">
                            <a href="{{ route('brand.create') }}" class="btn btn-primary radius-30">Thêm thương hiệu</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="mb-0">Thùng rác</h4>
                        </div>
                        <hr />
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Thương Hiệu</th>
                                        <th style="text-align: center;">Tên TH</th>
                                        <th style="text-align: center;">Danh mục SP</th>
                                        <th style="text-align: center;">Công cụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brandAll as $brand)

                                        <tr>
                                            <td class="py-2">
                                                <div style="text-align: center;">
                                                    <div class="position-relative mr-2">
                                                        <img class="avatar" width="90" height="58"
                                                            src="{{ url('uploads/Brands/', $brand->brand_image) }}" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $brand->brand_name }}
                                            </td>
                                            <td style="text-align: center;">
                                                @foreach ($brand->categories as $item)

                                                    <button class="btn-sm btn-primary">{{ $item->category_name }}</button>

                                                @endforeach
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                            class="bx bx-cog"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                        <form action="{{ url('admin/brand/restore/' . $brand->id) }}"
                                                            method="POST">
                                                            @csrf

                                                            <button class="dropdown-item text-infor">Khôi phục</button>
                                                        </form>

                                                        <form action="{{ url('admin/brand/force-delete/' . $brand->id) }}"
                                                            method="POST">
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
