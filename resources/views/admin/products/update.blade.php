@extends('layouts.admin_master')

@section('title', 'Chỉnh sửa sản phẩm')


@section('content')
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Chỉnh sửa sản phẩm</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa sản phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card radius-15">
                    <div class="card-title">
                        <h6 class="mb-0">Thêm sản phẩm</h6>
                    </div>
                    <hr/>
                    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label>Nhập tên sản phẩm</label>
                                <input class="form-control" name="product_name" type="text" onkeyup="ChangeToSlug();" value="{{ $product->product_name }}" id="slug" placeholder="Enter your name product">
                            </div>

                            @error('product_name')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label>Slug sản phẩm</label>
                                <input class="form-control" name="product_slug" type="text" id="convert_slug" value="{{ $product->product_slug }}" placeholder="Enter your name product">
                            </div>

                            @error('product_slug')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <!-- INput Group -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="name">Tiêu đề (SEO)</label>
                                <input class="form-control" name="meta_title" type="text" value="{{ $product->meta_title }}" placeholder="Enter your meta title">
                            </div>

                            @error('meta_title')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <!-- End -->

                        <!-- INput Group -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="">Từ khóa (SEO)</label>
                                <input type="text" data-role="tagsinput" name="meta_keywords" value="meta_keywords" placeholder="Enter your meta keywords">
                            </div>

                            @error('meta_keywords')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <!-- End -->

                        <!-- INput Group -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="name">Mô tả (SEO)</label>
                                <textarea class="form-control" name="meta_description" id="meta_desc" type="text" placeholder="Enter your meta description" cols="30"
                                    rows="10">value="{{ $product->meta_description }}"</textarea>
                            </div>

                            @error('meta_description')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <!-- End -->


                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label>Hình ảnh sản phẩm</label>
                                <input id="" type="file" name="product_image">
                            </div>

                            
                            @error('product_image')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <button class="btn btn-primary"> <i class="bx bx-cog"></i> Chỉnh sửa sản phẩm</button>
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
            .create(document.querySelector('#meta_desc'))
    </script>
@endpush