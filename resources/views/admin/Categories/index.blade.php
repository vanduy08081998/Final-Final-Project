@extends('layouts.admin_master')

@section('title')
    Trang chủ
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
                            <li class="breadcrumb-item active" aria-current="page">Danh sách danh mục sản phẩm</li>
                        </ol>
                    </nav>
                </div>
                <div class="ml-auto">
                    <div class="btn-group">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary radius-30">Thêm danh mục</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ trans('Tên danh mục') }}</th>
                                    <th>{{ trans('Tiêu đề (SEO)') }}</th>
                                    <th>{{ trans('Từ khóa (SEO)') }}</th>
                                    <th>{{ trans('Mô tả (SEO)') }}</th>
                                    <th>{{ trans('Hành động') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $value)
                                    @include('admin.Categories.category_indexRows', ['value' => $value])

                                    @foreach ($value->subcategory()->get() as $childCategory)
                                        @include('admin.Categories.category_indexRows', ['value' => $childCategory, 'prefix' => '--'])

                                        @foreach ($childCategory->subcategory()->get() as $childCategory2)
                                            @include('admin.Categories.category_indexRows', ['value' => $childCategory2, 'prefix' => '----'])
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
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
    $(document).ready(function () {
        //Default data table
        $('#example').DataTable();
        var table = $('#datatable').DataTable({
            lengthChange: true,
            order: [],
            // bSort: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });
        table.buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush
