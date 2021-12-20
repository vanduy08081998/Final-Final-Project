@extends('admin.layouts.master')

@section('title', 'Thêm slide')


@section('content')
    <div class="content container-fluid">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    <div class="breadcrumb-title pr-3">Slide</div>
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
                <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data"
                    autocomplete="off">
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
                                            <label for="name">Tên slide</label>
                                            <input class="form-control" name="banner_name"
                                                value="{{ old('banner_name') }}" type="text">
                                            @error('banner_name')
                                                <span class="text-danger">{{ $errors->first('banner_name') }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <!-- End -->

                                    <!-- INput Group -->
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name">Link slide</label>
                                            <input class="form-control" name="banner_link" id=""
                                                value="{{ old('banner_link') }}" type="text">
                                            @error('banner_link')
                                                <span class="text-danger">{{ $errors->first('banner_link') }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name">Nội dung slide</label>
                                            <input class="form-control" name="banner_content" id=""
                                                value="{{ old('banner_content') }}" type="text">
                                            @error('banner_content')
                                                <span class="text-danger">{{ $errors->first('banner_content') }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name">Loại banner</label>
                                            <select name="banner_type" class="form-control">
                                                <option value="">
                                                    <span>Loại banner</span>
                                                </option>
                                                <option value="0">
                                                    <span>Banner chính</span>
                                                </option>
                                                <option value="1">
                                                    <span>Banner Quảng cáo</span>
                                                </option>
                                            </select>
                                            @error('banner_type')
                                                <span class="text-danger">{{ $errors->first('banner_type') }}</span>
                                            @enderror
                                        </div>
                                        <input class="form-control" name="status" value="0" value="{{ old('status') }}"
                                            type="hidden">
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
                                    Ảnh
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <div class="preview hide mb-3" id="image__preview">
                                        <img src="https://st4.depositphotos.com/14953852/24787/v/600/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg"
                                            alt="" height="100px" width="100px">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="file-options">
                                        <a class="btn-file iframe-btn"
                                            href="{{ asset('rfm/filemanager') }}/dialog.php?field_id=image"
                                            style="color: #1e272e; font-size: 24px;"><input class="upload"><i
                                                class="fa fa-upload"></i></a>
                                    </div>
                                    <input type="hidden" id="image" data-upload="banner_img" data-preview="image__preview">
                                    <input type="hidden" name="banner_img">

                                    @error('banner_img')
                                        <span class="text-danger">{{ $errors->first('banner_img') }}</span>
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
