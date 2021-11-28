@extends('admin.layouts.master')

@section('title', 'Quản lý sản phẩm')

@section('content')
    <!-- Page Wrapper -->

    <div class="content container-fluid">

        @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Quản lý sản
        phẩm'])
        <div class="text-right mb-3"><a href="{{ route('products.create') }}" class="btn btn-info"
                style="border-radius: 40px">Thêm sản
                phẩm</a></div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    {{-- @include('admin.inc.card-header', ['table_title' => 'Sản phẩm' , 'table_content' =>
        'Quản lý sản phẩm']) --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('admin.products.product-table')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('script')
    <script>
        const productFeature = (id) => {
            $.ajax({
                type: "GET",
                url: "{{ route('products.feature') }}",
                data: {
                    id: id,
                    value: $('#feature_product').val()
                },
                success: function(response) {
                    console.log('success')
                }
            });
        }
    </script>
@endpush
