@extends('admin.layouts.master')


@section('title', 'Cập nhật chiến dịch flash sale')

@section('content')
  <div class="content container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('flash-deals.update', $flash_deal->id) }}" method="POST">
              @csrf
              @method('put')
              <div class="form-group">
                <label>Tiêu đề</label>
                <input type="text" name="title" id="" value="{{ $flash_deal->title }}" class="form-control">
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Khuyến mãi (%)</label>
                    <input type="number" name="discount" value="{{ $flash_deal->discount }}" id="" class="form-control">
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
                <input type="hidden" name="deal_image" value="{{ $flash_deal->banner }}">
                <div id="image__preview">
                  <img src="{{ asset($flash_deal->banner) }}" width="100" height="100">
                </div>
              </div>
              <div class="form-group">
                @php
                  $date_start = date('d/m/Y', $flash_deal->date_start);
                  $date_end = date('d/m/Y', $flash_deal->date_end);
                @endphp
                <label>Ngày tạo chiến dịch</label>
                <input type="text" name="date" value="{{ $date_start.' - '.$date_end }}" id="date" class="form-control">
              </div>
              <div class="form-group">
                <label>Sản phẩm</label>
                <select class="form-control" id="product_picker" name="product_id[]" multiple="multiple" data-live-search="true">
                  @foreach ($products as $product)
                    @foreach($flash_deal->products as $item)
                      <option value="{{ $product->id }}" @if($product->id == $item->id) selected @endif>{{ $product->product_name }}</option>
                    @endforeach
                  @endforeach
                </select>
              </div>


              <button type="submit" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"><i class="fa fa-check"></i>Cập nhật chiến
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