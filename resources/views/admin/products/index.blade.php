@extends('admin.layouts.master')

@section('title', 'Quản lý sản phẩm')

@section('content')
  <!-- Page Wrapper -->

  <div class="content container-fluid">
    <div class="card-title">
      <h4 class="text-primary mb-2 d-inline font-weight-bold">Danh sách sản phẩm </h4>
      <a href="{{ route('products.create') }}" class="btn btn-info float-right" style="border-radius: 40px">Thêm sản
        phẩm</a>
      <hr />
  </div>
 
    <div class="row">
      <div class="col-sm-12">
        <div class="card mb-0">
          <div class="card-body">
            <div class="table-responsive">
              @include('admin.products.product-table')
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
@push('script')
  <script>
    const featureProduct = (id) => {
      let val = '';

      if (!$('#feature_product_' + id).is(':checked')) {
        val = '';
      } else {
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

    const deals_today = function(id) {
      let val = '';

      if (!$('#deals_today_' + id).is(':checked')) {
        val = 0;
      } else {
        val = 1;
      }
      let _token = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        type: "POST",
        url: "{{ route('admin.deals-today') }}",
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
