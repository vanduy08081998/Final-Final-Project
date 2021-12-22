@extends('admin.layouts.master')

@section('title')
    Trang quản trị
@endsection

<!-- Chart CSS -->
{{-- <link rel="stylesheet" href="{{ URL::to('backend/plugins/morris/morris.css') }}"> --}}
@section('content')
    <style>
        .dash-widget-icon {
            color: white;
            float: left;
            height: 65px;
            width: 65px;
            text-align: center;
            font-size: 30px;
            line-height: 74px;
            background: rgba(0, 0, 0, .2);
            border-radius: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .progress {
            background: rgba(0, 0, 0, .2);
            margin: 5px -10px 5px 0;
            height: 2px;
            background: white;
        }

        h3.text-center.mb-4.statiscal {
            color: #0e3b7f;
            font-size: 27px;
            font-weight: bold;
        }

        .card {
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px
        }

        .badge {
            font-size: 15px;
        }

    </style>
    <!-- Page Content -->
    <div class="content container-fluid">

        @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Thống kê'])

        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget bg-b-danger">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fas fa-cart-arrow-down"></i></span>
                        <div class="dash-widget-info mb-2">
                            <h3 class="text-dark">{{ $count_order }}</h3>
                            <span class="text-dark font-weight-bold">Đơn hàng</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget bg-b-blue">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-dropbox"></i></span>
                        <div class="dash-widget-info">
                            <h3 class="text-dark">{{ $count_product }}</h3>
                            <span class="text-dark font-weight-bold">Sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget bg-b-cyan">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <div class="dash-widget-info">
                            <h3 class="text-dark">{{ $count_user }}</h3>
                            <span class="text-dark font-weight-bold">Khách hàng</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget bg-b-purple">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fas fa-newspaper"></i></span>
                        <div class="dash-widget-info">
                            <h3 class="text-dark">{{ $count_post }}</h3>
                            <span class="text-dark font-weight-bold">Bài viết</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4 statiscal">Biểu đồ thống kê tổng doanh thu và số lượng sản phẩm bán
                            ra
                        </h3>
                        <form class="row" autocomplete="off">
                            <div class="col-md-3">
                                <p>Từ ngày: <input type="text" class="date date_start form-control">
                                    <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm mt-1"
                                        value="Lọc kết quả">
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p>Đến ngày: <input type="text" class="date date_end form-control"></p>
                            </div>

                            <div class="col-md-3">
                                <p>
                                    Lọc theo:
                                    <select class="dashboard-filter form-control">
                                        <option>Chọn thời gian lọc</option>
                                        <option value="today">Hôm nay</option>
                                        <option value="week">Tuần này</option>
                                        <option value="month">Tháng này</option>
                                        <option value="year">365 ngày qua</option>
                                    </select>
                                </p>
                            </div>
                        </form>
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0 font-weight-bold">Tổng sản phẩm thuộc danh mục</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div style="min-height: 400px;" id="donut"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0 font-weight-bold">Tổng sản phẩm bán ra của danh mục</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div style="min-height: 400px;" id="donut_cate_buy"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center font-weight-bold mb-4">Biểu đồ doanh thu theo sản phẩm: <strong
                                class="product-chart-name text-danger"></strong></h3>
                        <div class="product_statistical_chart">
                            <form class="row statistical-product-form" autocomplete="off">
                                <div class="product-hidden"></div>

                                <div class="col-md-3">
                                    <p>Từ ngày: <input type="text" class="date date_start_product form-control">
                                        <input type="button" id="btn-dashboard-filter-product"
                                            class="btn btn-primary btn-sm mt-1" value="Lọc kết quả">
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p>Đến ngày: <input type="text" class="date date_end_product form-control"></p>
                                </div>

                                <div class="col-md-3">
                                    <p>
                                        Lọc theo:
                                        <select class="dashboard-filter-product form-control">
                                            <option>Chọn thời gian lọc</option>
                                            <option value="today">Hôm nay</option>
                                            <option value="week">Tuần này</option>
                                            <option value="month">Tháng này</option>
                                            <option value="year">365 ngày qua</option>
                                        </select>
                                    </p>
                                </div>
                            </form>
                            <div style="background: #eaebec;" id="line-charts"></div>
                        </div>
                        <div style="" class="product_statistical mt-4">
                            @livewire('product-statistical')
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center text-danger font-weight-bold mb-4">Dữ liệu khách truy cập và số lần xem trang</h3>
                        <div style="" class="product_statistical mt-4">
                            @livewire('google-analytics')
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div id="embed-api-auth-container"></div>
        <div id="chart-container"></div>
        <div id="view-selector-container"></div>
    </div>
    <style>
        .bg-b-danger {
            min-height: 100px;
            background: linear-gradient(45deg, #f30c41, #eb66dd);
        }

        .bg-b-blue {
            background: linear-gradient(45deg, #1a77e2, #bfd6f1);
        }

        .bg-b-cyan {
            background: linear-gradient(45deg, #40ffed, #29b5af);
        }

        .bg-b-purple {
            background: linear-gradient(45deg, #a52dd8, #e29bf1);
        }

        .card.dash-widget {
            border-bottom: 3px solid brown;
            color: white;
        }

    </style>
    <!-- /Page Content -->
    @include('admin.statistics.modal-product-statistical');
@endsection
<link rel="stylesheet" href="{{ asset('backend/plugins/morris/morris.css') }}">
<link rel="stylesheet"
    href="{{ asset('backend/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css') }}" />
@push('script')

    <!-- Chart JS -->
    <script src="{{ URL::to('backend/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ URL::to('backend/plugins/raphael/raphael.min.js') }}"></script>

    <script src="{{ asset('backend/plugins/material-datetimepicker/moment-with-locales.min.js') }}">
    </script>
    <script src="{{ asset('backend/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js') }}">
    </script>
    <script src="{{ asset('backend/plugins/material-datetimepicker/datetimepicker.js') }}"></script>
    <script src="{{ URL::to('backend/js/chart.js') }}"></script>

    <script src="https://cdn.anychart.com/releases/8.11.0/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.11.0/js/anychart-pie.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.11.0/js/anychart-base.min.js"></script>
    <script>
        charts()
    </script>

    <script>
        // $(document).ready(function(){

        // var papa = Morris.Donut({
        //   element: 'donut',
        //   data: <?php echo $data; ?>
        // });




        // create a pie chart and set the data
        chart = anychart.pie(<?php echo $data; ?>);
        chart.innerRadius("30%");
        chart.container("donut");
        chart.draw();

        // create a pie chart and set the data
        chart = anychart.pie(<?php echo $data_cate_buy; ?>);
        chart.innerRadius("30%");
        chart.container("donut_cate_buy");
        chart.draw();

        var chart_line = new Morris.Area({
            element: 'line-charts',
            xkey: 'period',
            ykeys: ['sales'],
            labels: ['Doanh thu'],
            lineColors: ['#56aaff'],
            lineWidth: '3px',
            resize: true,
            redraw: true,
            parseTime: false,
            hideHover: 'auto'
        });

        function chart_product_line(id) {
            $('.statistical-product-form')[0].reset();
            $.ajax({
                url: 'chart_product_line',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(data) {
                    for (item in data) {
                        $('.product-chart-name').html(data[item]['name']);
                        $('.product-hidden').html('<input type="hidden" class="product-id" value=' + data[item][
                            'id'
                        ] + '>')
                    }
                    chart_line.setData(data);
                }
            })
            $('.btn-show-chart' + id).removeClass('btn-outline-success');
            $('.show_chart').removeClass('btn-success');
            $('.show_chart').addClass('btn-outline-success');
            $('.btn-show-chart' + id).addClass('btn-success');
        }
        chart_product_max_line();

        function chart_product_max_line() {
            $.ajax({
                url: 'chart_product_max',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                success: function(data) {
                    for (item in data) {
                        $('.product-chart-name').html(data[item]['name']);
                        $('.product-hidden').html('<input type="hidden" class="product-id" value=' + data[item][
                            'id'
                        ] + '>')
                    }
                    chart_line.setData(data);
                }
            })
        }
        $('#btn-dashboard-filter-product').click(function() {
            var form_date = $('.date_start_product').val();
            var to_date = $('.date_end_product').val();
            var id = $('.product-id').val();
            $.ajax({
                url: 'filter-by-date-product',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                data: {
                    form_date: form_date,
                    to_date: to_date,
                    id: id
                },
                success: function(data) {
                    if (data == '') {
                        toastr.error('Chưa có dữ liệu')
                    } else {
                        chart_line.setData(data)
                    }
                }
            });
        });

        $('.dashboard-filter-product').change(function() {
            var dashboard_value = $(this).val();
            var id = $('.product-id').val();
            $.ajax({
                url: 'dashboard-filter-product',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                data: {
                    dashboard_value: dashboard_value,
                    id: id
                },
                success: function(data) {
                    if (data == '') {
                        toastr.error('Chưa có dữ liệu')
                    } else {
                        chart_line.setData(data)
                    }
                }
            })
        });
        
    </script>
@endpush
