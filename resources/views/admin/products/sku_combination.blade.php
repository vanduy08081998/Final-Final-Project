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
        $variant = '';
        foreach ($combination as $key => $item) {

        if ($key > 0) {
        $itemAfterConvert = \App\Models\Variant::where('name', $item)->first()->slug;
        $str .= '-' . str_replace([',', '/','.',' '], '', $itemAfterConvert);
        $sku .= '-' . str_replace(' ', '', $item);
        $variant .= '<br>' . str_replace(' ', '', $item);
        } else {
        if ($colors_active == 1) {
        $color_slug = \App\Models\Color::where('color_code', $item)->first()->color_slug;
        $color_name = \App\Models\Color::where('color_code', $item)->first()->color_name;
        $str .= $color_slug;
        $variant .= $color_name;
        $sku .= '-' . $color_slug;
        } else {
        $itemAfterConvert = \App\Models\Variant::where('name', $item)->first()->slug;
        $str .= str_replace([',', '/','.',' '], '', $itemAfterConvert);
        $variant .= str_replace(' ', '', $item);
        $sku .= '-' . str_replace(' ', '', $item);
        }
        }
        }
        @endphp
        @if (strlen($str) > 0)
        <tr>
            <td>
                <label><strong>{!! $variant !!}</strong></label>
            </td>
            <td>
                <input type="number" name="price_{{ $str }}" value="" class="form-control">
            </td>
            <td>
                <input type="text" name="sku_{{ $str }}" value="{{ $sku }}" class="form-control">
            </td>
            <td>
                <input type="number" name="qty_{{ $str }}" class="form-control qty" value="10" min="0" step="1">
            </td>
            <td>
                <div class="form-group">
                    <label for="">Hình ảnh sản phẩm (1 hình 300 x 300)</label>
                    <div class="file-options">
                        <a class="btn-file iframe-btn"
                            href="{{ asset('rfm/filemanager') }}/dialog.php?field_id=image_{{ $str }}"
                            style="color: #1e272e; font-size: 24px;"><input class="upload"><i
                                class="fa fa-upload"></i></a>
                    </div>
                    <input type="hidden" id="image_{{ $str }}" data-upload="img_{{ $str }}"
                        data-preview="image__preview__{{ $str }}">
                    <input type="hidden" name="img_{{ $str }}">
                    <div id="image__preview__{{ $str }}"></div>
                </div>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
<script>
    $('.iframe-btn').fancybox({
        'width': 900,
        'height': 600,
        'type': 'iframe',
        'autoScale': false
    });

</script>
@else

@endif