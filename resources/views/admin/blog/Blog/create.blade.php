@extends('admin.layouts.master')

@section('title', 'Thêm sản phẩm')

@section('content')

    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data" id="choice-form">
                    @csrf
                    @method('POST')
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-sm-12 col-lg-8 col-8 col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="id_blogCate" class="form-control" id="single__category">
                                            @foreach ($blogCate as $blogCate)
                                                <option name="id_blogCate" value="{{ $blogCate->id }}">{{ $blogCate->blogCate_name }}
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
                        <div class="col-md-8 col-sm-12 col-lg-8 col-8 col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="poster" value="1">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input class="form-control" name="blog_title" type="text" id="slug"
                                            placeholder="Enter your name post">
                                    </div>

                                    @error('blog_title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="name">Mô tả</label>
                                        <input class="form-control" name="blog_description" type="text" value=""
                                            placeholder="Enter your meta title">
                                    </div>

                                    @error('blog_description')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="">Từ khóa</label>
                                        <input type="text" data-role="tagsinput" class="form-control" name="meta_keywords"
                                            value="" placeholder="Enter your meta keywords">
                                    </div>

                                    @error('meta_keywords')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="name">Nội dung</label>
                                        <textarea class="form-control" name="blog_content" id="blog_content" type="text"
                                            placeholder="Enter your meta description" cols="30" rows="10"></textarea>
                                    </div>

                                    @error('blog_content')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-sm-12 col-lg-8 col-8 col-xl-8">
                            <div class="card">
                                <div class="card-header">Ảnh tiêu đề</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group mb-3" data-type="image">
                                          <div class="custom-file">
                                            <a href="{{ asset('rfm/filemanager/dialog.php?field_id=image') }}"  class="custom-file-input iframe-btn" id="customFile"></a>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            <input type="hidden" id="image" data-upload="blog_image" data-preview="preview">
                                            <input type="hidden" name="blog_image">
                                          </div>
                                        </div>
                                        <div id="preview">
                                              
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
                        <div class="col-sm-8">
                            <button class="btn btn-primary" style="float: right;">Thêm sản phẩm</button>
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
        
        $(document).ready(function() {
            $('.js-example-basic-multiple').selectpicker();
        });
        
    

    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#blog_content'))
    </script>
@endpush
