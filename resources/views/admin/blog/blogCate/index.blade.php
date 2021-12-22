@extends('admin.layouts.master')

@section('title')
    Quản lý danh mục bài viết
@endsection

@section('content')
    <!-- Page Wrapper -->

    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
              
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-primary mb-2 d-inline font-weight-bold">Danh sách danh mục bài viết: </h4>
                            <hr />
                        </div>
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
                                                {!! Str::limit($blogCate->meta_title, 30, '...') ?? '' !!}
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
