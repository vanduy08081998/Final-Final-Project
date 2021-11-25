@if (count($combinations[0]) > 0)
    <table class="table table-bordered review-table mb-0">
        <thead class="thead-light">
        <tr>
            <th scope="col">{{ trans('Biến thể') }}</th>
            <th scope="col">{{ trans('Giá biến thể') }}</th>
            <th scope="col">{{ trans('SKU') }}</th>
            <th scope="col">{{ trans('Số lượng') }}</th>
            <th scope="col">{{ trans('Hình ảnh') }}</th>
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
                    $stock = $product->variants()->where('variant', $str)->first();
                }
            @endphp
            @if (strlen($str) > 0)
                <tr>
                    <td>
                        <label for="">{{ $str }}</label>
                    </td>
                    <td>
                        <input type="number" name="price_{{ $str }}" value="@php
                            if ($product->unit_price == $unit_price) {
                                if($stock != null){
                                    echo $stock->variant_price;
                                }
                                else {
                                    echo $unit_price;
                                }
                            }
                            else{
                                echo $unit_price;
                            }
                        @endphp" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="sku_{{ $str }}" value="@php
                            if($stock != null) {
                                echo $stock->SKU;
                            }
                            else {
                                echo $str;
                            }
                        @endphp" class="form-control">
                    </td>
                    <td>
                        <input type="number" name="qty_{{ $str }}" class="form-control qty" value="@php
                            if($stock != null){
                                echo $stock->variant_quantity;
                            }
                            else{
                                echo '10';
                            }
                        @endphp" min="0" step="1"
                               class="form-control">
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
                            <div id="image__preview__{{ $str }}">
                                @if($stock != null)
                                    <img src="{{ asset($stock->variant_image) }}" width="80" height="80" alt="">
                                @else
                                @endif
                            </div>
                        </div>
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
