@extends('layouts.admin_master')

@section('title')
    Thêm danh mục
@endsection


@section('content')
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    <div class="breadcrumb-title pr-3">Danh mục</div>
                    <div class="pl-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm danh mục</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card radius-5">
                                <div class="card-body">

                                    <!-- INput Group -->
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name">Tên danh mục</label>
                                            <input class="form-control" name="category_name" type="text"
                                                value="{{ old('category_name') }}" onkeyup="ChangeToSlug();" id="slug">
                                            @error('category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End -->

                                    <!-- INput Group -->
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name">Slug danh mục</label>
                                            <input class="form-control" name="category_slug" id="convert_slug"
                                                value="{{ old('category_slug') }}" type="text">
                                        </div>

                                    </div>
                                    <!-- End -->
                                    <!-- INput Group -->

                                    <!-- End -->

                                    <!-- INput Group -->
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name">Tiêu đề (SEO)</label>
                                            <input class="form-control" name="meta_title" type="text" value="">
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
                                            <input type="text" data-role="tagsinput" name="meta_keywords" value="">
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
                                            <textarea class="form-control" name="meta_desc" id="meta_desc" type="text"
                                                cols="30" rows="10"></textarea>

                                            @error('meta_desc')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End -->


                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card radius-5">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Danh mục cha</label>
                                        <select name="category_parent_id" id="" class="form-control">
                                            <option value="">Chọn danh mục</option>
                                            @foreach (App\Models\Category::where('category_parent_id', null)->get() as $item)
                                                @include('admin.Categories.categoryOptions', ['item' => $item])

                                                @foreach ($item->subcategory()->get() as $childCategory)
                                                    @include('admin.Categories.categoryOptions', ['item' => $childCategory,
                                                    'prefix' => '--'])

                                                    @foreach ($childCategory->subcategory()->get() as $childCategory2)
                                                        @include('admin.Categories.categoryOptions', ['item' =>
                                                        $childCategory2,
                                                        'prefix' => '----'])
                                                    @endforeach
                                                @endforeach
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="d-block">
                                        <button type="submit" class="btn btn-primary radius-5 float-right" id="submit1">Thêm
                                            mới</button>
                                    </div>
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
        ClassicEditor
            .create(document.querySelector('#meta_desc'))
    </script>
@endpush
