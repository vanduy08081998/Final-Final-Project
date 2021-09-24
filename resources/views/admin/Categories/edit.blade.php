@extends('layouts.admin_master')

@section('title')
    Sửa danh mục -  {{ $category->category_name ?? '' }}
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
                            <li class="breadcrumb-item active" aria-current="page">Sửa danh mục</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card radius-15">
                <div class="card-body">

                    <form action="{{ route('categories.update', $category->id_cate) }}" method="post" enctype="multipart/form-data" >

                        @csrf
                        @method('PUT')

                        <!-- INput Group -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control" name="category_name" type="text" onkeyup="ChangeToSlug();"  id="slug" value="{{ $category->category_name ?? '' }}">
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
                                    value="{{ $category->category_slug }}" type="text">
                            </div>

                        </div>
                        <!-- End -->
                        <!-- INput Group -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="name">Danh mục cha</label>
                                <select name="category_parent_id" id="" class="form-control">
                                    <option value="">Chọn danh mục</option>
                                    @foreach (App\Models\Category::where('category_parent_id', NULL)->get() as $item)
                                        @include('admin.Categories.categoryOptions', ['item' => $item, 'category' => $category])

                                        @foreach ($item->subcategory()->get() as $childCategory)
                                            @include('admin.Categories.categoryOptions', ['item' => $childCategory, 'category' => $category, 'prefix' => '--'])

                                            @foreach ($childCategory->subcategory()->get() as $childCategory2)
                                                @include('admin.Categories.categoryOptions', ['item' => $childCategory2,'category' => $category, 'prefix' => '----'])
                                            @endforeach
                                        @endforeach
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- INput Group -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="name">Mô tả (SEO)</label>
                                <textarea class="form-control"  name="meta_desc" id="meta_desc" cols="30" rows="10">{{ $category->meta_desc ?? '' }}</textarea>
                                @error('meta_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- End -->

                        <!-- INput Group -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="">Từ khóa (SEO)</label>
                                <input type="text" data-role="tagsinput" value="{{ $category->meta_keywords ?? '' }}" name="meta_keywords" value="">
                                @error('meta_keywords')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- End -->

                        <!-- INput Group -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="name">Tiêu đề (SEO)</label>
                                <input class="form-control" name="meta_title" value="{{ $category->meta_title ?? '' }}" type="text" value="">
                                @error('meta_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- End -->

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary radius-30" id="submit1"> <i class="bx bx-cog"></i> Sửa danh mục</button>
                        </div>


                    </form>

                </div>
            </div>

        </div>
    </div>
    <!--end page-content-wrapper-->
</div>
@endsection

@push('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#meta_desc' ) )





</script>
@endpush
