@extends('admin.layouts.master')

@section('title')
  Quản lý loại sản phẩm
@endsection

@section('content')
  <!-- Page Wrapper -->

  <div class="content container-fluid">
    <div class="row">
      <div class="col-sm-12">

        <div class="card mb-0">
          <div class="card-tille pr-3 pl-3 pt-4">
            <h4 class="d-inline font-weight-bold text-dark">
              Danh mục sản phẩm
            </h4>
             <span class="text-right mb-3 float-right"><a href="{{ route('categories.create') }}" class="btn btn-info" style="border-radius: 40px">Thêm danh mục</a></span>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="datatable table table-stripped mb-0">
                <thead>
                  <tr>
                    <td style="text-align: center;">{{ trans('Danh mục') }}</td>
                    <td style="text-align: center;">{{ trans('Mô tả') }}</td>
                    <td style="text-align: center;">{{ trans('Hành động') }}</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $key => $value)
                    @include('admin.Categories.category_indexRows', ['value' => $value])

                    @foreach ($value->subcategory()->get() as $childCategory)
                      @include('admin.Categories.category_indexRows', ['value' => $childCategory,
                      'prefix' => '--'])

                      @foreach ($childCategory->subcategory()->get() as $childCategory2)
                        @include('admin.Categories.category_indexRows', ['value' => $childCategory2,
                        'prefix' => '----'])
                      @endforeach
                    @endforeach
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- /Page Wrapper -->
@endsection
@push('script')
  @if (Session::has('message'))
    <script>
      toastr.options = {
        "closeButton": true,
        "progressBar": true,
      }
      toastr.options.newestOnTop = false;
      toastr.error("{!! Session::get('message') !!}");
    </script>
  @endif
@endpush
