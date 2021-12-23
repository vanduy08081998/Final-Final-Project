@extends('admin.layouts.master')

@section('title', 'Cập nhật slide')


@section('content')
    <div class="content container-fluid">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--end breadcrumb-->
                <form action="{{ route('banners.update', $bannerId->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card radius-5">
                                <div class="card-header">
                                   <h4 class="font-weight-bold text-dark"> Cập nhật slide </h4>
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
                                            <input class="form-control" name="banner_name" id="banner_name"
                                                value="{{ $bannerId->banner_name }}" onkeyup="ChangeToSlug();"
                                                type="text">
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
                                            <input class="form-control" name="banner_link" id="banner_link"
                                                value="{{ $bannerId->banner_link }}" type="text">
                                            @error('banner_slug')
                                                <span class="text-danger">{{ $errors->first('banner_link') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name">Nội dung slide</label>
                                            <input class="form-control" name="banner_content" id="banner_content"
                                                value="{{ $bannerId->banner_content }}" type="text">
                                            @error('banner_content')
                                                <span class="text-danger">{{ $errors->first('banner_content') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">Hành động</div>
                                <div class="card-body"></div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary radius-5 float-right">Cập
                                        nhật</button>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">Ảnh slide</div>
                                <div class="card-body d-flex justify-content-center">
                                    <div class="preview hide mb-3" id="image__preview">
                                        <img src="{{ url('uploads/Banner/' . $bannerId->banner_img) }}" alt=""
                                            height="100px" width="100px">
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
