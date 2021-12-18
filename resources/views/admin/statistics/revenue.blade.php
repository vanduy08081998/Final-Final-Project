@extends('admin.layouts.master')

@section('title')
Trang chủ
@endsection

@section('content')
<div class="content container-fluid">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Thống kê</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Doanh thu</li>
                        </ol>
                    </nav>
                </div>
                <div class="ml-auto">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">

                        <h4 class="mb-0">Danh sách sản phẩm bán chạy</h4>
                    </div>
                    <form action="{{ route('list_statistics_date') }}" method="POST" enctype="multipart/form-data"
                    id="choice-form">
                    @csrf
                    @method('POST')
                        <div>
                            <label class="form-label" for="account-ln">Từ ngày</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="date" class="form-control" name="star">
                                </div>
                            </div>
                            <label class="form-label" for="account-ln">Đến ngày</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="date" class="form-control" name="end">
                                </div>
                            </div>
                        </div>
                        <button id="btn-filter" class="btn-primary" type="submit">Lọc</button>
                    </form>
                    <hr />
                    <div class="table-responsive">
                        {{-- <button><a href="{{route('list_statistics_cate')}}">aaa</a></button>
                        <button><a href="{{route('list_user_vip')}}">bbb</a></button> --}}
                        <table id="example" class="table table-striped table-bordered" style="width:100%">

                            <thead>
                                <tr>

                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Tên sản phẩm</th>
                                    <th style="text-align: center;">Đơn giá</th>
                                    <th style="text-align: center;">Số lượng</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $dem = 1;
                                $total =0;
                                ?>
                                @foreach ($done_product as $item)
                                <tr>
                                    <td class="py-2">
                                        {{$dem++ }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $item->product_name }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{number_format($item->unit_price) }}

                                    </td>
                                    <td style="text-align: center;">
                                        {{number_format($item->tong) }}
                                    </td>

                                </tr>
                                <input type="hidden" value="{{$total+=$item->unit_price}}">
                                @endforeach
                            </tbody>
                        </table>
                        <strong style="float:right" class="text-dark"><b>Tổng doanh thu: {{number_format($total)}}VNĐ</b></strong>


                    </div>
                    <div class="col-md-12">

                    </div>
                    <div id="chart" style="height: 250px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
