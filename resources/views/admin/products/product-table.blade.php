<table class="datatable table table-stripped mb-0 table-bordered">
  <thead>
    <tr>
      <th style="text-align: center;">{{ trans('Sản phẩm') }}</th>
      <th style="text-align: center;">{{ trans('Tên SP') }}</th>
      <th style="text-align: center;">{{ trans('Giá gốc') }}</th>
      <th style="text-align: center;">{{ trans('Khuyến mãi') }}</th>
      <th style="text-align: center;">{{ trans('Thuộc tính') }}</th>
      <th style="text-align: center;">{{ trans('Trạng thái') }}</th>
      <th style="text-align: center;">{{ trans('Nổi bật') }}</th>
      <th style="text-align: center;">{{ trans('Hành động') }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($product as $pro)
    <tr>
      <td class="py-2">
        <div style="text-align: center;">
          <div class="position-relative mr-2">
            <img class="avatar" width="110" height="115"
                 src="{{ url('uploads/', $pro->product_image) }}" />
          </div>
        </div>
      </td>
      <td style="text-align: center;">{{ trans($pro->product_name) }}</td>
      <td>{{ $pro->unit_price }}</td>
      <td>{{ $pro->discount }}</td>
      <td>
        {{ $pro->attribute }}
      </td>
      <td></td>
      <td></td>
      <td style="text-align: center;">
        <div class="btn-group">
          <button type="button" class="btn btn-success dropdown-toggle radius-30"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
               class="bx bx-cog"></i></button>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
            <a class="dropdown-item text-warning"
               href="{{ route('products.edit', ['product' => $pro->id]) }}">Sửa</a>
            <form action="{{ route('products.destroy', ['product' => $pro->id]) }}"
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