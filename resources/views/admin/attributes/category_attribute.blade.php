@extends('admin.layouts.master')

@section('title')
Danh sách thuộc tính
@endsection

@section('content')
<div class="content container-fluid">
    @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Quản lý
    thuộc
    tính danh mục'])
    <div class="row">
        <div class="col-sm-12">
            <div class="ml-auto">
                <div class="btn-group">
                    <a href="{{ route('attribute.create') }}" class="btn btn-primary radius-30">Thêm thuộc
                        tính</a>
                </div>
            </div>

            <!--end breadcrumb-->
            <form action="{{ url('admin/add-attr-category/' . $id) }}" method="POST" class="w-100">
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4 class="mb-0"><span class="text-primary">{{ $cate_name }}</span>
                                    </h4>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <label for="name">Chọn thuộc tính </label>
                                    <select name="attribute_id[]" class="js-example-basic-multiple form-control"
                                        multiple="multiple" required>
                                        @foreach ($attributeAll as $item)

                                        @if (in_array($item->id, $attr_arr))
                                        <option value="{{ $item->id }}" selected>{{ $prefix ?? '' }}
                                            {{ $item->name ?? 'Chọn thuộc tính' }}</option>
                                        @else
                                        <option value="{{ $item->id }}">{{ $prefix ?? '' }}
                                            {{ $item->name ?? 'Chọn thuộc tính' }}</option>
                                        @endif

                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    @enderror
                                </div>
                                <div class="d-block">
                                    <button class="btn btn-primary radius-5 float-right" type="submit">Thêm</button>
                                </div>
                            </div>

                        </div>
                    </div>
            </form>

            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="mb-0">Thuộc tính danh mục: <span class="text-primary">{{ $cate_name }}</span>
                            </h4>
                        </div>
                        @if (session('message'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('message') }}
                        </div>
                        @endif
                        <hr />
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Tên thuộc tính</th>
                                        <th>Slug</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attributes as $attri)
                                    <tr>
                                        <td><a
                                                href="{{ route('variant', ['slug' => $attri->slug]) }}">{{ $attri->name }}</a>
                                        </td>
                                        <td>{{ $attri->slug }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                        class="bx bx-cog"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                    <a class="dropdown-item text-danger"
                                                        href="{{ route('detach_cate_attr', ['attr_id' => $attri->id, 'cate_id' => $id]) }}">Xóa
                                                        liên kết</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
