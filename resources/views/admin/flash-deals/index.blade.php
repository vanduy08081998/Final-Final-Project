@extends('admin.layouts.master')

@section('title', 'Quản lý chiến dịch Flash-Sale')

@section('content')
    <!-- Page Wrapper -->

    <div class="content container-fluid">
        <div class="card-title">
            <h4 class="mb-0 font-weight-bold">Quản lý Chiến dịch Flash-Sale</h4>
        </div>
        <hr />
        <div class="text-right mb-3"><a href="{{ route('flash-deals.create') }}" class="btn btn-info"
                style="border-radius: 40px">Thêm chiến dịch</a></div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="table-responsive">
                           <table class="datatable table table-bordered table-stripped">
                               <thead class="thead-light text-center">
                                   <tr>
                                       <th>#</th>
                                       <th>{{ trans('Tên chiến dịch') }}</th>
                                       <th>{{ trans('Banner') }}</th>
                                       <th>{{ trans('Ngày thực hiện') }}</th>
                                       <th>{{ trans('Hành động') }}</th>
                                   </tr>
                               </thead>
                               <tbody>
                                @foreach($flashdeals as $key => $flashdeal)
                                   <tr>
                                       <td>{{ $key+1 }}</td>
                                       <td>{{ $flashdeal->title }}</td>
                                       <td><img src="{{ asset($flashdeal->banner) }}" width="40" height="40"></td>
                                       <td>
                                           @php
                                                $date_start = date('m/d/Y', $flashdeal->date_start);
                                                $date_end = date('m/d/Y', $flashdeal->date_end);
                                            @endphp
                                            {{ $date_start.' - '.$date_end }}
                                       </td>
                                       <td>
                                           <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle radius-30" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                    <a class="dropdown-item" href="{{ route('flash-deals.edit', ['flash_deal' => $flashdeal->id]) }}">
                                                        <i class="fa fa-edit"></i> Sửa</a>
                                                    <form action="{{ route('flash-deals.destroy', ['flash_deal' => $flashdeal->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item"> <i class="fa fa-trash"></i> Xóa</button>
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
        const featureProduct = (id) =>{
            let val = '';

            if(!$('#feature_product_'+id).is(':checked')){
                val = '';
            }else{
                val = 'on';
            }
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{ route('admin.product-feature') }}",
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
