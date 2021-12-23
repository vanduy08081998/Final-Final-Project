<form action="{{ route('products.handle') }}" method="POST">
  @csrf
  <table class="datatable table table-stripped table-bordered" style="vertical-align: middle">
    <div class="card-title">
      <div class="d-block mt-2">
          <select name="handle" id="" class="form-select-sm">
              <option value="">------- Hành động -------</option>
              <option value="trash">Thùng rác</option>
          </select>
          <button class="btn-sm btn-primary handle rounded-0" type="submit" disabled>Hành
              động</button>
          @if ($countTrashed)
              <a href="{{ route('products.trash') }}"
                  class="btn-sm btn-warning rounded-0 float-right mr-1">Thùng
                  rác
                  ({{ $countTrashed }})</a>
          @endif

      </div>
  </div>
    <thead class="thead-light">
      <tr>
        <th style="text-align: center;"><input type="checkbox" id="checkAll"></th>
        <th style="text-align: center;">{{ trans('Sản phẩm') }}</th>
        <th style="text-align: center;">{{ trans('Giá gốc') }}</th>
        <th style="text-align: center;">{{ trans('Nổi bật') }}</th>
        <th style="text-align: center;">{{ trans('Giảm giá trong ngày') }}</th>
        <th style="text-align: center;">{{ trans('Hành động') }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($product as $pro)
        <tr>
          <td>
            <input type="checkbox" class="checkItem" name="checkItem[]"
            value="{{ $pro->id }}">
          </td>
          <td class="py-2">
            <div style="text-align: center;">
              <div class="position-relative mr-2">
                <img width="85" height="90" src="{{ url($pro->product_image) }}" /><br>
                {!! Str::limit(trans($pro->product_name), 25, '...') ?? '' !!}
              </div>
            </div>
          </td>
          <td>{{ $pro->unit_price }}</td>
          <td>
            <div class="status-toggle d-flex justify-content-center">
              <input type="checkbox" id="feature_product_{{ $pro->id }}"
                onchange="featureProduct({{ $pro->id }})" name="feature_product" class="check"
                value="{{ $pro->feature_product }}" {{ $pro->feature_product == 'on' ? 'checked' : '' }}
                onchange="productFeature({{ $pro->id }})">
              <label for="feature_product_{{ $pro->id }}" class="checktoggle">checkbox</label>
            </div>
          </td>
          <td>
            <div class="status-toggle  d-flex justify-content-center">
              <input type="checkbox" id="deals_today_{{ $pro->id }}" onchange="deals_today({{ $pro->id }})"
                name="deals_today" class="check" value="{{ $pro->deals_today }}"
                {{ $pro->deals_today == 1 ? 'checked' : '' }} onchange="productFeature({{ $pro->id }})">
              <label for="deals_today_{{ $pro->id }}" class="checktoggle">checkbox</label>
            </div>
          </td>
          <td style="text-align: center;">
            <div class="btn-group">
              <button type="button" class="btn btn-success dropdown-toggle radius-30" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></button>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                <a class="dropdown-item" href="{{ route('products.edit', ['product' => $pro->id]) }}">
                  <i class="fa fa-edit"></i> Sửa</a>
                @if (count($pro->variants) > 0)
                  <a class="dropdown-item" href="{{ route('products.warehouse', ['product' => $pro->id]) }}">
                    <i class="fa fa-edit"></i>Thuộc tính</a>
                @else

                @endif
                <a class="dropdown-item" href="{{ route('products.delete', $pro->id) }}">
                  <i class="fa fa-trash"></i>Thùng rác</a>
                {{-- <form action="{{ route('products.destroy', ['product' => $pro->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="dropdown-item"> <i class="fa fa-trash"></i> Xóa</button>
                </form> --}}

              </div>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</form>

<input type="hidden" value="{{ route('products.handle') }}" class="url-handle">

@push('script')
<script>
  document.addEventListener('DOMContentLoaded', function() {
      let checkAll = $('#checkAll')
      let checkItem = $('.checkItem')
      let _token = $('input[name="_token"]').val();
      let formTrash = document.forms['form-trash']

      // Checked
      checkAll.change(function() {
          let isCheckAll = $(this).prop('checked')
          checkItem.prop('checked', isCheckAll)
          handle()
      })

      checkItem.change(function() {
          let isAllCheck = checkItem.length === $('.checkItem:checked').length
          checkAll.prop('checked', isAllCheck)
          handle()
      })

      function handle() {
          if ($('.checkItem:checked').length) {
              $('.handle').attr('disabled', false)
          }
      }
      // Thùng rác
      $('.trash').click(function() {
          let id = $(this).data('id')
          let url = $(this).data('url')
          formTrash.action = url
          formTrash.submit()
      })

      // Hành động chung
      
  });
</script>

@endpush
