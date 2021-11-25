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
                                <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ml-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Settings</button>
                            <button type="button"
                                class="btn btn-primary bg-split-primary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown"> <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left"> <a class="dropdown-item"
                                    href="javascript:;">Action</a>
                                <a class="dropdown-item" href="javascript:;">Another action</a>
                                <a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                    link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
                <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card radius-5">
                                <div class="card-header">
                                    Thêm mới
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
                                        <label for="name">Tiêu đề (SEO)</label>
                                        <input class="form-control" name="meta_title" value="{{ old('meta_title') }}"
                                            type="text">
                                        @error('meta_title')
                                            <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="name">Từ khóa (SEO)</label>
                                        <input class="form-control" data-role="tagsinput" name="meta_keywords"
                                            value="{{ old('meta_keywords') }}" type="text">
                                        @error('meta_keywords')
                                            <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
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
                                    Hành động
                                </div>
                                <div class="card-body">

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary radius-5 float-right">Thêm
                                        mới</button>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    Danh mục
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Thuộc danh mục</label>
                                        <select name="category_id[]" class="js-example-basic-multiple form-control"
                                            multiple="multiple">
                                            @foreach (App\Models\Category::where('category_parent_id', null)->get() as $item)
                                                @include('admin.Categories.categoryOptions', ['item' => $item])

                                                @foreach ($item->subcategory()->get() as $childCategory)
                                                    @include('admin.Categories.categoryOptions', ['item' =>
                                                    $childCategory,
                                                    'prefix' => '--'])

                                                    @foreach ($childCategory->subcategory()->get() as $childCategory2)
                                                        @include('admin.Categories.categoryOptions', ['item' =>
                                                        $childCategory2,
                                                        'prefix' => '----'])
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
                                <div class="card-body d-flex justify-content-center">
                                    <div class="preview hide mb-3">
                                        <img src="https://st4.depositphotos.com/14953852/24787/v/600/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg"
                                            alt="" height="100px" width="100px">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="brand_image" onchange="readURL(this);"
                                                class="custom-file-input" id="inputGroupFile04"
                                                aria-describedby="inputGroupFileAddon04">
                                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>


                                        </div>
                                    </div>
                                    @error('brand_image')
                                        <span class="text-danger">{{ $errors->first('brand_image') }}</span>
                                    @enderror
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
