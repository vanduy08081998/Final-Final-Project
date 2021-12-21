@extends('admin.layouts.master')

@section('title', 'Quản lý hóa đơn')

@section('content')
    <!-- Page Wrapper -->

    <div class="content container-fluid">

        @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Quản lý hóa đơn'])
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
                                        <th class="text-center">Khách hàng</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Địa chỉ</th>
                                        <th class="text-center">Ngày đặt hàng</th>
                                        <th class="text-center">Trạng thái vận chuyển</th>
                                        <th class="text-center">Tổng tiền</th>
                                        <th class="text-center">Trạng thái thanh toán</th>
                                        <th class="text-center">Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ json_decode($order->shipping_address)->name }}</td>
                                            <td>{{ json_decode($order->shipping_address)->email }}</td>
                                            <td>{{ Str::limit(json_decode($order->shipping_address)->address, 40, '...') }}
                                            </td>
                                            <td>{{ date('Y-m-d h:i:s', $order->date) }}</td>
                                            <td><select name="delivery_viewed" class="form-control"
                                                    onchange="delivery_viewed({{ $order->id }})" id="">
                                                    @foreach ($delivery_viewed as $item)
                                                        <option value="{{ $item->delivery_viewed }}"
                                                            @if ($order->delivery_viewed == $item->delivery_viewed) selected @endif>
                                                            {{                                                             $item->delivery_description }}
                                                        </option>
                                                    @endforeach
                                                </select></td>
                                            <td>{{ number_format($order->grand_total) }}₫</td>
                                            <td>
                                                <div class="status-toggle d-flex justify-content-center">
                                                    <input type="checkbox" onchange="payment_status({{ $order->id }})"
                                                        id="order_status_{{ $order->id }}" onchange=""
                                                        name="payment_status" class="check"
                                                        value="{{ $order->payment_status }}"
                                                        {{                                                         $order->payment_status == 'Confirmed' ? 'checked disabled' : '' }}
                                                        onchange="">
                                                    <label for="order_status_{{ $order->id }}"
                                                        class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td><a class="btn btn-primary rounded-0"
                                                    href="{{ route('orders.show', ['order' => $order->id]) }}">Chi
                                                    tiết</a></td>
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

@push('script')
    <script>
        const payment_status = function(id) {
            let val = '';
            if ($('#order_status_' + id).is(':checked')) {
                val = 'Confirmed';
                $('#order_status_' + id).prop('disabled', true);
            }
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{ route('admin.orders.paymentstatus') }}",
                data: {
                    _token: _token,
                    id: id,
                    value: val
                },
                success: function(response) {
                    toastr.success('Chỉnh sửa thành công', 'Chúc mừng');
                }
            });
        }


        const delivery_viewed = function(id) {
            let val = $('select[name="delivery_viewed"] option:selected').val();
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{ route('admin.orders.delivery') }}",
                data: {
                    _token: _token,
                    id: id,
                    value: val
                },
                success: function(response) {
                    toastr.success('Chỉnh sửa thành công', 'Chúc mừng');
                }
            });
        }
    </script>
@endpush
