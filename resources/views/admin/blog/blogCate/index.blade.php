@extends('admin.layouts.master')

@section('title')
    Quản lý danh mục bài viết
@endsection

@section('content')
    <!-- Page Wrapper -->

    <div class="content container-fluid">

        @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Quản lý danh
        mục'])

        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    @include('admin.inc.card-header', ['table_title' => 'Danh mục bài viết' , 'table_content' =>
                    'Quản lý danh mục bài viết'])
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered datatable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Danh mục</th>
                                        <th style="text-align: center;">Mô tả</th>
                                        <th style="text-align: center;">Công cụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogCate as $blogCate)
                                        <tr>
                                            <td style="text-align: center;">
                                                {{ $blogCate->blogCate_name }}
                                            </td>
                                            <td style="text-align: center;">
                                                {!! $blogCate->meta_title !!}
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                            class="bx bx-cog"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                        <a class="dropdown-item text-warning"
                                                            href="{{ route('blogCate.edit', $blogCate->id) }}">Sửa</a>
                                                        <form
                                                            action="{{ route('blogCate.destroy', $blogCate->id) }}"
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
    <!-- /Page Wrapper -->
@endsection
