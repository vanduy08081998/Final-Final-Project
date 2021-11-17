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
            <div class="form-group">
              <label>Banner (1920 x 500)</label>
              <div class="input-group mb-3" data-type="image">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-soft-secondary font-weight-medium">
                    {{ 'Browse' }}
                  </div>
                </div>
                <div class="form-control file-amount"
                     onclick="singleModalShow('banner','render__image__single')">
                  {{ 'Choose File' }}
                </div>
                <input type="hidden" name="banner" id="banner" value=""
                       class="selected-files">
              </div>
              <div id="render__image__single"></div>
            </div>
            <div class="form-group">
              <label>Ngày tạo chiến dịch</label>
              <input type="date" name="date" id="" class="form-control">
            </div>
            <div class="form-group">
              <label>Sản phẩm</label>
              <select class="form-control" id="product_picker" multiple="multiple" data-live-search="true">
                @foreach ($products as $item)
                <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                @endforeach
              </select>
            </div>


            <button type="submit" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"><i
                 class="fa fa-check"></i>Thêm chiến dịch</button>
            <button type="reset" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"><i
                 class="fa fa-times"></i>Hủy</button>
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
      
</script>
@endpush