@extends('admin.layouts.master')

@section('title')
    Thêm danh mục bài viết
@endsection


@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-primary mb-2 d-inline font-weight-bold">Cập nhật danh mục bài viết: </h4>
                            <hr />
                        </div>
                        <form action="{{ route('blogCate.update', $blogCate->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card radius-5">
                                        <div class="card-body">

                                            <!-- INput Group -->
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label for="name">Tên danh mục</label>
                                                    <input class="form-control" name="blogCate_name" type="text"
                                                        value="{{ $blogCate->blogCate_name }}" onkeyup="ChangeToSlug();"
                                                        id="slug">
                                                    @error('blogCate_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End -->

                                            <!-- INput Group -->
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label for="name">Slug danh mục</label>
                                                    <input class="form-control" name="blogCate_slug" id="convert_slug"
                                                        value="{{ $blogCate->blogCate_slug }}" type="text">
                                                </div>

                                            </div>
                                            <!-- End -->
                                            <!-- INput Group -->
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label for="name">Tiêu đề (SEO)</label>
                                                    <input class="form-control" name="meta_title" type="text" value="{{ $blogCate->meta_title }}">
                                                    @error('meta_title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End -->

                                            <!-- INput Group -->
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label for="">Từ khóa (SEO)</label>
                                                    <input type="text" data-role="tagsinput" name="meta_keywords" value="{{ $blogCate->meta_keywords }}">
                                                    @error('meta_keywords')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End -->

                                            <!-- INput Group -->
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label for="name">Mô tả (SEO)</label>
                                                    <textarea class="form-control" name="meta_desc" id="meta_desc"
                                                        type="text" cols="30" rows="10">{!! $blogCate->meta_desc !!}</textarea>

                                                    @error('meta_desc')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-block">
                                                <button type="submit" class="btn btn-primary radius-5 float-right"
                                                    id="submit1">Cập nhập</button>
                                            </div>
                                            <!-- End -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#meta_desc'))
    </script>
@endpush
