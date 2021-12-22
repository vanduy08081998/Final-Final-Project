@extends('admin.layouts.master')

@section('title')
    Quản lý thông tin cữa hàng
@endsection

@section('content')
    <!-- Page Wrapper -->

    <div class="content container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    @include('admin.inc.card-header', ['table_title' => 'Thông tin liên hệ'])
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered datatable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Địa chỉ</th>
                                        <th style="text-align: center;">Mở cữa</th>
                                        <th style="text-align: center;">Đóng cữa</th>
                                        <th style="text-align: center;">SĐT</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;"></th>
                                        <th style="text-align: center;">Công cụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($infors as $infor)
                                        <tr>
                                            <td style="text-align: center;">
                                                {{ $infor->address }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $infor->start_time }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $infor->end_time }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $infor->phone }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $infor->email }}
                                            </td>
                                            <td style="text-align: center;" id="infor_table">
                                                <div class="status-toggle">
                                                    <input type="radio" id="infor_on_{{ $infor->id }}" onchange="statusInfor({{ $infor->id }})"
                                                        name="shipping_type" value="{{ $infor->infor_status }}" class="check"
                                                        @if ($infor->infor_status == 1) checked @endif>
                                                    <label for="infor_on_{{ $infor->id }}"
                                                        class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle radius-30"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                            class="bx bx-cog"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                        <a class="dropdown-item text-warning"
                                                            href="{{ route('informations.edit', $infor->id) }}">Sửa</a>
                                                        <form action="{{ route('informations.destroy', $infor->id) }}"
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
@push('script')
    <script>
        const statusInfor = (id) => {
            let val = '';

            if (!$('#infor_on_' + id).is(':checked')) {
                val = 2;
            } else {
                val = 1;
            }
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{ route('informations.statusInfor') }}",
                data: {
                    _token: _token,
                    id: id,
                    value: val
                },
                success: function(response) {
                    toastr.success('Chỉnh sửa thành công!', 'Chúc mừng');
                }
            });
        }
    </script>
@endpush
