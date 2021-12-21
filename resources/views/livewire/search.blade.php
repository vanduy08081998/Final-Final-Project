<div style="width: 800%">
                <form class="input-group d-none d-lg-flex flex-nowrap mx-4 typeahead search-form-header"
                    action="{{ route('search.searchs') }}" method="POST" enctype="multipart/form-data"
                    id="choice-form">
                    @csrf
                    @method('POST')

                    <input class="form-control rounded-start w-100 search-input"
                        style="border-radius: 25px 0 0 25px !important;" name="key" id="search" wire:model="item" type="text"
                        placeholder="Tìm kiếm sản phẩm" required>
                    <select class="form-select flex-shrink-0" style="width: 10.5rem;" name="category">
                        <option name="category" value="0">Tất cả</option>
                        @foreach ($category as $cate)
                            <option name="category" value="{{ $cate->id_cate }}">{{ $cate->category_name }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn-primary" type="submit" style="border-radius: 0 25px 25px 0; border: none"><i
                            class="fas fa-search"
                            style="font-size: 23px; margin-left: 10px; margin-right: 10px; margin-top: 3px;"></i>
                    </button>
                </form>
                <div class="d-block">
                    {{$item}}
                </div>
</div>
