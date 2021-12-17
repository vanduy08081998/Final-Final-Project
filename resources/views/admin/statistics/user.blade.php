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

                </div>
                <div class="card">
                    <div class="card-body">

                        <div class="card-title">
                            <h4 class="mb-0">Danh sách khách hàng mua nhiều</h4>
                        </div>
                        <hr />

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">

                                <thead>
                                    <tr>
                                        <th style="text-align: center;">STT</th>
                                        <th style="text-align: center;">Tên khách hàng</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Số lượt đã mua</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $dem=1;
                                    ?>

                                       @foreach ($user_vip as $item)
                                            <tr>
                                                <td class="py-2">
                                                    {{$dem++}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$item->name}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$item->email}}
                                                    </td>
                                                <td style="text-align: center;">
                                                    {{$item->tong}}
                                                </td>


                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>

                        </div>
                        <div class="card-title">
                            <h4 class="mb-0">Danh sách khách hàng tiềm năng</h4>
                        </div>
                        <hr />

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">

                                <thead>
                                    <tr>
                                        <th style="text-align: center;">STT</th>
                                        <th style="text-align: center;">Tên khách hàng</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Số tiền đã mua</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $dem=1;
                                    ?>

                                       @foreach ($user_pro as $result)
                                            <tr>
                                                <td class="py-2">
                                                    {{$dem++}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$result->name}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$result->email}}
                                                    </td>
                                                <td style="text-align: center;">
                                                  {{ number_format($result->total) }}
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
