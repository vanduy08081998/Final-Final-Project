@extends('admin.layouts.master')

@section('title', 'Quản lý hóa đơn chi tiết')

@section('content')
<!-- Page Wrapper -->

<div class="content container-fluid">

    @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Quản lý hóa đơn chi tiết'])
    {{-- <div class="text-right mb-3"><a href="{{ route('products.create') }}" class="btn btn-info"
            style="border-radius: 40px">Thêm sản
            phẩm</a></div> --}}
    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Sản phẩm</th>
                                    <th class="text-center">Màu sắc</th>
                                    <th class="text-center">Thuộc tính</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order->products as $key => $product)
                                <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>
                                        @foreach (json_decode($product->pivot->specification) as $item)
                                        {{ \App\Models\Color::where('color_slug', $item->colors)->first()->color_name }}
                                        @endforeach
                                    </td>
                                    <td>@foreach (json_decode($product->pivot->specification) as $item)
                                        @foreach ($item->specifications as $item)
                                        <strong>{{ $item }}</strong> &nbsp;
                                        @endforeach
                                        @endforeach
                                    </td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ $product->pivot->promotion_price }}</td>
                                    <td><a href="{{ route('orders.index') }}" class="btn btn-primary rounded-0">Quay
                                            lại</a>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection