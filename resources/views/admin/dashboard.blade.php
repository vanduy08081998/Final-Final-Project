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
            padding-top: 8%;
            float: left;
            height: 65px;
            width: 65px;
            text-align: center;
            font-size: 30px;
            line-height: 74px;
            background: rgba(0, 0, 0, .2);
            border-radius: 100%;
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
                            <h3 class="mb-2">{{ $count_order }}</h3>
                            <span>Đơn hàng</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget bg-b-blue">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-dropbox"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{ $count_product }}</h3>
                            <span>Sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget bg-b-cyan">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{ $count_user }}</h3>
                            <span>Khách hàng</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget bg-b-purple">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fas fa-newspaper"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{ $count_post }}</h3>
                            <span>Bài viết</span>
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

        <div id="embed-api-auth-container"></div>
        <div id="chart-container"></div>
        <div id="view-selector-container"></div>

 

        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Clients</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#" class="avatar"><img alt=""
                                                        src="assets/img/profiles/avatar-19.jpg"></a>
                                                <a href="client-profile.html">Barry Cuda <span>CEO</span></a>
                                            </h2>
                                        </td>
                                        <td>barrycuda@example.com</td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-success"></i> Active
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#" class="avatar"><img alt=""
                                                        src="assets/img/profiles/avatar-19.jpg"></a>
                                                <a href="client-profile.html">Tressa Wexler <span>Manager</span></a>
                                            </h2>
                                        </td>
                                        <td>tressawexler@example.com</td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="client-profile.html" class="avatar"><img alt=""
                                                        src="assets/img/profiles/avatar-07.jpg"></a>
                                                <a href="client-profile.html">Ruby Bartlett <span>CEO</span></a>
                                            </h2>
                                        </td>
                                        <td>rubybartlett@example.com</td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="client-profile.html" class="avatar"><img alt=""
                                                        src="assets/img/profiles/avatar-06.jpg"></a>
                                                <a href="client-profile.html"> Misty Tison <span>CEO</span></a>
                                            </h2>
                                        </td>
                                        <td>mistytison@example.com</td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-success"></i> Active
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="client-profile.html" class="avatar"><img alt=""
                                                        src="assets/img/profiles/avatar-14.jpg"></a>
                                                <a href="client-profile.html"> Daniel Deacon <span>CEO</span></a>
                                            </h2>
                                        </td>
                                        <td>danieldeacon@example.com</td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="clients.html">View all clients</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Recent Projects</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Project Name </th>
                                        <th>Progress</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h2><a href="project-view.html">Office Management</a></h2>
                                            <small class="block text-ellipsis">
                                                <span>1</span> <span class="text-muted">open tasks, </span>
                                                <span>9</span> <span class="text-muted">tasks completed</span>
                                            </small>
                                        </td>
                                        <td>
                                            <div class="progress progress-xs progress-striped">
                                                <div class="progress-bar" role="progressbar" data-toggle="tooltip"
                                                    title="65%" style="width: 65%"></div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2><a href="project-view.html">Project Management</a></h2>
                                            <small class="block text-ellipsis">
                                                <span>2</span> <span class="text-muted">open tasks, </span>
                                                <span>5</span> <span class="text-muted">tasks completed</span>
                                            </small>
                                        </td>
                                        <td>
                                            <div class="progress progress-xs progress-striped">
                                                <div class="progress-bar" role="progressbar" data-toggle="tooltip"
                                                    title="15%" style="width: 15%"></div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2><a href="project-view.html">Video Calling App</a></h2>
                                            <small class="block text-ellipsis">
                                                <span>3</span> <span class="text-muted">open tasks, </span>
                                                <span>3</span> <span class="text-muted">tasks completed</span>
                                            </small>
                                        </td>
                                        <td>
                                            <div class="progress progress-xs progress-striped">
                                                <div class="progress-bar" role="progressbar" data-toggle="tooltip"
                                                    title="49%" style="width: 49%"></div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2><a href="project-view.html">Hospital Administration</a></h2>
                                            <small class="block text-ellipsis">
                                                <span>12</span> <span class="text-muted">open tasks, </span>
                                                <span>4</span> <span class="text-muted">tasks completed</span>
                                            </small>
                                        </td>
                                        <td>
                                            <div class="progress progress-xs progress-striped">
                                                <div class="progress-bar" role="progressbar" data-toggle="tooltip"
                                                    title="88%" style="width: 88%"></div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2><a href="project-view.html">Digital Marketplace</a></h2>
                                            <small class="block text-ellipsis">
                                                <span>7</span> <span class="text-muted">open tasks, </span>
                                                <span>14</span> <span class="text-muted">tasks completed</span>
                                            </small>
                                        </td>
                                        <td>
                                            <div class="progress progress-xs progress-striped">
                                                <div class="progress-bar" role="progressbar" data-toggle="tooltip"
                                                    title="100%" style="width: 100%"></div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="projects.html">View all projects</a>
                    </div>
                </div>
            </div>
        </div>

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
