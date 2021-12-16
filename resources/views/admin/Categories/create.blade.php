@extends('admin.layouts.master')

@section('title')
    Thêm danh mục
@endsection


@section('content')
    <div class="content container-fluid">
        @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Thêm danh
        mục'])
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @include('admin.inc.card-header', ['table_title' => 'Loại sản phẩm' , 'table_content' =>
                    'Quản lý loại sản phẩm'])
                    <div class="card-body">
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
                                                        value="{{ old('category_name') }}" onkeyup="ChangeToSlug();"
                                                        id="slug">
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
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label for="name">Icon</label>
                                                    <input class="form-control" name="category_icon" type="text"
                                                        value="{{ old('category_icon') }}">
                                                    @error('category_icon')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
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
                                                    <textarea class="form-control" name="meta_desc" id="meta_desc"
                                                        type="text" cols="30" rows="10"></textarea>

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
<<<<<<< HEAD
                                                        @include('admin.Categories.categoryOptions', ['item' => $item,
                                                        'category' => ''])
=======
                                                        @include('admin.Categories.categoryOptions', ['item' => $item,'category' => ''])
>>>>>>> Product

                                                        @foreach ($item->subcategory()->get() as $childCategory)
                                                            @include('admin.Categories.categoryOptions', ['item' =>
                                                            $childCategory,
<<<<<<< HEAD
                                                            'prefix' => '--', 'category' => ''])
=======
                                                            'prefix' => '--','category' => ''])
>>>>>>> Product

                                                            @foreach ($childCategory->subcategory()->get() as $childCategory2)
                                                                @include('admin.Categories.categoryOptions', ['item' =>
                                                                $childCategory2,
<<<<<<< HEAD
                                                                'prefix' => '----', 'category' => ''])
=======
                                                                'prefix' => '----','category' => ''])
>>>>>>> Product
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="d-block">
                                                <button type="submit" class="btn btn-primary radius-5 float-right"
                                                    id="submit1">Thêm
                                                    mới</button>
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

@push('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#meta_desc'))
    </script>
@endpush
