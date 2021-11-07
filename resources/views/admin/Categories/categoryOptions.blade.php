@isset($categories)
<option value="{{ $item->id_cate }}" @foreach($categories as $categoryItem) {{ $categoryItem->id_cate == $item->id_cate
  ? 'selected' : ''}} @endforeach>{{ $prefix ?? '' }} {{ $item->category_name ?? '' }}</option>
@endisset



@empty($categories)
@isset($category)
<option value="{{ $item->id_cate }}" {{ $category->category_parent_id == $item->id_cate ? 'selected' : ''}}>{{ $prefix
  ?? '' }} {{ $item->category_name ?? 'Chọn danh mục' }}</option>
@endisset


@empty($category)
<option value="{{ $item->id_cate }}">{{ $prefix ?? '' }} {{ $item->category_name ?? '' }}</option>
@endempty
@endempty