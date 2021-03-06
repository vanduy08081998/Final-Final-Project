@extends('admin.layouts.master')

@section('title')
    Quản lý bài viết
@endsection

@section('content')
    <!-- Page Wrapper -->

    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    @include('admin.inc.card-header', ['table_title' => 'Danh sách bài viết'])
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered datatable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Tiêu đề</th>
                                        <th style="text-align: center;">Danh mục</th>
                                        <th style="text-align: center;">Mô tả</th>
                                        <th style="text-align: center;">Người đăng</th>
                                        <th style="text-align: center;">Ngày đăng</th>
                                        <th style="text-align: center;">Công cụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td style="text-align: center;">
                                                {!! Str::limit($blog->blog_title, 30, '...') ?? '' !!}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $blog->blogCate()->first()->blogCate_name }}
                                            </td>
                                            <td style="text-align: center;">
                                                {!! Str::limit($blog->blog_description, 30, '...') ?? '' !!}
                                            </td>
                                            <td style="text-align: center;">
                                                @php
                                                    var_dump($blog->user()->first());
                                                @endphp
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $blog->created_at }}
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                            class="bx bx-cog"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                        @if ($blog->blog_status == 2)
                                                            <a class="dropdown-item text-success"
                                                                href="{{ route('blogs.BlogOn', $blog->id) }}"><i
                                                                    class="fas fa-eye"></i> Duyệt bài
                                                            </a>
                                                        @else
                                                            <a class="dropdown-item text-secondary"
                                                                href="{{ route('blogs.BlogOff', $blog->id) }}"><i
                                                                    class="fas fa-eye-slash"></i> Ẩn bài
                                                            </a>
                                                        @endif
                                                        <a class="dropdown-item text-warning"
                                                            href="{{ route('blogs.edit', $blog->id) }}"><i
                                                                class="fas fa-edit"></i> Sửa
                                                        </a>
                                                        <form action="{{ route('blogs.destroy', $blog->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item text-danger"><i
                                                                    class="fas fa-trash-alt"></i> Xóa</button>
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
