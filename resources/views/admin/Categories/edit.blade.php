@extends('admin.layouts.master')

@section('title')
    Sửa danh mục - {{ $category->category_name ?? '' }}
@endsection


@section('content')
    <div class="content container-fluid">
        @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Quản lý danh
        mục'])
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @include('admin.inc.card-header', ['table_title' => 'Loại sản phẩm' , 'table_content' =>
                    'Quản lý loại sản phẩm'])
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category->id_cate) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card radius-5">
                                        <div class="card-body">
                                            <!-- INput Group -->
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label for="name">Tên danh mục</label>
                                                    <input class="form-control" name="category_name" type="text"
                                                        onkeyup="ChangeToSlug();" id="slug"
                                                        value="{{ $category->category_name ?? '' }}">
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
                                                    <label for="name">Icon</label>
                                                    <input class="form-control" name="category_icon" type="text"
                                                        value="{{ $category->category_icon ?? '' }}">
                                                    @error('category_icon')
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
                                                        cols="30" rows="10">{{ $category->meta_desc ?? '' }}</textarea>
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
                                                    <input type="text" data-role="tagsinput"
                                                        value="{{ $category->meta_keywords ?? '' }}" name="meta_keywords"
                                                        value="">
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
                                                    <input class="form-control" name="meta_title"
                                                        value="{{ $category->meta_title ?? '' }}" type="text" value="">
                                                    @error('meta_title')
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
                                                        @include('admin.Categories.categoryOptions', ['item' => $item,'category' => $category->id])

                                                        @foreach ($item->subcategory()->get() as $childCategory)
                                                            @include('admin.Categories.categoryOptions', ['item' =>
                                                            $childCategory,
                                                            'prefix' => '--','category' => $category->id])

                                                            @foreach ($childCategory->subcategory()->get() as $childCategory2)
                                                                @include('admin.Categories.categoryOptions', ['item' =>
                                                                $childCategory2,
                                                                'prefix' => '----','category' => $category->id])
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="d-block">
                                                <button type="submit" class="btn btn-primary radius-5 float-right"
                                                    id="submit1">Cập
                                                    nhật</button>
                                            </div>
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
