@extends('admin.layouts.master')

@section('title', 'Thêm sản phẩm')

@section('content')

    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data" id="choice-form">
                    @csrf
                    @method('PATCH')
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                            @include('admin.inc.card-header', ['table_title' => 'Cập nhật bài viết'])
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="id_blogCate" class="form-control" id="single__category">
                                            @foreach ($blogCate as $blogCate)
                                                <option name="id_blogCate" value="{{ $blogCate->id }}" {{ $blog->id_blogCate == $blogCate->id ? 'selected' : ''  }} >{{ $blogCate->blogCate_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_blogCate')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="poster" value="1">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input class="form-control" name="blog_title" value="{{ $blog->blog_title }}" type="text" id="slug"
                                            placeholder="Enter your name post">
                                    </div>

                                    @error('blog_title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="name">Mô tả</label>
                                        <input class="form-control" name="blog_description" value="{{ $blog->blog_description }}" type="text" value=""
                                            placeholder="Enter your meta title">
                                    </div>

                                    @error('blog_description')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="">Từ khóa</label><br>
                                        <input type="text" data-role="tagsinput" class="form-control" value="{{ $blog->meta_keywords }}" name="meta_keywords"
                                             placeholder="Enter your meta keywords">
                                    </div>

                                    @error('meta_keywords')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="name">Nội dung</label>
                                        <textarea class="form-control" name="blog_content" id="blog_content" type="text"
                                            placeholder="Enter your meta description" cols="30" rows="10">{{ $blog->blog_content }}</textarea>
                                    </div>

                                    @error('blog_content')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">Ảnh tiêu đề</div>
                                <div class="card-body">
                                  <div class="form-group">
                                      <div class="input-group mb-3" data-type="image">
                                        <div class="custom-file">
                                          <a href="{{ asset('rfm/filemanager/dialog.php?field_id=image') }}"  class="custom-file-input iframe-btn" id="customFile"></a>
                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                          <input type="hidden" id="image" data-upload="blog_image" data-preview="preview">
                                          <input type="hidden" name="blog_image" value="{{ $blog->blog_image }}">
                                        </div>
                                      </div>
                                      <div id="preview">
                                            <img src="{{ asset($blog->blog_image) }}" width="80" height="80" alt="">
                                      </div>
                                  </div>
                                  <div id="render__image__single"></div>
                                  @error('blog_image')
                                      <span class="text-danger"> {{ $message }} </span>
                                  @enderror
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-12">
                            <button class="btn btn-primary" style="float: right;">Cập nhật</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!--end page-content-wrapper-->
    </div>
@endsection

@push('script')

    <script>
      CKEDITOR.replace( 'blog_content' )
        $(document).ready(function() {
            $('.js-example-basic-multiple').selectpicker();
        });
        
    

    </script>
@endpush
