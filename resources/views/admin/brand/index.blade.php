@extends('layouts.admin_master')

@section('title')
Trang chủ
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
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Liệt kê thương hiệu</h4>
                    </div>
                    <hr />
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Tên thương hiệu</th>
                                    <th>Hình thương hiệu</th>
                                    <th>Tiêu đề (SEO)</th>
                                    <th>Từ khóa (SEO)</th>
                                    <th>Mô tả (SEO)</th>
                                    <th>Hành động</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brandAll as $brand)
                                <tr>
                                    <td>{{ $prefix ?? '' }} {{ $brand->brand_name ?? '' }}</td>
                                    <td><img src="{{ url('public/uploads/brand/' . $brand->brand_image) }}" alt=""
                                    height="80px">
                                    <td>{{ Str::limit($brand->meta_title, 30,'...' ) ?? ''}}</td>
                                    <td>{{ Str::limit($brand->meta_keywords, 30,'...') ?? '' }}</td>
                                    <td>{!! Str::limit($brand->meta_desc, 30,'...') ?? '' !!}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                    class="bx bx-cog"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                <a class="dropdown-item text-warning"
                                                    href="{{ route('brand.edit', ['brand' => $brand->id]) }}">Sửa</a>
                                                <form action="{{ route('brand.destroy', ['brand' => $brand->id]) }}"
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