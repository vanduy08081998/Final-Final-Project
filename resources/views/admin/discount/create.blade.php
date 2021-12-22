@extends('admin.layouts.master')

@section('title', 'Thêm mã giảm giá')


@section('content')
    <div class="content container-fluid">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--end breadcrumb-->
                <form action="{{ route('discount.store') }}" method="post" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card radius-5">
                                <div class="card-header">
                                    <h4 class="font-weight-bold text-dark"> Thêm mới phiếu giảm giá</h4>
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
                                            <label for="name">Mã giảm giá</label>
                                            <input class="form-control" name="discount_code" onkeyup="ChangeToSlug();"
                                                id="slug" value="{{ old('discount_code') }}" type="text">
                                            @error('discount_code')
                                                <span class="text-danger">{{ $errors->first('discount_code') }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name">Tiêu đề</label>
                                            <input class="form-control" name="discount_title"
                                                value="{{ old('discount_title') }}" type="text">
                                            @error('discount_title')
                                                <span class="text-danger">{{ $errors->first('discount_title') }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name">Tính năng</label>
                                            <select name="discount_feature" id="" class="form-control" required>
                                                <option value="">-- Lựa chọn --</option>
                                                <option value="percent">Phần trăm</option>
                                                <option value="money">Giá tiền</option>
                                            </select>
                                            @error('discount_feature')
                                                <span class="text-danger">{{ $errors->first('discount_feature') }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name">Số tiền hoặc phần trăm giảm</label>
                                            <input class="form-control" name="discount_deduct"
                                                value="{{ old('discount_deduct') }}" type="text" required>
                                            @error('discount_deduct')
                                                <span class="text-danger">{{ $errors->first('discount_deduct') }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">Thời gian</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Ngày bắt đầu</label>
                                        <input class="form-control" name="discount_start"
                                            value="{{ old('discount_start') }}" type="date">
                                        @error('discount_start')
                                            <span class="text-danger">{{ $errors->first('discount_start') }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="name">Ngày kết thúc</label>
                                        <input class="form-control" name="discount_end"
                                            value="{{ old('discount_end') }}" type="date">
                                        @error('discount_end')
                                            <span class="text-danger">{{ $errors->first('discount_end') }}</span>
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
                                    <div class="form-group">
                                        <label for="name">Số lượng mã</label>
                                        <input class="form-control" name="discount_limit" required
                                            value="{{ old('discount_limit') }}" type="text">
                                        @error('discount_limit')
                                            <span class="text-danger">{{ $errors->first('discount_limit') }}</span>
                                        @enderror
                                    </div>
                                </div>
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
