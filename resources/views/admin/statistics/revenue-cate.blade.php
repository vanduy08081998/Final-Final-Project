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
                                <li class="breadcrumb-item active" aria-current="page">Khách hàng tiềm năm</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ml-auto">
                        <div class="btn-group">
                            <a href="{{ route('banners.create') }}" class="btn btn-primary radius-30"></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

                        <div class="card-title">

                            <h4 class="mb-0">Danh sách loại hàng mua nhiều</h4>
                        </div>
                        <hr />
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">

                                <thead>
                                    <tr>
                                        <th style="text-align: center;">STT</th>
                                        <th style="text-align: center;">Tên loại hàng</th>
                                        <th style="text-align: center;">Số lượng bán ra</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $dem=1;
                                    ?>

                                       @foreach ($done_cate as $item)
                                            <tr>
                                                <td class="py-2">
                                                {{$dem++}}
                                                </td>
                                                <td style="text-align: center;">
                                                {{$item->category_name}}
                                                </td>

                                                <td style="text-align: center;">
                                                {{$item->tong}}
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
@endsection
