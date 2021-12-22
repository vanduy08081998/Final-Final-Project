<form action="{{ route('products.handle') }}" method="POST">
    @csrf
    <table class="datatable table table-stripped table-bordered" style="vertical-align: middle">
      <div class="card-title">
        <div class="d-block mt-2">
            <select name="handle" id="" class="form-select-sm">
                <option value="">------- Hành động -------</option>
                <option value="restore">Khôi phục</option>
                <option value="detete">xóa</option>
            </select>
            <button class="btn-sm btn-primary handle rounded-0" type="submit" disabled>Hành
                động</button>
            {{-- @if ($countTrashed)
                <a href="{{ route('comment.trash', $product->id) }}"
                    class="btn-sm btn-warning rounded-0 float-right mr-1">Thùng
                    rác
                    ({{ $countTrashed }})</a>
            @endif --}}
  
        </div>
    </div>
      <thead class="thead-light">
        <tr>
          <th style="text-align: center;"><input type="checkbox" id="checkAll"></th>
          <th style="text-align: center;">{{ trans('Sản phẩm') }}</th>
          <th style="text-align: center;">{{ trans('Giá gốc') }}</th>
          
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
    });
  </script>
  
  @endpush
  