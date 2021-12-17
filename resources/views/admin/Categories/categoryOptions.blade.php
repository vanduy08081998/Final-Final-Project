@isset($categories)
    <option value="{{ $item->id_cate }}" @foreach ($categories as $categoryItem)
    @if($categoryItem->id_cate == $item->id_cate) selected @endif  @endforeach>{{ $prefix ?? '' }}
    {{ $item->category_name ?? '' }} </option>
@endisset

@empty($categories)
    @if ($category == '')
        <option value="{{ $item->id_cate }}">{{ $prefix ?? '' }} {{ $item->category_name ?? '' }}</option>
    @else
        <option value="{{ $item->id_cate }}" {{ $category == $item->id_cate ? 'selected' : '' }}>
            {{ $prefix ?? '' }} {{ $item->category_name ?? 'Chọn danh mục' }}</option>
    @endif
@endempty
