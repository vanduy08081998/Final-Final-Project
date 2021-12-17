@extends('admin.layouts.master')

@section('title', 'Thêm thương hiệu')


@section('content')
    <div class="content container-fluid">
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
                                <li class="breadcrumb-item active" aria-current="page">Thêm mới thương hiệu</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card radius-5">
                                <div class="card-header">
                                    Thêm mới thương hiệu
                                </div>
                                <div class="card-body">
                                    @if (session('message'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    <!-- INput Group -->
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name">Tên thương hiệu</label>
                                            <input class="form-control" name="brand_name" onkeyup="ChangeToSlug();"
                                                id="slug" value="{{ old('brand_name') }}" type="text">
                                            @error('brand_name')
                                                <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <!-- End -->

                                    <!-- INput Group -->
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name">Slug thương hiệu</label>
                                            <input class="form-control" name="brand_slug" id="convert_slug"
                                                value="{{ old('brand_slug') }}" type="text">
                                            @error('brand_slug')
                                                <span class="text-danger">{{ $errors->first('brand_slug') }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">SEO</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Từ khóa (SEO)</label>
                                        <input id="tags" class="form-control" data-role="tagsinput" name="meta_keywords"
                                            type="text" value="{{ old('meta_keywords') }}">
                                        @error('meta_keywords')
                                            <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Tiêu đề (SEO)</label>
                                        <input class="form-control" name="meta_title" value="{{ old('meta_title') }}"
                                            type="text">
                                        @error('meta_title')
                                            <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="name">Mô tả (SEO)</label>
                                        <input class="form-control" id="meta_desc" name="meta_desc"
                                            value="{{ old('meta_desc') }}" type="text">
                                        @error('meta_desc')
                                            <span class="text-danger">{{ $errors->first('meta_desc') }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">

                            <div class="card">
                                <div class="card-header">
                                    Danh mục
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Thuộc danh mục</label>
                                        <select name="category_id[]" class="js-example-basic-multiple form-control"
                                            data-live-search="true" data-live-search="true" multiple>
                                            @foreach (App\Models\Category::where('category_parent_id', null)->get() as $item)
                                                @include('admin.Categories.categoryOptions', ['item' => $item,'category' => ''])

                                                @foreach ($item->subcategory()->get() as $childCategory)
                                                    @include('admin.Categories.categoryOptions', ['item' =>
                                                    $childCategory,
                                                    'prefix' => '--','category' => ''])

                                                    @foreach ($childCategory->subcategory()->get() as $childCategory2)
                                                        @include('admin.Categories.categoryOptions', ['item' =>
                                                        $childCategory2,
                                                        'prefix' => '----','category' => ''])
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    Logo thương hiệu
                                </div>
                                <div class="card-footer">
                                    <div class="file-options">
                                        <a class="btn-file iframe-btn"
                                            href="{{ asset('rfm/filemanager') }}/dialog.php?field_id=image"
                                            style="color: #1e272e; font-size: 24px;"><input class="upload"><i
                                                class="fa fa-upload"></i></a>
                                    </div>
                                    <input type="hidden" id="image" data-upload="brand_image" data-preview="image__preview">
                                    <input type="hidden" name="brand_image">

                                    @error('brand_image')
                                        <span class="text-danger">{{ $errors->first('brand_image') }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary radius-5 float-right">Thêm
                                        mới</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end page-content-wrapper-->
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();


        });

        $(document).ready(function() {
            bsCustomFileInput.init()
        });
    </script>


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.preview')
                        .html(`<img src="${e.target.result}" style="width: 180px; hetght: 180px" alt="">`)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endpush
