@extends('admin.layouts.master')

@section('title', 'Quản lý sản phẩm')

@section('content')
  <!-- Page Wrapper -->

  <div class="content container-fluid">

    @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Quản tồn kho'])
    <div class="row">
      <div class="col-sm-12">
        <div class="card mb-0">
          <div class="card-body">
            <div class="table-responsive">
              @if ($product->type_of_category == 'isAttribute')
                @if ($product->variants != null)
                  <table class="datatable table table-stripped table-bordered table-hovered">
                    <thead class="text-center">
                      <tr>
                        <th>#</th>
                        <th>SKU</th>
                        <th>Số lượng</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($product->variants as $key => $variant)
                        <tr>
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $variant->variant }}</td>
                          <td>{{ $variant->variant_quantity }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else

                @endif

              @else
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
