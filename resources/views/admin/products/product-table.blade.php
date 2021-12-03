<table class="datatable table table-stripped table-bordered" style="vertical-align: middle">
  <thead class="thead-light">
    <tr>
      <th style="text-align: center;">{{ trans('Sản phẩm') }}</th>
      <th style="text-align: center;">{{ trans('Tên SP') }}</th>
      <th style="text-align: center;">{{ trans('Giá gốc') }}</th>
      {{-- <th style="text-align: center;">{{ trans('Khuyến mãi') }}</th> --}}
      <th style="text-align: center;">{{ trans('Thuộc tính') }}</th>
      <th style="text-align: center;">{{ trans('Nổi bật') }}</th>
      <th style="text-align: center;">{{ trans('Giảm giá trong ngày') }}</th>
      <th style="text-align: center;">{{ trans('Hành động') }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($product as $pro)
      <tr>
        <td class="py-2">
          <div style="text-align: center;">
            <div class="position-relative mr-2">
              <img class="avatar" width="110" height="115" src="{{ url($pro->product_image) }}" />
            </div>
          </div>
        </td>
        <td style="text-align: center;">{{ trans($pro->product_name) }}</td>
        <td>{{ $pro->unit_price }}</td>
        {{-- <td>{{ $pro->discount }}</td> --}}
        <td>

          @if (json_decode($pro->product_attribute) == null)
            <p>{{ trans('Sản phẩm không có thuộc tính') }}</p>
          @else
            @forelse (json_decode($pro->product_attribute) as $key => $attr)
              @php
                foreach (explode(',', $attr) as $key => $attr_id) {
                    echo \App\Models\Attribute::find($attr_id)->name . '<br>';
                }
              @endphp
            @empty
              Không có thuộc tính
            @endforelse
          @endif

        </td>
        <td>
          <div class="status-toggle">
            <input type="checkbox" id="feature_product_{{ $pro->id }}" onchange="featureProduct({{ $pro->id }})"
              name="feature_product" class="check" value="{{ $pro->feature_product }}"
              {{ $pro->feature_product == 'on' ? 'checked' : '' }} onchange="productFeature({{ $pro->id }})">
            <label for="feature_product_{{ $pro->id }}" class="checktoggle">checkbox</label>
          </div>
        </td>
        <td>
          <div class="status-toggle">
            <input type="checkbox" id="deals_today_{{ $pro->id }}" onchange="deals_today({{ $pro->id }})" name="deals_today"
              class="check" value="{{ $pro->deals_today }}" {{ $pro->deals_today == 1 ? 'checked' : '' }}
              onchange="productFeature({{ $pro->id }})">
            <label for="deals_today_{{ $pro->id }}" class="checktoggle">checkbox</label>
          </div>
        </td>
        <td style="text-align: center;">
          <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle radius-30" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false"><i class="fa fa-cog"></i></button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
              <a class="dropdown-item" href="{{ route('products.edit', ['product' => $pro->id]) }}">
                <i class="fa fa-edit"></i> Sửa</a>
              <a class="dropdown-item" href="{{ route('products.warehouse', ['product' => $pro->id]) }}">
                <i class="fa fa-edit"></i> Tồn kho</a>
              <form action="{{ route('products.destroy', ['product' => $pro->id]) }}" method="POST">
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
