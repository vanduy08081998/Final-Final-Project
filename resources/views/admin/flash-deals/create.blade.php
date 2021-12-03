@extends('admin.layouts.master')


@section('title', 'Thêm chiến dịch flash sale')

@section('content')
  <div class="content container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('flash-deals.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" name="title" id="" class="form-control">
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Khuyến mãi (%)</label>
                    <input type="number" name="discount" id="" class="form-control">
                </div>   
                </div>
              </div>
              <div class="form-group">
                <label for="">Hình ảnh sản phẩm (1 hình 1200 x 400)</label>
                <div class="file-options">
                  <a class="btn-file iframe-btn" href="{{ asset('rfm/filemanager') }}/dialog.php?field_id=image"
                    style="color: #1e272e; font-size: 24px;"><input class="upload"><i class="fa fa-upload"></i></a>
                </div>
                <input type="hidden" id="image" data-upload="deal_image" data-preview="image__preview">
                <input type="hidden" name="deal_image">
                <div id="image__preview"></div>
              </div>
              <div class="form-group">
                <label>Ngày tạo chiến dịch</label>
                <input type="text" name="date" id="date" class="form-control">
              </div>
              <div class="form-group">
                <label>Sản phẩm</label>
                <select class="form-control" id="product_picker" name="product_id[]" multiple="multiple" data-live-search="true">
                  @foreach ($products as $item)
                    <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                  @endforeach
                </select>
              </div>


              <button type="submit" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"><i class="fa fa-check"></i>Thêm chiến
                dịch</button>
              <button type="reset" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"><i class="fa fa-times"></i>Hủy</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <script>
    $('#product_picker').selectpicker()
    $('#date').daterangepicker()
  </script>
@endpush
