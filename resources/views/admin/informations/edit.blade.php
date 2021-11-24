@extends('admin.layouts.master')

@section('title', 'Thêm địa chỉ liên hệ')

@section('content')

    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12">
                <form action="{{ route('informations.update', $infors->id) }}" method="post" enctype="multipart/form-data"
                    id="choice-form">
                    @csrf
                    @method('PATCH')
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-sm-12 col-lg-8 col-8 col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="poster" value="1">
                                    <div class="form-group">
                                        <label>Giờ mở cữa</label>
                                        <input class="form-control" name="start_time" type="time"
                                            value="{{ $infors->start_time }}">
                                    </div>

                                    @error('start_time')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label>Giờ đóng cữa</label>
                                        <input class="form-control" name="end_time" type="time"
                                            value="{{ $infors->end_time }}">
                                    </div>

                                    @error('end_time')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="">Địa chỉ</label><br>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $infors->address }}" placeholder="Nhập địa chỉ cữa hàng">
                                    </div>

                                    @error('address')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="">Số điện thoại</label><br>
                                        <input type="text" class="form-control" name="phone" value="{{ $infors->phone }}"
                                            placeholder="+84********">
                                    </div>

                                    @error('phone')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="">Email</label><br>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $infors->email }}" placeholder="***********@gmail.com">
                                    </div>

                                    @error('email')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="">Google map</label><br>
                                        <input type="text" class="form-control" name="gg_map"
                                            value="{{ $infors->gg_map }}" placeholder="Nhập thẻ của google map">
                                    </div>

                                    @error('gg_map')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-8">
                            <button class="btn btn-primary" style="float: right;">Cập nhập</button>
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
        $('.iframe-btn').fancybox({
            'width': 900,
            'height': 600,
            'type': 'iframe',
            'autoScale': false
        });
        CKEDITOR.replace('blog_content')
        $(document).ready(function() {
            $('.js-example-basic-multiple').selectpicker();
        });
    </script>
@endpush
