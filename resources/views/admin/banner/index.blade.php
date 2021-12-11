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
                    <div class="breadcrumb-title pr-3">Slide</div>
                    <div class="pl-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Slide</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ml-auto">
                        <div class="btn-group">
                            <a href="{{ route('banners.create') }}" class="btn btn-primary radius-30">Thêm slide</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                            @if (session('message'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('message') }}
                                        </div>
                            @endif
                        <div class="card-title">
                            
                            <h4 class="mb-0">Liệt kê slide</h4>
                        </div>
                        <hr />
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>

                                        <th style="text-align: center;">Ảnh</th>
                                        <th style="text-align: center;">Tên slide</th>
                                        <th style="text-align: center;">Link slide</th>
                                        <th style="text-align: center;">Nội dung slide</th>
                                        <th style="text-align: center;">Công cụ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bannerAll as $banner)

                                        <tr>
                                            <td class="py-2">
                                                <div style="text-align: center;">
                                                    <div class="position-relative mr-2">
                                                        <img class="avatar" width="90" height="58"
                                                            src="{{ url('uploads/Banner/', $banner->banner_img) }}" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $banner->banner_name }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $banner->banner_link }}

                                            </td>
                                            <td style="text-align: center;">
                                                {{ $banner->banner_content }}

                                            </td>
                                            <td style="text-align: center;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                            class="bx bx-cog"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                        <a class="dropdown-item text-warning"
                                                            href="{{ route('banners.edit', ['banner' => $banner->id]) }}">Sửa</a>
                                                        <form
                                                            action="{{ route('banners.destroy', ['banner' => $banner->id]) }}"
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
    </div>
@endsection
