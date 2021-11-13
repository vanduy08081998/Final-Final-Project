@if (count($combinations[0]) > 0)
<table class="table table-bordered review-table mb-0">
  <thead class="thead-light">
    <tr>
      <th scope="col">Biến thể</th>
      <th scope="col">Giá biến thể</th>
      <th scope="col">SKU</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Hình ảnh</th>
      {{-- <th scope="col">Hành động</th> --}}
    </tr>
  </thead>
  <tbody>
    @foreach ($combinations as $key => $combination)
    @php
    $sku = '';

    foreach (explode(' ', $product_name) as $key => $value) {
    $sku .= substr($value, 0, 1);
    }

    $str = '';

    foreach ($combination as $key => $item) {
    if ($key > 0) {
    $str .= '-' . str_replace(' ', '', $item);
    $sku .= '-' . str_replace(' ', '', $item);
    } else {
    $str .= str_replace(' ', '', $item);
    $sku .= '-' . str_replace(' ', '', $item);
    }
    }
    @endphp
    @if (strlen($str) > 0)
    <tr>
      <td>
        <label for="">{{ $str }}</label>
      </td>
      <td>
        <input type="number" name="price_{{ $str }}" value="" class="form-control">
      </td>
      <td>
        <input type="text" name="sku_{{ $str }}" value="" class="form-control">
      </td>
      <td>
        <input type="number" name="qty_{{ $str }}" class="form-control qty" value="10" min="0" step="1"
               class="form-control">
      </td>
      <td>
        <div class=" input-group " data-type="image">
          <div class="input-group-prepend">
            <div class="input-group-text bg-soft-secondary font-weight-medium">
              {{ trans('Browse') }}
            </div>
          </div>
          <div class="form-control file-amount text-truncate"
               onclick="singleModalShow('img_{{ $str }}','file-preview_{{ $str }}')">
            {{ trans('Choose File') }}
          </div>
          <input type="hidden" name="img_{{ $str }}" id="img_{{ $str }}"
                 class="selected-files">
        </div>
        <div class="file-preview box sm" id="file-preview_{{ $str }}"></div>
      </td>
      {{-- <td>
        <button type="button" class="btn btn-icon btn-sm btn-danger"
                onclick="delete_variant(this)"><i class="fa fa-trash"></i></button>
      </td> --}}
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
@else

@endif