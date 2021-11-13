@extends('admin.layouts.master')

@section('title', 'Danh sách')
@section('content')
    <div class="content container-fluid">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    <div class="breadcrumb-title pr-3">Mã giảm giá</div>
                    <div class="pl-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Mã giảm giá</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ml-auto">
                        <div class="btn-group">
                            <a href="{{ route('discount.create') }}" class="btn btn-primary radius-30">Thêm mới</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="mb-0">Liệt kê mã giảm giá</h4>

                        </div>
                        <hr />
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Mã</th>
                                        <th style="text-align: center;">Ngày bắt đầu</th>
                                        <th style="text-align: center;">Ngày kết thúc</th>
                                        <th style="text-align: center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($discountAll as $discount)

                                        <tr>
                                            <td class="py-2">
                                                {{ $discount->discount_code }}
                                            </td>
                                            <td>
                                                {{ $discount->discount_start }}
                                            </td>
                                            <td>
                                                {{ $discount->discount_end }}
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                            class="bx bx-cog"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                        <a class="dropdown-item text-warning"
                                                            href="{{ route('discount.edit', ['discount' => $discount->id]) }}">Sửa</a>
                                                        <form
                                                            action="{{ route('discount.destroy', ['discount' => $discount->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item text-danger">Xóa</button>
                                                        </form>

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
@endsection
